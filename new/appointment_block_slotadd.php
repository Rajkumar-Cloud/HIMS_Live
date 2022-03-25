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
$appointment_block_slot_add = new appointment_block_slot_add();

// Run the page
$appointment_block_slot_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_block_slot_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fappointment_block_slotadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fappointment_block_slotadd = currentForm = new ew.Form("fappointment_block_slotadd", "add");

	// Validate form
	fappointment_block_slotadd.validate = function() {
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
			<?php if ($appointment_block_slot_add->Drid->Required) { ?>
				elm = this.getElements("x" + infix + "_Drid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->Drid->caption(), $appointment_block_slot_add->Drid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Drid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_block_slot_add->Drid->errorMessage()) ?>");
			<?php if ($appointment_block_slot_add->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->DrName->caption(), $appointment_block_slot_add->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_block_slot_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->Details->caption(), $appointment_block_slot_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_block_slot_add->BlockType->Required) { ?>
				elm = this.getElements("x" + infix + "_BlockType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->BlockType->caption(), $appointment_block_slot_add->BlockType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_block_slot_add->FromDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FromDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->FromDate->caption(), $appointment_block_slot_add->FromDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FromDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_block_slot_add->FromDate->errorMessage()) ?>");
			<?php if ($appointment_block_slot_add->ToDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ToDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->ToDate->caption(), $appointment_block_slot_add->ToDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ToDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_block_slot_add->ToDate->errorMessage()) ?>");
			<?php if ($appointment_block_slot_add->FromTime->Required) { ?>
				elm = this.getElements("x" + infix + "_FromTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->FromTime->caption(), $appointment_block_slot_add->FromTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_FromTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_block_slot_add->FromTime->errorMessage()) ?>");
			<?php if ($appointment_block_slot_add->ToTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ToTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_block_slot_add->ToTime->caption(), $appointment_block_slot_add->ToTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ToTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_block_slot_add->ToTime->errorMessage()) ?>");

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
	fappointment_block_slotadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fappointment_block_slotadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fappointment_block_slotadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_block_slot_add->showPageHeader(); ?>
<?php
$appointment_block_slot_add->showMessage();
?>
<form name="fappointment_block_slotadd" id="fappointment_block_slotadd" class="<?php echo $appointment_block_slot_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_block_slot_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($appointment_block_slot_add->Drid->Visible) { // Drid ?>
	<div id="r_Drid" class="form-group row">
		<label id="elh_appointment_block_slot_Drid" for="x_Drid" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_Drid" type="text/html"><?php echo $appointment_block_slot_add->Drid->caption() ?><?php echo $appointment_block_slot_add->Drid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->Drid->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_Drid" type="text/html"><span id="el_appointment_block_slot_Drid">
<input type="text" data-table="appointment_block_slot" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->Drid->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->Drid->EditValue ?>"<?php echo $appointment_block_slot_add->Drid->editAttributes() ?>>
</span></script>
<?php echo $appointment_block_slot_add->Drid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_appointment_block_slot_DrName" for="x_DrName" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_DrName" type="text/html"><?php echo $appointment_block_slot_add->DrName->caption() ?><?php echo $appointment_block_slot_add->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->DrName->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_DrName" type="text/html"><span id="el_appointment_block_slot_DrName">
<input type="text" data-table="appointment_block_slot" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->DrName->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->DrName->EditValue ?>"<?php echo $appointment_block_slot_add->DrName->editAttributes() ?>>
</span></script>
<?php echo $appointment_block_slot_add->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_appointment_block_slot_Details" for="x_Details" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_Details" type="text/html"><?php echo $appointment_block_slot_add->Details->caption() ?><?php echo $appointment_block_slot_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->Details->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_Details" type="text/html"><span id="el_appointment_block_slot_Details">
<input type="text" data-table="appointment_block_slot" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->Details->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->Details->EditValue ?>"<?php echo $appointment_block_slot_add->Details->editAttributes() ?>>
</span></script>
<?php echo $appointment_block_slot_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->BlockType->Visible) { // BlockType ?>
	<div id="r_BlockType" class="form-group row">
		<label id="elh_appointment_block_slot_BlockType" for="x_BlockType" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_BlockType" type="text/html"><?php echo $appointment_block_slot_add->BlockType->caption() ?><?php echo $appointment_block_slot_add->BlockType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->BlockType->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_BlockType" type="text/html"><span id="el_appointment_block_slot_BlockType">
<input type="text" data-table="appointment_block_slot" data-field="x_BlockType" name="x_BlockType" id="x_BlockType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->BlockType->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->BlockType->EditValue ?>"<?php echo $appointment_block_slot_add->BlockType->editAttributes() ?>>
</span></script>
<?php echo $appointment_block_slot_add->BlockType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->FromDate->Visible) { // FromDate ?>
	<div id="r_FromDate" class="form-group row">
		<label id="elh_appointment_block_slot_FromDate" for="x_FromDate" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_FromDate" type="text/html"><?php echo $appointment_block_slot_add->FromDate->caption() ?><?php echo $appointment_block_slot_add->FromDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->FromDate->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_FromDate" type="text/html"><span id="el_appointment_block_slot_FromDate">
<input type="text" data-table="appointment_block_slot" data-field="x_FromDate" name="x_FromDate" id="x_FromDate" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->FromDate->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->FromDate->EditValue ?>"<?php echo $appointment_block_slot_add->FromDate->editAttributes() ?>>
<?php if (!$appointment_block_slot_add->FromDate->ReadOnly && !$appointment_block_slot_add->FromDate->Disabled && !isset($appointment_block_slot_add->FromDate->EditAttrs["readonly"]) && !isset($appointment_block_slot_add->FromDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_block_slotadd_js">
loadjs.ready(["fappointment_block_slotadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_block_slotadd", "x_FromDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $appointment_block_slot_add->FromDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->ToDate->Visible) { // ToDate ?>
	<div id="r_ToDate" class="form-group row">
		<label id="elh_appointment_block_slot_ToDate" for="x_ToDate" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_ToDate" type="text/html"><?php echo $appointment_block_slot_add->ToDate->caption() ?><?php echo $appointment_block_slot_add->ToDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->ToDate->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_ToDate" type="text/html"><span id="el_appointment_block_slot_ToDate">
<input type="text" data-table="appointment_block_slot" data-field="x_ToDate" name="x_ToDate" id="x_ToDate" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->ToDate->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->ToDate->EditValue ?>"<?php echo $appointment_block_slot_add->ToDate->editAttributes() ?>>
<?php if (!$appointment_block_slot_add->ToDate->ReadOnly && !$appointment_block_slot_add->ToDate->Disabled && !isset($appointment_block_slot_add->ToDate->EditAttrs["readonly"]) && !isset($appointment_block_slot_add->ToDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_block_slotadd_js">
loadjs.ready(["fappointment_block_slotadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_block_slotadd", "x_ToDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $appointment_block_slot_add->ToDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->FromTime->Visible) { // FromTime ?>
	<div id="r_FromTime" class="form-group row">
		<label id="elh_appointment_block_slot_FromTime" for="x_FromTime" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_FromTime" type="text/html"><?php echo $appointment_block_slot_add->FromTime->caption() ?><?php echo $appointment_block_slot_add->FromTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->FromTime->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_FromTime" type="text/html"><span id="el_appointment_block_slot_FromTime">
<input type="text" data-table="appointment_block_slot" data-field="x_FromTime" name="x_FromTime" id="x_FromTime" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->FromTime->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->FromTime->EditValue ?>"<?php echo $appointment_block_slot_add->FromTime->editAttributes() ?>>
<?php if (!$appointment_block_slot_add->FromTime->ReadOnly && !$appointment_block_slot_add->FromTime->Disabled && !isset($appointment_block_slot_add->FromTime->EditAttrs["readonly"]) && !isset($appointment_block_slot_add->FromTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_block_slotadd_js">
loadjs.ready(["fappointment_block_slotadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_block_slotadd", "x_FromTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $appointment_block_slot_add->FromTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_block_slot_add->ToTime->Visible) { // ToTime ?>
	<div id="r_ToTime" class="form-group row">
		<label id="elh_appointment_block_slot_ToTime" for="x_ToTime" class="<?php echo $appointment_block_slot_add->LeftColumnClass ?>"><script id="tpc_appointment_block_slot_ToTime" type="text/html"><?php echo $appointment_block_slot_add->ToTime->caption() ?><?php echo $appointment_block_slot_add->ToTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_block_slot_add->RightColumnClass ?>"><div <?php echo $appointment_block_slot_add->ToTime->cellAttributes() ?>>
<script id="tpx_appointment_block_slot_ToTime" type="text/html"><span id="el_appointment_block_slot_ToTime">
<input type="text" data-table="appointment_block_slot" data-field="x_ToTime" name="x_ToTime" id="x_ToTime" placeholder="<?php echo HtmlEncode($appointment_block_slot_add->ToTime->getPlaceHolder()) ?>" value="<?php echo $appointment_block_slot_add->ToTime->EditValue ?>"<?php echo $appointment_block_slot_add->ToTime->editAttributes() ?>>
<?php if (!$appointment_block_slot_add->ToTime->ReadOnly && !$appointment_block_slot_add->ToTime->Disabled && !isset($appointment_block_slot_add->ToTime->EditAttrs["readonly"]) && !isset($appointment_block_slot_add->ToTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_block_slotadd_js">
loadjs.ready(["fappointment_block_slotadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_block_slotadd", "x_ToTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $appointment_block_slot_add->ToTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_appointment_block_slotadd" class="ew-custom-template"></div>
<script id="tpm_appointment_block_slotadd" type="text/html">
<div id="ct_appointment_block_slot_add"><style type="text/css" >
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
		<tr><td>{{include tmpl="#tpc_appointment_block_slot_DrName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_DrName")/}}</td><td>{{include tmpl="#tpc_appointment_block_slot_Drid"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_Drid")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_block_slot_Details"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_Details")/}}</td><td>{{include tmpl="#tpc_appointment_block_slot_BlockType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_BlockType")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_block_slot_FromDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_FromDate")/}}</td><td>{{include tmpl="#tpc_appointment_block_slot_ToDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_ToDate")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_block_slot_FromTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_FromTime")/}}</td><td>{{include tmpl="#tpc_appointment_block_slot_ToTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_block_slot_ToTime")/}}</td></tr>
	</tbody>
</table>
</div>
</script>

<?php if (!$appointment_block_slot_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $appointment_block_slot_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_block_slot_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($appointment_block_slot->Rows) ?> };
	ew.applyTemplate("tpd_appointment_block_slotadd", "tpm_appointment_block_slotadd", "appointment_block_slotadd", "<?php echo $appointment_block_slot->CustomExport ?>", ew.templateData.rows[0]);
	$("script.appointment_block_slotadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$appointment_block_slot_add->showPageFooter();
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
$appointment_block_slot_add->terminate();
?>