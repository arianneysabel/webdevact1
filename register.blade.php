<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign up</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  * { box-sizing: border-box; }

  body {
    margin: 0;
    min-height: 100vh;
    font-family: 'Inter', sans-serif;
    background:
      repeating-linear-gradient(0deg, rgba(208, 231, 255, 0.045) 0px, rgba(208, 231, 255, 0.045) 1px, transparent 1px, transparent 44px),
      repeating-linear-gradient(90deg, rgba(208, 231, 255, 0.045) 0px, rgba(208, 231, 255, 0.045) 1px, transparent 1px, transparent 44px),
      #123e5b;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    position: relative;
    overflow: hidden;
  }

  .bg-decor {
    position: absolute;
    inset: 0;
    z-index: 0;
    pointer-events: none;
  }

  .orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(70px);
  }

  .orb.o1 {
    width: 480px;
    height: 480px;
    top: -160px;
    left: -140px;
    background: radial-gradient(circle, rgba(79, 157, 194, 0.55), transparent 70%);
    animation: drift1 22s ease-in-out infinite alternate;
  }

  .orb.o2 {
    width: 420px;
    height: 420px;
    bottom: -180px;
    right: -140px;
    background: radial-gradient(circle, rgba(160, 196, 255, 0.4), transparent 70%);
    animation: drift2 26s ease-in-out infinite alternate;
  }

  .orb.o3 {
    width: 320px;
    height: 320px;
    top: 40%;
    left: 60%;
    background: radial-gradient(circle, rgba(185, 224, 255, 0.3), transparent 70%);
    animation: drift3 30s ease-in-out infinite alternate;
  }

  .orb.o4 {
    width: 260px;
    height: 260px;
    top: 8%;
    right: 8%;
    background: radial-gradient(circle, rgba(43, 122, 153, 0.45), transparent 70%);
    animation: drift1 18s ease-in-out infinite alternate-reverse;
  }

  @keyframes drift1 {
    from { transform: translate(0, 0) scale(1); }
    to   { transform: translate(60px, 40px) scale(1.08); }
  }

  @keyframes drift2 {
    from { transform: translate(0, 0) scale(1); }
    to   { transform: translate(-50px, -30px) scale(1.06); }
  }

  @keyframes drift3 {
    from { transform: translate(0, 0) scale(1); }
    to   { transform: translate(-40px, 50px) scale(0.94); }
  }

  .wave {
    position: absolute;
    left: 0;
    right: 0;
    bottom: -2px;
    width: 100%;
    height: auto;
    opacity: 0.5;
  }

  @media (prefers-reduced-motion: reduce) {
    .orb { animation: none; }
  }

  /* soft vignette to keep focus on the card */
  body::after {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, transparent 30%, rgba(10, 36, 56, 0.6) 100%);
    pointer-events: none;
    z-index: 0;
  }

  .card {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 380px;
    background: rgba(18, 62, 91, 0.55);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(160, 196, 255, 0.25);
    border-radius: 16px;
    padding: 40px 36px;
    box-shadow:
      0 0 0 1px rgba(160, 196, 255, 0.06) inset,
      0 0 18px rgba(160, 196, 255, 0.08),
      0 20px 50px rgba(0, 0, 0, 0.4);
  }

  .card h1 {
    margin: 0 0 6px 0;
    font-size: 26px;
    font-weight: 700;
    color: #f0f8ff;
    text-shadow: 0 0 8px rgba(160, 196, 255, 0.25);
  }

  .card .sub {
    margin: 0 0 28px 0;
    font-size: 14px;
    color: #b9e0ff;
    opacity: 0.8;
  }

  .field {
    margin-bottom: 18px;
  }

  .field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #d0e7ff;
    margin-bottom: 6px;
  }

  .field input {
    width: 100%;
    padding: 11px 14px;
    font-size: 14px;
    font-family: inherit;
    color: #f0f8ff;
    background: rgba(240, 248, 255, 0.06);
    border: 1.5px solid rgba(138, 184, 255, 0.4);
    border-radius: 8px;
    transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
  }

  .field input::placeholder {
    color: rgba(208, 231, 255, 0.4);
  }

  .field input:focus {
    outline: none;
    border-color: #a0c4ff;
    background: rgba(240, 248, 255, 0.1);
    box-shadow:
      0 0 0 3px rgba(160, 196, 255, 0.15),
      0 0 10px rgba(160, 196, 255, 0.2);
  }

  .row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 26px;
    font-size: 13px;
  }

  .row.terms {
    align-items: flex-start;
  }

  .remember {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #d0e7ff;
  }

  .row.terms .remember {
    align-items: flex-start;
    line-height: 1.5;
  }

  .row.terms .remember input[type="checkbox"] {
    margin-top: 3px;
    flex-shrink: 0;
  }

  .row.terms a {
    color: #8ab8ff;
    text-decoration: none;
  }

  .row.terms a:hover {
    text-decoration: underline;
  }

  .remember input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: #a0c4ff;
    cursor: pointer;
  }

  .row a {
    color: #8ab8ff;
    text-decoration: none;
    font-weight: 500;
    transition: text-shadow 0.2s ease;
  }

  .row a:hover {
    text-decoration: underline;
    text-shadow: 0 0 10px rgba(138, 184, 255, 0.7);
  }

  button.submit {
    width: 100%;
    padding: 13px;
    font-family: inherit;
    font-size: 15px;
    font-weight: 700;
    color: #0a2438;
    background: linear-gradient(135deg, #a0c4ff, #8ab8ff);
    border: none;
    border-radius: 8px;
    cursor: pointer;
    letter-spacing: 0.01em;
    box-shadow: 0 0 12px rgba(160, 196, 255, 0.3);
    transition: box-shadow 0.2s ease, transform 0.15s ease, background 0.2s ease;
  }

  button.submit:hover {
    background: linear-gradient(135deg, #b9e0ff, #a0c4ff);
    box-shadow: 0 0 18px rgba(185, 224, 255, 0.45);
    transform: translateY(-1px);
  }

  button.submit:active {
    transform: translateY(0);
  }

  button.submit:focus-visible {
    outline: 2px solid #f0f8ff;
    outline-offset: 3px;
  }

  .divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 24px 0;
    color: rgba(138, 184, 255, 0.5);
    font-size: 12px;
  }

  .divider::before,
  .divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background: rgba(138, 184, 255, 0.25);
  }

  .signup {
    text-align: center;
    font-size: 13px;
    color: #b9e0ff;
    opacity: 0.75;
  }

  .signup a {
    color: #f0f8ff;
    font-weight: 600;
    text-decoration: none;
    text-shadow: 0 0 6px rgba(240, 248, 255, 0.2);
  }

  .signup a:hover {
    text-decoration: underline;
  }

  @media (max-width: 480px) {
    .card {
      padding: 28px 22px;
    }
  }
