<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<main class="py-6 px-3 min-h-[1000px] ml-64">
    <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Bài Viết</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form chỉnh sửa bài viết -->
    <form action="<?= ROOT ?>/admin/posts/edit/<?php echo $post->id; ?>" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <label class="block text-sm font-medium mb-1">Tiêu đề</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($post->title); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Ảnh đại diện</label>
            <input type="text" name="thumbnail" value="<?php echo htmlspecialchars($post->thumbnail ?? ''); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" placeholder="Nhập tên ảnh">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Nội dung</label>
            <textarea name="content" id="content" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" rows="10"><?php echo htmlspecialchars($post->content); ?></textarea>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="<?= ROOT ?>/admin/posts" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>
</main>
<script>
    CKEDITOR.replace('content');
</script>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>