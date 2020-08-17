<?php


namespace App\Http\Controllers\Ranking;


use App\Contracts\Controllers\Ranking\RankingControllerContract;

class RankingController implements RankingControllerContract
{

    public function pvp()
    {
        $rankingService = app('App\Contracts\Services\Ranking\RankingServiceContract');
        return response()->json($rankingService->ranking('pvpkills'));
    }

    public function pk()
    {
        $rankingService = app('App\Contracts\Services\Ranking\RankingServiceContract');
        return response()->json($rankingService->ranking('pkkills'));
    }
}
