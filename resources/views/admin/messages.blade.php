@extends('admin.dashboard')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Customer Messages</h2>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
        </thead>

        <tbody>

            @foreach($messages as $message)

            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->message }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection