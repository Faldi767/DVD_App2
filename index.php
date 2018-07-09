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
			if($_GET["page"] == "detail") {
				loaddetailshop($_GET["id"]);
			}
        }
        footer();
    ?>
</body>
</html>