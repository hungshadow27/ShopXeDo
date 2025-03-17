<?php
require_once('./src/Models/CateogryModel.php');
require_once('./src/Models/ProductModel.php');
class CategoryController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();

        // Array to store categories with their products
        $categoriesProducts = [];

        $categories = $categoryModel->getAllCategory();
        foreach ($categories as $category) {
            $products = $productModel->get3ProductByCategory($category->id);
            // Create an array for each category with its products
            $categoriesProducts[] = [
                'id' => $category->id,
                'name' => $category->name, // Assuming category has a 'name' property
                'products' => $products    // Products returned from the model
            ];
        }
        $data['categoriesProducts'] = $categoriesProducts;

        $this->view('category.view', $data);
    }
}
