<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto flex items-start justify-between gap-3 py-6">
    <!-- Thanh bên -->
    <aside class="md:w-1/4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-6">Tài Khoản</h2>
        <nav class="space-y-4">
            <div class="w-full">
                <a href="<?= ROOT ?>/user/orders"
                    class="transition duration-300 ease-in-out hover:text-rose-500">
                    Quản lý đơn hàng
                </a>
            </div>
            <div class="w-full">
                <a href="<?= ROOT ?>/user/profile"
                    class="text-rose-500 transition duration-300 ease-in-out hover:text-rose-500">
                    Chỉnh sửa hồ sơ
                </a>
            </div>
            <div class="w-full">
                <a href="<?= ROOT ?>/logout"
                    class="transition duration-300 ease-in-out hover:text-rose-500">
                    Đăng xuất
                </a>
            </div>
        </nav>
    </aside>
    <div class="md:w-3/4 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Hồ Sơ</h1>

        <!-- Thông báo -->
        <?php if ($success) { ?>
            <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
        <?php } elseif ($error) { ?>
            <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
        <?php } ?>

        <!-- Form chỉnh sửa -->
        <form action="profile" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
            <div>
                <label class="block text-sm font-medium mb-1" for="name">Họ và tên</label>
                <input type="text" id="name" name="name"
                    value="<?php echo htmlspecialchars($user->name); ?>"
                    class="bg-black w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="username">Username</label>
                <input type="username" id="username" name="username"
                    value="<?php echo htmlspecialchars($user->username); ?>"
                    class="w-full p-2 border rounded bg-white/10"
                    disabled>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone"
                    value="<?php echo htmlspecialchars($user->phone_number); ?>"
                    class="bg-black w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1" for="address">Địa chỉ</label>
                <input type="text" id="address" name="address"
                    value="<?php echo htmlspecialchars($user->address); ?>"
                    class="bg-black w-full p-2 border rounded focus:outline-none focus:border-blue-500"
                    required>
            </div>

            <!-- Đổi mật khẩu -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold mb-4">Đổi mật khẩu (nếu muốn)</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1" for="current_password">Mật khẩu hiện tại</label>
                        <input type="password" id="current_password" name="current_password"
                            class="bg-black w-full p-2 border rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="new_password">Mật khẩu mới</label>
                        <input type="password" id="new_password" name="new_password"
                            class="bg-black w-full p-2 border rounded focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="confirm_password">Xác nhận mật khẩu mới</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="bg-black w-full p-2 border rounded focus:outline-none focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="cursor-pointer flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Cập nhật
                </button>
                <a href="user.php"
                    class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">
                    Quay lại
                </a>
            </div>
        </form>
    </div>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>