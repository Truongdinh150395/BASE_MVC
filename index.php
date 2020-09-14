<?php

require __DIR__ ."/vendor/autoload.php";
$studentController = new \TEST\Controller\StudentController();
$page =isset($_REQUEST["page"])?$_REQUEST["page"]:NULL;
switch ($page){
    case "add-student":
        $studentController->addStudent();
        break;
    case "delete-student":
        $studentController->deleteStudent();
        break;
    case "edit-student":
        $studentController->updateStudent();
        break;
    default:
        $studentController->showStudent();
}