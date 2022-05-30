<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Championship;
use App\Models\TeamsInChampionship;
use App\Models\Team;

class ChampionshipController extends Controller
{
    public function index()
    {
        $championships = Championship::all();
        return view('app.championship.index', ['championships' => $championships]);
    }

    public function create()
    {
        return view('app.championship.create');
    }

    public function store(Request $request)
    {
        $championship = new Championship();
        $championship->name = $request->name;
        $championship->save();
        return redirect()->route('championships');
    }

    public function show($id)
    {
        $championship = Championship::find($id);
        return view('app.championship.show', ['championship' => $championship]);
    }

    public function edit($id)
    {
        $championship = Championship::find($id);
        return view('app.championship.edit', ['championship' => $championship]);
    }

    public function update(Request $request, $id)
    {
        $championship = Championship::find($id);
        $championship->name = $request->name;
        $championship->save();
        return redirect()->route('championships');
    }

    public function destroy($id)
    {
        $championship = Championship::find($id);
        if (count($championship->games) <= 0) {
            $championship->delete();
            return redirect()->route('championships')->with('success', 'Campeonato deletado com sucesso!');
        }
        return redirect()->route('championships')->with('error', 'Campeonato não pode ser deletado!');
    }

    public function teams($id)
    {
        $championship = Championship::find($id);
        return view('app.championship.teams', ['championship' => $championship]);
    }

    public function teamsCreate($id)
    {
        $championship = Championship::find($id);
        $times = Team::all();
        return view('app.championship.teamsCreate', ['championship' => $championship, 'teams' => $times]);
    }

    public function teamsStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->mensagens());
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        $championship = new TeamsInChampionship();
        if (count($championship::where('championship_id', $id)->get()) < 8) {
            $championship->championship_id = $id;
            $championship->team_id = $request->team_id;
            $championship->save();
            return redirect()->route('championships.teams', ['id' => $id])->with('success', 'Cadastro salvo com suceso.');
        }
        return redirect()->route('championships.teams', ['id' => $id])->with('error', 'Erro de execução, quantidade máxima atingida.');
    }

    public function teamsDestroy($id, $team_id)
    {

        $championship = TeamsInChampionship::find($team_id);
        $championship->delete();
        return redirect()->route('championships.teams', ['id' => $id]);
    }

    protected function rules()
    {
        return [
            'team_id' => 'required'
        ];
    }

    protected function mensagens()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
        ];
    }
}
