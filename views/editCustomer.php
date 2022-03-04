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
    <form action="../php/edit_customer.php?bank_account=<?php echo $bank_account ?>" 
            method='post' id= "editCustomerForm">
        <div class="btn-3">
            <label>Name</label>
            <input name="name" value=<?php echo "'".$row['name']."'" ?> class="form-control">
        </div>
        
        <div class="btn-3 my-5">
            <button class="btn btn-primary">Edit Customer</button>
        </div>
    </form>
</section>
<?php
    require_once '../components/footer.php';
?>