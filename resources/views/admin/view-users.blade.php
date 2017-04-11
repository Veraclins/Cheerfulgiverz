@extends('layouts.admin.master')

@section('mainContent')

<!-- Default box -->

    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View/Delete Users</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @if(Session::has('message'))
            <div class='alert alert-success'>
                {{Session::get('message')}}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        
                        <th class='text-center'>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $user)
                    
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['phone']}}</td>
                        
                        <td class='text-center'>
                            <a href='{{url('admin/delete-user').'?user_id='.$user['id']}}' class='btn btn-danger btn-sm'><i class='fa fa-remove'></i></a>
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div><!-- /.box-body -->
        
    </div><!-- /.box -->

@stop