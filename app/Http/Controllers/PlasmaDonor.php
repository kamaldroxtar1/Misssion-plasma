<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\DonorList;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class PlasmaDonor extends Controller
{
    public function showDonorForm(){
        $data=State::all();
        return view('plasmaDonorForm',['state'=>$data]);
    }

    public function GetCity(Request $request){
        $state_id=$request->state_id;
        $data=DB::table('cities')->where('state_id',$state_id)->get();
        $html='<option value=""> --select city-- </option>';
        foreach($data as $list){
            $html.='<option value="'.$list->id.'"> '.$list->name.' </option>';
        }
        echo $html;
    }

    public function store(Request $request){
        $validated=$request->validate(
            ['name'=>'required',
            'positive_date'=>'required',
            'gender'=>'required',
            'negative_date'=>'required',
            'state'=>'required',
            'city'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'blood_group'=>'required',
        ],[
            'name.required'=>'namae is required',
            'positive_date.required'=>'date of covid 19 positive is required',
            'gender.required'=>'gender is required',
            'negative_date.required'=>'date of covid 19 negative is required',
            'state.required'=>'state is required',
            'city.required'=>'city is required',
            'age.required'=>'age is required',
            'phone.required'=>'phone number is required',
            'blood_group.required'=>'blood_group is required',
        ]);
        if($validated){
            $donorData= new DonorList();

            $donorData->name=$request->name;
            $donorData->gender=$request->gender;
            $donorData->age=$request->age;
            $donorData->blood_group=$request->blood_group;
            $donorData->state_id =$request->state ;
            $donorData->city_id =$request->city;
            $donorData->phone=$request->phone;
            $donorData->covid_positive=$request->positive_date;
            $donorData->covid_negative=$request->negative_date;
        }
        if ($donorData->save()){
            return back()->with('success','data added successfully');
        }
        else{
            return back()->with('error', 'data not added');
        }
    }
}
