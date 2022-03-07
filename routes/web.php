<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitionHeatResultController;
use App\Http\Controllers\CompetitionRaceController;
use App\Http\Controllers\CompetitionTeamController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\RaceViewController;
use App\Http\Controllers\TeamController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('club',ClubController::class)->middleware(["auth"]);
Route::resource('team',TeamController::class)->middleware(["auth"]);
Route::resource('competition',CompetitionController::class)->middleware(["auth"]);
Route::get('/competition/{competition}/competition_teams/add', [CompetitionTeamController::class, 'add'])->middleware(["auth"]);
Route::resource('competition.competition_teams', CompetitionTeamController::class)->middleware(["auth"]);
Route::resource('competition.competition_races', CompetitionRaceController::class)->middleware(["auth"]);
Route::post('/competition/{competition}/competition_races/{race}/results/{heat}/update', [CompetitionHeatResultController::class, 'update'])->middleware(["auth"]);
Route::get('/competition/{competition}/competition_races/{race}/results/{heat}/edit', [CompetitionHeatResultController::class, 'edit'])->middleware(["auth"]);
Route::resource('dog',DogController::class)->middleware(["auth"]);
Route::get('/race-view/{race}/{heat}/dogs',[RaceViewController::class, "dogs"]);
Route::get('/race-view/{race}/{heat}/scores',[RaceViewController::class, "scores"]);
require __DIR__.'/auth.php';
