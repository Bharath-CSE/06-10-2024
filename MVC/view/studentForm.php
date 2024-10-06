<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Student Form</title>
    <link rel='stylesheet' href='view/style.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
</head>
<body>
    <!-- Header -->
    <div>
        <div class='logout_button'>
            <a href='index.php?mod=student&view=studentList'><button class='btn btn-primary'>Student List</button></a>
            <a href='index.php?mod=student&view=logout'><button class='btn btn-danger'>Logout</button></a>
        </div>
        <div class='list'>
            <h1>Welcome <?php echo $_SESSION["Name"] ?></h1>
        </div>
    </div>
    <div class='container heading'>
        <!-- Student Create Form -->
        <form method='post' action='index.php?mod=student&view=studentForm' class='student_form_align' enctype='multipart/form-data' onsubmit='validateForm()'>
        <h3 class='create_form'>Student Create Form</h3>
            <div class='form-group'>
                <label><b>
                        Firstname:
                    </b>
                </label><br>
                <input type='text' name='firstname' id='fname' class='form-control' placeholder='Firstname' required>
                <div class='error' id='fnameError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Lastname:
                    </b>
                </label><br>
                <input type='text' name='lastname' id='lname' class='form-control' placeholder='Lastname' required>
                <div class='error' id='lnameError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Dob:
                    </b>
                </label><br>
                <input type='date' name='dob' id='dob' class='form-control' required>
                <div class='error' id='dobError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Email:
                    </b>
                </label><br>
                <input type='email' name='email' id='email' class='form-control' placeholder='Email' required>
                <div class='error' id='emailError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Number:
                    </b>
                </label><br>
                <input type='text' name='number' class='form-control' id='number' placeholder='Number' required>
                <div class='error' id='numberError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Image:
                    </b>
                </label><br>
                <input type='file' name='image' class='form-control' id='image' required>
                <div class='error' id='imageError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Department:
                    </b>
                </label><br>
                <input type='text' name='department' class='form-control' id='department' placeholder='Department' required>
                <div class='error' id='departmentError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Age:
                    </b>
                </label><br>
                <input type='number' name='age' class='form-control' placeholder='Age' id='age' required>
                <div class='error' id='ageError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Blood Group:
                    </b>
                </label><br>
                <input type='text' name='blood_group' class='form-control' placeholder='Blood Group' id='blood_group' required>
                <div class='error' id='blood_group_Error'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Gender:
                    </b>
                </label><br>
                <select name='gender' class='form-control' id='gender' required>
                    <option value='' selected>Select</option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                    <option value='Other'>Other</option>
                </select>
                <div class='error' id='genderError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Passedout Year:
                    </b>
                </label><br>
                <input type='number' name='passedout_year' id='passedout_year' class='form-control' placeholder='Passedout Year' required>
                <div class='error' id='passedout_year_Error'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Location:
                    </b>
                </label><br>
                <input type='text' name='location' class='form-control' id='location' placeholder='Location' required>
                <div class='error' id='locationError'></div>
            </div><br>
            <div class='form-group'>
                <label><b>
                        Password:
                    </b>
                </label><br>
                <input type='password' name='password' class='form-control' id='password' placeholder='Password' required>
                <div class='error' id='passwordError'></div>
            </div><br>
            <input type='submit' class='btn btn-primary' name='submit' id='submit'><br>
        </form>
    </div>
    <script src="view\script.js"></script>
</body>
</html>