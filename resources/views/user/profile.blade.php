@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Profile</h1> 
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
                <label for="description" class="form-label">Name</label>
                <input name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Profile Image</label>
          
                <img height="200px" width="200px" src="{{ asset($user->image) }}" alt="User Image">

                <input type="file" class="form-control" name="image"/>
 
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
