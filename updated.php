<!DOCTYPE html>
<html>

<head>
    <link href="processPref.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="pref-container">
        <h1>Update Status</h1>

        <?php
            // Grab all of the values from our form submission
            $code = $_POST["code"];
            $accessibility = $_POST["accessibility"];
            $maxCost = $_POST["maxCost"];
            $bathroomNum = $_POST["bathroomNum"];
            $bedroomNum = $_POST["bedroomNum"];
            $parking = $_POST["parking"];
            $accommodationType = $_POST["accommodationType"];
            $monthlyCost = $_POST["monthlyCost"];

            include 'connectdb.php';

            $query = "UPDATE RentalGroup
                SET Accessibility = '$accessibility', MaxCost = $maxCost, BathroomNum = $bathroomNum, Parking = '$parking', AccomodationType = '$accommodationType', BedroomNum = $bedroomNum, MonthlyCost= $monthlyCost
                WHERE Code = $code";

            // run a query
            $result = $connection->query($query);

            echo "<h2>You've Successfully Updated your preferences for Group': " . $code . "</h2>";

        ?>
        

    </div>
</body>

</html>