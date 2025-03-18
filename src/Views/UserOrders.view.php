<?php require_once "./src/Views/layouts/header.php";
require_once "./src/Models/RatingModel.php";
require_once "./src/Models/ImageModel.php";
$imageModel = new ImageModel();
$ratingModel = new RatingModel();

?>
<main class="max-w-6xl w-full mx-auto flex items-start justify-between gap-3 py-6">
    <!-- Thanh bên -->
    <aside class="md:w-1/4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-6">Tài Khoản</h2>
        <nav class="space-y-4">
            <div class="w-full">
                <a href="<?= ROOT ?>/user/orders" class="text-rose-500 transition duration-300 ease-in-out hover:text-rose-500">
                    Quản lý đơn hàng
                </a>
            </div>
            <div class="w-full">
                <a href="<?= ROOT ?>/user/profile" class="transition duration-300 ease-in-out hover:text-rose-500">
                    Chỉnh sửa hồ sơ
                </a>
            </div>
            <div class="w-full">
                <a href="<?= ROOT ?>/logout" class="transition duration-300 ease-in-out hover:text-rose-500">
                    Đăng xuất
                </a>
            </div>
        </nav>
    </aside>
    <div class="md:w-3/4 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Danh sách đơn hàng</h1>
        <nav class="flex gap-4 p-4 bg-gray-100 rounded-lg mb-6">
            <a href="<?= ROOT ?>/user/orders" class="px-4 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors duration-300 <?= !isset($_GET['status']) ? 'bg-blue-500 text-white hover:bg-blue-600' : '' ?>">
                Tất cả
            </a>
            <a href="<?= ROOT ?>/user/orders?status=0" class="px-4 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors duration-300 <?= isset($_GET['status']) && $_GET['status'] == '0' ? 'bg-blue-500 text-white hover:bg-blue-600' : '' ?>">
                Đang chuẩn bị
            </a>
            <a href="<?= ROOT ?>/user/orders?status=1" class="px-4 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors duration-300 <?= isset($_GET['status']) && $_GET['status'] == '1' ? 'bg-blue-500 text-white hover:bg-blue-600' : '' ?>">
                Đang giao hàng
            </a>
            <a href="<?= ROOT ?>/user/orders?status=2" class="px-4 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors duration-300 <?= isset($_GET['status']) && $_GET['status'] == '2' ? 'bg-blue-500 text-white hover:bg-blue-600' : '' ?>">
                Hoàn Thành
            </a>
            <a href="<?= ROOT ?>/user/orders?status=-1" class="px-4 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900 transition-colors duration-300 <?= isset($_GET['status']) && $_GET['status'] == '-1' ? 'bg-blue-500 text-white hover:bg-blue-600' : '' ?>">
                Đã huỷ
            </a>
        </nav>
        <div id="accordion-collapse" data-accordion="open">
            <?php if (!empty($orders)) : ?>
                <?php foreach ($orders as $key => $order) : ?>
                    <h2 id="accordion-collapse-heading-<?= $key ?>">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-<?= $key ?>" aria-expanded="false" aria-controls="accordion-collapse-body-<?= $key ?>">
                            <span>Đơn hàng ID: <?= $order->id ?> <span class="text-rose-500 font-medium"><?= $order->statusstr ?></span></span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-<?= $key ?>" class="hidden" aria-labelledby="accordion-collapse-heading-<?= $key ?>">
                        <div class="flex items-center justify-between w-full border border-gray-500 p-3 font-medium text-center">
                            <span class="w-2/6">Sản phẩm</span>
                            <span class="w-1/6">Đơn giá</span>
                            <span class="w-1/6">Số lượng</span>
                            <span class="w-1/6">Tổng chi phí</span>
                        </div>
                        <?php if (!empty($order->products)) : ?>
                            <div class="order-container">
                                <?php foreach ($order->products as $op) : ?>
                                    <div class="flex items-center justify-between w-full border border-gray-500 p-3 text-center">
                                        <img class="w-1/6" src="<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName(unserialize($op->product->image)[0])->file_name; ?>" alt="">
                                        <span class="w-1/6"><?= $op->product->name ?? 'N/A' ?></span>
                                        <span class="w-1/6"><?= number_format($op->product->price ?? 0, 0, ',', '.') ?>đ</span>
                                        <span class="w-1/6"><?= $op->quantity ?? 0 ?></span>
                                        <span class="w-1/6"><?= number_format($order->total_cost ?? 0, 0, ',', '.') ?>đ</span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <p class="p-3">Không có sản phẩm trong đơn hàng này.</p>
                        <?php endif; ?>
                        <div class="w-full flex items-center gap-3 justify-end border border-t-0 border-gray-800 rounded-b-xl mb-3 text-right p-3">
                            <a href="<?= ROOT ?>/user/orders?id=<?= $order->id ?>" class="px-3 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700">Chi tiết</a>
                            <?php if ($order->status == 2) : ?>
                                <button data-modal-target="review-modal-<?= $order->id ?>" data-modal-toggle="review-modal-<?= $order->id ?>" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Đánh giá
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Modal cho từng đơn hàng -->
                    <div id="review-modal-<?= $order->id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-3xl max-h-full">
                            <div class="relative bg-white rounded-t-lg dark:bg-gray-700">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Đánh giá đơn hàng #<?= $order->id ?>
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="review-modal-<?= $order->id ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-4 md:p-5 space-y-4">
                                    <?php foreach ($order->products as $op) : ?>
                                        <div class="w-full border border-gray-500 p-3 text-center">
                                            <div class="flex items-center gap-3">
                                                <img class="w-1/6" src="<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName(unserialize($op->product->image)[0])->file_name; ?>" alt="<?= $op->product->name ?>">
                                                <span><?= $op->product->name ?? 'N/A' ?></span>
                                            </div>
                                            <form action="<?= ROOT ?>/rating/add" method="POST" class="mt-3 w-full text-black">
                                                <input type="hidden" name="order_id" value="<?= $order->id ?>">
                                                <input type="hidden" name="product_id" value="<?= $op->product->id ?>">
                                                <?php $rating = $ratingModel->getRatingByUserProduct($order->id, $user->id, $op->product->id); ?>
                                                <div class="mb-4">
                                                    Đánh giá
                                                    <select name="rating" class="w-full p-2 border rounded">
                                                        <option value="5">5 ★</option>
                                                        <option value="4">4 ★</option>
                                                        <option value="3">3 ★</option>
                                                        <option value="2">2 ★</option>
                                                        <option value="1">1 ★</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    Bình luận
                                                    <input value="<?php if (!empty($rating)) echo $rating[0]->comment ?>" name="comment" placeholder="Viết bình luận của bạn..." class="w-full p-2 border rounded bg-white"></input>
                                                </div>
                                                <button type="submit" name="submit_rating" class="cursor-pointer w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                                                    Gửi đánh giá
                                                </button>
                                            </form>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="p-5 text-center">Bạn chưa có đơn hàng nào.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>