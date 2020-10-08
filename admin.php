<!DOCTYPE html>
<html lang="en">

<?php require_once("include/head.html"); ?>
<body>
    <?php 
        require_once("include/header.php");
        if(!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true)){
            header("Location: index.php");
            exit();
        }
        require_once("include/modal.php");
    ?>
    <div class="admin-wrapper">
        <div class="left-sidebar">
            <ul>
                <li><a href="">Manage Drivers</a></li>
                <li><a href="">Manage Vehicles</a></li>
                <li><a href="">Manage Bookings</a></li>
            </ul>

        </div>
        <div class="admin-content">
            <div class="button-group">
                <h1>Search Booking</h1>
                <form action="p5ex3.php" method="POST">
                    <i class="fas fa-search"></i>
                    <input type="search" name="searchTxt" id="searchTxt" placeholder="search booking" required>
                    <input type="submit" name="submit" value="Go">
                </form>
                <br>
                <br>
                <br>
            </div>
            <div class="content">
                <h2 class="page-title">Latest bookings</h2>
                <?php {
                            // get database credentials
                            require_once("include/configs/config.php");
                            // make a connection to the database
                            $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE)
                                or die("<strong style=\"color:red;\">ERROR: Unable to connect to database!</strong>");
                            // issue query instruction
                            $query = "SELECT employeeNumber, lastName, firstName FROM employees";
                            $result = mysqli_query($conn, $query)
                                or die("<strong style=\"color:red;\">ERROR:Could not retrieve data!</strong>");
                            // display data from the query in a table
                            echo "<table>
                            <tr>
                                    <th>Name</th>
                                    <th colspan=\"3\">Action</th>
                            </tr>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
                                echo "<td> <a href=\"details.php?id=" . $row['employeeNumber'] . "\">Details</a> </td>";
                                echo "<td> <a href=\"update.php?id=" . $row['employeeNumber'] . "\">Update</a> </td>";
                                echo "<td> <a onclick=\"return confirm('Are you sure you want to delete " .  $row['firstName'] .
                                    " " . $row['lastName'] . "?')\" href=\"delete.php?id=" . $row['employeeNumber'] . "\">Delete</a> </td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                ?>
            </div>
        </div>
    </div>
   
</body>
</html>