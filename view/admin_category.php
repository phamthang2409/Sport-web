<h2 class="my-3">Danh mục sản phẩm</h2>
<a href="index.php?mod=admin&act=category-add" class="btn btn-success float-end">Thêm danh mục</a>
<table class="table text-center align-middle">
    <thead>
        <tr>
            <th>Mã danh mục</th>
            <th class="text-start">Tên danh mục</th>
            <th class="text-start">Mô tả</th>
            <th class="text-end">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dsAminDM as $danhmuc): ?>
            <tr>
                <td>
                    <?= $danhmuc['MaDM'] ?>
                </td>
                <td class="text-start">
                    <?= $danhmuc['TenDanhMuc'] ?>
                </td>
                <td class="text-start">
                    <?= $danhmuc['MoTaDanhMuc'] ?>
                </td>

                <td class="text-end">
                    <a href="index.php?mod=admin&act=category-edit&id=<?=$danhmuc['MaDM']?>" class="btn btn-warning">Sửa</a>
                    <button onclick="deleteCategory(<?=$danhmuc['MaDM']?>)" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function deleteCategory(MaDM){
        var kq = confirm("Bạn có muốn xóa danh mục này không ?");
        if(kq){
            window.location = 'index.php?mod=admin&act=delete-category&id=' + MaDM;
        }
    }
</script>
