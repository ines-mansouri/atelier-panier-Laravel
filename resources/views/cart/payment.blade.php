@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4">
                <h2 class="mb-4 text-center">Finaliser le paiement</h2>
                
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Nom sur la carte</label>
                        <input type="text" class="form-control" placeholder="Nom Complet" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Numéro de carte</label>
                        <input type="text" class="form-control" placeholder="1234 5678 9101 1121" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date d'expiration</label>
                            <input type="text" class="form-control" placeholder="MM/YY" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Code CVC</label>
                            <input type="text" class="form-control" placeholder="123" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="h5 mb-0">Total à régler :</span>
                        <span class="h4 text-primary mb-0">
                            {{ collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']) }} €
                        </span>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100 shadow">
                        Confirmer le paiement
                    </button>
                    
                    <div class="text-center mt-3">
                        <a href="{{ route('cart.index') }}" class="text-muted text-decoration-none small">
                            ← Retour au panier
                        </a>
                    </div>
                </form>
            </div>
            
            <div class="text-center mt-4 text-muted">
                <small>💳 Paiement sécurisé (Simulation)</small>
            </div>
        </div>
    </div>
</div>
@endsection