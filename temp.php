<?php
/**
 * Created by PhpStorm.
 * User: aishwarya
 * Date: 18-Jan-17
 * Time: 11:09 PM
 */
?>

<form action="" method="get">
    <input type="text" name="name">
    <input type="submit" value="submit">
</form>

<?php
if(isset($_GET['name']))
    echo $_GET['name'];
else
    echo "not set";
?>