@extends('layouts.admin.master')

@section('mainContent')

<!-- Default box -->

    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Create Plan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            @if(Session::has('message'))
            <div class='alert alert-success'>
                {{Session::get('message')}}
            </div>
            @endif
            
            <form method='post' enctype="multipart/form-data" action="{{url('admin/make-plan-created')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="input">Plan Name</label>
                    <input name='plan_name' value="{{old('plan_name')}}" type="text" class="form-control" id="input" placeholder="Plan Name">
                </div>
                
                <div class="form-group">
                    <label for="input">Plan Amount</label>
                    <input name='plan_amount' value="{{old('plan_amount')}}" type="text" class="form-control" id="input" placeholder="Plan Amount">
                </div>
                
                <input class="btn btn-success" type="submit" value="Submit">
            </form>
        </div><!-- /.box-body -->
        
    </div><!-- /.box -->

@stop