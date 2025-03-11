<?php
class ProductModel
{
    use Database;
    public function getListProductByCategory($category_id)
    {
        $rs = $this->table("product")
            ->offset(0)
            ->limit(6)
            ->getListItemsWithCondition('category_id', $category_id);
        return $rs;
    }
}
