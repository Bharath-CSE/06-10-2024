<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Student View</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='view/style.css'>
</head>
<body style='background-image:url("view/BackgroundPics/View.jpg"); background-size:cover;'>
    <!-- Header -->
    <div class='view_students'>
        <div class='logout_button'>
            <a id='listLink' href='index.php?mod=student&view=studentList'><button id='listButton' class='btn btn-primary'>Student List</button></a>
            <a id='createFormLink' href='index.php?mod=student&view=studentForm'><button id='createFormButton' class='btn btn-primary'>Create Form</button></a>
            <a href='index.php?mod=authentication&view=logout'><button class='btn btn-danger'>Logout</button></a>
        </div>
        <div class='list'>
            <h1 class='viewText'>Welcome <?php echo $_SESSION["Name"] ?></h1>
        </div>
    </div>
        <?php
            foreach($data as $row)
            {
                $id=$row['id'];
                $name=$row['first_name'].' '.$row['last_name'];
                $dob=$row['dob'];
                $email=$row['email'];
                $number=$row['number'];
                $image=$row['image'];
                $department=$row['department'];
                $age=$row['age'];
                $blood_group=$row['blood_group'];
                $gender=$row['gender'];
                $passedout_year=$row['passedout_year'];
                $location=$row['location'];
            }
        ?>  
        <div class='studentDetails'>
            <img class='profile_image' src=<?php echo $image; ?>>
            <p><strong>Name: </strong><?php echo $name; ?></p>
            <p><strong>DOB: </strong><?php echo $dob; ?></p>
            <p><strong>Email: </strong><?php echo $email; ?></p>
            <p><strong>Number: </strong><?php echo $number; ?></p>
            <p><strong>Department: </strong><?php echo $department; ?></p>
            <p><strong>Age: </strong><?php echo $age; ?></p>
            <p><strong>Blood Group: </strong><?php echo $blood_group; ?></p>
            <p><strong>Gender: </strong><?php echo $gender; ?></p>
            <p><strong>Passedout Year: </strong><?php echo $passedout_year; ?></p>
            <p><strong>Location: </strong><?php echo $location; ?></p>
            <a href="index.php?mod=student&view=updateForm&id=<?php echo $id ?>"><button class='btn btn-secondary'>Update</button></a>
        </div>
</body>
</html>
