<header>
    <div>
        <div class='list'>
            <h1>Welcome <?php echo $_SESSION["Name"] ?></h1>
        </div>
        <div class='logout_button'>
            <a href='index.php?mod=student&view=studentList'><button class='btn btn-primary'>Student List</button></a>
            <a href='index.php?mod=student&view=studentForm'><button class='btn btn-primary'>Create Form</button></a>
            <a href='index.php?mod=authentication&view=logout'><button class='btn btn-danger'>Logout</button></a>
        </div>
    </div>
</header>