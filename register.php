<?php require_once 'layout/header.php' ?>

    <!-- breadcrumb section start here -->
    <div class="breadcrumb">
        <ul class="breadcrumb__list">
            <li class="breadcrumb__item">
                <a href="index.html" title="Merry Drinks">Home</a>
            </li>
        </ul>
    </div>
    <!-- breadcrumb ends here -->
    <form method="POST" action="?" class="wrapperForm">
        <div class="account-login tweGeneralLayout">
            <div class="row cols-2">
                <div class="col">
                    <div class="subtitle">
                        <h2 class="subtitle-text">New Customer</h2>
                    </div>
                    <div class="tweForm larger-font">
                        <ul class="tweForm-content">
                            <li class="tweForm-item">
                                <label for="TxtName" class="tweForm-label">Name</label>
                                <input name="name" class="tweForm-input" placeholder="John Doe"
                                    type="text" />
                                <label for="TxtName" class="tweForm-label">Email Address</label>
                                <input name="email" class="tweForm-input" placeholder="example@example.com" type="email" />
                            </li>
                            <li class="tweForm-item">
                                <label for="TxtPassword" class="tweForm-label">Password</label>
                                <input name="password" type="password" class="tweForm-input" placeholder="Enter password" />
                            </li>
                             <li class="tweForm-item">
                                <label for="TxtPassword" class="tweForm-label">Phone</label>
                                <input name="phone" type="tel" class="tweForm-input" placeholder="+44 000000000" />
                            </li>
                             <li class="tweForm-item">
                                <label for="TxtAddress" class="tweForm-label">Address</label>
                                <input name="address" type="text" class="tweForm-input" placeholder="Enter Address" />
                            </li>
                            <input type="hidden" name="register">

                            <li class="tweForm-item">
                                <input type="submit" value="Register" class="cta-button" />
                            </li>


                        </ul>
                        <div class="clear"></div>
                       
                    </div>
                </div>
                <div class="col account-new">
                    <div class="subtitle">
                        <h2 class="subtitle-text">New Customer</h2>
                        <span class="subtitle-subtext">Register and enjoy these benefits
                        </span>
                    </div>

                    <div class="account-new-content tweGeneralContent">
                        <ul>
                            <li>Place your order online quickly</li>
                            <li>
                                Create your wishlist, set a reminder, share with your
                                friends
                            </li>
                            <li>View your order history, print invoices, re-order</li>
                            <li>Manage personal details and delivery addresses</li>
                            <li>Get exclusive "members only" occasional offers</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </form>

<?php require_once 'layout/footer.php' ?>