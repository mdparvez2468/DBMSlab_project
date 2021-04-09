<?php
include 'assets/header.php';
include 'assets/db.php';
$from = $_POST['from'];
$to = $_POST['to'];
$schedule = $_POST['schedule'];
$type = $_POST['type'];
?>


<table class="table table-striped" id="table" style="background: aliceblue">
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">STARTING COUNTER</th>
        <th scope="col">END COUNTER</th>
        <th scope="col">STARTING TIME</th>
        <th scope="col">FARE</th>
        <th scope="col">COACH TYPE</th>
        <th scope="col">SEATS AVAILABLE</th>
        <th scope="col">VIEW</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM buses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($from==$row["starting_counter"] && $to==$row["end_counter"] && $schedule==$row["starting_time"] && $type==$row["coach_type"]){

    ?>
    <tr>
        <th scope="row"><?php echo $row["bus_no"]?></th>
        <td><?php echo $row["starting_counter"]?></td>
        <td><?php echo $row["end_counter"]?></td>
        <td><?php echo $row["starting_time"]?></td>
        <td><?php echo $row["fare"]?></td>
        <td><?php echo $row["coach_type"]?></td>
        <td><?php echo $row["seats"]?></td>
        <td><a href="#">show</a></td>
    </tr>
    <?php
            }
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

    </tbody>
</table>


<?php
include 'assets/footer.php';
?>
