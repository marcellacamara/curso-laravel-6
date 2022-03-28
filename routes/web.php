<?php

use App\Http\Controllers\Admin\TesteController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [TesteController::class, "teste"])->name("admin.dashboard");

        Route::get('/financeiro', [TesteController::class, "teste"])->name("admin.financeiro");

        Route::get('/produtos', [TesteController::class, "teste"])->name("admin.produtos");

        Route::get('/', [TesteController::class, "teste"])->name("admin.home");
    });
});


Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'hey hey hey';
})->name('url.name');

Route::view('/view', 'welcome');

Route::redirect('/redirect1', 'redirect2');

// Route::get('redirect1', function () {
//     return redirect('/redirect2');
// });

Route::get('redirect2', function () {
    return 'Redirect 2';
});

Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "produtos {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($prm1) {
    return "Produtos da categoria: {$prm1}";
});

//aceita qlqr método, tendo q especificar
Route::match(['get', 'post'], '/match', function () {
    return "match";
});

// aceita qualquer meétodo
Route::any('/any', function () {
    return 'Any';
});

Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});
