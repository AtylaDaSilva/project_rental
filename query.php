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
            <?php
                /*Connects to MySQL Server */
                $mysqli = new mysqli("127.0.0.1", "root", "", "project_rental");
                $query = "SELECT * FROM vehicles";
                $result = $mysqli->query($query);
            ?>
            
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>