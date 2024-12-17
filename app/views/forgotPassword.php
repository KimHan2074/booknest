<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password Form</title>
  <style>
    /* form enter mail */
    .reset-form-body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      background-color: #f8f5ef;
      color: #5e3927;
    }
    #reset-container {
      position: relative;
      background-color: #fefbf6;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
    }
    #close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      font-size: 20px;
      color: #5e3927;
      cursor: pointer;
    }
    #reset-title {
      text-align: center;
      margin-bottom: 20px;
      font-size: 25px;
    }
    #email-label {
      margin-bottom: 8px;
      font-weight: bold;
      font-size: 15px;
      display: block;
    }
    #email-input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #c3a89f;
      border-radius: 5px;
    }
    #reset-btn {
      width: 100%;
      padding: 10px;
      background-color: #5e3927;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    #reset-btn:hover {
      background-color: #3e2519;
      transform: scale(1.03);
    }
    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color:  #f8f5ef;
      display: none;
    }
    /* Form change password */
    .change-form-body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      background-color: #f8f5ef;
      color: #5e3927;
    }
    #change-container {
      position: relative;
      background-color: #fefbf6;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
      display: none; 
    }
    #change-title {
      text-align: center;
      margin-bottom: 20px;
      font-size: 25px;
    }
    #password-label,
    #confirm-password-label {
      margin-bottom: 8px;
      font-weight: bold;
      font-size: 15px;
      display: block;
    }
    #password-input,
    #confirm-password-input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #c3a89f;
      border-radius: 5px;
    }
    #change-btn {
      width: 100%;
      padding: 10px;
      background-color: #5e3927;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }
    #change-btn:hover {
      background-color: #3e2519;
      transform: scale(1.03);
    }
  </style>
</head>
<body class="reset-form-body">
  <!-- Overlay to dim the background -->
  <div id="overlay"></div>

  <!-- Reset Password Form -->
  <div id="reset-container">
    <button id="close-btn" type="button">&times;</button>
    <h1 id="reset-title">Reset Password</h1>
    <form id="reset-form">
      <label id="email-label" for="email-input">Email</label>
      <input id="email-input" type="email" placeholder="Enter your email" required>
      <button id="reset-btn" type="submit">Submit</button>
    </form>
  </div>

  <!-- Change Password Form -->
  <div id="change-container">
    <button id="close-btn" type="button">&times;</button>
    <h1 id="change-title">Change Password</h1>
    <form>
      <label id="password-label" for="password-input">New Password</label>
      <input id="password-input" type="password" placeholder="Enter your new password" required>

      <label id="confirm-password-label" for="confirm-password-input">Confirm Password</label>
      <input id="confirm-password-input" type="password" placeholder="Confirm your new password" required>

      <button id="change-btn" type="submit">Submit</button>
    </form>
  </div>

  <script>
    // Khi nhấn Submit ở form reset password
    document.getElementById('reset-form').addEventListener('submit', function(event) {
      event.preventDefault();

      // Hiển thị form thay đổi mật khẩu và overlay
      document.getElementById('change-container').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('reset-container').style.display = 'none'; // Ẩn form reset password
    });

    // Đóng form (close button)
    document.querySelectorAll('#close-btn').forEach(function(button) {
      button.addEventListener('click', function() {
        document.getElementById('change-container').style.display = 'none';
        document.getElementById('reset-container').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
      });
    });
  </script>
</body>
</html>