</style>
</head>
<body>

  <div class="bg-decor">
    <span class="orb o1"></span>
    <span class="orb o2"></span>
    <span class="orb o3"></span>
    <span class="orb o4"></span>
  </div>

  <svg class="wave" viewBox="0 0 1440 220" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="waveGrad" x1="0" y1="0" x2="1" y2="0">
        <stop offset="0%" stop-color="#4f9dc2" />
        <stop offset="50%" stop-color="#2b7a99" />
        <stop offset="100%" stop-color="#1e5d7a" />
      </linearGradient>
    </defs>
    <path fill="url(#waveGrad)" fill-opacity="0.35" d="M0,120 C240,180 480,60 720,90 C960,120 1200,200 1440,140 L1440,220 L0,220 Z"></path>
    <path fill="url(#waveGrad)" fill-opacity="0.25" d="M0,160 C300,110 600,190 900,150 C1100,125 1300,170 1440,150 L1440,220 L0,220 Z"></path>
  </svg>

  <div class="card">
    <h1>Create account</h1>
    <p class="sub">Get started in under a minute.</p>

    <form action="{{ route('register') }}" method="POST">
    @csrf

    <div class="field">
        <label for="name">Name</label>
        <input type="text" id="name" name="name"
               placeholder="Enter your name" required>
    </div>

    <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email"
               placeholder="username@gmail.com" required>
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password"
               placeholder="At least 8 characters" required>
    </div>

    <div class="field">
        <label for="confirm">Confirm password</label>
        <input type="password"
               id="confirm"
               name="password_confirmation"
               placeholder="Re-enter your password"
               required>
    </div>

    <div class="row terms">
        <label class="remember">
            <input type="checkbox" id="terms" required>
            I agree to the <a href="#">terms</a> and
            <a href="#">privacy policy</a>
        </label>
    </div>

    <button type="submit" class="submit">
        Create account
    </button>
</form>

    <div class="divider">or</div>

    <p class="signup">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
  </div>

</body>
</html>