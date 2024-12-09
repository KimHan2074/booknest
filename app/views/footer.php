<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <title>Footer</title>
    <style>
        /* Màu nền của footer */
        .footer {
            background-color: #DEE3E5; /* Màu xám nhạt */
            font-family: "Inter", sans-serif; /* Áp dụng font Inter cho footer */
        }

        /* Tiêu đề trong footer */
        .footer h6 {
            color: #815C5C; /* Màu chữ */
            font-weight: bold;
            padding-top: 30px; /* Thêm khoảng cách trên */
        }

        /* Liên kết trong footer */
        .footer a {
            color: #815C5C; /* Màu chữ */
            text-decoration: none;
        }

        .footer a:hover {
            color: #815C5C; /* Không thay đổi màu chữ khi hover */
            text-decoration: underline;
        }

        /* Icon trong footer */
        .footer i {
            font-size: 1.5rem; /* Tăng kích thước icon */
            color: gray; /* Màu chữ */
            transition: color 0.3s ease;
        }

        .footer i:hover {
            color: #815C5C; /* Màu chữ khi hover */
        }

        /* Dòng phân cách */
        #footer-hr {
            border-color: #815C5C; /* Màu xám nhạt cho đường kẻ */
        }

        /* Văn bản bản quyền */
        .footer p {
            color: #815C5C; /* Màu chữ */
            font-size: 0.9rem;
        }

        /* Cập nhật các ID cho các thẻ p */
        #address-1, #address-2, #address-3 {
            margin-bottom: 0.5rem; /* Giảm khoảng cách giữa các đoạn văn */
        }
    </style>
</head>
<body>
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
</body>
</html>