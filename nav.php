<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="flatly.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Time Zone Conversion</span>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li
                <?php 
                if ($title == "Time Zone Selection")
                    echo ' class="active"';
                ?>
                >
                    <a href="index.php">
                        Time Zone Selection
                    </a>
                </li>
                <li
                <?php 
                if ($title == "Current Time")
                    echo ' class="active"';
                ?>
                >
                    <a href="current.php">
                        Current Time
                    </a>
                </li>
                <li
                <?php 
                if ($title == "Maintance Page")
                    echo ' class="active"';
                ?>
                >
                    <a href="maintance.php">
                        Maintance Page
                    </a>
                </li>
                <li
                <?php 
                if ($title == "Current World Times")
                    echo ' class="active"';
                ?>
                >
                    <a href="worldtimes.php">
                        Current World Times
                    </a>
                </li>
                <li
                <?php 
                if ($title == "Time Zone Calculator")
                    echo ' class="active"';
                ?>
                >
                    <a href="calculator.php">
                        Time Zone Calculator
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>