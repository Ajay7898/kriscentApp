@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Schedule Consultation</h1>
        <form action="{{ route('user.consultant.store') }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="title" class="form-label">{{ __('Select Consultant') }}</label>
            <select name="consultation_id" id="user-select" class="form-control" required>
                <option value="">Select a user</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}" data-role="{{$user->role_id}}" data-profession="{{$user->profession}}">
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
            @error('user')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Scheduled At</label>
                <input type="datetime-local" name="appointment_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Schedule</button>
        </form>
    </div>

@endsection
