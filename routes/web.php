<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstatisticasController;
use App\Http\Controllers\EstatisticasENController;
use App\Http\Controllers\EstatisticasARController;
use App\Http\Controllers\RecursosARController;
use App\Http\Controllers\RecursosENController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('/admin/entidades', [AdminController::class, 'manageEntidades'])->name('admin.entidades');
    Route::get('/admin/contacto', [AdminController::class, 'manageContactos'])->name('admin.contacto');

    // GERIR ENTIDADES (CRUD)
    Route::get('/admin/gerirEntidades', [AdminController::class, 'manageEntidades'])->name('admin.gerirEntidades');
    Route::post('/admin/gerirEntidades', [AdminController::class, 'createEntidade'])->name('admin.gerirEntidades.store');
    Route::get('/admin/gerirEntidades/{id}/edit', [AdminController::class, 'editEntidade'])->name('admin.gerirEntidades.edit');
    Route::put('/admin/gerirEntidades/{id}', [AdminController::class, 'updateEntidade'])->name('admin.gerirEntidades.update');
    Route::delete('/admin/gerirEntidades/{id}', [AdminController::class, 'deleteEntidade'])->name('admin.gerirEntidades.delete');

    Route::patch('/admin/gerirUser/{id}/desativar', [AdminController::class, 'desativar'])
        ->name('admin.gerirUser.desativar');
    Route::patch('/admin/gerirUser/{id}/toggle', [AdminController::class, 'toggleUserAtivo'])
        ->name('admin.gerirUser.toggle');

    Route::patch('/admin/gerirEntidades/{id}/toggle', [AdminController::class, 'toggleAtivo'])
        ->name('admin.gerirEntidades.toggle');
});



Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/estatisticas', [EstatisticasController::class, 'index'])->name('estatisticas.index');

Route::get('/entidades', function () {

    $result = DB::table('entidades')->where('ativo', 1) // só pega entidades ativas
        ->get()->groupBy('categoria');
    return view('entidades', ['entidades' => $result]);
});
Route::get('/recursos', [RecursoController::class, 'index']);

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto/enviar', [ContactoController::class, 'enviarMensagem'])->name('contacto.enviar');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/gerirContacto', [ContactoController::class, 'adminIndex'])->name('admin.gerirContacto');
    Route::get('/gerirContacto/{id}/ver', [ContactoController::class, 'ver'])->name('admin.gerirContacto.ver');
    Route::post('/gerirContacto/{id}/responder', [ContactoController::class, 'responder'])->name('admin.gerirContacto.responder');
    Route::get('/gerirContacto/{id}/responder', [ContactoController::class, 'mostrarFormularioResponder'])->name('admin.gerirContacto.mostrarResponder');
    Route::delete('/gerirContacto/{id}/apagar', [ContactoController::class, 'apagar'])->name('admin.gerirContacto.apagar');

    Route::patch('/admin/gerirContacto/{id}/toggle', [ContactoController::class, 'toggleAtivo'])
        ->name('admin.gerirContacto.toggle');

    Route::patch('/admin/gerirContacto/{id}/toggle', [ContactoController::class, 'toggleAtivoAR'])
        ->name('admin.gerirContacto.toggle');

    Route::patch('/admin/gerirContacto/{id}/toggle', [ContactoController::class, 'toggleAtivoEN'])
        ->name('admin.gerirContacto.toggle');
    // Página de gestão
    Route::get('/admin/gerirEstatisticas', [EstatisticasController::class, 'gerir'])->name('admin.gerirEstatisticas');

    // CRUD AJAX ou formulários
    Route::post('/estatisticas', [EstatisticasController::class, 'store'])->name('estatisticas.store');
    Route::put('/estatisticas/{id}', [EstatisticasController::class, 'update'])->name('estatisticas.update');
    Route::patch('/estatisticas/{id}/toggle', [EstatisticasController::class, 'toggle'])->name('estatisticas.toggle');

});

Route::get('/registar', [AuthController::class, 'showRegisterForm'])->name('registar.form');
Route::post('/registar', [AuthController::class, 'registar'])->name('registar');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/user', function () {
    return view('user');
})->middleware('auth')->name('user');

