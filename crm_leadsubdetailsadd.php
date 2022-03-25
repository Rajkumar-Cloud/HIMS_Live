<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$crm_leadsubdetails_add = new crm_leadsubdetails_add();

// Run the page
$crm_leadsubdetails_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsubdetails_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcrm_leadsubdetailsadd = currentForm = new ew.Form("fcrm_leadsubdetailsadd", "add");

// Validate form
fcrm_leadsubdetailsadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($crm_leadsubdetails_add->leadsubscriptionid->Required) { ?>
			elm = this.getElements("x" + infix + "_leadsubscriptionid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadsubdetails->leadsubscriptionid->caption(), $crm_leadsubdetails->leadsubscriptionid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leadsubscriptionid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leadsubdetails->leadsubscriptionid->errorMessage()) ?>");
		<?php if ($crm_leadsubdetails_add->website->Required) { ?>
			elm = this.getElements("x" + infix + "_website");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadsubdetails->website->caption(), $crm_leadsubdetails->website->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
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

// Form_CustomValidate event
fcrm_leadsubdetailsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsubdetailsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadsubdetails_add->showPageHeader(); ?>
<?php
$crm_leadsubdetails_add->showMessage();
?>
<form name="fcrm_leadsubdetailsadd" id="fcrm_leadsubdetailsadd" class="<?php echo $crm_leadsubdetails_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsubdetails_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsubdetails_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadsubdetails_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($crm_leadsubdetails->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
	<div id="r_leadsubscriptionid" class="form-group row">
		<label id="elh_crm_leadsubdetails_leadsubscriptionid" for="x_leadsubscriptionid" class="<?php echo $crm_leadsubdetails_add->LeftColumnClass ?>"><?php echo $crm_leadsubdetails->leadsubscriptionid->caption() ?><?php echo ($crm_leadsubdetails->leadsubscriptionid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadsubdetails_add->RightColumnClass ?>"><div<?php echo $crm_leadsubdetails->leadsubscriptionid->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_leadsubscriptionid">
<input type="text" data-table="crm_leadsubdetails" data-field="x_leadsubscriptionid" name="x_leadsubscriptionid" id="x_leadsubscriptionid" size="30" placeholder="<?php echo HtmlEncode($crm_leadsubdetails->leadsubscriptionid->getPlaceHolder()) ?>" value="<?php echo $crm_leadsubdetails->leadsubscriptionid->EditValue ?>"<?php echo $crm_leadsubdetails->leadsubscriptionid->editAttributes() ?>>
</span>
<?php echo $crm_leadsubdetails->leadsubscriptionid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadsubdetails->website->Visible) { // website ?>
	<div id="r_website" class="form-group row">
		<label id="elh_crm_leadsubdetails_website" for="x_website" class="<?php echo $crm_leadsubdetails_add->LeftColumnClass ?>"><?php echo $crm_leadsubdetails->website->caption() ?><?php echo ($crm_leadsubdetails->website->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadsubdetails_add->RightColumnClass ?>"><div<?php echo $crm_leadsubdetails->website->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_website">
<input type="text" data-table="crm_leadsubdetails" data-field="x_website" name="x_website" id="x_website" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leadsubdetails->website->getPlaceHolder()) ?>" value="<?php echo $crm_leadsubdetails->website->EditValue ?>"<?php echo $crm_leadsubdetails->website->editAttributes() ?>>
</span>
<?php echo $crm_leadsubdetails->website->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_leadsubdetails_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_leadsubdetails_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadsubdetails_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_leadsubdetails_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadsubdetails_add->terminate();
?>