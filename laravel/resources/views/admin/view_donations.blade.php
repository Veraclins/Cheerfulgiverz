@extends('layouts.admin.master')

@section('mainContent')

<!-- Default box -->

    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Donations</h3>
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
            
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>Payer Name</th>
                        <th>Receiver Name</th>
                        <th class='text-center'>Amount</th>
                        
                        <th class='text-center'>Payment Date </th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>POP</th>
                        <th class='text-center'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                    
                    <tr>
                        <td>{{$donation['donation_id']}}</td>
                        <td>{{$donation['name']}}</td>
                        <td>{{$donation['rname']}}</td>
                        <td class='text-center'>{{$donation['plan_amount']}}</td>
                       
                        <td class='text-center'>{{$donation['payment_date']}}</td>
                        <td class='text-center'>
                            
                            @if($donation['payment_status'] == 'pending')
                            <span class='text-danger'>{{$donation['payment_status']}}</span>
                            @else
                            <span class='text-success'>{{$donation['payment_status']}}</span>
                            @endif
                        </td>
                        <td class='text-center'>
                            <a class='btn btn-default btn-sm' href='{{url('assets/pics').'/'.$donation['pop_picture']}}'><i class='fa fa-eye'></i></a>
                        </td>
                        <td class='text-center'>
                            @if($donation['payment_status'] == 'pending')
                            
                            <form class='form-inline' method='get' enctype="multipart/form-data" action="{{url('admin/change-donation-status')}}">
                                {{csrf_field()}}
                                <div class="form-group">

                                    <select name="payment_status" class="form-control">
                                        <option value="">Choose</option>
                                        <option value="pending">Pending</option>
                                        <option value="accepted">Accepted</option>
                                        

                                    </select>

                                </div>
                                <input type='hidden' name='donation_id' value='{{$donation['donation_id']}}'>
                                <button type='submit' clas='btn btn-default btn-sm' title='Update'><i class='fa fa-refresh'></i></button>
                            </form>

                            @else
                            
                            <span>
                                -
                            </span>

                            @endif
                            
                        </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
        </div><!-- /.box-body -->
        
    </div><!-- /.box -->

@stop