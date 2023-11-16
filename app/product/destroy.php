<?php
use App\Models\Product;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$product=Product:: find($id);

if($product == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
            header('location: index.php?option=product');
}
$product->delete();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header('location: index.php?option=product&cat=trash');

