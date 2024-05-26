<?php

use App\Http\Livewire\Documento;
use App\Http\Livewire\Proceso;
use App\Http\Livewire\TipoDoc;
use App\Http\Livewire\Usuarios;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function(){ return redirect('login'); })->name('login');


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function (){
    Route::get('/documento', Documento::class)->name('documento');
    Route::get('/proceso', Proceso::class)->name('proceso');
    Route::get('/tipo_doc', TipoDoc::class)->name('tipo_doc');
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


