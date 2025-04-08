<?php require_once "./src/Views/layouts/header.php"; ?>
<main>
    <div class="max-w-6xl w-full mx-auto mb-36">
        <h1 class="font-bold text-2xl text-center mb-4 mt-16">DANH MỤC SẢN PHẨM</h1>
        <span class="block w-36 h-1 bg-rose-500 mx-auto mb-20"></span>
        <!-- Thanh tìm kiếm -->
        <div class="mb-8">
            <form action="product" method="GET" class="max-w-xl mx-auto">
                <div class="relative">
                    <input type="text" name="search"
                        placeholder="Tìm kiếm sản phẩm..."
                        class="w-full p-3 pr-10 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500"
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <?php
        // Hiển thị danh mục và sản phẩm

        foreach ($categoriesProducts as $category) {
        ?>
            <section class="mb-12">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold"><?php echo $category['name']; ?></h2>
                    <a href="<?= ROOT ?>/product?category_id=<?php echo $category['id']; ?>"
                        class="text-blue-600 hover:text-blue-800 font-medium">
                        Xem thêm →
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <?php foreach ($category['products'] as $product) { ?>
                        <a href="<?= ROOT ?>/product?id=<?php echo $product->id; ?>" class="rounded-lg shadow-md overflow-hidden">
                            <img src="Public/images/<?php echo $imageModel->getImageByName(unserialize($product->image)[0])->file_name; ?>"
                                alt="<?php echo $product->name; ?>"
                                class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-medium"><?php echo $product->name; ?></h3>
                                <p class="text-red-600 font-semibold">
                                    <?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ
                                </p>
                                <?php if ($product->stock_quantity > 0): ?>
                                    <button onclick="addCart(event, <?= $product->id ?>)" class="mt-2 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                                        Thêm vào giỏ
                                    </button>
                                <?php else: ?>
                                    <button class="mt-2 w-full border-2 border-red-500 text-red-500 py-2 rounded">
                                        Hết hàng
                                    </button>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </section>
        <?php
        }
        ?>
    </div>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>