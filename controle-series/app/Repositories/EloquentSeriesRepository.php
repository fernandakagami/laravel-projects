<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use App\Models\Episode;
use App\Models\Season;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request) {
            $serie = Series::create($request->all());

            $season = [];
            $episodes = [];
    
            for($i = 1; $i <= $request->seasonsQty; $i++) {
                $season[] = [
                    'series_id' => $serie->id,
                    'number' => $i,
                ];
            }
    
            Season::insert($season);
    
            foreach ($serie->seasons as $season) {
                for($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }                        
            } 
            
            Episode::insert($episodes);

            return $serie;
            
        });        

    }
    
}
