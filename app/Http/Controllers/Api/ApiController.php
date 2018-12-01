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

}