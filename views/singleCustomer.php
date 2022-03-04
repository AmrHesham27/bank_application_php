<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once '../php/sql.php';
        $queries = array();
        parse_str( $_SERVER['QUERY_STRING'], $queries );
        $bank_account = $queries['bank_account'];
        $sql = "SELECT * FROM customers WHERE bank_account='$bank_account' LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <section class="container my-5">
        <div class="mb-3 my-5">
            <a href="allCustomers.php" class="btn btn-primary">Back to All Users Page</a>
        </div>
        
        <?php
            echo
            "<table id='singleCustomerTable' class='table table-bordered my-5'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bank Account</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>".$row['name']."</td>
                        <td>".$row['bank_account']."</td>
                        <td>".$row['balance']."</td>
                    </tr>
                </tbody>
            </table>";
            $object_transactions =  json_decode($row['transactions']);
            $array_transactions = (array)$object_transactions;
            $count = count($array_transactions);
            if($count != 0){
                echo "<table id='singleCustomerTransactions' class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>type</th>
                                <th>amount</th>
                                <th>id</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach($array_transactions as $id => $one_transaction) {
                    echo    "<tr>
                                <td>".$one_transaction->type."</td>
                                <td>".$one_transaction->amount."</td>
                                <td>".$id."</td>
                            </tr>";
                };
                echo "</tbody></table>";
            }
            else{
                echo "<p class='alert alert-danger text-center'>No transactions yet</p>";
            }
        ?>
    </section>
</body>
</html>