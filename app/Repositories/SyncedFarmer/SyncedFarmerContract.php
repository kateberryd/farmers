<?php

namespace App\Repositories\SyncedFarmer;

interface SyncedFarmerContract
{
    public function create($request);
    public function isSynced($barcode);
}