//----------------------------------------------Arabic-----------------------------------------------------
Route::post('/ARlogin', [AuthController::class, 'ARlogin'])->name('ARlogin');
Route::get('/ARlogin', [AuthController::class, 'showARLoginForm'])->name('ARlogin.form');

Route::get('/ARregistar', [AuthController::class, 'ARshowRegisterForm'])->name('ARregistar.form');
Route::post('/ARregistar', [AuthController::class, 'ARregistar'])->name('ARregistar');

Route::post('/ar/logout', [AuthController::class, 'ARlogout'])->name('ARlogout');


Route::get('/ARhome', function () {
    return view('ARhome');
});
Route::get('/ARestatisticas', [EstatisticasARController::class, 'index'])->name('ARestatisticas.index');

Route::get('/ARentidades', function () {
    $result = DB::table('entities_ar')->get()->groupBy('category');
    return view('ARentidades', ['entities_ar' => $result]);
});

Route::get('/ARrecursos', [RecursosARController::class, 'index']);

Route::get('/ARabout', function () {
    return view('ARabout');
});
Route::get('/ARcontacto', [ContactoController::class, 'indexAR'])->name('ARcontacto');
Route::post('/contacto/ar/enviar', [ContactoController::class, 'enviarMensagemAR'])->name('contacto.ar.enviar');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/ar/gerirContacto', [ContactoController::class, 'ARadminIndex'])->name('admin.ar.gerirContacto');
    Route::get('/ar/gerirContacto/{id}/ver', [ContactoController::class, 'ARver'])->name('admin.ar.gerirContacto.ver');
    Route::post('/ar/gerirContacto/{id}/responder', [ContactoController::class, 'ARresponder'])->name('admin.ar.gerirContacto.responder');
    Route::get('/ar/gerirContacto/{id}/responder', [ContactoController::class, 'ARmostrarFormularioResponder'])->name('admin.ar.gerirContacto.mostrarResponder');
    Route::delete('/ar/gerirContacto/{id}/apagar', [ContactoController::class, 'ARapagar'])->name('admin.ar.gerirContacto.apagar');

});

//-----------------------------------------------English---------------------------------------------
Route::post('/ENlogin', [AuthController::class, 'ENlogin'])->name('ENlogin');
Route::get('/ENlogin', [AuthController::class, 'ENshowLoginForm'])->name('ENlogin.form');

Route::get('/ENregistar', [AuthController::class, 'ENshowRegisterForm'])->name('ENregistar.form');
Route::post('/ENregistar', [AuthController::class, 'ENregistar'])->name('ENregistar');

Route::post('/en/logout', [AuthController::class, 'ENlogout'])->name('ENlogout');

Route::get('/ENhome', function () {
    return view('ENhome');
});
Route::get('/ENestatisticas', [EstatisticasENController::class, 'index'])->name('ENestatisticas.index');

Route::get('/ENentidades', function () {
    $result = DB::table('entities_en')->get()->groupBy('category');
    return view('ENentidades', ['entities_en' => $result]);
});
Route::get('/ENrecursos', [RecursosENController::class, 'index']);

Route::get('/ENabout', function () {
    return view('ENabout');
});
Route::get('/ENcontacto', [ContactoController::class, 'indexEN'])->name('ENcontacto');
Route::post('/contacto/en/enviar', [ContactoController::class, 'enviarMensagemEN'])->name('contacto.en.enviar');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/en/gerirContacto', [ContactoController::class, 'ENadminIndex'])->name('admin.en.gerirContacto');
    Route::get('/en/gerirContacto/{id}/ver', [ContactoController::class, 'ENver'])->name('admin.en.gerirContacto.ver');
    Route::post('/en/gerirContacto/{id}/responder', [ContactoController::class, 'ENresponder'])->name('admin.en.gerirContacto.responder');
    Route::get('/en/gerirContacto/{id}/responder', [ContactoController::class, 'ENmostrarFormularioResponder'])->name('admin.en.gerirContacto.mostrarResponder');
    Route::delete('/en/gerirContacto/{id}/apagar', [ContactoController::class, 'ENapagar'])->name('admin.en.gerirContacto.apagar');

});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'gerirUsers'])->name('admin.gerirUser');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.gerirUser.store');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.gerirUser.delete');
});

