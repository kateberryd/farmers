<?php

namespace App\Repositories\Farmer;

interface FarmerContract
{
    public function create($request);
    public function edit($farmerId, $request);
    public function getAll();
    public function findById($farmerId);
    public function findByPhoneOrName($searchTerm);
    public function remove($farmerId);
    public function findByMajorCrops($searchedcrops);
    public function findByMajorLivestock($searchedlivestock);
}
