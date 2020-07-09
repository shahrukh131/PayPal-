@extends('layouts.app')

@section('title','Paypal')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@endpush

@section('content')
@include('admin.include.error')

<div class="content">
    <div class="container-fluid">

         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Reports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="table" class="table table-striped table-bordered table-sm display compact" style="width:100%">
                                <thead class="text-primary">
                                    <th style="font-size:auto;">Payment Date</th>
                                    <th>Customer Info</th>
                                    <th>Currency</th>
                                    <th>Image</th>
                                    <th>Actual Payment</th>
                                    <th>Transaction Id</th>
                                    <th>Customer Email</th>
                                    @if (auth()->user()->isAdmin())

                                        <th>Action</th>
                                        <th>Action</th>


                                    @endif










                                </thead>
                                <tbody>
                                    @foreach ($paypals as $key=>$paypal)
                                        <tr>
                                            <td>{{date('d-M-Y', strtotime($paypal->payment_date))}}</td>
                                            <td>{{$paypal->customer_info}}</td>
                                            <td>{{$paypal->currency}}</td>
                                            <td><img src="{{ $paypal->image }}" alt="{{$paypal->customer_info}}" width="60px" height="33.75px"></td>

                                            <td>{{$paypal->actual_payment}}</td>
                                            <td>{{$paypal->transaction_id}}</td>
                                            <td>{{$paypal->customer_email}}</td>
                                            @if ($paypal->status!=1 || auth()->user()->isAdmin())
                                            <td><a href="{{route('paypal.edit',$paypal->id)}}" class="btn btn-sm btn-info">Edit</a></td>
                                            <td><a href="{{route('paypal.destroy',$paypal->id)}}" class="btn btn-sm btn-danger">Delete</a></td>

                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            lengthMenu:[[3,5,10,25,50,-1],[3,5,10,25,50,'All']],
            "order": [[ 1, "desc" ]]
        //     "scrollY":        "200px",
        // "scrollCollapse": true,
        // "paging":         false
        });

    } );
</script>

@endpush
