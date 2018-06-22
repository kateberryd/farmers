<?php

namespace App\Repositories\Ward;

use App\Ward;
use App\LocalGovernment;
use App\RedemptionCenter;
use App\Repositories\Ward\WardContract;

class EloquentWardRepository implements WardContract
{
    public function create($name, $lgaId, $uniqueCenterId) {
        $localGovernment = LocalGovernment::find($lgaId);
        $rCenter = RedemptionCenter::where('unique_center_id', $uniqueCenterId)->first();
        $ward = $localGovernment->wards()->create([
            'name' => $name,
            'center_id' => $uniqueCenterId
        ]);
        return $ward->id;
    }
}
