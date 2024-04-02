<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;





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

Route::get('/', function () {
    return view('welcome');
});
//declarer une route qui communique avec un controller
Route::get('/test',[TestController::class, 'index'])->name("test");

//declarer une route qui communique avec un controller
Route::get('/test',[TestController::class, 'index']);

//route pour accueil
Route::get('/accueil',[SiteController::class, 'accueil'])->name("accueil");

//route pour contact
Route::get('/contact',[SiteController::class, 'contact'])->name("contact");

//debut exo 2:
Route::get('/',[WebsiteController::class, 'accueil'])->name("website.accueil");
Route::get('/presentation',[WebsiteController::class, 'presentation'])->name("website.presentation");
Route::get('/produits1',[WebsiteController::class, 'produits1'])->name("website.produits");
Route::get('/contact1',[WebsiteController::class, 'contact1'])->name("website.contact");
Route::post('/contact/save',[WebsiteController::class, 'save'])->name("website.save");
Route::get('/checkout',[WebsiteController::class, 'checkout'])->name("website.checkout");

// ces routes ne seront accesibles que par les utilisateurs authentifiés
route::middleware(['auth'])->group(function (){
//cette ligne genere 7 routes
Route::resource('categories',CategoriesController::class );
Route::resource('products',ProductsController::class );
});

Route::post("panier/addtocart", [PanierController::class,"AddToCart"])->name('panier.addtocart');

Route::get("panier",[PanierController::class,"panier"])->name('panier.panier');
Route::get("panier/delete/{indice}",[PanierController::class,"delprodpanier"])->name('panier.delprodpanier');
Route::get("panier/vide",[PanierController::class,"viderpanier"])->name('panier.viderpanier');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
