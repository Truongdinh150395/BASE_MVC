 <a href="index.php?page=add-student">ADD</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Tuoi</th>
        <th>Gioi Tinh</th>
        <th>Dia chi</th>
        <th>Hinh Anh</th>
        <th>Action</th>
    </tr>
    <?php foreach ($students as $key => $student): ?>
    <tr>
        <td><?php echo ++$key;?></td>
        <td><?php echo $student->getName();?></td>
        <td><?php echo $student->getAge();?></td>
        <td><?php echo $student->getGender();?></td>
        <td><?php echo $student->getAddress();?></td>
        <td><?php echo $student->getImage();?></td>
        <td><a href="index.php?page=delete-student&id=<?php echo $student->getId();?>">DELETE</a></td>
        <td><a href="index.php?page=edit-student&id=<?php echo $student->getId();?>">EDIT</a></td>
    </tr>
    <?php endforeach;?>
</table>
<?php
