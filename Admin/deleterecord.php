<?php 
#استدعاء دالة الاتصال 
include('../dbcon.php');
$delete_id = $_GET['Delete'];#متغير يقوم بحفظ حالة الحذف العناصر
$profile_pic = $_GET['Picture'];#متغير يقوم بحفظ حالة حذف الصورة

#جملة الاستعلام  للحقل من قاعدة البيانات
$sql = "delete  from `student` where id = $delete_id";
#حفظ التغير في قاعدة البيانات بعد عمل الحذف 
$result = mysqli_query($conn,$sql);

if ($result) {
	#شرط اذا تم بعملية الحذف يقوم بحذف الصورة كذلك
	unlink("../databaseimg/".$profile_pic);
	echo '<script>window.open("deletestudent.php?deleted=تم حذف السجل","_self")</script>';
}

 ?>