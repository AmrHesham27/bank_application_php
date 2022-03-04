<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section class="container my-4">
        <div class="mb-3">
            <a href="addCustomer.php" class="btn btn-primary">Add New Customer</a>
        </div>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>