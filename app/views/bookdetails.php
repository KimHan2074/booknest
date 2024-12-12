<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <title>BookDetails</title>
    <style>
         body {
            font-family: "Inter", sans-serif;
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
            margin-top: 700px;
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

        /* Phần chi tiết sách */
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
        }

        .original-price {
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

        /* Nút bấm */
        .button-wrapper {
            display: flex;
            gap: 200px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .add-to-cart {
            background-color: #D8B99C;
            color: white;
        }

        .add-to-cart:hover {
            background-color: #815C5C;
        }

        .buy-now {
            background-color: #D8B99C;
            color: white;
        }

        .buy-now:hover {
            background-color: #815C5C;
        }

        /* Mô tả chi tiết sách */
        .description ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .description li {
            margin-bottom: 15px;
            font-size: 16px;
        }

        /* phần tiêu đề descible */
        .descriptions {
            font-size: 28px;
            font-weight: bold;
            color: black;
            text-align: center;
            padding: 10px 30px;
            background-color: #FAFAFA;
            margin-top: 50px;
            box-sizing: border-box;
        }

        /* Phần mô tả nội dung sách*/
        .describe {
            padding: 20px;
            background-color: #D9D9D9;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Sách cùng thể loại */
        .same-genre {
            margin-top: 50px;
        }
        
         /* Đường ngang cho tiêu đề */
         .same-genre-title::before,
        .same-genre-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: black;
            margin: 0 5px;
        }

        .same-genre-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .genre-books {
            display: flex;
            gap: 40px;
            justify-content: center; 
        }

        .genre-book {
            width: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
        }

        /* Hình ảnh sách */
        .genre-book img {
            max-width: 100%;
            max-height: 100%;
            transition: transform 0.2s;
        }

        .genre-book-title {
            font-size: 14px;
            color: #333;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    
        .genre-book-price {
            font-size: 16px;
            color: #F30B0B;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
<?php
// require_once 'header.php';
?>
<div class="book-details-container">
    <div class="images-details-wrapper">
        <!-- Hình ảnh sách -->
        <div class="images-wrapper">
        <?php
            $counter = 0; 
            foreach($bookById as $key => $value) { 
                if ($counter == 0) { ?>
                    <div class="large-image">
                        <img src="../public/img/<?php echo $value['image_path']; ?>" alt="Book Cover" class="book-image">
                    </div>
                <?php }
                elseif ($counter == 1) { ?>
                    <div class="small-image">
                        <img src="../public/img/<?php echo $value['image_path']; ?>" alt="Small Image 1" class="small-book-image">
                    </div>
                <?php }
                $counter++;
                if ($counter >= 2) break;
            }
            ?>
        </div>
        <!-- Chi tiết sách -->
        <div class="details-wrapper">
        <?php foreach($bookById as $key => $value) { ?>

        <div class="title"><?php echo $value['title']?></div>
            <div class="price-quantity-wrapper">
                <div class="price">
                    <span class="original-price">30,000đ</span>  
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
        <!-- nút bấm -->
            <div class="button-wrapper">
                <button class="btn add-to-cart">Add to cart</button>
                <button class="btn buy-now">Buy now</button>
            </div>
            <div class="description">
                <ul>
                    <li><strong>Book code:</strong> 2651656</li>
                    <li><strong>Author:</strong> Gege Akutami</li>
                    <li><strong>Dimension:</strong> 11.3 × 17.6 cm</li>
                    <li><strong>Number of pages:</strong> 192</li>
                    <li><strong>Format:</strong> Paperback</li>
                    <li><strong>Weight:</strong> 140 grams</li>
                    <li><strong>Book series:</strong> Wartime Spells</li>
                </ul>
            </div>
        </div>
        <?php break; } ?>
    </div>
    <!-- Mô tả chi tiết -->
    <div class="descriptions">Describe</div>
        <div class="describe">
        Everyone is a wounded child behind an "adult" shell.
        The book synthesizes stories of adults and youth's emotions from the aspects of family affection, love, learning, life attitude, personality formation,... to give readers a feeling of It's like I'm looking back at the journey I've taken and determined to move forward.
        Along with the rush and stumbles, along the way there are also different joys and sorrows, unpredictable separations, in the end we will enrich ourselves and shake hands with the world as adults. This is the only way to grow up, this is our youth and golden age.
        </div>
    <!-- Sách cùng thể loại -->
    <div class="same-genre">
        <div class="same-genre-title">Books in the same genre</div>
        <div class="genre-books">
            <div class="genre-book">
                <img src="https://product.hstatic.net/200000845405/product/1_8744256e014c42b3bf90faa8b6fce294_medium.jpg" alt="Book 1">
                <div class="genre-book-title">Làm Người Dịu Dàng Vượt Ngàn Chông Gai</div>
                <div class="genre-book-price">22,500đ</div>
            </div>
            <div class="genre-book">
                <img src="https://product.hstatic.net/200000845405/product/1_7d8b8f4316de4d2292dfd9e6b42427d9_master.jpg" alt="Book 2">
                <div class="genre-book-title">Làm Người Dịu Dàng Vượt Ngàn Chông Gai</div>
                <div class="genre-book-price">22,500đ</div>
            </div>
            <div class="genre-book">
                <img src="https://product.hstatic.net/200000845405/product/1_26512050088c4910823d5a2b40c46670_master.jpg" alt="Book 3">
                <div class="genre-book-title">Làm Người Dịu Dàng Vượt Ngàn Chông Gai</div>
                <div class="genre-book-price">22,500đ</div>
            </div>
            <div class="genre-book">
                <img src="https://product.hstatic.net/200000845405/product/1_0942ffa40867432f95a73971afef6039_medium.jpg" alt="Book 4">
                <div class="genre-book-title">Làm Người Dịu Dàng Vượt Ngàn Chông Gai</div>
                <div class="genre-book-price">22,500đ</div>
            </div>
        </div>
    </div>
</div>
<?php
// require_once 'footer.php';
?>
</body>
</html>