<?php
 session_start();
?>
<!DOCTYPE html>
<html>
        <head>
                <h1> Database Test </h1>
        </head>
        <body>
                <h2> Check out a character here </h2>
                <p> 'These are the characters within the database:'</p><br>
                <?php
                 $_SESSION["character"] = "man";
                 
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
                foreach ($db->query('SELECT charid, name FROM dnd.characters') as $row)
                {
                        echo "<a href='character.php' id='" $row['charid'] " onclick='change(this.id);'>" $row['name']; "</a>";
                        echo '<br>';
                ?>
                <script>
                  function change(id) {
                      <?php
                      $_SESSION["character"] = id;
                      ?>
                  }
                </script>
        </body>
</html>
