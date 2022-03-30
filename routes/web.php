<?php

use App\Http\Controllers\Admin\TesteController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class); //->middleware('auth');

/*
Route::delete('products/{id}', [ProductController::class, "destroy"])->name('products.destroy');
Route::put('products/{id}', [ProductController::class, "update"])->name('products.update');
Route::get('products/{id}/edit', [ProductController::class, "edit"])->name('products.edit');
Route::get('products/create', [ProductController::class, "create"])->name('products.create');
Route::get('products/{id}', [ProductController::class, "show"])->name('products.show');
Route::get('products', [ProductController::class, "index"])->name('products.index');
Route::post('products', [ProductController::class, "store"])->name('products.store');
*/

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::name('admin.')->group(function () {

            Route::get('/dashboard', [TesteController::class, "teste"])->name('dashboard');

            Route::get('/financeiro', [TesteController::class, "teste"])->name('financeiro');

            Route::get('/produtos', [TesteController::class, "teste"])->name('produtos');

            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            })->name('home');
        });
    });
});

/*
Route::group([
    'middleware' => [''],
    'prefix' => 'admin',
], function () {
    Route::get('/dashboard', [TesteController::class, "teste"])->name('dashboard');

    Route::get('/financeiro', [TesteController::class, "teste"])->name('financeiro');

    Route::get('/produtos', [TesteController::class, "teste"])->name('produtos');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('home');
});
*/

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
