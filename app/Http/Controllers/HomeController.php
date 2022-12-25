<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::check()){

            if(!Auth::user()->is_admin){
                $doctors = Doctor::get();

                return view('user.home')->with(compact('doctors'));
            }else{
                return view('admin.dashboard');
            }
        }
    }
    public function index(){
        $this->redirect();

        $doctors = Doctor::get();

        return view('user.home')->with(compact('doctors'));
    }

    public function appointment(Request $request)
    {
        
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name'=> ['required','max:255'],
                'email'=> ['required','max:255'],
                'date'=> ['required','max:255'],
                'phone'=> ['required','max:255'],
                'doctor_name'=> ['required'],
                'message'=> ['required']]);
            $data = $request->input();
            $appointment = new Appointment;
            $appointment->name = $data['name'];
            $appointment->email = $data['email'];
            $appointment->date = $data['date'];
            $appointment->phone = $data['phone'];
            $appointment->doctor = $data['doctor_name'];
            $appointment->message = $data['message'];
            $appointment->status = 'In Progress';
            if(Auth::id()){
                $appointment->user_id = Auth::user()->id;
            }else{
                return redirect()->back()->with('message_error','Kindly Login');
            }
            
            $appointment->save();
            return redirect()->back()->with('message_success','Appointment Booked');
        }

        $appointments = Appointment::where(['user_id'=>Auth::user()->id])->get();
        return view('user.myappointment')->with(compact('appointments'));

    }
    
    public function cancelAppointment($id)
    {
        $appoint = Appointment::where(['user_id'=>Auth::user()->id, 'id'=>$id]);
        if ($appoint->count() > 0) {
            $appoint->delete();
            return redirect()->back()->with('message_success','Appointment Deleted Successfully');
        } else {
            return redirect('/appointment');
        }
    }
}
