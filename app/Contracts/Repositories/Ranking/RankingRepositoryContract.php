<?php


namespace App\Contracts\Repositories\Ranking;


interface RankingRepositoryContract
{
    public function ranking(string $type);
}
