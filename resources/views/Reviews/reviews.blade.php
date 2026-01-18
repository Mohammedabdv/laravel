@extends('layout.master')
@section('title')
    Reviews
@endsection
@section('content')
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="post" action="storereview" id="fruitkha-contact">
                            @csrf

                            <!-- NAME -->
                            <!-- إضافة مكتبة Bootstrap -->
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                                rel="stylesheet">

                            <div class="container vh-100 d-flex justify-content-center align-items-center">
                                <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
                                    <h3 class="text-center mb-4">إضافة مراجعة</h3>

                                    <!-- NAME -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">الاسم</label>
                                        <input type="text" class="form-control form-control-lg" id="name"
                                            name="name" placeholder="Name" value="{{ old('name') }}">
                                        <div class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- PRICE -->
                                    <div class="row">
                                        <!-- PRICE -->
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">الايميل</label>
                                            <input type="email" class="form-control form-control-lg" id="email"
                                                name="email" placeholder="Email" value="{{ old('email') }}">
                                            <div class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- PHONE -->
                                        <div class="col-md-4 mb-3 ">
                                            <label for="phone" class="form-label">رقم الهاتف</label>
                                            <input type="number" class="form-control form-control-lg" id="phone"
                                                name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                            <div class="text-danger">
                                                @error('phone')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SUBJECT -->
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">الموضوع</label>
                                        <input id="subject" name="subject" class="form-control form-control-lg"
                                            placeholder="Subject" value="{{ old('subject') }}">
                                        <div class="text-danger">
                                            @error('subject')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- MESSAGE -->
                                    <div class="mb-3">
                                        <label for="message" class="form-label">الرسالة</label>
                                        <textarea id="message" name="message" class="form-control form-control-lg" rows="4" placeholder="Message">{{ old('message') }}</textarea>
                                        <div class="text-danger">
                                            @error('message')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- SUBMIT -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">إضافة</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="testimonail-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        @foreach ($reviews as $item)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $item->name }}<span>{{ $item->subject }}</span></h3>
                                    <p class="testimonial-body">
                                        "{{ $item->message }}"
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
