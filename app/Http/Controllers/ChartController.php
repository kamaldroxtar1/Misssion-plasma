<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\DonorList;
use App\Models\RequestList;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function Chart()
    {
        $data = DB::select(DB::raw('select count(*) as donor, state_id from donor_lists group by state_id'));
        $chardata = "";
        if(count($data)>0){
        foreach ($data as $item) {
            $state=State::find($item->state_id);
            $chardata .= "['$state->name',$item->donor],";
                }
            $donorData = rtrim($chardata, ',');
        }
        else{
            $donorData="";
        }
           
        $data_new = DB::select(DB::raw('select count(*) as requester, state_id from request_lists group by state_id'));
        $chardata_new = "";
        if(count($data_new)>0){
        foreach ($data_new as $item) {
            $state=State::find($item->state_id);
            $chardata_new .= "['$state->name',$item->requester],";
                }
            $requesterData = rtrim($chardata_new, ',');
        }
        else{
            $requesterData="";
        }
        
        $donor = DB::select(DB::raw('SELECT count(*) as donor FROM `donor_lists` '));
        $requester = DB::select(DB::raw('SELECT count(*) as requester FROM `request_lists`'));
        return view('dashboard', ['donor' => $donor[0]->donor ,'requester'=>$requester[0]->requester,'donorData' => $donorData,'requesterData' => $requesterData]);
    }
}
