<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Session;

use App\Plan;

use App\Donation;

use Illuminate\Support\Facades\Auth;



class Frontend extends Controller
{
    
    public function index(Request $request) {
        
        return view('frontend.index');
        
    }
    
    public function user_registration(Request $request) {
        
        
        
        $this->validate($request,[
            'name'           => 'required|max:255',
            'email'          => 'required|email|max:255|unique:users',
            'password'       => 'required|min:6|confirmed',
            'bank_name'      => 'required',
            'phone'    => 'required',
            'account_number' => 'required',
            'account_holder' => 'required',
            'plan_id'        => 'required'
            
        ]);
        
        
        $user                      = new User();
        $user->name                = $request->name;
        $user->email               = $request->email;
        $user->password            = bcrypt($request->password);  
        $user->bank_name           = $request->bank_name;
        $user->phone         = $request->phone;
        $user->account_number      = $request->account_number;
        $user->account_holder      = $request->account_holder;        
        $confirmation_code         = time().rand(1, 10000);
        $user->confirmation_code   = $confirmation_code;
        $user->activation_status   = 0;
        $user->role_id             = '2';
        $user->plan_id             = $request->plan_id;
        
        $user->save();
        
        
        
        // Send the email confirmation email to user to verify
        
        $email_data = array(
            'email'             => $request->email,
            'confirmation_code' => $confirmation_code
        );
        
        
        Mail::send('frontend.email.register', $email_data, function($message) use ($request) {     

        
        $message->replyTo($request->email,$request->first_name.' '.$request->last_name);
        $message->subject('Registration Successful');
        $message->to($request->email);
        });
        
        return redirect('user-registration-success')->with('message','Thank you, Check your mail to activate your account.');
        
        
        
    }    
    
    public function confirm_user(Request $request) {
        
        $this->validate($request,[
           'email' => 'required|email',
           'confirmation_code' => 'required|numeric'
        ]);
        
        $count = User::where('email','=',$request->email)
                 ->where('confirmation_code','=',$request->confirmation_code)
                 ->count();
        
         if ($count > 0) {
             
             $user = User::where('email','=',$request->email)
                     ->where('confirmation_code','=',$request->confirmation_code);
             
             $update = array(
                 'activation_status' => '1',
                 
             );
             $user->update($update);
             
                 
             
             
             return redirect('user-registration-success')->with('message','Thank you, you are successfuly registered.');
             
         }
        
    }
    
    public function logout() {
        
        \Illuminate\Support\Facades\Auth::logout();
        
        return redirect('/');
        
    }
	
    public function excel_test(){
		Excel::create('swatijoshi', function($excel) {

			$excel->sheet('iloveyou', function($sheet) {

				$sheet->fromArray(array(
					array('data1', 'data2'),
					array('data3', 'data4')
				));

			});

		})->export('xls');
	}
        
    public function profile($user_id) {  
        
        $data['users'] = User::find($user_id)->toArray();

        return view('frontend.profile',$data);
        
    }
    
