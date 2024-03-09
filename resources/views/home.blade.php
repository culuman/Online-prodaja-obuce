@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-3">
      <button class="btn btn-info m-2">Depozit : {{(Auth::user()->deposit) ? Auth::user()->deposit : 0}} rsd</button>
      <a href="{{ route('home.addDeposit') }}" class="btn btn-secondary m-2">Dodaj depozit</a>
      <a href="{{ route('home.newShoes') }}" class="btn btn-success m-2">Dodaj oglas</a>
    </div>
      <div class="col-8 border border-info rounded pt-2">
        <h1>Lista svih oglasa</h1>
        <table class="table table-bordered table-hover">
          <thead>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Izmeni</th>
            <th>Obrisi</th>
          </thead>
          <tbody>
            @foreach ($all_shoes as $shoes)
                <tr>
                  <td>{{ $shoes->title }}</td>
                  <td>{{ $shoes->price }}</td>
                  <td><a href="/home/oglas/{{ $shoes->id }}/edit" class="btn btn-warning">Izmeni</a></td>
                  <td>
                    <form action="/home/oglas/{{ $shoes->id }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger">Obrisi</button>
                    </form>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        @if (session()->has('message'))
          <p class="alert alert-warning">{{ session()->get('message') }}</p>
        @endif
      </div>
  </div>
</div>
@endsection