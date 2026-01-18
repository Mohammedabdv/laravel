@extends('layout.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/productphoto.css') }}">
@endsection
@section('action', 'إضافة صور المنتج')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



<div class="page-wrapper">
    <div class="container">

        {{-- Upload Form --}}
        <div class="row justify-content-center mb-5">
            
            <div class="col-lg-6">
                <div class="card form-card">
                    <div class="card-body">
                        <h4 class="text-center mb-3">إضافة صورة للمنتج</h4>
                        <p class="text-center text-muted">يمكنك إضافة أكثر من صورة لعرض المنتج بشكل أفضل</p>

                        <form method="POST" action="/storeproductphoto" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="mb-4">
                                <label class="image-upload w-100">
                                    <input type="file" name="photo" id="photoInput" accept="image/*">
                                    <i class="fa-solid fa-cloud-arrow-up fa-2x mb-2"></i>
                                    <div><strong>اضغط لرفع الصورة</strong></div>
                                    <span class="text-muted">PNG, JPG حتى 5MB</span>

                                    <div class="mt-3">
                                        <img id="imagePreview" class="img-fluid rounded d-none" style="max-height:200px;">
                                    </div>
                                </label>
                                @error('photo')
                                    <div class="text-danger text-center mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    إضافة الصورة
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Images Gallery --}}
        <div class="row">
            @forelse ($productImages as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="gallery-card">
                        <img src="{{ asset($item->imagepath) }}" class="img-fluid w-100" style="height:250px; object-fit:cover;">
                        <div class="p-3 text-center">
                            <a href="/deleteproductphoto/{{ $item->id }}" class="btn btn-outline-danger btn-sm w-100">
                                <i class="fas fa-trash"></i> حذف الصورة
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    لا توجد صور لهذا المنتج بعد
                </div>
            @endforelse
        </div>

    </div>
</div>

@section('scripts')
        <script src="{{ asset('assets/js/productphoto.js') }}"></script>
    @endsection

@endsection
