<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section class="container my-4">
        <div class="mb-3">
            <a href="allCustomers.php" class="btn btn-primary mt-5 mb-5">Back to All Customers Page</a>
        </div>
        <form action="../php/add_customer.php" method='post' id= "addCustomer">
            <div class="btn-3 mt-3">
                <label>Name</label>
                <input name="name" class="form-control">
            </div>
            <div class="btn-3 mt-3">
                <label>Initial Deposit</label>
                <input name="initial_deposit" class="form-control" type="number" min='100'>
            </div>
            
            <div class="btn-3 mt-5">
                <button type='submit' name="submit" class="btn btn-primary">Add Customer</button>
            </div>
        </form>
    </section>
</body>
</html>