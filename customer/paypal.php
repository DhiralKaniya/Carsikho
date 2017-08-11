<?php
include('controller.php');
$file = file_get_contents('http://api.fixer.io/latest?base=INR');
$fdecode = json_decode($file);
$rate = $fdecode->rates;
//print_r($rate);
$usd = $rate->INR;

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='info@codexworld.com'; // Business email ID

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


<h4>Welcome, Guest</h4>
 
<div class="product">            
    
    <table>
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>USD</th>
            <th></th>
        </tr>

        <?php
        $sel_p = "select * from products";
        $res_p = $conn->query($sel_p);
        while($row_p=$res_p->fetch_object())
        {
            ?>

                
            <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
            <tr>
            <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="item_name" value="<?php echo $row_p->product?>">
                <input type="hidden" name="item_number" value="<?php echo $row_p->pid?>">
                <input type="hidden" name="credits" value="510">
                <input type="hidden" name="userid" value="1">
                <input type="hidden" name="amount" value="<?php echo round($row_p->price*$usd,2)?>">
                <input type="hidden" name="cpp_header_image" value="">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="handling" value="0">
                <input type="hidden" name="cancel_return" value="http://localhost/Final_Paypal/cancel.php">
                <input type="hidden" name="return" value="http://localhost/Final_Paypal/success.php">
                <td><?php echo $row_p->product?></td>
                <td><img src="images/Products/<?php echo $row_p->product_img?>" width="100" height="180"></td>
                <td><?php echo $row_p->price?></td>
                <td><?php echo round($row_p->price*$usd,2)?></td>
                <td><input type="image" target="_blank" src="images/bn.png" name="submit" alt="PayPal - The safer, easier way to pay online!"></td>
            </tr>
            </form>
            <?php
        }
        ?>
    </table>
    
    <!--<div class="btn">
    
    <input type="hidden" name="business" value="<?php //echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="PHPGang Payment">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="10">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://localhost/Final_Paypal/cancel.php">
    <input type="hidden" name="return" value="http://localhost/Final_Paypal/success.php">
    <input type="image" target="_blank" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form> 
    else if(isset($_REQUEST['payment'])&&isset($_REQUEST['custid'])&&isset($_REQUEST['csid']))
    {
        $file = file_get_contents('http://api.fixer.io/latest?base=INR');
        $fdecode = json_decode($file);
        $rate = $fdecode->rates;
        //print_r($rate);
        $usd = $rate->INR;

        $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
        $paypal_id='info@codexworld.com'; // Business email ID
        
        $_SESSION['custid']=$_REQUEST['custid'];
        $_SESSION['csid']=$_REQUEST['csid'];
        $_SESSION['startdate']=$_REQUEST['startdate'];
        $_SESSION['lastdate']=$_REQUEST['lastdate'];
        $_SESSION['price']=$_REQUEST['price'];
        $_SESSION['noofday']=$_REQUEST['noofday'];
        ?>
            <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
            <tr>
            <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="item_name" value="">
                <input type="hidden" name="item_number" value="<?php echo $_SESSION['csid']; ?>">
                <input type="hidden" name="credits" value="510">
                <input type="hidden" name="userid" value="1">
                <input type="hidden" name="amount" value="<?php echo round($_SESSION['price']*$usd,2)?>">
                <input type="hidden" name="cpp_header_image" value="">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="currency_code" value="INR">
                <input type="hidden" name="handling" value="0">
                <input type="hidden" name="cancel_return" value="index.php">
                <input type="hidden" name="return" value="localhost/carsikho/customer/success.php">
                <td><?php echo $_SESSION['startdate'].$_SESSION['lastdate'];?></td>
                <td><img src="images/Products/<?php echo $row_p->product_img?>" width="100" height="180"></td>
                <td><?php echo $_SESSION['price']?></td>
                <td><?php echo round($_SESSION['price']*$usd,2)?></td>
                <td><input type="Submit" class="btn btn-success" value="click To pay Online" name="submit" alt="PayPal - The safer, easier way to pay online!"></td>
            </tr>
            </form>
            <?php
    }
    </div>-->
    
</div>
</body>
</html>