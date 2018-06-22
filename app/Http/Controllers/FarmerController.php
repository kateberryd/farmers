<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Repositories\Ward\EloquentWardRepository;
use App\Repositories\LocalGovernment\EloquentLocalGovernmentRepository;
use App\Repositories\RedemptionCenter\EloquentRedemptionCenterRepository;
use App\Repositories\Farmer\EloquentFarmerRepository;

class FarmerController extends Controller
{
    protected $genders = [
        'MALE' => 'MALE',
        'FEMALE' => 'FEMALE'
    ];
    protected $options = [
        'YES' => 'YES',
        'NO' => 'NO'
    ];
    protected $maritalstatus = [
        'SINGLE' => 'SINGLE',
        'MARRIED' => 'MARRIED',
        'DIVORCED' => 'DIVORCED',
        'WIDOWED' => 'WIDOWED'
    ];

    protected $localGovernmentModel;
    protected $wardModel;
    protected $rCenterModel;
    protected $farmerModel;
    public function __construct(EloquentLocalGovernmentRepository $localGovernmentContract, EloquentWardRepository $wardContract,
    EloquentRedemptionCenterRepository $redemptionCenterContract, EloquentFarmerRepository $farmerContract) {
        $this->localGovernmentModel = $localGovernmentContract;
        $this->wardModel = $wardContract;
        $this->rCenterModel = $redemptionCenterContract;
        $this->farmerModel = $farmerContract;
    }

    public function allFarmers() {
        $farmers = $this->farmerModel->getAll();
        return view('farmers.index', ['farmers' => $farmers]);
    }
    
    public function newFarmer() {
        return view('farmers.new', [
            'genders' => $this->genders,
            'options' => $this->options,
            'maritalstatus' => $this->maritalstatus
        ]);
    }
    
    public function editFarmer($id) {
        $farmer = $this->farmerModel->findById($id);
        return view('farmers.edit', [
            'farmer' => $farmer,
            'genders' => $this->genders,
            'options' => $this->options,
            'maritalstatus' => $this->maritalstatus
        ]);
    }
    
    public function createFarmer(Request $request) {
        $farmer = $this->farmerModel->create($request);
        if ($farmer) {
            return back()->with('success', 'Farmer details successfully saved');
        } else {
            return back()->withInput()->with('error', 'There was a problem saving the farmer\'s details');
        }
    }
    
    public function updateFarmer($id, Request $request) {
        $farmer = $this->farmerModel->edit($id, $request);
        if ($farmer) {
            return back()->with('success', 'Farmer details successfully updated');
        } else {
            return back()->withInput()->with('error', 'There was a problem updating the farmer\'s details');
        }
    }
    
    public function deleteFarmer($id) {
        $farmer = $this->farmerModel->remove($id);
        if ($farmer) {
            return redirect()->route('farmer_search');
        } else {
            return back()->withInput()->with('error', 'There was a problem deleting the farmer\'s details');
        }
    }
    
    public function search() {
        return view('farmers.search');
    }
    
    public function doPhoneNameSearch(Request $request) {
        $this->validate($request, [
            'search_term' => 'required'
        ]);
        
        return redirect()->route('farmer_phone_search_result', base64_encode($request->search_term));
    }
    
    public function phoneNameSearchResult($searchterm) {
        $searchterm = base64_decode($searchterm);
        $farmers = $this->farmerModel->findByPhoneOrName($searchterm);
        return view('farmers.searchresult.phoneorname', [
            'searchterm' => $searchterm,
            'farmers' => $farmers
        ]);
    }
    
    public function doLivestockSearch(Request $request) {
        $this->validate($request, [
            'search_term' => 'required'
        ]);
        
        return redirect()->route('farmer_livestock_search_result', base64_encode($request->search_term));
    }
    
    public function livestockSearchResult($searchterm) {
        $searchterm = base64_decode($searchterm);
        $farmers = $this->farmerModel->findByMajorLivestock($searchterm);
        return view('farmers.searchresult.livestock', [
            'searchterm' => $searchterm,
            'farmers' => $farmers
        ]);
    }
    
    public function doCropsSearch(Request $request) {
        $this->validate($request, [
            'search_term' => 'required'
        ]);
        
        return redirect()->route('farmer_crops_search_result', base64_encode($request->search_term));
    }
    
    public function cropsSearchResult($searchterm) {
        $searchterm = base64_decode($searchterm);
        $farmers = $this->farmerModel->findByMajorCrops($searchterm);
        return view('farmers.searchresult.crops', [
            'searchterm' => $searchterm,
            'farmers' => $farmers
        ]);
    }
}
