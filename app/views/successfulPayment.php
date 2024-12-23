<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
   <link rel="stylesheet" href="public/css/homepage.css?v=<?php echo time(); ?>">
</head>
<body>
  <div class="container">
    <div class="delivery-info">
      <h2>Delivery information</h2>
      <form>
        <input type="text" placeholder="Add new address..." required>
        <input type="text" placeholder="Enter your name" required>
        <input type="tel" placeholder="Enter your phone" required>
        <textarea placeholder="Enter a note to the seller"></textarea>
        <h3>Payment method</h3>
        <div class="payment-method">
          <label>
            <input type="radio" name="payment" value="cod" required>
            Cash On Delivery
          </label>
          <label>
            <input type="radio" name="payment" value="vnpay">
            VNPay Wallet
          </label>
        </div>
        <button type="submit">Order</button>
      </form>
    </div>
    <div class="order-summary">
      <div class="items">
        <div class="item">
          <img src="product-image.jpg" alt="Glow Cream">
          <div class="details">
            <p>Glow Cream</p>
            <div class="quantity">
              <button>-</button>
              <span>2</span>
              <button>+</button>
            </div>
          </div>
          <p class="price">145.000đ</p>
        </div>
        <div class="item">
          <img src="product-image.jpg" alt="Glow Cream">
          <div class="details">
            <p>Glow Cream</p>
            <div class="quantity">
              <button>-</button>
              <span>2</span>
              <button>+</button>
            </div>
          </div>
          <p class="price">145.000đ</p>
        </div>
      </div>
      <div class="total">
        <p>Total</p>
        <p>290.000đ</p>
      </div>
    </div>
  </div>
</body>
</html>
