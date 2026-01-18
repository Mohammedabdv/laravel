@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/editproduct.css') }}">
@endsection

@section('title', 'Edit Product')

@section('action')
    تعديل منتج
@endsection

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



    <div class="page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">

                    <div class="card form-card">
                        <div class="card-header">
                            <h4>تعديل المنتج</h4>
                            <p class="text-muted mb-0">قم بتحديث بيانات المنتج</p>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="/storeproduct" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">

                                <div class="mb-3">
                                    <label class="form-label">اسم المنتج</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">السعر</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ $product->price }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">الكمية</label>
                                        <input type="number" name="quantity" class="form-control"
                                            value="{{ $product->quantity }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">القسم</label>
                                    <select name="category_id" class="form-select">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">الوصف</label>
                                    <textarea name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">صورة المنتج</label>
                                    <label class="image-upload w-100">
                                        <input type="file" name="photo" id="photoInput" accept="image/*">
                                        <strong>اضغط لتغيير الصورة</strong>
                                        <div class="mt-3">
                                            <img id="imagePreview" src="{{ asset($product->imagepath) }}"
                                                class="img-fluid rounded" style="max-height:200px;">
                                        </div>
                                    </label>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('assets/js/editproduct.js') }}"></script>
    @endsection

@endsection
