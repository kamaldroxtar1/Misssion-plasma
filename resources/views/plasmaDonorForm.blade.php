@extends('master')
@section('body')
<section class="content-wrapper">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{Session::get('success')}}
            </div>
            @endif
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Donors Info</h3>

            <form class="px-md-2" method="POST" action="postDonorForm">
                @csrf
                <!-- 1st row -->
              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q" class="form-control" name="name" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
                <label class="form-label" for="form3Example1q"  >Name</label>
              </div>
                <!-- 2nd row -->
              <div class="row">
                <div class="col-md-6 mb-4">
                <input type="date" id="example1" class="form-control" name="positive_date" required data-parsley-trigger="keyup">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                <label for="positive_date">Date of Covid-19 positive</label>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-control">
                        <input type="radio" class="mx-2" name="gender" value="male" required data-parsley-trigger="keyup">Male
                        <input type="radio" class="mx-2" name="gender" value="female" required data-parsley-trigger="keyup">Female
                    </div>
                  <label for="gender" > Gender</label>

                </div>
              </div>
                <!-- 3rd row -->
              <div class="row">
              <div class="col-md-6 mb-4">
                <input type="date" id="example1" class="form-control" name="negative_date" required data-parsley-trigger="keyup">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                <label for="negative_date">Date of Covid-19 negative</label>
                </div>
                  <div class="mb-4 col-md-6">
                      <select name="state" id="state" class="form-control" required data-parsley-trigger="keyup">
                          <option value="">--select state--</option>
                          @foreach ($state as $list)
                          <option value="{{$list->id}}">{{$list->name}}</option>
                          @endforeach
                      </select>
                      <label for="state">State</label>
                  </div>
              </div>
                <!-- 4th row -->
              <div class="row">
              <div class="mb-4 col-md-6">
                      <select name="city" id="city" class="form-control" required data-parsley-trigger="keyup" >
                          <option value="">--select city--</option>
                      </select>
                      <label for="city">City</label>
                  </div>
                <div class="mb-4 col-md-6">
                      <input type="number" name="age" class="form-control" required data-parsly-length="[2,2]" data-parsley-trigger="keyup">
                      <label for="age">Age</label>
                </div>
              </div>
                <!-- 5th row -->
            <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
              <div class="col-md-7 mb-4">
                <input type="number" id="phone" class="form-control" name="phone" required data-parsley-pattern="[0-9+]+$" data-parsly-length="[10,13]" data-parsley-trigger="keyup" >
                <label for="phone">Phone Number</label>
                </div>
                <div class="mb-4 col-md-12">
                <div class="form-control">
                    <input type="radio" class="mx-2" name="blood_group" value="O+" required data-parsley-trigger="keyup">O+
                    <input type="radio" class="mx-2" name="blood_group" value="O-" required data-parsley-trigger="keyup">O-
                    <input type="radio" class="mx-2" name="blood_group" value="A+" required data-parsley-trigger="keyup">A+
                    <input type="radio" class="mx-2" name="blood_group" value="A-" required data-parsley-trigger="keyup">A-
                    <input type="radio" class="mx-2" name="blood_group" value="B+" required data-parsley-trigger="keyup">B+
                    <input type="radio" class="mx-2" name="blood_group" value="B-" required data-parsley-trigger="keyup">B-
                    <input type="radio" class="mx-2" name="blood_group" value="AB+" required data-parsley-trigger="keyup">AB+
                    <input type="radio" class="mx-2" name="blood_group" value="AB-" required data-parsley-trigger="keyup">AB-
                    </div>
                  <label for="blood_group" > Blood Group</label>
                </div>
            </div>
            
              <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div> 
  <script>
      jQuery(document).ready(function(){
          jQuery('#state').change(function(){
              let state_id=jQuery(this).val();
              jQuery.ajax({
                  url:'/getCity',
                  type:'post',
                  data:'state_id='+state_id+' &_token={{csrf_token()}}',
                  success:function(result){
                      jQuery('#city').html(result)
                  }
              })
          })
      })
  </script>      
</section>
@endsection()