<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/style.css"; ?></style>
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

                /*Data Validation*/

                //Vehicle ID
                $err = 0; //Number of errors. Program will not perform query if $err > 0.
                if ($vehicle_id < 100 || $vehicle_id > 109 || is_nan($vehicle_id)) {
                    echo "<p>=> Please, enter a valid Vehicle ID</p>";
                    $err++;
                }

                $query = "SELECT vehicle_available FROM vehicles WHERE vehicle_id = $vehicle_id";
                $result = $mysqli->query($query);
                $vehicle_available = $result->fetch_row();
                
                if ($vehicle_available[0]) {
                    echo "<p>=> Vehicle is not Rented</p>";
                    $err++;
                }

                if ($err == 0) {
                    //SQL Query
                    $query = "UPDATE vehicles 
                    SET vehicle_available=1, 
                    renter_name=NULL,
                    rental_date=NULL,
                    rental_return=NULL
                    WHERE vehicle_id='$vehicle_id'";

                    $mysqli->query($query);
                    printf("<h2>Vehicle Successfully Returned</h2>");
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