<?php
namespace PHPReportMaker12\HIMS___2019;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($login))
	$login = new login();
if (isset($Page))
	$OldPage = $Page;
$Page = &$login;

// Run the page
$Page->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php include_once "rheader.php" ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<script>
var flogin = new ew.Form("flogin");

// Validate function
flogin.validate = function()
{
	var fobj = this._form;
	if (!this.validateRequired)
		return true; // Ignore validation
	if (!ew.hasValue(fobj.username))
		return this.onError(fobj.username, ew.language.phrase("EnterUid"));
	if (!ew.hasValue(fobj.password))
		return this.onError(fobj.password, ew.language.phrase("EnterPwd"));

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	return true;
}

// Form_CustomValidate function
flogin.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flogin.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<form name="flogin" id="flogin" class="ew-form ew-login-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($login->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $login->Token ?>">
<?php } ?>
<div class="ew-login-box">
<div class="login-logo"></div>
<div class="card">
	<div class="card-body">
	<p class="login-box-msg"><?php echo $Language->phrase("LoginMsg") ?></p>
	<div class="form-group row">
		<input type="text" name="username" id="username" class="form-control ew-control" value="<?php echo HtmlEncode($login->Username) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Username")) ?>">
	</div>
	<div class="form-group row">
		<input type="password" name="password" id="password" class="form-control ew-control" placeholder="<?php echo HtmlEncode($Language->phrase("Password")) ?>">
	</div>
	<div class="form-group row">
		<div class="custom-control custom-checkbox">
			<input type="checkbox" name="type" id="rememberme" class="custom-control-input" value="a"<?php if ($login->LoginType == "a") { ?> checked<?php } ?>>
			<label class="custom-control-label" for="rememberme"><?php echo $ReportLanguage->Phrase("RememberMe") ?></label>
		</div>
	</div>
	<button class="btn btn-primary ew-button" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("Login") ?></button>
<?php

	// OAuth login
	$providers = $AUTH_CONFIG["providers"];
	$cntProviders = 0;
	foreach ($providers as $id => $provider) {
		if ($provider["enabled"])
			$cntProviders++;
	}
	if ($cntProviders > 0) {
?>
	<div class="social-auth-links text-center mb-3">
		<p><?php echo $Language->phrase("LoginOr") ?></p>
<?php
		foreach ($providers as $id => $provider) {
			if ($provider["enabled"]) {
?>
			<a href="login.php?provider=<?php echo $id ?>" class="btn btn-block btn-<?php echo strtolower($provider["color"]) ?>"><i class="fa fa-<?php echo strtolower($id) ?> mr-2"></i><?php echo $Language->phrase("Login" . $id) ?></a>
<?php
			}
		}
?>
	</div>
<?php
	}
?>
<p>&nbsp;</p>
</div>
</div>
</div>
</form>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your startup script here
// console.log("page loaded");

</script>
<?php include_once "rfooter.php" ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>