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
$appointment_reminder_add = new appointment_reminder_add();

// Run the page
$appointment_reminder_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_reminder_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fappointment_reminderadd = currentForm = new ew.Form("fappointment_reminderadd", "add");

// Validate form
fappointment_reminderadd.validate = function() {
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
		<?php if ($appointment_reminder_add->reminder->Required) { ?>
			elm = this.getElements("x" + infix + "_reminder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->reminder->caption(), $appointment_reminder->reminder->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_reminder_add->Drid->Required) { ?>
			elm = this.getElements("x" + infix + "_Drid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->Drid->caption(), $appointment_reminder->Drid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Drid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->Drid->errorMessage()) ?>");
		<?php if ($appointment_reminder_add->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->DrName->caption(), $appointment_reminder->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($appointment_reminder_add->Duration->Required) { ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->Duration->caption(), $appointment_reminder->Duration->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->Duration->errorMessage()) ?>");
		<?php if ($appointment_reminder_add->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->Date->caption(), $appointment_reminder->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->Date->errorMessage()) ?>");
		<?php if ($appointment_reminder_add->SMSSend->Required) { ?>
			elm = this.getElements("x" + infix + "_SMSSend");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->SMSSend->caption(), $appointment_reminder->SMSSend->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SMSSend");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->SMSSend->errorMessage()) ?>");
		<?php if ($appointment_reminder_add->EmailSend->Required) { ?>
			elm = this.getElements("x" + infix + "_EmailSend");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder->EmailSend->caption(), $appointment_reminder->EmailSend->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EmailSend");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($appointment_reminder->EmailSend->errorMessage()) ?>");

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
fappointment_reminderadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_reminderadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_reminder_add->showPageHeader(); ?>
<?php
$appointment_reminder_add->showMessage();
?>
<form name="fappointment_reminderadd" id="fappointment_reminderadd" class="<?php echo $appointment_reminder_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_reminder_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_reminder_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_reminder_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($appointment_reminder->reminder->Visible) { // reminder ?>
	<div id="r_reminder" class="form-group row">
		<label id="elh_appointment_reminder_reminder" for="x_reminder" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_reminder" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->reminder->caption() ?><?php echo ($appointment_reminder->reminder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->reminder->cellAttributes() ?>>
<script id="tpx_appointment_reminder_reminder" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_reminder">
<textarea data-table="appointment_reminder" data-field="x_reminder" name="x_reminder" id="x_reminder" cols="35" rows="4" placeholder="<?php echo HtmlEncode($appointment_reminder->reminder->getPlaceHolder()) ?>"<?php echo $appointment_reminder->reminder->editAttributes() ?>><?php echo $appointment_reminder->reminder->EditValue ?></textarea>
</span>
</script>
<?php echo $appointment_reminder->reminder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
	<div id="r_Drid" class="form-group row">
		<label id="elh_appointment_reminder_Drid" for="x_Drid" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_Drid" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->Drid->caption() ?><?php echo ($appointment_reminder->Drid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->Drid->cellAttributes() ?>>
<script id="tpx_appointment_reminder_Drid" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_Drid">
<input type="text" data-table="appointment_reminder" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->Drid->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->Drid->EditValue ?>"<?php echo $appointment_reminder->Drid->editAttributes() ?>>
</span>
</script>
<?php echo $appointment_reminder->Drid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_appointment_reminder_DrName" for="x_DrName" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_DrName" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->DrName->caption() ?><?php echo ($appointment_reminder->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->DrName->cellAttributes() ?>>
<script id="tpx_appointment_reminder_DrName" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_DrName">
<input type="text" data-table="appointment_reminder" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_reminder->DrName->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->DrName->EditValue ?>"<?php echo $appointment_reminder->DrName->editAttributes() ?>>
</span>
</script>
<?php echo $appointment_reminder->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_appointment_reminder_Duration" for="x_Duration" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_Duration" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->Duration->caption() ?><?php echo ($appointment_reminder->Duration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->Duration->cellAttributes() ?>>
<script id="tpx_appointment_reminder_Duration" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_Duration">
<input type="text" data-table="appointment_reminder" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->Duration->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->Duration->EditValue ?>"<?php echo $appointment_reminder->Duration->editAttributes() ?>>
</span>
</script>
<?php echo $appointment_reminder->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_appointment_reminder_Date" for="x_Date" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_Date" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->Date->caption() ?><?php echo ($appointment_reminder->Date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->Date->cellAttributes() ?>>
<script id="tpx_appointment_reminder_Date" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_Date">
<input type="text" data-table="appointment_reminder" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($appointment_reminder->Date->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->Date->EditValue ?>"<?php echo $appointment_reminder->Date->editAttributes() ?>>
<?php if (!$appointment_reminder->Date->ReadOnly && !$appointment_reminder->Date->Disabled && !isset($appointment_reminder->Date->EditAttrs["readonly"]) && !isset($appointment_reminder->Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="appointment_reminderadd_js">
ew.createDateTimePicker("fappointment_reminderadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $appointment_reminder->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
	<div id="r_SMSSend" class="form-group row">
		<label id="elh_appointment_reminder_SMSSend" for="x_SMSSend" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_SMSSend" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->SMSSend->caption() ?><?php echo ($appointment_reminder->SMSSend->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->SMSSend->cellAttributes() ?>>
<script id="tpx_appointment_reminder_SMSSend" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_SMSSend">
<input type="text" data-table="appointment_reminder" data-field="x_SMSSend" name="x_SMSSend" id="x_SMSSend" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->SMSSend->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->SMSSend->EditValue ?>"<?php echo $appointment_reminder->SMSSend->editAttributes() ?>>
</span>
</script>
<?php echo $appointment_reminder->SMSSend->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
	<div id="r_EmailSend" class="form-group row">
		<label id="elh_appointment_reminder_EmailSend" for="x_EmailSend" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_EmailSend" class="appointment_reminderadd" type="text/html"><span><?php echo $appointment_reminder->EmailSend->caption() ?><?php echo ($appointment_reminder->EmailSend->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div<?php echo $appointment_reminder->EmailSend->cellAttributes() ?>>
<script id="tpx_appointment_reminder_EmailSend" class="appointment_reminderadd" type="text/html">
<span id="el_appointment_reminder_EmailSend">
<input type="text" data-table="appointment_reminder" data-field="x_EmailSend" name="x_EmailSend" id="x_EmailSend" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder->EmailSend->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder->EmailSend->EditValue ?>"<?php echo $appointment_reminder->EmailSend->editAttributes() ?>>
</span>
</script>
<?php echo $appointment_reminder->EmailSend->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_appointment_reminderadd" class="ew-custom-template"></div>
<script id="tpm_appointment_reminderadd" type="text/html">
<div id="ct_appointment_reminder_add"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 90%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 90%;
}
.input-group>.form-control.ew-lookup-text {
	width: 90%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 90%;
}
</style>
<table class="ew-table" style="width:100%">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_reminder"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_reminder"/}}</td><td>{{include tmpl="#tpc_appointment_reminder_Drid"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_Drid"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_DrName"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_DrName"/}}</td><td></td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_Duration"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_Duration"/}}</td><td>{{include tmpl="#tpc_appointment_reminder_Date"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_Date"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_SMSSend"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_SMSSend"/}}</td><td>{{include tmpl="#tpc_appointment_reminder_EmailSend"/}}&nbsp;{{include tmpl="#tpx_appointment_reminder_EmailSend"/}}</td></tr>
		</tbody>
</table>
</div>
</script>
<?php if (!$appointment_reminder_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $appointment_reminder_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_reminder_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($appointment_reminder->Rows) ?> };
ew.applyTemplate("tpd_appointment_reminderadd", "tpm_appointment_reminderadd", "appointment_reminderadd", "<?php echo $appointment_reminder->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.appointment_reminderadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$appointment_reminder_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_reminder_add->terminate();
?>