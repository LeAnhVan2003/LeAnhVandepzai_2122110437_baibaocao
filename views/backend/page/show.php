<?php
use App\Models\Post;
$id = $_REQUEST['id'];
$post = Post::find($id);
if($post==null){
    header("location:index.php?option=page");
}
$list = post::where('status','=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác bài viết</h1>
                     <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header p-2">
               <div class="row">
                Noi dung
                <div class="col-md-11 text-right">
               <a href="index.php?option=page" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về trang đơn
                  </a>
               </div>
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>ID</td>
                         <td><?= $post->id;?></td>
                     </tr>
                     <tr>
                         <td>topic_id</td>
                         <td><?= $post->topic_id;?></td>
                     </tr>
                     <tr>
                         <td>title</td>
                         <td><?= $post->title;?></td>
                     </tr>
                     <tr>
                         <td>slug</td>
                         <td><?= $post->slug;?></td>
                     </tr>
                     <tr>
                         <td>detail</td>
                         <td><?= $post->detail;?></td>
                     </tr>
                     <tr>
                                 <td>image</td>
                                 <td><img class="img-fluid" src="../public/images/post/<?=$post->image;?>" alt="<?=$post->image;?>"></td>
                              </tr>
                           <tr>
                     <tr>
                         <td>type</td>
                         <td><?= $post->type;?></td>
                     </tr>
                     <tr>
                         <td>description</td>
                         <td><?= $post->description;?></td>
                     </tr>
                     <tr>
                         <td>created_at</td>
                         <td><?= $post->created_at;?></td>
                     </tr>
                     <tr>
                         <td>created_by</td>
                         <td><?= $post->created_by;?></td>
                     </tr>
                     <tr>
                         <td>updated_at</td>
                         <td><?= $post->updated_at	;?></td>
                     </tr>
                     <tr>
                         <td>updated_by</td>
                         <td><?= $post->updated_by;?></td>
                     </tr>
                     <tr>
                         <td>status</td>
                         <td><?= $post->status;?></td>
                     </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>