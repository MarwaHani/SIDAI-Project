<?php

namespace App\Http\Controllers;

use App\Models\Entidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.gerirUser', compact('users'));
    }
    public function manageEstatisticas()
    {
        return view('admin.gerirEstatisticas');
    }

    public function manageEntidades()
{
    $entidadesPorCategoria = [
        'Educação' => Entidade::where('categoria', 'Educação')->get(),
        'Emprego'  => Entidade::where('categoria', 'Emprego')->get(),
        'Saúde'    => Entidade::where('categoria', 'Saúde')->get(),
    ];

    return view('admin.gerirEntidades', ['entidades' => $entidadesPorCategoria]);
}

public function createEntidade(Request $request)
{
    $validated = $request->validate([
        'nome'      => 'required|string|max:255',
        'contacto'  => 'required|string|max:255',
        'local'     => 'required|string|max:255',
        'website'   => 'nullable|url',
        'descricao' => 'nullable|string',
        'categoria' => 'required|in:Educação,Emprego,Saúde',
        'imagem'    => 'nullable|image|max:2048',
    ]);

    $validated['descricao'] = $validated['descricao'] ?? '';

    if ($request->hasFile('imagem')) {
        $validated['imagem'] = $request->file('imagem')->store('imagens', 'public');
    }

    Entidade::create($validated);

    return redirect()->route('admin.gerirEntidades')->with('success', 'Entidade criada com sucesso!');
}
public function editEntidade($id)
{
    $entidade = Entidade::findOrFail($id);

    return response()->json($entidade); 
}

public function updateEntidade(Request $request, $id)
{
    $entidade = Entidade::findOrFail($id);

    $validated = $request->validate([
        'nome'      => 'required|string|max:255',
        'contacto'  => 'required|string|max:255',
        'local'     => 'required|string|max:255',
        'website'   => 'nullable|url',
        'descricao' => 'nullable|string',
        'categoria' => 'required|in:Educação,Emprego,Saúde',
        'imagem'    => 'nullable|image|max:2048',
    ]);

    $validated['descricao'] = $validated['descricao'] ?? '';

    $entidade->fill($validated);

    if ($request->hasFile('imagem')) {
        if ($entidade->imagem && Storage::disk('public')->exists($entidade->imagem)) {
            Storage::disk('public')->delete($entidade->imagem);
        }
        $entidade->imagem = $request->file('imagem')->store('imagens', 'public');
    }

    $entidade->save();

    return redirect()->route('admin.gerirEntidades')->with('success', 'Entidade atualizada com sucesso!');
}

public function deleteEntidade($id)
{
    $entidade = Entidade::findOrFail($id);

    if ($entidade->imagem && Storage::disk('public')->exists($entidade->imagem)) {
        Storage::disk('public')->delete($entidade->imagem);
    }
        // Garante que descricao não seja null, mas string vazia
        $validated['descricao'] = $validated['descricao'] ?? '';

        // Preenche a entidade com os dados validados (não usar $request->except)
        $entidade->fill($validated);

    $entidade->delete();

    return redirect()->route('admin.gerirEntidades')->with('success', 'Entidade eliminada com sucesso!');
}
public function toggleAtivo($id)
{
    $entidade = Entidade::findOrFail($id);
    $entidade->ativo = !$entidade->ativo;
    $entidade->save();

    return redirect()->back()->with(
        'success',
        $entidade->ativo ? 'Entidade ativada com sucesso.' : 'Entidade desativada com sucesso.'
    );
}

    public function manageRecursos()
    {
        return view('admin.recursos');
    }

    public function manageContactos()
    {
        return view('admin.contacto');
    }
    public function gerirUsers()
{
    $users = User::where('role', '!=', 'admin')->get();

    // Dados para gráfico
    $totalUsers = $users->count();
    $sexoCount = $users->groupBy('sexo')->map->count();
    $paisCount = $users->groupBy('pais')->map->count();

    $ageGroups = [
        '18-25' => 0,
        '26-35' => 0,
        '36-50' => 0,
        '51+'   => 0,
    ];
    foreach ($users as $user) {
        if ($user->data_nascimento) {
            $age = now()->diffInYears($user->data_nascimento);
            if ($age <= 25) $ageGroups['18-25']++;
            elseif ($age <= 35) $ageGroups['26-35']++;
            elseif ($age <= 50) $ageGroups['36-50']++;
            else $ageGroups['51+']++;
        }
    }
    
    $chartData = [
        'sexo' => [
            $sexoCount['Masculino'] ?? 0,
            $sexoCount['Feminino'] ?? 0,
            $sexoCount['Prefiro não dizer'] ?? 0
        ],
        'idade' => array_values($ageGroups),
    ];

    $paisCount = $users
    ->whereNotNull('pais')
    ->filter(fn($user) => trim($user->pais) !== '')
    ->groupBy('pais')
    ->map->count();


    return view('admin.gerirUser', compact('users', 'totalUsers', 'sexoCount', 'ageGroups', 'chartData', 'paisCount'));

}

public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'sexo' => 'nullable|string',
        'data_nascimento' => 'nullable|date',
        'role' => 'nullable|string',
        'telemovel' => 'nullable|string|max:20',
        'pais' => 'nullable|string|max:100',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'sexo' => $request->sexo,
        'data_nascimento' => $request->data_nascimento,
        'role' => $request->role ?? 'user',
        'telemovel' => $request->telemovel,
        'pais' => $request->pais,
    ]);

    return redirect()->route('admin.gerirUser')->with('success', 'Utilizador adicionado com sucesso.');
}
public function desativar($id)
{
    $user = User::findOrFail($id);
    $user->ativo = 0; // ou outro nome de campo, ex: status = 'inativo'
    $user->save();

    return redirect()->back()->with('success', 'Utilizador desativado com sucesso.');
}
public function toggleUserAtivo($id)
{
    $user = User::findOrFail($id);
    $user->ativo = !$user->ativo;
    $user->save();

    return back()->with(
        'success',
        $user->ativo ? 'Utilizador ativado com sucesso.' : 'Utilizador desativado com sucesso.'
    );
}


}
