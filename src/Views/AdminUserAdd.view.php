<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Thêm Người Dùng</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form thêm người dùng -->
    <form action="<?= ROOT ?>/admin/users/add" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <label class="block text-sm font-medium mb-1">Username</label>
            <input type="text" name="username" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Mật khẩu</label>
            <input type="password" name="password" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Vai trò</label>
            <select name="role" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
                <option value="admin">Quản trị viên</option>
                <option value="staff">Nhân viên</option>
                <option value="customer">Khách hàng</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Họ và tên</label>
            <input type="text" name="name" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Ngày sinh</label>
            <input type="date" name="date_of_birth" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Giới tính</label>
            <select name="gender" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
                <option value="0">Nữ</option>
                <option value="1">Nam</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Địa chỉ</label>
            <input type="text" name="address" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Số điện thoại</label>
            <input type="text" name="phone_number" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Thêm</button>
            <a href="<?= ROOT ?>/admin/users" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>