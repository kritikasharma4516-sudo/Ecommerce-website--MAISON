<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison Auth</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@300;400;500&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="shared.css">
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --cream: #F5EFE6;
            --warm-white: #FAF7F2;
            --sand: #E8D5B7;
            --caramel: #C9935A;
            --terracotta: #B5603B;
            --espresso: #3D2B1F;
            --mocha: #6B4226;
            --text-dark: #2C1810;
            --text-mid: #7A5C48;
            --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--cream);
            background-image:
                radial-gradient(ellipse at 20% 50%, rgba(201, 147, 90, 0.08) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, rgba(181, 96, 59, 0.06) 0%, transparent 50%),
                radial-gradient(ellipse at 60% 80%, rgba(107, 66, 38, 0.05) 0%, transparent 50%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
            font-family: 'Jost', sans-serif;
        }

        /* Grain overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* NAV */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            padding: 24px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(250, 247, 242, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(201, 147, 90, 0.15);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 300;
            letter-spacing: 10px;
            color: var(--espresso);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 44px;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-mid);
            font-size: 10px;
            letter-spacing: 3.5px;
            text-transform: uppercase;
            font-weight: 400;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--caramel);
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--espresso);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-cta {
            background: var(--espresso) !important;
            color: var(--cream) !important;
            padding: 10px 26px !important;
            border-radius: 2px;
            font-size: 9px !important;
            letter-spacing: 3px !important;
            transition: var(--transition) !important;
        }

        .nav-cta:hover {
            background: var(--caramel) !important;
        }

        .nav-cta::after {
            display: none !important;
        }

        .user-circle {
            width: 36px;
            height: 36px;
            background: var(--espresso);
            color: var(--cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            letter-spacing: 1px;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 500;
        }

        /* AUTH CARD */
        .auth-card {
            position: relative;
            z-index: 1;
            width: 880px;
            height: 520px;
            display: flex;
            border-radius: 4px;
            box-shadow:
                0 2px 4px rgba(61, 43, 31, 0.04),
                0 8px 24px rgba(61, 43, 31, 0.08),
                0 32px 64px rgba(61, 43, 31, 0.12);
            overflow: hidden;
            animation: cardReveal 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        }

        @keyframes cardReveal {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* SIDE PANEL */
        .side-panel {
            flex: 0 0 320px;
            background: var(--espresso);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 56px 48px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative elements on side panel */
        .side-panel::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            font-size: 30px;
            border: 1px solid rgba(201, 147, 90, 0.15);
        }

        .side-panel::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -40px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 1px solid rgba(201, 147, 90, 0.1);
        }

        .side-ornament {
            position: absolute;
            top: 48px;
            left: 48px;
            width: 30px;
            height: 1px;
            background: var(--caramel);
        }

        .side-label {
            font-family: 'Jost', sans-serif;
            font-size: 9px;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--caramel);
            margin-bottom: 20px;
            font-weight: 400;
        }

        #sideTitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 300;
            line-height: 1.15;
            color: var(--warm-white);
            margin-bottom: 16px;
            letter-spacing: 1px;
        }

        .side-sub {
            font-size: 12px;
            color: rgba(250, 247, 242, 0.5);
            line-height: 1.7;
            letter-spacing: 0.5px;
            margin-bottom: 44px;
            font-weight: 300;
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid rgba(201, 147, 90, 0.5);
            color: var(--caramel);
            padding: 13px 30px;
            font-family: 'Jost', sans-serif;
            font-size: 9px;
            letter-spacing: 3.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
            border-radius: 2px;
            position: relative;
            z-index: 1;
        }

        .btn-ghost:hover {
            background: var(--caramel);
            border-color: var(--caramel);
            color: var(--espresso);
        }

        /* FORM PANEL */
        .form-panel {
            flex: 1;
            padding: 64px 56px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--warm-white);
            position: relative;
        }

        .form-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(201, 147, 90, 0.2), transparent);
        }

        .form-label-top {
            font-size: 9px;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--caramel);
            margin-bottom: 12px;
            font-weight: 400;
        }

        h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            color: var(--espresso);
            margin-bottom: 36px;
            letter-spacing: 1px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 16px 0 12px;
            border: none;
            border-bottom: 1px solid rgba(232, 213, 183, 0.8);
            background: transparent;
            outline: none;
            font-family: 'Jost', sans-serif;
            font-size: 13px;
            font-weight: 300;
            color: var(--text-dark);
            letter-spacing: 0.5px;
            transition: var(--transition);
        }

        .input-group input::placeholder {
            color: rgba(122, 92, 72, 0.45);
            font-size: 12px;
            letter-spacing: 1px;
        }

        .input-group input:focus {
            border-bottom-color: var(--caramel);
        }

        .input-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--caramel);
            transition: width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .input-group input:focus~.input-line {
            width: 100%;
        }

        .btn-primary {
            width: 100%;
            padding: 16px;
            margin-top: 8px;
            background: var(--espresso);
            color: var(--cream);
            border: none;
            border-radius: 2px;
            font-family: 'Jost', sans-serif;
            font-size: 10px;
            font-weight: 400;
            letter-spacing: 4px;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: var(--caramel);
        }

        .hidden {
            display: none;
        }

        #loginBox,
        #signupBox {
            animation: formSlide 0.45s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        }

        @keyframes formSlide {
            from {
                opacity: 0;
                transform: translateX(12px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        #mainPage {
            display: none;
            text-align: center;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .auth-card {
                width: 95vw;
                height: auto;
                flex-direction: column;
            }

            .side-panel {
                flex: none;
                padding: 40px;
            }

            .form-panel {
                padding: 40px;
            }

            nav {
                padding: 20px 24px;
            }

            .nav-links {
                gap: 24px;
            }
        }
        .input-group {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 18px;
    cursor: pointer;
    font-size: 14px;
    user-select: none;
    color: #7A5C48;
}

        @media (max-width: 600px) {
            .nav-links li:not(:last-child) {
                display: none;
            }
        }
    </style>
</head>

<body>

    <?php include "navbar.php"; ?>
    <div class="auth-card">
        <div class="side-panel">
            <div class="side-ornament"></div>
            <p class="side-label">Welcome</p>
            <h1 id="sideTitle">New Here?</h1>
            <p class="side-sub" id="sideSubtext">Join Maison and discover the art of refined living.</p>
            <button onclick="toggleForm()" id="toggleBtn" class="btn-ghost">Create Account</button>
        </div>

        <div class="form-panel">
            <div id="loginBox">
                <p class="form-label-top">Member Access</p>
                <h2>Welcome Back</h2>
                <form id="loginForm">
                    <div class="input-group">
                      <input type="email"
       name="email"
       placeholder="Email address"
       autocomplete="email"
       required>
                        <span class="input-line"></span>
                    </div>
                    <div class="input-group">
                        <input type="password"
       name="password"
       placeholder="Password"
       minlength="8"
       required>
                        <span class="toggle-password">👁</span>
                        <small style="color:#7A5C48;font-size:11px;">
Password must contain at least 8 characters.
</small>
                        <span class="input-line"></span>
                    </div>
                    <button type="submit" class="btn-primary">Sign In</button>
                </form>
            </div>

            <div id="signupBox" style="display:none;">
                <p class="form-label-top">New Account</p>
                <h2>Create Profile</h2>
                <form id="signupForm">
                    <div class="input-group">
                       <input type="text"
       name="name"
       placeholder="Full name"
       minlength="3"
       maxlength="50"
       required>
                        <span class="input-line"></span>
                    </div>
                    <div class="input-group">
                        <input type="email"
       name="email"
       placeholder="Email address"
       autocomplete="email"
       required>
                        <span class="input-line"></span>
                    </div>
                    <div class="input-group">
                        <input type="password"
       name="password"
       placeholder="Password"
       minlength="8"
       required>
                        <span class="toggle-password">👁</span>
                        <small style="color:#7A5C48;font-size:11px;">
Password must contain at least 8 characters.
</small>
                        <span class="input-line"></span>
                    </div>
                     <div class="input-group"> <input type="password"
           name="confirm_password"
           placeholder="Confirm password"
           required>
           <span class="toggle-password">👁</span>
    <span class="input-line"></span>
    </div>
                    <button type="submit" class="btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
  
function validateEmail(email) {
    return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/.test(email);
}

function toggleForm() {
    const loginBox = document.getElementById('loginBox');
    const signupBox = document.getElementById('signupBox');
    const sideTitle = document.getElementById('sideTitle');
    const sideSubtext = document.getElementById('sideSubtext');
    const toggleBtn = document.getElementById('toggleBtn');

    if (loginBox.style.display === 'none') {
        loginBox.style.display = 'block';
        signupBox.style.display = 'none';
        sideTitle.textContent = 'New Here?';
        sideSubtext.textContent =
            'Join Maison and discover the art of refined living.';
        toggleBtn.textContent = 'Create Account';
    } else {
        loginBox.style.display = 'none';
        signupBox.style.display = 'block';
        sideTitle.textContent = 'Welcome Back';
        sideSubtext.textContent =
            'Sign in to your account and continue your journey.';
        toggleBtn.textContent = 'Sign In';
    }
}

/* LOGIN */
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    const email = formData.get('email');

    if (!validateEmail(email)) {
        alert('Please enter a valid email address');
        return;
    }

    handleAuth(formData, 'login');
});

/* SIGNUP */
document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    const email = formData.get('email');

    if (!validateEmail(email)) {
        alert('Please enter a valid email address');
        return;
    }

    const password = this.querySelector('[name="password"]').value;
    const confirmPassword =
        this.querySelector('[name="confirm_password"]').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }

    if (password.length < 8) {
        alert('Password must be at least 8 characters');
        return;
    }

    handleAuth(formData, 'signup');
});

/* SHOW / HIDE PASSWORD */
document.querySelectorAll('.toggle-password').forEach(icon => {
    icon.addEventListener('click', function() {
        const input = this.previousElementSibling;

        if (input.type === 'password') {
            input.type = 'text';
            this.textContent = '🙈';
        } else {
            input.type = 'password';
            this.textContent = '👁';
        }
    });
});

function handleAuth(formData, action) {

    formData.append('action', action);

    fetch('auth.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {
            window.location.href = 'index.php';
        }
        else if (data.status === 'error_not_found') {
            alert('Account not found. Please register.');
        }
        else {
            alert(data.message);
        }

    })
    .catch(error => {
        console.error(error);
        alert('Something went wrong.');
    });
}
    </script>
</body>

</html>