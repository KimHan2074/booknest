<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link rel="stylesheet" href="../public/css/book_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>BookDetails</title>
</head>
<body>
<?php
require_once 'header.php';
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
                    <span class="original-price"><?php echo number_format($value['price'], 0, '', '.') . 'đ'; ?></span> 
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
require_once 'footer.php';
?>
</body>
</html>