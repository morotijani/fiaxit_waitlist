<?php

    include ('config.php');

    // fetch alist data from database
    $sql = "SELECT * FROM list";
    $statement = $dbConnection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $count = $statement->rowCount();



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fiaxit . Waitlist</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code:ital,wght@0,300..800;1,300..800&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <link href="https://coderthemes.com/around/assets/icons/around-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://coderthemes.com/around/assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css">
   
</head>
<body >
    <main class="page-wrapper">

        <div class="row justify-content-center">
            <!-- Page content -->
            <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
                <div class="d-sm-flex align-items-center mb-4">
                    <h1 class="h2 mb-4 mb-sm-0 me-4">Wait list</h1>
                    <div class="d-flex ms-auto">
                        <a href="visitors.php" class="btn btn-dark">Visitors</a>
                    </div>
                </div>
                <div class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
                    <div class="card-body">

                        <!-- Stats -->
                        <div class="row g-3 g-xl-4">
                            <div class="col-md-6 col-sm-6">
                                <div class="h-100 bg-secondary rounded-3 text-center p-4">
                                    <h2 class="h6 pb-2 mb-1">Number</h2>
                                    <div class="h2 text-primary mb-2">#<?= $count; ?></div>
                                        <p class="fs-sm text-body-secondary mb-0">From 15/10/2024</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="h-100 bg-secondary rounded-3 text-center p-4">
                                        <h2 class="h6 pb-2 mb-1">Visitors</h2>
                                        <div class="h2 text-primary mb-2">#3</div>
                                            <p class="fs-sm text-body-secondary mb-0"><?= date("Y-m-d"); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 py-4">
                            <div class="h-100 border card card-body">
                                <!-- Basic table -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Device</th>
                                                <th scope="col">OS</th>
                                                <th scope="col">Refferer</th>
                                                <th scope="col">Browser</th>
                                                <th scope="col">IP</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (is_array($result) && $count > 0): ?>
                                                <?php $i = 1; foreach ($result as $row ): ?>
                                            <tr>
                                                <th scope="row"><?= $i?></th>
                                                <td><?= $row["list_email"]; ?></td>
                                                <td>
                                                    <?= $row["country_code"] . $row["list_phone"]; ?>
                                                    <br>
                                                    <?php 
                                                        if ($row["country_code"] == "+233") {
                                                            echo "Ghana";
                                                        } else if ($row["country_code"] == "+256") {
                                                            echo "Uganda";
                                                        } else if ($row["country_code"] == "+254") {
                                                            echo "Kenya";
                                                        } else if ($row["country_code"] == "+234") {
                                                            echo "Nigeria";
                                                        } else {
                                                            echo "Unknown";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $row["list_device"]; ?></td>
                                                <td><?= $row["list_os"]; ?></td>
                                                <td><?= $row["list_refferer"]; ?></td>
                                                <td><?= $row["list_browser"]; ?></td>
                                                <td><?= $row["list_ip"]; ?></td>
                                                <td><?= pretty_date($row["created_at"]); ?></td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">No data</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://coderthemes.com/around/assets/js/theme.min.js"></script>

</body>
</html>