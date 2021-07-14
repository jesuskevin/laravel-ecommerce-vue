@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            @if (session('status') == 'alert-success')
                <div class="alert {{session('status')}} alert-dismissible fade show" role="alert">
                    El producto se ha eliminado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status') == 'alert-danger')
                <div class="alert {{session('status')}} alert-dismissible fade show" role="alert">
                    Un error ha ocurrido durante la eliminacion del producto, intentelo de nuevo mas tarde.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif

        <products-component></products-component>

        <div class="mt-2 text-center actions">
            {{$products->links()}}
        </div>
    </div>
@endsection