<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="properties.css" type="text/css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="properties-container">
    <a href="rental.html"><button type="button" class="home-button">Go back home</button></a>
    <div class="heading">
      <h1>View Properties</h1>
      <p>Displayed are all of the property IDs as well as the name of the Property Owner and Manager.</p>
    </div>
    <table>
      <tr class="table-title">
        <th>Property ID</th>
        <th>Property Owner ID</th>
        <th>Property Owner First Name</th>
        <th>Property Owner Last Name</th>
        <th>Manager ID</th>
        <th>Manager First Name</th>
        <th>Manager Last Name</th>
      </tr>

      <?php
      include 'connectdb.php';
      echo "<br>";

      //run a query
      $result = $connection->query("SELECT P.Id as PerID, PO.Id as PoID, PO.FirstName as PoFN, PO.LastName as PoLN, M.PersonId as MID, PM.FirstName as MFN, PM.LastName as MLN from Property P join OwnerProperty OP on P.Id = OP.PropertyId join Owner O on OP.OwnerId = O.PersonId join Person PO on O.PersonId = PO.Id left join Manager M on P.ManagerId = M.PersonId join Person PM on M.PersonId = PM.Id;");
      

      //process results
      while ($row = $result->fetch()) {
        echo "<tr><td>" . $row["PerID"] . "</td><td>" . $row["PoID"] . "</td><td>" . $row["PoFN"] . "</td><td>" . $row["PoLN"] . "</td><td>" . $row["MID"] . "</td><td>" . $row["MFN"] . "</td><td>" . $row["MLN"] . "</td></tr>";

      }

      $connection = NULL;
      ?>
    </table>
  </div>
</body>

</html>