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
                'state_id' => 'required|numeric',
                'city_id' => 'required|numeric',
                'pincode_id' => 'required|numeric',
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
                        
                            

                        
                            $seller=Seller::create([
                                'store_type_id' => $data['store_type_id'],
                                'business_name' => $data['business_name'],
                                'address_1' => $data['address_1'],
                                'state_id' => $data['state_id'],
                                'city_id' => $data['city_id'],
                                'pincode_id' => $data['pincode_id'],
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




}