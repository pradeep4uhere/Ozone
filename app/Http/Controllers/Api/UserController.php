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
use Illuminate\Support\Facades\Hash;

class UserController extends Master
{
     
 

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
        if(self::isValidToekn($request)){
           $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'password' => 'required|min:6',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
                'mobile' => 'required|unique:users|numeric',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $responseArray['status'] = false;
                $responseArray['message']= "Input are not valid";
                $responseArray['error']= $errors;
            }else{
                $userObj = new User();
                $userObj->first_name = $request->get('first_name');
                $userObj->last_name = $request->get('last_name');
                $userObj->password = Hash::make($request->get('password'));
                $userObj->email = $request->get('email');
                $userObj->mobile = $request->get('mobile');
                $userObj->created_at = self::getCreatedDate();
                try{
                    $userObj->save();
                    $last_insert_id = $userObj->id;
                    $userData= User::find($userObj->id);
                    $responseArray['status'] = true;
                    $responseArray['message']= "User Register Successfully.";
                    $responseArray['data']['user']= $userData;
                    $responseArray['data']['userId']= encrypt($userObj->id);
                }catch (Exception $e) {
                    $responseArray['status'] = false;
                    $responseArray['message'] = $e->getMessage();
                }
            }

        }else{
            $responseArray['status'] = false;
            $responseArray['message'] = "Invalid Token";
        }
        return response()->json($responseArray);
    }




}