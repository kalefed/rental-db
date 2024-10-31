<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="rentalGroups.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="properties-container">
        <a href="rental.html"><button type="button" class="home-button">Go back home</button></a>
        <div class="heading">
            <h1>View Rental Groups</h1>
            <p>Displayed are all of the rental groups. Select a group code to view all of the student names included in
                the group as well as their preferences</p>
            <p>Select the Group:</p>
        </div>
        <div class="form-buttons">
            <form action="getGroupInfo.php" method="post">
                <?php
                include 'connectdb.php';
                echo "<br>";


                //run a query
                $result = $connection->query("SELECT code FROM `RentalGroup`;");

                //process results
                while ($row = $result->fetch()) {
                    echo '<input type="radio" name="code" value="';
                    echo $row["code"];
                    echo '">' . $row["code"] . "<br>";

                }

                $connection = NULL;
                ?>
                <input type="submit" value="Select Group Code" class="home-button">
            </form>
        </div>

    </div>

</body>

</html>