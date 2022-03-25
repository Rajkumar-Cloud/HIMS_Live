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
$ivf_follow_up_tracking_edit = new ivf_follow_up_tracking_edit();

// Run the page
$ivf_follow_up_tracking_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_follow_up_trackingedit = currentForm = new ew.Form("fivf_follow_up_trackingedit", "edit");

// Validate form
fivf_follow_up_trackingedit.validate = function() {
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
		<?php if ($ivf_follow_up_tracking_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->id->caption(), $ivf_follow_up_tracking->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->RIDNO->caption(), $ivf_follow_up_tracking->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->Name->caption(), $ivf_follow_up_tracking->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->Age->caption(), $ivf_follow_up_tracking->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->MReadMore->Required) { ?>
			elm = this.getElements("x" + infix + "_MReadMore");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->MReadMore->caption(), $ivf_follow_up_tracking->MReadMore->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->status->caption(), $ivf_follow_up_tracking->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->status->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->modifiedby->caption(), $ivf_follow_up_tracking->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->modifieddatetime->caption(), $ivf_follow_up_tracking->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->TidNo->caption(), $ivf_follow_up_tracking->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->TidNo->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_edit->createdUserName->Required) { ?>
			elm = this.getElements("x" + infix + "_createdUserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->createdUserName->caption(), $ivf_follow_up_tracking->createdUserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_edit->FollowUpDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FollowUpDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->FollowUpDate->caption(), $ivf_follow_up_tracking->FollowUpDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FollowUpDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->FollowUpDate->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_edit->NextVistDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextVistDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->NextVistDate->caption(), $ivf_follow_up_tracking->NextVistDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NextVistDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->NextVistDate->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->HospID->caption(), $ivf_follow_up_tracking->HospID->RequiredErrorMessage)) ?>");
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
fivf_follow_up_trackingedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_follow_up_trackingedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_follow_up_tracking_edit->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_edit->showMessage();
?>
<form name="fivf_follow_up_trackingedit" id="fivf_follow_up_trackingedit" class="<?php echo $ivf_follow_up_tracking_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_follow_up_tracking_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_follow_up_tracking_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_follow_up_tracking_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_id" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_id" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->id->caption() ?><?php echo ($ivf_follow_up_tracking->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->id->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_id" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->CurrentValue) ?>">
<?php echo $ivf_follow_up_tracking->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_RIDNO" for="x_RIDNO" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?><?php echo ($ivf_follow_up_tracking->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_RIDNO">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->RIDNO->EditValue ?>"<?php echo $ivf_follow_up_tracking->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_follow_up_tracking->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_Name" for="x_Name" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_Name" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->Name->caption() ?><?php echo ($ivf_follow_up_tracking->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->Name->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_Name" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_Name">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Name->EditValue ?>"<?php echo $ivf_follow_up_tracking->Name->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_follow_up_tracking->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_Age" for="x_Age" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_Age" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->Age->caption() ?><?php echo ($ivf_follow_up_tracking->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->Age->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_Age" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_Age">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Age->EditValue ?>"<?php echo $ivf_follow_up_tracking->Age->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_follow_up_tracking->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
	<div id="r_MReadMore" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_MReadMore" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?><?php echo ($ivf_follow_up_tracking->MReadMore->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_MReadMore">
<?php AppendClass($ivf_follow_up_tracking->MReadMore->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x_MReadMore" id="x_MReadMore" cols="100" rows="4" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->getPlaceHolder()) ?>"<?php echo $ivf_follow_up_tracking->MReadMore->editAttributes() ?>><?php echo $ivf_follow_up_tracking->MReadMore->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_follow_up_trackingedit_js">
ew.createEditor("fivf_follow_up_trackingedit", "x_MReadMore", 100, 4, <?php echo ($ivf_follow_up_tracking->MReadMore->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_follow_up_tracking->MReadMore->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_status" for="x_status" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_status" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->status->caption() ?><?php echo ($ivf_follow_up_tracking->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->status->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_status" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_status">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->status->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->status->EditValue ?>"<?php echo $ivf_follow_up_tracking->status->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_follow_up_tracking->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_TidNo" for="x_TidNo" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->TidNo->caption() ?><?php echo ($ivf_follow_up_tracking->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_TidNo">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->TidNo->EditValue ?>"<?php echo $ivf_follow_up_tracking->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_follow_up_tracking->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
	<div id="r_createdUserName" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_createdUserName" for="x_createdUserName" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->createdUserName->caption() ?><?php echo ($ivf_follow_up_tracking->createdUserName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->createdUserName->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_createdUserName">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createdUserName->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createdUserName->EditValue ?>"<?php echo $ivf_follow_up_tracking->createdUserName->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_follow_up_tracking->createdUserName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->FollowUpDate->Visible) { // FollowUpDate ?>
	<div id="r_FollowUpDate" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_FollowUpDate" for="x_FollowUpDate" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->FollowUpDate->caption() ?><?php echo ($ivf_follow_up_tracking->FollowUpDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->FollowUpDate->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_FollowUpDate">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_FollowUpDate" data-format="7" name="x_FollowUpDate" id="x_FollowUpDate" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->FollowUpDate->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->FollowUpDate->EditValue ?>"<?php echo $ivf_follow_up_tracking->FollowUpDate->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->FollowUpDate->ReadOnly && !$ivf_follow_up_tracking->FollowUpDate->Disabled && !isset($ivf_follow_up_tracking->FollowUpDate->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->FollowUpDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_follow_up_trackingedit_js">
ew.createDateTimePicker("fivf_follow_up_trackingedit", "x_FollowUpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $ivf_follow_up_tracking->FollowUpDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking->NextVistDate->Visible) { // NextVistDate ?>
	<div id="r_NextVistDate" class="form-group row">
		<label id="elh_ivf_follow_up_tracking_NextVistDate" for="x_NextVistDate" class="<?php echo $ivf_follow_up_tracking_edit->LeftColumnClass ?>"><script id="tpc_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_trackingedit" type="text/html"><span><?php echo $ivf_follow_up_tracking->NextVistDate->caption() ?><?php echo ($ivf_follow_up_tracking->NextVistDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_follow_up_tracking_edit->RightColumnClass ?>"><div<?php echo $ivf_follow_up_tracking->NextVistDate->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_trackingedit" type="text/html">
<span id="el_ivf_follow_up_tracking_NextVistDate">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_NextVistDate" name="x_NextVistDate" id="x_NextVistDate" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->NextVistDate->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->NextVistDate->EditValue ?>"<?php echo $ivf_follow_up_tracking->NextVistDate->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->NextVistDate->ReadOnly && !$ivf_follow_up_tracking->NextVistDate->Disabled && !isset($ivf_follow_up_tracking->NextVistDate->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->NextVistDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_follow_up_trackingedit_js">
ew.createDateTimePicker("fivf_follow_up_trackingedit", "x_NextVistDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_follow_up_tracking->NextVistDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_follow_up_trackingedit" class="ew-custom-template"></div>
<script id="tpm_ivf_follow_up_trackingedit" type="text/html">
<div id="ct_ivf_follow_up_tracking_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$IVFid = $_GET["id"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_follow_up_tracking where id='".$IVFid."'; ";
	$resul = $dbhelper->ExecuteRows($sql);
	$IVFid = $resul[0]["RIDNO"];
	if($Coupleiid == '')
	{
		$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where FeMale='".$IVFid."'; ";
		$resul = $dbhelper->ExecuteRows($sql);
		$Coupleiid = $resul[0]["id"];
	}
	if($Coupleiid == '')
	{
		$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Male='".$IVFid."'; ";
		$resul = $dbhelper->ExecuteRows($sql);
		$Coupleiid = $resul[0]["id"];
	}
	if($Coupleiid == '')
	{
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$IVFid."'; ";
		$results2 = $dbhelper->ExecuteRows($sql);
	}else{
		$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$Coupleiid."'; ";
		$results = $dbhelper->ExecuteRows($sql);
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
		$results1 = $dbhelper->ExecuteRows($sql);
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
		$results2 = $dbhelper->ExecuteRows($sql);
	}
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
{{include tmpl="#tpc_ivf_follow_up_tracking_RIDNO"/}}&nbsp;{{include tmpl="#tpx_ivf_follow_up_tracking_RIDNO"/}}
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Follow up</h3>
			</div>
			<div class="card-body">
			{{include tmpl="#tpc_ivf_follow_up_tracking_FollowUpDate"/}}&nbsp;{{include tmpl="#tpx_ivf_follow_up_tracking_FollowUpDate"/}}
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_follow_up_tracking_MReadMore"/}}&nbsp;{{include tmpl="#tpx_ivf_follow_up_tracking_MReadMore"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php if (!$ivf_follow_up_tracking_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_follow_up_tracking_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_follow_up_tracking_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_follow_up_tracking->Rows) ?> };
ew.applyTemplate("tpd_ivf_follow_up_trackingedit", "tpm_ivf_follow_up_trackingedit", "ivf_follow_up_trackingedit", "<?php echo $ivf_follow_up_tracking->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_follow_up_trackingedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_follow_up_tracking_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_follow_up_tracking_edit->terminate();
?>