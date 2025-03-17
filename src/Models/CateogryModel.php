<?php
class CategoryModel
{
    use Database;
    public function getFeaturedCategories()
    {
        $rs = $this->table("category")
            ->getListItemsWithCondition(['featured' => '1']);
        return $rs;
    }
    public function getCategoryById($category_id)
    {
        $rs = $this->table("category")
            ->getOne('id', $category_id);
        return $rs;
    }
    public function getAllCategory()
    {
        $rs = $this->table("category")
            ->getAll();
        return $rs;
    }

    public function addCategory($name, $description, $image, $featured)
    {
        $rs = $this->table('category')
            ->insert([
                'name' => $name,
                'description' => $description,
                'image' => $image,
                'featured' => $featured
            ]);
        return $rs;
    }

    public function updateCategory($id, $name, $description, $image, $featured)
    {
        $rs = $this->table('category')
            ->update('id', $id, [
                'name' => $name,
                'description' => $description,
                'image' => $image,
                'featured' => $featured
            ]);
        return $rs;
    }

    public function deleteCategory($category_id)
    {
        $rs = $this->table("category")
            ->delete(['id' => $category_id]);
        return $rs;
    }
}
