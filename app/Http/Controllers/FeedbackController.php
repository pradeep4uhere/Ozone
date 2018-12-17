<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Master;
class FeedbackController extends Master
{

    public function feedback(Request $request){
    	echo "<pre>";
    	print_r($request->all());
    	die;

    }
}
