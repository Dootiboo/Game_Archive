            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'gamearchive';

            $conn = mysqli_connect($host, $user, $pass, $db);

            $name_select = $_POST['name_select'];

            $query = mysqli_query($conn, "SELECT * FROM characters WHERE name='" . $name_select . "'");

            while ($row = mysqli_fetch_array($query)) {
                
                echo '<section>';
                echo '<form method="post" action="character_edit.php">';
                echo 'Appearance: <input type="text" value="' . $row["Appearance"] . '" name="appearance2">';
                echo '<br />';
                echo 'Name: <input type="text" value="' . $row["Name"] . '" name="name2">';
                echo '<br />';
                echo 'Surname: <input type="text" value="' . $row["Surname"] . '" name="surname2">';
                echo '<br />';
                echo 'Age: <input type="number" value="' . $row["Age"] . '" name="age2">';
                echo '<br />';
                echo 'Gender: ' . $row["Gender"];
                echo '<br />';
                echo 'Male <input type="radio" name="gender2" id="male" value="male" />';
                echo '<br />';
                echo 'Female <input type="radio" name="gender2" id="female" value="female" />';
                echo '<br />';
                echo 'Nb <input type="radio" name="gender2" id="nb" value="nb" />';
                echo '<br />';
                echo 'Pronouns: ' . $row['Pronouns'];
                echo '<br />';
                echo '<select name="pronouns2">
                            <option value="She/Her">She/Her</option>
                            <option value="She/Him">She/Him</option>
                            <option value="She/Them">She/Them</option>
                            <option value="He/Him">He/Him</option>
                            <option value="He/Her">He/Her</option>
                            <option value="He/Them">He/Them</option>
                            <option value="They/Them">They/Them</option>
                            <option value="They/Her">They/Her</option>
                            <option value="They/Him">They/Him</option>
                            <option value="It/Its">It/Its</option>
                            <option value="It/Her">It/Her</option>
                            <option value="It/Him">It/Him</option>
                            <option value="It/Them">It/Them</option>
                            <option value="Any">Any</option>
                        </select>';
                echo '<br />';
                echo 'Race: ' . $row['Race'];
                echo '<br />';
                echo 'Human <input type="radio" name="race2" id="human" value="human">';
                echo '<br />';
                echo 'Robot <input type="radio" name="race2" id="robot" value="robot">';
                echo '<br />';
                echo 'Category: ' . $row['Category'];
                echo '<br />';
                echo '<select name="category2">
                            <option value="Heroes">Heroes</option>
                            <option value="Protag">Protag</option>
                            <option value="Villagers">Villagers</option>
                            <option value="Monsters">Monsters</option>
                            <option value="Bosses">Bosses</option>
                            <option value="Minibosses">Minibosses</option>
                            <option value="Parasite">Parasite</option>
                        </select>';
                echo '<br />';
                echo 'Height: <input name="height2" type="number" value="' . $row['Height'] . '"';
                echo '<br />';
                echo '<br />';
                echo 'Hero Team: ' . $row['Team'];
                echo '<br />';
                echo '<select name="hero_team2">
                            <option value=""></option>
                            <option value="saviours">saviours</option>
                            <option value="team1">team1</option>
                            <option value="team2">team2</option>
                            <option value="team3">team3</option>
                            <option value="team4">team4</option>
                            <option value="team5">team5</option>
                        </select>';
                echo '<br />';
                echo 'Status: ' . $row['Status'];
                echo '<br />';
                echo 'Dead <input type="radio" value="dead" name="status2">
                    Alive <input type="radio" value="alive" name="status2">';
                echo '<br />';
                echo '<button type="submit" name="submit2">Submit</button>';
                echo '</form>';
            }

            if (isset($_POST['submit2'])) {

                $name2 = $_POST['name2'];
                $surname2 = $_POST['surname2'];
                $age2 = $_POST['age2'];
                $height2 = $_POST['height2'];
                $gender2 = $_POST['gender2'];
                $pronouns2 = $_POST['pronouns2'];
                $race2 = $_POST['race2'];
                $appearance2 = $_POST['appearance2'];
                $category2 = $_POST['category2'];
                $hero_team2 = $_POST['hero_team2'];
                $status2 = $_POST['status2'];

                $query2 = mysqli_query($conn, "UPDATE characters SET Name='" . $name2 . "', Surname='" . $surname2 . "', Age='" . $age2 . "', Height='" . $height2 . "', Gender='" . $gender2 . "', Pronouns='" . $pronouns2 . "', Race='" . $race2 . "', Appearance='" . $appearance2 . "', Category='" . $category2 . "', Team='" . $hero_team2 . "', Status='" . $status2 . "' WHERE Name='" . $name2 . "'");
            };

            header('Location: character archive.php');
            ?>
