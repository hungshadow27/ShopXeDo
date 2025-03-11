<?php
require_once "./src/Models/CateogryModel.php";
class HomeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $categoryModel = new CategoryModel();
        $featuredCategories = $categoryModel->getFeaturedCategories();
        $data['featuredCategories'] = $featuredCategories;
        $this->view('home.view', $data);
    }
}
