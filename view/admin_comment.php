<h2 class="my-3">Bình luận của khách hàng</h2>
<table class="table text-center align-middle">
    <thead>
        <tr>
            <th>STT</th>
            <th class="text-start">Họ tên</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
            <th class="text-end">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dsAdminBL as $binhluan): ?>
            <tr>
                <td>
                    <?= $i++ ?>
                </td>
                <td class="text-start">
                    <?= $binhluan['HoTen'] ?>
                </td>
                <td class="text-start">
                    <?= $binhluan['NoiDung'] ?>
                </td>
                <td>
                    <?= $binhluan['NgayGui'] ?>
                </td>
                <td class="text-end">
                    <a href="" class="btn btn-warning">Chi Tiết</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function deleteUser(MaTK){
        var kq = confirm("Bạn có muốn xóa tài khoản này không ?");
        if(kq){
            window.location = 'index.php?mod=admin&act=delete-user&id=' + MaTK;
        }
    }
</script>
