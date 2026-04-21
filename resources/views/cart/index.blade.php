@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Votre Panier</h2>
    <div class="card shadow-sm border-0 p-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @forelse((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['price'] }} €</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST" class="d-flex" style="max-width: 150px;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control me-2" min="1">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Ok</button>
                            </form>
                        </td>
                        <td>{{ $details['price'] * $details['quantity'] }} €</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-outline-danger">Supprimer</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Le panier est vide.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if(session('cart'))
            <div class="text-end mt-3 border-top pt-3">
                <h3>Total: <span class="text-primary">{{ $total }} €</span></h3>
                <a href="{{ route('cart.payment') }}" class="btn btn-success btn-lg mt-2 px-5 shadow">Passer à la caisse</a>
            </div>
        @endif
    </div>
</div>
@endsection