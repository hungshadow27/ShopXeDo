<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<main class="py-6 px-3 min-h-[1000px] ml-64">
    <h1 class="text-2xl font-bold mb-6 text-center">Quản Lý Hình Ảnh</h1>
    <a href="<?= ROOT ?>/admin/images/add" class="mb-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Thêm Hình Ảnh</a>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-rose-500">
                <th class="p-3">ID</th>
                <th class="p-3">Hình ảnh</th>
                <th class="p-3">Tên</th>
                <th class="p-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image) { ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $image->id; ?></td>
                    <td class="p-3"><img src="<?= ROOT ?>/Public/images/<?php echo $image->file_name; ?>" alt="" class="max-w-28"></td>
                    <td class="p-3"><?php echo htmlspecialchars($image->name); ?></td>
                    <td class="p-3">
                        <a href="<?= ROOT ?>/admin/images/edit/<?php echo $image->id; ?>" class="text-blue-600 hover:underline">Sửa</a>
                        <a href="<?= ROOT ?>/admin/images/delete/<?php echo $image->id; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" class="text-red-600 hover:underline">Xóa</a>
                        <!-- The text field -->
                        <input type="text" value="<?php echo htmlspecialchars($image->name); ?>" id="myInput<?php echo $image->id; ?>" class="hidden">
                        <!-- The text field -->
                        <input type="text" value="<?= ROOT ?>/Public/images/<?php echo $image->file_name; ?>" id="myInput1<?php echo $image->id; ?>" class="hidden">
                        <!-- The button used to copy the text -->
                        <button class="text-violet-500 cursor-pointer" onclick="copyName('<?php echo $image->id; ?>')">CopyName</button>
                        <button class="text-violet-500 cursor-pointer" onclick="copyLink('<?php echo $image->id; ?>')">CopyLink</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Phân trang -->
    <?php if ($total_pages > 1) { ?>
        <div class="mt-8 flex justify-center gap-2">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>"
                    class="px-4 py-2 rounded <?php echo $page == $i ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
</main>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>