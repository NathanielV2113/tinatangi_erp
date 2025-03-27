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
            /* Replace 'bg.jpg' with your image path */
            background-size: cover;
            /* Ensure the image covers the screen */
            position: relative;
        }

        /* Foreground container for the card */
        .card-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            /* Ensures it’s above the background */
            width: 100%;
            max-width: 1000px;
            /* Increased width */
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
            margin: 10px auto;
        }

        /* Card styling */
        .card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Input field styling with increased border-radius */
        .form-control {
            border-radius: 10px;
            /* Adjusted the radius for a smoother appearance */
            border: 1px solid #ccc;
            box-shadow: none;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            border: 2px solid #007bff;
            /* Blue border on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Optional glow effect */
        }

        /* Styling for checkbox container */
        .checkbox-container {
            display: flex;
            justify-content: space-between;
            /* Align Remember Me to left and Show Password to right */
            align-items: center;
            margin-top: 10px;
            /* Adds spacing below the input box */
        }

        .form-check-label {
            font-size: 14px;
            margin-left: 5px;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
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
                    <img src="./images/tinangi.jpg" alt="Login form" class="img-fluid rounded-start column-fit" />
                </div>
                <!-- Login form -->
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <form id="loginForm" onsubmit="return validateAndRedirect()">
                            <!-- Logo -->
                            <div class="d-flex align-items-center justify-content-center mb-3 pb-1">
                                <img src="./images/tinatangilogo.png" class="img-fluid custom-image" alt="Logo" />
                            </div>
                            <h5 class="fw-normal mb-3 pb-3 text-center">Sign into your Account</h5>

                            <!-- Email input -->
                            <div class="form-group mb-4">
                                <label for="emailInput" class="form-label">Email Address</label>
                                <input
                                    type="text"
                                    id="emailInput"
                                    class="form-control form-control-lg"
                                    pattern="[a-zA-Z0-9.@]+"
                                    title="Only letters, numbers, periods, and '@' are allowed" />
                                <div id="emailError" class="error-message" style="display: none;">Email is required.</div>
                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-4">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input
                                    type="password"
                                    id="passwordInput"
                                    class="form-control form-control-lg" />
                                <div id="passwordError" class="error-message" style="display: none;">Password is required.</div>
                            </div>

                            <!-- Checkboxes (Remember Me and Show Password) -->
                            <div class="checkbox-container">
                                <!-- Remember Me -->
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="rememberMeCheckbox" />
                                    <label class="form-check-label" for="rememberMeCheckbox">Remember Me</label>
                                </div>

                                <!-- Show Password -->
                                <!-- <div class="form-check">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="showPasswordCheckbox"
                                        onclick="togglePassword()" />
                                    <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
                                </div> -->
                            </div>

                            <!-- Login Button -->
                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle the visibility of the password
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text'; // Show the password
            } else {
                passwordInput.type = 'password'; // Hide the password
            }
        }

        // Form validation and redirection function
        function validateAndRedirect() {
            let isValid = true;

            // Email validation
            const emailInput = document.getElementById('emailInput');
            const emailError = document.getElementById('emailError');
            if (emailInput.value.trim() === '') {
                emailError.style.display = 'block';
                isValid = false;
            } else {
                emailError.style.display = 'none';
            }

            // Password validation
            const passwordInput = document.getElementById('passwordInput');
            const passwordError = document.getElementById('passwordError');
            if (passwordInput.value.trim() === '') {
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Redirect to otp.html if valid
            if (isValid) {
                window.location.href = "{{route('otp')}}";
            }

            return false; // Prevent default form submission
        }

        //////////////////////////////////////////////////////////////////#

        // Email validation function
        function checkInput() {
            const emailInput = document.getElementById("emailInput");
            const notification = document.getElementById("notification");

            // Regex to allow only specific characters: letters, numbers, dots, and '@'
            const regex = /^[a-zA-Z0-9.@]*$/;

            if (!regex.test(emailInput.value)) {
                // Show the notification if the input contains disallowed symbols
                notification.style.display = "block";
            } else {
                // Hide the notification if the input is valid
                notification.style.display = "none";
            }
        }

        // Function to show the OTP popup
        function showOtpPopup() {
            const otpModal = new bootstrap.Modal(document.getElementById("otpModal"));
            otpModal.show();
        }

        // Function to move focus to the next input box
        function moveToNext(current, nextFieldId) {
            if (current.value.length === current.maxLength && nextFieldId) {
                document.getElementById(nextFieldId).focus();
            }
        }

        // Function to verify OTP
        function verifyOtp() {
            const otp1 = document.getElementById("otp1").value;
            const otp2 = document.getElementById("otp2").value;
            const otp3 = document.getElementById("otp3").value;
            const otp4 = document.getElementById("otp4").value;

            const otp = otp1 + otp2 + otp3 + otp4;

            if (otp.length === 4) {
                alert("OTP Entered: " + otp);
                // Logic for backend OTP validation can be added here
            } else {
                alert("Please enter a valid 4-digit OTP.");
            }
        }
    </script>
</body>

</html>