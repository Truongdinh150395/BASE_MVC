<?php
namespace TEST\Model;
use TEST\Model\StudentManager;
use TEST\Model\Student;

class StudentManager
{
    protected $studentDB;
    public function __construct()
    {
        //khoi tao doi tuong DBConnect thuoc class DBConnect
        $this->studentDB = new DBConnect();
    }
    function getAllStudent(){

        $sql = "SELECT * FROM students";
        $stmt  = $this->studentDB->connect()->query($sql);
        $data = $stmt->fetchAll();
        $students = [];
        foreach ($data as $item){
            $student = new Student($item["name"],$item["age"],$item["gender"],$item["address"],$item["image"]);
            $student->setId($item["id"]);
            array_push($students,$student);
        }
        return $students;
    }
    function addStudent($student)
    {

        $sql = "INSERT INTO `students`(`name`, `age`, `gender`, `address`, `image`) VALUES (:name,:age,:gender,:address,:image)";
        $stmt = $this->studentDB->connect()->prepare($sql);
        $stmt->bindParam(':name', $student->getName());
        $stmt->bindParam(':age',$student->getAge());
        $stmt->bindParam(':gender',$student->getGender());
        $stmt->bindParam(':address',$student->getAddress());
        $stmt->bindParam(':image',$student->getImage());
        $stmt->execute();

    }
    function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $this->studentDB->connect()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
    //lay id của sinh vien
    function getStudentById($id)
    {
        $sql = "SELECT * FROM `students` WHERE id =:id";
        $stmt = $this->studentDB->connect()->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;

    }
    function updateStudent($student)
    {
        $sql ="UPDATE `students` SET `name`=:name,`age`=:age,`gender`=:gender,`address`=:address,`image`=:image WHERE id=:id";
        $stmt = $this->studentDB->connect()->prepare($sql);
        $stmt->bindParam(':name',$student->getName());
        $stmt->bindParam(':age',$student->getAge());
        $stmt->bindParam(':gender',$student->getGender());
        $stmt->bindParam(':address',$student->getAddress());
        $stmt->bindParam(':image',$student->getImage());
        $stmt->bindParam(':id',$student->getId());

        $stmt->execute();

    }
}