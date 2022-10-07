@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('owners.create') }}">Add Owner</a>
            <a class="btn btn-warning btn-lg btn-block" href="{{ route('cars.index') }}">Cars Info</a>
            <a class="btn btn-primary btn-lg bnt-block" href="{{ route('shortcodes.create') }}">Add Short Code</a>
        </div>
        <table class="table table-striped">
            <thead>

            <tr>
                <th>Shortcode</th>
                <th>Replace</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shortcodes as $shortcode)
                <tr>
                    <td>{{ $shortcode->shortcode }}</td>
                    <td>{{ $shortcode->replace  }}</td>

                    <td><a class="btn btn-success" href="{{ route('shortcodes.edit', $shortcode->id) }}">Adjust</a> </td>
                    <td>
                        <form action="{{ route('shortcodes.destroy', $shortcode->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
