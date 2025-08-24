<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('registar');
    }

    public function registar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'apelido' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'telemovel' => 'nullable|string|max:20',
            'sexo' => 'nullable|in:Feminino,Masculino,Prefiro não dizer',
            'pais' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users',
            'senha' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        User::create([
            'name' => $request->nome,
            'apelido' => $request->apelido,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'role' => 'user',
            'data_nascimento' => $request->data_nascimento,
            'telemovel' => $request->telemovel,
            'sexo' => $request->sexo,
            'pais' => $request->pais,
        ]);

        return redirect()->route('login.form')->with('sucesso', 'Registo efetuado com sucesso.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['senha'],
            'ativo' => 1
        ])) {
            $request->session()->regenerate();
    
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin');
            }
            return redirect()->intended('/home');
        }
    
        return back()->withErrors([
            'email' => 'Credenciais inválidas ou conta desativada.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
    /*---------------------------------------Arabic Login --------------------------------- */
    public function showARLoginForm()
    {
        return view('ARlogin');
    }

    public function ARlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin');
            }
            return redirect()->intended('/ARhome');
        }

        return back()->withErrors(['email' => 'بيانات اعتماد غير صالحة.']);
    }
    /*----------------------------------Arabic logout---------------------------- */

    public function ARlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ARlogin.form');
    }
    /*-----------------------------------Arabic Register--------------------------------------- */
    public function ARshowRegisterForm()
    {
        return view('ARregistar');
    }

    public function ARregistar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'apelido' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'telemovel' => 'nullable|string|max:20',
            'sexo' => 'nullable|in:Feminino,Masculino,Prefiro não dizer',
            'pais' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users',
            'senha' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        User::create([
            'name' => $request->nome,
            'apelido' => $request->apelido,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'role' => 'user',
            'data_nascimento' => $request->data_nascimento,
            'telemovel' => $request->telemovel,
            'sexo' => $request->sexo,
            'pais' => $request->pais,
        ]);

        return redirect()->route('ARlogin.form')->with('تم التسجيل بنجاح.');
    }
    /*---------------------------------------English Login --------------------------------- */
    public function ENshowLoginForm()
    {
        return view('ENlogin');
    }

    public function ENlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin');
            }
            return redirect()->intended('/ENhome');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
    /*----------------------------------Arabic logout---------------------------- */

    public function ENlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ENlogin.form');
    }
    #/*-----------------------------------English Register--------------------------------------- */
    public function ENshowRegisterForm()
    {
        return view('ENregistar');
    }

    public function ENregistar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'apelido' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'telemovel' => 'nullable|string|max:20',
            'sexo' => 'nullable|in:Feminino,Masculino,Prefiro não dizer',
            'pais' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users',
            'senha' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        User::create([
            'name' => $request->nome,
            'apelido' => $request->apelido,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'role' => 'user',
            'data_nascimento' => $request->data_nascimento,
            'telemovel' => $request->telemovel,
            'sexo' => $request->sexo,
            'pais' => $request->pais,
        ]);

        return redirect()->route('ENlogin.form')->with('Registration completed successfully.');
    }
}