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
                <p> These are the characters within the database:</p><br>
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
                <p> Add new characters: </p><br>
                <form>
                        <p>
                                <label for="name">Name: </label>
                                <input type="text" name="name" id="name" required>
                        </p>
                        <p>
                                <label for="race">Race: </label>
                                <input type="text" name="race" id="race" required>
                        </p>
                        <p>
                                <label for="class">Class: </label>
                                <input type="text" name="class" id="class" required>
                        </p>
                        <p>
                                <label for="subclass">Subclass: </label>
                                <input type="text" name="subclass" id="subclass" required>
                        </p>
                        <p>
                                <label for="gender">Gender: </label>
                                <input type="text" name="gender" id="gender" maxlength="1" onkeydown="upperCaseF(this)" required>
                        </p>
                        <input type="submit" value="Add Character"></input>
                </form>
                <script>
                  function change(id) {
                      <?php
                      $_SESSION["character"] = id;
                      ?>
                  }

                  function upperCaseF(a){
                     setTimeout(function(){
                        a.value = a.value.toUpperCase();
                        }, 1);
                  }

                  function addCharacter(){
                  <?php
                  try
                  { 
                    $servername = "localhost";
                    $username = "username";
                    $password = "password";
                    $dbname = "myTestDB";

                    $name = $_POST['name'];
                    $race = $_POST['race'];
                    $class = $_POST['class'];
                    $subclass = $_POST['subclass'];
                    $gender = $_POST['gender'];

                    $connection = new mysqli($servername, $username, $password, $dbname);
                    if ($connection->connect_error) {
                       die("Failed to connect: " . $connection->connect_error);
                    }

                    $sql = "INSERT INTO dnd.characters (name, race, class, subclass, gender)
                    VALUES ('$name', '$race', '$class', '$subclass', '$gender')";

                    if ($connection->query($sql) === TRUE) {
                      echo "New character added successfully";
                    } else {
                      echo "Error: " . $sql . "<br>" . $connection->error;
                    }                     

                    $connection->close();       
                    ?>
                  }                 
                </script>
        </body>
</html>
