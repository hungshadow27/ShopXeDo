<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Quản Lý Người Dùng</h1>
    <a href="<?= ROOT ?>/admin/users/add" class="mb-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Thêm người dùng</a>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-rose-500">
                <th class="p-3">ID</th>
                <th class="p-3">Username</th>
                <th class="p-3">Vai trò</th>
                <th class="p-3">Tên</th>
                <th class="p-3">Ngày sinh</th>
                <th class="p-3">Giới tính</th>
                <th class="p-3">Địa chỉ</th>
                <th class="p-3">Số điện thoại</th>
                <th class="p-3">Ngày tạo</th>
                <th class="p-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $user->id; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($user->username); ?></td>
                    <td class="p-3"><?php echo $user->role_str; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($user->name); ?></td>
                    <td class="p-3"><?php echo $user->date_of_birth; ?></td>
                    <td class="p-3"><?php echo $user->gender_str; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($user->address); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($user->phone_number); ?></td>
                    <td class="p-3"><?php echo $user->created_at; ?></td>
                    <td class="p-3">
                        <a href="<?= ROOT ?>/admin/users/edit/<?php echo $user->id; ?>" class="text-blue-600 hover:underline">Sửa</a>
                        <a href="<?= ROOT ?>/admin/users/delete/<?php echo $user->id; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" class="text-red-600 hover:underline">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>