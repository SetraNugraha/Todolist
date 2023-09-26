<?php include 'controller.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To Do List</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Icon -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">

        <div class="header">
            <div class="title">

                <a href="index.php" style="text-decoration: none; color: #4d4a4a; display: flex;">
                    <i class="bx bx-chevron-left" style="font-size: 22px;"></i>
                    <span style="font-size: 17px;">Back</span>
                </a>

            </div>

            <div class="description">
                <?= date("l, d M Y") ?>
            </div>
        </div>

        <div class="content">

            <?php if ($row) { ?>
                <div class="card">
                    <form action="" method="post" enctype="">
                        <input type="text" name="task" class="input-control" placeholder="Edit Task" value="<?= htmlspecialchars($row['task_label'])?>">
                        <div class="text-right">
                            <button type="submit" name="edit">Edit</button>
                        </div>
                    </form>
                </div>

            <?php } else { ?>
                <div class="card">
                    <p>No task found for the specified ID.</p>
                </div>
            <?php } ?>

        </div>

    </div>
</body>

</html>