@extends('layouts.main')
@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('cars.create') }}">Add Car</a>
        <a class="btn btn-warning btn-lg btn-block pull-right" href="{{ route('owners.index') }}">Owners Info</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Reg_number</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Owner_id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->reg_number }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->owner_id }}</td>
                <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">Adjust</a> </td>
                <td>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">
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
