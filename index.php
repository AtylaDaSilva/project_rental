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
        <h2>Sports Cars Rental System</h2>
    </header>
    <main>
        <section id="user_input">
            <div>
                <input type="button" value="RENT VEHICLE!">
            </div>
            <div>
                <input type="button" value="RETURN VEHICLE">
            </div>
            <div>
                <input type="button" value="AVAILABLE VEHICLES">
            </div>
        </section>
        <section>
            <h2>List of Vehicles</h2>
            <?php
                $mysqli = new mysqli("127.0.0.1", "root", "", "project_rental");
                $query = "SELECT * FROM vehicles";
                $result = $mysqli->query($query);

                $row = $result->fetch_row();
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
                    <td>100</td>
                    <td>Infernus</td>
                    <td>Yes</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>