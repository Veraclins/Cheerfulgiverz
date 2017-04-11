@extends('layouts.admin.master')

@section('mainContent')

<div class="container">
    
    <div class="row">
        <div class="col-sm-12">
            
            <!-- Default box -->

            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Plans</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th class='text-center'>Plan Amount</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plans as $plan)
                            
                            <tr>
                                <td>{{$plan['plan_name']}}</td>
                                <td class='text-center'>{{$plan['plan_amount']}}</td>
                                <td class='text-center'>
                                    <span><a class='btn btn-primary' href='{{url('admin/plan-edit').'?plan_id='.$plan['plan_id']}}'><i class='fa fa-edit'></i></a></span>
                                    <span><a class='btn btn-danger' href='{{url('admin/plan-delete').'?plan_id='.$plan['plan_id']}}'><i class='fa fa-remove'></i></a></span>
                                    
                                </td>
                            </tr>

                            @endforeach
                            
                        </tbody>
                    </table>
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div>    
    </div>

</div>

    

@stop