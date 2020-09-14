<?php
namespace TEST\Controller;

use TEST\Model\Student;
use TEST\Model\StudentManager;

class StudentController
{
    protected $studentModel;
    public function __construct()
    {
        $this->studentModel = new \TEST\Model\StudentManager();
    }
    function showStudent()
    {
        //tao 1 bien hứng lấy giá trị của return $students bên class StudentManager;
        $students = $this->studentModel->getAllStudent();
        include_once ("src/View/student/list.php");
    }
    function addStudent()
    {

            include_once ("src/View/student/add.php");

            if(isset($_REQUEST["btn-sm"])){
                $name = $_REQUEST["name"];
                $age = $_REQUEST["age"];
                $gender = $_REQUEST["gender"];
                $address = $_REQUEST["address"];
                $image = $_REQUEST["image"];
                $student = new Student($name,$age,$gender,$address,$image);

                $this->studentModel->addStudent($student);
             header("location:index.php");
        }
    }
    function deleteStudent()
    {
        $id = $_GET["id"];
        $this->studentModel->deleteStudent($id);
        header("location:index.php");
    }
    function updateStudent()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_REQUEST["id"];
            $student = $this->studentModel->getStudentById($id);
            var_dump($student);
            include_once ("src/View/student/update.php");
        } else {
            $id = $_REQUEST["id"];
            $name = $_REQUEST["name"];
            $age = $_REQUEST["age"];
            $gender = $_REQUEST["gender"];
            $address = $_REQUEST["address"];
            $image = $_REQUEST["image"];
            $student = new Student($name,$age,$gender,$address,$image);
            $student->setId($id);
            $this->studentModel->updateStudent($student);
            header("location:index.php");
        }
    }
}