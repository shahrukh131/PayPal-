@extends('layouts.app')

@section('title','PendingRequestEdit')

@push('css')

@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Pending Request Edit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('pending.update',$pendings->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Date</label>
                                    <input class="form-control" type="date"  name='payment_date' id="payment_date" value="{{$pendings->payment_date}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Customer Info</label>
                                        <input type="text" class="form-control" name="customer_info" value="{{$pendings->customer_info}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Email</label>
                                    <input class="form-control" type="text"  name='customer_email' id="payment_date" value="{{$pendings->customer_email}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">CustomerTxId</label>
                                        <input type="text" class="form-control" name="transaction_id" value="{{$pendings->transaction_id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Customer Amount</label>
                                        <input type="number" step="0.01" class="form-control" name="customer_amount" value="{{$pendings->customer_amount}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Received Amount</label>
                                        <input type="number" step="0.01" class="form-control" name="actual_payment" value="{{$pendings->actual_payment}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Admin Tx Id</label>
                                        <input type="text"  class="form-control" name="admin_transaction_id" value="{{$pendings->admin_transaction_id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">

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

</div>



@endsection


@push('scripts')

@endpush

