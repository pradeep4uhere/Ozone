<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Master;
use Auth;
use App\User;
use Session;
use App\City;
use App\DeliveryAddress;

class UserController extends Master
{
     /**
     *@Author: Pradeep Kumar
     *@Description: Login Authentication Page
     */
    public static function isValidToekn($request){
        $parameters = $request->all();
        $str='';
        $token='';
        if(!empty($parameters)){
            foreach($parameters as $key=>$val){
                if($key!='token'){
                    $str.=$val.'|'; 
                }else{
                    $token = $val;
                }
            }
           //echo $str.config('global.CLIENT_SECRET');
           $serverTotak = md5($str.config('global.CLIENT_SECRET')); 
            if($token==$serverTotak){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
 

     /**
     *@Author       : Pradeep Kumar
     *@Description  : Login Authentication API 
     *@Created Date : 24 Nov 2018
     */
    public function login(Request $request) {
        try{
            if(self::isValidToekn($request)){
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    $userId = Auth::user()->id;
                    $email =  Auth::user()->email;
                    $first_name =  Auth::user()->first_name;
                    $last_name =  Auth::user()->last_name;
                    $address_1 =  Auth::user()->address_1;
                    $address_2 =  Auth::user()->address_2;
                    $address_3 =  Auth::user()->address_3;
                    $status =  Auth::user()->status;
                    $user_type =  Auth::user()->user_type;
                    $pincode =  Auth::user()->pincode;
                    $mobile =  Auth::user()->mobile;
                    $cartCollection = \Cart::session(Auth::user()->id);
                    $cartCollection = \Cart::getContent();
                    $countItem = $cartCollection->count();
                    $userDetails = array(
                        'id'=>$userId,
                        'email'=>$email,
                        'first_name'=>$first_name,
                        'last_name'=>$last_name,
                        'address_1'=>$address_1,
                        'address_2'=>$address_2,
                        'address_3'=>$address_3,
                        'status'=>$status,
                        'user_type'=>$user_type
                    );
                    $responseArray['status'] = true;
                    $responseArray['code'] = '202';
                    $responseArray['message'] = "Success";
                    $responseArray['User'] = $userDetails;
                    //return redirect()->intended('dashboard');
                }else{
                    $responseArray['status'] = false;
                    $responseArray['message'] = "Invalid Credentials Request.";
                }
            }else{
                $responseArray['status'] = false;
                $responseArray['message'] = "Invalid Token Request.";
            }

        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }
        return response()->json($responseArray);
    }



     /**
     *@Author       : Pradeep Kumar
     *@Description  : Register API 
     *@Created Date : 24 Nov 2018
     */
    public function register(Request $request){
        echo "<pre>";
        print_r($request->all());
        die;
    }

}