@extends('layouts.app')
@section('title','Paypal')
@push('css')

@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary" >
                        <h4 class="title">Rate Conversion</h4>
                    </div>

                    <div class="card-content">
                        <form action="{{ route('convert.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">

                            <div class="col-md-2 mt-2">
                                <div class="from-group">
                                    <label class="currrency">Selected Currency</label>
                                    <input class="form-control" type="text" name='currency' id="currency">

                                </div>

                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="from-group">
                                    <label class="exchange_rate">BDT exchange rate</label>
                                    <input class="form-control" type="text" name='exchange_rate' id="exchange_rate">

                                </div>

                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="from-group">
                                    <label class="effective_rate">Effective Date</label>
                                    <input class="form-control" type="date" value= {{ $mytime }} name='effective_date' id="effective_date">

                                </div>

                            </div>


                        </div>
                         <div class="row justify-content-center">
                            <button type="submit" class ='btn btn-primary'>Submit</button>


                        </div>


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
