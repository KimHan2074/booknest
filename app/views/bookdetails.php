<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <title>BookDetails</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F9F5EE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: auto;
        }

        .book-details-container {
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            background: #F9F5EE;
            padding: 20px;
            max-width: 900px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
        }

        .images-details-wrapper {
            display: flex;
            gap: 70px;
            flex-wrap: wrap;
            display: flex;
        }

        .images-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .large-image img {
            max-width: 300px;
            max-height: 400px;
            object-fit: cover;
        }

        .small-image {
            display: flex;
            gap: 30px;
        }

        .small-book-image {
            width: 60px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .small-book-image:hover {
            transform: scale(1.1);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #000000;
            padding-top: 30px;
        }

        .details-wrapper {
            display: flex;
            flex-direction: column;
            gap: 50px;
            flex: 1;
        }
        .price-quantity-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price {
            font-size: 18px;
            display: flex;
            gap: 10px;
        }

        .original-price {
            text-decoration: line-through;
            color: #888;
            font-weight: bold;
        }

        .discounted-price {
            color: #F30B0B;
            font-weight: bold;
        }

        .quantity-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-buttons {
            display: flex;
            padding-right: 80px ;
            gap: 10px;
        }

        .quantity-input {
            width: 30px;
            text-align: center;
            padding: 5px;
            border: 1px solid  #F9F5EE;
            border-radius: 3px;
        }
        
    </style>
</head>
<body>
<div class="book-details-container">
        <div class="images-details-wrapper">
            <!-- Hình ảnh sách -->
            <div class="images-wrapper">
                <div class="large-image">
                    <img src="https://product.hstatic.net/200000845405/product/1_1fde89db729544a5935dd9e06b471dcc_master.jpg" alt="Book Cover" class="book-image">
                </div>
                <div class="small-image">
                    <img src="https://product.hstatic.net/200000845405/product/1_1fde89db729544a5935dd9e06b471dcc_master.jpg" alt="Small Image 1" class="small-book-image">
                    <img src="https://product.hstatic.net/200000845405/product/2_79ee8dc03e08420fb76cd27407a0818b_master.jpg" alt="Small Image 2" class="small-book-image">
                    <img src="https://product.hstatic.net/200000845405/product/3_694ddc374ca645378bcffe9d381c5849_master.jpg" alt="Small Image 3" class="small-book-image">
                </div>
            </div>
            <div class="details-wrapper">
                <div class="title">Everyone is a wounded child behind an adult shell</div>
                <div class="price-quantity-wrapper">
                    <div class="price">
                        <span class="original-price">30,000đ</span>
                        <span class="discounted-price">27,000đ</span>
                    </div>
                    <div class="quantity-wrapper">
                        <label for="quantity">Quantity:</label>
                        <div class="quantity-buttons">
                            <button class="btn-decrement">-</button>
                            <button class="quantity-input" id="quantity">1</button>
                            <button class="btn-increment">+</button>
                        </div>
                    </div>
                </div>

</body>
</html>