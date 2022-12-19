<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class CheckoutController extends Controller
{
	public function purchase(Request $request, $id)
	{
	    $user          = $request->user();

	    if(empty($user))
	    {
	    	return redirect('login');
	    }

	    $paymentMethod = $request->input('payment_method');
	    // $customer_id   = $user->stripe_id;

	    $product = Product::find($id);

		// $payment = $request->user()->pay(
		//         $product->price * 100
		//     );

		// print_r($payment); die;

	    try {
	        $user->createOrGetStripeCustomer();
	        $user->updateDefaultPaymentMethod($paymentMethod);
	        $user->charge($product->price * 100, $paymentMethod);        
	    } catch (\Exception $exception) {
	        return back()->with('error', $exception->getMessage());
	    }

	    return back()->with('message', 'Product purchased successfully!');
	}
}
