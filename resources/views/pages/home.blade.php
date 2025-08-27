<x-layouts.guest>

    <!-- Features Section -->
    <section id="features" class="features section pb-0">

        <div class="container">
            <div class="row gy-2">
                @livewire('uploader-component-livewire')
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
</x-layouts.guest>
