<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ContactForm;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function post(ContactForm $request){
        if($request->except('json')){
            $this->validator($request->all())->validate();
            if(App::environment()== 'production'){
                $recipient = env('MAIL_RECIPIENT');
                Mail::to($recipient)->send(new ContactUs($request));
            }else{
                Mail::to('dorian.mayamba@gmail.com')->send(new ContactUs($request));
            }
            Session::flash('success', 'Message envoyé');
            return response()->json('success');
        }
    }

    /**
     * @param array $data
     * 
     * @return Illuminate\Contract\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data,[
            'name' => ['required','string'],
            'email' => ['required', 'email', 'string'],
            'subject' => ['required', 'string'],
            'comment' => ['required', 'string'],
        ]);
    }
}
