<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\sendmessages;
use Twilio\Rest\Client;

class StudentController extends Controller
{
    public function student(Request $request){
        //validating the request
        $request->validate([
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|unique:students,phone_number',
          ], [
            //making sure user dose not fill the form twice
            'email.email' => 'Please specify a real email',
            'email.unique' => 'We have a student with that email.',
            'phone_number.required' => 'A Phone number is required.',
            'phone_number.unique' => 'We have a student with that Phone Number.',
          ]);
            //insering user information
            $stud = new Student();
            $stud->firstname = $request->firstname;
            $stud->lastname = $request->lastname;
            $stud->email = $request->email;
            $stud->phone_number = $request->phone_number;
            $stud->degree_interested_in = $request->degree;
            $stud->enrol_requirement = $request->requirement;
            $stud->save();
            if($stud){
                //sending email to user immediately after submission
                $mailData = [
                    'headline' => 'Thank you for filling out our form',
                     'Message' => 'This Email is to Notify you that we recieved your application and we will get back to you soon!'
                ];
                Mail::to($request->email,)->send(new SendEmail($mailData));

              //sending message to admin whatsapp after user fill form
                    $sid = env("TWILIO_AUTH_SID");
                    $token = env("TWILIO_AUTH_TOKEN");
                    $twilio = new Client($sid, $token);

                    $message = $twilio->messages
                  ->create("whatsapp:+2348121326225", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "Hello Mr.Xyluz this message is to notify you that someone just filled your form!"
                           ]
                  );

                // dd($message->sid);

                return redirect()->back()->with('status', "Thank you for filling out the form we, Kindly check your Mail we just sent you an Email");
                
            }


        

    }
}
