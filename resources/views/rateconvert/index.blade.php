@extends('layouts.app')

@section('title','Paypal')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

#example {
  display: hidden;
}


@endpush

@section('content')

<div class="content">
    <div class="container-fluid">

         <div class="row">
            <div class="col-md-12">
                <div>


                    <input type="button" class="btn btn-primary" value="RateList" onclick="$('#example').show(2000)" />



                        <div id="example">
                            <table id="table" class="table table-striped table-bordered  table-hover" style="font-size: 12px;">
                                <thead class=" text-primary ">
                                    <th>Currency</th>
                                    <th>Exchange Rate</th>
                                    <th>Effective Rate</th>
                                </thead>
                                <tbody>
                                    @foreach ($converts as $convert)
                                    <tr>
                                        <td style="height: 10px;">{{ $convert->currency }}</td>
                                        <td style="height: 10px;">{{ $convert->exchange_rate }}</td>
                                        <td style="height: 10px;">{{ date('d-M-Y', strtotime($convert->effective_date)) }}</td>
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

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            lengthMenu:[[3,5,10,25,50,-1],[3,5,10,25,50,'All']],
            "scrollY":        "200px",
            "scrollCollapse": true,
            "paging":         false,
            "order": [[ 2, "desc" ]]
        });

    } );
</script>


<script type="text/javascript">
$(document).ready(function() {
   $('#example').hide();
});
  $('#example').show();
</script>






@endpush
