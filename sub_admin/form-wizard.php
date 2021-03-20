<!DOCTYPE html>
<html lang="zxx" class="js">

<?php
	include_once('header.php');
	?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php
			include_once('sidebar.php');
			?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php
				include_once('headernav.php');
				?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div>
                                            <h2 class="nk-block-title fw-normal">Wizard Form</h2>
                                            <div class="nk-block-des">
                                                <p class="lead">Using the <a href="http://www.jquery-steps.com/" target="_blank">jQuery Steps</a> plugin, you can simply make step based form. You can combine with <a href="https://jqueryvalidation.org/" target="_blank">jQuery Validation</a> plugin for form validation. For a full overview of the Steps plugin, check out the <a href="http://www.jquery-steps.com/" target="_blank">documentation</a>.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Wizard Form - Basic</h4>
                                                <div class="nk-block-des">
                                                    <p>A basic demostration of wizard form.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-inner">
                                                <form action="#" class="nk-wizard nk-wizard-simple is-alter">
                                                    <div class="nk-wizard-head">
                                                        <h5>Step 1</h5>
                                                    </div>
                                                    <div class="nk-wizard-content">
                                                        <div class="row gy-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-first-name">First Name</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-first-name" name="fw-first-name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-last-name">Last Name</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-last-name" name="fw-last-name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-email-address">Email Address</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" data-msg-email="Wrong Email" class="form-control required email" id="fw-email-address" name="fw-email-address" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-mobile-number">Mobile Number</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-mobile-number" name="fw-mobile-number" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-nationality">Country</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control required" data-msg="Required" id="fw-nationality" name="fw-nationality" required>
                                                                                <option value="us">United State</option>
                                                                                <option value="uk">United KingDom</option>
                                                                                <option value="fr">France</option>
                                                                                <option value="ch">China</option>
                                                                                <option value="cr">Czech Republic</option>
                                                                                <option value="cb">Colombia</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                        </div>
                                                    </div>
                                                    <div class="nk-wizard-head">
                                                        <h5>Step 2</h5>
                                                    </div>
                                                    <div class="nk-wizard-content">
                                                        <div class="row gy-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-username">Username</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-username" name="fw-username" required>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                        </div><!-- .row -->
                                                        <div class="row gy-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-password">Password</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" data-msg="Required" class="form-control required" id="fw-password" name="fw-password" required>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-re-password">Re-Password</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" data-msg="Required" class="form-control required" id="fw-re-password" name="fw-re-password" required>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                            <div class="col-md-12">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" data-msg="Required" class="custom-control-input required" name="fw-policy" id="fw-policy" required>
                                                                    <label class="custom-control-label" for="fw-policy">I agreed Terms and policy</label>
                                                                </div>
                                                            </div>
                                                        </div><!-- .row -->
                                                    </div>
                                                    <div class="nk-wizard-head">
                                                        <h5>Step 3</h5>
                                                    </div>
                                                    <div class="nk-wizard-content">
                                                        <div class="row gy-2">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-token-address">Token Address</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-token-address" name="fw-token-address" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="form-label">I want to contribute</label>
                                                                <ul class="d-flex flex-wrap g-2">
                                                                    <li>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" data-msg="Required" class="custom-control-input required" name="fw-ethcount" id="fw-lt1eth" required>
                                                                            <label class="custom-control-label" for="fw-lt1eth">Less than 1 ETH</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" data-msg="Required" class="custom-control-input required" name="fw-ethcount" id="fw-ov1eth" required>
                                                                            <label class="custom-control-label" for="fw-ov1eth">Over than 1 ETH</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-telegram-username">Telegram Username</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" data-msg="Required" class="form-control required" id="fw-telegram-username" name="fw-telegram-username" required>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                        </div><!-- .row -->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
               <?php
				include_once('footer.php');
				?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
   
</body>

</html>