<?php require_once 'layout/header.php' ?>

    <!-- breadcrumb section start here -->
    <div class="breadcrumb">
        <ul class="breadcrumb__list">
            <li class="breadcrumb__item">
                <a href="index.php" title="Merry Drinks">Home</a>
            </li>
        </ul>
    </div>
    <!-- breadcrumb ends here -->

    <!-- product details section start here -->
    <?php if (!empty($product)) {?>
    <div class="wrapper">
        <article class="product-page">
            <div class="product-page__section product-page__section--main product-main">
                <div class="product-main__image-container">
                    <img src="assets/images/products/<?=$product["img"]?>"
                        alt="Moët &amp; Chandon 2013 Vintage Champagne" class="product-main__image" width="3"
                        height="4" />
                </div>
                <div class="product-main__action">
                    <div class="product-action">
                        <div class="product-action__row">
                            <p class="product-action__stock-flag">
                                In
                                Stock
                            </p>
                            <p class="product-action__exclusive">Web Exclusive Price</p>
                            <p class="product-action__price">£<?=$product["price"]?></p>
                            <p class="product-action__vat-price">£<?=ceil($product["price"]*0.05)?> ex VAT</p>
                            <p class="product-action__unit-price">(£<?=ceil($product["price"]/75)?> per litre)</p>
                        </div>
                        <div class="product-atb">
                            <div class="product-atb__item product-atb__item--quantity">
                                <select class="product-atb__dropdown">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="5+">5+</option>
                                </select>
                            </div>
                            <div class="product-atb__item product-atb__item--button">
                                <button class="product-atb__button cta-button " title="Add to Basket">
                                    Add to Basket
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="product-shipping">
                        <h2 class="product-shipping__heading">
                            Estimated Delivery
                        </h2>
                        <ul class="product-shipping__list">
                            <li class="product-shipping__item">
                                <h3 class="product-shipping__type">
                                    Express delivery (Choose a day)
                                </h3>

                            </li>
                            <li class="product-shipping__item">
                                <h3 class="product-shipping__type">
                                    Standard delivery
                                    (4-7 Working Days)
                                </h3>

                            </li>
                            <li class="product-shipping__item">
                                <h3 class="product-shipping__type">
                                    Click &amp; Collect
                                    (Mon-Fri 10am - 5pm)
                                </h3>

                            </li>
                        </ul>

                    </div>
                </div>

            </div>


        </article>
    </div>
    <!-- product details section end here -->
    <?php  }else {?>
    <div class="product-grid product-grid--scroller">
             <ul class="product-grid__list">
                <?php foreach($q->recent_products() as $value){ ?>
                <li class="product-grid__item">
                  <a href="product.php?id=<?=$value["id"]?>" class="product-card" title="Moet Ice Imperial Rose Champagne">
                    <div class="product-card__image-container">
                      <img src="assets/images/products/<?=$value["img"]?>" alt=" <?=$value["name"]?>"
                        class="product-card__image" />
                    </div>
                    <div class="product-card__content">
                      <p class="product-card__name">
                        <?=$value["name"]?>
                      </p>
                      <p class="product-card__unit-price">75cl / <?=ceil($value["price"]/10) ?>%</p>
                    </div>
                    <div class="product-card__data">
                      <p class="product-card__price">£<?=$value["price"]?></p>
                      <p class="product-card__unit-price">(£<?=ceil($value["price"]/75)?> per litre)</p>
                    </div>
                  </a>
                </li>
                <?php }?>

            </ul>
        </div>
    <?php }?>

    <!-- products section start here -->
    <section>
        <div class="product-header">
            <h2 class="title">
                <span class="inner">
                    Similar <span class="inner__line-break"> products</span>
                </span>
            </h2>
        </div>
        <div class="product-grid product-grid--scroller">
             <ul class="product-grid__list">
                <?php foreach($q->similar_products() as $value){ ?>
                <li class="product-grid__item">
                  <a href="product.php?id=<?=$value["id"]?>" class="product-card" title="Moet Ice Imperial Rose Champagne">
                    <div class="product-card__image-container">
                      <img src="assets/images/products/<?=$value["img"]?>" alt=" <?=$value["name"]?>"
                        class="product-card__image" />
                    </div>
                    <div class="product-card__content">
                      <p class="product-card__name">
                        <?=$value["name"]?>
                      </p>
                      <p class="product-card__unit-price">75cl / <?=ceil($value["price"]/10) ?>%</p>
                    </div>
                    <div class="product-card__data">
                      <p class="product-card__price">£<?=$value["price"]?></p>
                      <p class="product-card__unit-price">(£<?=ceil($value["price"]/75)?> per litre)</p>
                    </div>
                  </a>
                </li>
                <?php }?>

            </ul>
        </div>
    </section>
      <!-- products section ends here -->
<?php require_once 'layout/footer.php' ?>