<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="container mx-auto py-8">
    <?php
    // Giả lập dữ liệu sản phẩm (thay bằng database trong thực tế)
    $product_id = isset($_GET['id']) ? $_GET['id'] : 1;
    $product = [
        'id' => 1,
        'name' => 'Mũ bảo hiểm Fullface',
        'price' => 1500000,
        'rating' => 4.5,
        'description' => 'Mũ bảo hiểm Fullface chất lượng cao, thiết kế hiện đại, bảo vệ tối ưu cho người lái xe.',
        'images' => ['fullface1.jpg', 'fullface2.jpg', 'fullface3.jpg'],
        'category' => 'Phụ kiện bảo hộ'
    ];

    $related_products = [
        ['id' => 2, 'name' => 'Găng tay moto', 'price' => 250000, 'image' => 'gangtay.jpg'],
        ['id' => 3, 'name' => 'Giáp bảo hộ', 'price' => 800000, 'image' => 'giap.jpg'],
        ['id' => 4, 'name' => 'Giày moto', 'price' => 1200000, 'image' => 'giay.jpg'],
    ];

    $comments = [
        ['user' => 'Nguyễn Văn A', 'rating' => 5, 'comment' => 'Sản phẩm rất tốt, đáng tiền!'],
        ['user' => 'Trần Thị B', 'rating' => 4, 'comment' => 'Mũ đẹp, nhưng hơi nặng một chút.'],
    ];
    ?>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Chi tiết sản phẩm -->
        <div class="md:col-span-3 p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hình ảnh sản phẩm -->
                <div>
                    <img src="Public/images/menu1.jpg"
                        alt="<?php echo $product['name']; ?>"
                        class="w-full h-96 object-cover rounded-lg mb-4">
                    <div class="flex gap-2">
                        <?php foreach (array_slice($product['images'], 1) as $image) { ?>
                            <img src="images/<?php echo $image; ?>"
                                alt="<?php echo $product['name']; ?>"
                                class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75">
                        <?php } ?>
                    </div>
                </div>

                <!-- Thông tin sản phẩm -->
                <div>
                    <h1 class="text-2xl font-bold mb-4"><?php echo $product['name']; ?></h1>
                    <p class="text-red-600 text-xl font-semibold mb-2">
                        <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ
                    </p>
                    <p class="text-yellow-500 mb-2">Đánh giá: <?php echo $product['rating']; ?>/5 ★</p>
                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 mb-4">
                        Thêm vào giỏ hàng
                    </button>
                    <div class="">
                        <h3 class="font-semibold mb-2">Mô tả sản phẩm</h3>
                        <p><?php echo $product['description']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Bình luận -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Bình luận</h2>
                <?php foreach ($comments as $comment) { ?>
                    <div class="border-b py-4">
                        <p class="font-medium"><?php echo $comment['user']; ?></p>
                        <p class="text-yellow-500">Đánh giá: <?php echo $comment['rating']; ?>/5 ★</p>
                        <p class=""><?php echo $comment['comment']; ?></p>
                    </div>
                <?php } ?>

                <!-- Form thêm bình luận -->
                <form action="" method="POST" class="mt-6">
                    <h3 class="font-semibold mb-2">Thêm bình luận của bạn</h3>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Đánh giá</label>
                        <select name="rating" class="w-full p-2 border rounded">
                            <option value="5">5 ★</option>
                            <option value="4">4 ★</option>
                            <option value="3">3 ★</option>
                            <option value="2">2 ★</option>
                            <option value="1">1 ★</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <textarea name="comment"
                            placeholder="Viết bình luận của bạn..."
                            class="w-full p-2 border rounded"
                            rows="4"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Gửi bình luận
                    </button>
                </form>
            </div>
        </div>

        <!-- Sản phẩm liên quan -->
        <div class="p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Sản phẩm liên quan</h2>
            <?php foreach ($related_products as $related) { ?>
                <div class="flex gap-4 mb-4">
                    <img src="Public/images/menu1.jpg"
                        alt="<?php echo $related['name']; ?>"
                        class="w-16 h-16 object-cover rounded">
                    <div>
                        <a href="<?= ROOT ?>/product?id=<?php echo $related['id']; ?>"
                            class="text-blue-600 hover:underline">
                            <?php echo $related['name']; ?>
                        </a>
                        <p class="text-red-600 font-semibold">
                            <?php echo number_format($related['price'], 0, ',', '.'); ?> VNĐ
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>