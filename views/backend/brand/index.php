   <?php

   use App\Libraries\MyClass;

   use App\Models\Brand;


   $list = brand::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
   ?>
   <?php require_once "../views/backend/header.php"; ?>
   <!-- CONTENT -->
   <form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <h1 class="d-inline">TẤT CẢ THƯƠNG HIỆU</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header ">
                  <div class="row">
                     <div class="col-md-6">
                        <a href="index.php?option=brand&cat=trash" >  
                        <i class="fa fa-trash" style="color: #066534;"></i> Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right">
                        <button class="btn btn-sm btn-primary" type="submit" name="THEM">
                           <i class="fa fa-save" aria-hidden="true"></i>
                           Lưu
                        </button>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <?php require_once "../views/backend/message.php"; ?>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                           <label>Tên thương hiệu (*)</label>
                           <input type="text" name="name" placeholder="Nhập name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" name="slug" placeholder="Nhập slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mô tả</label>
                           <textarea name="description" placeholder="Nhập mô  tả" class="form-control"></textarea>
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
                                 <th class="text-center">Tên thương hiệu</th>
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
                                          <input type="checkbox" />
                                       </td>
                                       <td class="text-center">
                                          <img src="../public/images/brand/<?= $item->image; ?>" class="img-fluid" alt="hinh">
                                       </td>
                                       <td class="text-center">
                                          <?= $item->name; ?>
                                       </td>
                                       <td class="text-center"> <?= $item->slug; ?></td>
                                       <td class="text-center">
                                          <?php if ($item->status == 2) : ?>
                                             <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                             <i class="fa fa-toggle-off" style="color: #040201;"></i>
                                             </a>
                                          <?php else : ?>   
                                             <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-toggle-on"></i>
                                             </a>
                                          <?php endif; ?>
                                          <a href="index.php?option=brand&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                          <i class="fa fa-eye" style="color: #caff0a;"></i>
                                          </a>
                                          <a href="index.php?option=brand&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                             <i class="far fa-edit"></i>
                                          </a>
                                          <a href="index.php?option=brand&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
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