<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Games;

class Championship extends Model
{
    use HasFactory;

    public function loadGames()
    {
        $teams = $this->games;


        if ($this->group_stage == 3 && $teams->where('is_finished', 1)->where('championship_stage', 2)->count() == 2) {
            $random_times = $this->retWinners(2);


            $this->setGame(1, $random_times);
        }
        if ($this->group_stage == 2 && $teams->where('is_finished', 1)->where('championship_stage', 1)->count() == 4) {

            $random_times = $this->retWinners(1);


            $this->setGame(2, $random_times);
        }
        if ($this->group_stage == 1) {
            $times = $this->teamsinchampionship()->get();
            $random_times = [];
            foreach ($times as $time) {
                $random_times[] = $time->team_id;
            }
            $this->setGame(4, $random_times);
        }
    }
    private function setGame($qtn, $random_times)
    {
        $i = 0;
        while ($i < $qtn) {
            $team = $random_times[array_rand($random_times)];
            $random_times = $this->removeElementArray($random_times, $team);
            $team2 = $random_times[array_rand($random_times)];
            $random_times = $this->removeElementArray($random_times, $team2);
            $game = new Games();
            $game->team_id = $team;
            $game->team_id_2 = $team2;
            $game->championship_id = $this->id;
            $game->championship_stage = $this->group_stage;
            $game->save();
            $i++;
        }
        $this->group_stage++;
    }
    private function retTimes($stage)
    {
        $championship = Championship::find($this->id);
        $times = $championship->games->where('championship_stage', $stage);
        return $times;
    }

    private function retWinners($stage)
    {
        $teams = [];
        foreach ($this->retTimes($stage) as $time) {

            if ($time->goals_team_1 > $time->goals_team_2 && $time->is_finished) {
                $teams[] =  $time->team_id;
            } else if ($time->goals_team_1 < $time->goals_team_2 && $time->is_finished) {
                $teams[] = $time->team_id_2;
            } else if ($time->goals_team_1 == 0 && $time->goals_team_2 == 0 && $time->is_finished) {
                if (strtotime($time->team->created_at) < strtotime($time->team2->created_at)) {
                    $teams[] = $time->team_id;
                } else {
                    $teams[] = $time->team_id_2;
                }
            }
        }
        return $teams;
    }
    private function removeElementArray($array, $element)
    {
        $index = array_search($element, $array);
        if ($index !== false) {
            unset($array[$index]);
        }
        return $array;
    }
    public function points($val1, $val2)
    {
        return $val1 - $val2;
    }
    public function teamsinchampionship()
    {
        return $this->hasMany('App\Models\TeamsInChampionship');
    }

    public function games()
    {
        return $this->hasMany('App\Models\Games');
    }

    public function rank(){
        return $this->hasMany('App\Models\Rank');
    }
}
