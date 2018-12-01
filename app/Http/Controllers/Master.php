<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;

//use App\Helpers;


use Auth;
use File;
use Session;
use Config;


class Master extends Controller {

    public $default_lang='en';
	public $session_wid ='';

    /*
     * @Get Session Language Code
     */
    public static function getLangCode(){
        return Session::get('lang_code');
    }

    public static function getCreatedDate(){
        return date('Y-m-d H:i:s');
    }


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


    /*
     * @Get Redirect With Lang
     */
    public function redirect($pageName){
        $redirectName='';
        if(Session::get('lang_code')){
            $getLangCode=Session::get('lang_code');
        }else{
            $default_lang = \App\Model\Language::getDefaultLanguge();
            $getLangCode = $default_lang->languageCode;
            Session::put('lang_code',$getLangCode);
        }
        if(Auth::check()){
            if(Auth::user()->user_type=='1001'){
                $redirectName=$getLangCode.'/admin/'.$pageName;    
            }else{
                $redirectName=$getLangCode.'/'.$pageName;    
            }
            
        }else{
            $redirectName=$getLangCode.'/'.$pageName;    
        }
        return redirect($redirectName);
    }






    
    /*
     * @Get All the System configuration
     */
    public function systemConfig($system_name=null) {
        $system_val = '';
        if(!empty($system_name)){ 
            $system = \App\SystemConfig::select('system_val')->where('system_name','=', $system_name)->first();
            $system_val = $system->system_val;
        }  
        return $system_val;         
    } 

 

    /*
     * @Get load the theme
     */
    public static function loadFrontTheme($path) {
        if(session('default_theme') == null){
            $default_theme = \App\SystemConfig::getSystemVal('DEFAULT_THEME');
            \Session::put('default_theme', $default_theme);
        }
        return session('default_theme').'.'.$path;
    }


    function getConfiguration($type) {
   
        $conf_lists = \App\SystemConfig::getSystemConfig($type); 
        $conf_lists = $conf_lists->toArray();
        foreach($conf_lists as $val) {            
            $config_arr[$val['system_name']] = $val['system_val'];
        }
        //echo '<pre>';print_r($config_arr);die;
        return $config_arr;
    }



    public static function Render($name){
        return view('admin.'.$name);

    }



}
