<!DOCTYPE html>
<html>

<head>
    <link href="getGroupInfo.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="group-container">
        <a href="rental.html"><button type="button" class="home-button">Go back home</button></a>
        <h1 class="heading">Viewing Rental Group Names & Preferences</h1>

        <div>
            <h3>People In Rental Group:</h3>
            <div class="result">
                <?php
                include "connectdb.php";
                $code = $_POST["code"];

                $query = "select P.Id, P.FirstName as FN, P.LastName as LN, RG.Code as Code
            from (Person P join Renter R on P.Id = R.PersonId)
            join RentalGroup RG on RG.Code = R.RentalGroupId
            join Property PT on PT.Id = RG.PropertyId
            having Code = '$code'";

                $result = $connection->query($query);

                //process results
                while ($row = $result->fetch()) {
                    echo "<p>" . $row["FN"] . "  " . $row["LN"] . "</p>";
                }


                ?>
            </div>
        </div>
        <div>
            <h3>Group Preferences:</h3>
            <table>
                <tr class="table-title">
                    <th>Accessibility</th>
                    <th>Maximum Cost</th>
                    <th># of Bathrooms</th>
                    <th># of Bedrooms</th>
                    <th>Do you require parking?</th>
                    <th>Accomodation Type</th>
                    <th>Monthly Cost</th>
                </tr>
                <?php
                include 'connectdb.php';
                $code = $_POST["code"];

                // get the property ID first
                $queryPID = "SELECT PropertyId FROM `RentalGroup` WHERE code = '$code'";

                // run a query
                $PID_result = $connection->query($queryPID);

                // Fetch the actual value
                $PID_row = $PID_result->fetch();
                
                // Access the PropertyId value
                $PID = $PID_row["PropertyId"];

                $query2 = "SELECT Accessibility, MaxCost, BathroomNum, Parking, AccomodationType, BedroomNum, MonthlyCost FROM `RentalGroup` WHERE PropertyId = $PID";

                // run a query
                $result2 = $connection->query($query2);

                while ($row = $result2->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row["Accessibility"] . "</td>";
                    echo "<td>" . $row["MaxCost"] . "</td>";
                    echo "<td>" . $row["BathroomNum"] . "</td>";
                    echo "<td>" . $row["BedroomNum"] . "</td>";
                    echo "<td>" . $row["Parking"] . "</td>";
                    echo "<td>" . $row["AccomodationType"] . "</td>";
                    echo "<td>" . $row["MonthlyCost"] . "</td>";
                    echo "</tr>";
                }

                $connection = NULL;
                ?>

                </ol>

        </div>


    </div>

</body>

</html>