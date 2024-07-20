<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo url_to('orders-save') ?>">
        Product Id :: <input type="text" name="product_id"><br>
        Price :: <input type="text" name="price"><br>
        Quantity :: <input type="text" name="qty"><br>
        <button type="submit" name="save" value="save_order">Save</button>
    </form>

    <?php 
    if(isset($error)) {
        print_r($error);
    } 

    if(isset($success)) {
        echo $success;
    }
    
    ?>
</body>
</html>