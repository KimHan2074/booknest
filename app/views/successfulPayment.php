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
    <!-- <link rel="stylesheet" href="public/css/homepage.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  background-color: #fff;
  color: #4d4d4d;
}

.container {
  /* max-width: 1200px; */
  margin: auto;
  /* padding: 20px; */
}

    /* Header Styling */
    .header {
        display: flex;
        position: fixed;
        top: 0;
        align-items: center;
        padding: 10px 20px;
        background-color:#DEE3E5;
        font-family: "Inter", sans-serif;
        height: 60px;
        width: 100%;
        z-index: 9999;
    }

    /*logo brand*/
    .logo-brand {
        display: flex;
        gap:10px;
        align-items: center;
        margin-left: 40px;
    }

    .logo {
        width: 75px;
        height: 60px;
        margin-bottom: 8px;
    }

    .brand-name {
        font-size: 40px;
        color: #815C5C;
        font-weight: normal;
        margin-bottom: 0;
        line-height: 60px;
        
    }

    .brand-name a {
        text-decoration: none;
        color: #815C5C;
    }

    /* Navigation Links */
    .navigation {
        display: flex;
        align-items: center;
        cursor: pointer;
        list-style: none;
        margin-left: auto;
        margin-bottom: 0;
    }
    .nav-link {
        margin: 0 24px;
        align-items: center;
        position: relative;
    }
    .nav-link a{
        text-decoration: none;
        color: #815C5C;
        font-size: 22px;
        font-weight: bold;
    }

    .nav-link:hover{
        color: #815C5C;
    }
    .nav-link.active{
        color:#815C5C;
    }
    .nav-link.active::after{
        content: "";
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        background-color:#815C5C; 
        border-radius: 10px;
    }
    /* style of right header */
    .right-header{
        display: flex;
        gap: 20px;
        color: #815C5C;
        margin-left: 60px;
        align-items:center;
    }
    .icon-cart, .icon-user{
        font-size: 26px;
        color: #815C5C;
    }
    .log-out{
        font-size: 18px;
        white-space: nowrap; /* Không cho phép xuống dòng */
    }
    .sign-up, .log-in{
        outline: none;
        border: none;
        background-color:#815C5C;
        width: 80px;
        height: 30px; 
        padding: 0 6px;
        color: white;   
        border-radius: 5px;
        font-size: 16px;
        line-height: 30px;
        text-align: center;

    }

    .sign-up a{
        text-decoration: none;
        color: white;
    }

    .sign-up:hover, .log-in:hover {
        cursor: pointer;
    }

/* Main Content */
.main-content {
  display: flex;
  margin-top: 60px;
  margin-left: 40px;
}

.delivery-form {
  flex: 2;
  background-color: #fff;
  padding: 20px;
}

.delivery-form h2 {
  color: #815C5C;
  margin-bottom: 15px;
  font-weight: 500;
  font-size: 24px;
}

.delivery-form form input {
  display: block;
  width: 95%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.payment-methods label {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
}

.btn{
  text-align: center;
}

.order-btn {
  width: 80px;
  padding: 10px;
  background-color: #815C5C;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  text-align: center;
}

.order-btn:hover {
  background-color:rgb(151, 64, 64);
}

/* Order Summary */
.order-summary {
  flex: 1;
  background-color: #F9F5EE;
  padding: 20px;
  padding-top: 30px;
  color: #815C5C
}

.items-list {
  list-style: none;
  margin-bottom: 15px;
  height: 380px;
    overflow-y: auto;
    overflow-x: hidden;
}

.items-list::-webkit-scrollbar {
    display: none; /* Hide scroll bars */
}


.items-list li {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
.orderProduct-name{
  width: 180px;
  white-space: nowrap;      
  overflow: hidden;          
  text-overflow: ellipsis;
}

.items-list img {
  width: 50px;
  height: 50px;
  border-radius: 4px;
  margin-right: 10px;
}
.number_subtraction, .number_addition{
  width: 17px;
  height: 19px;
  background-color: #DEE3E5;
  text-align: center;
  border: none;
  outline: none;
  font-weight: 500;
}

.input_sl{
border: none;
outline: none;
background-color: #F9F5EE;
width: 30px;
text-align: center;
font-size: 14px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
	margin: 0;
	-webkit-appearance: none;
}

.total {
  display: flex;
  justify-content: space-between;
  font-weight: bold;
  margin-top: 20px;
}

/* Footer */
    /* Màu nền của footer */
    .footer {
        color: #815C5C;
        background-color: #DEE3E5;
        padding: 20px 20px 0 20px;
    }

    .columns {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .columnone, .columntwo, .columnthree {
        flex: 1;
        margin: 0 70px;
    }
    .link {
        display: block;
        color: #815C5C;
        text-decoration: none;
        margin: 5px 0;
    }
    .link:hover {
        text-decoration: underline;
    }
    .footer-line {
        width: 100%;
        height: 1px;
        background-color: #815C5C;
    }
    .footer-content {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        margin: 0 70px;
    }
    .footer-right {
        text-align: right;
    }

    .footer-right img {
        margin-left: 10px;
        width: 24px;
        height: 24px;
    }

  </style>
</head>
<body>
  <div class="container">
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

    <main class="main-content">
      <section class="delivery-form">
        <h2>Delivery information</h2>
        <form>
          <input type="text" placeholder="Add new address..." required>
          <input type="text" placeholder="Enter your name" required>
          <input type="tel" placeholder="Enter your phone" required>
          <input type="text" placeholder="Enter a note to the seller">
        </form>
        <h2>Payment method</h2>
        <div class="payment-methods">
          <label><input type="radio" name="payment" checked> Cash On Delivery</label>
          <label><input type="radio" name="payment"> VNPay Wallet</label>
        </div>
        <div class="btn">
          <button class="order-btn">Order</button>
        </div>
      </section>

      <section class="order-summary">
        <ul class="items-list">
          <li>
            <img src="../public/img/AC_NU.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream Ac Nu</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>

          <li>
            <img src="../public/img/book2.png" alt="Glow Cream">
            <div class="order-detail">
              <div class="orderProduct-name">Crow Dream book 2 ...</div>
              <div class="quantity">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="number_subtraction" id="number_subtraction">-</button>
                <input class="input_sl" id="input_sl-${item.id}" type="number" value="1" min="1" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="number_addition" id="number_addition">+</button>
              </div>
            </div>
            <span>145.000đ</span>
            <i class="fa-regular fa-trash-can"></i>
          </li>
          
        </ul>
        <hr>
        <div class="total">
          <span>Total</span>
          <span>290.000đ</span>
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

