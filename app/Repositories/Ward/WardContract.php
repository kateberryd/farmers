<?php

namespace App\Repositories\Ward;

interface WardContract
{
    public function create($name, $lgaId, $uniqueCenterId);
}
