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
<?php include_once "header.php"; ?>
<script>
var fappointment_reminderadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fappointment_reminderadd = currentForm = new ew.Form("fappointment_reminderadd", "add");

	// Validate form
	fappointment_reminderadd.validate = function() {
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
			<?php if ($appointment_reminder_add->reminder->Required) { ?>
				elm = this.getElements("x" + infix + "_reminder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->reminder->caption(), $appointment_reminder_add->reminder->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_reminder_add->Drid->Required) { ?>
				elm = this.getElements("x" + infix + "_Drid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->Drid->caption(), $appointment_reminder_add->Drid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Drid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_reminder_add->Drid->errorMessage()) ?>");
			<?php if ($appointment_reminder_add->DrName->Required) { ?>
				elm = this.getElements("x" + infix + "_DrName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->DrName->caption(), $appointment_reminder_add->DrName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($appointment_reminder_add->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->Duration->caption(), $appointment_reminder_add->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_reminder_add->Duration->errorMessage()) ?>");
			<?php if ($appointment_reminder_add->Date->Required) { ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->Date->caption(), $appointment_reminder_add->Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_reminder_add->Date->errorMessage()) ?>");
			<?php if ($appointment_reminder_add->SMSSend->Required) { ?>
				elm = this.getElements("x" + infix + "_SMSSend");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->SMSSend->caption(), $appointment_reminder_add->SMSSend->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SMSSend");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_reminder_add->SMSSend->errorMessage()) ?>");
			<?php if ($appointment_reminder_add->EmailSend->Required) { ?>
				elm = this.getElements("x" + infix + "_EmailSend");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $appointment_reminder_add->EmailSend->caption(), $appointment_reminder_add->EmailSend->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EmailSend");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($appointment_reminder_add->EmailSend->errorMessage()) ?>");

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
	fappointment_reminderadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fappointment_reminderadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fappointment_reminderadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_reminder_add->showPageHeader(); ?>
<?php
$appointment_reminder_add->showMessage();
?>
<form name="fappointment_reminderadd" id="fappointment_reminderadd" class="<?php echo $appointment_reminder_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_reminder_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($appointment_reminder_add->reminder->Visible) { // reminder ?>
	<div id="r_reminder" class="form-group row">
		<label id="elh_appointment_reminder_reminder" for="x_reminder" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_reminder" type="text/html"><?php echo $appointment_reminder_add->reminder->caption() ?><?php echo $appointment_reminder_add->reminder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->reminder->cellAttributes() ?>>
<script id="tpx_appointment_reminder_reminder" type="text/html"><span id="el_appointment_reminder_reminder">
<textarea data-table="appointment_reminder" data-field="x_reminder" name="x_reminder" id="x_reminder" cols="35" rows="4" placeholder="<?php echo HtmlEncode($appointment_reminder_add->reminder->getPlaceHolder()) ?>"<?php echo $appointment_reminder_add->reminder->editAttributes() ?>><?php echo $appointment_reminder_add->reminder->EditValue ?></textarea>
</span></script>
<?php echo $appointment_reminder_add->reminder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder_add->Drid->Visible) { // Drid ?>
	<div id="r_Drid" class="form-group row">
		<label id="elh_appointment_reminder_Drid" for="x_Drid" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_Drid" type="text/html"><?php echo $appointment_reminder_add->Drid->caption() ?><?php echo $appointment_reminder_add->Drid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->Drid->cellAttributes() ?>>
<script id="tpx_appointment_reminder_Drid" type="text/html"><span id="el_appointment_reminder_Drid">
<input type="text" data-table="appointment_reminder" data-field="x_Drid" name="x_Drid" id="x_Drid" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder_add->Drid->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder_add->Drid->EditValue ?>"<?php echo $appointment_reminder_add->Drid->editAttributes() ?>>
</span></script>
<?php echo $appointment_reminder_add->Drid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder_add->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_appointment_reminder_DrName" for="x_DrName" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_DrName" type="text/html"><?php echo $appointment_reminder_add->DrName->caption() ?><?php echo $appointment_reminder_add->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->DrName->cellAttributes() ?>>
<script id="tpx_appointment_reminder_DrName" type="text/html"><span id="el_appointment_reminder_DrName">
<input type="text" data-table="appointment_reminder" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($appointment_reminder_add->DrName->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder_add->DrName->EditValue ?>"<?php echo $appointment_reminder_add->DrName->editAttributes() ?>>
</span></script>
<?php echo $appointment_reminder_add->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder_add->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_appointment_reminder_Duration" for="x_Duration" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_Duration" type="text/html"><?php echo $appointment_reminder_add->Duration->caption() ?><?php echo $appointment_reminder_add->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->Duration->cellAttributes() ?>>
<script id="tpx_appointment_reminder_Duration" type="text/html"><span id="el_appointment_reminder_Duration">
<input type="text" data-table="appointment_reminder" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder_add->Duration->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder_add->Duration->EditValue ?>"<?php echo $appointment_reminder_add->Duration->editAttributes() ?>>
</span></script>
<?php echo $appointment_reminder_add->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder_add->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_appointment_reminder_Date" for="x_Date" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_Date" type="text/html"><?php echo $appointment_reminder_add->Date->caption() ?><?php echo $appointment_reminder_add->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->Date->cellAttributes() ?>>
<script id="tpx_appointment_reminder_Date" type="text/html"><span id="el_appointment_reminder_Date">
<input type="text" data-table="appointment_reminder" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($appointment_reminder_add->Date->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder_add->Date->EditValue ?>"<?php echo $appointment_reminder_add->Date->editAttributes() ?>>
<?php if (!$appointment_reminder_add->Date->ReadOnly && !$appointment_reminder_add->Date->Disabled && !isset($appointment_reminder_add->Date->EditAttrs["readonly"]) && !isset($appointment_reminder_add->Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="appointment_reminderadd_js">
loadjs.ready(["fappointment_reminderadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fappointment_reminderadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $appointment_reminder_add->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder_add->SMSSend->Visible) { // SMSSend ?>
	<div id="r_SMSSend" class="form-group row">
		<label id="elh_appointment_reminder_SMSSend" for="x_SMSSend" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_SMSSend" type="text/html"><?php echo $appointment_reminder_add->SMSSend->caption() ?><?php echo $appointment_reminder_add->SMSSend->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->SMSSend->cellAttributes() ?>>
<script id="tpx_appointment_reminder_SMSSend" type="text/html"><span id="el_appointment_reminder_SMSSend">
<input type="text" data-table="appointment_reminder" data-field="x_SMSSend" name="x_SMSSend" id="x_SMSSend" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder_add->SMSSend->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder_add->SMSSend->EditValue ?>"<?php echo $appointment_reminder_add->SMSSend->editAttributes() ?>>
</span></script>
<?php echo $appointment_reminder_add->SMSSend->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($appointment_reminder_add->EmailSend->Visible) { // EmailSend ?>
	<div id="r_EmailSend" class="form-group row">
		<label id="elh_appointment_reminder_EmailSend" for="x_EmailSend" class="<?php echo $appointment_reminder_add->LeftColumnClass ?>"><script id="tpc_appointment_reminder_EmailSend" type="text/html"><?php echo $appointment_reminder_add->EmailSend->caption() ?><?php echo $appointment_reminder_add->EmailSend->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $appointment_reminder_add->RightColumnClass ?>"><div <?php echo $appointment_reminder_add->EmailSend->cellAttributes() ?>>
<script id="tpx_appointment_reminder_EmailSend" type="text/html"><span id="el_appointment_reminder_EmailSend">
<input type="text" data-table="appointment_reminder" data-field="x_EmailSend" name="x_EmailSend" id="x_EmailSend" size="30" placeholder="<?php echo HtmlEncode($appointment_reminder_add->EmailSend->getPlaceHolder()) ?>" value="<?php echo $appointment_reminder_add->EmailSend->EditValue ?>"<?php echo $appointment_reminder_add->EmailSend->editAttributes() ?>>
</span></script>
<?php echo $appointment_reminder_add->EmailSend->CustomMsg ?></div></div>
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
		<tr><td>{{include tmpl="#tpc_appointment_reminder_reminder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_reminder")/}}</td><td>{{include tmpl="#tpc_appointment_reminder_Drid"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_Drid")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_DrName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_DrName")/}}</td><td></td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_Duration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_Duration")/}}</td><td>{{include tmpl="#tpc_appointment_reminder_Date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_Date")/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_appointment_reminder_SMSSend"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_SMSSend")/}}</td><td>{{include tmpl="#tpc_appointment_reminder_EmailSend"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_appointment_reminder_EmailSend")/}}</td></tr>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($appointment_reminder->Rows) ?> };
	ew.applyTemplate("tpd_appointment_reminderadd", "tpm_appointment_reminderadd", "appointment_reminderadd", "<?php echo $appointment_reminder->CustomExport ?>", ew.templateData.rows[0]);
	$("script.appointment_reminderadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$appointment_reminder_add->showPageFooter();
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
$appointment_reminder_add->terminate();
?>