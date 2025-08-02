@extends('layouts.app') {{-- Or your main layout --}}

@section('content')
@php $total = 0; @endphp

<div class="container py-5">
    <h1 class="mb-4">🛒 Your Cart</h1>

        {{-- Alert Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

    @if(count($cart) > 0)
    {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}
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
                            @php $total = 0; @endphp
                            @foreach ($cart as $id => $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    
                                    <td>{{ $item['name'] }}</td>
                                    <td class="text-center">{{ $item['quantity'] }}</td>
                                    <td class="text-end">${{ number_format($item['price'], 2) }}</td>
                                    <td class="text-end">${{ number_format($subtotal, 2) }}</td>
                                    <td class="text-center">
                                        
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td class="text-end"><strong>${{ number_format($total, 2) }}</strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h4 class="text-success fw-semibold">Total: ${{ number_format($total, 2) }}</h4>
                    <!-- Trigger modal -->
                    <button class="btn btn-success btn-lg rounded-pill" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                        Proceed to Checkout 🧾
                    </button>
                </div>
            </div>
        </div>
    @else
        <p>Your cart is empty 😢</p>
    @endif
</div>

<!-- 🧾 Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                {{-- <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold py-2">
                    Pay ${{ number_format($total, 2) }} Now
                </button> --}}
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

                    <div class="modal-body">

                    <!-- 🧾 Invoice Summary -->
                    <div class="invoice mb-4">
                        <h5 class="fw-bold">Invoice Summary</h5>
                        <table class="table table-sm invoice-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceItems">
                                <!-- JS will fill this -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td class="text-end"><strong id="invoiceTotal">$0.00</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- Already handled by Bootstrap -->
                    <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold py-2">
                        Pay ${{ number_format($total, 2) }} Now
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartItems = @json($cart);
        const invoiceTable = document.getElementById('invoiceItems');
        const invoiceTotal = document.getElementById('invoiceTotal');

        let total = 0;
        invoiceTable.innerHTML = '';

        Object.values(cartItems).forEach(item => {
            const subtotal = item.price * item.quantity;
            total += subtotal;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name} × ${item.quantity}</td>
                <td class="text-end">$${subtotal.toFixed(2)}</td>
            `;
            invoiceTable.appendChild(row);
        });

        invoiceTotal.textContent = `$${total.toFixed(2)}`;
    });
</script>
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert-dismissible');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        }
    }, 3000); // 3 seconds
</script>


@endsection
