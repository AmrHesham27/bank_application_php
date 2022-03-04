<?php
    require_once '../components/header.php';
    require_once '../components/navbar.php';
?>
<?php
    require_once '../php/sql.php';
    $queries = array();
    parse_str( $_SERVER['QUERY_STRING'], $queries );
    $bank_account = $queries['bank_account'];
    $sql = "SELECT * FROM customers WHERE bank_account='$bank_account' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<section class="container my-4"> 
    <div class="mb-3">
        <a href="allCustomers.php" class="btn btn-primary my-5">Back to All Customers Page</a>
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
    ?>
    <form action="../php/new_transaction.php?bank_account=<?php echo $bank_account ?>"
            id= "transactionForm" method='post'>
        <div class="btn-3 w-25">
            <label>amount</label>
            <input id='amount' name="amount" class="form-control">
        </div>
        
        <div>
            <input type="radio" id="deposit" name="transcation" value="deposit">
            <label for="deposit">deposit</label>
            <input type="radio" id="withdraw" name="transcation" value="withdraw">
            <label for="withdraw">withdraw</label><br>
        </div>
        
        <div class="btn-3 my-5">
            <button class="btn btn-primary">Ok</button>
        </div>
    </form>
</section>
<?php
    require_once '../components/footer.php';
?>