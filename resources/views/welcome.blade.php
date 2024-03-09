@extends('layouts.master')
@section('main')
<div class="row">
  <div class="col-2 rounded">
    <h2>Kategorije:</h2>
    <ul class="list-group list-group-flush">
      @foreach ($categories as $cat)
        <li class="list-group-item">
         <a href="{{ route('welcome') }}?cat={{ $cat->name }}" class="text-light fw-bold text-decoration-none text-dark">{{$cat->name}}</a>
        </li>
      @endforeach
          <li class="list-group-item">
            <form action="{{ route('welcome') }}" method="get">
              <select name="type" class="form-control">
                <option value="lower" {{ (isset(request()->type) && request()->type == 'lower')? 'selected' : '' }}>Rastuce</option>
                <option value="upper" {{ (isset(request()->type) && request()->type == 'upper')? 'selected' : '' }}>Opadajuce</option>
              </select>
              <button type="submit" class="btn btn-info form-control mt-1">Sortiraj</button>
            </form>
          </li>
      </ul>
  </div>
  <div class="container col-10">
  <div class="row offset-1">
      @foreach ($all_shoes as $shoes)
      <div class="card m-3" style="width: 18rem;">
        <img class="card-img-top" src="/shoes_images/{{ $shoes->image1 }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ $shoes->title }}</h5>
          <p class="card-text">{{ $shoes->price }} rsd</p>
          <a href="{{ route('welcome.oglas', ['id'=>$shoes->id]) }}" class="btn btn-primary">Detaljnije</a>
          <a href="{{ route('add_to_cart', $shoes->id) }}" class="btn btn-success">Dodaj u korpu</a>
        </div>
      </div>
      @endforeach
      @if (session()->has('message'))
        <p class="alert alert-warning form-control">{{session()->get('message')}}</p>
      @endif
  </div>
  </div>
</div>
@endsection
