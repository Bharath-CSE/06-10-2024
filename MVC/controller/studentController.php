<?php
    class StudentController
    {
        public $Obj;
        function __construct()
        {
            if(file_exists("./model/studentModel.php"))
            {
                include_once "./model/studentModel.php";
            }
            $this->Obj=new StudentModel();
        }

        //This function is for studentsList
        function studentList()
        {   
            if(isset($_SESSION["Name"]))
            {
                if($_SESSION["User_Type"]=="Admin")
                {
                    $arr=array();
                    //trim - remove whitespace
                    $arr['department']=isset($_POST['dept_filter']) ? trim($_POST['dept_filter']) : null;
                    $arr['blood_group']=isset($_POST['blood_group_filter']) ? trim($_POST['blood_group_filter']) : null;
                    $arr['passedout_year']=isset($_POST['passedout_year_filter']) ? trim($_POST['passedout_year_filter']) : null;
                    //array_filter - remove null values
                    $filteredArray=array_filter($arr);
                    $rows=$this->Obj->studentList($filteredArray);
                    $results_per_page=5;
                    //ceil - round the numbers
                    $number_of_page = ceil($rows/$results_per_page);
                    (!isset($_GET['pageId'])) ? $page=1 : $page=$_GET['pageId'];
                    $offset_value = ($page-1) * $results_per_page;
                    $finalResult=$this->Obj->retrieve($filteredArray,$offset_value,$results_per_page);
                    if(file_exists("./view/studentList.php"))
                    {   
                        include_once "./view/studentList.php";
                    }
                }
                else
                {
                    header("Location: index.php?mod=student&view=viewStudent&id=".$_SESSION["Id"]);
                }
            }
            else
            {
                $this->redirect_login();
            }
        }

        //This function is for studentData Form
        function studentForm()
        {
            if(isset($_SESSION["Name"]))
            {   
                if($_SESSION["User_Type"]=="Admin")
                {
                    if(isset($_POST['submit']))
                    {
                        $arr=array();
                        $arr['email']=$_POST['email'];
                        $arr['password']=base64_encode($_POST['password']);
                        $id=$this->Obj->studentForm($arr);
                        print_r($id);
                        $arr1=array();
                        $arr1['id']=$id;
                        $arr1['firstname']=$_POST['firstname'];
                        $arr1['lastname']=$_POST['lastname'];
                        $arr1['dob']=$_POST['dob'];
                        $arr1['number']=$_POST['number'];
                        $arr1['age']=$_POST['age'];
                        $arr1['blood_group']=$_POST['blood_group'];
                        $arr1['gender']=$_POST['gender'];
                        $arr1['location']=$_POST['location'];
                        $imagePath=$this->file_upload();
                        $arr1['image']=$imagePath;
                        $arr1['department']=$_POST['department'];
                        $arr1['passedout_year']=$_POST['passedout_year'];
                        $this->Obj->studentForm1($arr1);
                        header("Location: index.php?mod=student&view=studentList");
                    }
                    if(file_exists("./view/studentForm.php"))
                    {
                        include_once "./view/studentForm.php";
                    }
                }
                else
                {
                    header("Location: index.php?mod=student&view=viewStudent&id=".$_SESSION["Id"]);
                }
            }
            else
            {
                $this->redirect_login();
            }
        }

        // This function is for updateData Form
        function updateForm()
        {
            if(isset($_SESSION["Name"]))
            {
                if($_SESSION["User_Type"]=="Student")
                {
                    $this->restrictActions();
                }
                $id=$_GET['id'];
                $rows=$this->Obj->getStudentDetails($id);
                if(isset($_POST['submit']))
                {
                    $arr=array();
                    $arr['email']=$_POST['email'];
                    $arr['password']=base64_encode($_POST['password']);
                    $arr['id']=$id;
                    $arr['firstname']=$_POST['firstname'];
                    $arr['lastname']=$_POST['lastname'];
                    $arr['dob']=$_POST['dob'];
                    $arr['number']=$_POST['number'];
                    $arr['age']=$_POST['age'];
                    $arr['blood_group']=$_POST['blood_group'];                    
                    $arr['gender']=$_POST['gender'];
                    $arr['location']=$_POST['location'];
                    $imagePath=$this->file_upload();
                    $arr['image']=$imagePath;
                    $arr['department']=$_POST['department'];
                    $arr['passedout_year']=$_POST['passedout_year'];
                    $this->Obj->updateForm($arr);
                    $rows = $this->Obj->getStudentDetails($id);
                    echo "<script> window.onload=function() { alert('Updated Successfully'); } </script>";
                }
                if(file_exists("./view/updateForm.php"))
                {
                    include_once "./view/updateForm.php";
                }
            }
            else
            {
                $this->redirect_login();
            }
        }

        //This function is for delete student details (Note: Here Soft Delete)
        function deleteStudent()
        {
            if(isset($_SESSION["Name"]))
            {
                if($_SESSION["User_Type"]=="Admin")
                {
                    $id=$_GET['id'];
                    $this->Obj->deleteStudent($id);
                    echo "<script> window.onload=function() { alert('Deleted Successfully'); } </script>";
                    header("Location: index.php?mod=student&view=studentList");
                }
                else
                {
                    header("Location: index.php?mod=student&view=viewStudent&id=".$_SESSION["Id"]);
                }
            }
            else
            {   
                $this->redirect_login();
            }
        }

        //This function is for view full details about particular student
        function viewStudent()
        {
            if(isset($_SESSION["Name"]))
            {
                $id=$_GET['id'];
                $data=$this->Obj->getStudentDetails($id);
                if(file_exists("./view/studentView.php"))
                {
                    include_once "./view/studentView.php";
                }
                if($_SESSION["User_Type"]=="Student")
                {
                    $this->restrictActions();
                }
            }
            else
            {
                $this->redirect_login();
            }
        }

        //This function is for show the login page if the user not logged in
        function redirect_login()
        {
            if(file_exists("view/login.php"))
            {
                include_once "view/login.php";
            }
        }

        //This function is for image upload purpose
        function file_upload()
        {
            if(isset($_SESSION["Name"]))
            {
                if($_SESSION["User_Type"]=="Admin")
                {
                    if ($_FILES["image"]["error"]==0) 
                    {   
                        $FileTypes = ['jpg', 'jpeg', 'png'];
                        $uploadDirectory = 'C:/xampp/htdocs/MVC/view/Images';
                        $tmpName = $_FILES["image"]["tmp_name"];
                        $name = $_FILES["image"]["name"];
                        //pathinfo - give information about path
                        //PATHINFO_EXTENSION - take only extension
                        //strtolower - convert to lower case
                        $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        //in_array - check the value present in the array or not
                        if(in_array($fileExtension, $FileTypes)) 
                        {
                            //move_uploaded_file - move the uploaded file from temp to local folder
                            move_uploaded_file($tmpName, "$uploadDirectory/$name");
                            $imagePath = "/MVC/view/Images"."/$name";
                            return $imagePath;
                        }
                        else
                        {
                            die;
                        }
                    }
                    else
                    {
                        $id=$_GET["id"];
                        $oldImagePath=$this->Obj->getOldImage($id);
                        $imagePath=$oldImagePath["image"];
                        return $imagePath;
                    }
                }
                else
                {
                    header("Location: index.php?mod=student&view=viewStudent&id=".$_SESSION["Id"]);
                }   
            }
        }

        function restrictActions()
        {
            echo "<script>
                        window.onload = function() {
                            document.getElementById('listButton').disabled = true;
                            document.getElementById('listLink').onclick = function(event) {
                                event.preventDefault();
                                alert('You are not allowed to access the student list');
                            };
        
                            document.getElementById('createFormButton').disabled = true;
                            document.getElementById('createFormLink').onclick = function(event) {
                                event.preventDefault();
                                alert('You are not allowed to access the create form');
                            };
                        };
                </script>";
        }

        //This magic method will execute if user call undefined view
        function __call($name, $arguments)
        {
            isset($_SESSION["Name"]) ? header("Location: index.php?mod=student&view=studentList") : header("Location: index.php?mod=authentication&view=login");
        }    
    }