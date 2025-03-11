<?php
class CategoryController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('category.view');
    }
}
