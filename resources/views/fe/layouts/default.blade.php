<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mega taste Kitchen</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('fe.landingpage') }}" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Mega taste</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('fe.landingpage') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('fe.about') }}" class="nav-item nav-link">About</a>
                {{-- <a href="service.html" class="nav-item nav-link">Service</a> --}}
                <a href="{{ route('fe.menu') }}" class="nav-item nav-link">Menu</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="booking.html" class="dropdown-item">Booking</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    </div>
                </div> --}}
                <a href="{{ route('fe.contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('fe.order') }}" class="btn btn-primary py-2 px-4">Place an Order</a>
        </div>
    </nav>

    @yield('content')

    {{-- Order Modal --}}
    {{-- <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Hidden form within the modal -->
                <form action="" method="POST" enctype="multipart/form-data" id="paymentForm">
                    @csrf
                    <div class="modal-header">
                        <!-- Modal title and close button -->
                        <h2>Order Confirmation</h2>
                        <!-- ... (Title and close button) ... -->
                    </div>
                    <div class="modal-body">
                        <!-- Display order details here -->
                        <table class="table">
                            <!-- ... (Order details table) ... -->
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Dish</th>
                                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Quantity</th>
                                    <!-- Add more table headers if needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails['dishes'] as $dish)
                                    @if (isset($dish['selected']) && $dish['quantity'] > 0)
                                        @php
                                            $dishModel = \App\Models\Dish::find($dish['selected']);
                                            $dishName = $dishModel ? $dishModel->name : 'Unknown Dish';
                                        @endphp
                                        <tr>
                                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $dishName }}</td>
                                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">{{ $dish['quantity'] }}</td>
                                            <!-- Add more table cells if needed -->
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Payment Receipt Upload Form -->
                        <div class="mb-3">
                            <label for="payment_receipt" class="form-label">Upload Payment Receipt</label>
                            <input type="file" class="form-control" id="payment_receipt" name="payment_receipt">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                    <a class="btn btn-link" href="{{ route('fe.about') }}">About Us</a>
                    <a class="btn btn-link" href="{{ route('fe.contact') }}">Contact Us</a>
                    <a class="btn btn-link" href="{{ route('fe.menu') }}">Menu</a>
                    {{-- <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a> --}}
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No 44 Zone D, Bwari Road, Byazhin across Kubwa Abuja</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>092925555, 07038103222 (whatsapp)</p>
                    {{-- <p class="mb-2"><i class="fa fa-whatsapp me-3"></i>07038103222</p> --}}
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>megataste2023@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://twitter.com/Megataste23"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://instagram.com/megatastekitchen?igshid=OGQ5ZDc2ODk2ZA=="><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                    <h5 class="text-light fw-normal">Opened Daily</h5>
                    <p>07AM - 10PM</p>
                    {{-- <h5 class="text-light fw-normal">Sunday</h5>
                    <p>10AM - 08PM</p> --}}
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
                        
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    {{-- Total amount script --}}
    <script>
        const checkboxes = document.querySelectorAll('.dish-checkbox');
        const quantities = document.querySelectorAll('.dish-quantity');
        const totalAmount = document.getElementById('totalAmount');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                updateTotalAmount();
            });
        });
    
        quantities.forEach(quantity => {
            quantity.addEventListener('input', () => {
                updateTotalAmount();
            });
        });
    
        function updateTotalAmount() {
            let total = 0;
            checkboxes.forEach((checkbox, index) => {
                if (checkbox.checked) {
                    const quantity = parseInt(quantities[index].value);
                    const price = parseFloat(checkbox.getAttribute('data-price'));
                    total += quantity * price;
                }
            });
            totalAmount.textContent = total.toFixed(2);
        }
    </script>  

    {{-- Update hiden total field --}}
    <script>
        function updateTotalAmount() {
            let total = 0;
            checkboxes.forEach((checkbox, index) => {
                if (checkbox.checked) {
                    const quantity = parseInt(quantities[index].value);
                    const price = parseFloat(checkbox.getAttribute('data-price'));
                    total += quantity * price;
                }
            });
            totalAmount.textContent = total.toFixed(2);

            // Set the hidden input field's value to the calculated total amount
            document.getElementById('totalAmountInput').value = total.toFixed(2);
        }
    </script>
    
    {{-- Finish Order modal script--}}
    {{-- <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Get the order modal
            var orderModal = new bootstrap.Modal(document.getElementById('orderModal'));

            // Get the form and listen for submit event
            var form = document.querySelector('form[action="{{ route('fe.placeOrder') }}"]');
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission

                // Collect form data
                var formData = new FormData(form);

                // Create an object from the form data
                var orderDetails = {};
                formData.forEach(function (value, key) {
                    if (key.includes('dishes')) {
                        if (!orderDetails.dishes) {
                            orderDetails.dishes = [];
                        }
                        var dishKey = key.split('[')[1].split(']')[0]; // Extract the dish ID
                        if (!orderDetails.dishes[dishKey]) {
                            orderDetails.dishes[dishKey] = {};
                        }
                        orderDetails.dishes[dishKey][key.split('[')[2].split(']')[0]] = value;
                    } else {
                        orderDetails[key] = value;
                    }
                });

                // Add event listener to the button that triggers the modal
                var reviewOrderButton = document.querySelector('button[data-bs-target="#orderModal"]');
                reviewOrderButton.addEventListener('click', function () {
                    // Call a function to populate the modal with the order details
                    populateModal(orderDetails);
                });
            });

            // Function to populate the modal with order details
            function populateModal(orderDetails) {
                // Access the modal content elements and update their values
                // For example:
                var modalTitle = document.querySelector('.modal-title');
                modalTitle.textContent = 'Order Details';

                // Access other modal elements and populate them with order details

                // Show the modal
                orderModal.show();
            }
        });

    </script> --}}
    
</body>

</html>