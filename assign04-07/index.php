<?php
 session_start();
?>
<!DOCTYPE html>
<html>
        <head>
                <h1> Database Test </h1>
                <link rel="stylesheet" href="project.css" type="text/css">
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
                        echo "<input type='button' name='deleteC' id='deleteC' value='Delete Character' onclick='deleteCheck();'></input>";
                        echo "<input type='button' name='delete' id='delete' value='Yes' onclick='deleteCharacter(this.id);' style='display=none'></input>";
                        echo "<input type='button' name='deleteN' id='deleteN' value='No' onclick='cancelDelete();' style='display=none'></input>";
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
                        <br>
                        <p>
                                <label for="class">Class: </label>
                                <input type="text" name="class" id="class" required>
                        </p>
                        <p>
                                <label for="subclass">Subclass: </label>
                                <input type="text" name="subclass" id="subclass" required>
                        </p>
                        <br>
                        <p>
                                <label for="gender">Gender: </label>
                                <input type="text" name="gender" id="gender" maxlength="1" onkeydown="upperCaseF(this)" required>
                        </p>
                        <p>
                                <label for="hp">HP: </label>
                                <input type="text" name="hp" id="hp" required>
                        </p>
                        <br>
                        <p>
                                <label for="str">Strength: </label>
                                <input type="text" name="str" id="str" required>
                        </p>
                        <p>
                                <label for="dex">Dexerity: </label>
                                <input type="text" name="dex" id="dex" required>
                        </p>
                        <br>
                        <p>
                                <label for="con">Constitution: </label>
                                <input type="text" name="con" id="con" required>
                        </p>
                        <p>
                                <label for="wis">Wisdom: </label>
                                <input type="text" name="wis" id="wis" required>
                        </p>
                        <br>
                        <p>
                                <label for="int">Intelligence: </label>
                                <input type="text" name="int" id="int" required>
                        </p>
                        <p>
                                <label for="cha">Charisma: </label>
                                <input type="text" name="cha" id="cha" required>
                        </p>
                        <br>
                        <p>
                                <label for="image">Image URL: </label>
                                <input type="text" name="image" id="image">
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

                  function deleteCharacter(id){
                  <?php
                  try
                  { 
                    $servername = "localhost";
                    $username = "username";
                    $password = "password";
                    $dbname = "myTestDB";

                    $char = $_POST['id'];

                    $connection = new mysqli($servername, $username, $password, $dbname);
                    if ($connection->connect_error) {
                       die("Failed to connect: " . $connection->connect_error);
                    }

                    $sql = "DELETE FROM dnd.characters, dnd.inventory WHERE inventory.inventoryid = $char OR characters.inventoryid = $char;";

                    if ($connection->query($sql) === TRUE) {
                      echo "New character added successfully";
                    } else {
                      echo "Error: " . $sql . "<br>" . $connection->error;
                    }                     

                    $connection->close();       
                    ?>
                  }

                  function deleteCheck() {
                    var a = document.getElementById(delete);
                    var b = document.getElementById(deleteN);
                    a.style.display = "inline";
                    b.style.display = "inline";
                  }

                  function addCharacter() {
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
                    $hp = $_POST['hp'];
                    $str = $_POST['str'];
                    $dex = $_POST['dex'];
                    $con = $_POST['con'];
                    $wis = $_POST['wis'];
                    $int = $_POST['int'];
                    $cha = $_POST['cha'];

                    $connection = new mysqli($servername, $username, $password, $dbname);
                    if ($connection->connect_error) {
                       die("Failed to connect: " . $connection->connect_error);
                    }

                    $sql = "INSERT INTO dnd.characters (name, race, class, subclass, gender, hp, str, dex, con, wis, int, cha)
                    VALUES ('$name', '$race', '$class', '$subclass', '$gender', '$hp', '$str', '$dex', '$con', '$wis', '$int', '$cha')";

                    if ($connection->query($sql) === TRUE) {
                      echo "New character added successfully";
                    } else {
                      echo "Error: " . $sql . "<br>" . $connection->error;
                    }

                    $connection->close();
                    ?>  
                  }

                  function cancelDelete() {
                    var a = document.getElementById(delete);
                    var b = document.getElementById(deleteN);
                    a.style.display = "none";
                    b.style.display = "none";
                  }                 
                </script>
        </body>
</html>
