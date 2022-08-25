@extends('layouts.app')

{{-- @section('title', 'boolgram-post') --}}

@section('content')

<h1 class="my-5 text-center"> Singolo videogames</h1>

<div class="card mb-3">
    <img src="{{ $videogames['img'] }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">nome</h5>
        <p class="card-text">{{ $videogames['descrizione'] }}</p>
        <div>
            <form {{-- action="{{ route('videogames.destroy', $videogames->id) }}" --}} method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger" type="submit">Delete</button>

            </form>
        </div>
    </div>
</div>

@endsection