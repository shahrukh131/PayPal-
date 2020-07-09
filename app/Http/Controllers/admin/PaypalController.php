<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Paypal;
use Carbon\Carbon;

class PaypalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paypal = Paypal::orderBy('payment_date')->get();;
        return view('admin.paypal.index')->with('paypals',$paypal);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mytime = Carbon::now()->toDateTimeString();
        return view('admin.paypal.create')->with('mytime',$mytime);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'payment_date'=>'required',
            'customer_info'=>'required',
            'currency'=>'required',
            'actual_payment'=>'required',
            'transaction_id'=>'required|unique:paypals',
            'transaction_id.unique' => 'duplicate',
            'customer_email'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png'


        ]);
        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();

        $image->move('uploads/posts', $image_new_name);
        $paypal = Paypal::create([
            'payment_date' => $request->payment_date,
            'customer_info' => $request->customer_info,
            'currency'=> $request->currency,
            'actual_payment' => $request->actual_payment,
            'transaction_id'=>$request->transaction_id,
            'customer_email'=>$request->customer_email,
            'image' => 'uploads/posts/' . $image_new_name,

        ]);

        // dd($request->all());

        Session::flash('success','successfully created.');

        return redirect()->route('paypal.index');

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
        $paypal = Paypal::find($id);
        return view('admin.paypal.edit')->with('paypals',$paypal);

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
        $this->validate($request,[
            'payment_date'=>'required',
            'customer_info'=>'required',
            'currency'=>'required',
            'actual_payment'=>'required',
            'transaction_id'=>'required',
            'customer_email'=>'required',
        ]);

        $paypal = Paypal::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;

            $image_new_name = time() . $image->getClientOriginalName();

            $image->move('uploads/posts', $image_new_name);

            $paypal->image = 'uploads/posts/' . $image_new_name;
        }

        $paypal->payment_date = $request->payment_date;
        $paypal->customer_info =$request->customer_info;
        $paypal->currency =$request->currency;
        $paypal->actual_payment = $request->actual_payment;
        $paypal->transaction_id = $request->transaction_id;
        $paypal->customer_email =$request->customer_email;

        $paypal->save();

        Session::flash('success', 'Successfully updated');

        return redirect()->route('paypal.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paypal = Paypal::find($id);

        $paypal->delete();

        Session::flash('success','Successfully Deleted');
        return redirect()->route('paypal.index');

    }
}
