<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Quản Lý Danh Mục</h1>
    <a href="<?= ROOT ?>/admin/categories/add" class="mb-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Thêm danh mục</a>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-rose-500">
                <th class="p-3">ID</th>
                <th class="p-3">Tên</th>
                <th class="p-3">Mô tả</th>
                <th class="p-3">Hình ảnh</th>
                <th class="p-3">Nổi bật</th>
                <th class="p-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) { ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $category->id; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($category->name); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($category->description); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($category->image); ?></td>
                    <td class="p-3"><?php echo $category->featured ? 'Có' : 'Không'; ?></td>
                    <td class="p-3">
                        <a href="<?= ROOT ?>/admin/categories/edit/<?php echo $category->id; ?>" class="text-blue-600 hover:underline">Sửa</a>
                        <a href="<?= ROOT ?>/admin/categories/delete/<?php echo $category->id; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" class="text-red-600 hover:underline">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>