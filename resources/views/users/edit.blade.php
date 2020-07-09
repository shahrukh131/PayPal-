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
                        <h4 class="title">Add New User</h4>
                    </div>
                    <div class="card-content">
                        <form action="{{route('users.update',$users->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">User Name</label>
                                         <input class="form-control" type="text" name='name' id="name" value={{$users->name}}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Role</label>

                                        <select class="form-control" id="role" name='role' value={{$users->role}}>
                                            <option>user</option>
                                            <option>admin</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Email</label>
                                        <input type="text" class="form-control" name="email" value={{$users->email}}>
                                    </div>

                                </div>

                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Contact No</label>
                                        <input type="text" class="form-control" name="contact_no" id="contact_no" value={{$users->contact_no}}>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Address</label>
                                        <input type="text" class="form-control" name="address" value={{$users->address}} >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Password</label>
                                        <input type="text" class="form-control" name="password" value={{$users->password}}>
                                    </div>

                                </div>


                            </div>

                           <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <Label>Image:</Label>
                                        <img src="{{asset($users->image)}}" alt="{{$users->name}}" width="440px" height="200px">
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
                                            <input type="file" name="image" value="{{$users->image}}"/><br />
                                        </span>

                                </div>
                            </div>





                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">update</button>
                    </form>


                    </div>
                </div>

            </div>

        <a href="{{route('users.index')}}" class="btn btn-info">Back</a>

        </div>

    </div>

</div>

@endsection

@push('scripts')

@endpush

