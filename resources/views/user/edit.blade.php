@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Consultation</h1> 
        <form action="{{ route('user.consultant.update', $consultation) }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="title" class="form-label">{{ __('Select User') }}</label>

            <select name="consultation_id" class="form-control" required>
                <option value="" disabled>Select a user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}"  
                            {{ (isset($consultation) && $consultation->user_consult->id == $user->id) ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="notes" class="form-control">{{ $consultation->notes }}</textarea>
            </div>
            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Scheduled At</label>
                <input type="datetime-local" name="appointment_date" class="form-control" value="{{ \Carbon\Carbon::parse($consultation->consultation_date)->format('Y-m-d\TH:i') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
