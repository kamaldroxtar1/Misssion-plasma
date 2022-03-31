<?php

namespace App\Http\Controllers;
use App\Models\State;
use App\Models\RequestList;
use Illuminate\Http\Request;

class PlasmaRequest extends Controller
{
    public function showRequestForm(){
        $data=State::all();
        return view('plasmaRequestForm',['state'=>$data]);
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
            $requestData= new RequestList();

            $requestData->name=$request->name;
            $requestData->gender=$request->gender;
            $requestData->age=$request->age;
            $requestData->blood_group=$request->blood_group;
            $requestData->state_id =$request->state ;
            $requestData->city_id =$request->city;
            $requestData->phone=$request->phone;
            $requestData->covid_positive=$request->positive_date;
            $requestData->covid_negative=$request->negative_date;
        }
        if ($requestData->save()){
            return back()->with('success','data added successfully');
        }
        else{
            return back()->with('error', 'data not added');
        }
    }
}
