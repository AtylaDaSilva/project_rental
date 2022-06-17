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
                $renter_name =  $_POST["name"];
                $rent_date =  $_POST["rent"];
                $return_date =  $_POST["return"];

                /*Data Validation*/
                if ($vehicle_id >= 100 && $vehicle_id <= 109) {
                    if (strlen($renter_name) >= 5 && strlen($renter_name) <= 60) {
                            
                    } else {echo "<p>=> Renter Name must have between 5 and 60 characters.</p>";}
                } else {echo "<p>=> Please, insert a valid Vehicle ID</p>";}

                /*Query
                $query = "UPDATE vehicles 
                SET vehicle_available=0, 
                renter_name='$renter_name',
                rental_date='$rent_date',
                rental_return='$return_date'
                WHERE vehicle_id='$vehicle_id'";

                $mysqli->query($query);*/
            ?>
            
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>