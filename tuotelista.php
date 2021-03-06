<?php
    include 'header.php';
?>
    <div class="container">
        <div class="row">
            <h1 style="font-size:940%;font-family:helvetica;font-weight:bold;">PHP CRUD Grid</h1>
        </div>
            <div class="row">
                <p>
                    <a href="lisaa_tuote.php" class="btn btn-success">Listaa tuote</a>
                </p>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tuotenimi</th>
                                <th>Kuva</th>
                            </tr>
                            <tr>
                                <th>Hinta</th>
                                <th>Lisatiedot</th>
                                <th>napullat</th>
                            </tr>
                        </thead>
                  <tbody>
                    <?php
                            include 'database.php';
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM tuote';
                            foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['tuotenimi'] . '</td>';
                                echo '<td><img style="width:80px" src="img/'. $row['kuva'] . '"><td width=250>'
                                echo '<td>'. $row['hinta'] . '</td>';
                                echo '<td>'. $row['lisatiedot'] . '</td>';
                                echo '<a class="btn btn-info" href="katso_tuote.php?id='.$row['tuoteID'].'">Tarkista</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="paivita_tuote.php?id='.$row['tuoteID'].'">Päivitä</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="poista_tuote.php?id='.$row['tuoteID'].'">Poista</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            Database::disconnect();
                        ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    
    <?php
        include 'footer.php'
    ?>
     </body>
</html>