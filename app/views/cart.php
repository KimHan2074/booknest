<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .cart-wrapper {
            font-family: "Inter", sans-serif;
            background-color: #F9F5EE;
        }

        .cart {
            width: 80%;
            margin: 20px auto;
            background-color: #F9F5EE;
            padding: 20px;
        }

        #title {
            text-align: center;
            color: #5c3d2e;
            margin-bottom: 10px;
        }

        .cart-subtitle {
            text-align: center;
            color: #815C5C;
            margin-bottom: 20px;
        }

        .cart-table {
            width: 100%;
        }

        #cart th,
        #cart td {
            padding: 12px;
            text-align: center;
        }

        #cart th {
            background-color: #f4f4f4;
            color: #815C5C;
        }

        #cart tr {
            padding: 12px;
            text-align: center;
        }

        .cart-item-name {
            display: flex;
            align-items: center;
        }

        .cart-item-name img {
            width: 60px;
            height: auto;
            margin-right: 10px;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-item-quantity button {
            background-color: #ddd;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .cart-item-quantity input {
            width: 40px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0 5px;
        }

        .cart-item-remove {
            color: #d9534f;
            font-size: 20px;
            border: none;
            background: none;
            padding-top: 40px;
        }

        .cart-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .continue-shopping-btn {
            background-color: #ddd;
            color: #333;
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .continue-shopping-btn:hover {
            background-color: #bbb;
            color: #000;
        }

        .payment-btn {
            background-color: #5c3d2e;
            color: #fff;
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .payment-btn:hover {
            background-color: #7d5240;
            transform: scale(1.05);
        }

        #cart td:nth-child(2),
        #cart td:nth-child(4),
        #cart td:nth-child(1) {
            vertical-align: baseline;
        }

    </style>
</head>
<body>
    <!-- Header -->
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
            <div class="iconUser"><i class="fa-solid fa-user icon-user"></i></div>
            <div class="username"><?php echo $_SESSION['current_user']['username'] ?></div>
            <div class="sign-up"><a href="<?php echo BASE_URL; ?>userController/logout">Log Out</a></div>
        <?php else: ?>
            <button class="sign-up"><a href="<?php echo BASE_URL; ?>userController/registerForm">Sign up</a></button>
            <button class="sign-up"><a href="<?php echo BASE_URL; ?>userController/loginForm">Log In</a></button>
        <?php endif; ?>
    </div>
    </header>
    <!-- body -->
    <div class="cart-wrapper">
        <div class="cart" id="cart">
            <h1 id="title">Giỏ hàng của bạn</h1>
            <p class="cart-subtitle">Có 3 sản phẩm trong giỏ hàng của bạn</p>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cart-item">
                        <td class="cart-item-name">
                            <img src="https://product.hstatic.net/200000845405/product/8936225390201_2ac6f56f84f54accb8b5d9abc427b9c4_master.jpg" alt="Không Sao Đâu, Lại Bắt Đầu">
                            Sẵn sàng để yêu
                        </td>
                        <td class="cart-item-price">84,000đ</td>
                        <td class="cart-item-quantity">
                            <button class="quantity-decrease">-</button>
                            <input type="text" value="1" readonly>
                            <button class="quantity-increase">+</button>
                        </td>
                        <td class="cart-item-total">84,000đ</td>
                        <td><button class="cart-item-remove">&times;</button></td>
                    </tr>
                    <tr class="cart-item">
                        <td class="cart-item-name">
                            <img src="https://product.hstatic.net/200000845405/product/bia_1_tu_chua_lanh_cam_xuc_xau_574caf4289f64930a7b96467fb8f5e17_master.png" alt="Tham Vấn Tâm Lý Trên Nền Tảng Phật Giáo">
                            Tự Chữa Lành Cảm Xúc Xấu
                        </td>
                        <td class="cart-item-price">207,200đ</td>
                        <td class="cart-item-quantity">
                            <button class="quantity-decrease">-</button>
                            <input type="text" value="1" readonly>
                            <button class="quantity-increase">+</button>
                        </td>
                        <td class="cart-item-total">207,200đ</td>
                        <td><button class="cart-item-remove">&times;</button></td>
                    </tr>
                    <tr class="cart-item">
                        <td class="cart-item-name">
                            <img src="https://product.hstatic.net/200000845405/product/8936225390188_3dff227ade9c4c2991598d8f064b1617_master.jpg" alt="Giới Hạn Và Sứ Mệnh Của Linh Hồn">
                            Tình Yêu Cũng Cần Phải Học
                        </td>
                        <td class="cart-item-price">160,000đ</td>
                        <td class="cart-item-quantity">
                            <button class="quantity-decrease">-</button>
                            <input type="text" value="1" readonly>
                            <button class="quantity-increase">+</button>
                        </td>
                        <td class="cart-item-total">160,000đ</td>
                        <td><button class="cart-item-remove">&times;</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="cart-actions">
                <button class="continue-shopping-btn">Continue shopping</button>
                <button class="payment-btn">Payment</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
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