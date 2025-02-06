@extends('layouts.fe')

@section('content')
    <div class="min-h-screen flex flex-col bg-gray-50">
        {{-- Header Section --}}
        <div class="py-16">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-4 text-center">Blog</h1>
                <p class="text-xl text-gray-600 text-center"></p>
            </div>
        </div>

        {{-- Blog Posts Grid --}}
        <div class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <article
                        class="bg-white border-4 border-black shadow-[8px_8px_0_0_rgba(0,0,0,1)] group hover:-translate-y-2 transition-all duration-300">
                        {{-- Card Header --}}
                        <div class="bg-gray-100 border-b-4 border-black p-2 flex justify-between items-center">
                            <div class="flex gap-2">
                                <div class="w-3 h-3 rounded-full border-2 border-black bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full border-2 border-black bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full border-2 border-black bg-green-500"></div>
                            </div>

                        </div>

                        {{-- Thumbnail --}}
                        <div class="border-b-4 border-black h-48 bg-gray-100 overflow-hidden">
                            <div style="
                   background-image: url('https://cdn.prod.website-files.com/5e8b5d6cee4cf17b3ee15385/5e8b5d9deaa78561d2d9d562_1586191773518-image17.jpg');
                 "
                                class="modal-thumbnail"></div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 bg-gray-50 group-hover:bg-white transition-colors">
                            <h2 class="text-xl font-bold mb-4 hover:text-blue-600 transition-colors">
                                What Will Website Be Like In 100 Years?
                            </h2>
                            <p class="text-gray-700 group-hover:text-black transition-colors mb-6 line-clamp-3">
                                Repudiandae error accusantium et asperiores veniam
                                debitis. Ad in quis eligendi numquam rerum et
                                repudiandae labore. Recusandae perspiciatis enim aut
                                ipsum et aliquam nihil voluptatum. Voluptas placeat
                                aliquam molestiae odit iste laboriosam non aut earum.
                                Labore corporis r
                            </p>

                            <div class="flex justify-between items-center">
                                <a href=""
                                    class="bg-gray-100 border-2 border-black px-4 py-2 hover:bg-gray-200 hover:-translate-y-1 transition-all duration-300 inline-block">
                                    Read article
                                </a>

                            </div>
                        </div>
                    </article>



                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            if (img.complete) {
                                img.classList.add('loaded');
                            } else {
                                img.addEventListener('load', () => img.classList.add('loaded'));
                            }
                            observer.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                    imageObserver.observe(img);
                });
            });
        </script>

       
    @endsection
