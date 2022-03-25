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
$lab_dept_mast_delete = new lab_dept_mast_delete();

// Run the page
$lab_dept_mast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_dept_mast_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_dept_mastdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_dept_mastdelete = currentForm = new ew.Form("flab_dept_mastdelete", "delete");
	loadjs.done("flab_dept_mastdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_dept_mast_delete->showPageHeader(); ?>
<?php
$lab_dept_mast_delete->showMessage();
?>
<form name="flab_dept_mastdelete" id="flab_dept_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_dept_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_dept_mast_delete->MainCD->Visible) { // MainCD ?>
		<th class="<?php echo $lab_dept_mast_delete->MainCD->headerCellClass() ?>"><span id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD"><?php echo $lab_dept_mast_delete->MainCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->Code->Visible) { // Code ?>
		<th class="<?php echo $lab_dept_mast_delete->Code->headerCellClass() ?>"><span id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code"><?php echo $lab_dept_mast_delete->Code->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $lab_dept_mast_delete->Name->headerCellClass() ?>"><span id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name"><?php echo $lab_dept_mast_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->Order->Visible) { // Order ?>
		<th class="<?php echo $lab_dept_mast_delete->Order->headerCellClass() ?>"><span id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order"><?php echo $lab_dept_mast_delete->Order->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->SignCD->Visible) { // SignCD ?>
		<th class="<?php echo $lab_dept_mast_delete->SignCD->headerCellClass() ?>"><span id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD"><?php echo $lab_dept_mast_delete->SignCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->Collection->Visible) { // Collection ?>
		<th class="<?php echo $lab_dept_mast_delete->Collection->headerCellClass() ?>"><span id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection"><?php echo $lab_dept_mast_delete->Collection->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $lab_dept_mast_delete->EditDate->headerCellClass() ?>"><span id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate"><?php echo $lab_dept_mast_delete->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->SMS->Visible) { // SMS ?>
		<th class="<?php echo $lab_dept_mast_delete->SMS->headerCellClass() ?>"><span id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS"><?php echo $lab_dept_mast_delete->SMS->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->WorkList->Visible) { // WorkList ?>
		<th class="<?php echo $lab_dept_mast_delete->WorkList->headerCellClass() ?>"><span id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList"><?php echo $lab_dept_mast_delete->WorkList->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->_Page->Visible) { // Page ?>
		<th class="<?php echo $lab_dept_mast_delete->_Page->headerCellClass() ?>"><span id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page"><?php echo $lab_dept_mast_delete->_Page->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->Incharge->Visible) { // Incharge ?>
		<th class="<?php echo $lab_dept_mast_delete->Incharge->headerCellClass() ?>"><span id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge"><?php echo $lab_dept_mast_delete->Incharge->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->AutoNum->Visible) { // AutoNum ?>
		<th class="<?php echo $lab_dept_mast_delete->AutoNum->headerCellClass() ?>"><span id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum"><?php echo $lab_dept_mast_delete->AutoNum->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_dept_mast_delete->id->headerCellClass() ?>"><span id="elh_lab_dept_mast_id" class="lab_dept_mast_id"><?php echo $lab_dept_mast_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_dept_mast_delete->RecordCount = 0;
$i = 0;
while (!$lab_dept_mast_delete->Recordset->EOF) {
	$lab_dept_mast_delete->RecordCount++;
	$lab_dept_mast_delete->RowCount++;

	// Set row properties
	$lab_dept_mast->resetAttributes();
	$lab_dept_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_dept_mast_delete->loadRowValues($lab_dept_mast_delete->Recordset);

	// Render row
	$lab_dept_mast_delete->renderRow();
?>
	<tr <?php echo $lab_dept_mast->rowAttributes() ?>>
<?php if ($lab_dept_mast_delete->MainCD->Visible) { // MainCD ?>
		<td <?php echo $lab_dept_mast_delete->MainCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD">
<span<?php echo $lab_dept_mast_delete->MainCD->viewAttributes() ?>><?php echo $lab_dept_mast_delete->MainCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->Code->Visible) { // Code ?>
		<td <?php echo $lab_dept_mast_delete->Code->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_Code" class="lab_dept_mast_Code">
<span<?php echo $lab_dept_mast_delete->Code->viewAttributes() ?>><?php echo $lab_dept_mast_delete->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->Name->Visible) { // Name ?>
		<td <?php echo $lab_dept_mast_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_Name" class="lab_dept_mast_Name">
<span<?php echo $lab_dept_mast_delete->Name->viewAttributes() ?>><?php echo $lab_dept_mast_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->Order->Visible) { // Order ?>
		<td <?php echo $lab_dept_mast_delete->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_Order" class="lab_dept_mast_Order">
<span<?php echo $lab_dept_mast_delete->Order->viewAttributes() ?>><?php echo $lab_dept_mast_delete->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->SignCD->Visible) { // SignCD ?>
		<td <?php echo $lab_dept_mast_delete->SignCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD">
<span<?php echo $lab_dept_mast_delete->SignCD->viewAttributes() ?>><?php echo $lab_dept_mast_delete->SignCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->Collection->Visible) { // Collection ?>
		<td <?php echo $lab_dept_mast_delete->Collection->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_Collection" class="lab_dept_mast_Collection">
<span<?php echo $lab_dept_mast_delete->Collection->viewAttributes() ?>><?php echo $lab_dept_mast_delete->Collection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->EditDate->Visible) { // EditDate ?>
		<td <?php echo $lab_dept_mast_delete->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate">
<span<?php echo $lab_dept_mast_delete->EditDate->viewAttributes() ?>><?php echo $lab_dept_mast_delete->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->SMS->Visible) { // SMS ?>
		<td <?php echo $lab_dept_mast_delete->SMS->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_SMS" class="lab_dept_mast_SMS">
<span<?php echo $lab_dept_mast_delete->SMS->viewAttributes() ?>><?php echo $lab_dept_mast_delete->SMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->WorkList->Visible) { // WorkList ?>
		<td <?php echo $lab_dept_mast_delete->WorkList->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList">
<span<?php echo $lab_dept_mast_delete->WorkList->viewAttributes() ?>><?php echo $lab_dept_mast_delete->WorkList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->_Page->Visible) { // Page ?>
		<td <?php echo $lab_dept_mast_delete->_Page->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast__Page" class="lab_dept_mast__Page">
<span<?php echo $lab_dept_mast_delete->_Page->viewAttributes() ?>><?php echo $lab_dept_mast_delete->_Page->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->Incharge->Visible) { // Incharge ?>
		<td <?php echo $lab_dept_mast_delete->Incharge->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge">
<span<?php echo $lab_dept_mast_delete->Incharge->viewAttributes() ?>><?php echo $lab_dept_mast_delete->Incharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->AutoNum->Visible) { // AutoNum ?>
		<td <?php echo $lab_dept_mast_delete->AutoNum->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum">
<span<?php echo $lab_dept_mast_delete->AutoNum->viewAttributes() ?>><?php echo $lab_dept_mast_delete->AutoNum->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast_delete->id->Visible) { // id ?>
		<td <?php echo $lab_dept_mast_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCount ?>_lab_dept_mast_id" class="lab_dept_mast_id">
<span<?php echo $lab_dept_mast_delete->id->viewAttributes() ?>><?php echo $lab_dept_mast_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_dept_mast_delete->Recordset->moveNext();
}
$lab_dept_mast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_dept_mast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_dept_mast_delete->showPageFooter();
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
$lab_dept_mast_delete->terminate();
?>