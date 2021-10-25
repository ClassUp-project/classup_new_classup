<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
        ->middleware(['auth'])
        ->name('dashboard');
Route::delete('/dashboard/{questionnaire}', 'App\Http\Controllers\DashboardController@destroy');
Route::delete('/filedelete/{dropzone}', 'App\Http\Controllers\DashboardController@delete')->name('filedelete');
Route::delete('/notedelete/{resultat}', 'App\Http\Controllers\DashboardController@deletenote')->name('notedelete');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
//Route::delete('/home/{questionnaire}', 'App\Http\Controllers\HomeController@destroy');


//Route vers le choix et vue de la classe côté professeur
Route::get('/maclasses/create', 'App\Http\Controllers\GroupeController@create')->name('classeprof');
Route::post('/maclasses', 'App\Http\Controllers\GroupeController@store');
Route::get('/maclasses/{idutilisateur}', 'App\Http\Controllers\GroupeController@show')->name('classe');

//Route vers le choix et vue de la classe côté élève
Route::get('/eleves/create', 'App\Http\Controllers\EleveController@create');
Route::post('/eleves', 'App\Http\Controllers\EleveController@store');
Route::get('/eleves/{idutilisateur}', 'App\Http\Controllers\EleveController@show')->name('classe-eleve');

//Route vers les questionnaires, questions, réponses, enquetes
//Questionnaire
Route::get('/questionnaires/create', 'App\Http\Controllers\QuestionnaireController@create');
Route::post('/questionnaires','App\Http\Controllers\QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}','App\Http\Controllers\QuestionnaireController@show');

//Questions
Route::get('/questionnaires/{questionnaire}/questions/create', 'App\Http\Controllers\QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'App\Http\Controllers\QuestionController@store');

//Enquete
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'App\Http\Controllers\QuestionController@destroy');
Route::get('/surveys/{questionnaire}-{slug}','App\Http\Controllers\EnqueteController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'App\Http\Controllers\EnqueteController@store');

Route::get('/surveys/merci', 'App\Http\Controllers\EnqueteController@merci');


//Route vers les choix et vue des matières
Route::get('/matieres/create', 'App\Http\Controllers\MatiereController@create');
Route::post('/matieres', 'App\Http\Controllers\MatiereController@store');
Route::get('/matières/{matiere}', 'App\Http\Controllers\MatiereController@show');


//route Dropzone
Route::get('/images', 'App\Http\Controllers\DropzoneController@index');
Route::post('/images','App\Http\Controllers\DropzoneController@store')->name('images');
//Route::get('/download/{iddropzone}','App\Http\Controllers\DropzoneController@store');
Route::delete('/images/{imageUpload}', 'App\Http\Controllers\DropzoneController@destroy');

//download des documents home.blade
Route::get('/download/{iddropzone}/download','App\Http\Controllers\HomeController@download')->name('download');
//download des documents dropzone.blade
Route::get('/download/{iddropzone}/download','App\Http\Controllers\DropzoneController@download')->name('download');
//download des documents dashboard.blade
Route::get('/download/{iddropzone}/download','App\Http\Controllers\DashboardController@download')->name('download');


//Route vers entrées résultats par élève
Route::get('/resultat/create', 'App\Http\Controllers\ResultatController@create');
Route::post('/resultat', 'App\Http\Controllers\ResultatController@store');
Route::get('/resultat/{resultat}', 'App\Http\Controllers\ResultatController@show' );

//Route dasboard eleve
Route::get('/eleves/', 'App\Http\Controllers\EleveController@index')->name('dashboardEleve');

//Route des categories
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category');
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store');
Route::delete('/category', 'App\Http\Controllers\CategoryController@store')->name('category.destroy');
//vue pour une categorie filtrée depuis Home
Route::get('/categ/{idcategorie}', 'App\Http\Controllers\CategoryController@show')->name('categ');

//route contact form
Route::get('/contact', 'App\Http\Controllers\ContactController@index');
Route::post('/contact',  'App\Http\Controllers\ContactController@store')->name('contact.store');


