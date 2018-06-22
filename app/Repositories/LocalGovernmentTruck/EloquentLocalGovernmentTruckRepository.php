<?php

namespace App\Repositories\LocalGovernmentTruck;

use DB;
use App\LocalGovernment;
use App\LocalGovernmentTruck;
use App\Repositories\LocalGovernmentTruck\LocalGovernmentTruckContract;

class EloquentLocalGovernmentTruckRepository implements LocalGovernmentTruckContract
{
    public function create($request) {
        $lga = LocalGovernment::find($request->local_government);
        $localGovernmentTruck = $lga->localGovernmentTrucks()->create([
            'date' => $this->correctDate($request),
            'time' => $request->time,
            'number' => $request->number
        ]);
        
        return $localGovernmentTruck;
    }
    
    public function getLocalGovernmentTrucks($lgaId) {
        $lga = LocalGovernment::find($lgaId);
        return LocalGovernmentTruck::where('local_government_id', $lga->id)->get();
    }
    
    public function getLocalGovernmentTruckCount($lgaId) {
        $lga = LocalGovernment::find($lgaId);
        $trucks = $this->getLocalGovernmentTrucks($lgaId);
        $count = 0;
        foreach ($trucks as $truck) {
            $count += $truck->number;
        }
        
        return $count;
    }
    
    private function correctDate($request) {
        $requestDate = array();
        $requestDate[0] = substr($request->date, 0, 2);
        $requestDate[1] = substr($request->date, 3, 2);
        $requestDate[2] = substr($request->date, -4);
        $temp = $requestDate[1];
        $requestDate[1] = $requestDate[0];
        $requestDate[0] = $temp;
        
        return implode('/', $requestDate);
    }
}