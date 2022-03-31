@extends('master')
@section('body')
<div class="content-wrapper">
    <div class="text-center p-5">
        <h3><u>Requesters Lists</u></h3>
    </div>
    <div class="row mb-5" >
        <div class="col-md-9"></div>
        <div class="dropdown col-md-1">
            <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">State Wise</button>
            <ul class="dropdown-menu text-center bg-dark">
                @foreach($state as $item)
                <li><a href="showRequestStateWise/{{$item->id}}" class="text-light ">{{$item->name}}</a></li>
                @endforeach()
            </ul>
        </div>
        <div class="dropdown col-md-1 mx-3">
            <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">Blood Group Wise</button>
            <ul class="dropdown-menu text-center bg-dark">
                <li><a href="showRequestBloodWise/{{'O+'}}" class="text-light ">O+</a></li>
                <li><a href="showRequestBloodWise/{{'O-'}}" class="text-light ">O-</a></li>
                <li><a href="showRequestBloodWise/{{'A+'}}" class="text-light ">A+</a></li>
                <li><a href="showRequestBloodWise/{{'A-'}}" class="text-light ">A-</a></li>
                <li><a href="showRequestBloodWise/{{'B+'}}" class="text-light ">B+</a></li>
                <li><a href="showRequestBloodWise/{{'B-'}}" class="text-light ">B-</a></li>
                <li><a href="showRequestBloodWise/{{'AB+'}}" class="text-light ">AB+</a></li>
                <li><a href="showRequestBloodWise/{{'AB-'}}" class="text-light ">AB-</a></li>
            </ul>
        </div>
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
        {{$requestList->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection()