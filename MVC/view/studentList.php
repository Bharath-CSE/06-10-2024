<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Student List</title>
    <link rel='stylesheet' href='view/style.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
</head>
<body class='listBackground'>
    <!-- Header -->
    <?php if(file_exists("common/header.php")) { include_once "common/header.php"; } ?>
    <div class='border rounded-pill heading'>
        <h3 class='sub_heading'>Filters</h3>
        <div class='filter'>
            <!-- Filter Form -->
                <form method="post" action="index.php?mod=student&view=studentList">
                    <div class='form-group filters'>
                        <label class='list_label'><b>Department:</b></label>
                            <select name='dept_filter' class='form-control filter_input'>
                                <option value=''>Select Department</option>
                                <option value='CSE' <?php echo isset($_POST["dept_filter"]) && $_POST["dept_filter"] == 'CSE' ? 'selected' : ''; ?>>CSE</option>
                                <option value='ECE' <?php echo isset($_POST["dept_filter"]) && $_POST["dept_filter"] == 'ECE' ? 'selected' : ''; ?>>ECE</option>
                                <option value='EEE' <?php echo isset($_POST["dept_filter"]) && $_POST["dept_filter"] == 'EEE' ? 'selected' : ''; ?>>EEE</option>
                                <option value='Mechanical' <?php echo isset($_POST["dept_filter"]) && $_POST["dept_filter"] == 'Mechanical' ? 'selected' : ''; ?>>Mechanical</option>
                            </select>

                        <label class='list_label'><b>Blood Group:</b></label>
                            <select name='blood_group_filter' class='form-control filter_input'>
                                <option value=''>Select Blood Group</option>
                                <option value='A+' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'A+' ? 'selected' : ''; ?>>A+</option>
                                <option value='A-' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'A-' ? 'selected' : ''; ?>>A-</option>
                                <option value='B+' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'B+' ? 'selected' : ''; ?>>B+</option>
                                <option value='B-' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'B-' ? 'selected' : ''; ?>>B-</option>
                                <option value='O+' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'O+' ? 'selected' : ''; ?>>O+</option>
                                <option value='O-' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'O-' ? 'selected' : ''; ?>>O-</option>
                                <option value='AB+' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                                <option value='AB-' <?php echo isset($_POST["blood_group_filter"]) && $_POST["blood_group_filter"] == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                            </select>

                        <label class='list_label'><b>Passedout Year:</b></label>
                            <select name='passedout_year_filter' class='form-control filter_input'>
                                <option value=''>Select Year</option>
                                <option value='2024' <?php echo isset($_POST["passedout_year_filter"]) && $_POST["passedout_year_filter"] == '2024' ? 'selected' : ''; ?>>2024</option>
                                <option value='2023' <?php echo isset($_POST["passedout_year_filter"]) && $_POST["passedout_year_filter"] == '2023' ? 'selected' : ''; ?>>2023</option>
                                <option value='2022' <?php echo isset($_POST["passedout_year_filter"]) && $_POST["passedout_year_filter"] == '2022' ? 'selected' : ''; ?>>2022</option>
                                <option value='2021' <?php echo isset($_POST["passedout_year_filter"]) && $_POST["passedout_year_filter"] == '2021' ? 'selected' : ''; ?>>2021</option>
                            </select>
                        <input type='submit' class='btn btn-primary' name='submit' value='Filter'>
                    </div>
                </form>
        </div>
    </div>
    <table cellspacing='0' cellpadding='20' border='1' width='800' class='table table-bordered table-hover table-secondary'>
        <tr class='table-dark'>
            <td align="center"><b>S.NO</b></td>
            <td align="center"><b>Name</b></td>
            <td align="center"><b>Department</b></td>
            <td align="center"><b>Number</b></td>
            <td align="center"><b>Blood Group</b></td>
            <td align="center"><b>Location</b></td>
            <td align="center"><b>Passedout Year</b></td>
            <td align="center"><b>Actions</b></td>
        </tr>
        <?php
        $s_no=($page-1)*5;
        if(is_array($finalResult))
        {
            foreach ($finalResult as $row)
            {
                    $s_no++;
                    echo "<tr>
                                <td align='center'>{$s_no}</td>
                                <td align='center'>{$row['first_name']} {$row['last_name']}</td>
                                <td align='center'>{$row['department']}</td>
                                <td align='center'>{$row['number']}</td>
                                <td align='center'>{$row['blood_group']}</td>
                                <td align='center'>{$row['location']}</td>
                                <td align='center'>{$row['passedout_year']}</td>
                                <td align='center'>
                                    <a href=index.php?mod=student&view=updateForm&id={$row['id']}><button class='btn btn-secondary'>Update</button></a>
                                    <a href=index.php?mod=student&view=deleteStudent&id={$row['id']} onclick=\"return confirm('Are you sure you want to delete this item?');\" ><button class='btn btn-danger'>Delete</button></a>
                                    <a href=index.php?mod=student&view=viewStudent&id={$row['id']}><button class='btn btn-success'>View</button></a>
                                </td>
                          </tr>";
            }
        }
        ?>
    </table>
        <?php if(!is_array($finalResult)) echo "<p class='records'>$finalResult</p>"; ?>
            <!-- Pagination -->
            <nav>
                <ul class="pagination paginationClass">
                <?php
                    if($page>1)
                    {
                        echo '<li class="page-item">
                                <a class="page-link" href="index.php?mod=student&view=studentList&pageId='.($page-1).'">Previous</a>
                            </li>';
                    }
                    else
                    {
                        echo '<li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>';
                    }

                for($pages=1;$pages<=$number_of_page;$pages++)
                {
                    $active=($pages==$page) ? 'active' : '';
                    echo '<li class="page-item '.$active.'">
                            <a class="page-link" href="index.php?mod=student&view=studentList&pageId='.$pages.'">'.$pages.'</a>
                        </li>';
                }

                if ($page<$number_of_page)
                {
                    echo '<li class="page-item">
                            <a class="page-link" href="index.php?mod=student&view=studentList&pageId='.($page+1).'">Next</a>
                        </li>';
                }
                else
                {
                    echo '<li class="page-item disabled">
                            <a class="page-link">Next</a>
                        </li>';
                }
                ?>
                </ul>
            </nav>
</body>
</html>