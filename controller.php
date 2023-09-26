<?php
include 'database.php';

// Proses Insert Data
if (isset($_POST["add"])) {
    $task_label = $_POST["task"];
    $task_status = 'open';

    try {
        $stmt = $pdo->prepare("INSERT INTO tasks (task_label, task_status) VALUE (:task_label, :task_status)");

        $stmt->bindParam(':task_label', $task_label, PDO::PARAM_STR);
        $stmt->bindParam(':task_status', $task_status, PDO::PARAM_STR);

        $stmt->execute();
        echo "<script>alert('Add Successfully !');</script>";
        header('Refresh:0; url=index.php');
        // $pdo = null;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Proses Show Data
// query sql menampilan data
$stmt = $pdo->prepare("SELECT * FROM tasks ORDER BY task_id DESC");

// eksekusi query sql
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


//Proses Delete Data

if (isset($_GET["delete"])) {

    $task_id = $_GET["delete"];

    $stmt = $pdo->prepare("DELETE FROM tasks WHERE task_id = :task_id");

    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo "<script>alert('Delete Successfully !');</script>";
        // $pdo = null;
        header('Refresh:0; url=index.php');
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


//Proses Update Data Close / Open

if (isset($_GET["done"])) {

    $task_id = $_GET["done"];
    $task_status = 'close';

    if ($_GET["status"] == 'open') {
        $task_status = 'close';
    } else {
        $task_status = 'open';
    }

    $stmt = $pdo->prepare("UPDATE tasks SET task_status = :task_status WHERE task_id = :task_id");

    $stmt->bindParam(':task_status', $task_status, PDO::PARAM_STR);
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

    try {
        $stmt->execute();

        header('Refresh:0; url=index.php');
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

//GET Value Task
if (isset($_GET["id"])) {
    $task_id = $_GET["id"];

    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE task_id = $task_id");
    $stmt->execute();
    $row = $stmt->fetch();

    // Update task
    if (isset($_POST["edit"])) {

        $task_label = $_POST["task"];

        try {
            $stmt = $pdo->prepare("UPDATE tasks SET task_label = '$task_label' WHERE task_id = $task_id");

            $stmt->execute();

            echo "<script>alert('Edit Successfully');</script>";
            // $pdo = null;
            header('Refresh:0; url=index.php');
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
