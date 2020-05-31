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
                  Enter new information on current character here:
                  <p>
                    <label for="name"> Name: </label>;
                    <input type="text" id="name" name="name"></input>;
                  </p>
                  <p>
                    <label for="race"> Race: </label>;
                    <input type="text" id="race" name="race"></input>;
                  </p>
                  <p>
                    <label for="class"> Class: </label>;
                    <input type="text" id="class" name="class"></input>;
                  </p>
                  <p>
                    <label for="subclass"> Subclass: </label>;
                    <input type="text" id="subclass" name="subclass"></input>;
                  </p>
                  <p>
                    <label for="gender"> Gender: </label>;
                    <input type="text" id="gender" name="gender"></input>;
                  </p>
                  <input type="button" onclick="editInfo()"></input>
                </form>
                <br>
                <form>
                  Enter any new items for character:
                  <p>
                    <label for="itemName"> Item Name: </label>;
                    <input type="text" id="itemName" name="ItemName"></input>;
                  </p>
                  <p>
                    <label for="price"> Price: </label>;
                    <input type="text" id="price" name="price"></input>;
                  </p>
                  <p>
                    <label for="weight"> Weight: </label>;
                    <input type="text" id="weight" name="weight"></input>;
                  </p>
                  <input type="button" onclick="editInv()"></input>
                </form>

                <a href="index.php"> Back to home page </a>;
                <script>
                  function editInfo() {
                      <?php
                      try
                      {
                          $user = 'postgres';
                          $password = 'byuiisnice1';
                          $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);

                          $name = $_POST['name'];
                          $race = $_POST['race'];
                          $class = $_POST['class'];
                          $subclass = $_POST['subclass'];
                          $gender = $_POST['gender'];

                      }
                      catch (PDOException $ex)
                      {
                          echo 'Error!: ' . $ex->getMessage();
                          die();
                      }

                      $sql = "UPDATE dnd.characters SET name = '$name', race = '$race', class = '$class', subclass = '$subclass', gender = '$gender'  
                      WHERE name = '$_SESSION['character']'";

                      if ($db->query($sql) === TRUE) {
                          echo "Character updated successfully";
                      } else {
                          echo "Error: " . $sql . "<br>" . $connection->error;
                      }

                      $db->close();
                      ?>
                  }

                  function editInv() {
                      <?php
                      try
                      {
                          $user = 'postgres';
                          $password = 'byuiisnice1';
                          $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);

                          $itemName = $_POST['itemName'];
                          $price = $_POST['price'];
                          $weight = $_POST['weight'];

                      }
                      catch (PDOException $ex)
                      {
                          echo 'Error!: ' . $ex->getMessage();
                          die();
                      }

                      $inventoryid= "SELECT inventoryid FROM dnd.character WHERE name = '$_SESSION['character']';";
                      $sql = "INSERT INTO dnd.inventory(itemname, price, weight, inventoryid) VALUES ('$itemName', '$price', '$weight', '$inventoryid');";


                      if ($db->query($inventoryid) === TRUE) {
                          if ($db->query($sql) === TRUE) {
                              echo "Item added successfully";
                          } else {
                              echo "Error: " . $sql . "<br>" . $db->error;
                          }
                      } else {
                          echo "Error: " . $inventoryid . "<br>" . $db->error;
                      }

                      $db->close();

                  }
                </script>
        </body>
</html>
