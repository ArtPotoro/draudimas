@extends('layouts.main')
@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('owners.create') }}">Add Owner</a>
        <a class="btn btn-warning btn-lg btn-block" href="{{ route('cars.index') }}">Cars Info</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
        </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->surname }}</td>
                <td><a class="btn btn-success" href="{{ route('owners.edit', $owner->id) }}">Adjust</a> </td>
                <td>
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
