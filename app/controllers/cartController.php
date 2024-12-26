<?php
class cartController extends DController {
    public function __construct() {
        parent::__construct();
    }

    public function viewCart() {
        session_start();
        $cartModel = $this->load->model('cartModel');
        if (isset($_SESSION['current_user'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $status = 'inCart';
            $data['user_cart'] = $cartModel->getUserCart($user_id, $status);
        }else {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Vui lòng đăng nhập để thêm vào giỏ hàng!'
            ];
            header('Location: /booknest_website/userController/loginForm');
            exit();
        }
        $this->load->view('cart', $data);
    }


    public function addToCart() {
        session_start();
        $cartModel = $this->load->model('cartModel');
        $orderModel = $this->load->model('orderModel');
        $book_id = $_GET['book_id'];
        $quantity = $_GET['quantity'];
        
        if (isset($_SESSION['current_user'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $cart = $cartModel->getCartByUserIdAndStatus($user_id, 'inCart');
    
            if ($cart) {
                // Giỏ hàng đã tồn tại
                $order_id = $cart[0]['order_id'];
                $table_order_items = 'order_items';

                $existingItem = $orderModel->getOrderItemByOrderIdAndBookId($order_id, $book_id);

                if ($existingItem) {
                    $newQuantity = $existingItem[0]['quantity'] + $quantity;

                    $order_item_id = $existingItem[0]['order_item_id'];

                    $condition = "$table_order_items.order_item_id = '$order_item_id'";

                    $data = array(
                        'quantity' => $newQuantity                        
                    );

                    $updateResult = $orderModel->updateOrderItemQuantity($table_order_items, $data, $condition);

                    if($updateResult) {
                        $table_orders = 'orders';
                        $condition = "$table_orders.order_id = '$order_id'";

                        $total_price = $orderModel->calculateTotalPrice($table_order_items, $order_id);

                        $data = array(
                            'total_price' => $total_price[0]['total_price']
                        );
                        $orderModel->updateOrderSummary($table_orders, $data, $condition);
                        $_SESSION['flash_message'] = [
                            'type' => 'success',
                            'message' => 'Số lượng sản phẩm đã được cập nhật trong giỏ hàng!'
                        ];
                    }else{
                        $_SESSION['flash_message'] = [
                            'type' => 'error',
                            'message' => 'Không thể cập nhật số lượng sản phẩm!'
                        ];
                    }
                }else{
                    $data = array(
                        'order_id' => $order_id,
                        'book_id' => $book_id,
                        'quantity' => $quantity
                    );
                    $result = $orderModel->insertBookIntoOrderItems($table_order_items, $data);
                    if ($result) {

                        $table_orders = 'orders';
    
                        $condition = "$table_orders.order_id = '$order_id'";
    
                        $total_price = $orderModel->calculateTotalPrice($table_order_items, $order_id);
    
                        $data = array(
                            'total_price' => $total_price[0]['total_price']
                        );
                        $orderModel->updateOrderSummary($table_orders, $data, $condition);
    
                        $_SESSION['flash_message'] = [
                            'type' => 'success',
                            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!'
                        ];
                    }
                }
            } else {
                // Tạo giỏ hàng mới
                $table_orders = 'orders';
                $status = 'inCart';
                $data = array(
                    'user_id' => $user_id,
                    'status' => $status
                );
    
                $newCartId = $cartModel->createNewCart($table_orders, $data);
                if ($newCartId) {
                    $cart = $cartModel->getCartByUserIdAndStatus($user_id, 'inCart');
                    $order_id = $cart[0]['order_id'];
                    $table_order_items = 'order_items';
                    $data = array(
                        'order_id' => $order_id,
                        'book_id' => $book_id,
                        'quantity' => $quantity
                    );
                    $result = $orderModel->insertBookIntoOrderItems($table_order_items, $data);
                    if ($result) {
                        $table_orders = 'orders';

                        $condition = "$table_orders.order_id = '$order_id'";

                        $total_price = $orderModel->calculateTotalPrice($table_order_items, $order_id);

                        $data = array(
                            'total_price' => $total_price[0]['total_price']
                        );
                        $orderModel->updateOrderSummary($table_orders, $data, $condition);
    
                        $_SESSION['flash_message'] = [
                            'type' => 'success',
                            'message' => 'Sản phẩm đã được thêm vào giỏ hàng mới!'
                        ];
                    } else {
                        $_SESSION['flash_message'] = [
                            'type' => 'error',
                            'message' => 'Không thể thêm sản phẩm vào giỏ hàng mới!'
                        ];
                    }
                } else {
                    $_SESSION['flash_message'] = [
                        'type' => 'error',
                        'message' => 'Không thể tạo giỏ hàng mới!'
                    ];
                }
            }
        } else {
            // Yêu cầu đăng nhập
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Vui lòng đăng nhập để thêm vào giỏ hàng!'
            ];
            header('Location: /booknest_website/userController/loginForm');
            exit();
        }
    
        // Điều hướng về trang giỏ hàng
        header('Location: /booknest_website/');
        exit();
    }
    
}