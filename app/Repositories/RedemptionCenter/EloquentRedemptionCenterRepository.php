<?php

namespace App\Repositories\RedemptionCenter;

use DB;
use App\Ward;
use App\SyncedFarmer;
use App\RedemptionCenter;
use App\Repositories\RedemptionCenter\RedemptionCenterContract;

class EloquentRedemptionCenterRepository implements RedemptionCenterContract
{
    public function create($name) {
        $rCenter = new RedemptionCenter;
        $rCenter->name = $name;
        $rCenter->unique_center_id = $this->uniqueId();
        $rCenter->save();
        return $rCenter->unique_center_id;
    }

    public function findByUniqueId($uniqueCenterId) {
        return RedemptionCenter::where('unique_center_id', $uniqueCenterId)->first();
    }

    public function getWards($uniqueCenterId) {
        return Ward::where('center_id', $uniqueCenterId)->get();
    }

    public function getFarmers($uniqueCenterId) {
        return DB::table('farmers')->where('center_num', $uniqueCenterId)
            ->where('name', '<>', '')
            ->orderBy('name', 'asc')
            ->get();
    }
    
    public function getAll() {
        return RedemptionCenter::all();
    }
    
    public function getFarmerCount($uniqueCenterId) {
        $farmers = DB::table('farmers')->where('center_num', $uniqueCenterId)->get();
        return count($farmers);
    }
    
    public function getWardCount($uniqueCenterId) {
        $wards = DB::table('wards')->where('center_id', $uniqueCenterId)->get();
        return count($wards);
    }
    
    public function getPayments($uniqueCenterId) {
        return SyncedFarmer::where('center_num', $uniqueCenterId)->get();
    }
    
    public function getLocalGovernment($uniqueCenterId) {
        $ward = DB::table('wards')->where('center_id', $uniqueCenterId)->first();
        $lga = DB::table('local_governments')->where('id', $ward->local_government_id)->first();
        return $lga;
    }
    
    private function verifyUniqueId($uniqueId) {
        $match = RedemptionCenter::where('unique_center_id', $uniqueId)->get();
        return (count($match) == 0) ? true : false;
    }

    private function uniqueId() {
        $generatedKey = sha1(mt_rand(10000,99999).time());
        $unique = substr($generatedKey, 0, 8);
        $verificationResult = $this->verifyUniqueId($unique);
        while ($verificationResult == false) {
            $generatedKey = sha1(mt_rand(10000,99999).time());
            $unique = substr($generatedKey, 0, 8);
            $verificationResult = $this->verifyUniqueId($unique);
        }

        return $unique;
    }
}
