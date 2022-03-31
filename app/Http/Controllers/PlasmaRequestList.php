<?php

namespace App\Http\Controllers;
use App\Models\RequestList;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlasmaRequestList extends Controller
{
    
    public function show(){
        $stateData = State::all();
        $data=RequestList::orderBy('created_at','desc')->paginate(10);
        // $data= new RequestList;
        // $data=$data->paginate(10);
        return view('requestList',['requestList'=>$data,'state'=>$stateData]);
    }
    public function showStateWise($id){
        $data=RequestList::orderBy('created_at','desc')->paginate(10)->where("state_id","=",$id);
        return view('requestListFilter',['requestList'=>$data]);
    }
    public function showBloodWise($id){
        $data=RequestList::orderBy('created_at','desc')->paginate(10)->where("blood_group","=",$id);
        return view('requestListFilter',['requestList'=>$data]);
    }
}
