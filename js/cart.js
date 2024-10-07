
$(document).ready(function() {
    loadCartInfo();
    function loadCartInfo() {
        $.ajax({
            URL: 'bs-advance-admin/advance-admin/get_cart_info.php', // Đường dẫn tới tập tin PHP để lấy thông tin giỏ hàng
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Xử lý dữ liệu giỏ hàng và cập nhật giao diện
                if (data.length > 0) {
                    // Xây dựng chuỗi HTML để hiển thị thông tin giỏ hàng
                    var cartHtml = '';
                    var totalValue = 0;
                    for (var i = 0; i < data.length; i++) {
                        var productId = data[i].productId;
                        var size = data[i].size;
                        var color = data[i].color;
                        var quantity = data[i].quantity;
                        var price = data[i].price;
                        var image = data[i].image;
                        var name = data[i].name;
                        // Cập nhật tổng giá trị giỏ hàng
                        totalValue += price * quantity;
                        // Xây dựng phần tử HTML cho mỗi sản phẩm trong giỏ hàng
                        cartHtml += '<tr>' +
                                        '< td class="align-middle" ><img src="bs-advance-admin/advance-admin/img/' + image + '" style="width: 50px;">' + name + '</td>' +
                                        '<td class="align-middle"><span id="price">$' + price + '</span></td>' +
                                        '<td class="align-middle">' +
                                            '<div class="input-group quantity mx-auto" style="width: 100px;">' +
                                                '<div class="input-group-btn"><button class="btn btn-sm btn-primary btn-minus"><i class="fa fa-minus"></i></button></div>' +
                                                '<input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="' + quantity + '" id="quantity" onchange="count_total_money()">' +
                                                '<div class="input-group-btn"><button class="btn btn-sm btn-primary btn-plus"><i class="fa fa-plus"></i></button></div>' +
                                            '</div>'
                                        '</td>' +
                                        '<td class="align-middle"><span id="total_moneys">$ ' + totalValue + '</span></td>' +
                                        '<td class="align-middle"><a href="del_cart.php?idProduct=' + productId + '"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>' +
                                    '</tr >';
                    }
                    // Hiển thị thông tin giỏ hàng và tổng giá trị
                    $('#cart-info').html(cartHtml);
                    $('#total-value').text('Total Value: ' + totalValue);
                } else {
                    // Nếu giỏ hàng trống, hiển thị thông báo
                    $('#cart-info').html('Cart is empty.');
                    $('#total-value').text('');
                }
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
                console.log(error);
            }
        });
    }
});
// Hàm để tải thông tin giỏ hàng từ phía máy chủ


