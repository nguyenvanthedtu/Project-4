<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <link  rel="stylesheet" href="./assets/css/QLDM/qldm.css"/>
</head>
<body>
    <div class="container-qldm">
    <h1 class="title">DANH SÁCH DANH MỤC</h1>
    <table class="table table-hover table-qldm">
        <tr class="table-success">
            <th>STT</th>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
            <th>Xử lý</th>
        </tr>
   
    <?php
        include "../admin/connect.php";
        $sql = "select * from danhmuc";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $count = 0;        
        while($row = mysqli_fetch_assoc($result) ){
            $count++;
    ?>
        <tr>
            <td><?php echo $count ?></td>
            <td><?php echo $row["MaDM"] ?></td>
            <td><?php echo $row["TenDM"] ?></td>
            <td><?php echo($row["TrangThai"] == 1)?  "Hiển thị": "Ẩn" ?></td>
            <td>
                <a href="./index.php?url=suadm&id=<?php echo $row["MaDM"];?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="./index.php?url=xoadm&id=<?php echo $row["MaDM"];?>" class="btn btn-danger" onclick="return xoa('<?php echo $row['TenDM'];?>')"><i class="fas fa-times"></i></a>
            </td>
        </tr>        
    <?php } }  ?>
        
            <td colspan="5" align="center">
                <button class="btn btn-secondary btn-themdm" type="submit" onclick="myFunction()">Thêm mới </button> 
            </td>
    </table>
    </div>
</body>
</html>

<script>
    function myFunction(){
        location.replace("./index.php?url=themdm");
    }

    function xoa(name){
        return confirm("Bạn có muốn xóa danh mục : "+ name +" ?");
    }
</script>

<?php if(isset($_GET['kq'])&&$_GET['kq']==1) {?>
        <script>swal("","Thêm thành công","success")</script>
<?php } ?>

<?php if(isset($_GET['kq'])&&$_GET['kq']==2) {?>
        <script>swal("","Cập nhật thành công","success")</script>
<?php } ?>

<?php if(isset($_GET['kq'])&&$_GET['kq']==3) {?>
        <script>swal("","Xóa thành công","success")</script>
<?php } ?>