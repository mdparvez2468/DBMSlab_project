<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        #mainbody {
            border: 2px solid black;
            outline: #4CAF50 solid 10px;
            margin: auto;
            padding: 20px;
            text-align: center;
            background: #0f2426;
        }
        #addfrom {
            border: 2px solid #f30909;
            outline: #c4810a solid 10px;
            margin: auto;
            padding: 10px;
            text-align: center;
            background: white;
            border-radius: 5px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        li{
            margin: 2px;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 0;
            text-decoration: none;
        }
        #delete{
            background: red;
        }
        #edit{
            background: green;
        }


    </style>
    <title>DIU Transport Management System</title>
</head>
<body>
<br>
<br>
<div class="container" id="mainbody">
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
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbmslab_project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM buses order by starting_counter";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?php echo $row["bus_no"]?></th>
                    <td><?php echo $row["starting_counter"]?></td>
                    <td><?php echo $row["end_counter"]?></td>
                    <td><?php echo $row["starting_time"]?></td>
                    <td><?php echo $row["fare"]?></td>
                    <td><?php echo $row["coach_type"]?></td>
                    <td><?php echo $row["seats"]?></td>
                    <td>
                        <ul>
                            <li><a href="#" id="edit">Edit</a></li>
                            <li><a href="#" id="delete">Delete</a></li>
                        </ul>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "0 results";
        }
        ?>

        </tbody>
    </table>


    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" id="addfrom">
            <form action="insert.php" method="post">
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">Bus Number: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="no" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <?php
                            for ($i=101;$i<=200;$i++){
                                $flag = true;
                                $sql = "SELECT * FROM buses";
                                $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                                if ($i==$row["bus_no"]) {
                                    $flag = false;
                                    break;
                                }
                            }
                            if ($flag){
                            ?>
                            <option><?php echo $i ?></option>

                            <?php } }
                            $conn->close();
                            ?>

                        </select>
                    </div>

                </div>
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">STARTING COUNTER: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="from" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <option>permanent campus</option>
                            <option>uttara</option>
                            <option>dhanmondi</option>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">END COUNTER: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="to" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <option>permanent campus</option>
                            <option>uttara</option>
                            <option>dhanmondi</option>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">STARTING TIME: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="schedule" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <option>07:00 AM</option>
                            <option>10:00 AM</option>
                            <option>02:00 PM</option>
                            <option>05:00 PM</option>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">FARE: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="fare" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <?php
                            for ($i=20;$i<=50;$i+=5){
                                    ?>
                                    <option><?php echo $i ?></option>

                                <?php }

                            ?>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">COACH TYPE: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="type" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <option>teachers</option>
                            <option>students</option>
                            <option>others</option>
                        </select>
                    </div>

                </div>
                <div class="row" style="margin: 10px">
                    <div class="col-lg-4">
                        <label for="inputState" class="form-label" style="font-size: 25px">SEATS AVAILABLE: </label>
                    </div>
                    <div class="col-lg-8">
                        <select id="inputState" class="form-select" name="seats" style="font-size: 25px">
                            <option selected> . . . . </option>
                            <option>40</option>
                            <option>30</option>
                            <option>20</option>
                        </select>
                    </div>

                </div>

                <input type="submit" value="++add" class="btn btn-primary">



            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>




</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>
