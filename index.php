<?php require_once 'layout/header.php' ?>

  <!-- banner section start here-->
  <section>
    <div class="banner-grid banner-grid--no-gap banner-grid--repeat-6">
      <figure class="banner__picture">
        <img src="./assets/images/homepage_image.png" alt="Banner" class="banner__image" />
      </figure>
      <article class="banner banner__article">
        <div class="banner__content">
          <h3 class="banner__title">Pay half the price!</h3>
          <p class="banner__subtitle">
            Shop with us this Christmas and get 50% discount on your first purchase!
          </p>
          <a href="register.html" class="banner__btn" title="Pay half the price!">
            Join!
          </a>
        </div>
      </article>
    </div>
  </section>
  <!-- banner section ends here-->

  <!-- products section start here -->
  <section>
    <div class="product-header">
      <h2 class="title">
        <span class="inner">
          Products <span class="inner__line-break">of the Month</span>
        </span>
      </h2>
    </div>
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
  </section>
  <!-- products section ends here -->
<?php require_once 'layout/footer.php' ?>