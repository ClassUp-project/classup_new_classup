<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



require __DIR__.'/auth.php';

Route::get('/home', 'App\Http\Controllers\HomeController@index');

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
Route::get('/download/{iddropzone}','App\Http\Controllers\DropzoneController@store');
Route::delete('/images/{imageUpload}', 'App\Http\Controllers\DropzoneController@destroy');


//Route dasboard eleve
Route::get('/eleves/', 'App\Http\Controllers\EleveController@index')->name('dashboardEleve');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
