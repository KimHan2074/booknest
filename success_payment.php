<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



function sendConfirmationEmail($toEmail, $fullname) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pddat2602@gmail.com';
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('pddat2602@gmail.com', 'Xác nhận đơn hàng');
        $mail->addAddress($toEmail, $fullname);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Xác nhận đơn hàng';

       // Tạo nội dung email
       $orderItemsHtml = '';
       foreach ($orderDetails as $item) {
           $orderItemsHtml .= "
               <tr>
                   <td><img src='../public/img/{$item['path']}' alt='{$item['title']}' width='100'></td>
                   <td>{$item['title']}</td>
                   <td>" . number_format($item['price'], 0, ',', '.') . "đ</td>
                   <td>{$item['quantity']}</td>
                   <td>" . number_format($item['price'] * $item['quantity'], 0, ',', '.') . "đ</td>
               </tr>
           ";
       }

       $mail->Body = "
       <html>
       <head>
           <style>
               body {
                   font-family: Arial, sans-serif;
                   background-color: #f9f9f9;
                   color: #333;
                   margin: 0;
                   padding: 0;
               }
               .email-container {
                   max-width: 800px;
                   margin: 20px auto;
                   padding: 20px;
                   background-color: #ffffff;
                   border-radius: 10px;
                   box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
               }
               .email-header {
                   font-size: 24px;
                   color: #28a745;
                   text-align: center;
                   margin-bottom: 20px;
               }
               .order-details table {
                   width: 100%;
                   border-collapse: collapse;
                   margin-bottom: 20px;
               }
               .order-details th, .order-details td {
                   padding: 10px;
                   border: 1px solid #ddd;
                   text-align: center;
               }
               .total-payment {
                   font-weight: bold;
               }
           </style>
       </head>
       <body>
           <div class='email-container'>
               <div class='email-header'>Xác nhận đơn hàng</div>
               <div class='email-body'>
                   <p>Xin chào <strong>{$fullname}</strong>,</p>
                   <p>Cảm ơn bạn đã đặt hàng tại BookNest!</p>
                   <p>Dưới đây là chi tiết đơn hàng của bạn:</p>
                   <table class='order-details'>
                       <tr>
                           <th>Ảnh</th>
                           <th>Tên sách</th>
                           <th>Giá</th>
                           <th>Số lượng</th>
                           <th>Tổng</th>
                       </tr>
                       {$orderItemsHtml}
                   </table>
                   <p><strong>Tổng thanh toán:</strong> " . number_format($totalPayment, 0, ',', '.') . "đ</p>
                   <p><strong>Địa chỉ giao hàng:</strong> {$deliveryAddress}</p>
                   <p>Chúng tôi sẽ gửi thông báo giao hàng đến bạn trong thời gian sớm nhất.</p>
                   <p>Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với chúng tôi.</p>
               </div>
           </div>
       </body>
       </html>
       ";

        // Gửi email
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Lỗi khi gửi email: {$mail->ErrorInfo}";
        return false;
    }
}