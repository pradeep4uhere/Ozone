<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Master;
use Auth;
use App\User;
use App\Seller;
use Session;
use App\City;
use App\DeliveryAddress;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\SaleUser;

class SellerController extends Master
{
     
 
     /**
     *@Author       : Pradeep Kumar
     *@Description  : Register API 
     *@Created Date : 24 Nov 2018
     */
    public function registerAsSeller(Request $request){
        if(self::isValidToekn($request)){

           $validator = Validator::make($request->all(), [
                'store_type_id' => 'required|numeric',
                'business_name' => 'required|min:6',
                'address_1' => 'required|min:6',
                'address_2' => 'required|min:6',
                'state' => 'required',
                'district' => 'required',
                'location' => 'required',
                'pincode' => 'required|numeric|min:6',
                'location_id' => 'required',
                'contact_number' => 'required|unique:sellers|numeric'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $responseArray['status'] = false;
                $responseArray['message']= "Input are not valid";
                $responseArray['error']= $errors;
                
                 
            }else{
                 
                try{

                    if ($request->isMethod('post')) {
                        $data = $request->all();

                            if(!self::IsValidRefer($data['referer_code'])){
                                $responseArray['status'] = false;
                                $responseArray['message'] = "Invalid Referer Code.";
                                return response()->json($responseArray);
                            }
                            $seller=Seller::create([
                                'store_type_id' => $data['store_type_id'],
                                'business_name' => $data['business_name'],
                                'referer_code' => $data['referer_code'],
                                'address_1' => $data['address_1'],
                                'state' => $data['state'],
                                'district' => $data['district'],
                                'location' => $data['location'],
                                'pincode' => $data['pincode'],
                                'location_id' => $data['location_id'],
                                'contact_number' => $data['contact_number'],
                                'email_address' => $data['email'],
                                'user_id' => decrypt($data['uid']),
                                'created_at'=>self::getCreatedDate()
                            ]);
                            $last_insert_id = $seller->id;
                            $userData= User::select('first_name','last_name','email','mobile')->find(decrypt($data['uid']));

                            //Get Seller Details
                            $sellerDetails = Seller::find($last_insert_id);
                            $responseArray['status'] = true;
                            $responseArray['message']= "User register as seller Account successfully.";
                            $responseArray['data']['Seller'] = $sellerDetails;
                            $responseArray['data']['User'] = $userData;
                            //Send Email to User For His Seller Account
                            if($last_insert_id){
                                $this->sendEmail($last_insert_id,$data);
                            }

                            //Check this user has Seller Account
                            $sellerProfile = Seller::where('user_id','=',decrypt($data['uid']))->get();
                            if($sellerProfile->count()){
                                $sellerArr=array();
                                foreach($sellerProfile as $sellerObj){
                                    $sellerDetails = Seller::find($sellerObj['id']);
                                    $sellerArr[] = $sellerDetails;
                                }
                                $userData['totalSellerAccount'] = count($sellerArr);
                                $responseArray['data']['User'] = $userData;
                                $responseArray['data']['User']['Seller'] = $sellerArr;
                            }
                            $responseArray['data']['uid'] = $data['uid'];
                            $responseArray['data']['sid'] = encrypt($last_insert_id);
                        

                    }
                    
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






    private static function IsValidRefer($referer_code){
        if($referer_code!=''){
            $count= SaleUser::where('referer_code','=',$referer_code)->get()->count();
            if($count>0){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }

    }


    /**
     * Send an e-mail confirmation to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmail($last_insert_id,$data)
    {   
        $seller = Seller::findOrFail($last_insert_id);
        $business_name  = $data['business_name'];
        $contact_number = $data['contact_number'];
        $email_address  = $data['email'];
        $url  = "http;//www.google.com";
        $body1 = "You have successfully registered .";
        $body2= "Thank you for joining with us.";
        $mail = Mail::send('Email.seller.register', [
            'name' => $business_name,
            'body1' => $body1,
            'business_name' => $business_name,
            'contact_number' => $contact_number,
            'email_address' => $email_address,
            'body3' => $body2,
            'url'  => $url ,
            'copyright' => 'copyright'
            ], function ($m) use ($seller) {
                $m->from('support@grabmorenow.com', 'Your Seller Account Created!');
                $m->to($seller->email_address, ucwords(strtolower($seller->business_name)))->subject('Your Seller Account Created!');
            });
        if($mail){
            return true;
        }
    }





}