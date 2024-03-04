<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-4">Welcome, <?php echo $_SESSION['name']; ?>!</h1>
                    </div>
                    <div class="col-md-6 mt-3">
                        <a href="../Controller/logout_handler.php" class="btn btn-primary float-end">Logout</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../Koneksi/db_connection.php';

                        $sql = "SELECT * FROM user";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while ($user = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $user['id'] . "</td>";
                                echo "<td>" . $user['name'] . "</td>";
                                echo "<td>" . $user['email'] . "</td>";
                                echo '<td><a href="delete_user.php?id=' . $user['id'] . '" class="btn btn-danger">Delete</a></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No users found</td></tr>";
                        }

                        $db->close();
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="../Controller/logout_handler.php" class="btn btn-primary mb-3 mt-3 float-end">Logout</a>
            </div>
        </div>
    </div>

    <script src="../../Assets/js/bootstrap.js"></script>
</body>

</html>