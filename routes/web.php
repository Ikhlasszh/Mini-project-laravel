<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller2;
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

Route::get('/', function () {
    if (Auth::check()) {
        return view('dashboard');
    }
else{
  return view('welcome');
}
  
});

Route::get('/AjouterForm',[Controller2::class, 'formAjout']);
Route::get('/ajouterEnseignant',[Controller2::class, 'ajouterEnseignant']);
Route::get('/ajouterSalle',[Controller2::class, 'ajouterSalle']);
Route::get('/ajouterModule',[Controller2::class, 'ajouterModule']);
Route::get('/ajouterGroupe',[Controller2::class, 'ajouterGroupe']);
////////////////////////////////
Route::get('/supprimerForm',[Controller2::class, 'formSupp']);
Route::get('/supprimerEnseignant',[Controller2::class, 'supprimerEnseignant']);
Route::get('/supprimerSalle',[Controller2::class, 'supprimerSalle']);
Route::get('/supprimerModule',[Controller2::class, 'supprimerModule']);
Route::get('/supprimerGroupe',[Controller2::class, 'supprimerGroupe']);
//////////////////

Route::get('/emploi/{niveau}',[Controller2::class, 'getEmploi']);
Route::get('/ajouterSeanceForm/{niveau}',[Controller2::class, 'ajouterSeanceForm']);
Route::get('/ajouterSeance/{niveau}',[Controller2::class, 'ajouterSeance']);
Route::get('/supprimerSeance/{niveau}/{id}',[Controller2::class, 'supprimerSeance']);
Route::get('/listeEnseignant',[Controller2::class, 'afficherListeEn']);
Route::get('/modifierForm/{id}',[Controller2::class, 'updateEnseignant']);
Route::get('/listeSalles',[Controller2::class, 'afficherListeS']);
Route::get('/modifierFormS/{id}',[Controller2::class, 'updateSalle']);
Route::get('/listeGroupes',[Controller2::class, 'afficherListeG']);
Route::get('/modifierFormG/{id}',[Controller2::class, 'updateGroupe']);
Route::get('/modifierFormM/{id}',[Controller2::class, 'updateModule']);
Route::get('/listeModules',[Controller2::class, 'afficherListeM']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
