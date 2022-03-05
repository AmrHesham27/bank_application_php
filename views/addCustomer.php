<?php
    require_once '../components/header.php';
    require_once '../components/navbar.php';
?>
<section class="container my-4">
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
<?php
    require_once '../components/footer.php';
?>