<?php
require_once "./src/Models/UserModel.php";
require_once "./src/Models/RatingModel.php";

class RatingController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('404.view');
    }
    public function add($a = '', $b = '', $c = '')
    {
        if (isset($_SESSION['USER'])) {
            $user = unserialize($_SESSION['USER']);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $order_id = $_POST["order_id"];
                $product_id = $_POST["product_id"];
                $star = $_POST["rating"];
                $comment = $_POST["comment"];
                $ratingModel = new RatingModel();
                $checkExist = $ratingModel->getRatingByUserProduct($order_id, $user->id, $product_id);
                if (!empty($checkExist)) {
                    $ratingModel->updateRating($checkExist[0]->id, $star, $comment);
                } else {
                    $ratingModel->addRatingForProduct($order_id, $user->id, $product_id, $star, $comment);
                }
                redirect('user/orders?status=2');
            } else {
                $this->view('404.view');
            }
        } else {
            redirect('login');
            exit;
        }
    }
}
