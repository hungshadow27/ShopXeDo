<?php require_once "./src/Views/layouts/headerAdmin.php"; ?>
<main class="py-6 px-3 min-h-[1000px] ml-64">
    <h1 class="text-2xl font-bold mb-6 text-center">Quản Lý Đơn Hàng</h1>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-rose-500">
                <th class="p-3">ID</th>
                <th class="p-3">Tên người đặt</th>
                <th class="p-3">Số điện thoại</th>
                <th class="p-3">Địa chỉ giao</th>
                <th class="p-3">Tổng tiền</th>
                <th class="p-3">Trạng thái</th>
                <th class="p-3">Ngày tạo</th>
                <th class="p-3">Hình thức</th>
                <th class="p-3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) { ?>
                <tr class="border-b">
                    <td class="p-3"><?php echo $order->id; ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($order->user_name); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($order->user_phone); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($order->shipping_address); ?></td>
                    <td class="p-3"><?php echo number_format($order->total_cost, 0, ',', '.') . ' VNĐ'; ?></td>
                    <td class="p-3"><?php echo $order->status_str; ?></td>
                    <td class="p-3"><?php echo $order->created_at; ?></td>
                    <td class="p-3"><?php echo $order->shipping_method === 'store' ? "Nhận tại cửa hàng" : "Giao hàng tận nơi" ?></td>
                    <td class="p-3">
                        <a href="<?= ROOT ?>/admin/orders/edit/<?php echo $order->id; ?>" class="text-blue-600 hover:underline">Sửa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require_once "./src/Views/layouts/footerAdmin.php"; ?>