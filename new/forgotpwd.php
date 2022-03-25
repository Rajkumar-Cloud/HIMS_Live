<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$forgotpwd = new forgotpwd();

// Run the page
$forgotpwd->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$forgotpwd->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<script>
var fforgotpwd;
loadjs.ready("head", function() {
	fforgotpwd = new ew.Form("fforgotpwd");

	// Extend page with Validate function
	fforgotpwd.validate = function() {
		var fobj = this._form;
		if (!this.validateRequired)
			return true; // Ignore validation
		if (!ew.hasValue(fobj.email))
			return this.onError(fobj.email, ew.language.phrase("EnterValidEmail"));
		if (!ew.checkEmail(fobj.email.value))
			return this.onError(fobj.email, ew.language.phrase("EnterValidEmail"));
		<?php echo Captcha()->getScript() ?>

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fforgotpwd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation
	fforgotpwd.validateRequired = <?php echo JsonEncode(Config("CLIENT_VALIDATE")) ?>;
	loadjs.done("fforgotpwd");
});
</script>
<?php $forgotpwd->showPageHeader(); ?>
<?php
$forgotpwd->showMessage();
?>
<form name="fforgotpwd" id="fforgotpwd" class="ew-form ew-forgot-pwd-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$forgotpwd->IsModal ?>">
<div class="ew-forgot-pwd-box">
<div class="card">
<div class="card-body">
<p class="login-box-msg"><?php echo $Language->phrase("ResetPwdMsg") ?></p>
	<div class="form-group row">
		<input type="text" name="email" id="email" class="form-control ew-control" value="<?php echo HtmlEncode($forgotpwd->Email) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($Language->phrase("UserEmail")) ?>">
	</div>
<!-- captcha html (begin) -->
<?php echo Captcha()->getHtml(); ?>
<!-- captcha html (end) -->
<?php if (!$forgotpwd->IsModal) { ?>
	<button class="btn btn-primary ew-btn" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SendPwd") ?></button>
<?php } ?>
</div>
</div>
</div>
</form>
<?php
$forgotpwd->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$forgotpwd->terminate();
?>