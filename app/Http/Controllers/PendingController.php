<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Paypal;

class PendingController extends Controller
{
    public function index()
    {
        $number = Str::random(8);
        $pending = Paypal::all();
        return view('pending.index')->with('pendings',$pending)->with('random',$number);
    }

    public function edit($id)
    {
        $number = Str::random(8);
        $pending = Paypal::find($id);
        return view('pending.edit')->with('pendings',$pending)->with('random',$number);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'payment_date'=>'required',
            'customer_info'=>'required',
            'transaction_id'=>'required',
            'customer_email'=>'required',
            'customer_amount'=>'required',
            'actual_payment'=>'required',
            'admin_transaction_id'=>"required"


        ]);
        $paypal = Paypal::find($id);

        $paypal->payment_date = $request->payment_date;
        $paypal->customer_info = $request->customer_info;
        $paypal->customer_email =$request->customer_email;
        $paypal->transaction_id = $request->transaction_id;
        $paypal->admin_transaction_id = $request->admin_transaction_id;
        $paypal->customer_amount = $request->customer_amount;
        $paypal->actual_payment = $request->actual_payment;

        // dd($request->all());

        $paypal->save();
        Session::flash('success', 'Successfully updated');
        return redirect()->route('pending.index');



    }

    public function updatestatus(Request $request,$id)
    {
        $paypal = Paypal::find($id);
        $paypal->status = 1;
        $paypal->save();

        Session::flash('success', 'Confirmed');
        return redirect()->route('pending.index');
    }
}
