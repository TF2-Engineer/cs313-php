<!DOCTYPE html>
<html>
        <head>
          <h1> Database Test </h1>
          <link rel="stylesheet" href="project.css" type="text/css">
        </head>
        <body>
                <h2> Character Information Below: </h2>
                <p> Here is the information for the selected character</p><br>
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
                echo "<img src='" $row[image] "' alt='Image Error' onerror=this.src='default.png' width=360 height=360>";
                echo "Name: " $row[name] "<br> Race: " $row[race] "<br> Gender: " $row[gender] "<br>";
                echo "Stats:<br> HP: " $row[hp] " Strength: " $row[str] " Dexerity: " $row[dex] " Constitution: " $row[con] " Wisdom: " $row[wis] " Intelligence " $row[int] " Charisma " $row[cha] "<br>";
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
                  <p>
                    <label for="hp">HP: </label>
                    <input type="text" name="hp" id="hp"></input>;
                  </p>
                  <p>
                    <label for="str">Strength: </label>
                    <input type="text" name="str" id="str"></input>;
                  </p>
                  <p>
                    <label for="dex">Dexerity: </label>
                    <input type="text" name="dex" id="dex"></input>;
                  </p>
                  <p>
                    <label for="con">Constitution: </label>
                    <input type="text" name="con" id="con"></input>;
                  </p>
                  <p>
                    <label for="wis">Wisdom: </label>
                    <input type="text" name="wis" id="wis"></input>;
                  </p>
                  <p>
                    <label for="int">Intelligence: </label>
                    <input type="text" name="int" id="int"></input>;
                  </p>
                  <p>
                    <label for="cha">Charisma: </label>
                    <input type="text" name="cha" id="cha"></input>;
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
                  <input type="button" onclick="editInv()"></input>;
                </form>
                <br>
                <form>
                  Change character avatar here: (Will be displayed as a 360x360 image)
                  <p>
                    <label for="avatar"> Image URL: </label>;
                    <input type="text" id="avatar" name="avatar"></input>;
                  </p>
                  <input type="button" onclick="editAva()"></input>;
                </form>
                <br>
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
                          $hp = $_POST['hp'];
                          $str = $_POST['str'];
                          $dex = $_POST['dex'];
                          $con = $_POST['con'];
                          $wis = $_POST['wis'];
                          $int = $_POST['int'];
                          $cha = $_POST['cha'];

                      }
                      catch (PDOException $ex)
                      {
                          echo 'Error!: ' . $ex->getMessage();
                          die();
                      }

                      $sql = "UPDATE dnd.characters SET name = '$name', race = '$race', class = '$class', subclass = '$subclass', gender = '$gender', hp = '$hp', str = '$str', dex = '$dex', con = '$con', wis = '$wis', int = '$int', cha = '$cha'   
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

                  function editAva() {
                      <?php
                      try
                      {
                          $user = 'postgres';
                          $password = 'byuiisnice1';
                          $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);

                          $image = $_POST['image'];

                      }
                      catch (PDOException $ex)
                      {
                          echo 'Error!: ' . $ex->getMessage();
                          die();
                      }

                      $sql = "UPDATE dnd.characters SET image = '$image' WHERE name = '$_SESSION['character']'";

                      if ($db->query($sql) === TRUE) {
                          echo "Character image updated successfully";
                      } else {
                          echo "Error: " . $sql . "<br>" . $connection->error;
                      }

                      $db->close();
                      ?>
                      }
                  }
                </script>
        </body>
</html>
