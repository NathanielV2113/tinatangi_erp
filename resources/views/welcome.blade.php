<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous"
  />
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

    /* Compact and centered card container */
    .card-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      width: 90%;
      max-width: 700px;
      margin-right: 30px;
    }

    /* Left image styling */
    .column-fit {
      height: 100%;
      object-fit: cover;
      border-top-left-radius: 1rem;
      border-bottom-left-radius: 1rem;
    }

    /* Fix the left image column width */
    @media (min-width: 768px) {
      .image-column {
        flex: 0 0 150px !important;
        max-width: 150px !important;
      }
    }

    /* Card styling */
    .card {
      background-color: #fff2e1;
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

    /* Checkbox container styling */
    .checkbox-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 5px;
    }

    .form-check-label {
      font-size: 14px;
      margin-left: 5px;
    }

    /* Error message styling */
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 3px;
    }

    /* Adjusted margins and paddings for compact layout */
    /* Top: 1rem, Right: 0, Bottom: 1rem, Left: 5rem; plus a negative right margin to reduce space further */
    .card-body {
      padding: 1rem 0 1rem 5rem;
      margin-right: -1rem;
    }

    h5 {
      margin-bottom: 0.5rem;
    }

    .form-group {
      margin-bottom: 0.5rem;
    }

    .login-btn {
      padding: 0.5rem;
      margin-top: 0.3rem;
      margin-bottom: 0.5rem;
    }
  </style>
</head>

<body>
  <div class="card-container">
    <div class="card">
      <div class="row no-gutters">
        <!-- Left image column (retained but treated as independent) -->
        <div class="col-md-5 image-column d-none d-md-block">
          <img src="./images/tinangi.jpg" alt="Login form" class="img-fluid rounded-start column-fit">
        </div>
        <!-- Right column with centered content -->
        <div class="col-md-7 d-flex align-items-center justify-content-center">
          <div class="card-body text-black">
            <form id="loginForm" onsubmit="return validateAndRedirect()">
              <h5 class="fw-normal text-center">Sign into your Account</h5>
              <!-- Email input -->
              <div class="form-group">
                <label for="emailInput" class="d-block">Email Address</label>
                <input type="text" id="emailInput" class="form-control" pattern="[a-zA-Z0-9.@]+"
                  title="Only letters, numbers, periods, and '@' are allowed">
                <div id="emailError" class="error-message" style="display: none;">Email is required.</div>
              </div>
              <!-- Password input -->
              <div class="form-group">
                <label for="passwordInput" class="d-block">Password</label>
                <input type="password" id="passwordInput" class="form-control">
                <div id="passwordError" class="error-message" style="display: none;">Password is required.</div>
              </div>
              <!-- Checkbox -->
              <div class="checkbox-container">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMeCheckbox">
                  <label class="form-check-label" for="rememberMeCheckbox">Remember Me</label>
                </div>
              </div>
              <!-- Login button -->
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
      // Redirect if form is valid
      if (isValid) {
        window.location.href = "{{route('otp')}}";
      }
      return false; // Prevent actual form submission
    }
  </script>
</body>

</html>
