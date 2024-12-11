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
    <title>BookNest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #F9F5EE;
        }
        /* Header Styling */
        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color:#DEE3E5;
            font-family: "Inter", sans-serif;
            height: 60px;
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
            gap: 30px;
            color: #815C5C;
            margin-left: 60px;
            align-items:center;
        }
        .icon-cart, .icon-user{
            font-size: 26px;
        }
        .log-out{
            font-size: 18px;
            white-space: nowrap; /* Không cho phép xuống dòng */
        }
        .btn.btn-action{
            display: flex;
            gap: 15px;
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
        }

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

        /* CSS of body */
        .content{
            display: flex;
            gap: 30px;
            margin: 30px 60px 0 60px;
        }
        .content-left{
            width: 30%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .categories{
            border: 1px solid #815C5C;
            border-radius: 5px;
            color: #815C5C;
        }
        .title-categories{
            margin: 20px 0 10px 28px;
            font-size: 36px;
            font-weight: 600;
        }
        .categories-list{
            margin-left: 20px;
            list-style-type: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
            font-size: 24px;
            padding-bottom: 40px;
            
        }
        .categories-item:hover{
            color: brown;
        }

        .title-bestSeller{
            font-style: italic;
            color: #815C5C;
            font-size: 36px;
            font-weight: normal;
            margin-bottom: 12px;
        }
        .products-bestSeller{
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .product-item-bestSeller{
            display: flex;
            flex-direction: row;
            gap: 8px;
            background-color: white;
            padding: 8px 7px;
            border-radius: 5px;
        }
        .image-book{
            width: 78px;
            height: 78px;
            object-fit: contain;
        }
        .name-price{
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .name-book, .price-book{
            margin:0;
        }
        .name-book{
            color: #815C5C;
            font-weight: 500;
        }
        .price-book{
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- Header -->
<?php
    require_once './app/views/header.php';
?>
    <div class="content">
        <div class="content-left">
            <div class="categories">
                <h2 class="title-categories">Categories</h2>
                <ul class="categories-list">
                    <li class="categories-item">Literature books</li>
                    <li class="categories-item">Economics books</li>
                    <li class="categories-item">Life skills books</li>
                    <li class="categories-item">Health & Lifestyle</li>
                    <li class="categories-item">Children's books</li>
                    <li class="categories-item">Horror books</li>
                    <li class="categories-item">Newly released books</li>
                </ul>
            </div>
            <img class="poster" src="public/img/Horror-book.png" alt="horror book">
            <div class="best-seller">
                <h2 class="title-bestSeller">Bestselling new books</h2>
                <div class="products-bestSeller">
                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book1.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">Mastering The Mindset Of 'Full Stomach, Clear Eyes'</p>
                            <p class="price-book">179,100₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book2.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">The Cursed Rabbit</p>
                            <p class="price-book">124,200₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book3.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">The Shadow Of The Eight Trigrams Gate</p>
                            <p class="price-book">207,000₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book4.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">I Want To Eat Your Pancreas</p>
                            <p class="price-book">113,400₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book5.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">Children's Guide To Caring For Parents 
                                (2-Book Set)</p>
                            <p class="price-book">266,400₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book6.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">There Is A Summer Never Forgotten</p>
                            <p class="price-book">96,000₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book7.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">Practical Human Resources</p>
                            <p class="price-book">119,200₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book8.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">My Grandma Sends Her Apologies</p>
                            <p class="price-book">171,000₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book9.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">Classes With Funerals Skip Roll Call</p>
                            <p class="price-book">212,000₫</p>
                        </div>
                    </div>

                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/book10.png" alt="image-book">
                        <div class="name-price">
                            <p class="name-book">The World Is Very Noisy, Just Being Myself Is Enough</p>
                            <p class="price-book">96,000₫</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-right">
            <!-- content ... -->
        </div>
    </div>

    <!-- Footer -->
<?php
    require_once './app/views/footer.php';
?>
</body>
</html>