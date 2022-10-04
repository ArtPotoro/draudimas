@extends('layouts.main')
@section('content')



    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('owners.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" name="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                @foreach($errors->get('name') as $error)
                {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Surname:</label>
            <input class="form-control @if ($errors->has('surname')) is-invalid @endif" type="text" name="surname" value="{{old('surname')}}">
            @if ($errors->has('surname'))
                @foreach($errors->get('surname') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Email:</label>
            <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="text" name="email" value="{{old('email')}}">
            @if ($errors->has('email'))
                @foreach($errors->get('email') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>


        <button class="btn btn-primary">Add</button>
    </form>
@endsection
