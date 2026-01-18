@extends('layout.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/addproduct.css') }}">
@endsection
@section('title', 'Add Product')

@section('action')
    إضافة منتج جديد
@endsection

@section('content')

{{-- Bootstrap CSS (يفضل وضعه في layout.admin مرة واحدة فقط) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">

                <div class="card form-card">

                    <div class="card-header text-center">
                        <h4>إضافة منتج جديد</h4>
                        <p class="text-muted mb-0">املأ البيانات التالية لإضافة المنتج إلى المتجر</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="storeproduct" enctype="multipart/form-data">
                            @csrf

                            {{-- Product Name --}}
                            <div class="mb-3">
                                <label class="form-label">اسم المنتج</label>
                                <input type="text" name="name" class="form-control" placeholder="مثال: هاتف ذكي"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Price & Quantity --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">السعر</label>
                                    <input type="number" name="price" class="form-control" placeholder="مثال: 1500"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="text-danger error-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">الكمية</label>
                                    <input type="number" name="quantity" class="form-control" placeholder="مثال: 20"
                                        value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <div class="text-danger error-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="mb-3">
                                <label class="form-label">القسم</label>
                                <select name="category_id" class="form-select">
                                    <option value="" disabled selected>اختر القسم</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label class="form-label">وصف المنتج</label>
                                <textarea name="description" rows="4" class="form-control"
                                    placeholder="اكتب وصفًا مختصرًا للمنتج">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div class="mb-4">
                                <label class="form-label">صورة المنتج</label>
                                <label class="image-upload w-100">
                                    <input type="file" name="photo" id="photoInput" accept="image/*">
                                    <strong>اضغط لرفع صورة</strong>
                                    <br>
                                    <span>PNG, JPG حتى 5MB</span>
                                    <div class="mt-3">
                                        <img id="imagePreview" src="" class="img-fluid rounded d-none" style="max-height:200px;">
                                    </div>
                                </label>
                                @error('photo')
                                    <div class="text-danger error-text mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    حفظ المنتج
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@section('scripts')
        <script src="{{ asset('assets/js/addproduct.js') }}"></script>
    @endsection

@endsection