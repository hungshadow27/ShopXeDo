<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Danh Mục</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form chỉnh sửa danh mục -->
    <form action="<?= ROOT ?>/admin/categories/edit/<?php echo $category->id; ?>" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <label class="block text-sm font-medium mb-1">Tên danh mục</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($category->name); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Mô tả</label>
            <textarea name="description" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" rows="4"><?php echo htmlspecialchars($category->description); ?></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Hình ảnh</label>
            <input type="text" name="image" value="<?php echo htmlspecialchars($category->image); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" placeholder="category_image.jpg">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Nổi bật</label>
            <input type="checkbox" name="featured" value="1" <?php echo $category->featured ? 'checked' : ''; ?> class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="<?= ROOT ?>/admin/categories" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>