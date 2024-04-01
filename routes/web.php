<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormGPTController;

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
        ->middleware(['auth', 'can:isAdmin'])
        ->name('dashboard');
Route::delete('/dashboard/{questionnaire}', 'App\Http\Controllers\DashboardController@destroy');
Route::delete('/filedelete/{dropzone}', 'App\Http\Controllers\DashboardController@delete')->name('filedelete');
Route::delete('/notedelete/{resultat}', 'App\Http\Controllers\DashboardController@deletenote')->name('notedelete');
Route::post('/dashboard', 'App\Http\Controllers\DashboardController@storeEleve');

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
Route::get('/questionnaires/create', 'App\Http\Controllers\QuestionnaireController@create')
        ->middleware(['auth', 'can:isAdmin']);
Route::post('/questionnaires','App\Http\Controllers\QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}','App\Http\Controllers\QuestionnaireController@show');

//Questions
Route::get('/questionnaires/{questionnaire}/questions/create', 'App\Http\Controllers\QuestionController@create')
        ->middleware(['auth', 'can:isAdmin']);
Route::post('/questionnaires/{questionnaire}/questions', 'App\Http\Controllers\QuestionController@store');

//Enquete
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'App\Http\Controllers\QuestionController@destroy')
        ->middleware(['auth', 'can:isAdmin']);
Route::get('/surveys/{questionnaire}-{slug}','App\Http\Controllers\EnqueteController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'App\Http\Controllers\EnqueteController@store');

Route::get('/surveys/merci', 'App\Http\Controllers\EnqueteController@merci');


//Route vers les choix et vue des matières
Route::get('/matieres/create', 'App\Http\Controllers\MatiereController@create')
        ->middleware(['auth', 'can:isAdmin']);
Route::post('/matieres', 'App\Http\Controllers\MatiereController@store');
Route::get('/matières/{matiere}', 'App\Http\Controllers\MatiereController@show');


//route Dropzone
Route::get('/telechargement', 'App\Http\Controllers\DropzoneController@index')->middleware(['auth', 'can:isAdmin'])->name('telechargement');
Route::post('/telechargement','App\Http\Controllers\DropzoneController@store')->name('telechargement');
//Route::get('/download/{iddropzone}','App\Http\Controllers\DropzoneController@store');
Route::delete('/telechargement/{imageUpload}', 'App\Http\Controllers\DropzoneController@destroy')
        ->middleware(['auth', 'can:isAdmin']);;

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
Route::get('/resultat_detail/{idresultat}', 'App\Http\Controllers\ResultatController@show_detail')->name('resultat_detail');

//Route dasboard eleve
Route::get('/eleves/', 'App\Http\Controllers\EleveController@index')->name('dashboardEleve');

//Route des categories
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category');
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store');
Route::delete('/category', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');
//vue pour une categorie filtrée depuis Home
Route::get('/categ/{idcategorie}', 'App\Http\Controllers\CategoryController@show')->name('categ');
//toutes les catégories
Route::get('/toutescateg', 'App\Http\Controllers\CategoryController@allCateg')->name('toutescateg');

//route contact form
Route::get('/contact', 'App\Http\Controllers\ContactController@index');
Route::post('/contact',  'App\Http\Controllers\ContactController@store')->name('contact.store');

//route pour les cours
Route::get('/cours', 'App\Http\Controllers\CoursController@index')->name('cours');
Route::get('/cours_details/{iddropzone}', 'App\Http\Controllers\CoursController@show')->name('cours_details');


/**
* Verification Routes
*/
Route::get('/email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');


/**
 * Route FormGPT
 */
Route::get('/formAI/', 'App\Http\Controllers\FormGPTController@index')->middleware(['auth', 'can:isAdmin'])->name('formAi');
Route::post('/formAI', 'App\Http\Controllers\FormGPTController@SaveForm')->middleware(['auth', 'can:isAdmin'])->name('formAi');
Route::get('/formAI', [FormGPTController::class, 'showResponse'])->middleware(['auth', 'can:isAdmin'])->name('formAi');
