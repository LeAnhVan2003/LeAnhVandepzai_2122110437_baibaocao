<?php

use App\Models\Menu;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];

$menu = Menu::find($id);
if ($menu == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location:index.php?option=menu&cat=trash");
}
$menu->delete();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thành công']);
header("location: index.php?option=menu&cat=trash");
