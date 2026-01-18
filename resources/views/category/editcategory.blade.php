@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/editcategory.css') }}">
@endsection

@section('title', 'Edit Category')

@section('action', 'تعديل القسم')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card form-card">
                    <div class="card-header">
                        <h4>تعديل القسم</h4>
                        <p class="text-muted mb-0">قم بتحديث بيانات القسم</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="/storecategory" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">

                            {{-- Category Name --}}
                            <div class="mb-3">
                                <label class="form-label">اسم القسم</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $category->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label class="form-label">وصف القسم</label>
                                <textarea name="description" rows="4" class="form-control">{{ $category->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div class="mb-4">
                                <label class="form-label">صورة القسم</label>
                                <label class="image-upload w-100">
                                    <input type="file" name="photo" id="photoInput" accept="image/*">
                                    <i class="fa-solid fa-image fa-2x mb-2"></i>
                                    <div><strong>اضغط لتغيير الصورة</strong></div>

                                    <div class="mt-3">
                                        <img id="imagePreview" src="{{ asset($category->imagepath) }}"
                                            class="img-fluid rounded" style="max-height:200px;">
                                    </div>
                                </label>
                                @error('photo')
                                    <div class="text-danger text-center mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    حفظ التعديلات
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
    <script src="{{ asset('assets/js/editcategory.js') }}"></script>
@endsection

@endsection
