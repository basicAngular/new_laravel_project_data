@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Users
                        <div class="pull-right">
                        <span class="pull-right">
                            <a href="{{url('/dashboard')}}" class="btn btn-default btn-xs" > Go back</a>
                        </span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="bootstrap-modal-form" action="{{url('/')}}" method="post"
                              files='true'>
                                {{ csrf_field() }}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Full Name</label>
                                        <input type=text name='name' placeholder="Enter Full Name" class="form-control" id="textname" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Select Role Type</label>
                                        <select id="purpose" name="role_type" class="form-control">
                                            <option value="" selected>select..</option>
                                            @foreach($role_lists as $role_list)
                                                <option style="color:brown;font-size:17px;" value="{{$role_list->id}}">{{$role_list->role_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Gender</label>
                                        <select id="gender" name="gender" class="form-control">
                                              <option value="" selected>select..</option>
                                              <option style="color:brown;font-size:17px;" value="Male">Male</option>
                                              <option style="color:brown;font-size:17px;" value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Date Of Birth</label>
                                        <input type="date" class="form-control" placeholder="Enter Email" name="dob" maxlength="40">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Email</label>
                                        <input type="Email" class="form-control" placeholder="Enter Email" name="email" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Mobile Number</label>
                                        <input type="mobile" class="form-control" placeholder="Enter Mobile Number"
                                               name="mobile" onkeypress="return isNumberKey(event)" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="confirm_password" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Country</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="">Select Country
                                            </option>
                                            @foreach($countries as $key => $country)
                                                <option value="{{$country}}"> {{$country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">State</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="">Select State
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Country Code</label>
                                        <input type="text" name="country_code" id="country_code_second" maxlength="5" placeholder="Country Code" class="form-control" onkeypress="return isNumberKey(event)" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Area Code</label>
                                        <input type="text" name="area_code" id="paddress" maxlength="5" placeholder="Area Code" class="form-control" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">Phone Number</label>
                                        <input type="text" name="phone" id="paddress" maxlength="10"
                                               placeholder="Phone Number" class="form-control"
                                               onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select name="city" id="city" class="form-control">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="pwd">PinCode</label>
                                        <input type="text" name="pincode" id="pincode" placeholder="Enter Pincode" class="form-control" maxlength="6">
                                    </div>
                                </div>

                                <div style="display:none;" class="alternative_details_form">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="email">Name</label>
                                            <input type=text name="alternative_name" placeholder="Enter Name" id="textname" class="form-control" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="pwd">Email</label>
                                            <input type="text" name="alternative_email" placeholder="Enter Email" id="fathername" class="form-control" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="email">Password</label>
                                            <input type="password" name="alternative_password" placeholder="Enter Password" id="fathername" class="form-control" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="pwd">Country Code</label>
                                            <input type="text" name="alternative_country_code" id="country_code" maxlength="5" placeholder="Country Code" class="form-control"  onkeypress="return isNumberKey(event)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="pwd">Area Code</label>
                                            <input type="text" name="alternative_area_code" id="paddress" size="6" placeholder="Area Code" class="form-control" maxlength="5" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="pwd">Phone Number</label>
                                            <input type="text" name="alternative_phone_number" id="paddress" size="10" placeholder="Phone" class="form-control" maxlength="10" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="learn_more_btn">
                                        <button type="submit" class="btn btn-success">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
              </div>
        </div>
    </div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/login-bootstrap-modal-form.js')}}"></script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
    $('#country').change(function(){
        var country = $(this).val();
        if(country){
            $.ajax({
                type:"GET",
                url:"{{url('api/get-state-list')}}?country="+country,
                success:function(res){
                    if(res){
                        $("#state").empty();
                        $("#city").empty();
                        $("#state").append('<option>Select</option>');
                        $("#city").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#state").append('<option value="'+value+'">'+value+'</option>');
                        });

                    }else{
                        $("#state").empty();
                    }
                }
            });
        }else{
            $("#state").empty();
            $("#city").empty();
        }
    });
    $('#state').on('change',function() {
        var state = $(this).val();
        if (state) {
            $.ajax({
                type: "GET",
                url: "{{url('api/get-city-list')}}?state=" + state,
                success: function (res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option>Select</option>');
                        $.each(res, function (key, value) {
                            $("#city").append('<option value="' + value + '">' + value + '</option>');
                        });

                    } else {
                        $("#city").empty();
                    }
                }
            });
        } else {
            $("#city").empty();
        }
    })
    });
</script>
<!-- state city select end -->
<script>
    var countryurl = "{{url('api/country-and-codes')}}";
    $(document).ready(function(){
        $('#country').on('change', function(){
            var country_name = $(this).val();
            if (country_name == '') {
                $('#country_code').val('');
                $('#country_code_second').val('');
            }else{
                $.ajax({
                    type: "GET",
                    url: countryurl + '/' + country_name,
                    success: function (data) {
                        $('#country_code').val('+' + ' ' + data.phonecode);
                        $('#country_code_second').val('+' + ' ' + data.phonecode);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }

        });
    });
</script>
