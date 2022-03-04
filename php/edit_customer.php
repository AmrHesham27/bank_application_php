<?php
    require_once "sql.php";
    // form inputs 
    $name = $_POST['name'];
    // url query
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $bank_account = $queries['bank_account'];
    // sql logic
    $sql = "UPDATE customers SET name='$name' WHERE bank_account='$bank_account'";
    if ($conn->query($sql) === true) {
        // this how to redirect user in HTML
        echo "<script>
                alert('Customer was edited successfully');
                document.location='/Bank_Application/views/editCustomer.php?bank_account=" . $bank_account . "';
             </script>";
    } 
    else {
        echo "<script>
                alert($conn->error);
                document.location='/Bank_Application/views/editCustomer.php?bank_account=" . $bank_account . "';
             </script>";
    };
?>