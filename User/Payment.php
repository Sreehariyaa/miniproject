<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_pay']))
{
	$upqr="update tbl_request set request_status=6 where request_id=".$_GET['rid'];
	if($Conn->query($upqr))
  {
	?>
    <script>
	window.location="Loader.php";
	</script>
    <?php
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment | Roadside Rescue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
    :root {
      --primary: #2563eb;
      --dark: #1e293b;
      --light: #f8fafc;
      --gray: #94a3b8;
      --danger: #ef4444;
    }

    body {
      background-color: #f1f5f9;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      margin: 0;
      padding: 0;
      color: var(--dark);
    }

    .payment-container {
      max-width: 1000px;
      margin: 2rem auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      background: white;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .payment-hero {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      padding: 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .payment-hero::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
    }

    .hero-animation {
      width: 100%;
      height: 200px;
    }

    .hero-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin: 1rem 0 0.5rem;
      text-align: center;
    }

    .hero-subtitle {
      text-align: center;
      opacity: 0.9;
      font-size: 0.875rem;
      margin-bottom: 1.5rem;
    }

    .benefits {
      width: 100%;
    }

    .benefit-item {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 0.75rem;
      font-size: 0.875rem;
    }

    .benefit-item i {
      color: #86efac;
    }

    .payment-form {
      padding: 2rem;
    }

    .form-header {
      margin-bottom: 1.5rem;
    }

    .form-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .form-subtitle {
      color: var(--gray);
      font-size: 0.875rem;
    }

    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--dark);
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #e2e8f0;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      transition: all 0.2s;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .card-icons {
      display: flex;
      gap: 0.5rem;
      margin-bottom: 1rem;
    }

    .card-icon {
      width: 40px;
      height: 25px;
      object-fit: contain;
    }

    .amount-display {
      background: #f8fafc;
      padding: 1rem;
      border-radius: 0.5rem;
      text-align: center;
      margin: 1.5rem 0;
      font-weight: 600;
    }

    .amount-label {
      font-size: 0.875rem;
      color: var(--gray);
      margin-bottom: 0.25rem;
    }

    .amount-value {
      font-size: 1.5rem;
      color: var(--dark);
    }

    .btn-pay {
      width: 100%;
      padding: 1rem;
      background: linear-gradient(135deg, var(--primary), #1d4ed8);
      color: white;
      border: none;
      border-radius: 0.5rem;
      font-weight: 500;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-pay:hover {
      background: linear-gradient(135deg, #1d4ed8, var(--primary));
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(29, 78, 216, 0.3);
    }

    .security-badge {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      margin-top: 1rem;
      font-size: 0.75rem;
      color: var(--gray);
    }

    .security-badge i {
      color: #10b981;
    }

    @media (max-width: 768px) {
      .payment-container {
        grid-template-columns: 1fr;
      }
      
      .payment-hero {
        padding: 1.5rem;
      }
    }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="payment-container">
            <div class="payment-hero">
                <lottie-player class="hero-animation" src="https://lottie.host/2e8266b1-ad5d-44fc-856b-6cfb245a8c98/NdfeU4u70p.json" background="transparent" speed="1" loop autoplay></lottie-player>
                <h2 class="hero-title">Roadside Assistance Payment</h2>
                <p class="hero-subtitle">Secure payment for your emergency service</p>
                
                <div class="benefits">
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>24/7 Nationwide Coverage</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Certified Mechanics</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Average 30min Response Time</span>
                    </div>
                </div>
            </div>

            <div class="payment-form">
                <div class="form-header">
                    <h3 class="form-title">Payment Details</h3>
                    <p class="form-subtitle">Enter your card information to complete the payment</p>
                </div>

                <div class="card-icons">
                    <img src="https://www.svgrepo.com/show/303634/visa-4-logo.svg" class="card-icon" alt="Visa">
                    <img src="https://www.svgrepo.com/show/266077/master-card.svg" class="card-icon" alt="Mastercard">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apple/apple-original.svg" class="card-icon" alt="Apple Pay">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" class="card-icon" alt="Google Pay">
                </div>

                <div class="form-group">
                    <label for="credit-card" class="form-label">Card Number</label>
                    <input type="text" id="credit-card" required autocomplete="off" 
                           placeholder="1234 5678 9012 3456" title="Enter Correct Card Number" 
                           maxlength="19" name="txtacno" class="form-control">
                </div>

                <div class="form-group">
                    <label for="txtname" class="form-label">Cardholder Name</label>
                    <input type="text" name="txtname" required autocomplete="off"
                           pattern="[a-zA-z ]{3,15}" title="Enter Correct Name" minlength="3" 
                           placeholder="Name on Card" class="form-control">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="txtexpdate" class="form-label">Expiration Date</label>
                        <input id="credit-card-exp" type="text" name="txtexpdate" required 
                               autocomplete="off" placeholder="MM/YY" pattern="[0-9/]{5,5}" 
                               title="Enter Correct Date" minlength="5" maxlength="5" class="form-control">
                        <span id="datecheck"></span>
                    </div>
                    <div class="form-group">
                        <label for="txtccv" class="form-label">Security Code (CVV)</label>
                        <input type="text" id="credit-card-ccv" name="txtccv" required 
                               autocomplete="off" placeholder="123" pattern="[0-9]{3,3}" 
                               title="Enter Correct CVV" minlength="3" maxlength="3" class="form-control">
                    </div>
                </div>

                <div class="amount-display">
                    <div class="amount-label">Total Amount</div>
                    <div class="amount-value">
                        <?php 
                        $seQry="select * from tbl_request where request_id='".$_GET['rid']."'";
                        $row=$Conn->query($seQry);
                        $data=$row->fetch_assoc();
                        echo "$".$data['request_amount'];
                        ?>
                    </div>
                </div>

                <button type="submit" name="btn_pay" class="btn-pay" onclick="playPaymentSound()">
                    <i class="fas fa-lock"></i> Confirm Payment
                </button>

                <div class="security-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>256-bit SSL Secured Payment</span>
                </div>
            </div>
        </div>
    </form>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    function playPaymentSound() {
        const audio = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-positivesuccess-953.mp3');
        audio.volume = 0.3;
        audio.play();
    }

    document.addEventListener("DOMContentLoaded", function () {
        const creditCardInput = document.getElementById("credit-card");
        const creditCardExp = document.getElementById("credit-card-exp");
        const creditCardCcv = document.getElementById("credit-card-ccv");

        creditCardInput.addEventListener("input", function () {
            const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
            const formattedValue = formatCreditCard(inputValue);
            this.value = formattedValue;
        });

        creditCardExp.addEventListener("input", function () {
            const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
            const formattedValue = formatExpirationDate(inputValue);
            this.value = formattedValue;
        });

        // Function to validate expiration date
        function validateExpirationDate(inputValue) {
            const month = inputValue.slice(0, 2); // Extract month (assuming format MMYY)
            const year = inputValue.slice(2, 4); // Extract year (assuming format MMYY)

            // Get current date
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear() % 100; // Get last two digits of current year
            const currentMonth = currentDate.getMonth() + 1; // getMonth() returns 0-11, so add 1

            // Validate month is between 1 and 12
            const isValidMonth = /^\d{2}$/.test(month) && parseInt(month, 10) >= 1 && parseInt(month, 10) <= 12;

            // Validate year is equal to or greater than current year
            const isValidYear = /^\d{2}$/.test(year) && parseInt(year, 10) >= currentYear;

            let isValidDate = false;

            if (isValidMonth && isValidYear) {
                const expYear = parseInt(year, 10);
                const expMonth = parseInt(month, 10);

                if (expYear > currentYear || (expYear === currentYear && expMonth >= currentMonth)) {
                    isValidDate = true;
                }
            }

            if (!isValidDate) {
                // Handle invalid input (e.g., show error message, disable form submission)
                console.log('Invalid expiration date');
                alert('Invalid expiration date');
                document.getElementById("credit-card-exp").value = '';
                // Optionally, you can clear the input field or show an error message
                // creditCardExp.value = '';
            }
        }

        // Event listener for onchange
        creditCardExp.addEventListener("change", function () {
            const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
            validateExpirationDate(inputValue);
        });

        creditCardCcv.addEventListener("input", function () {
            const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
            const formattedValue = formatCVV(inputValue);
            this.value = formattedValue;
        });
    });

    function formatCreditCard(value) {
        const groups = value.match(/(\d{1,4})/g) || [];
        return groups.join(' ');
    }

    function formatExpirationDate(value) {
        const groups = value.match(/(\d{1,2})/g) || [];
        return groups.join('/').slice(0, 5);
    }

    function formatCVV(value) {
        return value.slice(0, 3);
    }
</script>
</body>
</html>