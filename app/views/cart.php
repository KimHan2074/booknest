<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
</head>
<body>
    <div class="cart">
        <h1>Giỏ hàng của bạn</h1>
        <p class="cart-subtitle">Có 3 sản phẩm trong giỏ hàng của bạn</p>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="cart-item">
                    <td class="cart-item-name">
                        <img src="https://product.hstatic.net/200000845405/product/8936225390201_2ac6f56f84f54accb8b5d9abc427b9c4_master.jpg" alt="Không Sao Đâu, Lại Bắt Đầu">
                        Sẵn sàng để yêu
                    </td>
                    <td class="cart-item-price">84,000đ</td>
                    <td class="cart-item-quantity">
                        <button class="quantity-decrease">-</button>
                        <input type="text" value="1" readonly>
                        <button class="quantity-increase">+</button>
                    </td>
                    <td class="cart-item-total">84,000đ</td>
                    <td><button class="cart-item-remove">&times;</button></td>
                </tr>
                <tr class="cart-item">
                    <td class="cart-item-name">
                        <img src="https://product.hstatic.net/200000845405/product/bia_1_tu_chua_lanh_cam_xuc_xau_574caf4289f64930a7b96467fb8f5e17_master.png" alt="Tham Vấn Tâm Lý Trên Nền Tảng Phật Giáo">
                        Tự Chữa Lành Cảm Xúc Xấu
                    </td>
                    <td class="cart-item-price">207,200đ</td>
                    <td class="cart-item-quantity">
                        <button class="quantity-decrease">-</button>
                        <input type="text" value="1" readonly>
                        <button class="quantity-increase">+</button>
                    </td>
                    <td class="cart-item-total">207,200đ</td>
                    <td><button class="cart-item-remove">&times;</button></td>
                </tr>
                <tr class="cart-item">
                    <td class="cart-item-name">
                        <img src="https://product.hstatic.net/200000845405/product/8936225390188_3dff227ade9c4c2991598d8f064b1617_master.jpg" alt="Giới Hạn Và Sứ Mệnh Của Linh Hồn">
                        Tình Yêu Cũng Cần Phải Học
                    </td>
                    <td class="cart-item-price">160,000đ</td>
                    <td class="cart-item-quantity">
                        <button class="quantity-decrease">-</button>
                        <input type="text" value="1" readonly>
                        <button class="quantity-increase">+</button>
                    </td>
                    <td class="cart-item-total">160,000đ</td>
                    <td><button class="cart-item-remove">&times;</button></td>
                </tr>
            </tbody>
        </table>
        <div class="cart-actions">
            <button class="continue-shopping-btn">Continue shopping</button>
            <button class="payment-btn">Payment</button>
        </div>
    </div>
</body>
</html>
