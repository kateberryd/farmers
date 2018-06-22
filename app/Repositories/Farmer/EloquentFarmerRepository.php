<?php

namespace App\Repositories\Farmer;

use Carbon\Carbon;
use DB;
use Auth;
use App\Ward;
use App\Farmer;
use App\RedemptionCenter;
use App\Repositories\Farmer\FarmerContract;

class EloquentFarmerRepository implements FarmerContract
{
    public function create($request) {
        return DB::table('farmers')->insert([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'marital_status' => $request->marital_status,
            'farm_size' => $request->farm_size,
            'household_size' => $request->household_size,
            'phone_number' => $request->phone_number,
            'avg_income_non_farming' => $request->avg_income_non_farming,
            'avg_income_farming' => $request->avg_income_farming,
            'dry_season_business' => $request->dry_season_business,
            'distance_to_market' => $request->distance_to_market,
            'produce_storage_capacity' => $request->produce_storage_capacity,
            'cooperative_membership' => $request->cooperative_membership,
            'center_number' => $request->center_number,
            'center_name' => $request->center_name,
            'personal_serial_number' => $request->personal_serial_number,
            'major_crops' => $request->major_crops,
            'major_livestock' => $request->major_livestock,
            'inputs_and_quantities' => $request->_farminputs,
            'entered_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'center_num' => $request->center_number
        ]);
    }
    
    public function edit($farmerId, $request) {
        return DB::table('farmers')->where('id', $farmerId)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'marital_status' => $request->marital_status,
            'farm_size' => $request->farm_size,
            'household_size' => $request->household_size,
            'phone_number' => $request->phone_number,
            'avg_income_non_farming' => $request->avg_income_non_farming,
            'avg_income_farming' => $request->avg_income_farming,
            'dry_season_business' => $request->dry_season_business,
            'distance_to_market' => $request->distance_to_market,
            'produce_storage_capacity' => $request->produce_storage_capacity,
            'cooperative_membership' => $request->cooperative_membership,
            'center_number' => $request->center_number,
            'center_name' => $request->center_name,
            'personal_serial_number' => $request->personal_serial_number,
            'major_crops' => $request->major_crops,
            'major_livestock' => $request->major_livestock,
            'inputs_and_quantities' => $request->_farminputs,
            'updated_at' => Carbon::now(),
            'center_num' => $request->center_number
        ]);
    }
    
    public function getAll() {
        return DB::table('farmers')
            ->where('name', '<>', '')
            ->orderBy('name', 'asc')
            ->get();
    }
    
    public function findById($farmerId) {
        return DB::table('farmers')->where('id', $farmerId)->first();
    }
    
    public function findByPhoneOrName($searchTerm) {
        return DB::table('farmers')->where('phone_number', $searchTerm)
            ->orWhere('name', 'LIKE', '%'.$searchTerm.'%')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function remove($farmerId) {
        DB::table('farmers')->where('id', $farmerId)->delete();
        return true;
    }

    public function findByMajorCrops($searchedcrops) {
        $queryCrops = explode(',', $searchedcrops); // convert crops request to array
        $allFarmers = $this->getAll(); // find all farmers
        $farmersMajorCrops = array(); // empty associative array that links farmer to their major crops via id
        $result = array(); // final result that'll contain farmers that meet crop search criteria

        foreach ($allFarmers as $farmer) {
            $rawCropsArray = explode(',', $farmer->major_crops); // convert the farmer's major crops as it was entered into an array
            $casedCropsArray = array(); // array that'll hold the lower case version of each of the farmer's major crops
            foreach ($rawCropsArray as $crop) {
                array_push($casedCropsArray, strtolower($crop)); // push a lower case string of the as is crop to the cased array variable
            }
            $farmersMajorCrops[$farmer->id] = $casedCropsArray; // after creating lower case array, associate the farmer their crops
        }

        foreach ($farmersMajorCrops as $key => $value) { // loop through the associative array
            foreach ($queryCrops as $queryCrop) { // loop through each requested crop
                if (in_array(strtolower($queryCrop), $value)) {
                    // if the requested crop is found in the farmers crops, add the Farmer to result and break!
                    array_push($result, $this->findById($key));
                    break;
                }
            }
        }

        return $result;
    }

    public function findByMajorLivestock($searchedlivestock) {
        $queryLivestock = explode(',', $searchedlivestock); // convert livestock request to array
        $allFarmers = $this->getAll(); // find all farmers
        $farmersMajorLiveStock = array(); // empty associative array that links farmer to their major livestock via id
        $result = array(); // final result that'll contain farmers that meet livestock search criteria

        foreach ($allFarmers as $farmer) {
            $rawLivestockArray = explode(',', $farmer->major_livestock); // convert the farmer's major livestock as it was entered into an array
            $casedLivestockArray = array(); // array that'll hold the lower case version of each of the farmer's major livestock
            foreach ($rawLivestockArray as $livestock) {
                // push a lower case string of the as is livestock to the cased array variable
                array_push($casedLivestockArray, strtolower($livestock));
            }
            $farmersMajorLivestock[$farmer->id] = $casedLivestockArray; // after creating lower case array, associate the farmer their livestock
        }

        foreach ($farmersMajorLivestock as $key => $value) { // loop through the associative array
            foreach ($queryLivestock as $livestock) { // loop through each requested livestock
                if (in_array(strtolower($livestock), $value)) {
                    // if the requested livestock is found in the farmers livestock, add the Farmer to result and break!
                    array_push($result, $this->findById($key));
                    break;
                }
            }
        }

        return $result;
    }
}
