<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/rent.css"; ?></style>
    <title>Project Rental</title>
</head>
<body>
    <header>
        <h1>Project Rental</h1>
        <h2>Sports Cars Rental System</h2>
    </header>
    <main>
        <section id="user_input">
            <div>
                <a href="index.php"><input type="button" value="HOME"></a>
            </div>
            <div>
                <a href="rent.php"><input type="button" value="RENT VEHICLE"></a>
            </div>
            <div>
                <a href="return.php"><input type="button" value="RETURN VEHICLE"></a>
            </div>
        </section>
        <section class="side-by-side">
            <h2>List of Rented Vehicles</h2>
            <?php
                /*Connects to MySQL Server */
                $mysqli = new mysqli("127.0.0.1", "root", "", "project_rental");
                $query = "SELECT * FROM vehicles";
                $result = $mysqli->query($query);
            ?>

            <table>
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Vehicle Name</th>
                        <th>Available for Rental?</th>
                        <th>Renter Name</th>
                        <th>Date of Rental</th>
                        <th>Date of Return</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $result->fetch_row()) {
                            if (!$row[2]) {
                                printf("<tr>");
                                printf("<td>%s</td>", $row[0]);
                                printf("<td>%s</td>", $row[1]);
                                $row[2]==1 ? printf("<td>Yes</td>") : printf("<td>No</td>");
                                $row[3]==null ? printf("<td>--</td>") : printf("<td>%s</td>", $row[3]);
                                $row[4]==null ? printf("<td>--</td>") : printf("<td>%s</td>", $row[4]);
                                $row[5]==null ? printf("<td>--</td>") : printf("<td>%s</td>", $row[5]);
                                printf("</tr>");
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <section id="rental_form" class="side-by-side">
            <form>
                <h2>Vehicle Return</h2>
                <label for="vehicle_input">Vehicle Name</label> <input type="text" name="" id="vehicle_input"> <br>
                <label for="name_input">Full Name</label> <input type="text" name="" id="name_input"> <br>
                <label for="rental_date_input">Date of Rental</label> <input type="date" name="" id="rental_date_input"> <br>
                <label for="return_date_input">Date of Return</label> <input type="date" name="" id="return_date_input">
            </form>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>