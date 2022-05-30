<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('app.team.index', ['teams' => $teams]);
    }

    public function create()
    {
        $teams = Team::all();
        return view('app.team.create');
    }

    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->year = $request->year;
        $team->save();
        return redirect()->route('teams');
    }

    public function show($id)
    {
        $team = Team::find($id);
        return view('app.team.show', ['team' => $team]);
    }

    public function edit($id)
    {
        $team = Team::find($id);
        return view('app.team.edit', ['team' => $team]);
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team->name = $request->name;
        $team->year = $request->year;
        $team->save();
        return redirect()->route('teams');
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        if (count($team->teamsinchampionship) <= 0) {
            $team->delete();
            return redirect()->route('teams')->with('success', 'Time deletado com sucesso!');
        }
        return redirect()->route('teams')->with('error', 'Time não pode ser deletado!');
    }
}
