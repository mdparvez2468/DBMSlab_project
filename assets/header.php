<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>DIU Transport Management System</title>
</head>
<body>
<br>
<br>
<div class="container" id="mainbody">

    <h1 class="m-4"><b><u>DIU Transport Management System</u></b></h1>
    <img src="assets/images/diu-trans.jpg" id="imgdiu">

    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="#list">About</a></li>
        <li><a href="#list">List</a></li>
        <li><a href="#contact">Contact</a></li>
        <li style="float:right"><a href="#about">Login</a></li>
    </ul>
    <div class="container">
        <form action="buses.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="inputState" class="form-label" id="level">Leaving From:*</label>
                    <select id="inputState" class="form-select" name="from">
                        <option selected> . . . . </option>
                        <option>permanent campus</option>
                        <option>uttara</option>
                        <option>dhanmondi</option>
                    </select>

                </div>
                <div class="col">
                    <label for="inputState" class="form-label" id="level">Going To:*</label>
                    <select id="inputState" class="form-select" name="to">
                        <option selected> . . . . </option>
                        <option>permanent campus</option>
                        <option>uttara</option>
                        <option>dhanmondi</option>
                    </select>

                </div>
                <div class="col">
                    <label for="inputState" class="form-label" id="level">Schedule:*</label>
                    <select id="inputState" class="form-select" name="schedule">
                        <option selected> . . . . </option>
                        <option>07:00 AM</option>
                        <option>10:00 AM</option>
                        <option>02:00 PM</option>
                        <option>05:00 PM</option>
                    </select>

                </div>
                <div class="col">
                    <label for="inputState" class="form-label" id="level">Coach Type:*</label>
                    <select id="inputState" class="form-select" name="type">
                        <option selected> . . . . </option>
                        <option>teachers</option>
                        <option>students</option>
                        <option>others</option>
                    </select>

                </div>
                <div class="col">
                    <br>
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>

