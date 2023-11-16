<?php

use App\Libraries\MyClass;

use App\Models\banner;

$list = banner::where('status', '=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">THÙNG RÁC BANNER</h1>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="card">
         <div class="card-header ">
            <div class="row">
               <div class="col-md-6">
               </div>
               <div class="col-md-6 text-right">
                  <a class="btn btn-sm btn-info" href="index.php?option=banner">
                     <i class="fas fa-arrow-left"></i> Về tất cả banner
                  </a>
                  </button>
               </div>
            </div>
         </div>
         <div class="card-body">

            <?php require_once "../views/backend/message.php"; ?>

            <div class="row">

               <div class="col-md-12">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th class="text-center">Tên Banner</th>
                           <th class="text-center">Tên liên kết</th>
                           <th class="text-center" style="width:170px">Chức năng</th>
                           <th class="text-center" style="width:30px">ID</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0) : ?>
                           <?php foreach ($list as $item) : ?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img class="img-fluid" src="../public/images/banner/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 </td>
                                 <td class="text-center">
                                    <?= $item->name; ?>
                                 </td>
                                 <td class="text-center"><?= $item->link ?></td>
                                 <td class="text-center">
                                    <a href="index.php?option=banner&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                       <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="index.php?option=banner&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                       <i class="fas fa-undo"></i>
                                    </a>
                                 </td>
                                 <td class="text-center"><?= $item->id ?></td>
                              </tr>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>