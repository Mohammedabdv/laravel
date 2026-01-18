@extends('layout.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <div class="cart-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <!-- Cart Table -->
                <div class="col-lg-8 col-md-12">
                    <div class="card shadow-sm p-3 mb-4">
                        <h4 class="mb-4">Your Shopping Cart</h4>
                        <div class="cart-table-wrap table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Remove</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('deletecart', $item->id) }}" class="text-danger"
                                                    title="حذف المنتج">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <img src="{{ $item->product->imagepath }}"
                                                    style="width: 80px; height: 75px; object-fit: cover; border-radius: 5px;"
                                                    alt="{{ $item->product->name }}">
                                            </td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->price }} $</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product->price * $item->quantity }} $</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Total Section -->
                <div class="col-lg-4 col-md-12">
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-3">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>{{ $total }} $</span>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="/checkout" class="btn btn-orange btn-lg">Check Out</a>
                            <a href="/history" class="btn btn-outline-orange btn-lg">Orders History</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
