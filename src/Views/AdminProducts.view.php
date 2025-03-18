<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<main class="py-6 px-3 min-h-[1000px] ml-64">
    <h1 class="text-2xl font-bold mb-6 text-center">Quản Lý Sản Phẩm</h1>
    <a href="<?= ROOT ?>/admin/products/add" class="mb-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Thêm sản phẩm</a>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-rose-500">
                <th class="p-3">ID</th>
                <th class="p-3">Tên</th>
                <th class="p-3">Giá</th>
                <th class="p-3">Số lượng</th>
                <th class="p-3">Danh mục</th>
                <th class="p-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $product->id; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($product->name); ?></td>
                    <td class="p-3"><?php echo number_format($product->price, 0, ',', '.') . ' VNĐ'; ?></td>
                    <td class="p-3"><?php echo $product->stock_quantity; ?></td>
                    <td class="p-3"><?php echo $categories[$product->category_id - 1]->name ?? 'N/A'; ?></td>
                    <td class="p-3">
                        <a href="<?= ROOT ?>/admin/products/edit/<?php echo $product->id; ?>" class="text-blue-600 hover:underline">Sửa</a>
                        <a href="<?= ROOT ?>/admin/products/delete/<?php echo $product->id; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" class="text-red-600 hover:underline">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>