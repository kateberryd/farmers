<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Ward\EloquentWardRepository;
use App\Repositories\LocalGovernment\EloquentLocalGovernmentRepository;
use App\Repositories\RedemptionCenter\EloquentRedemptionCenterRepository;

class RedemptionCenterController extends Controller
{
    protected $localGovernmentModel;
    protected $wardModel;
    protected $rCenterModel;
    public function __construct(EloquentLocalGovernmentRepository $localGovernmentContract, EloquentWardRepository $wardContract,
    EloquentRedemptionCenterRepository $redemptionCenterContract) {
        $this->localGovernmentModel = $localGovernmentContract;
        $this->wardModel = $wardContract;
        $this->rCenterModel = $redemptionCenterContract;
    }
    
    public function index() {
        $centers = $this->rCenterModel->getAll();
        $farmersCount = array();
        
        foreach ($centers as $center) {
            $farmersCount[$center->unique_center_id] = $this->rCenterModel->getFarmerCount($center->unique_center_id);
        }
        
        return view('centers.index', [
            'centers' => $centers,
            'farmerscount' => $farmersCount
        ]);
    }

    public function wards($uniqueid) {
        $wards = $this->rCenterModel->getWards($uniqueid);
        $center = $this->rCenterModel->findByUniqueId($uniqueid);
        return view('centers.wards', [
            'wards' => $wards,
            'center' => $center
        ]);
    }

    public function farmers($uniqueid) {
        $farmers = $this->rCenterModel->getFarmers($uniqueid);
        $center = $this->rCenterModel->findByUniqueId($uniqueid);
        $lga = $this->rCenterModel->getLocalGovernment($uniqueid);
        return view('centers.farmers', [
            'farmers' => $farmers,
            'center' => $center,
            'lga' => $lga
        ]);
    }
    
    public function farmerPayments($uniqueid) {
        $center = $this->rCenterModel->findByUniqueId($uniqueid);
        $farmerPayments = $this->rCenterModel->getPayments($uniqueid);
        return view('centers.farmerpayments', [
            'farmerpayments' => $farmerPayments,
            'center' => $center
        ]);
    }
    
    public function report() {
        $centers = $this->rCenterModel->getAll();
        $farmersCount = array();
        
        foreach ($centers as $center) {
            $farmersCount[$center->unique_center_id] = $this->rCenterModel->getFarmerCount($center->unique_center_id);
        }
        
        return view('reports.centers', [
            'centers' => $centers,
            'farmerscount' => $farmersCount
        ]);
    }
}
