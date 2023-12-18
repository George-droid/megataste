@extends('fe.layouts.default')

@section('content')
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <div class="container-xxl py-5 bg-dark contact-hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Place Your Order</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('fe.landingpage') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Place an order now</h5>
                <h1 class="mb-5">Contact For Enquiries</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Mail Us</h5>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>megataste2023@gmail.com</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Call Us</h5>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>092925555</p>
                        </div>
                        {{-- <div class="col-md-4">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Technical</h5>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div> --}}
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="col-md-9 wow fadeInUp" data-wow-delay="0.2s">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('fe.placeOrder') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Your Name">
                                        <label for="customer_name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Your Email">
                                        <label for="customer_email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Your Phone No.">
                                        <label for="customer_phone">Your Phone No.</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Your Address">
                                        <label for="customer_address">Your Address - House no, street, area.</label>
                                    </div>
                                </div>
                            
                                <!-- Other customer details fields -->
                            
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach ($menus as $menu)
                                            <div class="col-md-4">
                                                <h5>{{ $menu->name }}</h5>
                                                @foreach ($menu->dishes as $dish)
                                                    <div class="form-check">
                                                        <input class="form-check-input dish-checkbox" type="checkbox" id="dish{{ $dish->id }}" name="dishes[{{ $dish->id }}][selected]" value="{{ $dish->id }}" data-price="{{ $dish->price }}">
                                                        <label class="form-check-label" for="dish{{ $dish->id }}">{{ $dish->name }} (&#8358;{{ $dish->price }})</label>
                                                        <input type="number" class="form-control dish-quantity" name="dishes[{{ $dish->id }}][quantity]" value="0" min="0">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Total amount section -->
                                <div class="col-md-12 mt-4">
                                    <h5>Total Amount: &#8358;<span id="totalAmount">0.00</span></h5>
                                </div>
                                <input type="hidden" name="total_amount" id="totalAmountInput" value="0.00">

                                {{-- <label for="dishes">Select Dishes:</label>
                                <select multiple id="dishes" name="dishes[]">
                                    @foreach ($dishes as $dish)
                                        <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                                    @endforeach
                                </select> --}}
                                <h3>Payment Information</h3>
                                <p>Please transfer the total amount of your order to the provided account. Once the payment is done, upload the payment receipt below.</p>
                                <p class="col-md-4">Account Name: Megataste</p>
                                <p class="col-md-4">Account Number: XXXXXXXXXXX</p>
                                <p class="col-md-4">Bank Name: XXX Bank</p>

                                <!-- Payment Receipt Upload Form -->
                                <div class="mb-3">
                                    <label for="payment_receipt" class="form-label">Upload Payment Receipt</label>
                                    <input type="file" class="form-control" id="payment_receipt" name="payment_receipt">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Place Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
@endsection