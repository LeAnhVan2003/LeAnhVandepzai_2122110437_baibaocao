<?php

use App\Models\Category;

$list = category::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$parent_id_html = "";
foreach ($list as $cat) {
   $parent_id_html .= "<option value ='$cat->id'>$cat->name</option>";
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
               <h1 class="d-inline">TẤT CẢ DANH MỤC</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=category&cat=trash"> 
                     <i class="fa fa-trash" style="color: #066534;"></i> Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-primary" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm Danh Mục
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>

               <div class="row">
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Tên danh mục (*)</label>
                        <input type="text" name="name" id="name" placeholder="Nhập tên danh mục" class="form-control" 
                        onkeydown="handle_slug(this.value);">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Danh mục cha (*)</label>
                        <select name="parent_id" class="form-control">
                           <option value="0">none</option>
                           <?= $parent_id_html; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Sắp Xếp</label>
                        <select name="sort_order" class="form-control">
                           <option value="1">1</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                  <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th class="text-center">Tên danh mục</th>
                                 <th class="text-center">Tên slug</th>
                                 <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php if (count($list) > 0) : ?>
                              <?php foreach ($list as $item) : ?>
                                    <tr>
                                       <td class="text-center">
                                          <input type="checkbox"  />
                                       </td>
                                       <td class="text-center">
                                          <img src="../public/images/category/<?= $item->image; ?>" 
                                          class="img-fluid" alt="hinh">
                                       </td>
                                       <td class="text-center">
                                          <?= $item->name; ?>
                                       </td>
                                       <td class="text-center"> <?= $item->slug; ?></td>
                                       <td class="text-center">
                                          <?php if ($item->status == 2) : ?>
                                             <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                             <i class="fa fa-toggle-off" style="color: #040201;"></i>
                                             </a>
                                          <?php else : ?>
                                             <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-toggle-on"></i>
                                             </a>
                                          <?php endif; ?>
                                          <a href="index.php?option=category&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                          <i class="fa fa-eye" style="color: #caff0a;"></i>
                                          </a>
                                          <a href="index.php?option=category&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                             <i class="far fa-edit"></i>
                                          </a>
                                          <a href="index.php?option=category&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                             <i class="fas fa-trash"></i>
                                          </a>
                                          </td>
                                       <td class="text-center"><?= $item->id; ?></td>
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
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>