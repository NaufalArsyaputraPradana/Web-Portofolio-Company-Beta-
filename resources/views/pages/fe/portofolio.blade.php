@extends('layouts.fe')

@section('content')
    <div class="min-h-screen flex flex-col bg-gray-50" id="portfolio">
        {{-- Section 1: Featured Projects --}}
        <div class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8 text-center">Featured Projects</h2>
                <div class="overflow-hidden relative">
                    <div class="flex gap-6 projects-slider" id="portofolio_content">>

                        <div class="project-card">
                            <div class="window-header">
                                <div class="window-buttons">
                                    <div class="window-button"></div>
                                    <div class="window-button"></div>
                                </div>
                                <div style="
               background-image: url('https://cdn.prod.website-files.com/5e8b5d6cee4cf17b3ee15385/5e8b5dc4752dd8f0bf5f1d51_1586191812047-image5.jpg');
             "
                                    class="modal-thumbnail"></div>
                            </div>

                            <div class="project-info">
                                <div class="portfolio-caption">
                                    <h3 class="project-title">

                                        <h3 class="portfolio-caption-heading"></h3>

                                </div>

                                Possimus
                                </h3>
                                <p class="project-description">
                                    Officia sit numquam fugiat sint molestiae id. Est modi est
                                    at debitis dolorem. Ut voluptate quod rem dolores sint
                                    molestiae maiores. Quaerat consequatur quia libero
                                    voluptatem dolores vel. Non rerum esse voluptate voluptatem
                                    et aliquam sapiente blanditiis. Voluptates aperiam suscipit.
                                    Ut et
                                </p>
                                <a href="#" class="project-button">
                                    View project
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- tambahkan project lainnya disini -->
            </div>
        </div>
    </div>


    </div>

    <style>
        /* Base styles */
        .project-card {
            @apply w-[350px] flex-shrink-0 bg-white border-4 border-black shadow-[8px_8px_0_0_rgba(0, 0, 0, 1)] transition-all duration-300;
        }

        .project-card:hover {
            @apply -translate-y-2 shadow-[10px_10px_0_0_rgba(0, 0, 0, 1)];
        }

        /* Window header styles */
        .window-header {
            @apply bg-gray-100 border-b-4 border-black p-2 flex justify-between items-center;
        }

        .window-buttons {
            @apply flex gap-2;
        }

        .window-button {
            @apply w-3 h-3 rounded-full border-2 border-black;
        }

        .window-title {
            @apply text-sm font-mono;
        }

        /* Project content styles */
        .project-image {
            @apply border-b-4 border-black h-48 bg-gray-100 overflow-hidden;
        }

        .project-info {
            @apply p-6 bg-gray-50 transition-colors;
        }

        .project-title {
            @apply text-xl font-bold mb-4 flex items-center gap-2;
        }

        .project-description {
            @apply text-gray-700 mb-6 line-clamp-3;
        }

        .project-button {
            @apply bg-gray-100 border-2 border-black px-4 py-2 inline-block transition-all duration-300 hover:bg-gray-200 hover:-translate-y-1;
        }

        /* Slider animations */
        .projects-slider,
        .projects-slider-reverse {
            animation: 30s linear infinite;
            will-change: transform;
        }

        .projects-slider {
            animation-name: slideLeft;
        }

        .projects-slider-reverse {
            animation-name: slideRight;
        }

        .projects-slider:hover,
        .projects-slider-reverse:hover {
            animation-play-state: paused;
        }

        @keyframes slideLeft {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(calc(-350px * 3 - 1.5rem * 3));
            }
        }

        @keyframes slideRight {
            from {
                transform: translateX(calc(-350px * 3 - 1.5rem * 3));
            }

            to {
                transform: translateX(0);
            }
        }
    </style>
@endsection

{{-- Script --}}
@section('script')
    <script>
        if (portofolio && portofolio.length > 0) {
            $('#portofolio_content').empty();
            portofolio.forEach(function(portofolio) {
                let portofolioItem = `
            <div role="listitem" class="modal-wrapper project w-dyn-item portfolio-item">
                <div class="modal-header">
                    <div class="button-circles-wrap">
                        <div class="button-circle"></div>
                        <div class="button-circle"></div>
                    </div>
                    <div class="flex-center">
                        <div>2020-04-08</div>
                        <div>-project.html</div>
                    </div>
                </div>
                <div style="
                   background-image: url('{{ asset('storage/${portofolio.image}') }}');
                 "
                    class="modal-thumbnail"></div>
                <div class="portfolio-caption">
                    <h3 class="portfolio-caption-heading">${portofolio.client}</h3>
                    <p class="portfolio-caption-subheading text-muted">
                        ${portofolio.category}
                    </p>
                    <a href="/project/${portofolio.slug}" class="button w-button">View project</a>
                </div>
            </div>
        `;
                $('#portofolio_content').append(portofolioItem);
            });
        }
    </script>
@endsection
