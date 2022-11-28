<?php
require_once './lib/config.php';
require_once './lib/database.php';
require_once './lib/query.php';
require_once './lib/auth.php';

$db = new Database();
$q = new Query($db);
$id = isset($_GET['id'])? $_GET['id'] : null;
$product = array();

$auth = new Auth($db);
if(isset($_POST['register'])){
  if($auth->register($_POST)){
    echo "Register was successful!";
    die();
  };
  echo "Not successful!";
  die();
}

if (!empty($id) && is_numeric($id)) {
  $product = $q->product_details($id)[0];
}
 ?>

<!-- ########################################################## REFERENCE #######################################################
          Logo source: https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pngmart.com%2Fimage%2F154744&psig=AOvVaw26tsrOcay4ioSAxJCqErKV&ust=1666886078883000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCJC3lteg_voCFQAAAAAdAAAAABAE
          Cart image source:  https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.flaticon.com%2Ffree-icon%2Fshopping-cart_925716&psig=AOvVaw1InR_8iU8y3IB-OYPppQl3&ust=1666867863676000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCOjRgOvc_foCFQAAAAAdAAAAABAI  
          Style concept & images source: https://www.thewhiskyexchange.com
     ############################################################################################################################## -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- meta tag section -->
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width" , initial-scale="1.0" />
  <meta name="Author" content="Hameed Abdulrahaman" />
  <!-- meta tag section -->
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
  <title>Home - Merry Drinks</title>
</head>

<body>
  <!-- Header section -->
  <header class="header">
    <div class="header__container">
      <h1 class="header__logo">
        <a class="header__logo-link" href="index.php" title="Merry Drinks">
          <img src="./assets/images/merry_logo.png" alt="Merry Drinks" />
        </a>
      </h1>
      <div class="header__search">
        <form class="header-search">
          <input type="text" placeholder="Search for your perfect bottle.." class="header-search__input" />
        </form>
      </div>
      <div class="header__content">
        <div class="header__buttons">
          <a class="header-button" href="register.php" title="cart">
            <img class="header-cart" src="./assets/images/cart.png" alt="Merry Drinks" />
          </a>
        </div>
      </div>
      <nav class="header-links">
        <a href="register.php" class="header-links__link" title="Track Your Order">Track Your Order</a>
        <a href="register.php" class="header-links__link" title="Create an Account">Create An Account</a>
      </nav>
    </div>
  </header>
  <!-- Header section end here-->

  <!-- navbar section -->
  <nav class="navbar">
    <div class="navbar__wrapper">
      <?php foreach ($q->get_categories() as $value) {?>
      <div class="navbar__container">
        <a class="navbar__link" href="<?=$value["route"]?>" title="Soft Drinks"><?=$value["name"]?></a>
      </div>
      <?php }?>
    
    </div>
  </nav>
  <!-- navbar section ends here-->