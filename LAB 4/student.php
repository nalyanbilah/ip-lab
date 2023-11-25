<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $courseErr = "";
    $name = $email = $gender = $course = "";

    if (isset($_POST['submit'])) {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = valid_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = valid_input($_POST["email"]);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["course"])) {
            $courseErr = "Course is required";
        } else {
            $course = valid_input($_POST["course"]);
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = valid_input($_POST["gender"]);
        }
    }

    function valid_input($data_input)
    {
        $data_input = trim($data_input);
        $data_input = stripslashes($data_input);
        $data_input = htmlspecialchars($data_input);
        return $data_input;
    }
    ?>
    <h2>PHP Course Registration</h2>

    <form action="student.php" method="post">
        <table>
            3
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?php if (isset($_POST['name'])) echo
                                                            $_POST['name']; ?>" />
                    <span class="error">* <?php echo $nameErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>E-mail: </td>
                <td><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo
                                                            $_POST['email']; ?>" />
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Course:</td>
                <td> <input type="text" name="course" value="<?php if (isset($_POST['course'])) echo
                                                                $_POST['course']; ?>" />
                    <span class="error">* <?php echo $courseErr; ?></span>
                </td>
            </tr>


            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="male">Male
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>

        </table>
    </form>

    <?php
    echo "<h2>Course Registration :</h2>";
    echo ("<p>NAME $name</p>");
    echo ("<p>EMAIL $email</p>");
    echo ("<p>COURSE $course</p>");
    echo ("<p>GENDER $gender</p>");
    ?>


</body>

</html>