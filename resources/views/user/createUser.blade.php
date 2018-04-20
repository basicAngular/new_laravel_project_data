@extends('layouts.master')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Create New User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if (Session::has('fail'))
                <div  align="center" id="successMessage" class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <form action="{{url('/create-user')}}" class="bootstrap-modal-form- form-horizontal" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group" style="font-size: 18px; margin-left:140px; ">
                            <label name="login_error"></label>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Role</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="role_name">
                                        <option value="" selected>-- select Role-- </option>
                                    @foreach($role_lists as $role_list)
                                        <option value="{{$role_list->id}}">{{$role_list->role_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('role_name') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter User Name"
                                       name="name" value="{{old('name')}}" maxlength="25">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Date of birth</label>
                            <div class="col-sm-5">
                               {{ $errors->first('dob') }}</span>
                                <input type="date" class="form-control" name="dob" id="datepicker"
                                       placeholder="DD/MM/YYYY ">
                                {{--<input type="hidden" value=" {{Auth::user()->id }}" class="form-control" name="admin_id">--}}
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-5">
                                 <select name="gender" id="inputID" class="form-control">
                                 	<option value=""> -- Select Gender -- </option>
                                 	<option value="Male"> Male </option>
                                 	<option value="Female"> Female </option>
                                 </select>
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputEmail3"
                                       placeholder="Enter User Email" name="email" value="{{old('email')}}" maxlength="30">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="inputEmail3"
                                       placeholder="Enter User Email" name="password" value="{{old('password')}}"
                                       maxlength="30">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-5">
                                <input type="text" placeholder="Enter Address" name="address" id="address"
                                       class="form-control" value="{{old
                                ('address')}}">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-5">
                                <select id="country" name="country" class="form-control">
                                    <option value="">Select Country
                                    </option>
                                    @foreach($countries as $key => $country)
                                        <option value="{{$country}}"> {{$country}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select State</label>
                            <div class="col-sm-5">
                                <select id="state" name="state" class="form-control" >
                                    <option value="">Select State</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Type City</label>
                            <div class="col-sm-5">
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select City</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pin Code</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="zip_code" placeholder="Enter pin Code"
                                       name="zip_code" value="{{old('zip_code')}}" maxlength="6" onkeypress="return isNumberKey(event)">
                                <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputEmail3"
                                       placeholder="Enter Phone Number" name="mobile" value="{{old('mobile')}}"
                                       maxlength="10"
                                       onkeypress="return isNumberKey(event)">
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputEmail3"
                                       placeholder="Enter Contact Number" name="contact" value="{{old('contact')}}" maxlength="10" onkeypress="return isNumberKey(event)">
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            </div>
                        </div>

                        <div class="form-group" align="center">
                            <a href="{{url('user')}}" class="btn btn-info">Go back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('admin-script')

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
@endsection
