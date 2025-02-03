@extends('layouts.fe')
@section('content')
    <!-- Header Section -->
    <header class="section hero-section masthead">
        <div class="container">
            <div class="grid-hero">
                <div class="hero-content">
                    <h1 class="heading-jumbo" id="masthead-title">Firstudio</h1>
                    <div class="subhead space-bottom-36" id="masthead-subtitle">
                        Solusi digital terbaik untuk mengembangkan bisnis Anda ke level
                        yang lebih tinggi
                    </div>
                    <a href="#" class="button w-button hover:bg-blue-600">Mulai Sekarang</a>
                </div>
                <div class="hero-image-wrapper">
                    <img src="https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e87e737ee7085c39c02c107_mac.svg"
                        alt="" class="mac" id="masthead-logo" />
                </div>
            </div>

            <div class="quick-links-wrapper">
                <a href="/blog" class="ql-link">Blog</a><a href="/projects" class="ql-link">Projects</a><a href="/about"
                    class="ql-link">About</a><a href="/contact" class="ql-link last">Contact</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <h2 class="margin-bottom-0">Tentang Kami</h2>
            <p>
                Kami adalah perusahaan yang berfokus pada solusi digital untuk
                membantu bisnis Anda tumbuh dan berkembang.
            </p>
            <p>
                Dengan pengalaman bertahun-tahun di industri ini, kami menawarkan
                layanan terbaik dalam pengembangan aplikasi, website, dan IoT.
            </p>
            <a href="#" class="button w-button">Mulai Sekarang</a>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="section projects">
        <div class="projects-container">
            <h2>Mereka Percaya dengan Kami</h2>
            <div class="w-dyn-list">
                <div role="list" class="projects-wrapper w-dyn-items">
                    <div role="listitem" class="modal-wrapper project w-dyn-item">
                        <img src="https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e87e737ee7085c39c02c107_mac.svg"
                            alt="" />
                    </div>
                    <!-- tambahkan project lainnya disini -->
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section hero-section" id="services">
        <div class="container">
            <h2 class="text-center">Layanan Kami</h2>
            <div class="services-grid">
                <div class="service-card hover:shadow-lg" id="service_content">
                    <h3>Digital Strategy</h3>
                    <p>
                        Kami percaya bahwa kesuksesan secara kreatif bukan hanya tentang
                        estetika, tetapi perlu mempersiapkan tujuan bisnis yang terukur
                        seperti penjualan, konversi, dan loyalitas.
                    </p>
                </div>

                <!-- Tambahkan card layanan lainnya di sini -->
            </div>


            <div class="quick-links-wrapper">
                <a href="/blog" class="ql-link">Blog</a><a href="/projects" class="ql-link">Projects</a><a href="/about"
                    class="ql-link">About</a><a href="/contact" class="ql-link last">Contact</a>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section projects" id="portfolio">
        <div class="projects-container">
            <h2>Projects</h2>
            <div class="w-dyn-list">
                <div role="list" class="projects-wrapper w-dyn-items" id="portofolio_content">
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
               background-image: url('https://cdn.prod.website-files.com/5e8b5d6cee4cf17b3ee15385/5e8b5dc4752dd8f0bf5f1d51_1586191812047-image5.jpg');
             "
                            class="modal-thumbnail"></div>
                        <div class="portfolio-caption">
                            <h3 class="portfolio-caption-heading">Possimus</h3>
                            <p class="portfolio-caption-subheading text-muted">
                                Officia sit numquam fugiat sint molestiae id. Est modi est
                                at debitis dolorem. Ut voluptate quod rem dolores sint
                                molestiae maiores. Quaerat consequatur quia libero
                                voluptatem dolores vel. Non rerum esse voluptate voluptatem
                                et aliquam sapiente blanditiis. Voluptates aperiam suscipit.
                                Ut et
                            </p>
                            <a href="/project/possimus" class="button w-button">View project</a>
                        </div>
                    </div>
                    <!-- tambahkan project lainnya disini -->
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="section blog-posts">
        <div class="container">
            <h2 class="margin-bottom-0">From the blog</h2>
            <a href="/blog">View all blog posts</a>
            <div class="blog-posts-wrapper">
                <div class="w-embed"></div>
                <div class="w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <div data-w-id="33bd0df0-f893-c11d-6f02-decffed53f6b" role="listitem"
                            class="click-to-top w-dyn-item">
                            <div class="modal-wrapper">
                                <div class="modal-header">
                                    <div class="button-circles-wrap">
                                        <div class="button-circle"></div>
                                        <div class="button-circle"></div>
                                    </div>
                                    <div class="flex-center">
                                        <div>2020-04-07</div>
                                        <div>-blog.pdf</div>
                                    </div>
                                </div>
                                <div style="
                   background-image: url('https://cdn.prod.website-files.com/5e8b5d6cee4cf17b3ee15385/5e8b5d9deaa78561d2d9d562_1586191773518-image17.jpg');
                 "
                                    class="modal-thumbnail"></div>
                                <div class="modal-body">
                                    <h3>What Will Website Be Like In 100 Years?</h3>
                                    <p>
                                        Repudiandae error accusantium et asperiores veniam
                                        debitis. Ad in quis eligendi numquam rerum et
                                        repudiandae labore. Recusandae perspiciatis enim aut
                                        ipsum et aliquam nihil voluptatum. Voluptas placeat
                                        aliquam molestiae odit iste laboriosam non aut earum.
                                        Labore corporis r
                                    </p>
                                    <div class="row-space-between">
                                        <a href="/post/what-will-website-be-like-in-100-years" class="button w-button">Read
                                            article</a>
                                        <a href="/c/design">Design</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tambahkan blog lainnya disini -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="section projects">
        <div class="projects-container">
            <h2>Ikuti Kami di Sosial Media</h2>
            <div class="w-dyn-list">
                <div role="list" class="projects-wrapper w-dyn-items">
                    <div role="listitem" class="modal-wrapper project w-dyn-item">
                        <img src="https://cdn.prod.website-files.com/5e87e737ee7085b9ba02c101/5e87e737ee7085c39c02c107_mac.svg"
                            alt="" />
                    </div>
                    <!-- tambahkan project lainnya disini -->
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact-section" id="contact">
        <div class="container">
            <h2 class="section-title">Kontak Kami</h2>

            <!-- Wrapper untuk layout dua kolom -->
            <div class="row contact-wrapper">
                <!-- Formulir Kontak -->
                <div class="col-md-6 contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Nama Anda" />
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="Alamat Email Anda" />
                        </div>
                        <div class="form-group">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel"
                                placeholder="Nomor Telepon Anda" />
                        </div>
                        <div class="form-group">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Pesan Anda"></textarea>
                        </div>
                        <!-- Submit Button-->
                        <div class="text-center"><button class="btn btn-primary btn-lg" id="submitButton"
                                type="submit">Kirim Pesan</button></div>
                    </form>
                </div>

                <!-- Google Maps -->
                <div class="col-md-6 contact-map">
                    <h3 class="map-title">Lokasi Kami</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509198!2d144.9537353153163!3d-37.81627997975157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0b0b5b%3A0x5045675218ceed30!2sTecharea!5e0!3m2!1sen!2sus!4v1633031234567!5m2!1sen!2sus"
                        width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- Script --}}
@section('script')
    <script>
        $(document).ready(function(e) {
            $.ajax({
                url: "{{ route('public.data') }}", // URL endpoint untuk controller
                method: "GET",
                beforeSend: function() {
                    $('.loader-overlay').css('display', 'flex');
                },
                success: function(response) {
                    //Pastikan response.data sudah ada
                    let masterhead = response.master_head;
                    let service = response.service;
                    let portofolio = response.portofolio;

                    if (masterhead) {
                        $('#masthead-title').empty().text(masterhead.title);
                        $('#masthead-subtitle').empty().text(masterhead.subtitle);
                        $('#masthead-logo').attr('src', `/storage/${masterhead.image}`);
                    }

                    if (service && service.length > 0) {
                        $('#service_content').empty();
                        service.forEach(function(service) {
                            let serviceItem = `
                       <div class="col-md-4"><img src="/storage/${service.image}" alt="" class="rounded" height="45px"><h4 class="my-3">${service.title}</h4><p class="text-muted">${service.description}</p></div>
                       `;
                            $('#service_content').append(serviceItem);
                        });
                    }

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
                },

                complete: function() {
                    $('.loader-overlay').css('display', 'none');
                },
            });
        });
    </script>
@endsection
