@extends('layouts.app')

@section('title','Paypal')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')

<div class="content">
    <div class="container-fluid">

         <div class="row">
            <div class="col-md-12">
            {{-- <a href="{{route('users.create')}}" class="btn btn-warning">Add New User</a> --}}
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Users</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                             <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
                            <table  id="table" class="table table-striped table-bordered" style="width:100%">
                                <thead class=" text-primary ">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                    @foreach ($users as $key=>$user)
                                        <tr>


                                            @if (!$user->isAdmin())
                                             <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td> </a>
                                                <a href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit fa-2x" style="color:orange"></i></a>
                                                <a href="{{ route('users.destroy',$user->id) }}"><i class="fas fa-trash fa-2x" style="color: red"></i></a>


                                            </td>


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
        $('#table').DataTable();
    } );
</script>

@endpush
