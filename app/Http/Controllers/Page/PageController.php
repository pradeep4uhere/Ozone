<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Master;
use Illuminate\Http\Request;
use App\ContactUs;
use Illuminate\Support\Facades\Validator;


class PageController extends Master
{

    /***************Terms and Conditions***************************/
    public function termsConditions(Request $request){
        return view(Master::loadFrontTheme('page.terms_conditions'));
    }


    /***************Terms and Conditions***************************/
    public function aboutUs(Request $request){
        return view(Master::loadFrontTheme('page.about_us'));
    }


    /***************Career***************************/
    public function career(Request $request){
        return view(Master::loadFrontTheme('page.career'));
    }

    /***************Privacy***************************/
    public function Privacy(Request $request){
        return view(Master::loadFrontTheme('page.privacy'));
    }

    /***************Privacy***************************/
    public function Cookies(Request $request){
        return view(Master::loadFrontTheme('page.cookies'));
    }


    /***************Help***************************/
    public function Help(Request $request){
        return view(Master::loadFrontTheme('page.help'));
    }


    /***************FAQ***************************/
    public function FAQ(Request $request){
        return view(Master::loadFrontTheme('page.faq'));
    }

    /***************FAQ***************************/
    public function contactus(Request $request){
        $responseArray = array();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'surname' => 'required|min:3',
                'email' => 'required|min:6',
                'phone' => 'required|min:10',
                'message' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $responseArray['status'] = false;
                $responseArray['message']= "Input are not valid";
                $responseArray['error']= $errors;
            }else{
                $name = $request->get('name');
                $surname = $request->get('surname');
                $email = $request->get('email');
                $phone = $request->get('phone');
                $message = $request->get('message');
                try{
                    $contactObj = new ContactUs();
                    $contactObj->first_name = $name;
                    $contactObj->last_name = $surname;
                    $contactObj->email = $email;
                    $contactObj->phone = $phone;
                    $contactObj->message = $message;
                    $contactObj->created_at = self::getCreatedDate();
                    $contactObj->save();
                    $responseArray['status'] = true;
                    $responseArray['message']= "Thank you for contact us, we will back to you 2 business working days.";
                }catch(Exception $e){
                    $responseArray['status'] = '9999';
                    $responseArray['message']= "Somthing went wrong, Please try after sometime.";
                }

            }
        }
        return view(Master::loadFrontTheme('page.contactus'),array('error'=>$responseArray));
    }

}
