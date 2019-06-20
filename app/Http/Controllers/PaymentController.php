<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
// use Srmklive\PayPal\Services\AdaptivePayments;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new payment resource.
     * with paypal or stripe
     * 
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        $provider = new ExpressCheckout;      // To use express checkout.
        // $provider = new AdaptivePayments;     // To use adaptive payments.
        $provider->setCurrency('GBP')->setExpressCheckout($data);   // changing the currency
        /*  Changing Parameters for the API     */
        $options = [
            'BRANDNAME' => 'URSB Payment',
            'LOGOIMG' => 'http://localhost/assets/images/favicon.png',
            'CHANNELTYPE' => 'Merchant'
        ];

        $provider->addOptions($options)->setExpressCheckout($data);

        $invoiceId  = unique();
        $data   = $this->cartData($invoiceId);

        $response = $provider->setExpressCheckout($data);

        // Use the following line when creating recurring payment profiles (subscriptions)
        // $response = $provider->setExpressCheckout($data, true);

         // This will redirect user to PayPal
        return redirect($response['paypal_link']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new ExpressCheckout;      // To use express checkout.

        $token      =   $request->token;
        $PayerID    =   $request->PayerID;

        $response   =   $provider->getExpressCheckoutDetails($token);

        $invoiceId  = $response['INVNUM'] ? $response['INVNUM'] : unique();
        $data   = $this->cartData($invoiceId);

        // Note that 'token', 'PayerID' are values returned by PayPal when it redirects to success page after successful verification of user's PayPal info.
        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);

        // save the data to the database
        // 
        
        return redirect()->route()->with('success', 'Transaction completed successfully! Saved to your records');
    }

    /*
     * The data used for the forms collection
     * and retrieval
     */
    public function cartData(){
        $data = [];
        $data['items'] = [];

        // foreach(Cart::content() as $kkey=>$cart){}
        foreach ($datas as $key => $item) {
            $itemDetails = [
                'name'  =>  $item->name,
                'price' =>  $item->price,
                'qty'   =>  $item->qty
            ];

            $data['items'][]   = $itemDetails;
        }

        // $data['invoice_id'] = unique();
        $data['invoice_id'] = $invoiceId;
        $data['invoice_description'] = "Payment Invoice!";
        $data['return_url'] = route('payment.store');
        $data['cancel_url'] = route('payment.index')->with('danger', 'Transaction Failed! Ask Admin for help.');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        //  give a discount of 10% of the order amount
        //  $data['shipping_discount'] = round((10 / 100) * $total, 2);
        $data['shipping_discount'] = 0;

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
