<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\SendEmailNotification;




class AdminController extends Controller
{
    public function addDoctor(Request $request)
    {

        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name'=> ['required','max:255'],
                'phone'=> ['required','max:255'],
                'speciality'=> ['required','max:255'],
                'room'=> ['required','max:255'],
                //'image'=> ['required']
            ]);
            $data = $request->input();
            $doctor = new Doctor;
            $doctor->name = $data['name'];
            $doctor->phone= $data['phone'];
            $doctor->speciality= $data['speciality'];
            $doctor->room = $data['room'];
            //var_dump($data); die;
            //add image
            if($request ->hasFile('image')) {
                //get filename with extension
                $image = $request->file('image');
                //get filename without extension
                $input['imagename'] = time(). '.'.$image->getClientOriginalExtension();
                //get file extension

                // echo "<pre>"; print_r($input['imagename']); die;
                //Upload File
                $destinationPath = public_path('/admin/images/user');
                $image->move($destinationPath,$input['imagename']);
                
            }else{
                $input['imagename'] = '';
            }
            $doctor->image= $input['imagename'];
            $doctor->save();

            return redirect('/add-doctor')->with('message_success', 'Doctor Added successfully');

        }

        return view('admin.add_doctor');
    }

    public function viewDoctor()
    {
        $doctors = Doctor::get();
        //$doctors['status_code'] = 200;  
        // $doctors['status'] = true; 
        //echo "<pre>"; print_r(json_decode(json_encode($doctors))); die;
        //return $doctors;

        return view('admin.view_doctor')->with(compact('doctors'));
    }
    
    public function deleteDoctor($id)
    {
        if(Auth::id()){
            if(Auth::user()->usertype == 1){
                $doctor = Doctor::where(['id'=>$id]);
                if ($doctor->count() > 0) {
                    $doctor->delete();
                    return redirect()->back()->with('message_success','Doctor Deleted Successfully');
                } else {
                    return redirect('/view-doctor');
                }
            }
        }
    }

    public function editDoctor($id, Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name'=> ['required','max:255'],
                'phone'=> ['required','max:255'],
                'speciality'=> ['required','max:255'],
                'room'=> ['required','max:255']]);
            $data = $request->input();
            //add image
            if($request ->hasFile('image')) {
                //get filename with extension
                $image = $request->file('image');
                //get filename without extension
                $input['imagename'] = time(). '.'.$image->getClientOriginalExtension();
                //get file extension

                // echo "<pre>"; print_r($input['imagename']); die;
                //Upload File
                $destinationPath = public_path('/admin/images/user');
                $image->move($destinationPath,$input['imagename']);
            } else {
                $input['imagename'] = $data['current_image'];
            }
            Doctor::where('id', $id)->update([
                'name'=>$data['name'],
                'phone'=>$data['phone'],
                'speciality'=>$data['speciality'],
                'room'=>$data['room'],
                'image'=>$input['imagename']]);

            return redirect('/view-doctor')->with('message_success', 'Doctor Edited successfully');
        }
        $doctor = Doctor::find($id);
        //echo "<pre>"; print_r($doctor); die;
        return view('admin.edit_doctor')->with(compact('doctor'));
    }


    public function viewAppointment()
    {
        $appointments = Appointment::get();
        return view('admin.view_appointment')->with(compact('appointments'));
    }

    public function approve($id)
    {
        if(Auth::id()){
            if(Auth::user()->usertype == 1){
                $approve = Appointment::where('id', $id);
                if ($approve->count() > 0 ) {
                    $approve->update(['status'=>'Approved']);
                    return redirect()->back()->with('message_success','Appointment Updated Successfully!');
                }else{
                    return redirect()->back()->with('message_error','Appointment does not exist!');
                }

            }else{
                return redirect()->back();
            }

        }

    }

    public function cancel($id)
    {
        if(Auth::id()){
            if(Auth::user()->usertype == 1){
                $approve = Appointment::where('id', $id);
                if ($approve->count() > 0 ) {
                    $approve->update(['status'=>'Cancelled']);
                    return redirect()->back()->with('message_success','Appointment Updated Successfully!');
                }else{
                    return redirect()->back()->with('message_error','Appointment does not exist!');
                }

            }else{
                return redirect()->back();
            }

        }

    }

    public function sendMail($id, Request $request)
    {
        if($request->isMethod('post')){
            $appointment = Appointment::find($id);
            $details = [
                'body' => $request->body,
                'actiontext' => $request->actiontext,
                'actionurl' => $request->actionurl

            ];
            Notification::send($appointment, new SendEmailNotification($details));
            return redirect()->back();
        }
        $appointment = Appointment::find($id);

        return view('admin.view_mail')->with(compact('appointment'));
    }
}
