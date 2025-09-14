<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <script src="jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <menu class="offcanvas offcanvas-end show">
        <h1>Navigation menu</h1>
        <table class="card navbar navbar-expand-lg bg-body-tertiary link-underline-light link-offset-3">
            <tr>
                <td><a href="character archive.php" id="characters">Characters</a></td>
            </tr>
            <tr>
                <td><a href="story.php" id="story">Story</a></td>
            </tr>
            <tr>
                <td><a href="uncategorised.php" id="misc">Misc</a></td>
            </tr>
        </table>
    </menu>
    <aside style="float: left;" class="card">

        <?php include 'character_echo.php'; ?>

    </aside>
    <section id='bg2'>
        <main>
            <button id='input'>Input</button><button id='edit'>Edit</button>
            <section id='form_input' style="display: none;">
                <form method="post" action="character_input.php">
                    <label for="name" >
                        Name: <input type="text" name="name" id="name" max="25" class="form-control" />
                    </label>
                    <br />
                    <label for="surname">
                        Surname: <input type="text" name="surname" id="surname" max="50" class="form-control" />
                    </label>
                    <br />
                    <label for="age">
                        Age: <input type="number" name="age" id="age" class="form-control" />
                    </label>
                    <br />
                    <label for="height">
                        Height: <input type="number" name="height" id="height" class="form-control" />
                    </label>
                    <br />
                    <label for="gender">
                        <br />
                        Gender:
                        <br />
                        Male <input type="radio" name="gender" id="male" value="male" class="form-check-input" />
                        <br />
                        Female <input type="radio" name="gender" id="female" value="female" class="form-check-input" />
                        <br />
                        Nb <input type="radio" name="gender" id="nb" value="nb" class="form-check-input" />
                    </label>
                    <br />
                    <label for="pronouns">
                        Pronouns:
                        <select name="pronouns" class="form-select">
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
                        </select>
                    </label>
                    <br />
                    <label for="race">
                        Race:
                        <br />
                        Human <input type="radio" name="race" id="human" value="human" class="form-check-input" /><br />
                        Robot <input type="radio" name="race" id="robot" value="robot" class="form-check-input" />
                    </label>
                    <br />
                    </label>
                    <label for="category">
                        Category:
                        <br />
                        <select name="category" class="form-select">
                            <option value="Heroes">Heroes</option>
                            <option value="Protag">Protag</option>
                            <option value="Villagers">Villagers</option>
                            <option value="Monsters">Monsters</option>
                            <option value="Bosses">Bosses</option>
                            <option value="Minibosses">Minibosses</option>
                            <option value="Parasite">Parasite</option>
                        </select>
                    </label>
                    <br />
                    <label for="hero_team">
                        Hero Team:
                        <br />
                        <select name="hero_team" class="form-select">
                            <option value=""></option>
                            <option value="saviours">saviours</option>
                            <option value="team1">team1</option>
                            <option value="team2">team2</option>
                            <option value="team3">team3</option>
                            <option value="team4">team4</option>
                            <option value="team5">team5</option>
                        </select>
                    </label>
                    <br />
                    <label for="status">
                        Dead <input type="radio" value="dead" name="status" class="form-check-input" />
                        Alive <input type="radio" value="alive" name="status" class="form-check-input" />
                    </label>
                    <br />
                    <label for="appearance">
                        Appearance:
                        <br />
                        <input type="file" name="appearance" id="appearance" accept="image/png, image/jpeg" />
                        <br />
                        <br />
                        <button type="submit" name="submit" class="btn btn-light">Submit</button>
                </form>
            </section>
            <section id='form_edit' style="display: block;">
                <form id="edit_form" method="post" action="character archive.php">
                    <select name='name_select' onchange="submit_form()">
                        <option></option>
                        <?php
                        $query = mysqli_query($conn, "SELECT name FROM characters");

                        while ($row = mysqli_fetch_array($query)) {
                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>

                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'gamearchive';

                    $conn = mysqli_connect($host, $user, $pass, $db);

                    if (isset($_POST['name_select'])) {
                        $name_select = $_POST['name_select'];

                        $query = mysqli_query($conn, "SELECT * FROM characters WHERE name='" . $name_select . "'");

                        while ($row = mysqli_fetch_array($query)) {

                            echo '<section>';
                            echo '<form method="post" action="character archive.php">';
                            echo 'Appearance: <input type="text"  value="' . $row["Appearance"] . '" name="appearance2">';
                            echo '<br />';
                            echo 'Name: <input type="text" value="' . $row["Name"] . '" name="name2">';
                            echo '<br />';
                            echo 'Surname: <input type="text" value="' . $row["Surname"] . '" name="surname2">';
                            echo '<br />';
                            echo 'Age: <input type="number" value="' . $row["Age"] . '" name="age2">';
                            echo '<br />';
                            echo 'Gender: ' . $row["Gender"];
                            echo '<br />';
                            echo 'Male <input type="radio" name="gender2" id="male" value="male" class="form-check-input" />';
                            echo '<br />';
                            echo 'Female <input type="radio" name="gender2" id="female" value="female" class="form-check-input" />';
                            echo '<br />';
                            echo 'Nb <input type="radio" name="gender2" id="nb" value="nb" class="form-check-input" />';
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
                            echo 'Human <input type="radio" name="race2" id="human" value="human" class="form-check-input" />';
                            echo '<br />';
                            echo 'Robot <input type="radio" name="race2" id="robot" value="robot" class="form-check-input" />';
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
                            echo 'Dead <input type="radio" value="dead" name="status2" class="form-check-input" />
                    Alive <input type="radio" value="alive" name="status2" class="form-check-input"/>';
                            echo '<br />';
                            echo '<button type="submit" name="submit2" class="btn btn-light">Submit</button>';
                            echo '</form>';
                        }
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
                    ?>


                    <script>
                        function submit_form() {
                            type = "text/javascript"
                            document.getElementById('edit_form').submit();
                        }
                    </script>
            </section>
        </main>
    </section>
    <script>
        $(function() {
            $('#input').click(function() {
                $('#form_input').show();
                $('#form_edit').hide();
            });
            $('#edit').click(function() {
                $('#form_input').hide();
                $('#form_edit').show();
            });
        });
    </script>

    <?php

    mysqli_close($conn);
    ?>

</body>

</html>