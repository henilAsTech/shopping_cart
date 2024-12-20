@extends('layouts.user.app')

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
                    @if (count($cartData) > 0)
                        Total Amount:  <strong> {{ $cartData->sum('final_amount') }} </strong>
                    @endif
                </div>
                <div class="row">
                    @forelse($cartData as $cart)
                        <div class="product-container col-sm-6">
                            <h3>{{ $cart->product->name }}</h3>
                            <img src="{{ asset('images/products/' . $cart->product->image_url) }}" alt="{{ $cart->product->name }}">
                            <p>{{ $cart->product->description }}</p>
                            <p><strong>Price:</strong> {{ $cart->product->price }}</p>
                            <p>Quantity: {{ $cart->quantity }}</p>
                            <p>Total: {{ $cart->total_amount }}</p>

                            <form action="{{ route('user.userCartDelete') }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                                <button type="submit" class="btn btn-danger mb-3" onclick="">Remove</button>
                            </form>
                        </div>
                    @empty
                        Your Cart is empty
                    @endforelse
                </div>
                @if (count($cartData) > 0)
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

        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
@endpush