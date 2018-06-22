<?php

namespace App\Repositories\RedemptionCenterTruck;

use DB;
use App\RedemptionCenter;
use App\RedemptionCenterTruck;
use App\Repositories\RedemptionCenterTruck\RedemptionCenterTruckContract;

class EloquentRedemptionCenterTruckRepository implements RedemptionCenterTruckContract
{
    public function create($request) {
        $rCenter = new RedemptionCenter;
        $rCenter->date = $this->correctDate($request);
        $rCenter->time = $request->time;
        $rCenter->number = $request->number;
        $rCenter->center_id = $request->center;
        $rCenter->save();
        return $rCenter;
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