@extends('layouts.guestApp')

@section('title','Product')

@section('breadcrumb','Product')
@push('after-css')
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid card">
            <h3 class="card-header">Product</h3>
            <div class="card-body">
                <div class="row">
                    @forelse ($productData as $product)
                        <div class="product-container col-sm-6">
                            <h3>{{ $product->name }}</h3>
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
                            <p>{{ $product->description }}</p>
                            <p><strong>Price:</strong> {{ number_format($product->price, 2) }}</p>

                            @php
                                $cart = session()->get('cart', []);
                                $currentQty = isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 0;
                            @endphp
                            
                            <p>Current Quantity in Cart: {{ $currentQty > 0 ? $currentQty : '0' }}</p>
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" value="1" min="1" max="100">
                                <button type="submit" class="btn btn-success add-to-cart-btn">
                                    <span class="spinner-border spinner-border-sm text-white add-to-cart-spinner" style="display: none;"></span> 
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    @empty
                        No product available
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script>
        $('form').on('submit', function(e) {
            $(this).find('.add-to-cart-spinner').show();
            $(this).find('.add-to-cart-btn').prop('disabled', true);

            setTimeout(() => {
                $(this).find('.add-to-cart-spinner').hide();
                $(this).find('.add-to-cart-btn').prop('disabled', false);
            }, 2000);
        });
    </script>
@endpush