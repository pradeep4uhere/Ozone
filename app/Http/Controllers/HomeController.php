<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\UserProduct;
use App\Seller;
use App\Pincode;
use App\Pin;
use App\Cart;


class HomeController extends Master
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		//dd($this->session_wid);
		$this->getCartItemList();
		//echo session('sessionId'); die;
    }
	
	
	
	private function getCartItemList(){
		$cartItem=array();
        //Get All the Cart List
        $sessionId=session()->get('session_id');
//		dd($sessionId);
		$cartId="";
		if($cartId!=''){
			$cartObj=Cart::find($cartId)->with('CartItem')->first();
		}else{
			$cartObj=Cart::where('session_id','=',$sessionId)->with('CartItem')->first();
		}
		
		
        if(!empty($cartObj)){
            foreach($cartObj->CartItem as $item){
                $cartItem[]= CartItem::with(['UserProduct','Seller'])->find($item['id']);
            }
			session(['cart_id' => $cartObj->id]);
        }
		session(['countItem' => count($cartItem)]);
		return $cartItem;
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$this->saveZipcode();
//         if(Auth::check()){
//            return $this->redirect('profile');
//         }else{
//             return view(Master::loadFrontTheme('home.index'));
//         }
		//Get All Category and Sub Category List
		
		$catObj = new \App\Category();
		$catArr=$catObj->getAllCategory();
		foreach($catArr as $obj){
			$catJson[]=$obj;
		}
		
		//Get All Cities
		$city = new \App\City();
		$cityArrObj=$city->getAllCity();
		foreach($cityArrObj as $obj){
			$cityArr[]=$obj;
		}
		
		//Get All Cities
		$pinArrObj=new \App\Pincode();
		//$pinArr=$pinArrObj->getAllPlaceName();
		//dd($pinArr);
		
		//Get All Seller List
		$seller = Seller::with('StoreType')->with('SellerImage')->get();
		//dd($seller);
        return view(Master::loadFrontTheme('frontend.index'),array(
		'catJson'=>json_encode($catJson),
		'cityArr'=>json_encode($cityArr),
		'sellerArr'=>$seller));
    }
    
    
    
    
    public function listing(Request $request) {
		
		$cat=$request->get('category');
		//Get Category Account
		if($cat!=""){
			try{
				$categoryObj=\App\Category::where('name','=',$cat)->first();
				if(!empty($categoryObj)){
					$category_id=$categoryObj->id;
				}else{
					$category_id="";
				}
			}catch (Exception $e) {
            	$category_id='';
        	}
		}else{
			$category_id='';
		}
		$city=$request->get('city');
		
        //Get All Product List
        $userProduct = new UserProduct();
		$param=array();
		if($category_id>0){
			$param['category_id']=$category_id;
		}
		//dd($param);
        $lsit=$userProduct->getAllList($param);
		//dd($lsit);
		//Get All Category and Sub Category List
		$catObj = new \App\Category();
		$catArr=$catObj->getAllCategory();
		foreach($catArr as $obj){
			$catJson[]=$obj;
		}
		
		$lsitArr=array();
		if(!empty($lsit)){
			foreach($lsit as $key=>$obj){
			$lsitArr[]=array(
				'UserProduct'=>$obj,
				'Product'=>$obj->product,
				'Seller'=>$this->getSellerInfo($obj['user_id'])
				);    
			}
		}
        //dd($lsitArr);	
		//URL of the get the location of the user
		return view(Master::loadFrontTheme('frontend.listing'),array(
		'productList'=>$lsitArr,
		'Category'=>$catJson,
		'searchCat'=>$cat)
		);
    }

    public function login() {
         return Master::Render('login.login');
    }
    
    public function getSellerInfo($user_id){
        return Seller::where('user_id','=',$user_id)->first();
    }
	
	public function getLocationByLatLng($lat,$lng){
		if(($lat!='') && ($lng!='')){
			$url="http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=false";
			$result = file_get_contents($url);
			// Will dump a beauty json :3
			$address=json_decode($result, true);
			dd($address);
			$formateAdd=array();
			$pincodeObj = array();
			$i=0;
			if(array_key_exists('results',$address)){
				foreach($address['results'] as $addressArr){
				if($i==0){
					foreach($addressArr['address_components'] as $v){
					$type=$v['types'][0];
					switch($type){
						case 'locality':
							$pincodeObj['locality']=$v['long_name'];
							break;
						case 'political':
							$pincodeObj['political']=$v['long_name'];
							break;
						case 'administrative_area_level_2':
							$pincodeObj['administrative_area_level_2']=$v['long_name'];
							break;
						case 'administrative_area_level_1':
							$pincodeObj['administrative_area_level_1']=$v['long_name'];
							break;
						case 'country':
							$pincodeObj['country']=$v['long_name'];
							break;
						case 'postal_code':
							$pincodeObj['postal_code']=$v['long_name'];
							break;
					}
				}
					$pincodeObj['formatted_address']=$address['results'][0]['formatted_address'];
					}
					$i++;
				}
			}
			return $pincodeObj;
		}
	}
	
	
	public function savePincodeData($arr,$lat,$lng){
		$pincodeObj = new \App\Pincode();
		if(array_key_exists('locality',$arr)){
			$pincodeObj->locality=$arr['locality'];
		}
		if(array_key_exists('political',$arr)){
			$pincodeObj->political=$arr['political'];
			$pincodeObj->place_name=$arr['political'];
		}
		$pincodeObj->administrative_area_level_2=$arr['administrative_area_level_2'];
		$pincodeObj->administrative_area_level_1=$arr['administrative_area_level_1'];
		$pincodeObj->admin_code1='100';
		$pincodeObj->country=$arr['country'];
		$pincodeObj->state=$arr['administrative_area_level_1'];
		$pincodeObj->county_province=$arr['administrative_area_level_2'];
		$pincodeObj->postal_code=$arr['postal_code'];
		$pincodeObj->created_at=date('Y-m-d H:i:s');
		$pincodeObj->status=1;
		$pincodeObj->country_code='IN';
		$pincodeObj->latitude=$lat;
		$pincodeObj->longitude=$lng;
		$pincodeObj->formatted_address=$arr['formatted_address'];
		$pincodeObj->save();
	}
	
	
	public function getlocation(Request $request){
		if ($request->isMethod('post')) {
			$lat=$request->get('lat');
			$lng=$request->get('lng');
			//find this lat and lng from database, if found return else
			// Call the APi for location and update the database
			$pincodeArr = Pincode::where(\DB::raw('substr(latitude, 0, 6)'), '=' ,substr($lat,0,6))
			->orwhere(\DB::raw('substr(longitude, 0, 6)'), '=' ,substr($lng,0,6))->first();
			if(!empty($pincodeArr)){
				if(empty($pincodeArr)){
					$this->savePincodeData($res,$lat,$lng);
					$res['place_name']=$pincodeArr['place_name'];
					$res['county_province']=$pincodeArr['county_province'];
					$res['state']=$pincodeArr['state'];
					$res['country']=$pincodeArr['country'];
					$res['postal_code']=$pincodeArr['postal_code'];
				}
			}else{
				$addressArr=$this->getLocationByLatLng($lat,$lng);
				$result['error']='success';
				$res=$addressArr;
				//dd($res);
				$pincodeArr = Pincode::where('postal_code', '=' ,$addressArr['postal_code'])->first();
				if(!empty($pincodeArr)){
					$res['place_name']=$pincodeArr['place_name'];
					$res['county_province']=$pincodeArr['county_province'];
					$res['state']=$pincodeArr['state'];
					$res['country']=$pincodeArr['country'];
					$res['postal_code']=$pincodeArr['postal_code'];
					$res['formatted_address']=$res['place_name'].', '.$res['county_province'].', '.$res['state'].', '.$res['postal_code'].', '.$res['country'];
				}else{
					$this->savePincodeData($res,$lat,$lng);

				}
				
				//return
			}
			$result['data']=$res;
			//dd($res);
			return json_encode($result);
		}
		
	}
	
	public function saveZipcode(){
		
	}
}
