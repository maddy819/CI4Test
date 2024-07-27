<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo url_to('orders-save') ?>">
        <input type="hidden" name="id" value="<?php echo isset($order->id) ? $order->id : ""; ?>">
        Product Id :: <input type="text" name="product_id" value="<?php echo isset($order->product_id) ? $order->product_id : ""; ?>"><br>
        Price :: <input type="text" name="price" value="<?php echo isset($order->price) ? $order->price : ""; ?>"><br>
        Quantity :: <input type="text" name="qty" value="<?php echo isset($order->qty) ? $order->qty : ""; ?>"><br>
        <button type="submit" name="save" value="<?php echo isset($save) ? $save : "save_order" ; ?>">Save</button>
    </form>

    <?php 
    if(isset($_SESSION['error'])) {
        print_r($_SESSION['error']);
    } 

    if(isset($_SESSION['success'])) {
        echo $_SESSION['success'];
    }
    
    ?>
    <br><br>
    <table>
        <thead>
            <th>Id</th>
            <th>Product Id</th>
            <th>Price</th>
            <th>Quantity</th>
        </thead>
        <tbody>
            <?php 
            if(isset($orders)) {
            foreach($orders as $order) { ?>
            <tr>
                <td><?php echo $order->id; ?></td>
                <td><?php echo $order->product_id; ?></td>
                <td><?php echo $order->price; ?></td>
                <td><?php echo $order->qty; ?></td>
                <td>
                    <a href="<?php echo url_to('orders-edit', $order->id); ?>">Edit</a>
                    <a href="<?php echo url_to('orders-delete', $order->id); ?>">Delete</a>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</body>
</html>