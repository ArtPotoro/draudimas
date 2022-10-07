@extends('layouts.main')
@section('content')
    <form class="form-control" action="{{ route('shortcodes.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Shortcode</label>
            <input class="form-control @if ($errors->has('shortcode')) is-invalid @endif" type="text" name="shortcode" value="{{ old('shortcode') }}">
            @if($errors->has('shortcode'))
                @foreach($errors->get('shortcode') as $error)
                    {{ $error }} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Replace</label>
            <input class="form-control @if ($errors->has('replace')) is-invalid @endif" type="text" name="replace" value="{{ old('replace') }}">
            @if($errors->has('replace'))
                @foreach($errors->get('replace') as $error)
                    {{ $error }} <br>
                @endforeach
            @endif
        </div>
        <button class="btn btn-primary mt-3">Add</button>
        <a href="{{route('shortcodes.index')}}" class="btn btn-primary mt-3 float-end">Back</a>
    </form>
@endsection
