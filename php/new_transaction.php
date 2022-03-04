<?php
    require_once './sql.php';
    // get the queries
    $queries = array();
    parse_str( $_SERVER['QUERY_STRING'], $queries );
    $bank_account = $queries['bank_account'];
    // data to send 
    $amount = $_POST['amount'];
    $type = $_POST['transcation'];
    $transaction_id = uniqid();
    // new transaction object
    $new_transaction = new class{};
    $new_transaction->type = $type;
    $new_transaction->amount = $amount; 
    // get al trnsacations from sql
    $sql_get = "SELECT * FROM customers WHERE bank_account='$bank_account' LIMIT 1";
    $result_get = $conn->query($sql_get);
    $row = $result_get->fetch_assoc();
    // check if balance is sufficent (in case of withdraw)
    if(($row['balance'] < $amount) && ($type == 'withdraw') ){
        echo "<script>
                alert('sorry, balance is not sufficient');
                document.location='/Bank_Application/views/newTransaction.php?bank_account=" . $bank_account . "';
             </script>";
    } 
    else {
        if ($type == 'deposit'){
            $new_balance = $row['balance'] + $amount;
        }
        else {
            $new_balance = $row['balance'] - $amount;
        }
        $object_transactions =  json_decode($row['transactions']);
        $object_transactions->$transaction_id = $new_transaction;
        $json_transactions = json_encode($object_transactions);
        $sql_update = "UPDATE customers SET transactions='$json_transactions', balance=$new_balance WHERE bank_account='$bank_account'";
        if ($conn->query($sql_update) === true) {
            // this how to redirect user in HTML
            echo "<script>
                    alert('Transaction was made successfully');
                    document.location='/Bank_Application/views/newTransaction.php?bank_account=" . $bank_account . "';
                 </script>";
        } 
        else {
            echo "<script>
                    alert($conn->error);
                    document.location='/Bank_Application/views/newTransaction.php?bank_account=" . $bank_account . "';
                 </script>";
        };
    }
?>