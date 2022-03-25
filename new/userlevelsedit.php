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
$userlevels_edit = new userlevels_edit();

// Run the page
$userlevels_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevels_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fuserlevelsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fuserlevelsedit = currentForm = new ew.Form("fuserlevelsedit", "edit");

	// Validate form
	fuserlevelsedit.validate = function() {
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
			<?php if ($userlevels_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $userlevels_edit->id->caption(), $userlevels_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($userlevels_edit->id->errorMessage()) ?>");
			<?php if ($userlevels_edit->UserLevelsName->Required) { ?>
				elm = this.getElements("x" + infix + "_UserLevelsName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $userlevels_edit->UserLevelsName->caption(), $userlevels_edit->UserLevelsName->RequiredErrorMessage)) ?>");
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

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fuserlevelsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fuserlevelsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fuserlevelsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $userlevels_edit->showPageHeader(); ?>
<?php
$userlevels_edit->showMessage();
?>
<form name="fuserlevelsedit" id="fuserlevelsedit" class="<?php echo $userlevels_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevels">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$userlevels_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($userlevels_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_userlevels_id" for="x_id" class="<?php echo $userlevels_edit->LeftColumnClass ?>"><?php echo $userlevels_edit->id->caption() ?><?php echo $userlevels_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $userlevels_edit->RightColumnClass ?>"><div <?php echo $userlevels_edit->id->cellAttributes() ?>>
<input type="text" data-table="userlevels" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?php echo HtmlEncode($userlevels_edit->id->getPlaceHolder()) ?>" value="<?php echo $userlevels_edit->id->EditValue ?>"<?php echo $userlevels_edit->id->editAttributes() ?>>
<input type="hidden" data-table="userlevels" data-field="x_id" name="o_id" id="o_id" value="<?php echo HtmlEncode($userlevels_edit->id->OldValue != null ? $userlevels_edit->id->OldValue : $userlevels_edit->id->CurrentValue) ?>">
<?php echo $userlevels_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($userlevels_edit->UserLevelsName->Visible) { // UserLevelsName ?>
	<div id="r_UserLevelsName" class="form-group row">
		<label id="elh_userlevels_UserLevelsName" for="x_UserLevelsName" class="<?php echo $userlevels_edit->LeftColumnClass ?>"><?php echo $userlevels_edit->UserLevelsName->caption() ?><?php echo $userlevels_edit->UserLevelsName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $userlevels_edit->RightColumnClass ?>"><div <?php echo $userlevels_edit->UserLevelsName->cellAttributes() ?>>
<span id="el_userlevels_UserLevelsName">
<input type="text" data-table="userlevels" data-field="x_UserLevelsName" name="x_UserLevelsName" id="x_UserLevelsName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($userlevels_edit->UserLevelsName->getPlaceHolder()) ?>" value="<?php echo $userlevels_edit->UserLevelsName->EditValue ?>"<?php echo $userlevels_edit->UserLevelsName->editAttributes() ?>>
</span>
<?php echo $userlevels_edit->UserLevelsName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$userlevels_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $userlevels_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $userlevels_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$userlevels_edit->showPageFooter();
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
<?php include_once "footer.php"; ?>
<?php
$userlevels_edit->terminate();
?>