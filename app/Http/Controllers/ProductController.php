<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
    	$data['title'] = 'All Products';

    	$data['product_data'] = Product::all()->toArray();

    	return view('products', $data);
    }

    public function product_details($id)
    {
    	$data['title'] = 'Product Details';

    	$data['product_data'] = Product::find($id);
    	if(empty($data['product_data']))
    	{
    		return redirect('/');
    	}

    	$user = auth()->user();

    	if($user)
    	{
    		$data['intent'] = $user->createSetupIntent();
    	}
    	else
    	{
    		$data['intent'] = "";
    	}

    	return view('product_details', $data);
    } 

}
