<?php
class CartModel
{
    use Database;
    public function getCartByUserId($user_id)
    {
        $rs = $this->table("cart")
            ->getListItemsWithCondition(['user_id' => $user_id]);
        return $rs;
    }
    public function createCart($user_id, $product_id, $quantity)
    {
        $rs = $this->table('cart')
            ->insert(['user_id' => $user_id, 'product_id' => $product_id, 'quantity' => $quantity]);
        return $rs;
    }
    public function deleteCartItem($user_id, $product_id)
    {
        $rs = $this->table('cart')
            ->delete(['user_id' => $user_id, 'product_id' => $product_id]);
        return $rs;
    }
    public function updateQuantityCart($cart_id, $quantity)
    {
        $rs = $this->table('cart')
            ->update('id', $cart_id, ['quantity' => $quantity]);
        return $rs;
    }
}
