@extends('layouts.frontend.master')
@section('content')
			
            
    <section class="subpage-header">
            <div class="container">
                    <div class="site-title clearfix">
                            <h2>Profile</h2>
                            <ul class="breadcrumbs">
                                    <li><a href="about-us.html#.">Home</a></li>
                                    <li>Profile</li>
                            </ul>
                    </div>
                    <a href="contact-us.html" class="btn btn-primary get-in-touch" data-text="Contact us"><i class="icon-telephone114"></i>Contact us</a>
            </div>
    </section>

    <section>

        <?php $user = $users; ?>

        <div class='container'>

            <div class="row">
                <div class='col-sm-4'>
                    <img style="margin-top:30px;" class='img img-responsive' src='@if($user["profile_picture"] == ""){{asset('assets/pics/profile_picture').'/'.'default-profile-pic.jpg'}}@else{{asset('assets/pics/profile_picture').'/'.$user['profile_picture']}}@endif'>
                    <p class="text-center mt-2">Member since: {{$user['created_at']}}</p>
                </div>
                <div class="col-sm-8">
                    <div class="panel panel-default mt-5">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Profile</h3>
                        </div>
                        <div class="panel-body">
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

                            <form method='post' enctype="multipart/form-data" action="{{url('update-profile')}}">
                                {{csrf_field()}}

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name='name' value="@if(old('name') == ''){{$user['name']}}@else{{old('name')}}@endif" type="text" class="form-control" id="name"  placeholder="Name">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="input">Email</label>
                                    <input name='email' value="@if(old('email') == ''){{$user['email']}}@else{{old('email')}}@endif" type="text" class="form-control" id="email" placeholder="Email" readonly>
                                </div>

                                <!-- Phone -->
                                <div class="form-group">
                                    <label for="input">Phone</label>
                                    <input name='phone' value="@if(old('phone') == ''){{$user['phone']}}@else{{old('phone')}}@endif" type="text" class="form-control" id="phone" placeholder="Phone">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="input">Password</label>
                                    <input name='password' value="" type="password" class="form-control" id="input" placeholder="Password">
                                    <p class='help-block'>Only enter, if you want to change else leave blank</p>
                                </div>

                                <!-- Photo -->
                                <div class="form-group">
                                    <label for="input">Profile Picture</label>
                                    <input name='profile_picture' value="" type="file" id="input"  placeholder="Photo">
                                    <p class='help-block'>Only upload, if you want to change else leave blank</p>
                                </div>


                                <!-- Submit -->
                                <input class="btn btn-success btn-lg center-block" type="submit" value="Submit">
                            </form>
                        </div>
                    </div>

                </div>    
            </div>

        </div>

    </section>


@stop
            
            
			
			