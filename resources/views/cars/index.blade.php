@extends('layouts.main')
@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('cars.create') }}">Add Car</a>
        <a class="btn btn-warning btn-lg btn-block pull-right" href="{{ route('owners.index') }}">Owners Info</a>
        <a class="btn btn-success btn-lg bnt-block" href="{{ route('shortcodes.index') }}">Short Code</a>
    </div>
    <img src="{{asset('storage/mad.png')}}" style="width: 200px">
    <table class="table">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Reg_number</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Owner_id</th>
            <th>Owner Name & Surname</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>
                    @if ($car->img!=null)
                        <img src="{{route('carGallery.carImage',$car->id)}}" style="width: 200px;">
                    @endif
                </td>
                <td>{{ $car->reg_number }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->owner_id }}</td>
                <td>{{ $car->owner->name." ".$car->owner->surname }}</td>
                <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">Adjust</a> </td>
                <td>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a class="btn btn-dark" href="{{ route('cars.show', $car->id) }}">Gallery</a>
                </td>
{{--                <td>--}}
{{--                    <a class="btn btn-outline-dark" href="{{ route('car_gallery.create', $car->id) }}" >Upload Image</a>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
