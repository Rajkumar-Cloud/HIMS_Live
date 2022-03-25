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
$userlevels_addopt = new userlevels_addopt();

// Run the page
$userlevels_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevels_addopt->Page_Render();
?>
<script>
var fuserlevelsaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	fuserlevelsaddopt = currentForm = new ew.Form("fuserlevelsaddopt", "addopt");

	// Validate form
	fuserlevelsaddopt.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($userlevels_addopt->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $userlevels_addopt->id->caption(), $userlevels_addopt->id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($userlevels_addopt->id->errorMessage()) ?>");
			<?php if ($userlevels_addopt->UserLevelsName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserLevelsName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $userlevels_addopt->UserLevelsName->caption(), $userlevels_addopt->UserLevelsName->RequiredErrorMessage)) ?>");
			<?php } ?>
				var elId = fobj.elements["x" + infix + "_id"];
				var elName = fobj.elements["x" + infix + "_UserLevelsName"];
				if (elId && elName) {
					elId.value = $.trim(elId.value);
					elName.value = $.trim(elName.value);
					if (elId && !ew.checkInteger(elId.value))
						return this.onError(elId, ew.language.phrase("UserLevelIDInteger"));
					var level = parseInt(elId.value, 10);
					if (level == 0 && !ew.sameText(elName.value, "Default")) {
						return this.onError(elName, ew.language.phrase("UserLevelDefaultName"));
					} else if (level == -1 && !ew.sameText(elName.value, "Administrator")) {
						return this.onError(elName, ew.language.phrase("UserLevelAdministratorName"));
					} else if (level == -2 && !ew.sameText(elName.value, "Anonymous")) {
						return this.onError(elName, ew.language.phrase("UserLevelAnonymousName"));
					} else if (level < -2) {
						return this.onError(elId, ew.language.phrase("UserLevelIDIncorrect"));
					} else if (level > 0 && ["anonymous", "administrator", "default"].includes(elName.value.toLowerCase())) {
						return this.onError(elName, ew.language.phrase("UserLevelNameIncorrect"));
					}
				}

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fuserlevelsaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fuserlevelsaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fuserlevelsaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $userlevels_addopt->showPageHeader(); ?>
<?php
$userlevels_addopt->showMessage();
?>
<form name="fuserlevelsaddopt" id="fuserlevelsaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $userlevels_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($userlevels_addopt->id->Visible) { // id ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_id"><?php echo $userlevels_addopt->id->caption() ?><?php echo $userlevels_addopt->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="userlevels" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?php echo HtmlEncode($userlevels_addopt->id->getPlaceHolder()) ?>" value="<?php echo $userlevels_addopt->id->EditValue ?>"<?php echo $userlevels_addopt->id->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($userlevels_addopt->UserLevelsName->Visible) { // UserLevelsName ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_UserLevelsName"><?php echo $userlevels_addopt->UserLevelsName->caption() ?><?php echo $userlevels_addopt->UserLevelsName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="userlevels" data-field="x_UserLevelsName" name="x_UserLevelsName" id="x_UserLevelsName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($userlevels_addopt->UserLevelsName->getPlaceHolder()) ?>" value="<?php echo $userlevels_addopt->UserLevelsName->EditValue ?>"<?php echo $userlevels_addopt->UserLevelsName->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$userlevels_addopt->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php
$userlevels_addopt->terminate();
?>