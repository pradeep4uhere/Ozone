<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Master;
use Auth;
use App\User;
use Session;
use App\State;
use App\City;
use App\DeliveryAddress;
use App\StoreType;


class ApiController extends Master
{
     /**
     *@Author: Pradeep Kumar
     *@Description: Login Authentication Page
     */
   
    public function gettoken(Request $request) {
        $params = $request->all();
        //dd($params);
        $str='';
        foreach($params as $val){
            $str.=$val.'|'; 
        }
        //echo $str.config('global.CLIENT_SECRET');
        return md5($str.config('global.CLIENT_SECRET'));
        
    }


    public function getStoreType(Request $request){
        //Get Business Type List
        
        try{
            $businessType = StoreType::where('status','=',1)->get();
            $responseArray['status'] = true;
            $responseArray['data'] =$businessType;
            
        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }
        return response()->json($responseArray);

    }


    public function getStateList(Request $request){
        //Get Business Type List

        try{
            $params = $request->all();
            $stateObj = new State();
            $state= $stateObj->getAllState();
            $responseArray['status'] = true;
            $responseArray['data'] =$state;
            
        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }
        return response()->json($responseArray);

    }


    public function getCitylist(Request $request){
        //Get Business Type List
        if(self::isValidToekn($request)){
            try{
                $state_id = $request->get('state_id');
                $stateArr = State::find($state_id);
                if(!empty($stateArr)){
                    $cityList = City::where('state_id','=',$state_id)->get();
                    $responseArray['status'] = true;
                    $responseArray['data']['State'] =$stateArr;
                    $responseArray['data']['City'] =$cityList;
                }else{
                    $responseArray['status'] = false;
                    $responseArray['message'] ="Invalid State Id";
                }
                
            }catch (Exception $e) {
                $responseArray['status'] = false;
                $responseArray['message'] = $e->getMessage();
            }
        }else{
            $responseArray['status'] = false;
            $responseArray['message'] ="Invalid Token provided.";
        }
        return response()->json($responseArray);
    }




}