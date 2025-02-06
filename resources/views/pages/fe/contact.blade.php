@extends('layouts.fe')

@section('content')
    <div class="min-h-screen flex flex-col bg-gray-50">
        {{-- Header Section --}}
        <div class="py-16">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-4 text-center">Get In Touch</h1>
                <p class="text-xl text-gray-600 text-center">We'd love to hear from you</p>
            </div>
        </div>

        {{-- Contact Form Section --}}
        <div class="py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto">
                    {{-- Window-like Container --}}
                    <div
                        class="bg-white border-4 border-black shadow-[8px_8px_0_0_rgba(0,0,0,1)] group hover:-translate-y-2 transition-all duration-300">
                        {{-- Window Header --}}
                        <div class="bg-gray-100 border-b-4 border-black p-2 flex justify-between items-center">
                            <div class="flex gap-2">
                                <div class="w-3 h-3 rounded-full border-2 border-black bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full border-2 border-black bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full border-2 border-black bg-green-500"></div>
                            </div>
                            <div class="text-sm font-mono">contact-form.html</div>
                            <div class="w-3 h-3"></div>
                        </div>

                        {{-- Form Content --}}
                        <div class="p-8 bg-gray-50">
                            @if (session('success'))
                                <div
                                    class="mb-6 p-4 bg-green-100 border-2 border-green-600 text-green-700 rounded animate-fade-in">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div
                                    class="mb-6 p-4 bg-red-100 border-2 border-red-600 text-red-700 rounded animate-fade-in">
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="" method="POST" class="space-y-6" id="contactForm">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="block text-sm font-bold mb-2 text-gray-700">NAME</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="w-full p-3 bg-white border-2 border-black rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200 @error('name') border-red-500 @enderror"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="block text-sm font-bold mb-2 text-gray-700">EMAIL</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="w-full p-3 bg-white border-2 border-black rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200 @error('email') border-red-500 @enderror"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="block text-sm font-bold mb-2 text-gray-700">SUBJECT</label>
                                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                        class="w-full p-3 bg-white border-2 border-black rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200 @error('subject') border-red-500 @enderror"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="message" class="block text-sm font-bold mb-2 text-gray-700">MESSAGE</label>
                                    <textarea name="message" id="message" rows="5"
                                        class="w-full p-3 bg-white border-2 border-black rounded focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none transition-all duration-200 @error('message') border-red-500 @enderror"
                                        required>{{ old('message') }}</textarea>
                                </div>

                                <div class="text-center pt-4">
                                    <button type="submit"
                                        class="bg-gray-100 border-2 border-black px-8 py-3 font-bold rounded hover:bg-gray-200 hover:shadow-[4px_4px_0_0_rgba(0,0,0,1)] transition-all duration-200">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            position: relative;
            transition: all 0.3s ease;
        }

        .form-group:focus-within {
            transform: translateY(-2px);
        }

        input:focus,
        textarea:focus {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        button {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        button:hover {
            transform: translate(-2px, -2px);
        }

        button:active {
            transform: translate(0, 0);
        }
    </style>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            button.disabled = true;
            button.innerHTML = '<span class="animate-spin inline-block mr-2">↻</span> Sending...';
        });
    </script>
@endsection
