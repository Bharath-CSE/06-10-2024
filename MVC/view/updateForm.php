<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update Form</title>
    <link rel='stylesheet' href='view/style.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
</head>
<body>
<?php
    foreach($rows as $data)
    {
        $id=$data['id'];
        $fname=$data['first_name'];
        $lname=$data['last_name'];
        $dob=$data['dob'];
        $email=$data['email'];
        $number=$data['number'];
        $image=$data['image'];
        $department=$data['department'];
        $age=$data['age'];
        $blood_group=$data['blood_group'];
        $gender=$data['gender'];
        $passedout_year=$data['passedout_year'];
        $location=$data['location'];
        $password=base64_decode($data['password']);
    }
?>
    <!-- Header -->
    <div class='view_students'>
        <div class='logout_button'>
            <a id='listLink' href='index.php?mod=student&view=studentList'><button id='listButton' class='btn btn-primary'>Student List</button></a>
            <a id='createFormLink' href='index.php?mod=student&view=studentForm'><button id='createFormButton' class='btn btn-primary'>Create Form</button></a>
            <a href="index.php?mod=student&view=viewStudent&id=<?php echo $id?>"><button class='btn btn-success'>Full View</button></a>
            <a href='index.php?mod=authentication&view=logout'><button class='btn btn-danger'>Logout</button></a>
        </div>
        <div class='list'>
            <h1>Welcome <?php echo $_SESSION["Name"] ?></h1>
        </div>
    </div>
    <div class='container heading'>
        <!-- Student Update Form -->
        <form method='post' class='student_form_align' action='index.php?mod=student&view=updateForm&id=<?php echo $id?>' enctype='multipart/form-data'>
            <h3 class='create_form'>Student Update Form</h3>
            <div class='form-group'>
                <label><b>
                        Firstname:
                    </b>
                </label><br>
                <input type='text' class='form-control' id='fname' name='firstname' value=<?php echo $fname; ?> required>
                <div class='error' id='fnameError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Lastname:
                    </b>
                </label><br>
                <input type='text' name='lastname' class='form-control' id='lname' value=<?php echo $lname; ?> required>
                <div class='error' id='lnameError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Dob:
                    </b>
                </label><br>
                <input type='date' name='dob' class='form-control' id='dob' value=<?php echo $dob; ?> required>
                <div class='error' id='dobError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Email:
                    </b>
                </label><br>
                <input type='email' name='email' class='form-control' id='email' value=<?php echo $email; ?> required>
                <div class='error' id='emailError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Number:
                    </b>
                </label><br>
                <input type='text' name='number' class='form-control' id='number' value=<?php echo $number; ?> required>
                <div class='error' id='numberError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Image:
                    </b>
                </label><br>
                <img class='profile_image' src=<?php echo $image; ?>><br>
                <input type='file' name='image' class='form-control'>
            </div>
            <div class='form-group'>
                <label><b>
                        Department:
                    </b>
                </label><br>
                <input type='text' name='department' class='form-control' id='department' value=<?php echo $department; ?> required>
                <div class='error' id='departmentError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Age:
                    </b>
                </label><br>
                <input type='number' name='age' class='form-control' id='age' value=<?php echo $age; ?> required>
                <div class='error' id='ageError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Blood Group:
                    </b>
                </label><br>
                <input type='text' name='blood_group' class='form-control' id='blood_group' value=<?php echo $blood_group; ?> required>
                <div class='error' id='blood_group_Error'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Gender:
                    </b>
                </label><br>
                <select name='gender' class='form-control' id='gender' required>
                    <option value='' <?php if($gender=='') echo 'selected'; ?>>Select</option>
                    <option value='Male' <?php if($gender=='Male') echo 'selected'; ?>>Male</option>
                    <option value='Female' <?php if($gender=='Female') echo 'selected'; ?>>Female</option>
                    <option value='Other' <?php if($gender=='Other') echo 'selected'; ?>>Other</option>
                </select>
                <div class='error' id='genderError'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Passedout Year:
                    </b>
                </label><br>
                <input type='number' name='passedout_year' id='passedout_year' class='form-control' value=<?php echo $passedout_year; ?> required>
                <div class='error' id='passedout_year_Error'></div>
            </div>
            <div class='form-group'>
                <label><b>
                        Location:
                    </b>
                </label><br>
                <input type='text' name='location' id='location' class='form-control' value=<?php echo $location; ?> required>
                <div class='error' id='locationError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Password:
                    </b>
                </label><br>
                <input type='text' name='password' class='form-control' value=<?php echo $password; ?> id='password' placeholder='Password' required>
                <div class='error' id='passwordError'></div>
            </div><br>
            <input type='submit' class='btn btn-primary' name='submit'><br>
        </form>
    </div>
    <script src="view\script.js"></script>
</body>
</html>