@extends('layouts.main')
@section('content')
    <form class="form-control" action="{{ route('shortcodes.update',  $shortcode->id ) }}" method="post">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Shortcode:</label>
            <input class="form-control @if($errors->has('shortcode')) is-invalid @endif " type="text" name="shortcode" value="{{$shortcode->shortcode}}">
            @if($errors->has('shortcode'))
                @foreach($errors->get('shortcode') as $error)
                    {{ $error }} <br>
                @endforeach
            @endif
        </div>
        <div>
            <label class="form-label">Repalce</label>
            <input class="form-control @if($errors->has('replace')) is-invalid @endif " type="text" name="replace" value="{{$shortcode->replace}}">
            @if($errors->has('replace'))
                @foreach($errors->get('replace') as $error)
                    {{ $error }} <br>
                @endforeach
            @endif
        </div>
        <button class="btn btn-success mt-3 ">Adjust</button>
        <a href="{{route('shortcodes.index')}}" class="btn btn-primary mt-3 float-end">Back</a>
    </form>

@endsection
