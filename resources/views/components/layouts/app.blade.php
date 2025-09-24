<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Primary Meta Tags -->
    <title>{{ config('app.name') }} - Fast & Free File Compression Online</title>

    <meta name="title"
        content="{{ config('app.name', 'Laravel') }} - Compress Images & Files Online | Fast & Free File Compression">
    <meta name="description"
        content="Compress images, PDFs & files online for free. Reduce size by 80% without quality loss. No signup required - start compressing now!">
    <meta name="keywords"
        content="compress files online, image compressor, PDF compressor, reduce file size, optimize images, free compression tool">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="publisher" content="{{ config('app.name') }}">
    <meta name="robots" content="index, follow">
    <meta name="last-modified" content="{{ now()->toISOString() }}">
    <link rel="alternate" hreflang="en" href="{{ url('/') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:image:alt" content="File compression tool interface showing before and after file sizes">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }} - Compress Images & Files Online">
    <meta property="og:description"
        content="Compress images and files online for free. Reduce file sizes by up to 80% without losing quality.">
    <meta property="og:image" content="{{ asset('vendor/theme/assets/img/og-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">

    <!-- Twitter -->
    <meta name="twitter:site" content="@yourhandle">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ config('app.name', 'Laravel') }} - Compress Images & Files Online">
    <meta property="twitter:description"
        content="Compress images and files online for free. Reduce file sizes by up to 80% without losing quality.">
    <meta property="twitter:image" content="{{ asset('vendor/theme/assets/img/twitter-card.jpg') }}">
    <meta name="twitter:creator" content="{{ strtolower(config('app.name', 'Laravel')) }}">

    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#0ea5e9">
    <meta name="msapplication-TileColor" content="#0ea5e9">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon" sizes="any">
    <link href="{{ asset('favicon.svg') }}" rel="icon" type="image/svg+xml">
    <link href="{{ asset('vendor/theme/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180">
    <link href="{{ asset('vendor/theme/assets/img/favicon-32x32.png') }}" rel="icon" type="image/png"
        sizes="32x32">
    <link href="{{ asset('vendor/theme/assets/img/favicon-16x16.png') }}" rel="icon" type="image/png"
        sizes="16x16">
    <link href="{{ asset('site.webmanifest') }}" rel="manifest">

    <!-- Fonts with optimized loading -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files with optimized loading -->
    <link href="{{ asset('vendor/theme/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/theme/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/theme/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/theme/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/theme/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('vendor/theme/assets/css/main.css') }}" rel="stylesheet">

    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com;">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">

    <link rel="preload" href="{{ asset('vendor/theme/assets/css/main.css') }}" as="style">
    <link rel="preload" href="{{ asset('vendor/theme/assets/img/hero-bg-2.jpg') }}" as="image">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Structured Data -->
    <!-- Structured Data -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'WebApplication',
        'name' => config('app.name', 'Laravel'),
        'description' => 'Compress images and files online for free. Reduce file sizes by up to 80% without losing quality.',
        'url' => url('/'),
        'applicationCategory' => 'UtilitiesApplication',
        'operatingSystem' => 'Web Browser',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'USD'
        ],
        'featureList' => [
            'Image compression',
            'File compression',
            'PDF optimization',
            'Bulk processing',
            'No registration required'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => config('app.name', 'Laravel'),
            'url' => url('/')
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center" aria-label="Homepage">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt="{{ config('app.name', 'Laravel') }} Logo" width="40" height="40"> -->
                <h1 class="sitename">{{ config('app.name', 'Laravel') }}</h1>
            </a>

            <nav id="navmenu" class="navmenu" role="navigation" aria-label="Main navigation">
                <ul>
                    <li><a href="#hero" class="active" aria-current="page">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list" aria-label="Toggle navigation menu" role="button"
                    tabindex="0"></i>
            </nav>

        </div>
    </header>

    <main class="main" id="main-content">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('vendor/theme/assets/img/hero-bg-2.jpg') }}" alt="File compression background"
                class="hero-bg" loading="eager">

            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('vendor/theme/assets/img/hero-img.png') }}"
                            class="img-fluid animated rounded"
                            alt="File compression illustration showing before and after file sizes" width="400"
                            height="300" loading="eager">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h1>Your files. Just lighter. With <span>{{ config('app.name', 'Laravel') }}</span></h1>
                        <p>We help you shrink images and files effortlessly, saving space and boosting speed without
                            losing quality. Compress JPG, PNG, PDF, and more formats online for free.</p>
                        <div class="d-flex">
                            <a href="#features" class="btn-get-started"
                                aria-label="Learn more about our compression features">Get Started</a>
                        </div>
                    </div>

                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" aria-hidden="true">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section><!-- /Hero Section -->

        <!-- Features Section -->
    <section id="features" class="features section pb-0">

        <div class="container">
            <ul class="nav nav-tabs nav-tabs-flat" id="myTab" role="tablist" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item" role="presentation">
                    <a href="{{ route('image') }}" class="nav-link {{ request()->routeIs('image') ? 'active' : '' }}">Images</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('zip') }}" class="nav-link {{ request()->routeIs('zip') ? 'active' : '' }}">Zip</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('pdf') }}" class="nav-link {{ request()->routeIs('pdf') ? 'active' : '' }}">PDF</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ route('minify') }}" class="nav-link {{ request()->routeIs('minify') ? 'active' : '' }}">JS/CSS Minify</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" data-aos="fade-up" data-aos-delay="100">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="p-4">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Features Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">

                <div class="col-xl-5 content">
                    <h3>About Us</h3>
                    <h2>Your files. Just lighter. With Fastprune</h2>
                    <p>At Fastprune, we believe storage and speed shouldn’t come at the cost of quality. Our smart
                        compression technology helps you shrink images and files effortlessly, saving space, improving
                        performance, and keeping every detail intact. Whether you’re a business, developer, or everyday
                        user, Fastprune makes your digital life lighter, faster, and easier.</p>
                    {{-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> --}}
                </div>

                <div class="col-xl-7">
                    <div class="row gy-4 icon-boxes">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-file-earmark-lock"></i>
                                <h3>Effortless & Secure</h3>
                                <p>With Fastprune, compression is seamless, safe, and designed to protect your data
                                    while simplifying your work.
                                </p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-clipboard-pulse"></i>
                                <h3>Smart Compression</h3>
                                <p>We use advanced algorithms to reduce file sizes without sacrificing quality, ensuring
                                    your files stay sharp and clear.
                                </p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-graph-up-arrow"></i>
                                <h3>Faster Performance</h3>
                                <p>Lighter files mean quicker load times, smoother workflows, and better user
                                    experiences across platforms.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-boxes"></i>
                                <h3>Save Storage Costs</h3>
                                <p>Free up valuable space and cut down on storage expenses by keeping your files
                                    optimized and efficient.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center" aria-label="Homepage">
                        <span class="sitename">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Fast, secure, and free file compression for everyone. No registration required.</p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="#" aria-label="Follow us on Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" aria-label="Follow us on Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Follow us on Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Follow us on LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('/terms') }}">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Tools</h4>
                    <ul>
                        <li><a href="{{ url('/compress-image') }}">Image Compressor</a></li>
                        <li><a href="{{ url('/compress-pdf') }}">PDF Compressor</a></li>
                        <li><a href="{{ url('/compress-video') }}">Video Compressor</a></li>
                        <li><a href="{{ url('/batch-compress') }}">Batch Compression</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>&copy; <span>{{ date('Y') }}</span> <strong>{{ config('app.name', 'Laravel') }}</strong>. <span>All
                    Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact for attribution purposes. -->
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"
        aria-label="Scroll to top"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader" aria-hidden="true"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/theme/assets/vendor/php-email-form/validate.js') }}" defer></script>
    <script src="{{ asset('vendor/theme/assets/vendor/aos/aos.js') }}" defer></script>
    <script src="{{ asset('vendor/theme/assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('vendor/theme/assets/vendor/purecounter/purecounter_vanilla.js') }}" defer></script>
    <script src="{{ asset('vendor/theme/assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>

    <!-- Main JS File -->
    <script src="{{ asset('vendor/theme/assets/js/main.js') }}" defer></script>

</body>

</html>
