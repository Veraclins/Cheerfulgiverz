@extends('layouts.frontend.master')

@section('content')
<section style='margin-top:100px;'>  
<div class='container'>
    
    <div class='row'>
        
        <div class='col-sm-12'>
            
            <div class="alert alert-success" style="margin-top:75px; margin-bottom:75px;">
                <h2 class="text-center">{{Session::get('message')}}</h2>                
            </div>
            <p class="text-center">You will redirected after 10 seconds or <a href="{{url('/')}}">click here</a></p>
            <script>
            // redirect after 10 seconds
            window.setTimeout(function() {
                window.location.href = '{{url('/')}}';
            }, 10000);
            </script>
        </div>
        
    </div>
    
</div>
</section>
    
@endsection

    
   