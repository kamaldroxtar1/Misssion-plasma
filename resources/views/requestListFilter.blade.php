@extends('master')
@section('body')
<div class="content-wrapper">
    <div class="text-center p-5">
        <h3><u>Requesters Lists Filter Wise</u></h3>
    </div>
    
    <div class="container">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col"></th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Age</th>
              <th scope="col">Blood Group</th>
              <th scope="col">Covid + Date</th>
              <th scope="col">Covid - Date</th>
              <th scope="col">Phone</th>
              <th scope="col">City</th>
              <th scope="col">State</th>
            </tr>
          </thead>
          <tbody>
              @php  $sno=1;  @endphp
              @foreach($requestList as $item)
            <tr>
              <th scope="row">{{$sno}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->gender}}</td>
              <td>{{$item->age}}</td>
              <td>{{$item->blood_group}}</td>
              <td>{{$item->covid_positive}}</td>
              <td>{{$item->covid_negative}}</td>
              <td>{{$item->phone}}</td>
              <td>{{$item->City->name}}</td>
              <td>{{$item->State->name}}</td>
            </tr>
            @php  $sno+=1;  @endphp
            @endforeach()
           
          </tbody>
        </table>
        <div class="m-5">
            <button class="btn btn-dark"><a href="{{route('listPlasmaRequest')}}" class="text-light">Go back</a></button>
        </div>
    </div>
</div>
@endsection()