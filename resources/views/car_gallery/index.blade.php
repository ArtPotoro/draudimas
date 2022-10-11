@extends('layouts.main')
@section('content')

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('cars.index') }}">Car's Info</a>
        <a class="btn btn-warning btn-lg btn-block pull-right" href="{{ route('owners.index') }}">Owners Info</a>
        <a class="btn btn-primary btn-lg bnt-block" href="{{ route('shortcodes.index') }}">Short Code Info</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Photo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carGalleries as $carGallery)
            <tr>

                <td>
                    @if ($carGallery->img!=null)
                        <img src="{{route('image.carImage',$carGallery->car_id)}}" style="width: 200px;">
                    @endif
                </td>

                <td>
                    <a class="btn btn-success" href="{{ route('car_gallery.edit', $carGallery->car_id) }}">Adjust</a>
                </td>
                <td>
                    <form action="{{ route('car_gallery.destroy', $carGallery->car_id) }}" method="post" enctype="multipart/form-data">
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
