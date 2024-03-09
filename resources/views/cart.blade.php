@extends('layouts.master')
   
@section('content')
<div class="col-3">
  <button class="btn btn-info m-2">Depozit : {{(Auth::user()->deposit) ? Auth::user()->deposit : 0}} rsd</button>
  <a href="{{ route('home.addDeposit') }}" class="btn btn-secondary m-2">Dodaj depozit</a>
</div>
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Proizvod</th>
            <th style="width:10%">Cena</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="/shoes_images/{{ $details['image1'] }}"" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['title'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }} rsd</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-success purchase"><i class="fa fa-money"></i> Porucite</button>
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Obrisi</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Nastavite kupovinu</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
   
@section('scripts')
<script type="text/javascript">
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
    });

    $(".purchase").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
            $.ajax({
                url: '{{ route('subtractDeposit') }}',
                method: "GET",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
            alert('Kupovina uspesno izvrsena!');
    });
   
</script>
@endsection