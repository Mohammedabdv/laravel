@extends('layout.admin')

@section('styles')
    <script src="https://cdn.tailwindcss.com"></script>
@endsection


@section('content')

@section('action')
    Contact Us
@endsection
<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-6xl flex flex-col lg:flex-row gap-10">

        <!-- الفورم -->
        <div class="flex-1 bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">📩 Contact Us</h2>
            <p class="text-center text-gray-500 mb-8">
                We are happy to hear your feedback and inquiries. Please fill out the form below
            </p>

            {{-- رسالة نجاح --}}
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 text-center font-medium shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- رسائل الأخطاء --}}
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700 shadow-sm">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/contact" method="post" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
                <div>
                    <label for="subject" class="block text-gray-700 font-semibold mb-2">Subject</label>
                    <input type="text" name="subject" id="subject"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                    <textarea name="message" id="message" rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required></textarea>
                </div>
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3 px-6 rounded-xl bg-orange-600 text-white font-bold hover:bg-orange-700 transition duration-300 shadow-md">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- معلومات المتجر -->
        <div class="flex-1 flex flex-col gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h4 class="text-xl font-semibold mb-2 flex items-center gap-2"><i
                        class="fas fa-map text-orange-600"></i> Shop Address</h4>
                <p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h4 class="text-xl font-semibold mb-2 flex items-center gap-2"><i
                        class="far fa-clock text-orange-600"></i> Shop Hours</h4>
                <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h4 class="text-xl font-semibold mb-2 flex items-center gap-2"><i
                        class="fas fa-address-book text-orange-600"></i> Contact</h4>
                <p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h4 class="text-xl font-semibold mb-2 flex items-center gap-2">
                    <i class="fas fa-headset text-orange-600"></i> Customer Support
                </h4>
                <p>
                    Available 24/7 for all your queries. <br>
                    Chat with us online or call our hotline: <br>
                    +00 444 555 6666
                </p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h4 class="text-xl font-semibold mb-2 flex items-center gap-2"><i
                        class="fas fa-share-alt text-orange-600"></i> Follow Us</h4>
                <p class="flex gap-4 mt-2">
                    <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-blue-700 hover:text-blue-900"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div>
        </div>

    </div>
</div>


@endsection
