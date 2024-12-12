<header class="header">
    <div class="logo-brand">
        <img src="public/img/image.png" alt="BookNest Logo" class="logo">
        <h1 class="brand-name"><a href="http://localhost/booknest_website/">BookNest</a></h1>
    </div>
    <ul class="navigation">
        <li class="nav-link active"><a href="http://localhost/booknest_website/">Home</a></li>
        <li class="nav-link"><a href="#">Search</a></li>
    </ul>
    <div class="right-header">
        <div class="iconCart"><i class="fa-solid fa-cart-shopping icon-cart"></i></div>
        <div class="iconUser"><i class="fa-solid fa-user icon-user"></i></div>

        <button class="sign-up">Sign Up</button>
        <button class="log-in">Log In</button>
        
        <div class="log-out">Log Out</div>
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
