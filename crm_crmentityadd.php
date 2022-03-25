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
$crm_crmentity_add = new crm_crmentity_add();

// Run the page
$crm_crmentity_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_crmentity_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcrm_crmentityadd = currentForm = new ew.Form("fcrm_crmentityadd", "add");

// Validate form
fcrm_crmentityadd.validate = function() {
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
		<?php if ($crm_crmentity_add->smcreatorid->Required) { ?>
			elm = this.getElements("x" + infix + "_smcreatorid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->smcreatorid->caption(), $crm_crmentity->smcreatorid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_smcreatorid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->smcreatorid->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->smownerid->Required) { ?>
			elm = this.getElements("x" + infix + "_smownerid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->smownerid->caption(), $crm_crmentity->smownerid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_smownerid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->smownerid->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->shownerid->Required) { ?>
			elm = this.getElements("x" + infix + "_shownerid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->shownerid->caption(), $crm_crmentity->shownerid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_shownerid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->shownerid->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->modifiedby->caption(), $crm_crmentity->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->modifiedby->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->setype->Required) { ?>
			elm = this.getElements("x" + infix + "_setype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->setype->caption(), $crm_crmentity->setype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_crmentity_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->description->caption(), $crm_crmentity->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_crmentity_add->attention->Required) { ?>
			elm = this.getElements("x" + infix + "_attention");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->attention->caption(), $crm_crmentity->attention->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_crmentity_add->createdtime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdtime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->createdtime->caption(), $crm_crmentity->createdtime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdtime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->createdtime->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->modifiedtime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedtime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->modifiedtime->caption(), $crm_crmentity->modifiedtime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedtime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->modifiedtime->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->viewedtime->Required) { ?>
			elm = this.getElements("x" + infix + "_viewedtime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->viewedtime->caption(), $crm_crmentity->viewedtime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_viewedtime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->viewedtime->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->status->caption(), $crm_crmentity->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_crmentity_add->version->Required) { ?>
			elm = this.getElements("x" + infix + "_version");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->version->caption(), $crm_crmentity->version->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_version");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->version->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->presence->Required) { ?>
			elm = this.getElements("x" + infix + "_presence");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->presence->caption(), $crm_crmentity->presence->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_presence");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->presence->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->deleted->Required) { ?>
			elm = this.getElements("x" + infix + "_deleted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->deleted->caption(), $crm_crmentity->deleted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_deleted");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->deleted->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->was_read->Required) { ?>
			elm = this.getElements("x" + infix + "_was_read");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->was_read->caption(), $crm_crmentity->was_read->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_was_read");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->was_read->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->_private->Required) { ?>
			elm = this.getElements("x" + infix + "__private");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->_private->caption(), $crm_crmentity->_private->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "__private");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_crmentity->_private->errorMessage()) ?>");
		<?php if ($crm_crmentity_add->users->Required) { ?>
			elm = this.getElements("x" + infix + "_users");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_crmentity->users->caption(), $crm_crmentity->users->RequiredErrorMessage)) ?>");
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
fcrm_crmentityadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_crmentityadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_crmentity_add->showPageHeader(); ?>
<?php
$crm_crmentity_add->showMessage();
?>
<form name="fcrm_crmentityadd" id="fcrm_crmentityadd" class="<?php echo $crm_crmentity_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_crmentity_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_crmentity_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$crm_crmentity_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($crm_crmentity->smcreatorid->Visible) { // smcreatorid ?>
	<div id="r_smcreatorid" class="form-group row">
		<label id="elh_crm_crmentity_smcreatorid" for="x_smcreatorid" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->smcreatorid->caption() ?><?php echo ($crm_crmentity->smcreatorid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->smcreatorid->cellAttributes() ?>>
<span id="el_crm_crmentity_smcreatorid">
<input type="text" data-table="crm_crmentity" data-field="x_smcreatorid" name="x_smcreatorid" id="x_smcreatorid" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->smcreatorid->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->smcreatorid->EditValue ?>"<?php echo $crm_crmentity->smcreatorid->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->smcreatorid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->smownerid->Visible) { // smownerid ?>
	<div id="r_smownerid" class="form-group row">
		<label id="elh_crm_crmentity_smownerid" for="x_smownerid" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->smownerid->caption() ?><?php echo ($crm_crmentity->smownerid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->smownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_smownerid">
<input type="text" data-table="crm_crmentity" data-field="x_smownerid" name="x_smownerid" id="x_smownerid" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->smownerid->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->smownerid->EditValue ?>"<?php echo $crm_crmentity->smownerid->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->smownerid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->shownerid->Visible) { // shownerid ?>
	<div id="r_shownerid" class="form-group row">
		<label id="elh_crm_crmentity_shownerid" for="x_shownerid" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->shownerid->caption() ?><?php echo ($crm_crmentity->shownerid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->shownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_shownerid">
<input type="text" data-table="crm_crmentity" data-field="x_shownerid" name="x_shownerid" id="x_shownerid" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->shownerid->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->shownerid->EditValue ?>"<?php echo $crm_crmentity->shownerid->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->shownerid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_crm_crmentity_modifiedby" for="x_modifiedby" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->modifiedby->caption() ?><?php echo ($crm_crmentity->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->modifiedby->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedby">
<input type="text" data-table="crm_crmentity" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->modifiedby->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->modifiedby->EditValue ?>"<?php echo $crm_crmentity->modifiedby->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->setype->Visible) { // setype ?>
	<div id="r_setype" class="form-group row">
		<label id="elh_crm_crmentity_setype" for="x_setype" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->setype->caption() ?><?php echo ($crm_crmentity->setype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->setype->cellAttributes() ?>>
<span id="el_crm_crmentity_setype">
<input type="text" data-table="crm_crmentity" data-field="x_setype" name="x_setype" id="x_setype" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($crm_crmentity->setype->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->setype->EditValue ?>"<?php echo $crm_crmentity->setype->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->setype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_crm_crmentity_description" for="x_description" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->description->caption() ?><?php echo ($crm_crmentity->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->description->cellAttributes() ?>>
<span id="el_crm_crmentity_description">
<textarea data-table="crm_crmentity" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_crmentity->description->getPlaceHolder()) ?>"<?php echo $crm_crmentity->description->editAttributes() ?>><?php echo $crm_crmentity->description->EditValue ?></textarea>
</span>
<?php echo $crm_crmentity->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->attention->Visible) { // attention ?>
	<div id="r_attention" class="form-group row">
		<label id="elh_crm_crmentity_attention" for="x_attention" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->attention->caption() ?><?php echo ($crm_crmentity->attention->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->attention->cellAttributes() ?>>
<span id="el_crm_crmentity_attention">
<textarea data-table="crm_crmentity" data-field="x_attention" name="x_attention" id="x_attention" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_crmentity->attention->getPlaceHolder()) ?>"<?php echo $crm_crmentity->attention->editAttributes() ?>><?php echo $crm_crmentity->attention->EditValue ?></textarea>
</span>
<?php echo $crm_crmentity->attention->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->createdtime->Visible) { // createdtime ?>
	<div id="r_createdtime" class="form-group row">
		<label id="elh_crm_crmentity_createdtime" for="x_createdtime" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->createdtime->caption() ?><?php echo ($crm_crmentity->createdtime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->createdtime->cellAttributes() ?>>
<span id="el_crm_crmentity_createdtime">
<input type="text" data-table="crm_crmentity" data-field="x_createdtime" name="x_createdtime" id="x_createdtime" placeholder="<?php echo HtmlEncode($crm_crmentity->createdtime->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->createdtime->EditValue ?>"<?php echo $crm_crmentity->createdtime->editAttributes() ?>>
<?php if (!$crm_crmentity->createdtime->ReadOnly && !$crm_crmentity->createdtime->Disabled && !isset($crm_crmentity->createdtime->EditAttrs["readonly"]) && !isset($crm_crmentity->createdtime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_crmentityadd", "x_createdtime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_crmentity->createdtime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->modifiedtime->Visible) { // modifiedtime ?>
	<div id="r_modifiedtime" class="form-group row">
		<label id="elh_crm_crmentity_modifiedtime" for="x_modifiedtime" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->modifiedtime->caption() ?><?php echo ($crm_crmentity->modifiedtime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->modifiedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedtime">
<input type="text" data-table="crm_crmentity" data-field="x_modifiedtime" name="x_modifiedtime" id="x_modifiedtime" placeholder="<?php echo HtmlEncode($crm_crmentity->modifiedtime->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->modifiedtime->EditValue ?>"<?php echo $crm_crmentity->modifiedtime->editAttributes() ?>>
<?php if (!$crm_crmentity->modifiedtime->ReadOnly && !$crm_crmentity->modifiedtime->Disabled && !isset($crm_crmentity->modifiedtime->EditAttrs["readonly"]) && !isset($crm_crmentity->modifiedtime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_crmentityadd", "x_modifiedtime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_crmentity->modifiedtime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->viewedtime->Visible) { // viewedtime ?>
	<div id="r_viewedtime" class="form-group row">
		<label id="elh_crm_crmentity_viewedtime" for="x_viewedtime" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->viewedtime->caption() ?><?php echo ($crm_crmentity->viewedtime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->viewedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_viewedtime">
<input type="text" data-table="crm_crmentity" data-field="x_viewedtime" name="x_viewedtime" id="x_viewedtime" placeholder="<?php echo HtmlEncode($crm_crmentity->viewedtime->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->viewedtime->EditValue ?>"<?php echo $crm_crmentity->viewedtime->editAttributes() ?>>
<?php if (!$crm_crmentity->viewedtime->ReadOnly && !$crm_crmentity->viewedtime->Disabled && !isset($crm_crmentity->viewedtime->EditAttrs["readonly"]) && !isset($crm_crmentity->viewedtime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_crmentityadd", "x_viewedtime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_crmentity->viewedtime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_crm_crmentity_status" for="x_status" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->status->caption() ?><?php echo ($crm_crmentity->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->status->cellAttributes() ?>>
<span id="el_crm_crmentity_status">
<input type="text" data-table="crm_crmentity" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_crmentity->status->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->status->EditValue ?>"<?php echo $crm_crmentity->status->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->version->Visible) { // version ?>
	<div id="r_version" class="form-group row">
		<label id="elh_crm_crmentity_version" for="x_version" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->version->caption() ?><?php echo ($crm_crmentity->version->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->version->cellAttributes() ?>>
<span id="el_crm_crmentity_version">
<input type="text" data-table="crm_crmentity" data-field="x_version" name="x_version" id="x_version" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->version->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->version->EditValue ?>"<?php echo $crm_crmentity->version->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->version->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->presence->Visible) { // presence ?>
	<div id="r_presence" class="form-group row">
		<label id="elh_crm_crmentity_presence" for="x_presence" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->presence->caption() ?><?php echo ($crm_crmentity->presence->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->presence->cellAttributes() ?>>
<span id="el_crm_crmentity_presence">
<input type="text" data-table="crm_crmentity" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->presence->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->presence->EditValue ?>"<?php echo $crm_crmentity->presence->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->presence->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->deleted->Visible) { // deleted ?>
	<div id="r_deleted" class="form-group row">
		<label id="elh_crm_crmentity_deleted" for="x_deleted" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->deleted->caption() ?><?php echo ($crm_crmentity->deleted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->deleted->cellAttributes() ?>>
<span id="el_crm_crmentity_deleted">
<input type="text" data-table="crm_crmentity" data-field="x_deleted" name="x_deleted" id="x_deleted" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->deleted->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->deleted->EditValue ?>"<?php echo $crm_crmentity->deleted->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->deleted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->was_read->Visible) { // was_read ?>
	<div id="r_was_read" class="form-group row">
		<label id="elh_crm_crmentity_was_read" for="x_was_read" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->was_read->caption() ?><?php echo ($crm_crmentity->was_read->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->was_read->cellAttributes() ?>>
<span id="el_crm_crmentity_was_read">
<input type="text" data-table="crm_crmentity" data-field="x_was_read" name="x_was_read" id="x_was_read" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->was_read->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->was_read->EditValue ?>"<?php echo $crm_crmentity->was_read->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->was_read->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->_private->Visible) { // private ?>
	<div id="r__private" class="form-group row">
		<label id="elh_crm_crmentity__private" for="x__private" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->_private->caption() ?><?php echo ($crm_crmentity->_private->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->_private->cellAttributes() ?>>
<span id="el_crm_crmentity__private">
<input type="text" data-table="crm_crmentity" data-field="x__private" name="x__private" id="x__private" size="30" placeholder="<?php echo HtmlEncode($crm_crmentity->_private->getPlaceHolder()) ?>" value="<?php echo $crm_crmentity->_private->EditValue ?>"<?php echo $crm_crmentity->_private->editAttributes() ?>>
</span>
<?php echo $crm_crmentity->_private->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_crmentity->users->Visible) { // users ?>
	<div id="r_users" class="form-group row">
		<label id="elh_crm_crmentity_users" for="x_users" class="<?php echo $crm_crmentity_add->LeftColumnClass ?>"><?php echo $crm_crmentity->users->caption() ?><?php echo ($crm_crmentity->users->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_crmentity_add->RightColumnClass ?>"><div<?php echo $crm_crmentity->users->cellAttributes() ?>>
<span id="el_crm_crmentity_users">
<textarea data-table="crm_crmentity" data-field="x_users" name="x_users" id="x_users" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_crmentity->users->getPlaceHolder()) ?>"<?php echo $crm_crmentity->users->editAttributes() ?>><?php echo $crm_crmentity->users->EditValue ?></textarea>
</span>
<?php echo $crm_crmentity->users->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_crmentity_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_crmentity_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_crmentity_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_crmentity_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_crmentity_add->terminate();
?>