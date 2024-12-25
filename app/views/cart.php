<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is cart page</h1>
    <?php if (isset($_SESSION['flash_message'])): ?>
        <script>
            Swal.fire({
                title: "<?php echo $_SESSION['flash_message']['type'] === 'success' ? 'Thành công!' : 'Thất bại!'; ?>",
                text: "<?php echo $_SESSION['flash_message']['message']; ?>",
                icon: "<?php echo $_SESSION['flash_message']['type']; ?>",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>
</body>
</html>