@extends('layouts.app')

@section('content')
    <div class="row justify-content-sm-center">

        <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
            <div class="card">
                <div class="card-header text-center bg-primary">

                </div>

                <div class="card-body">
                    <div class="card-title">
                        <h2 class="">{{ $product->title }}</h2>
                        <p class="card-subtitle text-muted">$ {{ $product->price/100 }}</p>
                    </div>

                    <p class="card-text">{{ $product->description }}</p>

                    <div class="card-actions">
                        <add-product-btn :product='{!! json_encode($product) !!}'></add-product-btn>
                        @include('products.delete')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection