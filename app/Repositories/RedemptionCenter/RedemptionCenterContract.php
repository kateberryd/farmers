<?php

namespace App\Repositories\RedemptionCenter;

interface RedemptionCenterContract
{
    public function create($name);
    public function findByUniqueId($uniqueCenterId);
    public function getWards($uniqueCenterId);
    public function getFarmers($uniqueCenterId);
    public function getAll();
    public function getFarmerCount($uniqueCenterId);
    public function getWardCount($uniqueCenterId);
    public function getPayments($uniqueCenterId);
    public function getLocalGovernment($uniqueCenterId);
}
