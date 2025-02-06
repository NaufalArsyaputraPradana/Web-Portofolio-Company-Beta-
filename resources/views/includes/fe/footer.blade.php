<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<!-- Footer Start -->
<div class="w-full">
    <footer class="bg-white text-gray-800 py-8 mt-8 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- Company Info Column --}}
                <div>
                    <h4 class="text-xl font-bold mb-4 text-gray-900">Company Name</h4>
                    <p class="text-gray-600 mb-4">
                        Innovative solutions driving success through cutting-edge technology and passionate expertise.
                    </p>
                    <div class="flex space-x-4">
                        {{-- Social Media Icons --}}
                        <a href="#" class="text-gray-700 hover:text-gray-900 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-gray-900 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.61 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-gray-900 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8A3.6 3.6 0 0 0 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6A3.6 3.6 0 0 0 16.4 4H7.6m9.65 1.5a1.25 1.25 0 1 1-1.25 1.25 1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 1 1-5 5 5 5 0 0 1 5-5m0 2a3 3 0 1 0 3 3 3 3 0 0 0-3-3z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-700 hover:text-gray-900 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-2.5 12.5v-3.25a2.75 2.75 0 1 0-2.42-4.34h.01v-1.16h-2.13v7.75h2.13v-3.86a1.88 1.88 0 0 1 1.88-2 1.88 1.88 0 0 1 1.88 2v3.83H16.5M6.88 8.56a1.31 1.31 0 0 0 1.31-1.31 1.31 1.31 0 1 0-2.62 0 1.31 1.31 0 0 0 1.31 1.31m1.06 7.94v-7.75H5.82v7.75h2.12z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links Column --}}
                <div>
                    <h4 class="text-xl font-bold mb-4 text-gray-900">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Home</a>
                        </li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">About
                                Us</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-gray-900 transition duration-300">Services</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-gray-900 transition duration-300">Portfolio</a></li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-gray-900 transition duration-300">Contact</a>
                        </li>
                    </ul>
                </div>

                {{-- Services Column --}}
                <div>
                    <h4 class="text-xl font-bold mb-4 text-gray-900">Our Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Web
                                Development</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Mobile
                                App
                                Design</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Digital
                                Marketing</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Cloud
                                Solutions</a></li>
                        <li><a href="#"
                                class="text-gray-600 hover:text-gray-900 transition duration-300">Consulting</a></li>
                    </ul>
                </div>

                {{-- Contact Info Column --}}
                <div>
                    <h4 class="text-xl font-bold mb-4 text-gray-900">Contact Us</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                            123 Tech Street, Innovation City
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.24 1.02l-2.2 2.2z" />
                            </svg>
                            +62 (123) 456-7890
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                            info@yourcompany.com
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Footer --}}
            <div class="border-t border-gray-200 mt-8 pt-6 text-center">
                <p class="text-gray-500">
                    &copy; {{ date('Y') }} Company Name. All Rights Reserved.
                    | <a href="#" class="text-gray-700 hover:text-gray-900 transition duration-300">Privacy
                        Policy</a>
                    | <a href="#" class="text-gray-700 hover:text-gray-900 transition duration-300">Terms of
                        Service</a>
                </p>
            </div>
        </div>
    </footer>
</div>
<!-- Footer End -->
