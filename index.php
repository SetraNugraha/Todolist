<?php include 'controller.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>To Do List</title>
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- CDN Bootstrap -->
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

  <!-- Icon -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container w-50">

    <div class="header">
      <div class="title">
        <i class="bx bx-sun"></i>
        <span>To Do List</span>
      </div>

      <div class="description">
        <?= date("l, d M Y") ?>
      </div>
    </div>

    <div class="content">

      <!-- Button trigger modal -->

      <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add New Task
      </button>



      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <!-- Form Input Task -->
              <div class="card">
                <form action="" method="post" enctype="">
                  <input type="text" name="task" class="input-control" placeholder="Add Task" required>
                  <div class="text-right">
                    <button class="btn btn-primary" type="submit" name="add">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php foreach ($results as $row) : ?>

        <div class="card">
          <div class="task-item <?= $row['task_status'] == 'close' ? 'done' : '' ?> ">
            <div>
              <input type="checkbox" onclick="window.location.href = '?done=<?= $row['task_id'] ?>&status=<?= $row['task_status'] ?>'" <?= $row['task_status'] == 'close' ? 'checked' : '' ?>>
              <span><?= $row['task_label'] ?></span>
            </div>
            <div>
              <a href="edit.php?id=<?= $row['task_id'] ?>" class="text-orange" title="Edit"><i class="bx bx-edit"></i></a>
              <a href="?delete=<?= $row['task_id'] ?>" class="text-red" onclick="return confirm('Are you sure to delete this task ?')" title="Delete"><i class="bx bx-trash"></i></a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

    </div>

  </div>


  <!-- JS Bootstrap -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>