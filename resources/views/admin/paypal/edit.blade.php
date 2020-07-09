@extends('layouts.app')

@section('title','Paypal')

@push('css')

@endpush

@section('content')

@include('admin.include.error')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary" >
                        <h4 class="title">Edit Entry</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{route('paypal.update',$paypals->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Payment Date</label>
                                    <input class="form-control" type="date"  name='payment_date' id="payment_date" value="{{$paypals->payment_date}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Customer Info</label>
                                        <input type="text" class="form-control" name="customer_info" value="{{$paypals->customer_info}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="" for="currency">Currency</label>
                                        <select class="form-control" id="currency" name="currency">
                                            <option value="{{ $paypals->transaction_id }}">{{ $paypals->currency }}</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Actual Payment</label>
                                        <input type="number" step="0.01" class="form-control" name="actual_payment" value="{{$paypals->actual_payment}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Transaction Id</label>
                                        <input type="text" class="form-control" name="transaction_id" value="{{$paypals->transaction_id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Customer Email</label>
                                    <input type="text" class="form-control" name="customer_email" value="{{$paypals->customer_email}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>Image:</Label>
                                        <img src="{{asset($paypals->image)}}" alt="{{$paypals->customer_info}}" width="440px" height="200px">
                                     </div>
                                </div>
                                <div class="col-md-4">

                                </div>

                            </div>
                            <div class="row justify-content-center">

                                <div class="col-md-6">
                                    <label for="image">Edit Image</label>

                                        <span class="btn btn-raised btn-round btn-rose btn-file">
                                            <span class="fileinput-new">Add New Photo</span>
                                            <input type="file" name="image" value="{{$paypals->image}}"/><br />
                                        </span>

                                </div>
                            </div>

                    </div>
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </form>


                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection


@push('scripts')

@endpush
