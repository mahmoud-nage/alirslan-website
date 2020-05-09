<?php

namespace App\Http\Controllers\Web\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Contact\ContactRequest;
use App\Mail;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Submit sending contact
     *
     * @return response
     */
    public function submit(Request $request,$lang) {
    	//dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'details' => 'required|min:6',
            // 'captcha' => 'required|captcha',
            //'userAnswer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect::back()->with(['contact_errors' => $validator->errors()->all()]);
        }



        $mai=Mail::create($request->only(['name', 'email', 'details']))->save();

      // return $mai;
        return redirect:: back()->with(['contact_success' => 'Your Message Was Sent Successfully']);
    }
    // public function refreshCaptcha()
    // {
    //     return response()->json(['captcha'=> captcha_img()]);
    // }
}
