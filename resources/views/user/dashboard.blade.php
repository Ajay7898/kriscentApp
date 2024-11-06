@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a style="float:right;" href="{{ route('user.consultant.create') }}" class="btn btn-primary mt3">Schedule New Consultation</a>

                    @if (!empty($consultations) && count($consultations) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Consultant</th>
                                    <th>Profession</th>
                                    <th>Message</th>
                                    <th>Scheduled At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($consultations as $data)
                                    <tr>
                                        <td>{{ $data->user_consult->name }}</td>
                                        <td>{{ $data->profession->profession_name }}</td>
                                        <td>{{ $data->notes }}</td>
                                        <td>{{ $data->appointment_date }}</td>
                                        <td style="display:flex;">
                                            <a href="{{ route('user.consultant.edit', $data) }}" class="btn"><span><i class ="fa fa-edit"></i></span></a>
                                            <a href="{{ route('user.consultant.destroy', $data) }}" class="btn"><span><i class="fa fa-trash"></i></span></a>
                                        </td>
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