<?php
require_once "./src/Models/ProductModel.php";
require_once("./src/Models/CartModel.php");
class CartController
{
    use Controller;
    public function index()
    {
        $data = null;
        if (!isset($_SESSION['USER'])) {
            redirect('login');
        } else {
            $productModel = new ProductModel();
            $cartModel = new CartModel();
            $carts = $cartModel->getCartByUserId(unserialize($_SESSION['USER'])->id);

            // Initialize the array to hold product objects with quantities
            $productOnCart = [];

            foreach ($carts as $cart) {
                // Get product details as an object
                $product = $productModel->getProductById($cart->product_id);

                if ($product) { // Check if product exists
                    // Add quantity as a new property to the product object
                    $product->quantity = $cart->quantity;
                    $productOnCart[] = $product;
                }
            }

            // Pass to view
            $data['products'] = $productOnCart;
            $this->view('cart.view', $data);
            //var_dump($productOnCart);
        }
    }
    public function add()
    {
        if (isset($_POST['id'])) {
            $product_id = $_POST['id'];

            if (isset($_SESSION['CART'])) {
                $carts = $_SESSION['CART'];

                // Check if the product is already in the cart
                $productExists = false;
                foreach ($carts as $key => $cart) {
                    if ($cart->product_id == $product_id) {
                        $carts[$key]->quantity += 1;
                        $productExists = true;

                        // Update quantity in the database
                        $cartModel = new CartModel();
                        $cartModel->updateQuantityCart($carts[$key]->id, $carts[$key]->quantity);
                        break;
                    }
                }
                // If the product is not in the cart, add it
                if (!$productExists) {
                    $cartModel = new CartModel();
                    $cartModel->createCart(unserialize($_SESSION['USER'])->id, $product_id, 1);
                    $cart = $cartModel->getCartByUserId(unserialize($_SESSION['USER'])->id);
                }
                $_SESSION['CART'] = $cartModel->getCartByUserId(unserialize($_SESSION['USER'])->id);; // Re-index the array
                echo count($_SESSION['CART']);
            }
        } else {
            echo "Error";
        }
    }
    public function updateQuantity()
    {
        if (isset($_POST['id']) && isset($_POST['quantity'])) {
            $product_id = $_POST['id'];
            $quantity = $_POST['quantity'];

            if (isset($_SESSION['CART'])) {
                $carts = $_SESSION['CART'];
                foreach ($carts as $key => $cart) {
                    if ($cart->product_id == $product_id) {
                        $carts[$key]->quantity = $quantity;
                        $cartModel = new CartModel();
                        $cartModel->updateQuantityCart($carts[$key]->id, $carts[$key]->quantity);
                        break;
                    }
                }
                $_SESSION['CART'] = $cartModel->getCartByUserId(unserialize($_SESSION['USER'])->id); // Re-index the array
                var_dump($cart);
            }
        } else {
            echo "Error";
        }
    }
    public function delete()
    {
        if (isset($_POST['id'])) {
            $product_id = $_POST['id'];

            if (isset($_SESSION['CART'])) {
                $carts = $_SESSION['CART'];
                foreach ($carts as $key => $cart) {
                    if ($cart->product_id == $product_id) {
                        unset($carts[$key]);
                        $cartModel = new CartModel;
                        $cartModel->deleteCartItem(unserialize($_SESSION['USER'])->id, $product_id);
                        break;
                    }
                }
                $_SESSION['CART'] = $cartModel->getCartByUserId(unserialize($_SESSION['USER'])->id);; // Re-index the array
                echo count($_SESSION['CART']);
            }
        } else {
            echo "Error";
        }
    }
}
