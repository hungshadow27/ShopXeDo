<?php
require "./src/Models/ProductModel.php";
require "./src/Models/OrderModel.php";
class CheckoutController
{
    use Controller;

    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_POST['productForCheckout'])) {
            $productForCheckout = $_POST['productForCheckout'];
            if (isset($_SESSION['productForCheckout'])) {
                unset($_SESSION['productForCheckout']);
            }
            $_SESSION['productForCheckout'] = $productForCheckout;
        } else {
            echo "0";
        }
    }

    public function order()
    {
        if (!isset($_SESSION['productForCheckout']) || !isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = unserialize($_SESSION['USER']);
        if ($user->name == '' || $user->phone_number == '' || $user->address == '') {
            echo "<script>alert('Bạn cần cập nhật thông tin số điện thoại, tên và địa chỉ nhận hàng!');
            window.location.replace('" . ROOT . "/account');
            </script>";
            exit;
        }
        $productForCheckout = $_SESSION['productForCheckout'];
        $productModel = new ProductModel;
        $products = array();
        foreach ($productForCheckout as $pd) {
            $productTemp = $productModel->getProductById($pd['id']);
            $productTemp->quantity = $pd['quantity'];
            $products[] = $productTemp;
        }
        $data['products'] = $products;
        $data['user'] = $user;

        $this->view('checkout.view', $data);
    }

    public function success()
    {
        if (!isset($_GET['totalcost']) || !isset($_SESSION['USER']) || !isset($_SESSION['productForCheckout'])) {
            redirect('home');
            exit;
        }

        //create new order
        $totalCost = $_GET['totalcost'];
        $user = unserialize($_SESSION['USER']);
        $productForCheckout = $_SESSION['productForCheckout'];
        $orderModel = new OrderModel;
        $orderModel->createNewOrder($user->id, serialize($productForCheckout), $user->address, $totalCost, 0, 0);
        unset($_SESSION['productForCheckout']);
        $this->view('ordersuccess.view');
        exit;
        die();
    }
}
