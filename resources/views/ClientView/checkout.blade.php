@extends('ClientView.Layouts.main')

@section('main-section')
    <div class="container mt-5 pt-5 mb-4">
        <div class="container mt-5 pt-5 mb-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h4 class="mb-4 mt-3 text-primary text-center">🧾 Checkout</h4>
                    <h4 class="text-success fw-bold mb-0"> Total Amount: ₹{{ number_format(session('totalAmount', 0), 2) }}
                    </h4>

                    <form method="POST" id="bookingdetail">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="example@email.com" required>
                        </div>

                    </form>

                    <div class="container text-center mt-3">
                        <button type="button" onclick="validateAndPay()" class="btn btn-success btn-lg">Confirm &
                            Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function validateAndPay() {
            const form = document.getElementById('bookingdetail');
            const formData = new FormData(form);
            const name = formData.get('name');
            const email = formData.get('email');

            if (!name || !email) {
                alert("Please fill all the form fields before proceeding to payment.");
                return;
            }

            fetch("{{ url('/bookingdata') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        console.log(data.message);
                        openRazorpay();
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("An error occurred. Please try again.");
                });
        }

        function openRazorpay() {
            const options = {
                "key": "{{ env('RAZOR_KEY') }}",
                "amount": "{{ session('totalAmount') * 100 }}",
                "currency": "INR",
                "name": "GardeGuru",
                "description": "Test transaction",
                "handler": function(response) {
                    const form = document.createElement("form");
                    form.method = "POST";
                    form.action = "/handlepayment";

                    const csrfInput = document.createElement("input");
                    csrfInput.type = "hidden";
                    csrfInput.name = "_token";
                    csrfInput.value = '{{ csrf_token() }}';

                    const paymentIdInput = document.createElement("input");
                    paymentIdInput.type = "hidden";
                    paymentIdInput.name = "razorpay_payment_id";
                    paymentIdInput.value = response.razorpay_payment_id;

                    form.appendChild(csrfInput);
                    form.appendChild(paymentIdInput);
                    document.body.appendChild(form);
                    form.submit();
                },
                "theme": {
                    "color": "#0000FF"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
@endsection
