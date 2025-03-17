<?php
if (isset($_SESSION['USER'])) {
    $user = unserialize($_SESSION['USER']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Xe Do</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Tích hợp CKEditor 4.22.1 từ CDN -->
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/f997754f9b.js" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
    </style>

</head>

<body class="bg-[#0f0f0f] text-white">
    <header class="w-full sticky top-0 left-0 right-0 z-50 bg-opacity-20 backdrop-blur-md">
        <div class="header-top w-full">
            <div class="flex items-center justify-between w-full max-w-7xl mx-auto py-1">
                <div>
                    <a class="social-item inline-block mr-2 transition duration-300 ease-in-out hover:-translate-y-2 hover:scale-110 hover:text-blue-500" href="#"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    <a class="social-item inline-block mr-2 transition duration-300 ease-in-out hover:-translate-y-2 hover:scale-110 hover:text-red-500" href="#"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                </div>
                <span class="font-medium">Hotline: 0909-009-0009(8h-22h)</span>
            </div>
        </div>
        <div class="header-bottom w-full border-b border-gray-500">
            <div class="flex items-center justify-around px-5 pb-1">
                <a class="flex items-center gap-1" href="<?= ROOT ?>/home">
                    <img src="<?= ROOT ?>/Public/images/logowheel.png" alt="Logo" class="w-20">
                    <span class="text-3xl font-extrabold" style="color:white; text-shadow: 2px 2px 5px red;">DOXETIENLANG</span>
                </a>
                <ul class="flex items-center justify-center gap-4 font-bold text-white">
                    <li><a href="<?= ROOT ?>/home" class="transition duration-300 ease-in-out hover:text-rose-500">TRANG CHỦ</a></li>
                    <li><a href="<?= ROOT ?>/category" class="transition duration-300 ease-in-out hover:text-rose-500">SẢN PHẨM</a></li>
                    <li><a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">DỊCH VỤ</a></li>
                    <li><a href="<?= ROOT ?>/post" class="transition duration-300 ease-in-out hover:text-rose-500">BÀI VIẾT</a></li>
                    <li><a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">THÔNG TIN</a></li>
                    <li><a href="#" class="transition duration-300 ease-in-out hover:text-rose-500">LIÊN HỆ</a></li>
                </ul>
                <div class="flex items-center justify-center gap-3">
                    <a href="<?= ROOT ?>/cart" class="py-2 px-4 bg-white/10 border border-gray-500 rounded-3xl transition duration-300 ease-in-out hover:bg-white/20 cursor-pointer">
                        <i class="fa-solid fa-cart-shopping mr-1"></i>
                        GIỎ HÀNG
                        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success">
                            (<span id="cartItemsNumber"><?= isset($_SESSION['CART']) ? count($_SESSION['CART']) : "0" ?></span>)
                        </span>
                    </a>

                    <?php if (!empty($user)) : ?>
                        <a href="<?= ROOT ?>/user/orders" class="py-2 px-4 bg-white/10 border border-gray-500 rounded-3xl transition duration-300 ease-in-out hover:bg-white/20 cursor-pointer">
                            <i class="fa-regular fa-user mr-1" aria-hidden="true"></i>
                            <?= $user->username ?>
                        </a>
                        <?php if ($user->role == 'admin') : ?>
                            <a href="<?= ROOT ?>/admin/products" class="py-2 px-4 bg-white/10 border border-gray-500 rounded-3xl transition duration-300 ease-in-out hover:bg-white/20 cursor-pointer">
                                <i class="fa-regular fa-user mr-1" aria-hidden="true"></i>
                                QUẢN LÝ
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a href="<?= ROOT ?>/login" class="py-2 px-4 bg-white/10 border border-gray-500 rounded-3xl transition duration-300 ease-in-out hover:bg-white/20 cursor-pointer">
                            <i class="fa-solid fa-key mr-1" aria-hidden="true"></i>
                            ĐĂNG NHẬP
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>