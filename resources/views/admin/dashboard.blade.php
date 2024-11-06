@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (!empty($consultations) && count($consultations) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Consultant</th>
                                    <th>Profession</th>
                                    <th>Message</th>
                                    <th>Scheduled At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultations as $data)
                                    <tr>
                                        <td>{{ $data->user_consult->name }}</td>
                                        <td>{{ $data->profession->profession_name }}</td>
                                        <td>{{ $data->notes }}</td>
                                        <td>{{ $data->appointment_date }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
