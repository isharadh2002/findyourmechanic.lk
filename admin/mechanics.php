<?php
//Linking database connect file
require "../shared/connect.php";

// Pagination settings
$records_per_page = isset($_GET['records']) && is_numeric($_GET['records']) ? (int)$_GET['records'] : 25;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Count total records for pagination
$total_query = "SELECT COUNT(*) FROM mechanic INNER JOIN user ON mechanic.UserID = user.UserID";
$total_result = mysqli_query($con, $total_query);
$total_records = mysqli_fetch_array($total_result)[0];
$total_pages = ceil($total_records / $records_per_page);

// Retrieve records for the current page
$query = "SELECT * FROM mechanic INNER JOIN user ON mechanic.UserID = user.UserID LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Mechanics</title>
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="stylesheets/sidebar.css">
    <link rel="stylesheet" href="stylesheets/mechanics.css">
</head>

<body>
    <?php
    require 'sidebar.php';
    ?>
    <div class="container">
        <h1>Mechanic Management</h1>
        <div class="btn-container">
            <a href="add_mechanic.php" class="btn btn-primary">Add New Mechanic</a>
        </div>

        <table class="mechanics-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //$query = "SELECT * FROM mechanic INNER JOIN user ON mechanic.UserID = user.UserID;";
                //$result = mysqli_query($con, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        //print_r($row);
                        //echo "<br><br>";
                        echo "<tr>
                                <td>{$row['MechanicID']}</td>
                                <td>{$row['Username']}</td>
                                <td>{$row['WorkPhoneNumber']}</td>
                                <td>{$row['Email']}</td>
                                <td>{$row['Specification']}</td>
                                <td>
                                    <a href='edit_mechanic.php?id={$row['MechanicID']}' class='btn btn-edit'>Edit</a>
                                    <a href='delete_mechanic.php?id={$row['MechanicID']}' class='btn btn-delete'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No mechanics found</td></tr>";
                }
                ?>
            </tbody>
        </table>


        <div class="pagination">
            <!-- Records per page selection form -->
            <form method="GET" action="mechanics.php">
                <label for="records">Records per page:</label>
                <select name="records" id="records" onchange="this.form.submit()">
                    <option value="10" <?= $records_per_page == 10 ? 'selected' : '' ?>>10</option>
                    <option value="25" <?= $records_per_page == 25 ? 'selected' : '' ?>>25</option>
                    <option value="50" <?= $records_per_page == 50 ? 'selected' : '' ?>>50</option>
                    <option value="100" <?= $records_per_page == 100 ? 'selected' : '' ?>>100</option>
                </select>
                <!-- Preserve the current page number when changing records per page -->
                <input type="hidden" name="page" value="<?= $page ?>">
            </form>

            <!-- Pagination links -->
            <?php if ($page > 1): ?>
                <a href="mechanics.php?page=<?= 1 ?>&records=<?= $records_per_page ?>" class="btn btn-pagination">First</a>
                <a href="mechanics.php?page=<?= $page - 1 ?>&records=<?= $records_per_page ?>" class="btn btn-pagination">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="mechanics.php?page=<?= $i ?>&records=<?= $records_per_page ?>" class="btn btn-pagination <?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="mechanics.php?page=<?= $page + 1 ?>&records=<?= $records_per_page ?>" class="btn btn-pagination">Next &raquo;</a>
                <a href="mechanics.php?page=<?= $total_pages ?>&records=<?= $records_per_page ?>" class="btn btn-pagination">Last</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php
// Include the footer
//include 'footer.php';
?>