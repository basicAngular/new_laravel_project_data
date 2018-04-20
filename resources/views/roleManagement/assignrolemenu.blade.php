@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>Assign Role Menu</h3>
                </div>
                <div class="ibox-content">
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <span class="label">Select Role</span>
                            <select name="role" id="role" class="form-control">
                                <option value=""> -- Select Role -- </option>
                                @forelse ($roles as $role)
                                    <option value="{{$role->id}}"> {{$role->role_name}} </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </form>
                </div>

                <div id="roleMenu-data"></div>

            </div>
        </div>
    </div>
@endsection