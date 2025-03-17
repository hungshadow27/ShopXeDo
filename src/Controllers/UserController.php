<?php
require_once "./src/Models/UserModel.php";
require_once "./src/Models/OrderModel.php";
require_once "./src/Models/ProductModel.php";

class UserController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_SESSION['USER'])) {
            $user = unserialize($_SESSION['USER']);
            $data['user'] = $user;
            $this->view('userorders.view', $data);
        } else {
            redirect('login');
            exit;
        }
    }
    public function orders($a = '', $b = '', $c = '')
    {
        if (isset($_SESSION['USER'])) {
            $user = unserialize($_SESSION['USER']);
            $data['user'] = $user;
            if (isset($_GET['id'])) {
                $orderModel = new OrderModel();
                $order = $orderModel->getOrderById($_GET['id']);
                $productModel = new ProductModel();
                $final = [];
                $tempOrder = new stdClass();
                $tempOrder = $order;
                $tempOrder->status = $order->status;
                $tempOrder->statusstr = $orderModel->getOrderStatusStr($order->status);
                foreach (unserialize($order->product) as $op) {
                    $temp = new stdClass();
                    $temp->product = $productModel->getProductById($op['id']);
                    $temp->quantity = $op['quantity'];
                    $orderProducts[] = $temp;
                }
                $tempOrder->products = $orderProducts;
                $final = $tempOrder;
                $data['order'] = $final;
                $this->view('orderdetail.view', $data);
            } else {
                $orderModel = new OrderModel();
                $orders = null;
                if (isset($_GET['status'])) {
                    $orders = $orderModel->getOrderByStatus($user->id, $_GET['status']);
                } else {
                    $orders = $orderModel->getOrdersByUserId($user->id);
                }

                $productModel = new ProductModel();

                $final = [];
                foreach ($orders as $key => $order) {
                    $orderProducts = [];
                    $tempOrder = new stdClass();
                    $tempOrder->id = $order->id;
                    $tempOrder->total_cost = $order->total_cost; // Ensure total_cost is included
                    $tempOrder->status = $order->status;
                    $tempOrder->statusstr = $orderModel->getOrderStatusStr($order->status);

                    foreach (unserialize($order->product) as $op) {
                        $temp = new stdClass();
                        $temp->product = $productModel->getProductById($op['id']);
                        $temp->quantity = $op['quantity'];
                        $orderProducts[] = $temp;
                    }

                    $tempOrder->products = $orderProducts;
                    $final[$key] = $tempOrder;
                }

                $data['orders'] = $final;
                $this->view('userorders.view', $data);
            }
        } else {
            redirect('login');
            exit;
        }
    }
    public function profile($a = '', $b = '', $c = '')
    {
        if (isset($_SESSION['USER'])) {
            $user = unserialize($_SESSION['USER']);
            $userModel = new UserModel();
            $error = '';
            $success = '';
            // Xử lý cập nhật hồ sơ
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $phone = trim($_POST['phone']);
                $address = trim($_POST['address']);
                $current_password = isset($_POST['current_password']) ? trim($_POST['current_password']) : '';
                $new_password = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
                $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

                // Kiểm tra mật khẩu nếu có thay đổi
                if ($new_password || $confirm_password) {
                    if ($current_password === '') {
                        $error = 'Vui lòng nhập mật khẩu hiện tại để thay đổi mật khẩu!';
                    } elseif ($new_password !== $confirm_password) {
                        $error = 'Mật khẩu mới và xác nhận không khớp!';
                    } else {
                        // Kiểm tra mật khẩu hiện tại trong database
                        $fetchUser = $userModel->getUserById($user->id);
                        $synPassword = $fetchUser->password;
                        // Giả lập: mật khẩu hiện tại là '123456'
                        if ($current_password !== $synPassword) {
                            $error = 'Mật khẩu hiện tại không đúng!';
                        }
                    }
                }

                if (!$error) {
                    // Cập nhật database trong thực tế
                    $userModel->updateUserById($user->id, $name, $address, $phone);
                    $user = $userModel->getUserById($user->id);
                    $_SESSION['USER'] = serialize($user);
                    if ($new_password) {
                        // Cập nhật mật khẩu mới (nên mã hóa bằng password_hash)
                        $userModel->updateUserPasswordById($user->id, $new_password);
                    }
                    $success = 'Cập nhật hồ sơ thành công!';
                }
            }
            $data['user'] = $user;
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('userprofile.view', $data);
        } else {
            redirect('login');
            exit;
        }
    }
}
