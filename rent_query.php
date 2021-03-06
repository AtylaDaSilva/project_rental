<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php

use function PHPSTORM_META\type;

 include "css/style.css"; ?></style>
    <title>Project Rental</title>
</head>
<body>
    <header>
        <h1>Project Rental</h1>
        <h2>Sports Cars Rental Management System</h2>
    </header>
    <main>
        <nav id="user_input">
            <div>
                <a href="index.php"><input type="button" value="HOME"></a>
            </div>
            <div>
                <a href="rent.php"><input type="button" value="RENT VEHICLE"></a>
            </div>
            <div>
                <a href="return.php"><input type="button" value="RETURN VEHICLE"></a>
            </div>
        </nav>
        <section>
            <h2>Query Result:</h2>
            <?php
                /*Connects to MySQL Server */
                $mysqli = new mysqli("127.0.0.1", "root", "", "project_rental");

                /*POST data */
                $vehicle_id =  $_POST["id"];
                $renter_name =  $_POST["name"];
                $rent_date =  $_POST["rent"];
                $return_date =  $_POST["return"];

                /*Data Validation*/
                //Vehicle ID
                $err = 0; //Number of errors. Program will not perform query if $err > 0.
                if ($vehicle_id < 100 || $vehicle_id > 109 || is_nan($vehicle_id)) {
                    echo "<p>=> Please, enter a valid Vehicle ID</p>";
                    $err++;
                }

                //Renter Name
                if (strlen($renter_name) < 5 || strlen($renter_name) > 60) {
                    echo "<p>=> Renter Name must have between 5 and 60 characters</p>";
                    $err++;
                }

                if (is_numeric($renter_name)) {
                    echo "<p>=> Please, enter a valid Renter Name</p>";
                    $err++;
                }

                //Rent and Return Date
                date_default_timezone_set('UTC'); //Sets default timezone to UTC
                $today = date("Y-m-d"); //Gets current date in the format yyyy-mm-dd

                if ($rent_date == "") {
                    echo "<p>=> Please, enter a valid Rent Date</p>";
                    $err++;
                }

                if ($return_date == "" || $return_date < $today) {
                    echo "<p>=> Please, enter a valid Return Date</p>";
                    $err++;
                }

                if ($err == 0) {
                    /*SQL Query*/
                    $query = "UPDATE vehicles 
                    SET vehicle_available=0, 
                    renter_name='$renter_name',
                    rental_date='$rent_date',
                    rental_return='$return_date'
                    WHERE vehicle_id='$vehicle_id'";

                    $mysqli->query($query);
                    printf("<h2>Vehicle Successfully Rented</h2>");
                } else {
                    echo "<p>=> Please, verify inserted data and try again</p>";
                }

                echo "Errors = " . $err . "<br>";
            ?>
            
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>