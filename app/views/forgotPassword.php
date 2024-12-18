<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Form</title>
  <style>
    /* General Styling */
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Inter",sans-serif;
      background-color: #f8f5ef;
      color: #5e3927;
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

    .form-container {
      position: relative;
      background-color: #fefbf6;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
      display: none;
    }

    .form-title {
      text-align: center;
      margin-bottom: 20px;
      font-size: 25px;
    }

    .form-label {
      margin-bottom: 8px;
      font-weight: bold;
      font-size: 15px;
      display: block;
    }

    .form-input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #c3a89f;
      border-radius: 5px;
    }

    .form-btn {
      width: 100%;
      padding: 10px;
      background-color: #5e3927;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .form-btn:hover {
      background-color: #3e2519;
      transform: scale(1.03);
    }
    .close-btn {
      position: absolute;
      top: 5px;
      right: 5px;
      background: none;
      border: none;
      font-size: 25px;
      color: #8b5e3c;
      cursor: pointer;
      transition: color 0.3s ease, transform 0.2s ease;
    }

    .close-btn:hover {
      color: #5e3927;
      transform: scale(1.2);
    }
  </style>
</head>
<body>
  <!-- Overlay -->
  <div id="overlay"></div>

  <!-- Reset Password Form -->
  <div id="reset-container">
    <button id="close-btn" type="button">&times;</button>
    <h1 id="reset-title">Reset Password</h1>
    <form id="reset-form" action="/booknest_website/userController/forgetPastword" method="POST">
      <label id="email-label" for="email-input">Email</label>
      <input id="email-input" type="email" name="email" placeholder="Enter your email" required>
      <button id="reset-btn" type="submit">Submit</button>
  <div id="reset-container" class="form-container" style="display: block;">
    <button id="close-btn-reset" class="close-btn" type="button">&times;</button>
    <h1 class="form-title">Reset Password</h1>
    <form id="reset-form">
      <label class="form-label" for="email-input">Email</label>
      <input id="email-input" class="form-input" type="email" placeholder="Enter your email" required>
      <button id="reset-btn" class="form-btn" type="submit">Send</button>
    </form>
  </div>

  <!-- Code Verification Form -->
  <div id="code-container" class="form-container">
    <button id="close-btn-code" class="close-btn" type="button">&times;</button>
    <h1 class="form-title">Enter Verification Code</h1>
    <form id="code-form">
      <label class="form-label" for="code-input">Verification Code</label>
      <input id="code-input" class="form-input" type="text" placeholder="Enter the code" required>
      <button id="code-btn" class="form-btn" type="submit">Send</button>
    </form>
  </div>

  <!-- Change Password Form -->
  <div id="change-container" class="form-container">
    <button id="close-btn-change" class="close-btn" type="button">&times;</button>
    <h1 class="form-title">Change Password</h1>
    <form>
      <label class="form-label" for="password-input">New Password</label>
      <input id="password-input" class="form-input" type="password" placeholder="Enter your new password" required>
      <button id="change-btn" class="form-btn" type="submit">Save</button>
    </form>
  </div>

  <script>
    // Get elements
    const resetForm = document.getElementById('reset-form');
    const codeForm = document.getElementById('code-form');

    const resetContainer = document.getElementById('reset-container');
    const codeContainer = document.getElementById('code-container');
    const changeContainer = document.getElementById('change-container');
    const overlay = document.getElementById('overlay');

    const closeButtons = document.querySelectorAll('.close-btn');

    // Event: Submit Reset Form
    resetForm.addEventListener('submit', function(event) {
      event.preventDefault();
      resetContainer.style.display = 'none';
      codeContainer.style.display = 'block';
      overlay.style.display = 'block';
    });

    // Event: Submit Code Form
    codeForm.addEventListener('submit', function(event) {
      event.preventDefault();
      codeContainer.style.display = 'none';
      changeContainer.style.display = 'block';
    });
    // Khi nhấn Submit ở form reset password
    document.getElementById('reset-form').addEventListener('submit', function(event) {
      // event.preventDefault();

      // Hiển thị form thay đổi mật khẩu và overlay
      document.getElementById('change-container').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('reset-container').style.display = 'none'; // Ẩn form reset password
    });

    // Event: Close buttons
    closeButtons.forEach(button => {
      button.addEventListener('click', () => {
        resetContainer.style.display = 'none';
        codeContainer.style.display = 'none';
        changeContainer.style.display = 'none';
        overlay.style.display = 'none';
      });
    });
  </script>
</body>
</html>
