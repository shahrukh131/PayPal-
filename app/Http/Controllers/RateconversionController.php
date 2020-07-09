<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\RateConvert;
use DB;

class RateconversionController extends Controller
{
    public function index()
    {
        $convert = DB::table('rate_converts')
        ->orderByRaw('currency')
        ->get();
        // $convert = RateConvert::all();
        $mytime = Carbon::now()->toDateTimeString();

        return view('rateconvert.index')->with('converts',$convert)->with('mytime',$mytime);

    }

    public function create()
    {
        $mytime = Carbon::now()->toDateTimeString();
        return view('rateconvert.create')->with('mytime',$mytime);


    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'currency'=>'required',
            'exchange_rate'=>'required',
            'effective_date'=>'required'

        ]);

        $ratecovert = RateConvert::create([
            'currency' => $request->currency,
            'exchange_rate'=>$request->exchange_rate,
            'effective_date'=>$request->effective_date

        ]);

        // dd($request->all());

        Session::flash('success','successfully created.');

        return redirect()->route('convert.index');

    }








}
