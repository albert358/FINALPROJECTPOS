<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in-down': 'fadeInDown 0.5s ease-out both',
                    },
                    keyframes: {
                        fadeInDown: {
                            '0%': { opacity: 0, transform: 'translateY(-20px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        }
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),
            url('<?= base_url('assets/img/auth_bg.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen backdrop-brightness-110">

<div class="bg-white bg-opacity-85 shadow-2xl rounded-xl p-8 w-full max-w-md animate-fade-in-down border border-gray-200">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Login</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login/auth') ?>" method="post" class="space-y-5">
        <?= csrf_field() ?>

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
            <div class="relative">
                <input type="text" id="username" name="username" value="<?= old('username') ?>"
                       class="w-full pl-10 pr-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                       required>
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A8 8 0 1117.804 5.121 8 8 0 015.121 17.804z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
            <div class="relative">
                <input type="password" id="password" name="password"
                       class="w-full px-4 pr-10 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                       required>
                <div class="absolute right-3 top-2.5 text-gray-500 cursor-pointer" onclick="togglePassword('password', this)">
                    👁️
                </div>
            </div>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition duration-300 shadow-md">
            Login
        </button>

        <p class="text-sm text-center mt-3">
            Don't have an account?
            <a href="<?= base_url('register') ?>" class="text-blue-600 hover:text-blue-800 font-medium">Register</a>
        </p>
    </form>
</div>

<!-- Show/Hide Password -->
<script>
    function togglePassword(fieldId, icon) {
        const input = document.getElementById(fieldId);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        icon.textContent = isPassword ? '🙈' : '👁️';
    }
</script>

</body>
</html>
