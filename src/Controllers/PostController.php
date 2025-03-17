<?php
require_once "./src/Models/PostModel.php";

class PostController
{
    use Controller;

    public function index($a = '', $b = '', $c = '')
    {
        $postModel = new PostModel();

        if (!isset($_GET['id'])) { // Danh sách bài viết
            // Lấy tất cả bài viết
            $posts = $postModel->getAllPosts();

            // Tham số phân trang
            $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $per_page = 6; // Số bài viết mỗi trang

            // Lọc bài viết theo tìm kiếm (nếu có)
            $filtered_posts = array_filter($posts, function ($post) use ($search_query) {
                $match = true;
                if ($search_query && strpos(strtolower($post->title), strtolower($search_query)) === false) {
                    $match = false;
                }
                return $match;
            });
            $filtered_posts = array_values($filtered_posts);

            // Phân trang
            $total_posts = count($filtered_posts);
            $total_pages = ceil($total_posts / $per_page);
            $page = max(1, min($page, $total_pages));
            $start = ($page - 1) * $per_page;
            $paginated_posts = array_slice($filtered_posts, $start, $per_page);

            // Truyền dữ liệu sang view
            $data['search_query'] = $search_query;
            $data['total_pages'] = $total_pages;
            $data['page'] = $page;
            $data['paginated_posts'] = $paginated_posts;

            $this->view('ListPost.view', $data);
        } elseif (isset($_GET['id'])) { // Chi tiết bài viết
            $post_id = $_GET['id'];
            $post = $postModel->getPostById($post_id);

            if (!$post) {
                $this->view('404.view');
                return;
            }

            // Truyền dữ liệu sang view
            $data['post'] = $post;
            $this->view('PostDetail.view', $data);
        } else {
            $this->view('404.view');
        }
    }
}
