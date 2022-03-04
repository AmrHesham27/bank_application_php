<?php
    require_once "sql.php";
    // url query
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $bank_account = $queries['bank_account'];
    // sql logic
    $sql = "DELETE FROM customers WHERE bank_account='$bank_account'";
    if ($conn->query($sql) === true) {
        // this how to redirect user in HTML
        echo "<script>
                alert('Customer was deleted successfully');
                document.location='/Bank_Application/views/allCustomers.php';
             </script>";
    } 
    else {
        echo "<script>
                alert($conn->error);
                document.location='/Bank_Application/views/allCustomers.php';
             </script>";
    };
?>