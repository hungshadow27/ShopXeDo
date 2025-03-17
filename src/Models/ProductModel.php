<?php
class ProductModel
{
    use Database;
    public function getListProductByCategory($category_id)
    {
        $rs = $this->table("product")
            ->offset(0)
            ->limit(6)
            ->getListItemsWithCondition(['category_id' => $category_id]);
        return $rs;
    }
    public function get3ProductByCategory($category_id)
    {
        $rs = $this->table("product")
            ->offset(0)
            ->limit(3)
            ->getListItemsWithCondition(['category_id' => $category_id]);
        return $rs;
    }
    public function getProductBySearch($search_str)
    {
        $rs = $this->table("product")
            ->search($search_str, 'name', 99, 0);
        return $rs;
    }
    public function getProductById($product_id)
    {
        $rs = $this->table("product")
            ->getOne('id', $product_id);
        return $rs;
    }
    public function getAllProduct()
    {
        $rs = $this->table("product")
            ->getAll();
        return $rs;
    }
    public function addNewProduct($name, $description, $image, $price, $stock_quantity, $category_id)
    {
        $rs = $this->table('product')
            ->insert([
                'name' => $name,
                'description' => $description,
                'image' => $image,
                'price' => $price,
                'stock_quantity' => $stock_quantity,
                'category_id' => $category_id
            ]);
        return $rs;
    }
    public function UpdateProduct($id, $name, $description, $image, $price, $stock_quantity, $category_id)
    {
        $rs = $this->table('product')
            ->update('id', $id, [
                'name' => $name,
                'description' => $description,
                'image' => $image,
                'price' => $price,
                'stock_quantity' => $stock_quantity,
                'category_id' => $category_id
            ]);
        return $rs;
    }
    public function deleteProduct($product_id)
    {
        $rs = $this->table("product")
            ->delete(['id' => $product_id]);
        return $rs;
    }
}
