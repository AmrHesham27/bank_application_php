<?php
    require_once '../components/header.php';
    require_once '../components/navbar.php';
?>
<section class="container my-5 py-5">
    <?php
        require_once '../php/sql.php';
        $sql = "SELECT * FROM `customers`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table id='content' class='table table-bordered'>" .
                    "<thead>
                    <tr>
                        <th>Name</th>
                        <th>Bank Account</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                    </thead>";
            while($row = $result->fetch_assoc()) {
                echo "<tbody>
                        <tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['bank_account'] . "</td>
                            <td>" . $row['balance'] . "</td>
                            <td>
                                <a  href='editCustomer.php?bank_account=" . $row['bank_account'] . "' 
                                    class='btn btn-warning mx-3'>
                                    Edit
                                </a>
                                <a  href='singleCustomer.php?bank_account=" . $row['bank_account'] . "' 
                                    class='btn btn-primary mx-3'>
                                    Single
                                </a>
                                <a  href='../php/delete_customer.php?bank_account=" . $row['bank_account'] . "' 
                                    class='btn btn-danger mx-3'>
                                    Delete
                                </a>
                                <a  href='newTransaction.php?bank_account=" . $row['bank_account'] . "' 
                                    class='btn btn-success mx-3'>
                                    New Transaction
                                </a>
                            </td>
                        </tr>
                        </tbody>";
            };
            echo "</table>";
        } 
        else {
            echo "No customers yet";
        }
        $conn->close();
    ?>
</section>
<?php
    require_once '../components/footer.php';
?>