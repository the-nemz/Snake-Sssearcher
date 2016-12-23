
<?php

    /**
     * File that makes the actual query and displays the results on the page.
     */

    $headmap = array("S.high_taxa" => "Higher Taxa",
                    "S.genus_species" => "Genus species",
                    "S.common_name" => "Common Names",
                    "C.continent" => "Continent",
                    "L.country" => "Country",
                    "C.population" => "Population",
                    "S.author" => "Discoverer",
                    "S.year" => "Discovered in",
                    "S.venomous" => "Venomous?",
                    "S.live_bearing" => "Live bearing?",
                    "COUNT(*)" => "Count");

    $boolmap = array(0 => "No", 1 => "Yes");

    $conn = new mysqli("localhost", "root", "", "reptile_project");

    if ($conn->connect_errno) {
        die("Failed to connect to MySQL: " . $conn->connect_error());
    }


    session_start();
    $heads = $_SESSION['headers'];
    if ($result = $conn->query($_SESSION['querystring'])) {
        //printf("Query: %s", $_SESSION['querystring']);
        /* free result set */
        //mysqli_free_result($result);
    } else {
        printf("Query failed: %s", $_SESSION['querystring']);
    }

    $fields = array();
    foreach ($heads as &$head) {
        array_push($fields, $headmap[$head]);
    }

    //echo $_SESSION['querystring'];
?>

<html>
    <head></head>
    <style>
        body {
            background-color: #262626;
            font-family: Tahoma;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }
        table, th, td {
            border-style: solid;
            border-color: black;
            border-radius: 3px;
            border-width: 3px;
        }
        h1 {
            text-shadow: -2px 0 black, 0 2px black, 2px 0 black, 0 -2px black;
            margin-bottom: 0;
            padding-bottom: 2px;
        }
        p {
            margin-left: 20px;
        }
        input {
                border-style: solid;
                border-color: black;
                border-radius: 3px;
                border-width: 2px; 
        }
    </style>

    <body text="red">

        <div style="width: 100%; display: table; margin-top: 15px;">
            <div style="display: table-row">
                <div style="width: 4%; display: table-cell;"><img src="snake-clip2.png" height="13%"></div>
                <div style="display: table-cell;">
                    <h1>Sack's Snake Sssearcher</h1>
                </div>
            </div>
        </div>

        <form action="index.php">
            <input type="submit" value="New sssearch?" style="background-color: #77b300; height: 32px; width: 110px; margin-top: 10px; margin-left: 20px;">
        </form>

        <?php if ($result->num_rows > 0): ?>
            <p><?php printf("Your search returned %d items.", $result->num_rows); ?></p>
        <table align="left" style="margin-bottom: 10px;">
          <thead>
            <tr  style="color: #77b300;">
              <th><?php echo implode('</th><th>', $fields); ?></th>
            </tr>
          </thead>
          <tbody>
        <?php foreach ($result as $row): array_map('htmlentities', $row); ?>
            <tr style="color: #e6e6e6; text-align: center;">
              <td><?php echo implode('</td><td>', $row); ?></td>
            </tr>
        <?php endforeach; ?>
          </tbody>
        </table>
        <?php else: ?>
            <p>No results were found.</p>
        <?php endif; ?>

    </body>
</html>

<?php mysqli_close($conn); ?>