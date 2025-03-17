<?php require_once "./src/Views/layouts/header.php";
require_once "./src/Models/UserModel.php";
$userModel = new UserModel();
?>
<main class="container mx-auto py-8">
    <?php
    // Giả lập dữ liệu sản phẩm (thay bằng database trong thực tế)
    $product_id = isset($_GET['id']) ? $_GET['id'] : 1;

    $related_products = [
        ['id' => 2, 'name' => 'Găng tay moto', 'price' => 250000, 'image' => 'gangtay.jpg'],
        ['id' => 3, 'name' => 'Giáp bảo hộ', 'price' => 800000, 'image' => 'giap.jpg'],
        ['id' => 4, 'name' => 'Giày moto', 'price' => 1200000, 'image' => 'giay.jpg'],
    ];
    ?>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Chi tiết sản phẩm -->
        <div class="md:col-span-3 p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hình ảnh sản phẩm -->
                <div class="product-gallery">
                    <div class="main-image-container">
                        <img src="Public/images/<?php echo unserialize($product->image)[0]; ?>"
                            alt="<?php echo $product->name; ?>"
                            class="w-full h-96 object-cover rounded-lg mb-4 main-product-image">
                    </div>
                    <div class="flex gap-2 thumbnail-container">
                        <?php foreach (unserialize($product->image) as $image) { ?>
                            <img src="Public/images/<?php echo $image ?>"
                                alt="<?php echo $product->name; ?>"
                                class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75 thumbnail">
                        <?php } ?>
                    </div>
                </div>

                <!-- Thông tin sản phẩm -->
                <div>
                    <h1 class="text-2xl font-bold mb-4"><?php echo $product->name; ?></h1>
                    <p class="text-red-600 text-xl font-semibold mb-2">
                        <?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ
                    </p>
                    <p class="text-yellow-500 mb-2">Đánh giá: <?= $ratingProduct ?>/5 ★</p>
                    <button onclick="addCart(event, <?= $product->id ?>)" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 mb-4">
                        Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Mô tả sản phẩm</h3>
                <div><?php echo $product->description; ?></div>
            </div>
            <!-- Bình luận -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Bình luận</h2>
                <?php foreach ($ratings as $rating) { ?>
                    <div class="border-b py-4">
                        <p class="font-medium"><?php echo $userModel->getUserById($rating->user_id)->name; ?> - @<?php echo $userModel->getUserById($rating->user_id)->username; ?></p>
                        <p class="text-yellow-500">Đánh giá: <?php echo $rating->star; ?>/5 ★</p>
                        <p class=""><?php echo $rating->comment; ?></p>
                    </div>
                <?php } ?>


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
<style>
    .product-gallery {
        position: relative;
    }

    .main-image-container {
        position: relative;
        overflow: hidden;
    }

    .main-product-image {
        transition: transform 0.2s ease;
        transform-origin: center center;
    }

    .main-image-container:hover .main-product-image {
        transform: scale(1.5);
        /* Adjust zoom level as needed */
    }

    .thumbnail:hover {
        opacity: 1 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnailContainer = document.querySelector('.thumbnail-container');
        const mainImage = document.querySelector('.main-product-image');
        const mainImageContainer = document.querySelector('.main-image-container');

        // Thumbnail click handler
        thumbnailContainer.addEventListener('click', function(e) {
            const thumbnail = e.target.closest('.thumbnail');
            if (!thumbnail) return;

            mainImage.src = thumbnail.src;

            document.querySelectorAll('.thumbnail').forEach(img => {
                img.classList.remove('opacity-100');
                img.classList.add('opacity-75');
            });

            thumbnail.classList.remove('opacity-75');
            thumbnail.classList.add('opacity-100');
        });

        // Zoom functionality
        mainImageContainer.addEventListener('mousemove', function(e) {
            const rect = mainImageContainer.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            mainImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
        });

        // Reset transform origin when mouse leaves
        mainImageContainer.addEventListener('mouseleave', function() {
            mainImage.style.transformOrigin = 'center center';
        });
    });
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>