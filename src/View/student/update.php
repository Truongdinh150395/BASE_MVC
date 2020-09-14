<form  action="" method="POST">
    <input type="text" name ="name" value="<?php echo $student["name"];?>" placeholder="nhap ten">
    <input type="text" name ="age" value="<?php echo $student["age"];?>" placeholder="nhap tuoi">
    <input type="text" name = "gender" value="<?php echo $student["gender"];?>" placeholder="nhap gioi tinh">
    <input type="text" name ="address" value="<?php echo $student["address"];?>" placeholder="nhap dia chi">
    <input type="text" name="image" value="<?php echo $student["image"];?>" placeholder="nhap hinh anh">
    <input type="submit" name="btn-sm" value="ADD">
</form>
