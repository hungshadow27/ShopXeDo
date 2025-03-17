<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Người Dùng</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form chỉnh sửa người dùng -->
    <form action="<?= ROOT ?>/admin/users/edit/<?php echo $user->id; ?>" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <label class="block text-sm font-medium mb-1">ID</label>
            <input type="text" value="<?php echo $user->id; ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user->username); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Mật khẩu mới (để trống nếu không đổi)</label>
            <input type="password" name="password" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Vai trò</label>
            <select name="role" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
                <option value="admin" <?php echo $user->role == 'admin' ? 'selected' : ''; ?>>Quản trị viên</option>
                <option value="staff" <?php echo $user->role == 'staff' ? 'selected' : ''; ?>>Nhân viên</option>
                <option value="customer" <?php echo $user->role == 'customer' ? 'selected' : ''; ?>>Khách hàng</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Họ và tên</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user->name); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Ngày sinh</label>
            <input type="date" name="date_of_birth" value="<?php echo $user->date_of_birth; ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Giới tính</label>
            <select name="gender" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
                <option value="0" <?php echo $user->gender == 0 ? 'selected' : ''; ?>>Nữ</option>
                <option value="1" <?php echo $user->gender == 1 ? 'selected' : ''; ?>>Nam</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Địa chỉ</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($user->address); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Số điện thoại</label>
            <input type="text" name="phone_number" value="<?php echo htmlspecialchars($user->phone_number); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Ngày tạo</label>
            <input type="text" value="<?php echo $user->created_at; ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="<?= ROOT ?>/admin/users" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>