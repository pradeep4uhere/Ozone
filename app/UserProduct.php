<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Category;
use App\Unit;
use App\Brand;
use App\Seller;

class UserProduct extends Model
{
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_products';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    public function product() {
        return $this->belongsTo(Product::class)->with('Category','Brand','Unit','SubCategory');
    }
    
    
    public function ProductImage() {
         return $this->hasMany(ProductImage::class);
    }
    
    public function User() {
         return $this->belongsTo(User::class)->withDefault();
    }
    
    
    
    //
    //protected $fillable = ['title', 'description', 'category_id', 'sub_category_id','brand_id','unit_id','created_by'];

    public function getUserProductById($id){
        return $userProduct=UserProduct::with('product','ProductImage','User')->where('id','=',$id)
                ->where('user_id','=',Auth::user()->id)->first();
    }
    
    
    public function getUserProductList($userId){
        return $userProduct=UserProduct::with('product')->where('user_id','=',$userId)->get();
    }
    
    public function getSKU($userProductId){
        
        $category = new Category();
        $userProduct=UserProduct::with('product')->where('id','=',$userProductId)->first();
        
        $category_id=$userProduct->product['category_id'];
        $brand_id=$userProduct->product['brand_id'];
        $unit_id=$userProduct->product['unit_id'];
        
        $catNameObj=Category::where('id','=',$category_id)->first();
        $catName=SUBSTR($catNameObj['cat_code'],0,3);
        
        $brandNameObj= Brand::where('id','=',$brand_id)->first();
        $brandName=SUBSTR($brandNameObj['brand_code'],0,3);
        
        $unitNameObj= Unit::where('id','=',$unit_id)->first();
        $unitName=SUBSTR($unitNameObj['code'],0,3);
        
        $str=$catName.$category_id.$brandName.$brand_id.$unitName.$unit_id.'000'.$userProductId;
        return $str;
        
    }
    
    /**
     *@Auhtor: Pradeep Kumar
     *@Description: To Get all the list of the product 
     */
    public function getAllList($param=null){
		if(isset($param['category_id'])){
			$this->category_id=$param['category_id'];
		}else{
			$this->category_id='';
		}
	    $list = UserProduct::with(['product','ProductImage','User'])->where('status','=',1);
		
		if($this->category_id>0){
			$list->whereHas('product',function($query){
				$query->where('category_id','=',$this->category_id);
			});
		}
		$res=$list->get();
        return $res;
    }
    
    
    /**
     *@Auhtor: Pradeep Kumar
     *@Description: To Get all the list of the product 
     */
    public function getAllProductListOfSeller($user_id,$id){
        $list = UserProduct::with('product','ProductImage','User')
                ->where('status','=',1)
                ->where('user_id','=',$user_id)
//                ->where('id','!=',$id)
                ->get();
        return $list;
    }
}
