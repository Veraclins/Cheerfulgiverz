@extends('layouts.admin.master')

@section('mainContent')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            
            <!-- Default box -->

            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Create User</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user-registration') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Bank name --}}
                        
                         <div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            <label for="bank_name" class="col-md-4 control-label">Bank Name</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" >

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Branch code --}}
                        
                        <div class="form-group{{ $errors->has('branch_code') ? ' has-error' : '' }}">
                            <label for="branch_code" class="col-md-4 control-label">Branch Code</label>

                            <div class="col-md-6">
                                <input id="branch_code" type="text" class="form-control" name="branch_code" value="{{ old('branch_code') }}"  >

                                @if ($errors->has('branch_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Account Number --}}
                        
                         <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label for="account_number" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control" name="account_number" value="{{ old('account_number') }}"  autofocus>

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        {{-- Account Holder --}}
                        
                        <div class="form-group{{ $errors->has('account_holder') ? ' has-error' : '' }}">
                            <label for="account_holder" class="col-md-4 control-label">Account Holder</label>

                            <div class="col-md-6">
                                <input id="account_holder" type="text" class="form-control" name="account_holder" value="{{ old('account_holder') }}"  autofocus>

                                @if ($errors->has('account_holder'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_holder') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('plan_id') ? ' has-error' : '' }}">
                            
                            <label for="plan_id" class="col-md-4 control-label">Choose Plan</label>
                            
                            <div class='col-md-6'>
                                
                                <select name="plan_id" class="form-control">
                                    <option value="">Choose</option>
                                    @foreach($plans as $plan)
                                    <option @if(old('plan_id') == $plan['plan_id']) selected @endif value="{{$plan['plan_id']}}">{{$plan['plan_name']}}</option>
                                    @endforeach

                                </select>
                                
                                @if ($errors->has('plan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan_id') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                            

                        </div>
                        
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                        
                    </form>

                </div><!-- /.box-body -->

            </div>

            <!-- /.box -->

        </div>    
    </div>

    

@stop