<!DOCTYPE html>
<?php include("function.php"); ?>
<html lang="en">
<?php home(); ?>
<body>
    <?php 
        top(); 
        navbar();
        if(!isset($_GET["page"])) {
            slider();
            loadhomeproduct();
        } else {
            if($_GET["page"] == "shop") {
                loadshop();
            }
        }
        footer();
    ?>
</body>
</html>