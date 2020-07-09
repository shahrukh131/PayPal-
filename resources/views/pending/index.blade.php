@extends('layouts.app')

@section('title','Pending Request')

@push('css')


@endpush

@section('content')

<div class="content">
    <div class="container_fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Pending Request</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm display compact table-sm" >
                        <thead class=" text-primary">
                          <th>
                            Date
                          </th>
                          <th>
                            Customer_info
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            CustomerTXid
                          </th>
                          <th>
                            Customer Amount
                          </th>
                          <th>
                            image
                          </th>
                          <th>
                            Tx id
                          </th>
                          <th>
                              Received Amount
                          </th>
                          <th>
                              Action
                          </th>
                        </thead>
                        <tbody class="text-center" >
                            @foreach ($pendings as $pending)

                                <tr>
                                    @if ($pending->status!=1)
                                        <td>{{$pending->payment_date}}</td>
                                        <td>{{$pending->customer_info}}</td>
                                        <td>{{$pending->customer_email}}</td>
                                        <td>{{$pending->transaction_id}}</td>

                                        <td>{{$pending->currency}} {{$pending->customer_amount}}</td>
                                        <td><img src="{{ $pending->image }}" alt="{{$pending->customer_info}}" width="100px" height="120px"></td>
                                        <td>
                                            @if ($pending->admin_transaction_id !="")
                                                {{ $pending->admin_transaction_id }}


                                            @else

                                                <p>{{  Str::random()}} <span style="color:red">Change this</span></p>

                                            @endif

                                        </td>
                                        <td>{{$pending->currency}} {{$pending->actual_payment}}</td>

                                        <td><a href="{{route('pending.edit',$pending->id)}}" class=""><i class="fas fa-edit fa-2x" style="color:#34eb9b"></i></a></td>
                                        <td><a href="{{route('pending.updatestatus',$pending->id)}}" class=""><i class="fas fa-check-circle fa-2x" style="color:#34eb4c"></i></a></td>

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

@endpush
