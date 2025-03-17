<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Sản Phẩm</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form chỉnh sửa sản phẩm -->
    <form action="<?= ROOT ?>/admin/products/edit/<?php echo $product->id; ?>" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <label class="block text-sm font-medium mb-1">Tên sản phẩm</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product->name); ?>" class="text-black w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Mô tả</label>
            <textarea name="description" id="description" class="text-black w-full p-2 border rounded focus:outline-none focus:border-blue-500" rows="4"><?php echo htmlspecialchars($product->description); ?></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Hình ảnh (cách nhau bởi dấu phẩy)</label>
            <input type="text" name="images" value="<?php echo htmlspecialchars(implode(',', unserialize($product->image))); ?>" class="text-black w-full p-2 border rounded focus:outline-none focus:border-blue-500" placeholder="image1.jpg,image2.jpg">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Giá (VNĐ)</label>
            <input type="number" name="price" step="1000" value="<?php echo $product->price; ?>" class="text-black w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Số lượng tồn</label>
            <input type="number" name="stock_quantity" value="<?php echo $product->stock_quantity; ?>" class="text-black w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Danh mục</label>
            <select name="category_id" class="text-black w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category->id; ?>" <?php echo $product->category_id == $category->id ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category->name); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="<?= ROOT ?>/admin/products" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>
</main>
<script>
    CKEDITOR.replace('description');
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>