<?php require_once "./src/Views/layouts/header.php"; ?>
<main class="max-w-4xl w-full mx-auto py-6 min-h-96">
    <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($post->title); ?></h1>

    <div class="text-gray-500 mb-6">
        <span>Đăng ngày: <?php echo $post->created_at; ?></span> |
        <span>Cập nhật: <?php echo $post->updated_at; ?></span>
    </div>

    <?php if ($post->thumbnail) { ?>
        <img src="<?php echo htmlspecialchars($post->thumbnail); ?>" alt="<?php echo htmlspecialchars($post->title); ?>" class="w-full h-64 object-cover mb-6 rounded">
    <?php } ?>

    <div class="prose max-w-none">
        <?php echo $post->content; ?>
    </div>

    <div class="mt-6">
        <a href="<?= ROOT ?>/post" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Quay lại danh sách</a>
    </div>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>