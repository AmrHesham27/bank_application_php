<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
</body>
</html>