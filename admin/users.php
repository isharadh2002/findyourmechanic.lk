<?php
// user_management.php

// Include database connection and header
require "../shared/connect.php";
//include '../header.php';

// Pagination variables
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 25; // Default to 25 records per page
$offset = ($page - 1) * $limit;

// Fetch total user count
$totalUsers = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user"));
$totalPages = ceil($totalUsers / $limit);

// Fetch users for the current page
$sql = "SELECT * FROM user LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="stylesheets/users.css">
    <link rel="stylesheet" href="stylesheets/sidebar.css">
    <style>
        
    </style>
</head>
<body>

<?php
require "sidebar.php"
?>

<div class="container">
    <h1>User Management</h1>
    <p>Total Records: <?= $totalUsers; ?></p>

    <!-- Search bar -->
    <input type="text" id="searchBar" placeholder="Search by name or email" onkeyup="filterTable()">
    
    <!-- User table -->
    <table id="userTable">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                
                <tr>
                    <td><?= $row['UserID']; ?></td>
                    <td><?= $row['Username']; ?></td>
                    <td><?= $row['Email']; ?></td>
                    <td><?= $row['UserType']; ?></td>
                    <td><?= $row['PhoneNumber']; ?></td>
                    <td>
                        <button class="edit-btn" onclick="editUser(<?= $row['UserID']; ?>)">Edit</button>
                        <!--<button class="toggle-btn" onclick="toggleStatus(<?= $row['UserID']; ?>, <?= $row['status']; ?>)">
                            <?= $row['status'] ? 'Deactivate' : 'Activate'; ?>
                        </button>-->
                        <button class="delete-btn" onclick="deleteUser(<?= $row['UserID']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Pagination with First and Last buttons and Records per Page Dropdown -->
    <div class="pagination">
        <!-- Records per page selection -->
        <form action="" method="GET" onchange="this.submit()">
            <label for="limit">Records per page:</label>
            <select name="limit" id="limit">
                <option value="10" <?= $limit == 10 ? 'selected' : ''; ?>>10</option>
                <option value="25" <?= $limit == 25 ? 'selected' : ''; ?>>25</option>
                <option value="50" <?= $limit == 50 ? 'selected' : ''; ?>>50</option>
                <option value="100" <?= $limit == 100 ? 'selected' : ''; ?>>100</option>
            </select>
            <input type="hidden" name="page" value="1"> <!-- Go back to the first page on limit change -->
        </form>

        <!-- First, Previous, Page Numbers, Next, Last buttons -->
        <?php if ($page > 1): ?>
            <a href="?page=1&limit=<?= $limit; ?>">First</a>
            <a href="?page=<?= $page - 1; ?>&limit=<?= $limit; ?>">&laquo; Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <a href="?page=<?= $i; ?>&limit=<?= $limit; ?>" class="<?= $i === $page ? 'active' : ''; ?>"><?= $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1; ?>&limit=<?= $limit; ?>">Next &raquo;</a>
            <a href="?page=<?= $totalPages; ?>&limit=<?= $limit; ?>">Last</a>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<?php //include '../footer.php'; ?>

<!-- Optional JavaScript for filtering table data -->
<script>
    function filterTable() {
        const filter = document.getElementById("searchBar").value.toUpperCase();
        const rows = document.getElementById("userTable").getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            let match = false;
            for (let j = 1; j < cells.length; j++) {
                if (cells[j] && cells[j].textContent.toUpperCase().includes(filter)) {
                    match = true;
                    break;
                }
            }
            rows[i].style.display = match ? "" : "none";
        }
    }
</script>

</body>
</html>
