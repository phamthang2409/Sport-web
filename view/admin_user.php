<h2 class="my-3">Tài khoản</h2>
<a href="index.php?mod=admin&act=add-user" class="btn btn-success float-end">Thêm tài khoản</a>
<table class="table text-center align-middle">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th class="text-start">Họ Tên</th>
            <th class="text-start">Email</th>
            <th>Số điện thoại</th>
            <th>Quyền</th>
            <th class="text-end">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($dsTK as $taikhoan): ?>
            <tr>
                <td>
                    <?= $i++ ?>
                </td>
                <td>
                    <img src="upload/avatar/<?=$taikhoan['Hinh']?>" style="width: 32px; height: 32px;" class="rounded-circle">
                </td>
                <td class="text-start">
                    <?= $taikhoan['HoTen'] ?>
                </td>
                <td class="text-start">
                    <?= $taikhoan['Email'] ?>
                </td>
                <td>
                    <?= $taikhoan['SoDienThoai'] ?>
                </td>
                <td>
                    <?php
                    switch ($taikhoan['Quyen']) {
                        case '1':
                            echo '<span class="badge text-bg-danger">Quản lý trang web</span>';
                            break;
                        default:
                            echo '<span class="badge text-bg-primary">Khách hàng</span>';
                            break;
                    }
                    ?>
                </td>
                <td class="text-end">
                    <a href="index.php?mod=admin&act=edit-user&id=<?=$taikhoan['MaTK']?>" class="btn btn-warning">Sửa</a>
                    <button onclick="deleteUser(<?=$taikhoan['MaTK']?>)" class="btn btn-danger">Xóa</button>
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
