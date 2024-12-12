<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>Footer</title>
    <style>
        body {
            font-family: "Inter", sans-serif;
            margin: 0;
        }

        .containers {
            color: #815C5C;
            background-color: #DEE3E5;
            padding: 20px;
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

        .footer {
            position: relative;
            padding: 20px 0;
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
        }

        .footer-left {
            text-align: left;
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
    <div class="containers">
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
                <p>Phuoc My - Son Tra - Da Nang</p>
                <p>booknest_shd@gmail.com</p>
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
=======
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- Cột SERVICES -->
            <div class="column-footer col-md-4">
                <h6>SERVICES</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Bookstore System</a></li>
                    <li><a href="#">Order Tracking</a></li>
                </ul>
            </div>

            <!-- Cột SUPPORT -->
            <div class="column-footer col-md-4">
                <h6>SUPPORT</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Order Guide</a></li>
                    <li><a href="#">Return and Refund Policy</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Payment Methods</a></li>
                    <li><a href="#">Customer Policy</a></li>
                </ul>
            </div>

            <!-- Cột ADDRESS -->
            <div class="column-footer col-md-4">
                <h6>ADDRESS</h6>
                <p id="address-1">Phuoc My - Son Tra - Da Nang</p>
                <p id="address-2">booknest_shd@gmail.com</p>
                <p id="address-3">0762 778 450</p>
            </div>
        </div>

      <!-- Dòng dưới cùng -->
        <hr id="footer-hr">
        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0">BookNest.com.vn © 2024. All Rights Reserved.</p>
            <div>
                <!-- Bootstrap Icons -->
                <a href="#" class="mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="mx-2"><i class="bi bi-twitter"></i></a>
                <a href="#" class="mx-2"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="mx-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="mx-2"><i class="bi bi-envelope"></i></a>
            </div>
        </div>
    </div>
</div>
>>>>>>> 07081039c09a72028c394a9074fde25e5ff841a9
