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
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
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
            gap: 20px;
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
            padding-bottom: 30px;
            
        }
        .categories-item:hover{
            color: brown;
        }

        .title-type{
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
            text-decoration: none;
        }
        .price-book{
            font-style: italic;
        }

        .content-right{
            width: 70%;
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 25px;
        }

        /* Container cho slider */
        .slider-container {
            width: 100%;
            height: 470px; /* Chiều cao vùng slider */
            margin: 0 auto; /* Canh giữa */
            overflow: hidden; /* Ẩn phần tràn ra ngoài */
            position: relative; /* Định vị để chứa các nút điều khiển */
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

            /* Thiết lập slider */
        .slider {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.8s ease-in-out; /* Hiệu ứng mượt */
        }

        .slider-item {
            min-width: 100%;
            object-fit: center;
        }

        /* Nút điều hướng */
        .slider-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px 15px;
            cursor: pointer;
            z-index: 10;
            font-size: 24px;
            font-style: bold;
        }   

        .slider-control-prev {
            left: 10px;
        }

        .slider-control-next {
            right: 10px;
        }

        /* Chấm chỉ mục*/
        .slider-pagination {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .slider-pagination-dot {
            width: 10px;
            height: 10px;
            background-color: gray;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0.5;
        }

        .slider-pagination-dot.active {
            opacity: 1;
            background-color: #ff5722;
        }

        /* Sách theo danh mục */
        .literature-books {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 16px;
        }

        .literature-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px 20px 0 20px;
            text-align: center;
            transition: transform 0.3s;
            height: 330px;
        }

        .literature-item:hover {
            transform: scale(1.05); /*Phóng to khi hover */
        }

        .img-book {
            width: 100%;
            height: 65%;
            margin-bottom: 8px;
        }

        .book-info .name-book {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .book-info .price {
            color: #e91e63;
            font-size: 18px;
        }

        /* responsive để k bị che khuất thẻ ngoài cùng */
        @media (max-width: 768px) {
            .literature-books {
                grid-template-columns: 1fr 1fr 1fr;
            }
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
                    <li class="categories-item">Newly released books</li>
                    <li class="categories-item">Literature books</li>
                    <li class="categories-item">Economics books</li>
                    <li class="categories-item">Life skills books</li>
                    <li class="categories-item">Health & Lifestyle</li>
                    <li class="categories-item">Children's books</li>
                    <li class="categories-item">Horror books</li>
                </ul>
            </div>
            <img class="poster" src="public/img/Horror-book.png" alt="horror book">
            <div class="best-seller">
                <h2 class="title-type">Bestselling New Books</h2>
                <div class="products-bestSeller">
                    <?php
                    foreach($bookBestSelling as $key => $value) {
                    ?>
                    <div class="product-item-bestSeller">
                        <img class="image-book" src="public/img/<?php echo $value['image_path']?>" alt="image-book">
                        <div class="name-price">
                            <a class="name-book" href="http://localhost/booknest_website/bookController/showBookDetail?book_id=<?php echo $value['book_id'] ?>"><?php echo $value['title']?></a>
                            <p class="price-book"><?php echo $value['price'] . "đ"?></p>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="content-right">
            <!-- Slider -->
            <div class="slider-container">
                <div class="slider">
                    <!-- Clone slide cuối -->
                    <img class="slider-item" src="public/img/slider4.png" alt="Slider 4">

                    <img class="slider-item" src="public/img/slider1.jpg" alt="Slider 1">
                    <img class="slider-item" src="public/img/slider2.png" alt="Slider 2">
                    <img class="slider-item" src="public/img/slider3.png" alt="Slider 3">
                    <img class="slider-item" src="public/img/slider4.png" alt="Slider 4">

                    <!-- Clone slide đầu -->
                    <img class="slider-item" src="public/img/slider1.jpg" alt="Slider 1">
                </div>

                <!-- Nút điều hướng -->
                <div class="slider-control slider-control-prev"><i class="bi bi-arrow-left-circle"></i></div>
                <div class="slider-control slider-control-next"><i class="bi bi-arrow-right-circle"></i></div>

                <!-- Chấm chỉ mục -->
                <div class="slider-pagination">
                    <div class="slider-pagination-dot active"></div>
                    <div class="slider-pagination-dot"></div>
                    <div class="slider-pagination-dot"></div>
                    <div class="slider-pagination-dot"></div>
                </div>
            </div>

            <img class="image-hero" src="public/img/hero.png" alt="hero">

            <div class="literature">
                <h2 class="title-type">Literature Books</h2>
                <div class="literature-books">
                    <?php 
                    $old_book_name = ""; 
                    foreach($LiteratureBooks as $key => $value) { 
                        $new_book_name = $value['title']; 
                        if ($new_book_name === $old_book_name) {
                            continue;
                        }
                        $old_book_name = $new_book_name;
                    ?>
                        <div class="literature-item">
                            <img class="img-book" src="public/img/<?php echo $value['image_path'] ?>" alt="img-book">
                            <div class="book-info">
                                <p class="name-book"><?php echo $value['title'] ?></p>
                                <p class="price"><?php echo $value['price'] . 'đ' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

            <div class="economics">
                <h2 class="title-type">Economics Books</h2>
                <div class="literature-books">
                <?php 
                    $old_book_name = ""; 
                    foreach($EconomicBooks as $key => $value) { 
                        $new_book_name = $value['title']; 
                        if ($new_book_name === $old_book_name) {
                            continue;
                        }
                        $old_book_name = $new_book_name;
                    ?>
                        <div class="literature-item">
                            <img class="img-book" src="public/img/<?php echo $value['image_path'] ?>" alt="img-book">
                            <div class="book-info">
                                <p class="name-book"><?php echo $value['title'] ?></p>
                                <p class="price"><?php echo $value['price'] . 'đ' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="life skills">
                <h2 class="title-type">Life Skills Books</h2>
                <div class="literature-books">
                <?php 
                    $old_book_name = ""; 
                    foreach($LifeSkillsBooks as $key => $value) { 
                        $new_book_name = $value['title']; 
                        if ($new_book_name === $old_book_name) {
                            continue;
                        }
                        $old_book_name = $new_book_name;
                    ?>
                        <div class="literature-item">
                            <img class="img-book" src="public/img/<?php echo $value['image_path'] ?>" alt="img-book">
                            <div class="book-info">
                                <p class="name-book"><?php echo $value['title'] ?></p>
                                <p class="price"><?php echo $value['price'] . 'đ' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>  
            </div>

            <div class="health-lifestyle">
                <h2 class="title-type">Health & Lifestyle</h2>
                <div class="literature-books">
                <?php 
                    $old_book_name = ""; 
                    foreach($HealthLifestyle as $key => $value) { 
                        $new_book_name = $value['title']; 
                        if ($new_book_name === $old_book_name) {
                            continue;
                        }
                        $old_book_name = $new_book_name;
                    ?>
                        <div class="literature-item">
                            <img class="img-book" src="public/img/<?php echo $value['image_path'] ?>" alt="img-book">
                            <div class="book-info">
                                <p class="name-book"><?php echo $value['title'] ?></p>
                                <p class="price"><?php echo $value['price'] . 'đ' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="children's">
                <h2 class="title-type">Children's Books</h2>
                <div class="literature-books">
                <?php 
                    $old_book_name = ""; 
                    foreach($Childrens_books as $key => $value) {
                        $new_book_name = $value['title']; 
                        if ($new_book_name === $old_book_name) {
                            continue;
                        }
                        $old_book_name = $new_book_name;
                    ?>
                        <div class="literature-item">
                            <img class="img-book" src="public/img/<?php echo $value['image_path'] ?>" alt="img-book">
                            <div class="book-info">
                                <p class="name-book"><?php echo $value['title'] ?></p>
                                <p class="price"><?php echo $value['price'] . 'đ' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="horror">
                <h2 class="title-type">Horror Books</h2>
                <div class="literature-books">
                <?php 
                    $old_book_name = ""; 
                    foreach($Horror_books as $key => $value) {
                        $new_book_name = $value['title']; 
                        if ($new_book_name === $old_book_name) {
                            continue;
                        }
                        $old_book_name = $new_book_name;
                    ?>
                        <div class="literature-item">
                            <img class="img-book" src="public/img/<?php echo $value['image_path'] ?>" alt="img-book">
                            <div class="book-info">
                                <p class="name-book"><?php echo $value['title'] ?></p>
                                <p class="price"><?php echo $value['price'] . 'đ' ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
<?php
    require_once './app/views/footer.php';
?>

<script>
    const slider = document.querySelector('.slider');
    const sliderItems = document.querySelectorAll('.slider-item');
    const prevButton = document.querySelector('.slider-control-prev');
    const nextButton = document.querySelector('.slider-control-next');
    const paginationDots = document.querySelectorAll('.slider-pagination-dot');

    let currentIndex = 1; // Bắt đầu từ slide đầu tiên (vị trí gốc)
    const totalSlides = sliderItems.length;

    // Cập nhật slider khi di chuyển
    function updateSlider() {
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    
    // Cập nhật chấm chỉ mục
    paginationDots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex - 1);
    });
    }

    // Chuyển slide tiếp theo
    function nextSlide() {
    if (currentIndex >= totalSlides - 1) {
        // Đến slide clone cuối cùng
        currentIndex = 1; // Reset về slide thực đầu tiên
        slider.style.transition = 'none'; // Tắt hiệu ứng chuyển đổi
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        setTimeout(() => {
        slider.style.transition = 'transform 0.8s ease-in-out'; // Khôi phục hiệu ứng
        nextSlide();
        }, 50);
        return;
    }
    currentIndex++;
    updateSlider();
    }

    // Chuyển slide trước đó
    function prevSlide() {
    if (currentIndex <= 0) {
        // Đến slide clone đầu tiên
        currentIndex = totalSlides - 2; // Reset về slide thực cuối cùng
        slider.style.transition = 'none'; // Tắt hiệu ứng chuyển đổi
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        setTimeout(() => {
        slider.style.transition = 'transform 0.8s ease-in-out'; // Khôi phục hiệu ứng
        prevSlide();
        }, 50);
        return;
    }
    currentIndex--;
    updateSlider();
    }

    // Tự động chạy slider
    let autoSlideInterval = setInterval(nextSlide, 2000);

    // Thêm sự kiện click cho nút
    nextButton.addEventListener('click', () => {
    nextSlide();
    resetAutoSlide();
    });

    prevButton.addEventListener('click', () => {
    prevSlide();
    resetAutoSlide();
    });

    // Reset thời gian chạy khi thao tác
    function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(nextSlide, 2000);
    }

    // Khởi chạy slider
    updateSlider();

</script>
</body>
</html>