<?php
require_once("./src/Models/ProductModel.php");
require_once("./src/Models/CateogryModel.php");
require_once("./src/Models/RatingModel.php");
class ProductController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (!isset($_GET['category_id']) && isset($_GET['search'])) {
            $productModel = new ProductModel();
            $category = new stdClass();
            $category->name = '';
            $search_query = $_GET['search'];
            $products = $productModel->getProductBySearch($search_query);

            $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : '';
            $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : '';
            $rating = isset($_GET['rating']) ? (int)$_GET['rating'] : '';
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $per_page = 6; // Số sản phẩm mỗi trang



            // Lọc sản phẩm
            $filtered_products = array_filter($products, function ($product) use ($search_query, $min_price, $max_price, $rating) {
                $match = true;
                if ($search_query && strpos(strtolower($product->name), strtolower($search_query)) === false) $match = false;
                if ($min_price && $product->price < $min_price) $match = false;
                if ($max_price && $product->price > $max_price) $match = false;
                if ($rating && $product['rating'] < $rating) $match = false;
                return $match;
            });
            $filtered_products = array_values($filtered_products);
            $total_products = count($filtered_products);
            $total_pages = ceil($total_products / $per_page);
            $page = max(1, min($page, $total_pages));
            $start = ($page - 1) * $per_page;
            $paginated_products = array_slice($filtered_products, $start, $per_page);
            //rating for product
            $ratingModel = new RatingModel();
            $ratingForProduct = 5;
            $ratingProduct = [];
            foreach ($paginated_products as $product) {
                $ratings = $ratingModel->getRatingForProduct($product->id);
                if (!empty($ratings)) {
                    $totalRating = 0;
                    $ratingCount = count($ratings);
                    foreach ($ratings as $rating) {
                        $totalRating += $rating->star;
                    }
                    $ratingForProduct = $ratingCount > 0 ? round($totalRating / $ratingCount, 1) : 0;
                }
                $ratingProduct[$product->id] = $ratingForProduct;
            }
            //Truyền data sang view
            $data['search_query'] = $search_query;
            $data['min_price'] = $min_price;
            $data['max_price'] = $max_price;
            $data['rating'] = $rating;
            $data['total_pages'] = $total_pages;
            $data['page'] = $page;
            $data['ratingProduct'] = $ratingProduct;
            $data['category'] = $category;
            $data['paginated_products'] = $paginated_products;
            //var_dump($paginated_products);
            $this->view('productlist.view', $data);
        } elseif (isset($_GET['category_id']) && !isset($_GET['search'])) {
            $category_id = $_GET['category_id'];
            $productModel = new ProductModel();
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryById($category_id);
            // Lấy sản phẩm theo danh mục
            $products = $productModel->getListProductByCategory($category_id);
            $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : '';
            $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : '';
            $rating = isset($_GET['rating']) ? (int)$_GET['rating'] : '';
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $per_page = 6; // Số sản phẩm mỗi trang
            // Lọc sản phẩm
            $filtered_products = array_filter($products, function ($product) use ($min_price, $max_price, $rating) {
                $match = true;
                if ($min_price && $product->price < $min_price) $match = false;
                if ($max_price && $product->price > $max_price) $match = false;
                if ($rating && $product['rating'] < $rating) $match = false;
                return $match;
            });
            $filtered_products = array_values($filtered_products);
            $total_products = count($filtered_products);
            $total_pages = ceil($total_products / $per_page);
            $page = max(1, min($page, $total_pages));
            $start = ($page - 1) * $per_page;
            $paginated_products = array_slice($filtered_products, $start, $per_page);
            //rating for product
            $ratingModel = new RatingModel();
            $ratingForProduct = 5;
            $ratingProduct = [];
            foreach ($paginated_products as $product) {
                $ratings = $ratingModel->getRatingForProduct($product->id);
                if (!empty($ratings)) {
                    $totalRating = 0;
                    $ratingCount = count($ratings);
                    foreach ($ratings as $rating) {
                        $totalRating += $rating->star;
                    }
                    $ratingForProduct = $ratingCount > 0 ? round($totalRating / $ratingCount, 1) : 0;
                }
                $ratingProduct[$product->id] = $ratingForProduct;
            }
            //Truyền data sang view
            $data['search_query'] = '';
            $data['min_price'] = $min_price;
            $data['max_price'] = $max_price;
            $data['rating'] = $rating;
            $data['total_pages'] = $total_pages;
            $data['page'] = $page;
            $data['ratingProduct'] = $ratingProduct;
            $data['category'] = $category;
            $data['paginated_products'] = $paginated_products;
            //var_dump($paginated_products);
            $this->view('productlist.view', $data);
        } elseif (isset($_GET['category_id']) && isset($_GET['search'])) {  //Get list product by category
            $category_id = $_GET['category_id'];
            $productModel = new ProductModel();
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryById($category_id);
            // Lấy sản phẩm theo danh mục
            $products = $productModel->getListProductByCategory($category_id);

            $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
            $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : '';
            $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : '';
            $rating = isset($_GET['rating']) ? (int)$_GET['rating'] : '';
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $per_page = 6; // Số sản phẩm mỗi trang



            // Lọc sản phẩm
            $filtered_products = array_filter($products, function ($product) use ($search_query, $min_price, $max_price, $rating) {
                $match = true;
                if ($search_query && strpos(strtolower($product->name), strtolower($search_query)) === false) $match = false;
                if ($min_price && $product->price < $min_price) $match = false;
                if ($max_price && $product->price > $max_price) $match = false;
                if ($rating && $product['rating'] < $rating) $match = false;
                return $match;
            });
            $filtered_products = array_values($filtered_products);
            $total_products = count($filtered_products);
            $total_pages = ceil($total_products / $per_page);
            $page = max(1, min($page, $total_pages));
            $start = ($page - 1) * $per_page;
            $paginated_products = array_slice($filtered_products, $start, $per_page);
            //rating for product
            $ratingModel = new RatingModel();
            $ratingForProduct = 5;
            $ratingProduct = [];
            foreach ($paginated_products as $product) {
                $ratings = $ratingModel->getRatingForProduct($product->id);
                if (!empty($ratings)) {
                    $totalRating = 0;
                    $ratingCount = count($ratings);
                    foreach ($ratings as $rating) {
                        $totalRating += $rating->star;
                    }
                    $ratingForProduct = $ratingCount > 0 ? round($totalRating / $ratingCount, 1) : 0;
                }
                $ratingProduct[$product->id] = $ratingForProduct;
            }
            //Truyền data sang view
            $data['search_query'] = $search_query;
            $data['min_price'] = $min_price;
            $data['max_price'] = $max_price;
            $data['rating'] = $rating;
            $data['total_pages'] = $total_pages;
            $data['page'] = $page;

            $data['ratingProduct'] = $ratingProduct;
            $data['category'] = $category;
            $data['paginated_products'] = $paginated_products;
            //var_dump($paginated_products);
            $this->view('productlist.view', $data);
        } elseif (isset($_GET['id'])) { //Product Detail
            $product_id = $_GET['id'];
            $productModel = new ProductModel();
            $product = $productModel->getProductById($product_id);
            //rating for product
            $ratingModel = new RatingModel();
            $ratingForProduct = 5;
            $ratings = $ratingModel->getRatingForProduct($product->id);
            if (!empty($ratings)) {
                $totalRating = 0;
                $ratingCount = count($ratings);
                foreach ($ratings as $rating) {
                    $totalRating += $rating->star;
                }
                $ratingForProduct = $ratingCount > 0 ? round($totalRating / $ratingCount, 1) : 0;
            }
            $data['ratings'] = $ratings;
            $data['ratingProduct'] = $ratingForProduct;

            $data['product'] = $product;
            $this->view('productdetail.view', $data);
        } else {
            $this->view('404.view');
        }
    }
}
