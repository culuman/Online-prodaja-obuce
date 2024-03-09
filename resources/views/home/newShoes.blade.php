@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
          <a href="{{ route('home') }}" class="btn btn-info m-2">Sva obuca</a>
        </div>
        <div class="col-6">
            <h1>Kreirajte oglas</h1>
            <form action="{{ route('home.storeShoes') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Naslov" class="form-control"><br>
                <textarea name="body" placeholder="Unesite opis..." class="form-control" cols="30" rows="10"></textarea><br>
                <input type="number" name="price" placeholder="Cena" class="form-control"><br>
                <input type="file" name="image1" placeholder="Izaberite sliku" class="form-control">
                <input type="file" name="image2" placeholder="Izaberite sliku" class="form-control">
                <input type="file" name="image3" placeholder="Izaberite sliku" class="form-control"><br>
                <select name="category" class="form-control">
                    @foreach ($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-primary form-control">Kreiraj</button>
            </form>
        </div>
    </div>
</div>
@endsection