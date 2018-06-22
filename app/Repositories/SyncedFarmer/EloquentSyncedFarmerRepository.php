<?php

namespace App\Repositories\SyncedFarmer;

use App\SyncedFarmer;
use App\Repositories\SyncedFarmer\SyncedFarmerContract;

class EloquentSyncedFarmerRepository implements SyncedFarmerContract
{
    public function create($request) {
        $syncedFarmer = new SyncedFarmer;
        $syncedFarmer->name = $request->name;
        $syncedFarmer->center_num = $request->center_num;
        $syncedFarmer->transaction_id = $request->transaction_id;
        $syncedFarmer->barcode = $request->barcode;
        $syncedFarmer->photo = $request->photo;
        $syncedFarmer->save();
        return $syncedFarmer;
    }
    
    public function isSynced($barcode) {
        $match = SyncedFarmer::where('barcode', $barcode)->first();
        return is_null($match) ? false : true;
    }
}
