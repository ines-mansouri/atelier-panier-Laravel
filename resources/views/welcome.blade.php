@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">Nos Produits</h2>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="text-muted small">{{ $product->description }}</p>
                <h4 class="text-primary">{{ $product->price }} €</h4>
            </div>
            <div class="card-footer bg-transparent border-0 mb-2">
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark w-100">Ajouter au panier</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection