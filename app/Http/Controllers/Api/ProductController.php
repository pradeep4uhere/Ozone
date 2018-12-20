<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Master;
use Illuminate\Support\Facades\Redirect;
use App\Seller;
use App\Category;
use Image;
use App\Unit;
use App\Product;
use App\UserProduct;
use App\ProductImage;
use App\User;


class ProductController extends Master
{
    /**
     * Global Directory Name
     * Where All Images will upload
     */
    public $uploadDir;
    /**
     * Global Directory Name
     * Where All Business Images will upload
     */
    public $uploadLogoDir;
    /**
     * Global Directory Name
     * Where All Business thumb Images will upload
     */
    public $uploadThumbDir;
    
    public $imageName;
    public $thumbWidth;
    public $thumbHeight;
    
    
    
    public function __construct() {
       $this->middleware('api');
       $this->uploadDir=config('global.PRODUCT_DIR');
       $this->uploadLogoDir=config('global.PRODUCT_IMG_DIR');
       $this->uploadThumbDir=config('global.PRODUCT_THUMB_DIR');
       $this->thumbHeight=config('global.PRODUCT_THUMB_IMG_HEIGHT');
       $this->thumbWidth=config('global.PRODUCT_THUMB_IMG_WIDTH');
       $this->imageName=NULL;
    }



    /*
     * Add New Product By the Seller
     *
     */
    public function addNewProduct(Request $request){
        $responseArray['status'] = false;
        $responseArray['message']= "Invalid request.";
        if(self::isValidToekn($request)){
            $validator = Validator::make($request->all(), [
                'category_id' => 'required|string|min:1',
                'sub_category_id'=>'required|string|max:255',
                'brand_id' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'unit_id' => 'required',
                'quantity' => 'required|string|max:10',
                'product_in_stock' => 'required|string|min:1',
                'product_unlimited' => 'required|string|min:1',
                'price' => 'required'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $responseArray['status'] = false;
                $responseArray['error']= $errors;
            }else{
                $res = $this->saveProduct($request);
                if(array_key_exists('product_id', $res)){
                    $product = Product::with('Category','SubCategory','Brand','Unit')->find($res['product_id']);
                    //Get User Products
                    $userProduct = UserProduct::where('user_id','=',$request['created_by'])->where('product_id','=',$res['product_id'])->first();
                    $product['ProductDetails'] = $userProduct ; 

                    $responseArray['status'] = true;   
                    $responseArray['message']= "Product Addedd Successfully.";
                    $responseArray['result']= $product;      

                }else{
                    $responseArray['status'] = false;   
                    $responseArray['message']= $res['message'];   
                }

            }
        }else{
            $responseArray['status'] = false;
            $responseArray['message']= "Invalid Token.";
        }
        return response()->json($responseArray);

    }



    private function saveProduct($request){
        $data=$request->all();
        $data['user_id']=$data['created_by'];
        try{

                //Check is this Product is alredy Present 
                $preExProduct = $this->isValidProduct($request);
                if(empty($preExProduct)){
                    $product = new Product();
                    $product->title=$data['title'];
                    $product->description=$data['description'];
                    $product->category_id=$data['category_id'];
                    $product->sub_category_id=$data['sub_category_id'];
                    $product->brand_id=$data['brand_id'];
                    $product->unit_id=$data['unit_id'];
                    $product->created_by=$data['user_id'];
                    $product->created_at=date('Y-m-d H:i:s');
                    $product->save();
                    $lastId=$product->id;
                }else{
                    $lastId = $preExProduct[0]['id']; 
                }   
                    //Check If this Product Id is already Present For this User 
                    $userProduct = $this->isUSerProductPresent($request,$lastId);
                    //print_r($userProduct);die;
                    if(empty($userProduct)){
                        //Save data into product user table
                        if($lastId){
                            $data['productQuantity']=100;
                            $userProduct =  new \App\UserProduct();
                            $userProduct->product_id=$lastId;
                            $userProduct->user_id=$data['user_id'];
                            $userProduct->quantity_in_unit=$data['quantity'];
                            $userProduct->product_in_stock=$data['product_in_stock'];
                            $userProduct->unlimited_product=$data['product_unlimited'];
                            $userProduct->quantity=$data['productQuantity'];
                            $userProduct->default_price=$data['price'];
                            $userProduct->price=$data['price'];
                            $userProduct->created_at=date('Y-m-d H:i:s');
                            $userProduct->status=$data['status'];
                            $userProduct->is_deleted=0;
                            $userProduct->save();
                            $lastUserProdId=$userProduct->id;
                            //Get Latest Saved Product,
                            
                            $prodObj=new \App\UserProduct();
                            $sku=$prodObj->getSKU($lastUserProdId);
                            $saveProduct =  UserProduct::find($lastUserProdId);
                            $saveProduct->product_sku=$sku;
                            $userProduct->save();
                            if($userProduct->id){
                                $responseArray['status'] = true;
                                $responseArray['message']= "Product Addedd Successfully";
                                $responseArray['product_id']= $lastId;
                            }
                        }
                    }else{
                        $responseArray['status'] = "error";
                        $responseArray['message']= "Product already present, please add another product.";
                    }

                
        }catch(Exception $e){
            $responseArray['status'] = false;
            $responseArray['message']= "Server Error, Please try after sometime";
        }
        return $responseArray;
    }







    private function isValidProduct($request){
        $data=$request->all();
        $product = array();
        $data['user_id']=$data['created_by'];
        $product = Product::where('title','=',$data['title'])
        ->where('description','=',$data['description'])
        ->where('category_id','=',$data['category_id'])
        ->where('sub_category_id','=',$data['sub_category_id'])
        ->where('brand_id','=',$data['brand_id'])
        ->where('unit_id','=',$data['unit_id'])
        ->get()->toArray();
        return $product;
    }



    //Check USer Product is alredy Present
    private function isUSerProductPresent($request,$productId){
        $data=$request->all();
        $product = array();
        $data['user_id']=$data['created_by'];
        $product = UserProduct::where('user_id','=',$data['user_id'])
        ->where('product_id','=',$productId)
        ->where('status','=',1)
        ->get()->toArray();
        return $product;
    }




    
    
    

}
