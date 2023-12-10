function tinhThanhTien(){
    var dsSP = document.querySelectorAll('table tbody tr');
    var soluong = 0;
    var tongtien = 0;
    for (const sanpham of dsSP) {
        soluong = sanpham.querySelector('td:nth-child(4)').innerText;
        var gia = sanpham.querySelector('td:nth-child(5)').innerText;
        var tien = gia*soluong;
        sanpham.querySelector('td:nth-child(6)').innerText = tien + 'đ';
        tongtien = tong + tien;
    }
    document.querySelector('tfoot th:nth-child(2)').innerText = tong + 'đ';
}