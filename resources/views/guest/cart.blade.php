@extends('layouts.guestApp')

@section('title','Cart')

@section('breadcrumb','Cart')
@push('after-css')
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid card">
            <h3 class="card-header">My Cart Item</h3>
            <div class="card-body">
                <div class="user-list-files d-flex float-right">
                    @php
                        $totalAmount = 0;
                        foreach(session('cart', []) as $product) {
                            $totalAmount += $product['quantity'] * $product['price'];
                        }
                    @endphp
                    @if (count(session('cart', [])) > 0)
                        Total Amount:  <strong> {{ $totalAmount }} </strong>
                    @endif
                </div>
                <div class="row">
                    @forelse(session()->get('cart', []) as $product)
                        <div class="product-container col-sm-6">
                            <h3>{{ $product['name'] }}</h3>
                            <img src="{{ asset('images/products/' . $product['image']) }}" alt="{{ $product['name'] }}">
                            <p>{{ $product['description'] }}</p>
                            <p><strong>Price:</strong> {{ number_format($product['price'], 2) }}</p>
                            <p>Quantity: {{ $product['quantity'] }}</p>
                            <p>Total: {{ number_format($product['price'] * $product['quantity'], 2) }}</p>

                            <form action="{{ route('removeItem') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="product_id" value="{{ $product['product_id'] }}">
                                <button type="submit" class="btn btn-danger mb-3">Remove</button>
                            </form>
                        </div>
                    @empty
                        Your Cart is empty
                    @endforelse
                </div>
                {{ session(['previous_url' => request()->segment(count(request()->segments()))]) }}
                @if (count(session()->get('cart', [])) > 0)
                    <form action="{{ route('user.placeOrder') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success order-btn">
                            <span class="spinner-border spinner-border-sm d-none" aria-hidden="true" id="placeOrder"></span>
                            Order Place
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script>
        $('#placeOrder').on('click', function(e) {
            $(this).show();
            $('.order-btn').prop('disabled', true);
        });
    </script>
@endpush