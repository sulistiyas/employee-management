@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Attendance Detail</h1>
        <table class="table">
            <tr>
                <th>User ID</th>
                <td>{{ $attendance->user_id }}</td>
            </tr>
            <tr>
                <th>Check In</th>
                <td>{{ $attendance->check_in }}</td>
            </tr>
            <tr>
                <th>Check Out</th>
                <td>{{ $attendance->check_out }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $attendance->status }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $attendance->date }}</td>
            </tr>
        </table>
        {{-- <a href="{{ route('attendance.index') }}" class="btn btn-primary">Back to Report List</a> --}}
    </div>
@endsection
