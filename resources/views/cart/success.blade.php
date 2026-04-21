@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="bg-white p-5 rounded shadow-sm">
        <div class="mb-4">
            <span style="font-size: 80px;">✅</span>
        </div>
        <h1 class="text-success">Paiement validé !</h1>
        <p class="lead">Votre commande a été traitée avec succès et votre panier a été vidé.</p>
        <a href="/" class="btn btn-primary btn-lg mt-3">Retour à la boutique</a>
    </div>
</div>
@endsection