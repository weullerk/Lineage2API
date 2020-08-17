<?php


namespace App\Services\Ranking;


use App\Contracts\Services\Ranking\RankingServiceContract;

class RankingService implements RankingServiceContract
{

    public function ranking(string $type)
    {
        $rankingRepository = app('App\Contracts\Repositories\Ranking\RankingRepositoryContract');
        return $rankingRepository->ranking($type);
    }
}
