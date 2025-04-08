<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<main class="py-6 px-3 min-h-[1000px] ml-64">
    <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh Sửa Đơn Hàng</h1>

    <!-- Thông báo -->
    <?php if ($success) { ?>
        <p class="text-green-600 text-center mb-4"><?php echo $success; ?></p>
    <?php } elseif ($error) { ?>
        <p class="text-red-600 text-center mb-4"><?php echo $error; ?></p>
    <?php } ?>

    <!-- Form chỉnh sửa đơn hàng -->
    <form action="<?= ROOT ?>/admin/orders/edit/<?php echo $order->id; ?>" method="POST" class="space-y-6 p-3 border border-gray-500 rounded-md">
        <div>
            <label class="block text-sm font-medium mb-1">ID Đơn hàng</label>
            <input type="text" value="<?php echo $order->id; ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tên người đặt</label>
            <input type="text" value="<?php echo htmlspecialchars($orderUser->name ?? 'N/A'); ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Số điện thoại</label>
            <input type="text" value="<?php echo htmlspecialchars($orderUser->phone_number ?? 'N/A'); ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Địa chỉ giao hàng</label>
            <input type="text" name="shipping_address" value="<?php echo htmlspecialchars($order->shipping_address); ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Tổng tiền</label>
            <input type="text" value="<?php echo number_format($order->total_cost, 0, ',', '.') . ' VNĐ'; ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Hình thức nhận hàng</label>
            <select name="shipping_method" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required onchange="toggleFinishDate(this)">
                <option value="store" <?php echo $order->shipping_method == 'store' ? 'selected' : ''; ?>>Nhận tại cửa hàng</option>
                <option value="home" <?php echo $order->shipping_method == 'home' ? 'selected' : ''; ?>>Giao hàng tận nơi</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Trạng thái</label>
            <select name="status" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" required onchange="toggleFinishDate(this)">
                <option value="-1" <?php echo $order->status == -1 ? 'selected' : ''; ?>>Đã hủy</option>
                <option value="0" <?php echo $order->status == 0 ? 'selected' : ''; ?>>Đang chuẩn bị</option>
                <option value="1" <?php echo $order->status == 1 ? 'selected' : ''; ?>>Đang giao hàng</option>
                <option value="2" <?php echo $order->status == 2 ? 'selected' : ''; ?>>Đã giao hàng</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Ngày tạo</label>
            <input type="text" value="<?php echo $order->created_at; ?>" class="w-full p-2 border rounded bg-gray-100" disabled>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Ngày hoàn thành</label>
            <input type="datetime-local" name="finish_date" value="<?php echo $order->finish_date ? date('Y-m-d\TH:i', strtotime($order->finish_date)) : ''; ?>" class="w-full p-2 border rounded focus:outline-none focus:border-blue-500" id="finish_date" <?php echo $order->status != 2 ? 'disabled' : ''; ?>>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Sản phẩm</label>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Tên sản phẩm</th>
                        <th class="p-2">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderProducts as $op) { ?>
                        <tr class="border-b">
                            <td class="p-2"><?php echo htmlspecialchars($op->product->name); ?></td>
                            <td class="p-2"><?php echo $op->quantity; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Cập nhật</button>
            <a href="<?= ROOT ?>/admin/orders" class="flex-1 text-center bg-gray-500 py-2 rounded hover:bg-gray-400">Quay lại</a>
        </div>
    </form>

    <!-- JavaScript để bật/tắt finish_date -->
    <script>
        function toggleFinishDate(select) {
            const finishDateInput = document.getElementById('finish_date');
            if (select.value == '2') {
                finishDateInput.disabled = false;
            } else {
                finishDateInput.disabled = true;
                finishDateInput.value = ''; // Xóa giá trị nếu không phải "Đã giao hàng"
            }
        }
    </script>
</main>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>