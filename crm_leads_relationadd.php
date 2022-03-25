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
$crm_leads_relation_add = new crm_leads_relation_add();

// Run the page
$crm_leads_relation_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leads_relation_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcrm_leads_relationadd = currentForm = new ew.Form("fcrm_leads_relationadd", "add");

// Validate form
fcrm_leads_relationadd.validate = function() {
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
		<?php if ($crm_leads_relation_add->leads_relation->Required) { ?>
			elm = this.getElements("x" + infix + "_leads_relation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leads_relation->leads_relation->caption(), $crm_leads_relation->leads_relation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leads_relation_add->sortorderid->Required) { ?>
			elm = this.getElements("x" + infix + "_sortorderid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leads_relation->sortorderid->caption(), $crm_leads_relation->sortorderid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sortorderid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leads_relation->sortorderid->errorMessage()) ?>");
		<?php if ($crm_leads_relation_add->presence->Required) { ?>
			elm = this.getElements("x" + infix + "_presence");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leads_relation->presence->caption(), $crm_leads_relation->presence->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_presence");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leads_relation->presence->errorMessage()) ?>");

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
fcrm_leads_relationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leads_relationadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leads_relation_add->showPageHeader(); ?>
<?php
$crm_leads_relation_add->showMessage();
?>
<form name="fcrm_leads_relationadd" id="fcrm_leads_relationadd" class="<?php echo $crm_leads_relation_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leads_relation_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leads_relation_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leads_relation_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($crm_leads_relation->leads_relation->Visible) { // leads_relation ?>
	<div id="r_leads_relation" class="form-group row">
		<label id="elh_crm_leads_relation_leads_relation" for="x_leads_relation" class="<?php echo $crm_leads_relation_add->LeftColumnClass ?>"><?php echo $crm_leads_relation->leads_relation->caption() ?><?php echo ($crm_leads_relation->leads_relation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leads_relation_add->RightColumnClass ?>"><div<?php echo $crm_leads_relation->leads_relation->cellAttributes() ?>>
<span id="el_crm_leads_relation_leads_relation">
<input type="text" data-table="crm_leads_relation" data-field="x_leads_relation" name="x_leads_relation" id="x_leads_relation" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_leads_relation->leads_relation->getPlaceHolder()) ?>" value="<?php echo $crm_leads_relation->leads_relation->EditValue ?>"<?php echo $crm_leads_relation->leads_relation->editAttributes() ?>>
</span>
<?php echo $crm_leads_relation->leads_relation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leads_relation->sortorderid->Visible) { // sortorderid ?>
	<div id="r_sortorderid" class="form-group row">
		<label id="elh_crm_leads_relation_sortorderid" for="x_sortorderid" class="<?php echo $crm_leads_relation_add->LeftColumnClass ?>"><?php echo $crm_leads_relation->sortorderid->caption() ?><?php echo ($crm_leads_relation->sortorderid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leads_relation_add->RightColumnClass ?>"><div<?php echo $crm_leads_relation->sortorderid->cellAttributes() ?>>
<span id="el_crm_leads_relation_sortorderid">
<input type="text" data-table="crm_leads_relation" data-field="x_sortorderid" name="x_sortorderid" id="x_sortorderid" size="30" placeholder="<?php echo HtmlEncode($crm_leads_relation->sortorderid->getPlaceHolder()) ?>" value="<?php echo $crm_leads_relation->sortorderid->EditValue ?>"<?php echo $crm_leads_relation->sortorderid->editAttributes() ?>>
</span>
<?php echo $crm_leads_relation->sortorderid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leads_relation->presence->Visible) { // presence ?>
	<div id="r_presence" class="form-group row">
		<label id="elh_crm_leads_relation_presence" for="x_presence" class="<?php echo $crm_leads_relation_add->LeftColumnClass ?>"><?php echo $crm_leads_relation->presence->caption() ?><?php echo ($crm_leads_relation->presence->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leads_relation_add->RightColumnClass ?>"><div<?php echo $crm_leads_relation->presence->cellAttributes() ?>>
<span id="el_crm_leads_relation_presence">
<input type="text" data-table="crm_leads_relation" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?php echo HtmlEncode($crm_leads_relation->presence->getPlaceHolder()) ?>" value="<?php echo $crm_leads_relation->presence->EditValue ?>"<?php echo $crm_leads_relation->presence->editAttributes() ?>>
</span>
<?php echo $crm_leads_relation->presence->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_leads_relation_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_leads_relation_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leads_relation_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_leads_relation_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leads_relation_add->terminate();
?>