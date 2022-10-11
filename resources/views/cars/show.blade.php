@extends('layouts.main')
@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('cars.index') }}">Car's Info</a>
        <a class="btn btn-warning btn-lg btn-block pull-right" href="{{ route('owners.index') }}">Owners Info</a>
        <a class="btn btn-primary btn-lg bnt-block" href="{{ route('shortcodes.index') }}">Short Code Info</a>
    </div>
    @method('PUT')
    {{ $car->id }}
    <form action="{{ route( 'car_gallery.store')}}" method="post" enctype="multipart/form-data">
        @csrf

            <input type="hidden" name="car_id" value="{{ $car->id }}">

        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button class="btn btn-primary">Create</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>Photo</th>

        </tr>
        </thead>
        <tbody>
        @foreach($car->carGalleries as $carGallery)
            <tr>
                <td>
                    @if ($carGallery->car_id==$car->id)
                        <img src="{{route('carGallery.carGalleryImage',$carGallery->image)}}" style="width: 200px;">
                    @endif
                </td>

                <td>
                    <a class="btn btn-success" href="{{ route('car_gallery.edit', $carGallery->id) }}">Adjust</a>
                </td>
                <td>
                    <form action="{{ route('car_gallery.destroy', $carGallery->id) }}" method="post" enctype="multipart/form-data">
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

