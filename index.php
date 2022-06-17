<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #user_input div {
            display: inline-block;
            padding-left: 15px;
        }

        table {
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
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
                <a href="rent.php"><input type="button" value="RENT VEHICLE!"></a>
            </div>
            <div>
                <a href="return.php"><input type="button" value="RETURN VEHICLE"></a>
            </div>
        </nav>
        <section>
            <h2>List of Vehicles</h2>
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
                            printf("<tr>");
                            printf("<td>%s</td>", $row[0]);
                            printf("<td>%s</td>", $row[1]);
                            $row[2]==1 ? printf("<td>Yes</td>") : printf("<td>No</td>");
                            $row[3]==null ? printf("<td>--</td>") : printf("<td>%s</td>", $row[3]);
                            $row[4]==null ? printf("<td>--</td>") : printf("<td>%s</td>", $row[4]);
                            $row[5]==null ? printf("<td>--</td>") : printf("<td>%s</td>", $row[5]);
                            printf("</tr>");
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>