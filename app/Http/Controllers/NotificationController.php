<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// Use the REST API Client to make requests to the Twilio REST API
use App\Http\Controllers\Master;
use Twilio\Rest\Client;

 
class NotificationController extends Master
{
 
    static private  $sid;
    static private  $token;

    public function __construct(){
        self::$sid = env('TWILIO_SID');
        self::$token = env('TWILIO_TOKEN');
    }


    /*Welcome Message for New User Register to Website*/
    public static function sendWelcomeMessage($user,$body=null)
    {
        $twilio = new Client(self::$sid, self::$token);
        if($user!=''){
             $mobileNumber = $user['mobile'];
             if($body!=''){
                $text = $body;
             }else{
                $text = "Hello ".$user['first_name']."! Welcome to www.go4shop.online. Thanks For Registered with us. Regards, Go4Shop Team";
             }
             $message = $twilio->messages
                ->create("whatsapp:".$mobileNumber,
                array(
                    "body" => $text,
                    "from" => "whatsapp:".env('TWILIO_FROM')
                )
            );
            self::sendMessageToAdmin($user);

        }
    }




    /*Welcome Message for New User Register to Website as Seller*/
    public static function sendWelcomeMessageAsSeller($seller)
    {
        $twilio = new Client(self::$sid, self::$token);
        if(!empty($seller)){
             $mobileNumber = '+91'.$seller['contact_number'];
             if($mobileNumber!=''){
                $text = "Hello ".$seller['business_name']."!.";
                $text.=" Thanks For Registered with us as seller, Please visit your shop here ".env('APP_URL').'/seller/'.$seller['businessusername'];
                $text.= "Regards, Go4Shop Team";
             }
             $message = $twilio->messages
                ->create("whatsapp:".$mobileNumber,
                array(
                    "body" => $text,
                    "from" => "whatsapp:".env('TWILIO_FROM')
                )
            );
            self::sendMessageToAdminForSeller($seller);

        }
    }


    /************************************************************************************************/
    
                                /*Send All Notification To Admin Whatsapp*/

    /************************************************************************************************/

    public static function sendMessageToAdmin($user){

        $twilio = new Client(self::$sid, self::$token);
        $mobileNumber = env('ADMIN_MOBILE');
        $text = "Hello Admin! New User Register, Name:".$user['first_name']." Mobile:".$user['mobile'].". Regards, Go4Shop Team";
        $message = $twilio->messages->create("whatsapp:".$mobileNumber,array("body" => $text,"from" => "whatsapp:".env('TWILIO_FROM')));

    }


    public static function sendMessageToAdminForSeller($seller){

        $twilio = new Client(self::$sid, self::$token);
        $mobileNumber = env('ADMIN_MOBILE');
        
        $text = "Hello Admin! New Seller Created, Business Name:".$seller['business_name']." Mobile:".$seller['contact_number'];
        $text.=" Please visit your shop here ".env('APP_URL')."/seller/".$seller['businessusername'];
        $text.=" Regards, Go4Shop Team";

        $message = $twilio->messages->create("whatsapp:".$mobileNumber,array("body" => $text, "from" => "whatsapp:".env('TWILIO_FROM')));
    }




    /************************************************************************************************/

                              /*Send All Notification To Admin Whatsapp*/

    /************************************************************************************************/











}