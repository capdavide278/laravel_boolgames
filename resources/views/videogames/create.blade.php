@extends('layouts.app')
@section('content')
<h1>Insert new Game</h1>

<form action="{{ route('videogames.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome')}}">
            {{-- validation --}}
            @error('nome')
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
    </div>
    <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <input type="text" class="form-control" id="descrizione" name="descrizione" value="{{ old('descrizione')}}">
        {{-- validation --}}
        @error('descrizione')
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $message }}
                </div>
        @enderror
    </div>
    <label for="img" class="form-label">img URL</label>
    <input type="text" class="form-control @error('img') is-invalid @enderror" id="img" name="img">

    {{-- error text --}}
{{--     @error('img')
        <div class="alert alert-danger my-2">{{$message}}</div>
    @enderror --}}

    <button type="submit" class="btn btn-primary">Salva</button>
</form>

@endsection