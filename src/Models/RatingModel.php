<?php
class RatingModel
{
    use Database;
    public function addRatingForProduct($order_id, $user_id, $product_id, $star, $comment)
    {
        $rs = $this->table("rating")
            ->insert([
                'order_id' => $order_id,
                'user_id' => $user_id,
                'product_id' => $product_id,
                'star' => $star,
                'comment' => $comment
            ]);
        return $rs;
    }
    public function getRatingForProduct($product_id)
    {
        $rs = $this->table("rating")
            ->offset(0)
            ->limit(99)
            ->getListItemsWithCondition(['product_id' => $product_id]);
        return $rs;
    }
    public function getRatingByUserProduct($order_id, $user_id, $product_id)
    {
        $rs = $this->table("rating")
            ->getListItemsWithCondition(['order_id' => $order_id, 'user_id' => $user_id, 'product_id' => $product_id]);
        return $rs;
    }
    public function updateRating($rating_id, $star, $comment)
    {
        $rs = $this->table("rating")
            ->update('id', $rating_id, ['star' => $star, 'comment' => $comment]);
        return $rs;
    }
}
