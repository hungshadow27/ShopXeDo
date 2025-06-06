<?php
require_once "./src/Models/CateogryModel.php";
require_once "./src/Models/ProductModel.php";
require_once "./src/Models/OrderModel.php";
require_once "./src/Models/UserModel.php";
require_once "./src/Models/PostModel.php";
require_once "./src/Models/ImageModel.php";


class AdminController
{
    use Controller;

    // Kiểm tra quyền admin hoặc staff
    private function checkAuth()
    {
        if (!isset($_SESSION['USER'])) {
            redirect('login');
            exit;
        }
        $user = unserialize($_SESSION['USER']);
        if ($user->role !== "admin" && $user->role !== "staff") {
            redirect('home');
            exit;
        }
        return $user;
    }

    // Trang chính admin
    public function index($a = '', $b = '', $c = '')
    {
        $user = $this->checkAuth();
        $this->view('AdminHome.view');
    }

    // Quản lý danh mục
    public function categories($action = '', $id = '', $c = '')
    {
        $user = $this->checkAuth();
        $categoryModel = new CategoryModel();

        if ($action === 'add') {
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $image = trim($_POST['image']); // Chuỗi tên hình ảnh
                $featured = isset($_POST['featured']) ? 1 : 0; // Checkbox trả về 1 nếu checked, 0 nếu không

                if ($name) {
                    $categoryModel->addCategory($name, $description, $image, $featured);
                    $success = 'Thêm danh mục thành công!';
                } else {
                    $error = 'Vui lòng nhập tên danh mục!';
                }
            }
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminCategoryAdd.view', $data);
        } elseif ($action === 'edit' && $id) {
            $category = $categoryModel->getCategoryById($id);
            if (!$category) {
                redirect('admin/categories');
                exit;
            }
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $image = trim($_POST['image']);
                $featured = isset($_POST['featured']) ? 1 : 0;

                if ($name) {
                    $categoryModel->updateCategory($id, $name, $description, $image, $featured);
                    $success = 'Cập nhật danh mục thành công!';
                    $category = $categoryModel->getCategoryById($id);
                } else {
                    $error = 'Vui lòng nhập tên danh mục!';
                }
            }
            $data['category'] = $category;
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminCategoryEdit.view', $data);
        } elseif ($action === 'delete' && $id) {
            $categoryModel->deleteCategory($id);
            redirect('admin/categories');
            exit;
        } else {
            $categories = $categoryModel->getAllCategory();
            $data['categories'] = $categories;
            $this->view('AdminCategories.view', $data);
        }
    }
    // Quản lý sản phẩm
    public function products($action = '', $id = '', $c = '')
    {
        $user = $this->checkAuth();
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        if ($action === 'add') {
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $price = floatval($_POST['price']);
                $stock_quantity = intval($_POST['stock_quantity']);
                $category_id = intval($_POST['category_id']);
                $images = !empty($_POST['images']) ? serialize(explode(',', trim($_POST['images']))) : serialize([]);

                if ($name && $price > 0 && $stock_quantity >= 0 && $category_id) {
                    $productModel->addNewProduct($name, $description, $images, $price, $stock_quantity, $category_id);
                    $success = 'Thêm sản phẩm thành công!';
                } else {
                    $error = 'Vui lòng nhập đầy đủ thông tin hợp lệ!';
                }
            }
            $data['categories'] = $categoryModel->getAllCategory();
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminProductAdd.view', $data);
        } elseif ($action === 'edit' && $id) {
            $product = $productModel->getProductById($id);
            if (!$product) {
                redirect('admin/products');
                exit;
            }
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $price = floatval($_POST['price']);
                $stock_quantity = intval($_POST['stock_quantity']);
                $category_id = intval($_POST['category_id']);
                $images = !empty($_POST['images']) ? serialize(explode(',', trim($_POST['images']))) : serialize([]);

                if ($name && $price > 0 && $stock_quantity >= 0 && $category_id) {
                    $productModel->updateProduct($id, $name, $description, $images, $price, $stock_quantity, $category_id); // Loại bỏ $brand_id
                    $success = 'Cập nhật sản phẩm thành công!';
                    $product = $productModel->getProductById($id);
                } else {
                    $error = 'Vui lòng nhập đầy đủ thông tin hợp lệ!';
                }
            }
            $data['product'] = $product;
            $data['categories'] = $categoryModel->getAllCategory();
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminProductEdit.view', $data);
        } elseif ($action === 'delete' && $id) {
            $productModel->deleteProduct($id);
            redirect('admin/products');
            exit;
        } else {
            $products = $productModel->getAllProduct();
            $data['products'] = $products;
            $data['categories'] = $categoryModel->getAllCategory();
            $this->view('AdminProducts.view', $data);
        }
    }
    // Quản lý đơn hàng
    public function orders($action = '', $id = '', $c = '')
    {
        $user = $this->checkAuth();
        $orderModel = new OrderModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();

        if ($action === 'edit' && $id) {
            $order = $orderModel->getOrderById($id);
            if (!$order) {
                redirect('admin/orders');
                exit;
            }
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $shipping_address = trim($_POST['shipping_address']);
                $status = intval($_POST['status']);
                $finish_date = ($status == 2 && !empty($_POST['finish_date'])) ? $_POST['finish_date'] : null;
                $shipping_method = $_POST['shipping_method'];

                if ($shipping_address && in_array($status, [-1, 0, 1, 2])) {
                    $orderModel->updateOrder($id, $shipping_address, $status, $shipping_method, $finish_date);
                    $success = 'Cập nhật đơn hàng thành công!';
                    $order = $orderModel->getOrderById($id);
                } else {
                    $error = 'Vui lòng nhập đầy đủ thông tin hợp lệ!';
                }
            }

            // Lấy thông tin người dùng
            $orderUser = $userModel->getUserById($order->user_id);

            // Xử lý danh sách sản phẩm trong đơn hàng
            $orderProducts = [];
            foreach (unserialize($order->product) as $op) {
                $temp = new stdClass();
                $temp->product = $productModel->getProductById($op['id']);
                $temp->quantity = $op['quantity'];
                $orderProducts[] = $temp;
            }

            $data['order'] = $order;
            $data['orderUser'] = $orderUser; // Thêm thông tin người dùng
            $data['orderProducts'] = $orderProducts;
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminOrderEdit.view', $data);
        } else {
            $orders = $orderModel->getAllOrder();
            $finalOrders = [];
            foreach ($orders as $order) {
                $tempOrder = new stdClass();
                $tempOrder->id = $order->id;
                $tempOrder->user_id = $order->user_id;
                $tempOrder->shipping_address = $order->shipping_address;
                $tempOrder->total_cost = $order->total_cost;
                $tempOrder->status = $order->status;
                $tempOrder->status_str = $orderModel->getOrderStatusStr($order->status);
                $tempOrder->created_at = $order->created_at;
                $tempOrder->finish_date = $order->finish_date;
                $tempOrder->shipping_method = $order->shipping_method;

                // Lấy thông tin người dùng
                $orderUser = $userModel->getUserById($order->user_id);
                $tempOrder->user_name = $orderUser->name ?? 'N/A';
                $tempOrder->user_phone = $orderUser->phone_number ?? 'N/A';

                $orderProducts = [];
                foreach (unserialize($order->product) as $op) {
                    $temp = new stdClass();
                    $temp->product = $productModel->getProductById($op['id']);
                    $temp->quantity = $op['quantity'];
                    $orderProducts[] = $temp;
                }
                $tempOrder->products = $orderProducts;
                $finalOrders[] = $tempOrder;
            }

            $data['orders'] = $finalOrders;
            $this->view('AdminOrders.view', $data);
        }
    }

    // Quản lý bài viết
    public function posts($action = '', $id = '')
    {
        $user = $this->checkAuth();
        $postModel = new PostModel();

        if ($action === 'add') {
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $thumbnail = trim($_POST['thumbnail']) ?: null;

                if ($title && $content) {
                    $postModel->addPost($title, $content, $thumbnail);
                    $success = 'Thêm bài viết thành công!';
                } else {
                    $error = 'Vui lòng nhập đầy đủ tiêu đề và nội dung!';
                }
            }
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminPostAdd.view', $data);
        } elseif ($action === 'edit' && $id) {
            $post = $postModel->getPostById($id);
            if (!$post) {
                redirect('admin/posts');
                exit;
            }
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $thumbnail = trim($_POST['thumbnail']) ?: null;

                if ($title && $content) {
                    $postModel->updatePost($id, $title, $content, $thumbnail);
                    $success = 'Cập nhật bài viết thành công!';
                    $post = $postModel->getPostById($id);
                } else {
                    $error = 'Vui lòng nhập đầy đủ tiêu đề và nội dung!';
                }
            }
            $data['post'] = $post;
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminPostEdit.view', $data);
        } elseif ($action === 'delete' && $id) {
            $postModel->deletePost($id);
            redirect('admin/posts');
            exit;
        } else {
            $posts = $postModel->getAllPosts();
            $data['posts'] = $posts;
            $this->view('AdminPosts.view', $data);
        }
    }
    // Quản lý hình ảnh
    public function images($action = '', $id = '')
    {
        $user = $this->checkAuth();
        $imageModel = new ImageModel();

        if ($action === 'add') {
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);
                $fileUpload = $_FILES['fileUpload'];
                if ($name && $fileUpload) {
                    if ($imageModel->getImageByName($name)) {
                        $error = 'Tên ảnh đã tồn tại!';
                    } else {
                        //Thư mục bạn lưu file upload
                        $target_dir = $target_dir = "C:/xampp/htdocs/ShopXeDo/Public/images/";
                        //Đường dẫn lưu file trên server
                        $target_file   = $target_dir . basename($_FILES["fileUpload"]["name"]);
                        $allowUpload   = true;
                        //Lấy phần mở rộng của file (txt, jpg, png,...)
                        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        //Những loại file được phép upload
                        $allowtypes    = array('jpg', 'png');
                        //Kích thước file lớn nhất được upload (bytes)
                        $maxfilesize   = 10000000; //10MB

                        //1. Kiểm tra file có bị lỗi không?
                        if ($_FILES["fileUpload"]['error'] != 0) {
                            echo "<br>The uploaded file is error or no file selected.";
                            die;
                        }

                        //2. Kiểm tra loại file upload có được phép không?
                        if (!in_array($fileType, $allowtypes)) {
                            echo "<br>Only allow for uploading .jpg or .png files.";
                            $allowUpload = false;
                        }

                        //3. Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
                        if ($_FILES["fileUpload"]["size"] > $maxfilesize) {
                            echo "<br>Size of the uploaded file must be smaller than $maxfilesize bytes.";
                            $allowUpload = false;
                        }

                        // //4. Kiểm tra file đã tồn tại trên server chưa?
                        // if (file_exists($target_file)) {
                        //     echo "<br>The file name already exists on the server.";
                        //     $allowUpload = false;
                        // }

                        if ($allowUpload) {
                            //Lưu file vào thư mục được chỉ định trên server
                            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                                $imageModel = new ImageModel();
                                $imageModel->addImage($name, basename($_FILES["fileUpload"]["name"]));
                                $success = 'Thêm Hình ảnh thành công!';
                            } else {
                                $error = 'Có lỗi xảy ra!';
                            }
                        }
                    }
                } else {
                    $error = 'Vui lòng nhập đầy đủ tiêu đề và nội dung!';
                }
            }
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminImageAdd.view', $data);
        } elseif ($action === 'edit' && $id) {
            $image = $imageModel->getImageById($id);
            if (!$image) {
                redirect('admin/images');
                exit;
            }
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = trim($_POST['name']);

                if ($name) {
                    if ($imageModel->getImageByName($name)) {
                        $error = 'Tên hình ảnh đã tồn tại!';
                    } else {
                        $imageModel->updateImageName($id, $name);
                        $success = 'Cập nhật tên hình ảnh thành công!';
                        $image = $imageModel->getImageById($id);
                    }
                } else {
                    $error = 'Vui lòng nhập đầy đủ tiêu đề và nội dung!';
                }
            }
            $data['image'] = $image;
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminImageEdit.view', $data);
        } elseif ($action === 'delete' && $id) {
            $imageModel->deleteImage($id);
            redirect('admin/images');
            exit;
        } else {
            $current = 1;
            if (isset($_GET['page'])) {
                $current  = $_GET['page'];
            }
            $limit = 9;
            $offset = ($current - 1) * $limit;
            $total_pages = ceil($imageModel->getCountAllImage() / $limit);
            $images = $imageModel->getAllImage($limit, $offset);
            $data['limit'] = $limit;
            $data['offset'] = $offset;
            $data['current'] = $current;
            $data['total_pages'] = $total_pages;
            $data['images'] = $images;
            $this->view('AdminImages.view', $data);
        }
    }
    // Quản lý người dùng
    public function users($action = '', $id = '', $c = '')
    {
        $user = $this->checkAuth();
        $userModel = new UserModel();

        if ($action === 'add') {
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $role = trim($_POST['role']);
                $name = trim($_POST['name']);
                $date_of_birth = trim($_POST['date_of_birth']);
                $gender = intval($_POST['gender']);
                $address = trim($_POST['address']);
                $phone_number = trim($_POST['phone_number']);

                if ($username && $password && in_array($role, ['admin', 'staff', 'customer']) && $name && $date_of_birth && in_array($gender, [0, 1]) && $address && $phone_number) {
                    $userModel->addUser($username, $password, $role, $name, $date_of_birth, $gender, $address, $phone_number);
                    $success = 'Thêm người dùng thành công!';
                } else {
                    $error = 'Vui lòng nhập đầy đủ thông tin hợp lệ!';
                }
            }
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminUserAdd.view', $data);
        } elseif ($action === 'edit' && $id) {
            $editUser = $userModel->getUserById($id);
            if (!$editUser) {
                redirect('admin/users');
                exit;
            }
            $error = '';
            $success = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']); // Có thể để trống
                $role = trim($_POST['role']);
                $name = trim($_POST['name']);
                $date_of_birth = trim($_POST['date_of_birth']);
                $gender = intval($_POST['gender']);
                $address = trim($_POST['address']);
                $phone_number = trim($_POST['phone_number']);

                if ($username && in_array($role, ['admin', 'staff', 'customer']) && $name && $date_of_birth && in_array($gender, [0, 1]) && $address && $phone_number) {
                    $userModel->updateUser($id, $username, $role, $name, $date_of_birth, $gender, $address, $phone_number, $password ?: null);
                    $success = 'Cập nhật người dùng thành công!';
                    $editUser = $userModel->getUserById($id);
                    $_SESSION['USER'] = serialize($editUser);
                } else {
                    $error = 'Vui lòng nhập đầy đủ thông tin hợp lệ!';
                }
            }
            $data['user'] = $editUser;
            $data['error'] = $error;
            $data['success'] = $success;
            $this->view('AdminUserEdit.view', $data);
        } elseif ($action === 'delete' && $id) {
            $userModel->deleteUser($id);
            redirect('admin/users');
            exit;
        } else {
            $users = $userModel->getAllUser();
            $finalUsers = [];
            foreach ($users as $u) {
                $tempUser = new stdClass();
                $tempUser->id = $u->id;
                $tempUser->username = $u->username;
                $tempUser->role = $u->role;
                $tempUser->role_str = $userModel->getRoleStr($u->role);
                $tempUser->name = $u->name;
                $tempUser->date_of_birth = $u->date_of_birth;
                $tempUser->gender = $u->gender;
                $tempUser->gender_str = $userModel->getGenderStr($u->gender);
                $tempUser->address = $u->address;
                $tempUser->phone_number = $u->phone_number;
                $tempUser->created_at = $u->created_at;
                $finalUsers[] = $tempUser;
            }
            $data['users'] = $finalUsers;
            $this->view('AdminUsers.view', $data);
        }
    }
}
