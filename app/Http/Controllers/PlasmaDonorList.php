<?php

namespace App\Http\Controllers;
use App\Models\DonorList;
use App\Models\State;
use Illuminate\Http\Request;

class PlasmaDonorList extends Controller
{
    public function show(){
        $stateData = State::all();
        $data=DonorList::orderBy('created_at','desc')->paginate(10);
        // $data= new DonorList;
        // $data=$data->paginate(10);
        return view('donorList',['donorList'=>$data,'state'=>$stateData]);
    }
    public function showStateWise($id){
        $data=DonorList::orderBy('created_at','desc')->paginate(10)->where("state_id","=",$id);
        return view('donorListFilter',['donorList'=>$data]);
    }
    public function showBloodWise($id){
        $data=DonorList::orderBy('created_at','desc')->paginate(10)->where("blood_group","=",$id);
        return view('donorListFilter',['donorList'=>$data]);
    }
}
