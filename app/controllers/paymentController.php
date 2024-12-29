<?php

class paymentController extends DController
{
    public function proccessPaymentFromCart()
{
    
session_start();
    $orderModel = $this->load->model('orderModel');
    $userModel = $this->load->model('userModel');
    $cartModel = $this->load->model('cartModel');
    $data = [];

    if (!isset($_SESSION['current_user'])) {
        $_SESSION['flash_message'] = [
            'type' => 'error',
            'message' => 'Bạn chưa đăng nhập. Vui lòng đăng nhập vào hệ thống!'
        ];
        header('Location: /booknest_website/userController/loginForm');
        exit();
    }

    $userId = $_SESSION['current_user']['user_id'];

    // Lấy thông tin người dùng từ bảng user
    $data['user_info'] = $userModel->getUserByUserid('users', $userId);

    // Kiểm tra giỏ hàng
    $data['user_cart'] = $cartModel->getUserCart($userId, 'inCart');
    
    if (empty($data['user_cart'])) {
        $_SESSION['flash_message'] = [
            'type' => 'error',
            'message' => 'Giỏ hàng của bạn trống!'
        ];
        header('Location: /booknest_website');
        exit();
    }

    $order_id = $orderModel->getOrderID('orders', $userId);
    $orderID = $order_id[0]['order_id'];

    $table_orders = 'orders';
    $condition = "$table_orders.user_id = $userId AND $table_orders.order_id = $orderID AND $table_orders.status = 'inCart'";
    $data = array(
        'status' => 'pending'
    );

    // Gọi hàm update
    $orderModel->updateOrderStatusFromCart($table_orders, $data, $condition);

     // Lấy thông tin đơn hàng đã chuyển sang pending
     $data['user_cart'] = $cartModel->getUserCartStatus($userId, 'pending');

     if (empty($data['user_cart'])) {
         $_SESSION['flash_message'] = [
             'type' => 'error',
             'message' => 'Không thể chuyển trạng thái đơn hàng!'
         ];
         header('Location: /booknest_website');
         exit();
     }

     $totalPrice = 0;
     foreach ($data['user_cart'] as $item) {
         $totalPrice += $item['price'] * $item['quantity'];
     }
     $data['total_price'] = $totalPrice;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        session_start();
        $paymentMethod = $_POST['paymentMethod'] ?? '';
        echo "Payment Method: $paymentMethod\n";

        if (empty($paymentMethod)) {
            die("Payment method not selected.");
        }

        // Xác định trạng thái đơn hàng
        $status = ($paymentMethod == 'bank transfer') ? 'complete' : 'pending';

        // Điều kiện và dữ liệu cập nhật
        $table_orders = 'orders';
        $condition = "$table_orders.user_id = $user_id AND $table_orders.order_id = $orderID AND $table_orders.status = 'pending'";
        $data = array('status' => $status);

        // Kiểm tra điều kiện
        echo "Condition: $condition\n";

        // Gọi phương thức update
        $result = $orderModel->updateOrderStatus($table_orders, $data, $condition);
        if ($result) {
            echo "Order status updated successfully!";
        } else {
            echo "Failed to update order status.";
        }
            

        // // Lấy thông tin thanh toán
        // $table_orders = 'orders';
        // $orderInfo = $orderModel->getOrderInfo($table_orders, $userId);
        // if (empty($orderInfo)) {
        //     die("Không tìm thấy đơn hàng nào.");
        // }

        // $orderID = $orderInfo[0]['order_id'];
        // $totalPrice = $orderInfo[0]['total_price'];

        $orderId = $orderID;
        $total_Price = $totalPrice;
        $bankTransferInfo = $orderModel->getBankTransferInfo($orderId, $total_Price);

        if (!$bankTransferInfo) {
            die("Không lấy được thông tin thanh toán.");
        }

        $data['bankTransferInfo'] = $bankTransferInfo;
        print_r($data['bankTransferInfo']);
        die('kkkk');

        // Kiểm tra thông tin thanh toán từ form
        $addressDelivery = $_POST['inputAddress'] ?? null;
        $userName = $_POST['inputName'] ?? null;
        $userPhone = $_POST['inputPhone'] ?? null;
        $userNote = $_POST['inputNote'] ?? null;

        echo $userName;
        echo $userPhone;

        if (!$paymentMethod || !$addressDelivery || !$userName || !$userPhone || !$userNote) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Vui lòng điền đầy đủ thông tin!'
            ];
            header('Location: /booknest_website/paymentController/ processPaymentFromCart');
            exit();
        }

        // Thêm thông tin thanh toán vào bảng payment
        $paymentData = [
            'order_id' => $orderID,
            'payment_method' => $paymentMethod,
            'address_delivery' => $addressDelivery,
            'user_note' => $userNote
        ];
        $result = $orderModel->insertPayment('payments', $paymentData);

        if (!$result) {
            die("Không thể lưu thông tin thanh toán.");
        }
        
        // Chuyển hướng đến trang thành công
        header("Location: /booknest_website/paymentController/showBookOrder");
        exit();

    }
    // Nếu không có POST, trả về view
    $this->load->view('Payment', $data);
}



    public function processPaymentFromBookDetails()
{   
    $book_id = isset($_GET['book_id']) ? $_GET['book_id'] : null;
    session_start();
    $orderModel = $this->load->model('orderModel');
    $userModel = $this->load->model('userModel');
    $data = [];

    if (!isset($_SESSION['current_user'])) {
        $_SESSION['flash_message'] = [
            'type' => 'error',
            'message' => 'Bạn chưa đăng nhập. Vui lòng đăng nhập vào hệ thống!'
        ];
        header('Location: /booknest_website/userController/loginForm');
        exit();
    }

    $userId = $_SESSION['current_user']['user_id'];

    // Lấy thông tin người dùng từ bảng user
    $data['user_info'] = $userModel->getUserInfo($userId);

    // Lấy thông tin sách
    if ($book_id) {
        $data['book_info'] = $bookModel->getBookById('books',$book_id);  // Giả sử hàm này trả về chi tiết sách
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $paymentMethod = $_POST['paymentMethod'];

        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1; // Lấy số lượng từ ô input
        if ($quantity <= 0) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Số lượng không hợp lệ!'
            ];
            header("Location: /booknest_website/bookController/showBookDetail?${book_id}");
            exit();
        }

        // Lấy giá sách
        $table_books ='books';
        $bookId = $book_id;
        $bookPrice = $this->getBookPrice($table_books, $bookId);
        $totalPrice = $bookPrice * $quantity;

        // Tạo đơn hàng mới với tổng giá và trạng thái là PENDING
        $orderData = [
            'user_id' => $userId,
            'status' => 'pending',
            'total_price' => $totalPrice,
        ];
        $orderFromDetail = $orderModel->createOrder('orders',$orderData);

        $orderId = $orderModel->getOrderID('orders', $userId);

        // Lưu thông tin sách vào bảng order_items
        $orderItemData = [
            'order_id' => $orderId,
            'book_id' => $bookId,
            'quantity' => $quantity
        ];
        $orderModel->addOrderItem('order_items',$orderItemData);


       // Cập nhật trạng thái đơn hàng sau khi chọn phương thức thanh toán
        $status = ($paymentMethod == 'banktransfer') ? 'complete' : 'pending';

        $table_orders = 'orders';
        $condition = "$table_orders.status = 'pending'";
        $data = array(
            'status'=>$status
        );
        $orderStatusComplete = $orderModel->updateOrderStatus($table_orders, $data, $condition);

        

        // Lấy thông tin thanh toán
        $table_orders = 'orders';
        $orderInfo = $orderModel->getOrderInfo($table_orders, $userId);
        if (empty($orderInfo)) {
            die("Không tìm thấy đơn hàng nào.");
        }

        $orderID = $orderInfo[0]['order_id'];
        $totalPrice = $orderInfo[0]['total_price'];
        $bankTransferInfo = $orderModel->getBankTransferInfo($orderID, $totalPrice);
        if (!$bankTransferInfo) {
            die("Không lấy được thông tin thanh toán.");
        }

        $data['bankTransferInfo'] = $bankTransferInfo;

        // Kiểm tra thông tin thanh toán từ form
        $addressDelivery = $_POST['inputAddress'] ?? null;
        $userName = $_POST['inputName'] ?? null;
        $userPhone = $_POST['inputPhone'] ?? null;
        $userNote = $_POST['inputNote'] ?? null;

        if (!$paymentMethod || !$addressDelivery || !$userName || !$userPhone || !$userNote) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Vui lòng điền đầy đủ thông tin!'
            ];
            header('Location: /booknest_website/paymentController/processPaymentFromBookDetails');
            exit();
        }

        // Thêm thông tin thanh toán vào bảng payment
        $paymentData = [
            'order_id' => $orderID,
            'payment_method' => $paymentMethod,
            'address_delivery' => $addressDelivery,
            'user_note' => $userNote
        ];
        $result = $orderModel->insertPayment('payments', $paymentData);

        if (!$result) {
            die("Không thể lưu thông tin thanh toán.");
        }

        // Chuyển hướng đến trang thành công
        header("Location: /booknest_website/paymentController/showBookOrder");
        exit();
    }

    // Nếu không có POST, trả về view
    $this->load->view('Payment', $data);
}

   public function showBookOrder() {
        session_start();
        $orderModel = $this->load->model('orderModel');
    
        // Kiểm tra session người dùng
        if (!isset($_SESSION['current_user'])) {
            $_SESSION['flash_message'] = [
                'type' => 'error',
                'message' => 'Bạn chưa đăng nhập. Vui lòng đăng nhập vào hệ thống!'
            ];
            header('Location: /booknest_website/userController/loginForm');
            exit();
        }
        $userId = $_SESSION['current_user']['user_id'];
    
        // Lấy thông tin đơn hàng
        $table_orders = 'orders';
        $data['bookInOrder'] = $orderModel->getBookInOrder($table_orders, $userId);
    
        // Kiểm tra nếu không có đơn hàng
        if (empty($data['bookInOrder'])) {
            die("Không có đơn hàng nào.");
        }

        $bookInOrderDetails= $orderModel->getAllBookInOrderDetails($table_orders, $userId);

        $infoCustomer = $orderModel->getInfoCustomer($table_orders, $userId);

        $email = $infoCustomer[0]['email'];
        $userName = $infoCustomer[0]['username'];
        $totalPayment = $infoCustomer[0]['total_price'];
        $deliveryAddress = $infoCustomer[0]['address_delivery'] ;

        if (sendConfirmationEmail($email, $bookInOrderDetails, $userName, $totalPayment, $deliveryAddress)) {
            echo "Check your email!";
            header("Location: /booknest_website");
            exit();
        } else {
            echo "Failed to send confirm.";
        }

        $this->load->view('payment_success', $data);
    }
}


