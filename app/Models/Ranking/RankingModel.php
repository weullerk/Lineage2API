<?php


namespace App\Models\Ranking;


use App\Contracts\Models\Ranking\RankingModelContract;

class RankingModel implements RankingModelContract
{
    public $position;
    public $name;
    public $score;
}
