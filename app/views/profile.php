<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .wrapper {
      font-family: "Inter", sans-serif;
      background-color: #F9F5EE;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100vw;
      height: 100vh;
    }
    .profile-container {
      background: #F9F5EE;
      padding: 20px 30px;
      border-radius: 8px;
      width: 650px;
      text-align: center;
    }
    .profile-title {
      margin-bottom: 20px;
      color: #5b3d33;
    }
    .profile-group {
      margin-bottom: 30px;
      text-align: left;
    }
    .profile-label {
      display: block;
      margin-bottom: 5px;
      color: #5b3d33;
      font-size: 14px;
      font-weight: bold;
    }
    .profile-label i {
      margin-right: 8px;
      color: #5b3d33;
    }
    .profile-input {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #815C5C;
      border-radius: 5px;
      outline: none;
      background-color: white;
    }
    .profile-input:focus {
      border-color: #F9F5EE;
    }
    .profile-button {
      background-color: #c29d8e;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .profile-button:hover {
      background-color: #815C5C;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="profile-container">
      <h2 class="profile-title">Personal Information</h2>
      <form>
        <?php foreach ($bookById as $key => $value) { ?>
          <div class="profile-group">
            <label class="profile-label" for="username"><i class="fas fa-user"></i> User name</label>
            <input class="profile-input" type="text" id="username" placeholder="Enter your name" value="<?php echo htmlspecialchars($value['username']); ?>">
          </div>
          <div class="profile-group">
            <label class="profile-label" for="email"><i class="fas fa-envelope"></i> Email</label>
            <input class="profile-input" type="email" id="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($value['email']); ?>">
          </div>
          <div class="profile-group">
            <label class="profile-label" for="phone"><i class="fas fa-phone"></i> Phone</label>
            <input class="profile-input" type="tel" id="phone" placeholder="Enter your phone">
          </div>
          <div class="profile-group">
            <label class="profile-label" for="password"><i class="fas fa-lock"></i> Password</label>
            <input class="profile-input" type="password" id="password" placeholder="Enter your password" value="<?php echo htmlspecialchars($value['password']); ?>">
          </div>
          <button class="profile-button" type="submit">Update</button>
        <?php break;
          } ?>
      </form>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>