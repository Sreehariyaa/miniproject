<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Successful | Roadside Rescue</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
    :root {
      --primary: #2563eb;
      --success: #10b981;
      --dark: #1e293b;
      --light: #f8fafc;
      --gray: #94a3b8;
    }

    body {
      background-color: #f1f5f9;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .success-container {
      max-width: 500px;
      width: 90%;
      background: white;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .success-header {
      background: linear-gradient(135deg, var(--primary), #1d4ed8);
      padding: 2rem;
      color: white;
    }

    .success-header h1 {
      margin: 0;
      font-weight: 600;
    }

    .success-animation {
      width: 150px;
      height: 150px;
      margin: -75px auto 0;
    }

    .success-content {
      padding: 2rem;
      margin-top: -50px;
    }

    .success-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: var(--dark);
    }

    .success-description {
      color: var(--gray);
      line-height: 1.5;
      margin-bottom: 1.5rem;
    }

    .transaction-details {
      background: #f8fafc;
      border-radius: 0.5rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .transaction-label {
      font-size: 0.875rem;
      color: var(--gray);
      margin-bottom: 0.5rem;
    }

    .transaction-id {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--dark);
      letter-spacing: 1px;
      margin: 1rem 0;
    }

    .thank-you {
      color: var(--success);
      font-weight: 500;
    }

    .assistance-banner {
      background: linear-gradient(135deg, var(--primary), #1d4ed8);
      color: white;
      padding: 1rem;
      border-radius: 0.5rem;
      margin-top: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1rem;
    }

    .assistance-banner i {
      font-size: 1.25rem;
    }

    .assistance-text {
      font-size: 0.875rem;
    }

    .assistance-number {
      font-weight: 600;
    }

    .progress-container {
      width: 100%;
      height: 6px;
      background: #e2e8f0;
      border-radius: 3px;
      overflow: hidden;
      margin: 1.5rem 0 0;
    }

    .progress-bar {
      height: 100%;
      width: 0;
      background: linear-gradient(90deg, var(--primary), #3b82f6);
      animation: progress 8s linear forwards;
    }

    @keyframes progress {
      0% { width: 0; }
      100% { width: 100%; }
    }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-header">
            <h1>Payment Successful</h1>
        </div>
        
        <div class="success-animation">
            <lottie-player src="https://lottie.host/2e8266b1-ad5d-44fc-856b-6cfb245a8c98/NdfeU4u70p.json" background="transparent" speed="1" loop autoplay></lottie-player>
        </div>
        
        <div class="success-content">
            <h2 class="success-title">Thank You For Your Payment!</h2>
            <p class="success-description">
                Your roadside assistance request has been confirmed. Our nearest available team will contact you shortly.
            </p>
            
            <div class="transaction-details">
                <div class="transaction-label">Transaction ID</div>
                <div class="transaction-id" id="transactionId"></div>
                <div class="thank-you">We appreciate your trust!</div>
            </div>
            
            <div class="assistance-banner">
                <i class="fas fa-headset"></i>
                <div>
                    <div class="assistance-text">24/7 Customer Support</div>
                    <div class="assistance-number">1-800-ROAD-HELP</div>
                </div>
            </div>
            
            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>
    
    <audio id="successSound" src="https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3" preload="auto"></audio>
</body>
<script>
    // Play success sound when page loads
    window.onload = function() {
        document.getElementById('successSound').volume = 0.3;
        document.getElementById('successSound').play();
    };

    function generateTransactionID() {
        var min = 100000000;
        var max = 999999999;
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    document.getElementById('transactionId').textContent = generateTransactionID();

    setTimeout(function () {
        window.location.href = "UserDash.php";
    }, 8000);
</script>
</html>