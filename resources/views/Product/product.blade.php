@extends('layout.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <div class="product-section mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>أهلا وسهلا بكم في <span class="orange-text">متجرنا</span></h3>
                        <p>متعة التسوق في متجرنا</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            @foreach ($category as $item)
                                <li data-filter="._{{ $item->id }}">{{ $item->name }}</li>
                            @endforeach
                            <li class="active" data-filter="*">الكل</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($product as $item)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch _{{ $item->category_id }}">
                        <div class="single-product-item text-center" style="margin-bottom: 30px; width: 100%; ">
                            <div class="product-image">
                                <a href="/productDetails/{{ $item->id }}">
                                    <img style="height: 260px; width: 240px; object-fit: cover;"
                                        src="{{ url($item->imagepath) }}" alt="">
                                </a>
                            </div>
                            <h3 class="product-name">{{ $item->name }}</h3>
                            <h5 class="product-description">{{ $item->description }}</h5>
                            <h3 class="product-price">$ {{ $item->price }}</h3>


                            <p>
                            <a href="{{ route('addproducttocart', $item->id) }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i>
                                Add to Cart</a>
                            </p>

                            @if (Auth::user() && Auth::user()->role === 'admin')
                                <a href="/deleteproduct/{{ $item->id }}" class="btn btn-danger"><i
                                        class="fas fa-trash"></i>
                                    حذف المنتج</a>
                                <a href="/editproduct/{{ $item->id }}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i>
                                    تعديل المنتج</a>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>


            {{-- <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
							<li>
                                {{ $product->links() }}
							</li>
					</div>
				</div>
			</div>
        </div> --}}
        </div>
    @endsection

    <style>
        svg {
            width: 20px;
            height: 20px;
        }
    </style>
