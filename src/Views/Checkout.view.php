<?php require "./src/Views/layouts/header.php";
$totalCost1 = 0;
$transportFee = 30000;
?>
<main class="mb-4 p-3">
    <div class="mt-3 p-3 border border-gray-500 rounded-sm">
        <div class="text-xl font-medium">ĐỊA CHỈ NHẬN HÀNG</div>
        <div class="">
            <span class="font-bold mr-4"><?= $user->name ?> - <?= $user->phone_number ?></span><span><?= $user->address ?></span>
            <a href="#" class="ml-4 text-rose-500">Thay đổi</a>
        </div>
    </div>
    <div class="mt-3 p-3 border border-gray-500 rounded-sm">
        <div class="w-full flex text-center">
            <span class="w-1/4 font-bold">Sản phẩm</span>
            <span class="w-1/4">Đơn giá</span>
            <span class="w-1/4">Số lượng</span>
            <span class="w-1/4">Thành tiền</span>
        </div>
        <hr />
        <?php foreach ($products as $product) :
            $totalCost1 += $product->price * $product->quantity ?>
            <div class="w-full flex items-center text-center mt-4">
                <div class="w-1/4">
                    <div class="flex items-center">
                        <img class="w-25" src="<?= ROOT ?>/Public/images/<?php echo $imageModel->getImageByName(unserialize($product->image)[0])->file_name; ?>" alt="" />
                        <span class="font-bold px-3"><?= $product->name ?></span>
                    </div>
                </div>
                <div class="w-1/4"><?= number_format($product->price) ?>₫</div>
                <div class="w-1/4"><?= $product->quantity ?></div>
                <div class="w-1/4"><?= number_format($product->price * $product->quantity) ?>₫</div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-3 p-4 border border-gray-500 rounded-sm">
        <div class="flex items-center justify-between">
            <span class="fs-5 font-bold">Phương thức thanh toán</span>
            <div>
                <span class="mx-5">Thanh toán khi nhận hàng COD</span><a href="#" class="text-rose-500">THAY ĐỔI</a>
            </div>
        </div>
        <form method="GET" action="<?= ROOT ?>/checkout/success">
            <div class="flex items-center justify-between">
                <span class="fs-5 font-bold">Hình thức nhận hàng</span>
                <div>
                    <div>
                        <label>
                            <input type="radio" name="shipping_method" value="store" required>
                            Nhận tại cửa hàng
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="shipping_method" value="home" required>
                            Giao hàng tận nơi
                        </label>
                    </div>
                </div>
            </div>

            <!-- Truyền thêm totalcost như hidden input -->
            <input type="hidden" name="totalcost" value="<?= $totalCost1 + $transportFee ?>">
            <hr />
            <div class="flex items-center justify-between mt-4">
                <div class="text-start">
                    <div class="">Tổng tiền hàng</div>
                    <div class="">Phí vận chuyển</div>
                    <div class="">Tổng thanh toán</div>
                </div>
                <div class="text-end">
                    <div class=""><?= number_format($totalCost1) ?>₫</div>
                    <div class=""><?= number_format($transportFee) ?>₫</div>
                    <div class="fs-4 text-rose-500"><?= number_format($totalCost1 + $transportFee) ?>₫</div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="inline-block mt-10 px-5 py-3 bg-rose-500 text-white rounded-lg">Đặt hàng</button>
            </div>
        </form>
    </div>
</main>
<?php require "./src/Views/layouts/footer.php";
