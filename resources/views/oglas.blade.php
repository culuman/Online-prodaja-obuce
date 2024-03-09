@extends('layouts.master')
@section('main')
<div class="container">
  <div class="row">
    <h1 class="display-4 fw-bold">{{ $oglas->title }}</h1>
    @if (isset($oglas->image1))
        <div class="col-3">
          <div class="card">
            <div class="card-body">
              <img src="/shoes_images/{{ $oglas->image1 }}" class="img-fluid">
            </div>
          </div>
        </div>
    @endif
    @if (isset($oglas->image2))
        <div class="col-3">
          <div class="card">
            <div class="card-body">
              <img src="/shoes_images/{{ $oglas->image2 }}" class="img-fluid">
            </div>
          </div>
        </div>
    @endif
    @if (isset($oglas->image3))
        <div class="col-3">
          <div class="card">
            <div class="card-body">
              <img src="/shoes_images/{{ $oglas->image3 }}" class="img-fluid">
            </div>
          </div>
        </div>
    @endif
    <div class="col-12 mt-4">
      <p class="fs-5 w-50">{{ $oglas->body }}</p>
      <span class="btn btn-info btn-lg">{{ $oglas->price }} rsd</span>
    </div>
  </div>
</div>
@endsection