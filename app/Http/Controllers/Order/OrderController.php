<?php
namespace App\Http\Controllers\Order;
date_default_timezone_set('Asia/Kolkata');
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Master;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Seller;
use Session;
use Cookie;
use App\Category;
use Image;
use App\Unit;
use App\Product;
use App\UserProduct;
use App\ProductImage;
use App\Cart;
use App\CartItem;
use App\DeliveryAddress;
use App\Order;
use App\OrderDetail;
use Darryldecode\Cart\CartCondition;
use App\Services\PayUService\Exception;

class OrderController extends Controller
{
    //
    public function orderpost(Request $request){
    	$paymentType = $request->get('_pt');
		$totalAmount = $request->get('_tm');
		$shippingId = $request->get('_sp');
		$userId = Auth::user()->id;
		$cartCollection = \Cart::session(Auth::user()->id);
		$cartCollections = \Cart::getContent();
		$cartItem = $cartCollections->toArray();
		$count=$cartCollections->count();
		$quantity=\Cart::getTotalQuantity();
		$subTotal=\Cart::session($userId)->getSubTotal();
		$total=\Cart::session($userId)->getTotal();
		

		//Insert Records Into Order Table
		$orderObj = new Order();
		$orderObj->sessionId =time().Session::get('_token');
		$orderObj->cookies_id =md5(Cookie::get('email'));
		$orderObj->user_id =Auth::user()->id;
		$orderObj->shipping_id =decrypt($shippingId);
		$orderObj->totalAmount =$total;
		$orderObj->payment_status ='Pending';
		$orderObj->order_status ='Processing';
		$orderObj->ip_address =$_SERVER['REMOTE_ADDR'];
		$orderObj->created_at =date('Y-m-d H:i:s');
		try{
			//dd($cartItem);
			if($orderObj->save()){
				//Create Each Order For Item
				$lastOrderId = $orderObj->id;
				$item=0;
				foreach ($cartItem as $key => $value) {
					$odObj =array();
					$odObj = new OrderDetail();
					$odObj->order_track=$this->getOrderId($lastOrderId);
					$odObj->order_id=$lastOrderId;
					$odObj->seller_id=$value['attributes']['seller_id'];
					$odObj->seller_name=$value['attributes']['seller'];
					$odObj->brand_name=$value['attributes']['brandName'];
					$odObj->order_date=date('Y-m-d H:i:s');
					$odObj->product_name=$value['name'];
					$odObj->user_product_id=$value['attributes']['product_id'];
					$odObj->default_images=$value['attributes']['default_images'];
					$odObj->default_thumbnail=$value['attributes']['default_thumbnail'];
					$odObj->quantity=$value['quantity'];
					$odObj->unit_price=$value['price'];
					$odObj->shipping_amount='0.00';
					$odObj->gst_amount='0.00';
					$odObj->total_amount=$this->getTotalAmountOfItem($value);
					try{
						$odObj->save();
						$this->saveOrderIdOfItem($lastOrderId,$odObj->id);
						$odObj ="";
						$item++;
					}catch (\Exception $e) {
						dd($e->getMessage());
						//abort(404);
					}
				}
				if($item==$count){
					//Update Order Id of the Table
					$orderNewObj = Order::find($lastOrderId);
					$orderNewObj->orderId = $this->getOrderId($lastOrderId);
					if($orderNewObj->save()){
							session(['order_id' => $lastOrderId]);
							\Cart::clear();
							\Cart::session($userId)->clear();
							//\Cart::where('id','=',$cart_id)->delete();
							session(['countItem' => 0]);
							return redirect()->route('thanks', ['token'=>Session::get('_token'),'id'=>encrypt($lastOrderId)]);
					}
				}

			}

		}catch (\Exception $e) {
			dd($e->getMessage());
			//abort(404);
		}
		
		
		return view(Master::loadFrontTheme('frontend.payment.order_creating'),
		array(
			'count'=>$count,
			'quantity'=>$quantity,
			'subTotal'=>$subTotal,
			'total'=>$total,
			'cartItem'=>$cartItem
		)); 
    }


    /*
     *@Author : Pradeep Kumar
     *@Description: Get Order ID
     */
    private function saveOrderIdOfItem($orderId,$itemId){
    	$itemObj = OrderDetail::find($itemId);
    	$itemObj->order_track = $this->getOrderId($orderId).'-'.$itemId;
    	$itemObj->save();
    }


    /*
     *@Author : Pradeep Kumar
     *@Description: Get Order ID
     */
    private function getOrderId($orderId){
    	return 'ODR'.date('Ymd').$orderId;
    }
 	

 	/*
     *@Author : Pradeep Kumar
     *@Description: Get getTotalAmountOfItem 
     */
    private function getTotalAmountOfItem($value){
    	$totalAmount = 0;
    	$totalAmount = $value['price'] * $value['quantity'];
    	return  $totalAmount;
    }




    /*
     *@Author : Pradeep Kumar
     *@Description: Get getTotalAmountOfItem 
     */
    public function thankyou($token,$id){
    	$ordeId = session('order_id');
    	//DD($ordeId);
    	$ids = decrypt($id);
    	if($ordeId==$ids){
    		$count='';
    		$quantity='';
    		$subTotal='';
    		$total='';
    		$cartItem='';
    		$orderArr=Order::with('OrderDetail')->find($ordeId);
    		if(count($orderArr['OrderDetail'])==0){
    			session(['order_id' => '']);
    			return redirect()->route('home', ['token'=>Session::get('_token')]);

    		}
    		$orderDate = date('d M Y',strtotime($orderArr['created_at']));
    		$totalAmount = $orderArr['totalAmount'];
    		$shipping_id = $orderArr['shipping_id'];
    		//Delevry Addredd
			if($shipping_id!=''){
				$address = DeliveryAddress::where('id','=',$shipping_id)->where('user_id','=',Auth::user()->id)->first();
			}
			//DD($address);
    		return view(Master::loadFrontTheme('frontend.payment.thankyou'),
				array(
					'count'=>$count,
					'quantity'=>$quantity,
					'subTotal'=>$subTotal,
					'total'=>$total,
					'cartItem'=>$cartItem,
					'orderID'=>$this->getOrderId($ordeId),
					'orderDetails'=>$orderArr,
					'orderDate'=>$orderDate,
					'totalAmount'=>$totalAmount,
					'address'=>$address
				)); 
    	}else{
    		abort(404);
    	}
    }







}
