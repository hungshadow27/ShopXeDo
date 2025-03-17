<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Quản Lý Bài Viết</h1>
    <a href="<?= ROOT ?>/admin/posts/add" class="mb-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Thêm bài viết</a>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-rose-500">
                <th class="p-3">ID</th>
                <th class="p-3">Tiêu đề</th>
                <th class="p-3">Ảnh đại diện</th>
                <th class="p-3">Ngày tạo</th>
                <th class="p-3">Ngày cập nhật</th>
                <th class="p-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) { ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $post->id; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($post->title); ?></td>
                    <td class="p-3">
                        <?php if ($post->thumbnail) { ?>
                            <img src="<?php echo htmlspecialchars($post->thumbnail); ?>" alt="Thumbnail" class="w-16 h-16 object-cover">
                        <?php } else { ?>
                            Chưa có ảnh
                        <?php } ?>
                    </td>
                    <td class="p-3"><?php echo $post->created_at; ?></td>
                    <td class="p-3"><?php echo $post->updated_at; ?></td>
                    <td class="p-3">
                        <a href="<?= ROOT ?>/admin/posts/edit/<?php echo $post->id; ?>" class="text-blue-600 hover:underline">Sửa</a>
                        <a href="<?= ROOT ?>/admin/posts/delete/<?php echo $post->id; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" class="text-red-600 hover:underline">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>