@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            @if (session('status') == 'alert-success')
                <div class="alert {{session('status')}} alert-dismissible fade show" role="alert">
                    El producto se ha actualizado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status') == 'alert-danger')
                <div class="alert {{session('status')}} alert-dismissible fade show" role="alert">
                    Un error ha ocurrido durante la actualizacion del producto, intentelo de nuevo mas tarde.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Editar producto - {{$product->title}}</h4>
            </div>

            <div class="card-body">
                @include('products.form')
            </div>
        </div>
    </div>
@endsection