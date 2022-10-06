<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', 'LoginController@login')->name('site.login');

Route::prefix('/app')->group(function() {

    Route::get('/clientes', 'ClientesNosController@clientes')->name('app.clientes');
    Route::get('/fornecedores', 'FornecedoresController@fornecedores')->name('app.fornecedores');
    Route::get('/produtos', 'ProdutosController@produtos')->name('app.produtos');
});

Route::get('/rota1', function() {
    echo 'Rota 1';  
})->name('site.rota1');

Route::get('/rota2', function() {
    return redirect()->route('site.rota1');  
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1');

Route::fallback(function() {
    echo 'A rota acessada não existe <a href="'.route('site.index').'"> Clique Aqui</a> para ir para a página inicial';
});

// Route::get('/contato/{nome}/{categoria_id}', function (
//     string $nome,
//     int $categoria_id = 1 // 1 - 'Informação'
// ) {
//     return "Informações: $nome - $categoria_id";
// })->where('categoria_id', '[0-9]+') ->where('nome', '[A-Za-z]+');