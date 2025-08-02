@extends('layouts.app')

@section('title', 'Your Cart - MatchaMinds')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-success">🛒 Your Matcha Cart</h1>
        <p class="text-muted">Review your order before checking out</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-end">Price</th>
                            <th class="text-end">Subtotal</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example static content -->
                        <tr>
                            <td>🌿 Matcha Starter Kit</td>
                            <td class="text-center"><input type="number" class="form-control form-control-sm w-50 mx-auto" value="1"></td>
                            <td class="text-end">$25</td>
                            <td class="text-end">$25</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-danger rounded-pill">✖</button></td>
                        </tr>
                        <tr>
                            <td>🍵 Organic Ceremonial Matcha</td>
                            <td class="text-center"><input type="number" class="form-control form-control-sm w-50 mx-auto" value="2"></td>
                            <td class="text-end">$30</td>
                            <td class="text-end">$60</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-danger rounded-pill">✖</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h4 class="text-success fw-semibold">Total: $85</h4>
                <!-- Trigger modal -->
                <button class="btn btn-success btn-lg rounded-pill" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                    Proceed to Checkout 🧾
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 🧾 Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cardName" class="form-label">Cardholder Name</label>
                        <input type="text" class="form-control" id="cardName" name="cardName" required>
                    </div>

                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expiry" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/YY" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email for Receipt</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold py-2">
                        Pay $85 Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
