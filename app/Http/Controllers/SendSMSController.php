<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Master;
use Exception;
use Log;


 
class SendSMSController extends Master
{

    public static function getOTP($len){
        $result = '';
        for($i = 0; $i < $len; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }

    private static $username;

    private static $password;

    private static $textlocal;
    
    private static function sendSMS($mobileNumber, $message){
        //Get Username from Global File e.g app/config/smsTemplate.php
        $username           =   config('sms.username');
        $password           =   config('sms.password');
        $sender             =   config('sms.sender');
        $textlocal = new SMSController($username,$password);
        $response =$textlocal->getTemplates();
        foreach($response->templates as $temp){
            // echo $temp->basename(path)ody;
            $smsTemplate[$temp->title]=$temp->body;
        }
        //echo "<pre>";
        //print_r($smsTemplate);
        //die;
        try {
            $result = $textlocal->sendSms($mobileNumber, $message, $sender);
            //print_r($result);
            Log::channel('sms')->info('Request', array('data'=>json_encode($result))); 
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

    }



    public static function getMobileNumber($mobile){
        return array($mobile);
    }

    /************************************************************************************************/
    /*******************************Send ALL SMS to User and Seller**********************************/

    /*
    |-------------------------Send User Order Item List------------------------
    |--------------------------------------------------------------------------
    | All Parameters with String Length
    |--------------------------------------------------------------------------
    | USERNAME | ORDERNO | ITEMNAME | QNTY | PRICE | AMOUNT | SELLERNAME | SELLERMOBILE | SIGN
    | Hello [USERNAME], Your Order No: [ORDERNO] is confirm , Txn No:[REFNO]. 
    | Item: [ITEMNAME], Quantity: [QNTY] 
    | Price:Rs. [PRICE] 
    | Total Payment:Rs. [AMOUNT] 
    | Seller: [SELLERNAME], Call: [SELLERMOBILE] 
    | Regards,
    | [SIGN]
    |
    */
     public static function sendUserOrderItem($lastPaymentId){
        if($lastPaymentId!=''){
        $payment = \App\Payment::with(['Order','Order.User','Order.OrderDetail','Order.Seller'])->where('id','=',$lastPaymentId)->first();
        $orderStatus = $payment['status'];
        $orderId = $payment['order_id'];
        $paymentDate = $payment['payment_date'];
        $tansaxtionNo = $payment['payuMoneyId'];
        $totalAmount = $payment['net_amount_debit'];
        $sellerName = $payment['Order']['Seller']['business_name'];
        $mobileNumber = $payment['Order']['Seller']['contact_number'];
        $customerName = $payment['Order']['User']['first_name'];
        $customerNo = $payment['Order']['User']['mobile'];
            
        foreach ($payment['Order']['OrderDetail'] as $item) {
            //Get User Order Item Template
            $orderItemTemplate  =   config('sms.user_order_item');
            $orderItemParams = [
                "[USERNAME]"        =>  $customerName, 
                "[ORDERNO]"         =>  $item['order_track'], 
                "[REFNO]"           =>  $tansaxtionNo, 
                "[ITEMNAME]"        =>  ucwords($item['product_name']), 
                "[QNTY]"            =>  $item['quantity'], 
                "[PRICE]"           =>  $item['total_amount'], 
                "[AMOUNT]"          =>  $item['quantity']*$item['total_amount'], 
                "[SELLERNAME]"      =>  substr($sellerName,0,20), 
                "[SELLERMOBILE]"    =>  $mobileNumber, 
                "[SIGN]"            =>  env('APP_NAME'), 
            ];
            $mobile = $customerNo;
            $mobileNumber = self::getMobileNumber($mobile);
            foreach($orderItemParams as $key=>$val){
                $orderItemTemplate = str_replace($key,$val, trim($orderItemTemplate));
            }
            $message = $orderItemTemplate;
            self::sendSMS($mobileNumber, $message);
        }    
            
      
         
       }
    }




    /*
    |-------------------------User Payment Recived-----------------------------
    |--------------------------------------------------------------------------
    | All Parameters with String Length, Total Parameter-7
    |--------------------------------------------------------------------------
    |
    */
    public static function sendUserPaymentRecived($lastPaymentId){
        if($lastPaymentId!=''){
        //Get Payment Details
        $payment = \App\Payment::with(['Order','Order.User','Order.OrderDetail','Order.Seller'])->where('id','=',$lastPaymentId)->first();
        
        $orderStatus = $payment['status'];
        $orderId = $payment['order_id'];
        $paymentDate = $payment['payment_date'];
        $tansaxtionNo = $payment['payuMoneyId'];
        $totalAmount = $payment['net_amount_debit'];
        $userName = $payment['Order']['Seller']['business_name'];
        $mobileNumber = $payment['Order']['Seller']['contact_number'];
        $customerName = $payment['Order']['User']['first_name'];
        $customerNo = $payment['Order']['User']['mobile'];
        
        
        //Get User Order Item Template
        $mobile = $customerNo;
        //Get User Order Item Template
        $orderItemTemplate  =   config('sms.user_payment_recived');
        $orderItemParams = [
                "[USERNAME]"        =>  $customerName, 
                "[PAYMENTSTATUS]"   =>  $orderStatus, 
                "[ORDERNO]"         =>  $orderId, 
                "[ORDERDATE]"       =>  $paymentDate, 
                "[REFNO]"           =>  $tansaxtionNo, 
                "[AMOUNT]"          =>  $totalAmount, 
                "[SIGN]"            =>  env('APP_NAME'),
        ];
        $mobileNumber = self::getMobileNumber($mobile);
        foreach($orderItemParams as $key=>$val){
            $orderItemTemplate = str_replace($key,$val, trim($orderItemTemplate));
        }
        $message = $orderItemTemplate;
        self::sendSMS($mobileNumber, $message);
             
        }
    }








    /*
    |-------------------------Seller Order Recived-----------------------------
    */
    public static function sendSellerOrderRecived($lastPaymentId){
        if($lastPaymentId!=''){
        //Get Payment Details
        $payment = \App\Payment::with(['Order','Order.User','Order.OrderDetail','Order.Seller'])->where('id','=',$lastPaymentId)->first();
        
        $orderStatus = $payment['status'];
        $orderId = $payment['order_id'];
        $paymentDate = $payment['payment_date'];
        $tansaxtionNo = $payment['payuMoneyId'];
        $totalAmount = $payment['net_amount_debit'];
        $userName = $payment['Order']['Seller']['business_name'];
        $mobileNumber = $payment['Order']['Seller']['contact_number'];
        $customerName = $payment['Order']['User']['first_name'];
        $customerNo = $payment['Order']['User']['mobile'];
        
        
        //Get User Order Item Template
        $mobile = '91'.$mobileNumber;
        $orderItemTemplate  =   config('sms.seller_order_recived');
        $orderItemParams = [
                "[BUSINESSNAME]"        =>  $userName, 
                "[ORDERNO]"             =>  $orderId, 
                "[REFNO]"               =>  $tansaxtionNo, 
                "[ORDERDATE]"           =>  $paymentDate, 
                "[TOTALITEMS]"          =>  count($payment['Order']['OrderDetail']), 
                "[PAYMENTSTATUS]"       =>  $orderStatus, 
                "[AMOUNT]"              =>  $totalAmount, 
                "[USERNAME]"            =>  substr($customerName,0,20), 
                "[USERMOBILE]"          =>  $customerNo, 
                "[SIGN]"                =>  env('APP_NAME'), 
        ];
        $mobileNumber = self::getMobileNumber($mobile);
        foreach($orderItemParams as $key=>$val){
            $orderItemTemplate = str_replace($key,$val, trim($orderItemTemplate));
        }
        $message = $orderItemTemplate;
        self::sendSMS($mobileNumber, $message);
            
        }
    }



    /*
    | 
    |-------------------------Send Seller Order Item List------------------------
    | Hello [BUSINESSNAME],%nItems list for Order No:[ORDERNO] Txn No: [REFNO]%nItem:[ITEMNAME]%nQuantity:[QNTY],Price:Rs.[PRICE]%nTotal Amount:Rs.[AMOUNT]%nCustomer:[USERNAME]%nCall:[USERMOBILE]%nRegards,%n[SIGN]
    */
     public static function sendSellerOrderItem($lastPaymentId){
         if($lastPaymentId!=''){
            $orderStatus = $payment['status'];
            $orderId = $payment['order_id'];
            $paymentDate = $payment['payment_date'];
            $tansaxtionNo = $payment['payuMoneyId'];
            $totalAmount = $payment['net_amount_debit'];
            $sellerName = $payment['Order']['Seller']['business_name'];
            $mobileNumber = $payment['Order']['Seller']['contact_number'];
            $customerName = $payment['Order']['User']['first_name'];
            $customerNo = $payment['Order']['User']['mobile'];
            
            foreach ($payment['Order']['OrderDetail'] as $item) {
                //Get User Order Item Template
                $orderItemTemplate  =   config('sms.seller_order_item');
                $orderItemParams = [
                        "[BUSINESSNAME]"        =>  $sellerName, 
                        "[ORDERNO]"             =>  $item['order_track'],
                        "[REFNO]"               =>  $tansaxtionNo, 
                        "[ITEMNAME]"            =>  ucwords($item['product_name']), 
                        "[QNTY]"                =>  $item['quantity'], 
                        "[PRICE]"               =>  $item['total_amount'], 
                        "[AMOUNT]"              =>  $item['quantity']*$item['total_amount'], 
                        "[USERNAME]"            =>  substr($customerName,0,20), 
                        "[USERMOBILE]"          =>  $customerNo, 
                        "[SIGN]"                =>  env('APP_NAME'), 
                ];
                $mobile = '91'.$mobileNumber;
                $mobileNumber = self::getMobileNumber($mobile);
                foreach($orderItemParams as $key=>$val){
                    $orderItemTemplate = str_replace($key,$val, trim($orderItemTemplate));
                }
                $message = $orderItemTemplate;
                self::sendSMS($mobileNumber, $message);
                    
            }
             
         }
    }

    /*******************************Send ALL SMS to User and Seller**********************************/
    /************************************************************************************************/

}