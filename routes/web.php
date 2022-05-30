<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ChampionshipController;
use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;



Route::prefix('/')->group(function () {

    //Routes for Teams
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/teams', [TeamController::class, 'index'])->name('teams');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/create', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/edit/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::get('/teams/destroy/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    //End of Routes for Teams

    //Routes for Championships
    Route::get('/championships', [ChampionshipController::class, 'index'])->name('championships');
    Route::get('/championships/create', [ChampionshipController::class, 'create'])->name('championships.create');
    Route::post('/championships/create', [ChampionshipController::class, 'store'])->name('championships.store');
    Route::get('/championships/{id}', [ChampionshipController::class, 'show'])->name('championships.show');
    Route::get('/championships/edit/{id}', [ChampionshipController::class, 'edit'])->name('championships.edit');
    Route::post('/championships/edit/{id}', [ChampionshipController::class, 'update'])->name('championships.update');
    Route::get('/championships/destroy/{id}', [ChampionshipController::class, 'destroy'])->name('championships.destroy');
    //End of Routes for Championships

    //Routes for Teams in Championships
    Route::get('/championships/{id}/teams', [ChampionshipController::class, 'teams'])->name('championships.teams');
    Route::get('/championships/{id}/teams/create', [ChampionshipController::class, 'teamsCreate'])->name('championships.teams.create');
    Route::post('/championships/{id}/teams/create', [ChampionshipController::class, 'teamsStore'])->name('championships.teams.store');
    Route::get('/championships/{id}/teams/destroy/{team_id}', [ChampionshipController::class, 'teamsDestroy'])->name('championships.teams.destroy');
    //End of Routes for Teams in Championships

    //Routes for Games in Championships
    Route::get('/championships/{id}/games', [GamesController::class, 'index'])->name('championships.games');
    Route::get('/championships/{id}/games/ranking', [GamesController::class, 'ranking'])->name('championships.games.ranking');
    Route::get('/championships/{id}/games/create', [GamesController::class, 'create'])->name('championships.games.create');
    Route::get('/championships/{id}/games/show', [GamesController::class, 'show'])->name('championships.games.show');
    Route::get('/championships/{id}/games/edit/{id_game}', [GamesController::class, 'edit'])->name('championships.games.edit');
    Route::post('/championships/{id}/games/edit/{id_game}', [GamesController::class, 'update'])->name('championships.games.update');
});
