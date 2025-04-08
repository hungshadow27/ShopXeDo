<?php require_once "./src/Views/layouts/header.php";
require_once "./src/Models/ImageModel.php";
$imageModel = new ImageModel(); ?>
<main class="p-4">
    <h1 class="text-2xl text-center font-medium uppercase">Chi tiết đơn hàng</h1>
    <div class="mt-3 p-3 border border-gray-500 rounded-sm">
        <div class="text-xl font-medium">ĐỊA CHỈ NHẬN HÀNG</div>
        <div class="flex items-center justify-between">
            <span class="font-bold mr-4 text-rose-500">Tên người nhận: <?= $user->name ?> - Số điện thoại: <?= $user->phone_number ?> - Địa chỉ: <?= $user->address ?></span>
            <span class="font-bold mr-4 text-rose-500">ID đơn hàng: <?= $order->id ?> - Ngày đặt hàng: <?= $order->created_at ?> - Trạng Thái: <?= $order->statusstr ?></span>
            <?php if (!empty($order->finish_date)): ?>
                <span class="font-bold mr-4 text-rose-500">Ngày giao hàng: <?= $order->finish_date ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="mt-3 p-3 border border-gray-500 rounded-sm">
        <div class="w-full flex text-center py-2">
            <span class="w-1/4 font-bold">Sản phẩm</span>
            <span class="w-1/4">Đơn giá</span>
            <span class="w-1/4">Số lượng</span>
            <span class="w-1/4">Thành tiền</span>
        </div>
        <hr />
        <?php foreach ($order->products as $op) : ?>
            <div class="w-full flex items-center text-center mt-4">
                <div class="w-1/4">
                    <div class="flex items-center">
                        <img class="w-25" src="<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName(unserialize($op->product->image)[0])->file_name; ?>" alt="" />
                        <span class="font-bold px-3"><?= $op->product->name ?></span>
                    </div>
                </div>
                <div class="w-1/4"><?= number_format($op->product->price) ?>₫</div>
                <div class="w-1/4"><?= $op->quantity ?></div>
                <div class="w-1/4"><?= number_format($op->product->price * $op->quantity) ?>₫</div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-3 p-4 border border-gray-500 rounded-sm">
        <div class="flex items-center justify-between py-2">
            <span class="fs-5 font-bold">Phương thức thanh toán</span>
            <div>
                <span class="mx-5 text-rose-500">Thanh toán khi nhận hàng(COD)</span>
            </div>
        </div>
        <div class="flex items-center justify-between py-2">
            <span class="fs-5 font-bold">Hình thức nhận hàng</span>
            <div>
                <span class="mx-5 text-rose-500"><?= $order->shipping_method === 'store' ?  "Nhận tại cửa hàng" : "Giao hàng tận nơi" ?></span>
            </div>
        </div>
        <hr />
        <div class="flex items-center justify-between mt-4">
            <div class="text-start">
                <div class="">Tổng tiền hàng</div>
                <div class="">Phí vận chuyển</div>
                <div class="">Tổng thanh toán</div>
            </div>
            <div class="text-end">
                <div class=""><?= number_format($order->total_cost - 30000) ?>₫</div>
                <div class=""><?= number_format(30000) ?>₫</div>
                <div class="fs-4 text-rose-500"><?= number_format($order->total_cost) ?>₫</div>
            </div>
        </div>
        <div class="text-end">
            <a href="<?= ROOT ?>/support" class="inline-block mt-10 px-5 py-3 bg-rose-500 text-white rounded-lg">Liên hệ CSKH</a>
        </div>

    </div>
</main>
<?php require_once "./src/Views/layouts/footer.php"; ?>