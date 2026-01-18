@extends('layout.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اقسام</span> الموقع</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-4 col-md-5 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/category/{{ $item->id }}"><img style="height: 250px; width: 250px;"
                                        src="{{ url($item->imagepath) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p><span>{{ $item->description }}</span></p>

                            @if (Auth::user() && Auth::user()->role === 'admin')
                                <a href="/deletecategory/{{ $item->id }}" class="btn btn-danger"
                                    onclick="return confirm('هل أنت متأكد من الحذف؟')"><i class="fas fa-trash"></i>
                                    حذف القسم</a>
                                <a href="/editcategory/{{ $item->id }}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i>
                                    تعديل القسم</a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
