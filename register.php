<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register - Cashier Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in-down': 'fadeInDown 0.6s ease-out both',
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
            url('<?= base_url('assets/img/auth_bg.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

<div class="bg-white bg-opacity-85 shadow-2xl rounded-xl p-8 w-full max-w-md animate-fade-in-down border border-gray-200 backdrop-brightness-110">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Register as Cashier</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 animate-fade-in-down">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 animate-fade-in-down">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('register/save') ?>" method="post" class="space-y-5">
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
            <?php if (isset($validation) && $validation->hasError('username')): ?>
                <p class="text-red-500 text-xs mt-1"><?= $validation->getError('username') ?></p>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
            <div class="relative">
                <input type="password" id="password" name="password"
                       class="w-full pl-10 pr-10 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                       required>
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 11c0-1.105-.895-2-2-2s-2 .895-2 2m8-2a2 2 0 10-4 0v4a2 2 0 004 0v-4zm-4 8a4 4 0 110-8 4 4 0 010 8z"/>
                    </svg>
                </div>
                <div class="absolute right-3 top-2.5 text-gray-500 cursor-pointer" onclick="togglePassword('password', this)">
                    👁️
                </div>
            </div>
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <p class="text-red-500 text-xs mt-1"><?= $validation->getError('password') ?></p>
            <?php endif; ?>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-1">Confirm Password</label>
            <div class="relative">
                <input type="password" id="confirm_password" name="confirm_password"
                       class="w-full px-4 pr-10 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                       required>
                <div class="absolute right-3 top-2.5 text-gray-500 cursor-pointer" onclick="togglePassword('confirm_password', this)">
                    👁️
                </div>
            </div>
            <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                <p class="text-red-500 text-xs mt-1"><?= $validation->getError('confirm_password') ?></p>
            <?php endif; ?>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition duration-300 shadow-md">
            Register
        </button>

        <p class="text-sm text-center mt-3">
            Already have an account?
            <a href="<?= base_url('login') ?>" class="text-blue-600 hover:text-blue-800 font-medium">Login</a>
        </p>
    </form>
</div>

<!-- Password Toggle Script -->
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
