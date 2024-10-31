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
        <h1>Update your Rental Group Preferences</h1>
        <table>
            <tr class="table-title">
                <?php
                $code = $_POST["code"];
                echo "<th>Group " . $code . ":</th>"
                ?>
                <th>Accessibility</th>
                <th>Maximum Cost</th>
                <th># of Bathrooms</th>
                <th># of Bedrooms</th>
                <th>Do you require parking?</th>
                <th>Accomodation Type</th>
                <th>Monthly Cost</th>
            </tr>
            <form action="updated.php" method="post">
            <?php
            $code = $_POST["code"];
            echo "<h2>You are updating the preferences for Rental Group: " . $code . "</h2>";
            echo "<ol>";
            include 'connectdb.php';

            $query = "SELECT Accessibility, MaxCost, BathroomNum, Parking, AccomodationType, BedroomNum, MonthlyCost FROM `RentalGroup` WHERE PropertyId ='$code'";


            // run a query
            $result = $connection->query($query);

            while ($row = $result->fetch()) {
                echo "<tr>";
                echo "<td><input type='hidden' name='code' value='" . $code . "'></td>";
                echo "<td><input type='text' name='accessibility' value='" . $row["Accessibility"] . "'></td>";
                echo "<td><input type='text' name='maxCost' value='" . $row["MaxCost"] . "'></td>";
                echo "<td><input type='text' name='bathroomNum' value='" . $row["BathroomNum"] . "'></td>";
                echo "<td><input type='text' name='bedroomNum' value='" . $row["BedroomNum"] . "'></td>";
                echo "<td><input type='text' name='parking' value='" . $row["Parking"] . "'></td>";
                echo "<td><input type='text' name='accommodationType' value='" . $row["AccommodationType"] . "'></td>";
                echo "<td><input type='text' name='monthlyCost' value='" . $row["MonthlyCost"] . "'></td>";
                echo "<td><input type='submit' class='submit-button'/></td>";
                echo "</tr>";
            }


            $connection = NULL;
            ?>
            </ol>
            </form>
    </div>
</body>

</html>