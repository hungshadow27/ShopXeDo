<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-8"><?php echo htmlspecialchars($category->name); ?></h1>

    <!-- Thanh tìm kiếm -->
    <form action="product" method="GET" class="mb-8">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <input type="text" name="search"
                    placeholder="Tìm kiếm sản phẩm..."
                    class="w-full p-3 pr-10 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500"
                    value="<?php echo htmlspecialchars($search_query); ?>">
                <button type="submit"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            <?php if ($category->name = '') { ?>
                <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category->id); ?>">
            <?php } ?>
        </div>
    </form>

    <!-- Bộ lọc -->
    <form action="" method="GET" class="mb-8 p-4 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Giá tối thiểu (VNĐ)</label>
                <input type="number" name="min_price"
                    value="<?php echo $min_price; ?>"
                    class="w-full p-2 border rounded"
                    min="0" step="10000">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Giá tối đa (VNĐ)</label>
                <input type="number" name="max_price"
                    value="<?php echo $max_price; ?>"
                    class="w-full p-2 border rounded"
                    min="0" step="10000">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Đánh giá tối thiểu</label>
                <select name="rating" class="w-full p-2 border rounded bg-[#0f0f0f]">
                    <option value="">Tất cả</option>
                    <option value="4" <?php echo $rating == 4 ? 'selected' : ''; ?>>4★ trở lên</option>
                    <option value="3" <?php echo $rating == 3 ? 'selected' : ''; ?>>3★ trở lên</option>
                    <option value="2" <?php echo $rating == 2 ? 'selected' : ''; ?>>2★ trở lên</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category->id); ?>">
        <input type="hidden" name="search" value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Áp dụng bộ lọc
        </button>
    </form>

    <!-- Danh sách sản phẩm -->
    <?php if (empty($paginated_products)) { ?>
        <p class="text-center text-gray-500">Không tìm thấy sản phẩm nào phù hợp.</p>
    <?php } else { ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach ($paginated_products as $product) { ?>
                <a href="<?= ROOT ?>/product?id=<?php echo $product->id; ?>" class="rounded-lg shadow-md overflow-hidden">
                    <img src="Public/images/<?php echo unserialize($product->image)[0]; ?>"
                        alt="<?php echo $product->name; ?>"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-medium"><?php echo $product->name; ?></h3>
                        <p class="text-red-600 font-semibold">
                            <?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ
                        </p>
                        <p class="text-sm text-yellow-300">Đánh giá: <?= $ratingProduct[$product->id] ?>/5★</p>
                        <button onclick="addCart(event, <?= $product->id ?>)" class="mt-2 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            Thêm vào giỏ
                        </button>
                    </div>
                </a>
            <?php } ?>
        </div>

        <!-- Phân trang -->
        <?php if ($total_pages > 1) { ?>
            <div class="mt-8 flex justify-center gap-2">
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <a href="?category_id=<?php echo urlencode($category->id); ?>&search=<?php echo urlencode($search_query); ?>&min_price=<?php echo $min_price; ?>&max_price=<?php echo $max_price; ?>&rating=<?php echo 'rating'; ?>&page=<?php echo $i; ?>"
                        class="px-4 py-2 rounded <?php echo $page == $i ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>