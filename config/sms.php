<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SMS Getway Login Credentials
    |--------------------------------------------------------------------------
    |
    | Username Of the TextToLocal
    |
    */
    'username' =>    'go4shoponline@gmail.com',


     /*
    |--------------------------------------------------------------------------
    | SMS Getway Login Credentials
    |--------------------------------------------------------------------------
    |
    | Password Of the TextToLocal
    |
    */
    'password' =>    'Pradeep@3300',


     /*
    |--------------------------------------------------------------------------
    | SMS Getway Sender Name
    |--------------------------------------------------------------------------
    |
    | Password Of the TextToLocal
    |
    */
    'sender' =>    'GOSHOP',
    

    /*
    |--------------------------------------------------------------------------
    | Welcome User with Verification Code
    |--------------------------------------------------------------------------
    | username | code | sitename |
    */
    'welcome_user' => 'Hello {username}, Your Verification Code is {code}.Regards {sitename}',



    /*
    |--------------------------------------------------------------------------
    | Welcome Seller with Verification Code
    |--------------------------------------------------------------------------
    | businessName | CODE | SITENAME
    |
    */

    'welcome_seller' => 'Hello {businessName}, Your Verification Code is {CODE}.Regards {SITENAME}',

    /*
    |--------------------------------------------------------------------------
    | User Order Item List
    |--------------------------------------------------------------------------
    | SITENAME | USERNAME | ORDERNO | ITEMNAME | QNTY | PRICE | AMOUNT | SELLERNAME | SELLERMOBILE | SIGN
    | 
    */

    'user_order_item' => 'Hello [USERNAME],%nYour Order No: [ORDERNO] is confirm, Txn No:[REFNO].%nItem: [ITEMNAME] %nQuantity: [QNTY], Price:Rs. [PRICE]%nTotal Payment:Rs. [AMOUNT]%nSeller: [SELLERNAME] %nCall: [SELLERMOBILE] %nRegards,%n[SIGN]',



    /*
    |--------------------------------------------------------------------------
    | User Order Payment Confiramtion
    |--------------------------------------------------------------------------
    |
    | User will get SMS with Order and Payment Status
    | USERNAME | PAYMENTSTATUS | ORDERNO | ORDERDATE | AMOUNT | SIGN        
    |
    */
    'user_payment_recived' => 'Congratulations [USERNAME]!,%nYour Order is confirmed, Your Order No. [ORDERNO] is confirmed on [ORDERDATE] with Txn No: [REFNO] Total Payment Rs. [AMOUNT] recived. %nRegards,%n[SIGN]',
   
    /*
    |--------------------------------------------------------------------------
    | Seller Order Recived
    |--------------------------------------------------------------------------
    |
    | BUSINESSNAME | ORDERNO | REFNO | ORDERDATE | TOTALITEMS | PAYMENTSTATUS | AMOUNT | USERNAME | USERMOBILE |SIGN 
    |
    */
    'seller_order_recived' => 'Congratulations [BUSINESSNAME], New Order recived with Order No: [ORDERNO]. Txn No: [REFNO] Order Date: [ORDERDATE] Items:[TOTALITEMS], Payment Status [PAYMENTSTATUS] Total Payment:Rs. [AMOUNT] recived. %nCustomer: [USERNAME] %nCall: [USERMOBILE] %nRegards,%n[SIGN]',


    /*
    |--------------------------------------------------------------------------
    | Item List Template
    |--------------------------------------------------------------------------
    | BUSINESSNAME | ORDERNO | ITEMNAME | ITEMLIST | USERNAME | SELLERMOBILE | SIGN
    | 
    */
    'item_list' => 'Item:[ITEMNAME]%nQuantity:[QNTY],Price:Rs.[PRICE]',




    /*
    |--------------------------------------------------------------------------
    | Seller Order Item List
    |--------------------------------------------------------------------------
    | BUSINESSNAME | ORDERNO | ITEMNAME | ITEMLIST | USERNAME | SELLERMOBILE | SIGN
    | 
    */

    'seller_order_item' => 'Hello [BUSINESSNAME],%nItems list for Order No:[ORDERNO].%nItem:[ITEMNAME]%nQuantity:[QNTY],Price:Rs.[PRICE]%nTotal Amount:Rs.[AMOUNT]%nCustomer:[USERNAME]%nCall:[USERMOBILE]%nRegards,%n[SIGN]',

];