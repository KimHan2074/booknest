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
        }

        /* Bố cục container */
        .book-details-container {
            display: flex;
            flex-direction: column;
            background: #F9F5EE;
            padding: 10px;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
        }

        .images-details-wrapper {
            display: flex;
            gap: 70px;
        }

        .images-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .large-image img {
            max-width: 300px;
            max-height: 400px;
        }

        .small-image {
            display: flex;
            gap: 30px;
        }

        .small-book-image {
            width: 60px;
            cursor: pointer;
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

</body>
</html>