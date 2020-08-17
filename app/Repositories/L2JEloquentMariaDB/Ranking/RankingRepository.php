<?php


namespace App\Repositories\L2JEloquentMariaDB\Ranking;


use App\Contracts\Repositories\Ranking\RankingRepositoryContract;

class RankingRepository implements RankingRepositoryContract
{
    public function ranking(string $type)
    {
        $ranking = [];
        $characters = app('App\Contracts\Repositories\Character\CharacterEntityContract')
            ::orderBy($type, 'desc')
            ->limit(50)
            ->get();

        for ($i = 1; $i < count($characters); $i++) {
            $model = app('App\Contracts\Models\Ranking\RankingModelContract');
            $model->position = $i;
            $model->name = $characters[$i-1]['char_name'];
            $model->model = $characters[$i-1][$type];

            $ranking[] = $model;
        }
    }
}
