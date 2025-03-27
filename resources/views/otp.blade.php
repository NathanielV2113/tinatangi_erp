<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Otp-Verification</title>
    <style>
      body {
        background: #ffe2b6;
        background: url('image/bg5.jpg') no-repeat center center fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
      }
      .text-color {
        color: #000000;
      }
      .card {
        width: 350px;
        padding: 20px;
        border-radius: 20px;
        background: #ffffff;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
      }
      .card h5 {
        font-size: 28px; /* Increased font size */
        font-weight: bold; /* Added bold styling */
        margin-bottom: 20px; /* Added spacing below the label */
      }
      .mobile-text {
        color: #c0842b;
        font-size: 15px;
        margin-bottom: 15px;
      }
      .form-control {
        width: 60px;
        height: 60px;
        margin: 10px 5px; /* Added top and bottom margin */
        font-size: 20px;
        text-align: center;
        border: 2px solid #c0842b;
        border-radius: 10px;
        background-color: #ffffff;
      }
      .form-control:focus {
        color: #495057;
        background-color: #f8f7f4;
        outline: none;
        box-shadow: 0 0 8px #f1f1f1;
      }
      .cursor {
        cursor: pointer;
      }
      #countdown {
        font-size: 14px;
        color: #6c757d;
        margin-top: 10px;
      }
      #resend {
        font-size: 14px;
        margin-top: 10px;
      }
      #resend .text-color {
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <h5 class="m-0">Email Verification</h5> <!-- Updated styling -->
      <span class="mobile-text">
        <b>Enter the code we just sent on your email</b>
        <b class="text-color">Example@gmail.ui.ph</b>
      </span>
      <div class="d-flex justify-content-center mt-4">
        <input type="text" class="form-control" maxlength="1" autofocus />
        <input type="text" class="form-control" maxlength="1" />
        <input type="text" class="form-control" maxlength="1" />
        <input type="text" class="form-control" maxlength="1" />
      </div>
      <div class="text-center mt-4">
        <span id="countdown">Time left: 01 : 00</span>
        <span id="resend"></span>
      </div>
    </div>
    <script>
      let timerOn = true;
      function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;
        m = m < 10 ? "0" + m : m;
        s = s < 10 ? "0" + s : s;
        document.getElementById(
          "countdown"
        ).innerHTML = `Time left: ${m} : ${s}`;
        remaining -= 1;
        if (remaining >= 0 && timerOn) {
          setTimeout(function () {
            timer(remaining);
          }, 1000);
          document.getElementById("resend").innerHTML = ``;
          return;
        }
        if (!timerOn) {
          return;
        }
        document.getElementById("resend").innerHTML = `Don't receive the code? 
          <span class="text-color cursor" onclick="timer(60)">Resend</span>`;
      }
      timer(60);
    </script>
  </body>
</html>