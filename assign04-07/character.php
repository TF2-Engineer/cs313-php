<!DOCTYPE html>
<html>
        <head>
                <h1> Database Test </h1>
        </head>
        <body>
                <h2> Character Information Below: </h2>
                <p> Here is the information for the selected character</p><br>
                <img src="" alt="no images yet">
                <?php
                try
                {
                        $user = 'postgres';
                        $password = 'byuiisnice1';
                        $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);
                }
                catch (PDOException $ex)
                {
                     echo 'Error!: ' . $ex->getMessage();
                     die();
                }
                foreach ($db->query('SELECT * FROM dnd.characters, dnd.inventory  WHERE inventoryid=:$_SESSION["character"] as $row)
                {
                echo "Name: " $row[name] "<br> Race: " $row[race] "<br> Gender: " $row[gender] "<br>";
                echo "Inventory:<br>" $row[itemname] " Price: " $row[price] "Weight: " $row[weight] "<br>"; 
                echo '<br>';
                ?>
                <br>
                <form>
                  Enter new information about xxx here:
                  <input type="text" id="newXXX"></input>
                </form>
                <a href="index.php"> Back to home page </a>;
        </body>
</html>
