@extends('layout.master')

@section('content')


    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اقسام</span> الموقع</h3>
                        <p>متعة التسوق في متجرنا</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/product/{{$item -> id}}"><img style="height: 250px; width: 250px;" src="{{url($item -> imagepath)}}"
                                    alt=""></a>
                        </div>
                        <h3>{{$item -> name}}</h3>
                        <p class="product-price"><span>{{$item -> description}}</span></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
