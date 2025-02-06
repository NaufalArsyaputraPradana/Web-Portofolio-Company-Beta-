<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<div class="min-h-screen py-16 bg-gray-50" id="services">
    <div class="container mx-auto px-4">
        {{-- Header Section --}}
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Layanan Kami</h2>
        </div>

        {{-- Main Window Container --}}
        <div
            class="bg-white border-4 border-black shadow-[8px_8px_0_0_rgba(0,0,0,1)] group hover:-translate-y-1 transition-all duration-300">
            {{-- Window Header --}}
            <div class="bg-gray-100 border-b-4 border-black p-2 flex justify-between items-center">
                <div class="flex gap-2">
                    <div class="w-3 h-3 rounded-full border-2 border-black bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full border-2 border-black bg-yellow-500"></div>
                    <div class="w-3 h-3 rounded-full border-2 border-black bg-green-500"></div>
                </div>
                <div class="text-sm font-mono">capabilities.html</div>
                <div class="w-3 h-3"></div>
            </div>

            {{-- Content Area --}}
            <div class="p-8">
                {{-- Services Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"">

                    <div
                        class="bg-gray-50 border-2 border-black shadow-[4px_4px_0_0_rgba(0,0,0,1)] group/card hover:-translate-y-1 hover:shadow-[6px_6px_0_0_rgba(0,0,0,1)] transition-all duration-300">
                        {{-- Service Header --}}
                        <div class="border-b-2 border-black p-2 bg-gray-100 flex justify-between items-center">
                            <div class="flex gap-2">
                                <div class="w-2 h-2 rounded-full border-2 border-black"></div>
                                <div class="w-2 h-2 rounded-full border-2 border-black"></div>
                            </div>

                        </div>

                        {{-- Service Content --}}
                        <div class="p-6"id="service_content">
                            {{-- Service Image --}}

                            <div class="mb-4 border-2 border-black overflow-hidden">

                            </div>


                            {{-- Service Title --}}
                            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                                Digital Strategy
                            </h3>

                            {{-- Service Description --}}
                            <p class="text-gray-700 group-hover/card:text-black transition-colors line-clamp-3">
                                Kami percaya bahwa kesuksesan secara kreatif bukan hanya tentang
                                estetika, tetapi perlu mempersiapkan tujuan bisnis yang terukur
                                seperti penjualan, konversi, dan loyalitas.
                            </p>
                        </div>
                    </div>

                    <!-- Tambahkan card layanan lainnya di sini -->

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script --}}
@section('script')
    <script>
        if (service && service.length > 0) {
            $('#service_content').empty();
            service.forEach(function(service) {
                let serviceItem = `
                       <div class="col-md-4"><img src="/storage/${service.image}" alt="" class="rounded" height="45px"><h4 class="my-3">${service.title}</h4><p class="text-muted">${service.description}</p></div>
                       `;
                $('#service_content').append(serviceItem);
            });
        }
    </script>
@endsection
