@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
          <button class="btn btn-info form-control m-2">Depozit : {{(Auth::user()->deposit) ? Auth::user()->deposit : 0}} rsd</button>
          <a href="{{ route('home.newShoes') }}" class="btn btn-success m-2">Dodaj oglas</a>
          <a href="{{ route('home') }}" class="btn btn-success m-2">Sva obuca</a>
        </div>
        <div class="col-8">
            <h1>Dodaj depozit</h1>
            <form action="{{ route('home.storeDeposit') }}" method="post">
                @csrf
                <input type="number" name="deposit" placeholder="Unesite zeljenu kolicinu" class="form-control"><br>
                @if ($errors->has('deposit'))
                    <p class="alert alert-danger ">{{$errors->first('deposit')}}</p>
                @endif
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </form><br>
            @if (session()->has('message'))
                <p class="alert alert-warning form-control">{{session()->get('message')}}</p>
            @endif
        </div>
    </div>
</div>
@endsection