<?php
use App\Models\Post;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$post=Post:: find($id);

if($post == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
     header('location: index.php?option=post');
}
$post->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=post&cat=trash');

