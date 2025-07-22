<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Solution - SuperAdmin Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{--jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        :root {
            --primary: #fb2e00;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: 1px solid rgba(251, 46, 0, 0.3);
            --dark-bg: #0f172a;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            background-color: var(--dark-bg);
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* CSS Background Elements */
        .bg-element {
            position: absolute;
            opacity: 0.15;
            border-radius: 50%;
            background: radial-gradient(circle, var(--primary), transparent);
            filter: blur(40px);
            z-index: 0;
        }

        .particle {
            position: absolute;
            background-color: var(--primary);
            border-radius: 50%;
            opacity: 0;
            animation: float 15s infinite linear;
            z-index: 0;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }

            10% {
                opacity: 0.3;
            }

            90% {
                opacity: 0.3;
            }

            100% {
                transform: translateY(-20vh) scale(1.5);
                opacity: 0;
            }
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: var(--glass-border);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 40px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            border-radius: 50%;
            border: 3px solid rgba(251, 46, 0, 0.3);
            object-fit: cover;
        }

        /* Fixed height for input groups */
        .input-group {
            height: 50px;
            margin-bottom: 20px;
        }

        .input-group-text {
            background: rgba(251, 46, 0, 0.1);
            border: 1px solid rgba(251, 46, 0, 0.3);
            border-right: none;
            color: var(--primary);
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-control {
            height: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(251, 46, 0, 0.3);
            border-left: none;
            color: white;
            padding: 0 15px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(251, 46, 0, 0.1);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn-login {
            background-color: var(--primary);
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            margin-top: 10px;
            color: white;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #e02800;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(251, 46, 0, 0.3);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: rgba(255, 255, 255, 0.6);
            background: none;
            border: none;
            padding: 0;
        }

        .password-toggle:hover {
            color: white;
        }

        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .security-badge i {
            color: var(--primary);
            margin-right: 8px;
        }

        .btn-auth-method {
            background-color: rgba(251, 46, 0, 0.1);
            color: white;
            border: 1px solid rgba(251, 46, 0, 0.3);
        }

        .btn-auth-method.active {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .auth-field {
            transition: all 0.3s ease;
        }

    </style>
</head>

<body>
    <!-- Background elements -->
    <div class="bg-element" style="width: 300px; height: 300px; top: 20%; left: 10%;"></div>
    <div class="bg-element" style="width: 500px; height: 500px; top: 60%; left: 70%;"></div>
    <div class="bg-element" style="width: 200px; height: 200px; top: 30%; left: 80%;"></div>

    <!-- Login container -->
    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <img src="assets/image/logo.png" alt="IT Solution Logo" class="logo" width="190px" style="background-color: white;">
                <h3 class="mb-1">SuperAdmin Portal</h3>

            </div>
            <div class="auth-method mb-4 text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-auth-method active" data-method="password">
                        <i class="fas fa-lock me-1"></i> Password
                    </button>
                    <button type="button" class="btn btn-sm btn-auth-method" data-method="otp">
                        <i class="fas fa-mobile-alt me-1"></i> OTP
                    </button>
                </div>
            </div>
            <form id="loginForm">
                <div class="position-relative">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                        <input type="text" class="form-control" id="email" placeholder="Email ID" required>
                    </div>
                </div>

                <div class="position-relative">
                    <div id="passwordAuth" class="auth-field">
                        <div class="position-relative">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" placeholder="Master Password" required>
                            </div>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div id="otpAuth" class="auth-field" style="display: none;">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-sms"></i></span>
                            <input type="text" class="form-control" id="otp" placeholder="Enter OTP" maxlength="6">
                            <button class="btn btn-outline-success" type="button" id="sendOtp">
                                <i class="fas fa-paper-plane"></i> Send OTP
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember device</label>
                    </div>
                    <a href="#" class="text-decoration-none" style="color: var(--primary);">Need help?</a>
                </div>

                <button type="submit" class="btn btn-login" disabled>
                    <i class="fas fa-fingerprint me-2"></i> Authenticate
                </button>

                <div class="security-badge">
                    <i class="fas fa-lock"></i>
                    <span>256-bit encrypted connection</span>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const particleCount = 20;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                const size = Math.random() * 6 + 2;
                const posX = Math.random() * 100;
                const delay = Math.random() * 15;
                const duration = Math.random() * 10 + 15;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;

                document.body.appendChild(particle);
            }
        }

        // Initialize on load
        window.addEventListener('load', createParticles);


        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const otp = document.getElementById('otp').value.trim();
            const method = document.querySelector('.btn-auth-method.active').dataset.method;

            const formData = new FormData();
            formData.append('email', email);

            if (method === 'password') {
                formData.append('password', password);
            } else if (method === 'otp') {
                formData.append('otp', otp);
            }

            try {
                const response = await fetch(method === 'password' ? '{{ route("superadmin.login") }}' : '{{ route("superadmin.otp.login") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {
                    toastr.success(result.message);
                    setTimeout(() => {
                        window.location.href = result.redirect;
                    }, 1000);
                } else {
                    toastr.error(result.message);
                }
            } catch (error) {
                console.error('Login error:', error);
                toastr.error('Something went wrong. Please try again.');
            }
        });



        // Toggle between Password and OTP
        document.querySelectorAll('.btn-auth-method').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.btn-auth-method').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const method = this.dataset.method;
                document.getElementById('passwordAuth').style.display = method === 'password' ? 'block' : 'none';
                document.getElementById('otpAuth').style.display = method === 'otp' ? 'block' : 'none';

                // Make the appropriate field required
                document.getElementById('password').required = method === 'password';
                document.getElementById('otp').required = method === 'otp';
            });
        });

    </script>

    {{-- otp send script  --}}
    <script>
        let resendCountdown = null;

        document.getElementById('sendOtp').addEventListener('click', async function () {
            const email = document.getElementById('email').value.trim();
            const sendOtpBtn = this;
            const authenticateBtn = document.querySelector('.btn-login');

            if (!email) {
                toastr.warning('Please enter your email before sending OTP');
                return;
            }

            sendOtpBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Sending...';
            sendOtpBtn.disabled = true;

            try {
                const response = await fetch('{{ route("email.otp") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email })
                });

                const result = await response.json();

                if (result.status === 'success') {
                    toastr.success(result.message);

                    // Enable authenticate button
                    authenticateBtn.disabled = false;

                    // Start countdown for resend
                    startResendCountdown(sendOtpBtn);
                } else {
                    toastr.error(result.message);
                    sendOtpBtn.innerHTML = '<i class="fas fa-paper-plane me-1"></i> Send OTP';
                    sendOtpBtn.disabled = false;
                }
            } catch (error) {
                console.error('OTP send error:', error);
                toastr.error('Failed to send OTP');
                sendOtpBtn.innerHTML = '<i class="fas fa-paper-plane me-1"></i> Send OTP';
                sendOtpBtn.disabled = false;
            }
        });

        function startResendCountdown(button) {
            let timeLeft = 120;

            const originalText = '<i class="fas fa-paper-plane me-1"></i> Send OTP';

            button.classList.add('disabled');
            button.disabled = true;

            resendCountdown = setInterval(() => {
                button.innerHTML = `<i class="fas fa-clock me-1"></i> Resend in ${timeLeft}s`;
                timeLeft--;

                if (timeLeft < 0) {
                    clearInterval(resendCountdown);
                    button.innerHTML = '<i class="fas fa-redo me-1"></i> Resend OTP';
                    button.classList.remove('disabled');
                    button.disabled = false;
                }
            }, 1000);
        }

        // Disable authenticate button by default on OTP method
        document.querySelectorAll('.btn-auth-method').forEach(btn => {
            btn.addEventListener('click', function () {
                const method = this.dataset.method;
                const authBtn = document.querySelector('.btn-login');

                if (method === 'otp') {
                    authBtn.disabled = true;
                } else {
                    authBtn.disabled = false;
                }
            });
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
