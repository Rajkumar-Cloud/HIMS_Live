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
$crm_leadsource_add = new crm_leadsource_add();

// Run the page
$crm_leadsource_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsource_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcrm_leadsourceadd = currentForm = new ew.Form("fcrm_leadsourceadd", "add");

// Validate form
fcrm_leadsourceadd.validate = function() {
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
		<?php if ($crm_leadsource_add->leadsource->Required) { ?>
			elm = this.getElements("x" + infix + "_leadsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadsource->leadsource->caption(), $crm_leadsource->leadsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leadsource_add->presence->Required) { ?>
			elm = this.getElements("x" + infix + "_presence");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadsource->presence->caption(), $crm_leadsource->presence->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_presence");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leadsource->presence->errorMessage()) ?>");
		<?php if ($crm_leadsource_add->picklist_valueid->Required) { ?>
			elm = this.getElements("x" + infix + "_picklist_valueid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadsource->picklist_valueid->caption(), $crm_leadsource->picklist_valueid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_picklist_valueid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leadsource->picklist_valueid->errorMessage()) ?>");
		<?php if ($crm_leadsource_add->sortorderid->Required) { ?>
			elm = this.getElements("x" + infix + "_sortorderid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leadsource->sortorderid->caption(), $crm_leadsource->sortorderid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sortorderid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leadsource->sortorderid->errorMessage()) ?>");

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
fcrm_leadsourceadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsourceadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadsource_add->showPageHeader(); ?>
<?php
$crm_leadsource_add->showMessage();
?>
<form name="fcrm_leadsourceadd" id="fcrm_leadsourceadd" class="<?php echo $crm_leadsource_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsource_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsource_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadsource_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($crm_leadsource->leadsource->Visible) { // leadsource ?>
	<div id="r_leadsource" class="form-group row">
		<label id="elh_crm_leadsource_leadsource" for="x_leadsource" class="<?php echo $crm_leadsource_add->LeftColumnClass ?>"><?php echo $crm_leadsource->leadsource->caption() ?><?php echo ($crm_leadsource->leadsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadsource_add->RightColumnClass ?>"><div<?php echo $crm_leadsource->leadsource->cellAttributes() ?>>
<span id="el_crm_leadsource_leadsource">
<input type="text" data-table="crm_leadsource" data-field="x_leadsource" name="x_leadsource" id="x_leadsource" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_leadsource->leadsource->getPlaceHolder()) ?>" value="<?php echo $crm_leadsource->leadsource->EditValue ?>"<?php echo $crm_leadsource->leadsource->editAttributes() ?>>
</span>
<?php echo $crm_leadsource->leadsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadsource->presence->Visible) { // presence ?>
	<div id="r_presence" class="form-group row">
		<label id="elh_crm_leadsource_presence" for="x_presence" class="<?php echo $crm_leadsource_add->LeftColumnClass ?>"><?php echo $crm_leadsource->presence->caption() ?><?php echo ($crm_leadsource->presence->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadsource_add->RightColumnClass ?>"><div<?php echo $crm_leadsource->presence->cellAttributes() ?>>
<span id="el_crm_leadsource_presence">
<input type="text" data-table="crm_leadsource" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?php echo HtmlEncode($crm_leadsource->presence->getPlaceHolder()) ?>" value="<?php echo $crm_leadsource->presence->EditValue ?>"<?php echo $crm_leadsource->presence->editAttributes() ?>>
</span>
<?php echo $crm_leadsource->presence->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadsource->picklist_valueid->Visible) { // picklist_valueid ?>
	<div id="r_picklist_valueid" class="form-group row">
		<label id="elh_crm_leadsource_picklist_valueid" for="x_picklist_valueid" class="<?php echo $crm_leadsource_add->LeftColumnClass ?>"><?php echo $crm_leadsource->picklist_valueid->caption() ?><?php echo ($crm_leadsource->picklist_valueid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadsource_add->RightColumnClass ?>"><div<?php echo $crm_leadsource->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadsource_picklist_valueid">
<input type="text" data-table="crm_leadsource" data-field="x_picklist_valueid" name="x_picklist_valueid" id="x_picklist_valueid" size="30" placeholder="<?php echo HtmlEncode($crm_leadsource->picklist_valueid->getPlaceHolder()) ?>" value="<?php echo $crm_leadsource->picklist_valueid->EditValue ?>"<?php echo $crm_leadsource->picklist_valueid->editAttributes() ?>>
</span>
<?php echo $crm_leadsource->picklist_valueid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leadsource->sortorderid->Visible) { // sortorderid ?>
	<div id="r_sortorderid" class="form-group row">
		<label id="elh_crm_leadsource_sortorderid" for="x_sortorderid" class="<?php echo $crm_leadsource_add->LeftColumnClass ?>"><?php echo $crm_leadsource->sortorderid->caption() ?><?php echo ($crm_leadsource->sortorderid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leadsource_add->RightColumnClass ?>"><div<?php echo $crm_leadsource->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadsource_sortorderid">
<input type="text" data-table="crm_leadsource" data-field="x_sortorderid" name="x_sortorderid" id="x_sortorderid" size="30" placeholder="<?php echo HtmlEncode($crm_leadsource->sortorderid->getPlaceHolder()) ?>" value="<?php echo $crm_leadsource->sortorderid->EditValue ?>"<?php echo $crm_leadsource->sortorderid->editAttributes() ?>>
</span>
<?php echo $crm_leadsource->sortorderid->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_leadsource_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_leadsource_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadsource_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_leadsource_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadsource_add->terminate();
?>