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
                                            <h2 class="nk-block-title fw-normal">jQuery Form Validation</h2>
                                            <div class="nk-block-des">
                                                <p class="lead">Using the <a href="https://jqueryvalidation.org/" target="_blank">jQuery Validation</a> plugin, you can simply add validation on clientside before submit form. The plugin also offering plenty of customization options. For a full overview of this plugin, check out the <a href="https://jqueryvalidation.org/" target="_blank">documentation</a>.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Validation - Regular Style</h4>
                                                <div class="nk-block-des">
                                                    <p>Validating your form, just add the class <code class="code-class">.form-validate</code> to any <code class="code-tag">&lt;form&gt;</code>, then it validate the form show error message.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-inner">
                                                <form action="#" class="form-validate">
                                                    <div class="row g-gs">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-name">Full Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="fv-full-name" name="fv-full-name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-email">Email address</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="fv-email" name="fv-email" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-subject">Subject</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="fv-subject" name="fv-subject" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-topics">Topics</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-control form-select" id="fv-topics" name="fv-topics" data-placeholder="Select a option" required>
                                                                        <option label="empty" value=""></option>
                                                                        <option value="fv-gq">General Question</option>
                                                                        <option value="fv-tq">Tachnical Question</option>
                                                                        <option value="fv-ab">Account &amp; Billing</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-message">Message</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control form-control-sm" id="fv-message" name="fv-message" placeholder="Write your message" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Communication</label>
                                                                <ul class="custom-control-group g-3 align-center">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="fv-com" id="fv-com-email" required>
                                                                            <label class="custom-control-label" for="fv-com-email">Email</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="fv-com" id="fv-com-sms" required>
                                                                            <label class="custom-control-label" for="fv-com-sms">SMS</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="fv-com" id="fv-com-phone" required>
                                                                            <label class="custom-control-label" for="fv-com-phone">Phone</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Validation - Alternet Style</h4>
                                                <div class="nk-block-des">
                                                    <p>You can add <code class="code-class">.is-alter</code> with <code class="code-class">.form-validate</code> class then all the error message show different style.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-inner">
                                                <form action="#" class="form-validate is-alter">
                                                    <div class="row g-gs">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fva-full-name">Full Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="fva-full-name" name="fva-full-name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fva-email">Email address</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="fva-email" name="fva-email" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fva-subject">Subject</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="fva-subject" name="fva-subject" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fva-topics">Topics</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-control form-select" id="fva-topics" name="fva-topics" data-placeholder="Select a option" required>
                                                                        <option label="empty" value=""></option>
                                                                        <option value="fva-gq">General Question</option>
                                                                        <option value="fva-tq">Tachnical Question</option>
                                                                        <option value="fva-ab">Account &amp; Billing</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fva-message">Message</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control form-control-sm" id="fva-message" name="fva-message" placeholder="Write your message" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Communication</label>
                                                                <ul class="custom-control-group g-3 align-center">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="fva-com" id="fva-com-email" required>
                                                                            <label class="custom-control-label" for="fva-com-email">Email</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="fva-com" id="fva-com-sms" required>
                                                                            <label class="custom-control-label" for="fva-com-sms">SMS</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" name="fva-com" id="fva-com-phone" required>
                                                                            <label class="custom-control-label" for="fva-com-phone">Phone</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                                            </div>
                                                        </div>
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