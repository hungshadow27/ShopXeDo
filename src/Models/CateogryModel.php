<?php
class CategoryModel
{
    use Database;
    public function getFeaturedCategories()
    {
        $rs = $this->table("category")
            ->getListItemsWithCondition('featured', '1');
        return $rs;
    }
    public function getCategoryById($category_id)
    {
        $rs = $this->table("category")
            ->getOne('id', $category_id);
        return $rs;
    }
}
