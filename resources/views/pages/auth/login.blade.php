<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris | Login Page</title>
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!--end::Required Plugin(Bootstrap 5)-->
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            font-family: 'Source Sans 3', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }

        .login-left {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e22ce 100%);
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("{{ asset('img/tanahbumbu.png') }}") center/contain no-repeat;
            opacity: 0.1;
            z-index: 0;
        }

        .login-left > * {
            position: relative;
            z-index: 1;
        }

        .logo-img {
            width: 120px;
            height: 150px;
            object-fit: cover;
            /* border-radius: 50%; */
            border: 4px solid white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .pemda-logo {
            width: 180px;
            height: auto;
            margin-top: 20px;
        }

        .login-right {
            padding: 50px 40px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .btn-refresh {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .btn-refresh:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
        }

        .captcha-display {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            padding: 15px;
            border-radius: 10px;
            min-width: 120px;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .input-group-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }

        @media (max-width: 768px) {
            .login-left {
                padding: 30px 20px;
            }
            .login-right {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="row g-0">
                <!-- Left Side - Images & Branding -->
                <div class="col-md-5 login-left">
                    <img src="{{ asset('img/kades.jpeg') }}" alt="Kepala Desa" class="logo-img">
                    <h3 class="text-center mb-2 fw-bold">Sistem Layanan Surat</h3>
                    <p class="text-center mb-4">Pemerintah Desa Tapus <br> Kecamatan Teluk Kepayang</p>
                    <img src="{{ asset('img/tanahbumbu.png') }}" alt="Logo Tanah Bumbu" class="pemda-logo">
                </div>

                <!-- Right Side - Login Form -->
                <div class="col-md-7 login-right">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold" style="color: #667eea;">Selamat Datang</h2>
                        <p class="text-muted">Silahkan Login untuk melanjutkan</p>
                    </div>

                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan email" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Captcha -->
                        <div class="mb-4">
                            <label for="captcha" class="form-label fw-semibold">Captcha</label>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="captcha-display">
                                    <span id="captcha-question">Loading...</span>
                                </div>
                                <button type="button" onclick="refreshCaptcha()" class="btn btn-refresh">
                                    <i class="bi bi-arrow-clockwise"></i> Refresh
                                </button>
                            </div>
                            <input type="text" id="captcha" name="captcha"
                                class="form-control @error('captcha') is-invalid @enderror"
                                placeholder="Masukkan hasil perhitungan" required>
                            @error('captcha')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-login">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)-->

    <script>
        // Load captcha on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadCaptcha();
        });

        function loadCaptcha() {
            fetch('{{ url("simple-captcha") }}', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('captcha-question').textContent = data.question;
                })
                .catch(error => {
                    console.error('Error loading captcha:', error);
                    document.getElementById('captcha-question').textContent = '3 + 5 = ?';
                });
        }

        function refreshCaptcha() {
            document.getElementById('captcha-question').textContent = 'Loading...';
            document.getElementById('captcha').value = '';
            loadCaptcha();
        }
    </script>
</body>

</html>
