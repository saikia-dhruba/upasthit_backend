<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Company Name</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* === UPDATED FOR BRIGHT THEME === */

        /* Basic Reset and Font Import */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            /* Dark text for readability */
            background-color: #f0f2f5;
            /* Light grey background */
            overflow: hidden;
            /* Important: Hide scrollbars */
        }

        /* The Canvas for our particle animation */
        #particle-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 0;
            /* Place it behind everything */
        }

        /* Container to center the content */
        .page-wrapper {
            position: relative;
            z-index: 1;
            /* Place it in front of the canvas */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Home Button Styling */
        .home-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.05);
            color: #555;
            text-decoration: none;
            border-radius: 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: 600;
        }

        .home-button:hover {
            background-color: rgba(0, 0, 0, 0.1);
            color: #111;
        }

        /* Login Container - Light Glassmorphism Effect */
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.6);
            /* Light semi-transparent background */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            /* For Safari */
            border-radius: 15px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Chain reaction fade-in animation (unchanged) */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container>* {
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .logo {
            animation-delay: 0.1s;
        }

        .login-container h2 {
            animation-delay: 0.2s;
        }

        .login-container p {
            animation-delay: 0.3s;
        }

        #loginForm .input-group:nth-of-type(1) {
            animation-delay: 0.4s;
        }

        #loginForm .input-group:nth-of-type(2) {
            animation-delay: 0.5s;
        }

        #loginForm button {
            animation-delay: 0.6s;
        }

        #loginForm .form-footer {
            animation-delay: 0.7s;
        }

        /* Logo Styling */
        .logo img {
            height: 80px;
            width: auto;
            margin-bottom: 10px;
        }

        .login-container h2 {
            margin-bottom: 10px;
            font-weight: 600;
            color: #222;
        }

        .login-container p {
            margin-bottom: 30px;
            font-weight: 300;
            color: #666;
        }

        /* Form Input Fields */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 600;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            color: #333;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .input-group input::placeholder {
            color: #aaa;
        }

        .input-group input:focus {
            outline: none;
            border-color: #00aaff;
            box-shadow: 0 0 0 3px rgba(0, 170, 255, 0.15);
        }

        /* Login Button */
        form button {
            width: 100%;
            padding: 12px;
            background-color: #00aaff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0088cc;
        }

        /* Form Footer Link */
        .form-footer {
            margin-top: 20px;
        }

        .form-footer a {
            color: #0077cc;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        #loginButton {
            display: flex;
            /* Allows a spinner and text to align nicely */
            align-items: center;
            /* Vertically centers the content */
            justify-content: center;
            /* Horizontally centers the content */
        }

        /* This creates the spinning circle */
        .spinner {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            /* The faint part of the circle */
            border-radius: 50%;
            border-top-color: #fff;
            /* The bright, moving part of the circle */
            animation: spin 1s ease-in-out infinite;
            /* Applies the rotation animation */
            display: none;
            /* The spinner is hidden by default */
        }

        /* This is the rotation animation */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* This slightly changes the button's look when it's disabled */
        form button:disabled {
            background-color: #0077b3;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <!-- This canvas is where the JavaScript will draw the animation -->
    <canvas id="particle-canvas"></canvas>

    <div class="page-wrapper">
        <a href="{{route('home')}}" class="home-button">Go to Home</a>

        <div class="login-container">
            <!-- Logo -->
            <div class="logo">
                <!-- Swapped to a dark placeholder logo -->
                <img src="{{ asset('assets/frontend/img/logo/logo.png') }}" alt="Logo">
            </div>

            <h2>Welcome Back</h2>
            <p>Sign in to continue</p>

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="{{ route('user.store') }}">
                @csrf
                {{-- @error('username')
                    @if ($errors->has('username') && !$errors->has('password'))
                        <div class="error-message">{{ $message }}</div>
                    @endif
                @enderror --}}
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="e.g., SWF10520" required
                        autofocus>
                    @error('username')
                        <span class="field-error text-danger" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    @error('password')
                        <span class="field-error text-danger" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" id="loginButton">
                    <span class="button-text">Login</span>
                    <span class="spinner"></span>
                </button>
                <div class="form-footer">
                    <a href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- The JavaScript for the animation -->
    <script>
        const loginForm = document.getElementById('loginForm');
        const loginButton = document.getElementById('loginButton');
        const buttonText = loginButton.querySelector('.button-text');
        const spinner = loginButton.querySelector('.spinner');

        loginForm.addEventListener('submit', function(event) {
            // Check if the form is valid before disabling the button
            // This prevents the button from getting stuck if HTML5 validation fails
            if (loginForm.checkValidity()) {
                // 1. Disable the button to prevent multiple clicks
                loginButton.disabled = true;

                // 2. Hide the "Login" text
                buttonText.style.display = 'none';

                // 3. Show the spinner
                spinner.style.display = 'block';
            }
        });

        // Optional but recommended: Reset button if user navigates back to the page
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                loginButton.disabled = false;
                buttonText.style.display = 'block';
                spinner.style.display = 'none';
            }
        });

        // --- Particle Animation (Updated for Bright Theme) ---
        const canvas = document.getElementById('particle-canvas');
        const ctx = canvas.getContext('2d');

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particlesArray;

        const mouse = {
            x: null,
            y: null,
            radius: (canvas.height / 120) * (canvas.width / 120)
        };

        window.addEventListener('mousemove', (event) => {
            mouse.x = event.x;
            mouse.y = event.y;
        });

        window.addEventListener('mouseout', () => {
            mouse.x = null;
            mouse.y = null;
        });

        class Particle {
            constructor(x, y, directionX, directionY, size, color) {
                this.x = x;
                this.y = y;
                this.directionX = directionX;
                this.directionY = directionY;
                this.size = size;
                this.color = color;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
                ctx.fillStyle = this.color;
                ctx.fill();
            }

            update() {
                if (this.x > canvas.width || this.x < 0) {
                    this.directionX = -this.directionX;
                }
                if (this.y > canvas.height || this.y < 0) {
                    this.directionY = -this.directionY;
                }

                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                if (distance < mouse.radius + this.size) {
                    if (mouse.x < this.x && this.x < canvas.width - this.size * 10) this.x += 5;
                    if (mouse.x > this.x && this.x > this.size * 10) this.x -= 5;
                    if (mouse.y < this.y && this.y < canvas.height - this.size * 10) this.y += 5;
                    if (mouse.y > this.y && this.y > this.size * 10) this.y -= 5;
                }
                this.x += this.directionX;
                this.y += this.directionY;
                this.draw();
            }
        }

        function init() {
            particlesArray = [];
            let numberOfParticles = (canvas.height * canvas.width) / 9000;
            for (let i = 0; i < numberOfParticles; i++) {
                let size = (Math.random() * 2) + 1.5;
                let x = (Math.random() * ((innerWidth - size * 2) - (size * 2)) + size * 2);
                let y = (Math.random() * ((innerHeight - size * 2) - (size * 2)) + size * 2);
                let directionX = (Math.random() * .4) - 0.2;
                let directionY = (Math.random() * .4) - 0.2;
                // **UPDATED PARTICLE COLOR** to a dark one
                let color = 'rgba(40, 40, 80, 0.7)';
                particlesArray.push(new Particle(x, y, directionX, directionY, size, color));
            }
        }

        function animate() {
            requestAnimationFrame(animate);
            ctx.clearRect(0, 0, innerWidth, innerHeight);
            for (let i = 0; i < particlesArray.length; i++) {
                particlesArray[i].update();
            }
            connect();
        }

        function connect() {
            let opacityValue = 1;
            for (let a = 0; a < particlesArray.length; a++) {
                for (let b = a; b < particlesArray.length; b++) {
                    let distance = ((particlesArray[a].x - particlesArray[b].x) * (particlesArray[a].x - particlesArray[b]
                            .x)) +
                        ((particlesArray[a].y - particlesArray[b].y) * (particlesArray[a].y - particlesArray[b].y));

                    if (distance < (canvas.width / 8) * (canvas.height / 8)) {
                        opacityValue = 1 - (distance / 20000);
                        // **UPDATED LINE COLOR** to a dark one
                        ctx.strokeStyle = `rgba(40, 40, 80, ${opacityValue * 0.5})`;
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                        ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                        ctx.stroke();
                    }
                }
            }
        }

        window.addEventListener('resize', () => {
            canvas.width = innerWidth;
            canvas.height = innerHeight;
            mouse.radius = (canvas.height / 120) * (canvas.width / 120);
            init();
        });

        init();
        animate();
    </script>
</body>

</html>
