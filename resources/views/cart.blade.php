@extends('layouts.app')

@section('content')
<section class="cart">
    <div class="container">
        <h2>🛒 Your Shopping Cart</h2>

        {{-- Simulated Cart Items --}}
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ([1, 2, 3] as $i)
                <tr>
                    <td>Product {{ $i }}</td>
                    <td><input type="number" value="1" min="1"></td>
                    <td>$ {{ 10 * $i }}</td>
                    <td>$ {{ 10 * $i }}</td>
                    <td><button class="btn-sm">❌</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-total">
            <p><strong>Total:</strong> $60</p>
            <!-- Trigger Checkout Panel -->
            <button class="btn" onclick="toggleCheckout()">🧾 Proceed to Checkout</button>

        </div>
    </div>
    <!-- Inline Checkout Panel -->
<div id="checkoutPanel" class="checkout-slide">
    <div class="checkout-header">
        <h3>Checkout</h3>
        <button onclick="toggleCheckout()" class="close-btn">✖</button>
    </div>
    <form action="/checkout" method="POST">
    @csrf

    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="fullname" required>
    </div>

    <div class="form-group">
        <label>Email Address</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Shipping Address</label>
        <textarea name="address" required></textarea>
    </div>

    <hr>
    <h4>💳 ATM Card Payment</h4>

    <div class="form-group">
        <label>Card Number</label>
        <input type="text" name="card_number" maxlength="16" placeholder="1234 5678 9012 3456" required>
    </div>

    <div class="form-group">
        <label>Cardholder Name</label>
        <input type="text" name="card_name" placeholder="Name" required>
    </div>

    <div class="form-row">
        <div class="form-group half">
            <label>Expiry Date</label>
            <input type="text" name="expiry" placeholder="MM/YY" required>
        </div>
        <div class="form-group half">
            <label>CVV</label>
            <input type="password" name="cvv" maxlength="3" placeholder="123" required>
        </div>
    </div>

    <button type="submit" class="btn">✅ Confirm Order</button>
</form>

</div>

    <script>
        function toggleCheckout() {
        const panel = document.getElementById("checkoutPanel");
        panel.style.display = panel.style.display === "block" ? "none" : "block";
        }
    </script>

</section>
@endsection
