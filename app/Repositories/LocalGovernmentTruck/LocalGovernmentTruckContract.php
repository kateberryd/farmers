<?php

namespace App\Repositories\LocalGovernmentTruck;

interface LocalGovernmentTruckContract
{
    public function create($request);
    public function getLocalGovernmentTrucks($lgaId);
    public function getLocalGovernmentTruckCount($lgaId);
}
