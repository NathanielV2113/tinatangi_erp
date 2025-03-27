<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <title>Tinatangi</title>
  <style>
    /* Full-page background */
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background: url('./images/bg5.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }

    /* Smaller and centered card container with reduced max-width */
    .card-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      width: 90%;
      max-width: 600px;
    }

    /* Left image inside the card */
    .column-fit {
      height: 100%;
      object-fit: cover;
      border-top-left-radius: 1rem;
      border-bottom-left-radius: 1rem;
    }

    /* Logo styling */
    .custom-image {
      width: 200px;
      height: auto;
      display: block;
      margin: 5px auto; /* Reduced margin */
    }

    /* Card styling */
    .card {
      background-color: rgba(255, 255, 255, 0.85);
      border-radius: 1rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Input field styling */
    .form-control {
      border-radius: 10px;
      border: 1px solid #ccc;
      box-shadow: none;
      transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
      border: 2px solid #007bff;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Styling for checkbox container */
    .checkbox-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 5px; /* Reduced margin */
    }

    .form-check-label {
      font-size: 14px;
      margin-left: 5px;
    }

    /* Error message styling */
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 3px; /* Smaller margin */
    }

    /* Adjusted vertical margins and paddings for a more compact form */
    .card-body {
      padding: 1rem; /* Reduced padding */
    }

    h5 {
      margin-top: 0;
      margin-bottom: 0.5rem; /* Reduced heading margin */
    }

    .form-group {
      margin-bottom: 0.5rem; /* Reduced margin between form groups */
    }

    .login-btn {
      padding: 0.5rem;
      margin-top: 0.3rem;
      margin-bottom: 0.5rem;
    }
  </style>
</head>

<body>
  <!-- Foreground Content -->
  <div class="card-container">
    <div class="card">
      <div class="row g-0">
        <!-- Left image -->
        <div class="col-md-6 col-lg-5 d-none d-md-block">
          <img src="./images/tinangi.jpg" alt="Login form" class="img-fluid rounded-start column-fit">
        </div>
        <!-- Login form -->
        <div class="col-md-6 col-lg-7 d-flex align-items-center">
          <div class="card-body text-black">
            <form id="loginForm" onsubmit="return validateAndRedirect()">
              <!-- Logo -->
              <div class="text-center mb-1">
                <img src="./images/tinatangilogo.png" class="img-fluid custom-image" alt="Logo">
              </div>
              <h5 class="fw-normal text-center">Sign into your Account</h5>
              <!-- Email input -->
              <div class="form-group">
                <label for="emailInput" class="form-label">Email Address</label>
                <input type="text" id="emailInput" class="form-control" pattern="[a-zA-Z0-9.@]+" title="Only letters, numbers, periods, and '@' are allowed">
                <div id="emailError" class="error-message" style="display: none;">Email is required.</div>
              </div>
              <!-- Password input -->
              <div class="form-group">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" id="passwordInput" class="form-control">
                <div id="passwordError" class="error-message" style="display: none;">Password is required.</div>
              </div>
              <!-- Checkboxes (Remember Me and Show Password) -->
              <div class="checkbox-container">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMeCheckbox">
                  <label class="form-check-label" for="rememberMeCheckbox">Remember Me</label>
                </div>
                <!-- Show Password (currently commented out) -->
                <!--
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="showPasswordCheckbox" onclick="togglePassword()">
                  <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                </div>
                -->
              </div>
              <!-- Login Button -->
              <div class="pt-1">
                <button class="btn btn-dark btn-lg btn-block login-btn" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Toggle the visibility of the password (if enabled)
    function togglePassword() {
      const passwordInput = document.getElementById('passwordInput');
      const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
      if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    }

    // Form validation and redirection function
    function validateAndRedirect() {
      let isValid = true;
      const emailInput = document.getElementById('emailInput');
      const emailError = document.getElementById('emailError');
      if (emailInput.value.trim() === '') {
        emailError.style.display = 'block';
        isValid = false;
      } else {
        emailError.style.display = 'none';
      }
      const passwordInput = document.getElementById('passwordInput');
      const passwordError = document.getElementById('passwordError');
      if (passwordInput.value.trim() === '') {
        passwordError.style.display = 'block';
        isValid = false;
      } else {
        passwordError.style.display = 'none';
      }
      if (isValid) {
        window.location.href = "{{route('otp')}}";
      }
      return false; // Prevent default form submission
    }

    // Remaining helper functions (checkInput, showOtpPopup, moveToNext, verifyOtp) remain unchanged...
    function checkInput() {
      const emailInput = document.getElementById("emailInput");
      const notification = document.getElementById("notification");
      const regex = /^[a-zA-Z0-9.@]*$/;
      if (!regex.test(emailInput.value)) {
        notification.style.display = "block";
      } else {
        notification.style.display = "none";
      }
    }

    function showOtpPopup() {
      const otpModal = new bootstrap.Modal(document.getElementById("otpModal"));
      otpModal.show();
    }

    function moveToNext(current, nextFieldId) {
      if (current.value.length === current.maxLength && nextFieldId) {
        document.getElementById(nextFieldId).focus();
      }
    }

    function verifyOtp() {
      const otp1 = document.getElementById("otp1").value;
      const otp2 = document.getElementById("otp2").value;
      const otp3 = document.getElementById("otp3").value;
      const otp4 = document.getElementById("otp4").value;
      const otp = otp1 + otp2 + otp3 + otp4;
      if (otp.length === 4) {
        alert("OTP Entered: " + otp);
      } else {
        alert("Please enter a valid 4-digit OTP.");
      }
    }
  </script>
</body>

</html>
