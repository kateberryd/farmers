<?php

namespace App\Repositories\LocalGovernment;

use DB;
use App\Ward;
use App\LocalGovernment;
use App\RedemptionCenter;
use App\Repositories\LocalGovernment\LocalGovernmentContract;

class EloquentLocalGovernmentRepository implements LocalGovernmentContract
{
    public function create($name) {
        $localGovernment = new LocalGovernment;
        $localGovernment->name = $name;
        $localGovernment->save();
        return $localGovernment->id;
    }

    public function findById($lgaId) {
        return LocalGovernment::find($lgaId);
    }
    
    public function pluckAll() {
        return LocalGovernment::pluck('name', 'id');
    }

    public function getAll() {
        return LocalGovernment::all();
    }

    public function getWards($lgaId) {
        return Ward::where('local_government_id', $lgaId)->get();
    }

    public function getCenters($lgaId) {
        $wards = DB::table('wards')->where('local_government_id', $lgaId)->get();
        $centerIds = array();
        $centers = array();
        foreach ($wards as $ward) {
            array_push($centerIds, $ward->center_id);
        }
        
        $centerIds = array_unique($centerIds);
        foreach ($centerIds as $centerId) {
            array_push($centers, DB::table('redemption_centers')->where('unique_center_id', $centerId)->first());
        }

        return $centers;
    }
    
    public function getFarmers($lgaId) {
        $centers = $this->getCenters($lgaId);
        $farmers = array();
        foreach ($centers as $center) {
            $centerFarmers = DB::table('farmers')->where('center_num', $center->unique_center_id)->get()->toArray();
            if (empty($centerFarmers)) {
                continue;
            }
            array_push($farmers, $centerFarmers);
        }
        
        return $farmers;
    }
    
    public function getFarmerCount($lgaId) {
        $centers = $this->getCenters($lgaId);
        $farmerCount = 0;
        foreach ($centers as $center) {
            $centerFarmers = DB::table('farmers')->where('center_num', $center->unique_center_id)->get()->toArray();
            if (empty($centerFarmers)) {
                continue;
            }
            $farmerCount += count($centerFarmers);
        }
        
        return $farmerCount;
    }
}