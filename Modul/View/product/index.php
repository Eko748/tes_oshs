<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link rel="icon" href="../../../assets/img/TEST_oshs.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="../../../assets/img/TEST_oshs.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../home/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Product</a>
                    </li>
                </ul>
                <button onclick="confirmLogout()" class="btn btn-primary float-end">Logout</button>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 mt-3">
                        <h3 class="mb-4">Products Table</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 mt-3">
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addProductModal">Add New</button>
                    </div>
                </div>
            </div>
            <?php include('create.php'); ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../../../koneksi/db_connection.php';

                            $sql = "SELECT * FROM product";
                            $result = $db->query($sql);
                            $rowNumber = 1;

                            if ($result->num_rows > 0) {
                                while ($product = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $rowNumber++ . "</td>";
                                    echo "<td>" . $product['product_name'] . "</td>";
                                    echo "<td>Rp." . $product['price'] . "</td>";
                                    echo "<td>" . $product['category'] . "</td>";
                                    echo "<td>" . $product['stock'] . "</td>";
                                    echo "<td>" . $product['created_at'] . "</td>";
                                    echo "<td>" . $product['updated_at'] . "</td>";
                                    echo '<td class="text-center">
                    <button type="button" class="btn btn-warning text-white mb-1 me-1" data-bs-toggle="modal" data-bs-target="#editProductModal' . $product['id'] . '">Update</button>
                    <button type="button" class="btn btn-danger mb-1 ms-1" onclick="confirmDelete(' . $product['id'] . ', \'' . $product['product_name'] . '\')">Delete</button>
                </td>';
                                    echo "</tr>";
                                    include 'update.php';
                                }
                            } else {
                                echo "<tr><td class='text-center' colspan='8'>No products found</td></tr>";
                            }

                            $db->close();
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/js/bootstrap.js"></script>
    <script>
        function confirmDelete(id, productName) {
            if (confirm("Are you sure you want to delete the product '" + productName + "'?")) {
                window.location.href = "../../controller/product/delete_product_handler.php?id=" + id;
            }
        }
    </script>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "../../controller/auth/logout_handler.php";
            }
        }
    </script>
</body>

</html>