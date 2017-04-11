@extends('layouts.frontend.master')
@section('content')
			
            
    <section class="subpage-header">
            <div class="container">
                    <div class="site-title clearfix">
                            <h2>Upload Proof of payment</h2>
                            <ul class="breadcrumbs">
                                    <li><a href="about-us.html#.">Home</a></li>
                                    <li>POP</li>
                            </ul>
                    </div>
                    <a href="contact-us.html" class="btn btn-primary get-in-touch" data-text="Contact us"><i class="icon-telephone114"></i>Contact us</a>
            </div>
    </section>

<section>
    <div class='container'>
        <div class='col-sm-6 col-sm-offset-3'>
            
            @if(Session::has('message'))
            <div class='alert alert-success'>
                {{Session::get('message')}}
            </div>
            @endif
            
            <form method='post' enctype="multipart/form-data" action="{{url('make-pop-uploaded')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="input">Upload Pop</label>
                    <input name='pop' value="{{old('pop')}}" type="file" class="form-control" id="input" placeholder="Text">
                </div>
                
                <input type='hidden' name='donation_id' value='{{$_GET['donation_id']}}'>
                <input type='hidden' name='rid' value='{{$_GET['rid']}}'>
                <input class="btn btn-success" type="submit" value="Submit">
            </form>
            
        </div>
        
    </div>
</section>

@stop
            
            
			
			