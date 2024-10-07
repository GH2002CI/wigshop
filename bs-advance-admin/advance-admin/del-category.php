<?php
include('control.php');
$getdata = new dataadmin();
if ($getdata->del_category($_GET['category']) == true) { ?>
    <script>alert('Success'); location.href = 'list-category.php'</script>
    <?php
} else {
    ?>
    <script>alert('Fail'); location.href = 'list-category.php'</script>
    <?php
}
?>