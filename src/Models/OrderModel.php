<?php
class OrderModel
{
    use Database;
    public function createNewOrder($user_id, $product, $shippingAddress, $totalCost, $status, $ispaid)
    {
        $rs = $this->table('orders')
            ->insert([
                'user_id' => $user_id,
                'product' => $product,
                'shipping_address' => $shippingAddress,
                'total_cost' => $totalCost,
                'status' => $status,
                'ispaid' => $ispaid
            ]);
        return $rs;
    }
    public function getOrdersByUserId($user_id)
    {
        $rs = $this->table('orders')
            ->limit(999)
            ->offset(0)
            ->getListItemsWithCondition(['user_id' => $user_id]);
        $orders = array();
        foreach ($rs as $r) {
            $orders[] = $r;
        }
        return $orders;
    }
    public function getOrderByStatus($user_id, $status)
    {
        $rs = $this->table('orders')
            ->getListItemsWithCondition(['user_id' => $user_id, 'status' => $status]);
        return $rs;
    }
    public function getAllOrder()
    {
        $rs = $this->table('orders')
            ->limit(999)
            ->offset(0)
            ->getAll();
        $orders = array();
        foreach ($rs as $r) {
            $orders[] = $r;
        }
        return $orders;
    }
    public function updateOrderById($order_id, $user_id, $product, $shippingAddress, $totalCost, $status, $ispaid, $finish_date)
    {
        $rs = $this->table('orders')
            ->update('id', $order_id, [
                'user_id' => $user_id,
                'product' => $product,
                'shippingAddress' => $shippingAddress,
                'totalCost' => $totalCost,
                'total_cost' => $totalCost,
                'status' => $status,
                'ispaid' => $ispaid,
                'finish_date' => $finish_date
            ]);
    }
    public function deleteOrderById($order_id)
    {
        $rs = $this->table('orders')
            ->delete(['id' => $order_id]);
    }

    public function getOrderById($order_id)
    {
        $rs = $this->table("orders")
            ->getOne('id', $order_id);
        return $rs;
    }

    public function updateOrder($id, $shipping_address, $status, $finish_date = null)
    {
        $data = [
            'shipping_address' => $shipping_address,
            'status' => $status
        ];
        if ($finish_date) {
            $data['finish_date'] = $finish_date;
        }
        $rs = $this->table('orders')
            ->update('id', $id, $data);
        return $rs;
    }

    public function getOrderStatusStr($status)
    {
        switch ($status) {
            case -1:
                return 'Đã hủy';
            case 0:
                return 'Đang chuẩn bị';
            case 1:
                return 'Đang giao hàng';
            case 2:
                return 'Đã giao hàng';
            default:
                return 'Không xác định';
        }
    }
}