    public function update_profile(Request $request) {
        
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            
        ]);
        
        $update = array();
        $update['name'] = $request->name;
        $update['phone'] = $request->phone;
        if ($request->password != '') {
            $update['password'] = bcrypt($request->password);
        }        
        
        
        if (Input::hasFile('profile_picture')) {
            $file = Input::file('profile_picture');
            $file = $file->move('/home/cheerfulgiverz/public_html' . '/assets/pics/profile_picture', rand(10000, 99999) . time() . '.' . $file->getClientOriginalExtension());
            $name = explode('/', $file->getRealPath());
            $update['profile_picture'] = end($name);
            
        }
        
        User::where('id','=',$request->user()->id)
              ->update($update);
        
        return redirect()->back()->with('message','Profile is successfully updated');
        
    }
    
    // show registration page 
        
    public function sign_up(Request $request) {
        
        $data['plans'] = Plan::get()->toArray();
        
        return view('frontend.sign-up',$data);
    }
    
    // Dashboard area 
    
    public function dashboard(Request $request) {
        
        // check if user alreay once paid for that cycle 
        // compare number of payments vs number of receipts
        
        
        
        $user_id = Auth::user()->id;
        $plan_id = Auth::user()->plan_id;
        $donation_details = Donation::where('donations.payer_id','=',$user_id)
                                      ->join('users','users.id','=','donations.payer_id')
                                      ->join('plans','plans.plan_id','=','users.plan_id')
                                      ->get()
                                      ->toArray();
        
        $donation_details_receiver = Donation::where('donations.receiver_id','=',$user_id)
                                      ->join('users','users.id','=','donations.receiver_id')
                                      ->join('plans','plans.plan_id','=','users.plan_id')
                                      ->get()
                                      ->toArray();
        
        $payer_count = count($donation_details);
        $receiver_count_raw = count($donation_details_receiver);
        
        $receiver_count = $receiver_count_raw % 2 == 0 ? ($receiver_count_raw/2) : ($receiver_count_raw-1)/2 ;
        
            
        if ($payer_count > $receiver_count) {
            
            // 1) get the last payer id
            // 2) only show one record
            
            
            $data['users'] = Donation::where('donations.payer_id','=',$user_id)
                                      ->join('users','users.id','=','donations.payer_id')
                                      ->join('plans','plans.plan_id','=','users.plan_id')
                                      ->orderBy('donations.payment_date','desc')
                                      ->take(1)
                                      ->get()
                                      ->toArray();
            
                              
            
            /////////////////////////
            
            
        
        $i = 0;
        
        foreach ($data['users'] as $user) {
            
            $user_details = User::where('id','=',$user['receiver_id'])->get()->toArray();
            
            if(count($user_details) == 0){
                $data['users'][$i]['rid'] = '';
                $data['users'][$i]['rname'] = '';
            }else{
                $data['users'][$i]['rid'] = $user_details[0]['id'];
                $data['users'][$i]['rname'] = $user_details[0]['name'];
                
            }
            
            
            $i++;
        }
            
        
        
            /////////////////////////
            
                              
                              
            
            $data['is_paid'] = true;

        }  else {
            
            // plan details 
            $plan_id = Auth::user()->plan_id;
            $plan_amount_details = Plan::find($plan_id);
            $data['plan_amount'] = $plan_amount_details['plan_amount'];






            // count number of donations in donation table

            $total_transactions = Donation::all()->count();

            // if there are lesser than 3 transactions , then show admin to pay donation
            if($total_transactions < 3){

                $data['users'] = User::
                                 where([
                                     'role_id' => '1'
                                 ])
                                  ->get()
                                  ->toArray();


            }else{
                /*
                 * 1) get all the donations in decending order 
                 * 2) loop through all transactions and check how many times user has received payment
                 *    if user is lesser than 2 than exit the loop and show that user             
                 */

                $data['users'] = Donation::where('users.id','<>',Auth::user()->id)
                                     ->where('users.plan_id','=',$plan_id)
                                     ->join('users','users.id','=','donations.payer_id')  
                                     ->join('plans','plans.plan_id','=','users.plan_id')
                                     ->orderBy('donations.payer_id','asc')                                      
                                     ->get()
                                     ->toArray();

                            
                 $i = 0;
                 foreach ($data['users'] as $user) {

                     $donation_details = Donation::where('donations.payer_id','=',$user['payer_id'])
                                          ->join('users','users.id','=','donations.payer_id')
                                          ->join('plans','plans.plan_id','=','users.plan_id')
                                          ->get()
                                          ->toArray();

                    $donation_details_receiver = Donation::where('donations.receiver_id','=',$user['payer_id'])
                                                  ->join('users','users.id','=','donations.receiver_id')
                                                  ->join('plans','plans.plan_id','=','users.plan_id')
                                                  ->get()
                                                  ->toArray();

                    $payer_count = count($donation_details);
                    $receiver_count_raw = count($donation_details_receiver);
                    $receiver_count = $receiver_count_raw % 2 == 0 ? ($receiver_count_raw/2) : ($receiver_count_raw-1)/2 ;
                    
                   
                    if ($payer_count == $receiver_count) {
                        
                        unset($data['users'][$i]);
                        
                    }
                    
                    $i++;
                    
                    
                 }
                 
                  





            }

        }
        
        //////////////////////////////////// Receiver //////////////////////////////////
        
        /*
         * 1)  Only showing receipts of this cycle 
         * 2)  
         */
        
        if(($payer_count > $receiver_count) || ($payer_count == $receiver_count)){
            
            $data['receivers'] = Donation::where('receiver_id','=',$user_id)
                            ->where('payment_status','=','pending')
                            ->join('users','users.id','=','donations.payer_id')
                            
                             ->get()
                             ->toArray();
            
        }else{
            $data['receivers'] = array();
        }
        
        
                     
        ///////////////////////////////////// User Details ////////////////////////////
        
        $data['user_info'] = User::join('plans','plans.plan_id','=','users.plan_id')
                     ->get()->toArray();
        
            
        
            
        
       
        
        return view('frontend.dashboard',$data);
        
    }
    
    public function show_pop(Request $request) {
        
        return view('frontend.upload-pop');
        
    }
    
    public function upload_pop(Request $request) {
        
        /*
         *  1) if there is 3 or less than 3 transaction then admin will be available to make the payment
         *     each user can make payment only once in his/her lifetime
         *  2) older user, who made payment will come under receipient list 
         *  3) each user will get twice the amount as per the package subscribed 
         *  4) after confirmation of the second payment , account will automatically be deleted 
         */
        
        $donation_id = $request->donation_id;
        $payer_id    = Auth::user()->id;
        
        $plan_amount_details = User::join('plans','plans.plan_id','=','users.plan_id')
                              ->where('users.id','=',$payer_id)
                              ->get()
                              ->toArray();
        
        $plan_amount         = $plan_amount_details[0]['plan_amount'];
        
        
        $donation = new Donation();
        $donation->payer_id = $payer_id;
        $donation->receiver_id = $request->rid;
        $donation->amount_received = $plan_amount;
        $donation->payment_date = strftime('%Y-%m-%d %H:%M:%S',time());
         
        if (Input::hasFile('pop')) {
            $file = Input::file('pop');
            $file = $file->move('/home/cheerfulgiverz/public_html' . '/assets/pics', rand(10000, 99999) . time() . '.' . $file->getClientOriginalExtension());
            $name = explode('/', $file->getRealPath());
            $donation->pop_picture = end($name);
            $donation->save();
            
        }
        
        $payer_details = User::where('id','=',$payer_id)
                         ->get()->toArray();
        
        $receiver_details = User::where('id','=',$request->rid)
                            ->get()->toArray();
        
            $email_data = array(
                
                'payer_name' => $payer_details[0]['name'],
                'amount_received' => $plan_amount,
                
            );


            Mail::send('frontend.email.payment_receipt', $email_data, function($message) use ($receiver_details) { 

                
                $message->replyTo('support@cheerfulgiverz.com', 'Cheerfulgiverz');
                $message->subject('Amount Received from cheerfulgiverz');
                $message->to($receiver_details[0]['email']);
        });
        
        return redirect()->back()->with('message', 'Proof has been successfully uploaded');
        
        
        
        
        
        
        
    }
    
    public function approve_pop(Request $request) {
        
        $donation = Donation::find($request->donation_id);
        $donation->payment_status = 'accepted';
        $donation->save();
        
        return redirect()->back()->with('message', 'Payment is successfully approved');
        
    }
    
    public function flag_pop(Request $request) {
        
        // get receiver details 
        $data['users'] = Donation::where('donation_id','=',$request->donation_id)
                             ->join('users','users.id','=','donations.receiver_id')
                             ->get();
        
        // add payer details in the array 
        $i = 0;
        
        foreach ($data['users'] as $user) {
            
            $user_details = User::where('id','=',$user['payer_id'])->get()->toArray();
            
            if(count($user_details) == 0){
                $data['users'][$i]['pid'] = '';
                $data['users'][$i]['pname'] = '';
            }else{
                $data['users'][$i]['pid'] = $user_details[0]['id'];
                $data['users'][$i]['pname'] = $user_details[0]['name'];
                
            }
            
            
            $i++;
        }
        
        // send email to admin
        
        $email_data = array(
            'receiver_name' => $data['users'][0]['name'],
            'payer_name' => $data['users'][0]['pname'],
            'amount_received' => $data['users'][0]['amount_received'],
            'donation_id' => $data['users'][0]['donation_id'],
            'payer_id' => $data['users'][0]['pid'],
            'receiver_id' => $data['users'][0]['id'],
            
        );


        Mail::send('frontend.email.flag', $email_data, function($message) use ($request) { 

            
            $message->replyTo('priyankbhargava2008@gmail.com', 'Cheerfulgiverz');
            $message->subject('User has flagged the donation');
            $message->to('admin@cheerfulgiverz.com');
        });
        
        return redirect()->back()->with('message', 'Transaction has been successfully flagged');
        
        
        
    }
    
    public function about(Request $request) {
        
        return view('frontend.about-us');
        
    }
    
    public function contact(Request $request) {
        return view('frontend.contact-us');
    }
    
    public function enquiry(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'matter' => 'required'
        ]);
        
        $email_data = array(
            'name' => $request->first_name,            
            'email' => $request->email,
            'phone' => $request->phone,
            'matter' => $request->matter
        );


        Mail::send('frontend.email.enquiry', $email_data, function($message) use ($request) { 

            
            $message->replyTo($request->email, 'Cheerfulgiverz' );
            $message->subject('New Enquiry from Cheerfulgiverz');
            $message->to('admin@cheerfulgiverz.com');
        });
        
        return redirect()->back()->with('message', 'Message successfully sent');
        
    }
    
    public function how_it_works(Request $request) {
        
        return view('frontend.how-it-works');
        
    }
    
    
    
    
    
    
        
        
	
	
}
