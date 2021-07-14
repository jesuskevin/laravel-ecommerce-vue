@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h2 class="card-header">Mi carrito de compras</h2>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <products-shopping-component></products-shopping-component>
                </div>
                <div class="col-12 col-md-6 payments">
                    <p>Paga tu total facilmente con cualquiera de estos metodos, a traves de PayPal</p>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg" width="300" alt="PayPal Acceptance Mark">
                    {{-- <img src="" alt=""> --}}
                    <div class="">
                        <a href="/pagar" class="btn btn-block btn-success">Proceder al pago</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection