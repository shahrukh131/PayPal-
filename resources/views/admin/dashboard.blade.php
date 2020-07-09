@extends('layouts.app')

@section('title','PayPal')

@push('css')

@endpush


@section('content')
       <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Total Paid Amount</p>
                  <h3 class="card-title">
                  <small>$ {{number_format($totalpaidamounts,2)}}</small>
                  </h3>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Total Settled amount</p>
                  <h3 class="card-title">${{number_format($totalsettledamounts,2)}}</h3>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Total Unsettled amount</p>
                  <h3 class="card-title"><small>$ {{number_format($totalunsettledamounts,2)}}</small></h3>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>




          </div>

          <div class="row">

            {{-- @if (auth()->user()->isAdmin()) --}}
                <div class="col-lg-4 col-md-6 col-sm-6">

                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Paid to Customer</p>
                            <h3 class="card-title"><small>$ {{number_format( $paidtocustomers,2) }}</small></h3>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>

            {{-- @endif --}}

          </div>


        </div>
      </div>
@endsection


@push('scripts')

@endpush


