<?php require_once "./src/Views/layouts/header.php";
require_once "./src/Models/ImageModel.php";
$imageModel = new ImageModel(); ?>
<main class="max-w-6xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Danh Sách Bài Viết</h1>

    <!-- Form tìm kiếm -->
    <form action="<?= ROOT ?>/post" method="GET" class="mb-6 flex justify-center gap-4">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Tìm kiếm bài viết..." class="p-2 border rounded focus:outline-none focus:border-blue-500 w-1/2">
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Tìm</button>
    </form>

    <!-- Danh sách bài viết -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($paginated_posts as $post) { ?>
            <div class="border rounded-lg p-4 shadow hover:shadow-lg transition-shadow">
                <?php if ($post->thumbnail) { ?>
                    <img src="Public/images/<?php echo $imageModel->getImageByName($post->thumbnail)->file_name; ?>" alt="<?php echo htmlspecialchars($post->title); ?>" class="w-full h-48 object-cover mb-2 rounded">
                <?php } ?>
                <h2 class="text-lg font-semibold mb-2"><?php echo htmlspecialchars($post->title); ?></h2>
                <p class="text-gray-600 mb-2"><?php echo substr(strip_tags($post->content), 0, 100) . '...'; ?></p>
                <p class="text-sm text-gray-500">Đăng ngày: <?php echo $post->created_at; ?></p>
                <a href="<?= ROOT ?>/post?id=<?php echo $post->id; ?>" class="text-blue-600 hover:underline mt-2 inline-block">Xem chi tiết</a>
            </div>
        <?php } ?>
    </div>

    <!-- Phân trang -->
    <?php if ($total_pages > 1) { ?>
        <div class="mt-6 flex justify-center gap-2">
            <?php if ($page > 1) { ?>
                <a href="<?= ROOT ?>/post?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search_query); ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Trang trước</a>
            <?php } ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="<?= ROOT ?>/post?page=<?php echo $i; ?>&search=<?php echo urlencode($search_query); ?>" class="px-4 py-2 <?php echo $i === $page ? 'bg-blue-600 text-white' : 'bg-gray-200'; ?> rounded hover:bg-gray-300"><?php echo $i; ?></a>
            <?php } ?>

            <?php if ($page < $total_pages) { ?>
                <a href="<?= ROOT ?>/post?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search_query); ?>" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Trang sau</a>
            <?php } ?>
        </div>
    <?php } ?>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>