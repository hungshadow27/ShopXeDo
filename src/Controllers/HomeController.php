<?php
require_once "./src/Models/CateogryModel.php";
require_once "./src/Models/PostModel.php";
class HomeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $categoryModel = new CategoryModel();
        $featuredCategories = $categoryModel->getFeaturedCategories();
        $postModel = new PostModel();
        $recentlyPosts = $postModel->getRecentlyPosts();
        $data['featuredCategories'] = $featuredCategories;
        $data['recentlyPosts'] = $recentlyPosts;
        $this->view('home.view', $data);
    }
}
