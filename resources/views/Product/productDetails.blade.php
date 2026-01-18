@extends('layout.master')


@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style3.css') }}">
@endsection

@section('content')
    <div class="product-section mt-100 mb-100">
        <div class="container">
            <div class="row align-items-center">
                <!-- سلايدر الصور -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset($product->imagepath) }}" alt="{{ $product->name }}">
                            </div>
                            @foreach ($product->images as $photo)
                                <div class="carousel-item">
                                    <img src="{{ asset($photo->imagepath) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- أزرار التنقل -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                        <!-- مؤشرات دائرية -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0"
                                class="active"></button>
                            @foreach ($product->images as $index => $photo)
                                <button type="button" data-bs-target="#productCarousel"
                                    data-bs-slide-to="{{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- تفاصيل المنتج -->
                <div class="col-md-6">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing">{{ $product->price }} $</p>
                        <p>{{ $product->description }}</p>
                        <div class="d-flex align-items-center">
                            <input type="number" placeholder="1" min="1" class="form-control qty-input">
                            <a href="{{ route('addproducttocart', $product->id) }}" class="cart-btn">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                        <p class="mt-4"><strong>Category: </strong>{{ $product->category->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container  mt-5">
            <div class="col-lg-8 offset-lg-2 text-center mt-1">
                <div class="section-title">
                    <h3>Related <span class="orange-text">Products</span></h3>
                </div>
            </div>
            <div class="row product-lists" style="position: relative; height: 1667.1px;">

                @foreach ($relatedProducts as $item)
                    <div class="col-lg-4 col-md-6 text-center " style="position: absolute; left: 0px; top: 0px;">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/productDetails/{{ $item->id }}"><img style="height: 250px; width: 250px;"
                                        src="{{ url($item->imagepath) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price">$ {{ $item->price }} </p>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    

    <section class="section">
        <div class="container ">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center ">
                    <div class="section-title">
                        <h3>Write <span class="orange-text">a Review</span></h3>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="contact-us-content p-4">
                        <h1 class="pt-3">Share your thoughts about this product</h1>
                        <p class="pt-3 pb-5">
                            We'd love to hear your feedback! Please rate the product and write a short review to help others
                            make informed decisions.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="#">
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" placeholder="Name *" name="name" class="form-control"
                                            required="" fdprocessedid="e599jn">
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" placeholder="Email *" name="email" class="form-control"
                                            required="" fdprocessedid="b6dmgk">
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="text" placeholder="Phone *" name="phone" class="form-control"
                                            required fdprocessedid="b6dmgk">
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="text" placeholder="Subject *" name="subject"
                                            class="form-control" required="" fdprocessedid="b6dmgk">
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" id="" placeholder="Message *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right"
                                    fdprocessedid="30pq4g">SUBMIT</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
