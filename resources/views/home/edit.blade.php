@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
          <a href="{{ route('home') }}" class="btn btn-success m-2">Sva obuca</a>
          <a href="{{ route('home.newShoes') }}" class="btn btn-secondary m-2">Dodaj oglas</a>
        </div>
        <div class="col-8">
            <h1>Izmenite oglas</h1>
            <form action="/home/oglas/{{ $shoes->id }}/edit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $shoes->title }}" class="form-control"><br>
                <textarea name="body" class="form-control" cols="30" rows="10">{{ $shoes->body }}</textarea><br>
                <input type="number" name="price" value="{{ $shoes->price }}" class="form-control"><br>
                <button type="submit" class="btn btn-warning form-control">Izmenite</button>
            </form>
        </div>
    </div>
</div>
@endsection