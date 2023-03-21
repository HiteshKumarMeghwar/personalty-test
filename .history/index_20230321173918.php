<?php 
    // Including Header here .................
    require_once 'header/header.php';
?>


<?php 
    // Including Index file here ................
    if(isset($_SESSION['flag']) && $_SESSION['flag'] == "true"){
        require_once 'content/print_result.php';
    }
?>

<?php 
    // Including Footer here .................
    // require_once 'footer/footer.php';
?>