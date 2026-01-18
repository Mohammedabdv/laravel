@extends('layout.master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row product-lists" style="position: relative; height: 1667.1px;">

                @foreach ($product as $item)
                    <div class="col-lg-4 col-md-6 text-center _{{ $item -> category_id }}"
                        style="position: absolute; left: 0px; top: 0px;">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/category/{{$item -> id}}"><img style="height: 250px; width: 250px;"
                                        src="{{ url($item->imagepath) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price">{{ $item->price }} $</p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
