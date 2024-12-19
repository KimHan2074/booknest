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
    <?php include 'header.php'; ?>
    <div class="book-details-container">
        <div class="images-details-wrapper">
            <!-- Hình ảnh sách -->
            <div class="images-wrapper">
                <?php
                $counter = 0;
                foreach ($bookById as $key => $value) {
                    if ($counter == 0) { ?>
                        <div class="large-image">
                            <img src="../public/img/<?php echo $value['image_path']; ?>" alt="Book Cover" class="book-image">
                        </div>
                    <?php } elseif ($counter == 1) { ?>
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
                <?php foreach ($bookById as $key => $value) { ?>

                    <div class="title"><?php echo $value['title'] ?></div>
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
                            <li><strong>Author: </strong><?php echo $value['author'] ?></li>
                            <li><strong>Stock: </strong><?php echo $value['stock'] ?></li>
                        </ul>
                    </div>
            </div>
        </div>
        <!-- Mô tả chi tiết -->
        <div class="descriptions">
            <p>Description</p>
            <div class="description-content describe">
                <p><?php echo $value['description'] ?></p>
            </div>
        </div>
    <?php break;
                } ?>
    <!-- Sách cùng thể loại -->
    <div class="same-genre">
        <div class="same-genre-title">Books in the same genre</div>
        <div class="genre-books">
            <?php foreach ($bookHasTheSameType as $key => $value) { ?>
                <div class="genre-book">
                    <img src="../public/img/<?php echo $value['image_path'] ?>" alt="Book 1">
                    <a class="name-book genre-book-title" href="/booknest_website/bookController/showBookDetail?book_id=<?php echo $value['book_id']; ?>"><?php echo $value['title']; ?></a>
                    <div class="genre-book-price"><?php echo number_format($value['price'], 0, '', '.') . 'đ'; ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        const tabs = document.querySelectorAll(".nav-link");
        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                tabs.forEach((t) => {
                    t.classList.remove("active");
                });
                tab.classList.add("active");
            });
        });
    </script>
</body>

</html>