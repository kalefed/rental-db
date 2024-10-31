<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="avgCosts.css" type="text/css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="properties-container">
    <a href="rental.html"><button type="button" class="home-button">Go back home</button></a>
    <div class="heading">
      <h1>Average Monthly Rent</h1>
      <p>Displayed are all of average rent prices for their associated rental category [Houses, Apartments and Rooms]
      </p>
    </div>
    <table>
      <tr class="table-title">
        <th>Houses</th>
        <th>Apartments</th>
        <th>Rooms</th>
      </tr>

      <?php
      include 'connectdb.php';
      echo "<br>";

      //run a query
      $result = $connection->query("SELECT (SELECT avg(P.Cost) as Cost1
      FROM (Property P join House H on P.Id = H.PropId)) as HCost,
      (SELECT avg(P.Cost) as AvgCost
      FROM (Property P join Apartment A on P.Id = A.PropId)) as ACost,
      (SELECT avg(P.Cost) as AvgCost
      FROM (Property P join Room R on P.Id = R.PropId)) as RCost;");

      //process results
      while ($row = $result->fetch()) {
        echo "<tr><td>$" . $row["HCost"] . "</td><td>$" . $row["ACost"] . "</td><td>$" . $row["RCost"] . "</td><td>";

      }

      $connection = NULL;
      ?>
    </table>
  </div>
</body>

</html>