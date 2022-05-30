<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Rank;

class Games extends Model
{
    use HasFactory;

    public function newRank($game)
    {
        if ($game->goals_team_1 == $game->goals_team_2 && $game->championship_stage != 1) {
            $time = $game->team->orderBy('created_at', 'desc')->first();
            $this->setRank($game->championship, $time->id, 1, 1);
            return true;
        }
        $this->setRank($game->championship, $game->team->id, $game->goals_team_1, $game->goals_team_2);
        $this->setRank($game->championship, $game->team2->id, $game->goals_team_2, $game->goals_team_1);
        return true;
    }

    private function setRank($championship, $team_id, $goals_team_1, $goals_team_2)
    {

        $rank = Rank::where('championship_id', $championship->id)->where('team_id', $team_id)->first();
        if (!is_null($rank)) {
            $rank->championship_id = $championship->id;
            $rank->team_id = $team_id;
            $rank->goals = $championship->points($goals_team_1, $goals_team_2);
            if ($rank->goals > 0) $rank->points = ++$rank->points;
        } else {
            $rank = new Rank();
            $rank->championship_id = $championship->id;
            $rank->team_id = $team_id;
            $rank->goals = $championship->points($goals_team_1, $goals_team_2);
            if ($rank->goals > 0) $rank->points = ++$rank->points;
        }
        if ($rank->save()) return true;
        return false;
    }

    public function championship()
    {
        return $this->belongsTo('App\Models\Championship');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team_id_2');
    }
}
