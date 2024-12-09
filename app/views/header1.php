<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookNest Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- link font chữ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header Styling */
        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color:#DEE3E5;
            font-family: "Inter", sans-serif;
        }

        /*logo brand*/
        .logo-brand {
            display: flex;
            align-items: center;
            margin-left: 40px;
        }

        .logo {
            width: 75px;
            height: 60px;
            margin-right: 10px;
        }

        .brand-name {
            font-size: 40px;
            color: #815C5C;
            font-weight: normal;
        }

        /* Navigation Links */
        .nav {
            display: flex;
            align-items: center;
            cursor: pointer;
            list-style: none;
            margin-left: 600px;
        }
        .nav-link {
            margin: 0 28px;
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
            bottom: -11.5px;
            left: 0;
            right: 0;
            height: 3.5px;
            background-color:#815C5C; 
            border-radius: 8px;
        }
        /* style of right header */
        .right-header{
            display: flex;
            gap: 40px;
            color: #815C5C;
            margin-left: 90px;
        }
        .icon-cart, .icon-user{
            font-size: 26px;
        }
        .log-out{
            font-size: 22px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-brand">
            <img src="Logo.png" alt="BookNest Logo" class="logo">
<h1 class="brand-name">BookNest</h1>
        </div>
        <ul class="nav">
            <li class="nav-link active"><a href="#">Home</a></li>
            <li class="nav-link"><a href="#">Search</a></li>
        </ul>
        <div class="right-header">
            <div class="iconCart"><i class="fa-solid fa-cart-shopping icon-cart"></i></div>
            <div class="iconUser"><i class="fa-solid fa-user icon-user"></i></div>
            <div class="log-out">Log out</div>
        </div>
    </header>

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