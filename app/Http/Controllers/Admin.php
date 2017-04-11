<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Input;

use App\Plan;

use App\Donation;

class Admin extends Controller
{
    public function index() {
        
        return view('admin.index');
        
    }
    
    public function blank() {
        
        return view('admin.blank');
        
    }
    
    public function profile($user_id) {  
        
        $data['users'] = User::find($user_id)->toArray();

        return view('admin.profile',$data);
        
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
    
    public function view_donations(Request $request) {
        
        $data['donations'] = Donation::
                             where('payment_status','=','pending')
                             ->join('users','donations.payer_id','=','users.id')
                             ->join('plans','users.plan_id','=','plans.plan_id')
                             ->get()->toArray();
        
        $i = 0;
        
        foreach ($data['donations'] as $donation) {
            
            $user_details = User::where('id','=',$donation['receiver_id'])->get()->toArray();
            
            if(count($user_details) == 0){
                $data['donations'][$i]['rid'] = '';
                $data['donations'][$i]['rname'] = '';
            }else{
                $data['donations'][$i]['rid'] = $user_details[0]['id'];
                $data['donations'][$i]['rname'] = $user_details[0]['name'];
                
            }
            
            
            $i++;
        }
        
        return view('admin.view_donations',$data);
        
    }
    
    //////////////////////////// Plans ///////////////////////////////
    
    public function plan_read(Request $request) {

        $data['plans'] = Plan::get()
                         ->toArray();

        return view('admin.plans', $data);
    } 

    public function plan_delete(Request $request) {


        $this->validate($request, [
            'plan_id' => 'required'
        ]);


        Plan::where('plan_id', '=', $request->plan_id)
                ->delete();

        return redirect()->back()->with('message', 'Plan is successfully deleted');
    
    }

    public function plan_show_update(Request $request) {


        $data['plans'] = Plan::
                where('plan_id', '=', $request->plan_id)                
                ->get()
                ->toArray();

        return view('admin.update-plan', $data);
    
    
    }

    public function plan_update(Request $request) {


        $this->validate($request, [
            'plan_id' => 'required'
        ]);


        $update = array(
            'plan_name' => $request->plan_name,
            'plan_amount' => $request->plan_amount
        );


        Plan::where('plan_id', '=', $request->plan_id)
                ->update($update);

        return redirect()->back()->with('message', 'Plan is successfully updated');
        }

    public function plan_show_create() {




        return view('admin.create-plan');
    
    
    }

    public function plan_create(Request $request) {


        $this->validate($request, [
            'plan_name' => 'required',
            'plan_amount' => 'required|numeric'
        ]);

        $plan = new Plan();
        $plan->plan_name = $request->plan_name;
        $plan->plan_amount = $request->plan_amount;
        $plan->save();

        return redirect()->back()->with('message', 'Plan is successfully created');

        }
        
    ////////////////////////// Donaton //////////////////////////////
        
    public function change_donation_status(Request $request) {
        
        $this->validate($request,[
            'donation_id' => 'required'
        ]);
        
        $donation = Donation::find($request->donation_id);
        $donation->payment_status = $request->payment_status;
        $donation->save();
        
        return redirect()->back()->with('message', 'Status is successfully changed');
        
        
    }
    
    ////////////////////////// Users ////////////////////////////////
    
    public function view_users(Request $request){
        
        $data['users'] = User::where('role_id','<>','1')
                               ->get()->toArray();
        
        return view('admin.view-users',$data);
        
    }
    
    public function delete_user(Request $request){
        
        User::where('id','=',$request->user_id)->delete();
        
        return redirect()->back()->with('message', 'User is successfully deleted');
        
    }
    
    


    public function create_user() {
        
        $data['plans'] = Plan::get()->toArray();

        return view('admin.create-user',$data);
    
    
    }


    public function user_registration(Request $request) {
        
        
        
        $this->validate($request,[
            'name'           => 'required|max:255',
            'email'          => 'required|email|max:255|unique:users',
            'password'       => 'required|min:6|confirmed',
            'bank_name'      => 'required',
            'branch_code'    => 'required',
            'account_number' => 'required',
            'account_holder' => 'required',
            'plan_id'        => 'required'
            
        ]);
        
        
        $user                      = new User();
        $user->name                = $request->name;
        $user->email               = $request->email;
        $user->password            = bcrypt($request->password);  
        $user->bank_name           = $request->bank_name;
        $user->branch_code         = $request->branch_code;
        $user->account_number      = $request->account_number;
        $user->account_holder      = $request->account_holder;   
        $user->activation_status   = 1;
        $user->role_id             = '2';
        $user->plan_id             = $request->plan_id;
        
        $user->save();    
        
        return redirect('user-registration-success')->with('message','Thank you, Check your mail to activate your account.');
        
        
        
    } 
    
    
}
