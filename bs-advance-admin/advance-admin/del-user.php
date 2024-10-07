<?php
include('control.php');
$getdata = new dataadmin();
if ($getdata->del_user($_GET['idUser']) == true) {
    echo "<script>alert('Success'); location.href='list-user.php'</script>";
} else {
    echo "<script>alert('Fail'); location.href='list-user.php'</script>";
}
?>