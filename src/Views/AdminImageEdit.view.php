<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<main class="py-6 px-3 min-h-[1000px] ml-64">
    <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Hình Ảnh</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form chỉnh sửa Hình Ảnh -->
    <form action="<?= ROOT ?>/admin/images/edit/<?php echo $image->id; ?>" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <img src="<?= ROOT ?>/Public/images/<?php echo $image->file_name; ?>" alt="" class="max-w-96">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tên Hình Ảnh</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($image->name); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="<?= ROOT ?>/admin/images" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>
</main>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>