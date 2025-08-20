<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Processing Payment | Roadside Rescue</title>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script type="text/javascript">
  function preventBack() { window.history.forward(); }
  setTimeout("preventBack()", 0);
  window.onunload = function () { null };
</script>
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
  color: var(--dark);
}

.loader-container {
  text-align: center;
  max-width: 500px;
  padding: 2rem;
  background: white;
  border-radius: 1rem;
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

.loader-animation {
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.loader-title {
  font-size: 1.5rem;
  font-weight: 600;
  margin: 1rem 0 0.5rem;
  color: var(--dark);
}

.loader-subtitle {
  color: var(--gray);
  margin-bottom: 2rem;
  line-height: 1.5;
}

.progress-container {
  width: 100%;
  height: 6px;
  background: #e2e8f0;
  border-radius: 3px;
  overflow: hidden;
  margin: 1rem 0;
}

.progress-bar {
  height: 100%;
  width: 0;
  background: linear-gradient(90deg, var(--primary), #3b82f6);
  transition: width 5s linear;
}

.security-badge {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  margin-top: 1.5rem;
  font-size: 0.875rem;
  color: var(--gray);
}

.security-badge i {
  color: var(--success);
}

.assistance-banner {
  background: linear-gradient(135deg, #2563eb, #1d4ed8);
  color: white;
  padding: 1rem;
  border-radius: 0.5rem;
  margin-top: 1.5rem;
  display: flex;
  align-items: center;
  gap: 1rem;
}

.assistance-banner i {
  font-size: 1.5rem;
}

.assistance-text {
  font-size: 0.875rem;
}

.assistance-number {
  font-weight: 600;
  font-size: 1.1rem;
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body onload="myFunction()">
<div class="loader-container">
  <div class="loader-animation">
    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_raiw2hpe.json" background="transparent" speed="1" loop autoplay></lottie-player>
  </div>
  
  <h1 class="loader-title">Processing Your Payment</h1>
  <p class="loader-subtitle">Your roadside assistance request is being confirmed. Please wait while we securely process your payment.</p>
  
  <div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
  </div>
  
  <div class="security-badge">
    <i class="fas fa-lock"></i>
    <span>256-bit SSL Secured Payment</span>
  </div>
  
  <div class="assistance-banner">
    <i class="fas fa-phone-alt"></i>
    <div>
      <div class="assistance-text">Need immediate help?</div>
      <div class="assistance-number">1-800-ROAD-HELP</div>
    </div>
  </div>
</div>

<script>
  var myVar;
  function myFunction() {
    // Animate progress bar
    document.getElementById('progressBar').style.width = '100%';
    
    // Play processing sound
    const audio = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-positivesuccess-953.mp3');
    audio.volume = 0.3;
    audio.play();
    
    window.setTimeout(function() {
      window.location = "Paymentsuc.php";
    }, 5000);
  }
</script>
</body>
</html>