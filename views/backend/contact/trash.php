<?php

use App\Models\Contact;

$list = Contact::all();
$list = Contact::where('status', '=', '0')->orderBy('created_at', 'DESC')->get();
?>
<?php require_once('../views/backend/header.php'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="d-inline">THÙNG RÁC LIÊN HỆ</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12  text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=contact">
                            <i class="fas fa-arrow-left"></i> Quay về liên hệ
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:200px">Họ tên</th>
                            <th class="text-center" style="width:150px">Email</th>
                            <th class="text-center" style="width:150px">Số điện thoại</th>
                            <th class="text-center" style="width:160px">Ngày tạo</th>
                            <th class="text-center" style="width:200px">Chức năng</th>
                            <th class="text-center" style="width:20px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td><?= $row['name'] ?></td>
                                <td class="text-center"><?= $row['email'] ?></td>
                                <td class="text-center"><?= $row['phone'] ?></td>
                                <td class="text-center"><?= $row['created_at'] ?></td>
                                <td class="text-center">
                                    <?php if ($row->status == 1) : ?>
                                        <a href="index.php?option=contact&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-toggle-on"></i>
                                        </a>
                                    <?php else : ?>
                                        <a href="index.php?option=contact&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-toggle-on"></i>
                                        </a>
                                    <?php endif; ?>
                                    <a href="index.php?option=contact&cat=show&id=<?= $row->id; ?>" class="btn btn-sm btn-info">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="index.php?option=contact&cat=edit&id=<?= $row->id; ?>" class="btn btn-sm btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="index.php?option=contact&cat=destroy&id=<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="index.php?option=contact&cat=restore&id=<?= $row->id; ?>" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-trash-restore"></i>
                                    </a>
                                </td>
                                <td class="text-center"><?= $row['id'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<?php require_once('../views/backend/footer.php'); ?>