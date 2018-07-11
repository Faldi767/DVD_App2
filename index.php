<!DOCTYPE html>
<?php include("function.php"); ?>
<html lang="en">
<?php home(); ?>
<body>
    <?php 
		session_start();
        top(); 
        navbar();
        if(!isset($_GET["page"])) {
            slider();
            loadhomeproduct();
        } else {
            if($_GET["page"] == "shop") {
				if(isset($_GET["pageno"])) {
					loadshop($_GET["pageno"]);
				} else {
					loadshop();
				}
            }
			else if($_GET["page"] == "detail") {
				loaddetailshop($_GET["id"]);
			}
			else if($_GET["page"] == "login") {
				loadlogin();
			}
			else if($_GET["page"] == "processlogin") {
				login($_POST["c_email"], $_POST["c_pass"]);
			}
			else if($_GET["page"] == "account") {
				loadaccount();
			}
			else if($_GET["page"] == "register") {
				loadregister();
			}
			else if($_GET["page"] == "processregister") {
				$image = $_FILES['c_image']['name'];
				$image_temp = $_FILES['c_image']['tmp_name'];
				move_uploaded_file($image_temp,"customer/customer_images/$image");
				register($_POST["c_name"], $_POST["c_email"], $_POST["c_pass"], $_POST["c_country"], $_POST["c_city"], $_POST["c_contact"], $_POST["c_address"], $image);
			}
			else if($_GET["page"] == "logout") {
				logout();
			}
			else if($_GET["page"] == "addcart") {
				addtocart($_SESSION["id"], $_POST["idproduct"], $_POST["product_qty"]);
			}
			else if($_GET["page"] == "cart") {
				cart();
			}
			else if($_GET["page"] == "updatecart") {
				deletecart();
			}
			else if($_GET["page"] == "setpass") {
				if($_POST["old_pass"] == $_SESSION["password"] && $_POST["c_new_pass"] == $_POST["new_pass"]) {
					$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					$id = $_SESSION["id"];
					$newpass = $_POST["new_pass"];
					$sql = "UPDATE tbl_customer SET customer_password='$newpass' WHERE id_customer=$id";

					if ($conn->query($sql) === TRUE) {
						header("Location: index?page=account");
					} else {
						echo "Error updating record: " . $conn->error;
					}
				}
				$conn->close();
			}
			else if($_GET["page"] == "setaccount") {
					$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					$id = $_SESSION["id"];
					$name = $_POST["c_name"];
					$email = $_POST["c_email"];
					$country = $_POST["c_country"];
					$city = $_POST["c_city"];
					$phone = $_POST["c_contact"];
					$address = $_POST["c_address"];
					$image = $_FILES['c_image']['name'];
					$image_temp = $_FILES['c_image']['tmp_name'];
					move_uploaded_file($image_temp,"customer/customer_images/$image");
					$sql = "UPDATE tbl_customer SET customer_name='$name', customer_email='$email', country='$country', city='$city', phone_number='$phone', address='$address', image='$image' WHERE id_customer=$id";

					if ($conn->query($sql) === TRUE) {
						$_SESSION["nama"] = $name;
						$_SESSION["email"] = $email;
						$_SESSION["country"] = $country;
						$_SESSION["city"] = $city;
						$_SESSION["telp"] = $phone;
						$_SESSION["address"] = $address;
						$_SESSION["image"] = $image;
						header("Location: index?page=account");
					} else {
						echo "Error updating record: " . $conn->error;
					}
			}
        }
        footer();
    ?>
</body>
</html>