<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <link rel="stylesheet" href="../public/css/successfulPayment.css">
  <link rel="stylesheet" href="../public/css/homepage.css">
</head>
<body>
    <header class="header">
      <div class="logo-brand">
          <img src="../public/img/image.png" alt="BookNest Logo" class="logo">
          <h1 class="brand-name"><a href="/booknest_website/">BookNest</a></h1>
      </div>
      <ul class="navigation">
          <li class="nav-link active"><a href="/booknest_website/">Home</a></li>
          <li class="nav-link"><a href="#">Search</a></li>
      </ul>
      <div class="right-header">
          <?php if (isset($_SESSION['is_logged_in'])): ?>
              <div class="iconCart"><i class="fa-solid fa-cart-shopping icon-cart"></i></div>
              <div class="iconUser"><a href="<?php echo BASE_URL; ?>userController/userProfile"><i class="fa-solid fa-user icon-user"></i></a></div>
              <div class="username"><?php echo $_SESSION['current_user']['username'] ?></div>
              <div class="sign-up"><a href="<?php echo BASE_URL; ?>userController/logout">Log Out</a></div>
          <?php else: ?>
              <button class="sign-up"><a href="<?php echo BASE_URL; ?>userController/registerForm">Sign up</a></button>
              <button class="sign-up"><a href="<?php echo BASE_URL; ?>userController/loginForm">Log In</a></button>
          <?php endif; ?>
      </div>
    </header>

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
            <img src="../public/img/30_TUOI.png" alt="Glow Cream">
            <div class="details">
              <p>Glow Cream</p>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" id="number_addition">+</button>
              </div>
            </div>
            <p class="price">145.000đ</p>
          </div>
          <div class="item">
            <img src="../public/img/book1.png" alt="Glow Cream">
            <div class="details">
              <p>Glow Cream</p>
              <div class="quantity">
              <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
              <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" id="number_addition">+</button>
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
      
    <div class="footer">
      <div class="columns">
          <div class="columnone">
            <h4>SERVICES</h4>
            <a class="link" href="#">Terms of Service</a>
            <a class="link" href="#">Privacy Policy</a>
            <a class="link" href="#">Contact</a>
            <a class="link" href="#">Bookstore System</a>
            <a class="link" href="#">Order Tracking</a>
          </div>
          <div class="columntwo">
              <h4>SUPPORT</h4>
              <a class="link" href="#">Order Guide</a>
              <a class="link" href="#">Return and Refund Policy</a>
              <a class="link" href="#">Shipping Policy</a>
              <a class="link" href="#">Payment Methods</a>
              <a class="link" href="#">Customer Policy</a>
          </div>
          <div class="columnthree">
              <h4>ADDRESS</h4>
              <br>
              <p>Phuoc My - Son Tra - Da Nang</p>
              <br>
              <p>booknest_shd@gmail.com</p>
              <br>
              <p>0762 778 450</p>
          </div>
        </div>
        <div class="footer-line"></div>
        <div class="footer-content">
            <div class="footer-left">
                BookNest.com.vn © 2024. All Rights Reserved.
            </div>
            <div class="footer-right">
              Follow us:
              <img src="../public/img/facebook.png" alt="Facebook">
              <img src="../public/img/instagram.png" alt="Instagram">
              <img src="../public/img/twitter.png" alt="Twitter">
              <img src="../public/img/mail.png" alt="Mail">
            </div>
        </div>
      </div>
</body>
</html>
