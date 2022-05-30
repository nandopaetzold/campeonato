<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index($id)
    {
        $championship = Championship::find($id);

        return view('app.games.index', compact('championship'));
    }

    public function ranking($id)
    {
        $championship = Championship::find($id);
        return view('app.games.ranking', compact('championship'));
    }

    public function create($id)
    {
        $championship = Championship::find($id);
        if (count($championship->teamsinchampionship) == 8) {
            $championship->loadGames();
            $championship->save();
            return redirect()->route('championships.games.show', $championship->id);
        }

        return redirect()->back()->with('error', 'Não é possível criar os jogos, pois o campeonato não possui 8 times!');
    }

    public function show($id)
    {
        $championship = Championship::find($id);
        return view('app.games.show', compact('championship'));
    }

    public function edit($id, $id_game)
    {
        $championship = Championship::find($id);
        $game = $championship->games->find($id_game);
        return view('app.games.edit', compact('championship', 'game'));
    }

    public function update(Request $request, $id, $id_game)
    {
        $championship = Championship::find($id);
        $game = $championship->games->find($id_game);
        $game->goals_team_1 = $request->goals_team_1;
        $game->goals_team_2 = $request->goals_team_2;
        $game->is_finished = ($request->is_finished == 1) ? 1 : 0;

        if ($game->is_finished == 1) {
            $game->newRank($game);
        }
        $game->save();
        return redirect()->route('championships.games.show', $championship->id);
    }
}
