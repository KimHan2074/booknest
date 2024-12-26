<?php
// Start session nếu chưa bắt đầu
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
$is_logged_in = isset($_SESSION['current']) && !empty($_SESSION['current']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/Payment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container">
    <!-- header -->

    <main class="main-content">
      <section class="delivery-form">
        <h2 class="title-content">Delivery information</h2>
        <form class="frm-info-delivery">
          <input class="input-address" type="text" placeholder="Add new address..." required>
          <input class="input-name" type="text" placeholder="Enter your name" required>
          <input class="input-phone" type="tel" placeholder="Enter your phone" required>
          <input class="input-note" type="text" placeholder="Enter a note to the seller">
        </form>
        <h2 class="title-content">Payment method</h2>
        <div class="payment-methods">
          <label class="label"><input type="radio" name="payment" checked> Cash On Delivery</label>
          <label class="label"><input type="radio" name="payment"> VNPay Wallet</label>
        </div>
        <div class="btn">
          <button class="order-btn">Order</button>
        </div>
      </section>

      <section class="order-summary">
        <ul class="items-list">
          <li>
            <img src="../public/img/AC_NU.png" alt="Glow Cream" class="img-product">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream Ac Nu</div>
              <div class="quantity">
              <input class="input_sl" id="input_sl-1" type="number" value="1" min="1" readonly />
              </div>
            </div>
            <p class="price">145.000đ</p>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream" class="img-product">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
              <input class="input_sl" id="input_sl-1" type="number" value="1" min="1" readonly />
              </div>
            </div>
            <p class="price">145.000đ</p>
          </li> 
        </ul>
        <hr>
        <div class="total-price">
          <p class="total">Total</p>
          <p class="amount">290.000đ</p>
        </div>
      </section>
    </main>

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
    </div>
  </div>
</body>
</html>

