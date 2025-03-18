<!-- login_register.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập / Đăng Ký</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        .tab-active {
            @apply bg-blue-600 text-white;
        }

        .tab-inactive {
            @apply bg-gray-200 text-gray-700 hover:bg-gray-300;
        }
    </style>
</head>
<?php require_once "./src/Models/ImageModel.php";
$imageModel = new ImageModel(); ?>

<body class="text-white" style="background-image: url('<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName('loginbg')->file_name; ?>');background-position: center top; background-repeat: no-repeat;  background-size: cover;">
    <a class="flex items-center justify-center gap-1 py-20" href="<?= ROOT ?>/home">
        <img src="<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName('logo')->file_name; ?>" alt="Logo" class="w-20">
        <span class="text-3xl font-extrabold" style="color:white; text-shadow: 2px 2px 5px red;">DOXETIENLANG</span>
    </a>
    <div class="flex items-center justify-center">
        <div class="p-8 rounded-lg shadow-md w-full max-w-md bg-opacity-20 backdrop-blur-sm">
            <!-- Tabs -->
            <div class="flex mb-6">
                <button id="login-tab"
                    class="flex-1 py-2 rounded-l-lg tab-active"
                    onclick="showForm('login')">
                    Đăng Nhập
                </button>
                <button id="register-tab"
                    class="flex-1 py-2 rounded-r-lg tab-inactive"
                    onclick="showForm('register')">
                    Đăng Ký
                </button>
            </div>

            <!-- Thông báo lỗi -->
            <?php if ($error) { ?>
                <p class="text-red-500 text-center mb-4"><?php echo $error; ?></p>
            <?php } ?>

            <!-- Form đăng nhập -->
            <form id="login-form" action="<?= ROOT ?>/login/signin" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="login-username">Username</label>
                    <input type="username" id="login-username" name="username"
                        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="login-password">Mật khẩu</label>
                    <input type="password" id="login-password" name="password"
                        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
                <button type="submit" name="login"
                    class="cursor-pointer w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Đăng Nhập
                </button>
                <p class="text-sm text-center">
                    <a href="#" class="text-blue-600 hover:underline">Quên mật khẩu?</a>
                </p>
            </form>

            <!-- Form đăng ký -->
            <form id="register-form" action="<?= ROOT ?>/login/signup" method="POST" class="space-y-4 hidden">
                <div>
                    <label class="block text-sm font-medium mb-1" for="register-username">Username</label>
                    <input type="username" id="register-username" name="username"
                        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="register-password">Mật khẩu</label>
                    <input type="password" id="register-password" name="password"
                        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="confirm-password">Xác nhận mật khẩu</label>
                    <input type="password" id="confirm-password" name="repassword"
                        class="w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
                <button type="submit" name="register"
                    class="cursor-pointer w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Đăng Ký
                </button>
            </form>
        </div>
    </div>


    <script>
        function showForm(formType) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');

            if (formType === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginTab.classList.remove('tab-inactive');
                loginTab.classList.add('tab-active');
                registerTab.classList.remove('tab-active');
                registerTab.classList.add('tab-inactive');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                loginTab.classList.remove('tab-active');
                loginTab.classList.add('tab-inactive');
                registerTab.classList.remove('tab-inactive');
                registerTab.classList.add('tab-active');
            }
        }
    </script>
</body>

</html>