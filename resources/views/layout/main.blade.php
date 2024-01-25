<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- my style --}}
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('layout.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-white pt-3">
        <!-- Section: Social media -->


        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start ">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->

                    <!-- Content -->
                    <div class="container-sm text-center">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Event ID
                        </h6>
                        <p>
                            Event ID strives to redefine your concert experiences by offering exclusive early access,
                            effortless ticket booking, and robust security. Our goal is to be your ultimate platform for
                            staying informed about upcoming events, providing personalized recommendations, and ensuring
                            that every event becomes a memorable experience. Join Event ID to make your concert moments
                            truly exceptional
                        </p>

                    </div>


                    <!-- Grid column -->
                    <h6 class="text-uppercase fw-bold mb-4 text-center">Contact</h6>
                    <div class="d-flex justify-content-center">
                        <p><i class="bi bi-geo-alt-fill"></i>New York, NY 10012, US </p>
                        <p>
                            | <i class="bi bi-envelope-at-fill"></i>
                            info@example.com |
                        </p>
                        <p><i class="bi bi-telephone-fill"></i> + 01 234 567 88 | </p>
                        <p><i class="bi bi-telephone-fill"></i> + 01 234 567 89</p>

                    </div>
                    <!-- Links -->

                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
