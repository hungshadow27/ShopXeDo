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
    <title>Quan Ly Shop</title>
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
<?php require_once "./src/Models/ImageModel.php";
$imageModel = new ImageModel(); ?>

<body>
    <header class="w-full sticky top-0 left-0 right-0 z-50 bg-opacity-20 backdrop-blur-md bg-[#0f0f0f] text-white">
        <div class="header-bottom w-full border-b border-gray-500">
            <div class="flex items-center justify-between px-5 pb-1">
                <a class="flex items-center gap-1" href="<?= ROOT ?>/home">
                    <img src="<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName('logo')->file_name; ?>" alt="Logo" class="w-20">
                    <span class="text-3xl font-extrabold" style="color:white; text-shadow: 2px 2px 5px red;">QuanLyShop</span>
                </a>
                <div class="flex items-center justify-center gap-3">
                    <?php if (!empty($user)) : ?>
                        <a href="<?= ROOT ?>/user/profile" class="py-2 px-4 bg-white/10 border border-gray-500 rounded-3xl transition duration-300 ease-in-out hover:bg-white/20 cursor-pointer">
                            <i class="fa-regular fa-user mr-1" aria-hidden="true"></i>
                            <?= $user->username ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <div class="relative">
        <nav class="text-lg font-bold text-white bg-slate-700 w-64 h-screen fixed top-16 left-0 overflow-x-hidden p-3">
            <ul class="flex flex-col  gap-4">
                <li>
                    <a href="<?= ROOT ?>/admin/products"
                        class="<?= (strpos($_SERVER['REQUEST_URI'], '/admin/products') !== false) ? 'text-rose-500' : 'text-white' ?>">
                        Sản phẩm
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/admin/categories"
                        class="<?= (strpos($_SERVER['REQUEST_URI'], '/admin/categories') !== false) ? 'text-rose-500' : 'text-white' ?>">
                        Danh mục
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/admin/orders"
                        class="<?= (strpos($_SERVER['REQUEST_URI'], '/admin/orders') !== false) ? 'text-rose-500' : 'text-white' ?>">
                        Đơn hàng
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/admin/posts"
                        class="<?= (strpos($_SERVER['REQUEST_URI'], '/admin/posts') !== false) ? 'text-rose-500' : 'text-white' ?>">
                        Bài viết
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/admin/images"
                        class="<?= (strpos($_SERVER['REQUEST_URI'], '/admin/images') !== false) ? 'text-rose-500' : 'text-white' ?>">
                        Hình ảnh
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/admin/users"
                        class="<?= (strpos($_SERVER['REQUEST_URI'], '/admin/users') !== false) ? 'text-rose-500' : 'text-white' ?>">
                        Người dùng
                    </a>
                </li>
            </ul>
        </nav>
        <div class="w-full overflow-y-auto">