<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Repositories\SyncedFarmer\EloquentSyncedFarmerRepository;

class SyncedFarmerController extends Controller
{
    protected $syncedFarmerModel;
    public function __construct(EloquentSyncedFarmerRepository $syncedFarmerContract) {
        $this->syncedFarmerModel = $syncedFarmerContract;
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'transaction_id' => 'required',
            'barcode' => 'required',
            'center_num' => 'required'
        ]);
        
        if ($validator->fails()) {
            Log::error('Farmer details did not pass validation. All fields are required');
            return response()->json([
                'status' => 'failed',
                'message' => 'Farmer details did not pass validation. All fields are required'
            ], 500);
        }
        
        if ($this->syncedFarmerModel->isSynced($request->barcode)) {
            Log::error('Farmer details have been synced already. Barcode: '.$request->barcode);
            return response()->json([
                'status' => 'failed',
                'message' => 'Farmer details have been synced already. Barcode: '.$request->barcode
            ], 500);
        }
        
        $syncedFarmer = $this->syncedFarmerModel->create($request);
        if (is_object($syncedFarmer)) {
            Log::info('Farmer details have been successfully synced!');
            return response()->json([
                'status' => 'success',
                'message' => 'Farmer details have been successfully synced!',
                'sycnedFarmer' => $syncedFarmer
            ], 200);
        } else {
            Log::error('There was a problem syncing the farmer details');
            return response()->json([
                'status' => 'failed',
                'message' => 'There was a problem syncing the farmer details'
            ], 500);
        }
    }
}
