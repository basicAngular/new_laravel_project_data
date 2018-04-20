@extends('layouts.master')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List</h3>
            <a href="{{url('create-user')}}" class="btn btn-info pull-right">Add New User</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Contact</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($usersDetails as $usersDetail)
                    <tr>
                        <td>{{$usersDetail->name}}</td>
                        <td>{{$usersDetail->email}}</td>
                        <td>{{$usersDetail->mobile}}</td>
                        <td>{{$usersDetail->contact}}</td>
                        <td>{{$usersDetail->dob}}</td>
                        <td>{{$usersDetail->gender}}</td>
                        <td>{{$usersDetail->role->role_name}}</td>
                        {{--<td>
                            <a href="{{url('admin/edit-backend-employees/'.Hashids::encode($usersDetail->id))}}"
                               class="btn btn-info" title="Edit">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <button class="btn btn-danger btn-delete delete-backend-employee"
                                    value="{{$usersDetail->id}}" title="Delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>--}}
                        <td>
                            <a href="{{url('admin/edit-backend-employees/'.$usersDetail->id)}}"
                               class="btn btn-info" title="Edit">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <button class="btn btn-danger btn-delete delete-backend-employee"
                                    value="{{$usersDetail->id}}" title="Delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('admin-script')
    <script src="{{asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')
    }}"></script>
    <script src="{{asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection