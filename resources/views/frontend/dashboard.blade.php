@extends('layouts.frontend.master')
@section('content')

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }
</script>
<section class="subpage-header">
    <div class="container">
        <div class="site-title clearfix">
            <h2>Dashboard</h2>
            <ul class="breadcrumbs">
                <li><a href="about-us.html#.">Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>
        <a href="contact-us.html" class="btn btn-primary get-in-touch" data-text="Contact us"><i class="icon-telephone114"></i>Contact us</a>
    </div>
</section>

<section>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-3' style='border-right: 1px solid grey;'>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Details</h3>
                    </div>
                    <div class="panel-body">
                        @if(Auth::user()->profile_picture != '')

                        <img style="width:100%;" src="{{url('assets/pics/profile_picture').'/'.Auth::user()->profile_picture}}">

                        @else

                        <img style="width:100%;" src="{{url('assets/pics/profile_picture/default-profile-pic.jpg')}}">

                        @endif

                        <p class='text-center' style='font-size:12px;'>Member Since: {{Auth::user()->created_at}}</p>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Membership Details</h3>
                    </div>
                    <div class="panel-body">
                        <h2 style='color:goldenrod' class='text-capitalize text-center'><i class='fa fa-money'></i> {{$user_info[0]['plan_name']}}</h2>
                    </div>
                </div>





            </div>

            <div class='col-sm-9'>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Recipient's Details</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th class='text-center'>Amount</th>
                                    <th class='text-center'>View Bank Details</th>
                                    <th class='text-center'>Proof of payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($users as $user)

                                <tr>
                                    <td>
                                        @if(isset($is_paid))
                                        {{$user['rname']}}
                                        @else
                                        {{$user['name']}}
                                        @endif
                                        
                                    </td>
                                    <td>{{$user['phone']}}</td>
                                    <td class='text-center'>{{$user['plan_amount']}}</td>
                                    <td class='text-center'>

                                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="<p>Bank Name : {{$user['bank_name']}}<br>Account Number : {{$user['account_number']}} <br> Branch code : {{$user['branch_code']}}<br> Account Holder : {{$user['account_holder']}}</p>">  <i class='fa fa-eye'></i> </button>

                                    </td>
                                    <td class='text-center'>
                                        @if(!isset($is_paid))
                                        <a class='btn btn-default' href='{{url('upload-pop'.'?donation_id='.$user['donation_id']).'&rid='.$user['id']}}'><i class='fa fa-upload'></i></a>
                                        @else
                                        <a class='btn btn-default' href='{{url('assets/pics'.'/'.$user['pop_picture'])}}'>Download</a>
                                        @endif

                                    </td>

                                </tr>
                                <?php break; ?>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Expect payment from the following persons soon</h3>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class='alert alert-success'>
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th class='text-center'>Amount</th>
                                    
                                    <th class='text-center'>Proof of payment</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Flag</th>
                                    <th>Timer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($receivers as $user)
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['phone']}}</td>
                                    
                                    
                                    <td class='text-center'>
                                        {{$user['amount_received']}}
                                    </td>
                                    <td class='text-center'><a class='btn btn-default' href='{{url('assets/pics'.'/'.$user['pop_picture'])}}'>Download</a></td>
                                    <td class="text-center">
                                        <form method='post' enctype="multipart/form-data" action="{{url('approve-pop')}}">
                                            {{csrf_field()}}
                                            <input type='hidden' name='donation_id' value='{{$user['donation_id']}}'>
                                           
                                            <button class="btn btn-success btn-sm" type="submit">
                                                Confirm
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form method='post' enctype="multipart/form-data" action="{{url('flag-pop')}}">
                                            {{csrf_field()}}
                                            <input type='hidden' name='donation_id' value='{{$user['donation_id']}}'>
                                           
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                Flag
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="getting-started"></div>
                                        <?php 
                                        $time = strtotime($user['payment_date'].'+9 hours');
                                        
                                        $countdown = strftime('%Y/%m/%d %H:%M:%S',$time);
                                        ?>
                                        <script type="text/javascript">
                                          $(".getting-started")
                                          .countdown("{{$countdown}}", function(event) {
                                            $(this).text(
                                              event.strftime('%H:%M:%S')
                                            );
                                          });
                                        </script>
                                    </td>
                                </tr>

                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>

        </div>

    </div>
</section>

@stop



