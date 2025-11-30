<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Landing Page</title>
  <link rel="shortcut icon" type="image/png" href="./BS/assets/images/logos/logotugas3.png" />
  <link rel="stylesheet" href="./BS/assets/css/styles.min.css" />
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

  <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'Poppins';
    }
    
    :root {
        --main-color: #FF6D1F;
    }

    .theme-text {
        color: var(--main-color);
    }

    .navbar-brand {
        color: var(--main-color) !important;
    }

    .navbar-nav {
        gap: 10px;
    }

    .act {
        color: var(--main-color) !important;
        border-bottom: 1px solid var(--main-color);
    }

    .navbar ul li a:hover {
        color: var(--main-color) !important;
        border-bottom: 1px solid var(--main-color);
    }

    .header {
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0 ,0 , 0.6)), url("./BS/assets/images/backgrounds/nerdy.jpg");
        width: 100%;
        height: 100vh;
        background-position: center;
        background-size: cover;
        position: relative;
    }

    .wave {
        position: absolute;
        bottom: 0px;
    }

    .middle {
        height: 80vh;
        width: 80%;
        display: flex;
        justify-content: start;
        align-items: center;
    }
    
    .middle h1 {
        font-size: 50px;
        font-weight: bold;
    }
  </style>
</head>

<body>
  <section class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> &nbsp; EduData</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link act" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link act" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">Kembali</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="middle">
            <h1 class="text-white display-3">Mengatur Data, <span class="theme-text"> Meningkatkan Kinerja</span></h1>
        </div>
        
    </div>

  
  </section>
  <script src="./BS/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./BS/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./BS/assets/js/sidebarmenu.js"></script>
  <script src="./BS/assets/js/app.min.js"></script>
  <script src="./BS/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

  <script>
  window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
      // halaman di-load  reload halaman agar logout muncul
      window.location.reload();
    }
  });
</script>
</body>

</html><?php /**PATH C:\xamppe\htdocs\ProjectUasMapil\resources\views/landing.blade.php ENDPATH**/ ?>