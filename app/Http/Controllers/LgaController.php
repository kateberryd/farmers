<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Repositories\Ward\EloquentWardRepository;
use App\Repositories\LocalGovernment\EloquentLocalGovernmentRepository;
use App\Repositories\RedemptionCenter\EloquentRedemptionCenterRepository;
use App\Repositories\LocalGovernmentTruck\EloquentLocalGovernmentTruckRepository;

class LgaController extends Controller
{
    protected $localGovernmentModel;
    protected $wardModel;
    protected $rCenterModel;
    protected $localGovernmentTruckModel;
    public function __construct(EloquentLocalGovernmentRepository $localGovernmentContract, EloquentWardRepository $wardContract,
    EloquentRedemptionCenterRepository $redemptionCenterContract, EloquentLocalGovernmentTruckRepository $localGovernmentTruckContract) {
        $this->localGovernmentModel = $localGovernmentContract;
        $this->wardModel = $wardContract;
        $this->rCenterModel = $redemptionCenterContract;
        $this->localGovernmentTruckModel = $localGovernmentTruckContract;
    }

    public function index() {
        $lgas = $this->localGovernmentModel->getAll();
        $farmerscount = array(); $wardscount = array(); $centerscount = array();
        foreach ($lgas as $lga) {
            $farmerscount[$lga->id] = $this->localGovernmentModel->getFarmerCount($lga->id);
            $wardscount[$lga->id] = count($this->localGovernmentModel->getWards($lga->id));
            $centerscount[$lga->id] = count($this->localGovernmentModel->getCenters($lga->id));
        }
        
        return view('lgas.index', [
            'lgas' => $lgas,
            'farmerscount' => $farmerscount,
            'wardscount' => $wardscount,
            'centerscount' => $centerscount
        ]);
    }

    public function centers($id) {
        $lga = $this->localGovernmentModel->findById($id);
        $centers = $this->localGovernmentModel->getCenters($id);
        $farmersCount = array();
        $wardsCount = array();
        
        foreach ($centers as $center) {
            $farmersCount[$center->unique_center_id] = $this->rCenterModel->getFarmerCount($center->unique_center_id);
            $wardsCount[$center->unique_center_id] = $this->rCenterModel->getWardCount($center->unique_center_id);
        }
        
        return view('lgas.centers', [
            'centers' => $centers,
            'lga' => $lga,
            'farmerscount' => $farmersCount,
            'wardscount' => $wardsCount
        ]);
    }
    
    public function farmers($id) {
        $lga = $this->localGovernmentModel->findById($id);
        $farmers = $this->localGovernmentModel->getFarmers($lga->id);
        
        return view('lgas.farmers', [
            'lga' => $lga,
            'farmers' => $farmers
        ]);
    }
    
    public function wards($id) {
        $lga = $this->localGovernmentModel->findById($id);
        $wards = $this->localGovernmentModel->getWards($lga->id);
        
        return view('lgas.wards', [
            'lga' => $lga,
            'wards' => $wards
        ]);
    }
    
    public function allLgaTrucks() {
        $lgas = $this->localGovernmentModel->getAll();
        $truckscount = array();
        foreach ($lgas as $lga) {
            $truckscount[$lga->id] = $this->localGovernmentTruckModel->getLocalGovernmentTruckCount($lga->id);
        }
        
        return view('lgas.trucks.index', [
            'lgas' => $lgas,
            'truckscount' => $truckscount
        ]);
    }
    
    public function newTruck() {
        $lgas = $this->localGovernmentModel->pluckAll();
        return view('lgas.trucks.new', [
            'lgas' => $lgas,
        ]);
    }
    
    public function createTruck(Request $request) {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'number' => 'required|numeric|min:1',
            'local_government' => 'required'
        ]);
        
        $truck = $this->localGovernmentTruckModel->create($request);
        if (is_object($truck)) {
            return back()->with('success', 'L.G.A Truck successfully saved');
        } else {
            return back()->withInput()->with('error', 'There was a problem saving the new L.G.A Truck');
        }
    }
    
    public function lgaTrucks($id) {
        $lga = $this->localGovernmentModel->findById($id);
        $lgaTrucks = $this->localGovernmentTruckModel->getLocalGovernmentTrucks($id);
        return view('lgas.trucks.lga', [
            'lga' => $lga,
            'lgatrucks' => $lgaTrucks
        ]);
    }
    
    public function report() {
        $lgas = $this->localGovernmentModel->getAll();
        $farmerscount = array();
        foreach ($lgas as $lga) {
            $farmerscount[$lga->id] = $this->localGovernmentModel->getFarmerCount($lga->id);
        }
        
        return view('reports.lgas', [
            'lgas' => $lgas,
            'farmerscount' => $farmerscount
        ]);
    }
}
