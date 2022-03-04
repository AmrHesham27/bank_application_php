<?php
    if(isset($_POST['submit'])){
        require_once "sql.php";
        // form inputs
        $name = $_POST['name'];
        $initial_deposit = $_POST['initial_deposit'];
        // data to be stored
        $transactions = '{}';
        $balance = 0;
        if( $initial_deposit ){
            // create one transaction object
            $one_transaction_object = new class{};
            $one_transaction_object->type = "deposit";
            $one_transaction_object->amount = $initial_deposit;
            $transaction_id = uniqid();
            // create all transactions object, put one transaction inside it, decode it
            $all_transactions = new class{};
            $all_transactions->$transaction_id = $one_transaction_object;
            $transactions = json_encode($all_transactions);
            // update the balance
            $balance = $initial_deposit;
        };
        // add to sql database
        $sql = "INSERT INTO customers (name, bank_account, balance, transactions) 
        VALUES ('$name', null, '$balance', '$transactions' )";
        if ($conn->query($sql) === true) {
            // this how to redirect user in HTML
            echo "<script>
                    alert('Customer was added successfully');
                    document.location='/Bank_Application/views/addCustomer.php';
                 </script>";
        } 
        else {
            echo "<script>
                    alert($conn->error);
                    document.location='/Bank_Application/views/addCustomer.php';
                 </script>";
        };
    }
    else {
        // this how to redirect user in php
        header("Location: ../addCustomer.php");
    }
?>