<?php

namespace App\Repositories\LocalGovernment;

interface LocalGovernmentContract
{
    public function create($name);
    public function findById($lgaId);
    public function pluckAll();
    public function getAll();
    public function getWards($lgaId);
    public function getCenters($lgaId);
    public function getFarmers($lgaId);
}
