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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var flab_dept_mastdelete = currentForm = new ew.Form("flab_dept_mastdelete", "delete");

// Form_CustomValidate event
flab_dept_mastdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_dept_mastdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_dept_mast_delete->showPageHeader(); ?>
<?php
$lab_dept_mast_delete->showMessage();
?>
<form name="flab_dept_mastdelete" id="flab_dept_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_dept_mast_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_dept_mast_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_dept_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_dept_mast->MainCD->Visible) { // MainCD ?>
		<th class="<?php echo $lab_dept_mast->MainCD->headerCellClass() ?>"><span id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD"><?php echo $lab_dept_mast->MainCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->Code->Visible) { // Code ?>
		<th class="<?php echo $lab_dept_mast->Code->headerCellClass() ?>"><span id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code"><?php echo $lab_dept_mast->Code->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->Name->Visible) { // Name ?>
		<th class="<?php echo $lab_dept_mast->Name->headerCellClass() ?>"><span id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name"><?php echo $lab_dept_mast->Name->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->Order->Visible) { // Order ?>
		<th class="<?php echo $lab_dept_mast->Order->headerCellClass() ?>"><span id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order"><?php echo $lab_dept_mast->Order->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->SignCD->Visible) { // SignCD ?>
		<th class="<?php echo $lab_dept_mast->SignCD->headerCellClass() ?>"><span id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD"><?php echo $lab_dept_mast->SignCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->Collection->Visible) { // Collection ?>
		<th class="<?php echo $lab_dept_mast->Collection->headerCellClass() ?>"><span id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection"><?php echo $lab_dept_mast->Collection->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->EditDate->Visible) { // EditDate ?>
		<th class="<?php echo $lab_dept_mast->EditDate->headerCellClass() ?>"><span id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate"><?php echo $lab_dept_mast->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->SMS->Visible) { // SMS ?>
		<th class="<?php echo $lab_dept_mast->SMS->headerCellClass() ?>"><span id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS"><?php echo $lab_dept_mast->SMS->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->WorkList->Visible) { // WorkList ?>
		<th class="<?php echo $lab_dept_mast->WorkList->headerCellClass() ?>"><span id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList"><?php echo $lab_dept_mast->WorkList->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->_Page->Visible) { // Page ?>
		<th class="<?php echo $lab_dept_mast->_Page->headerCellClass() ?>"><span id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page"><?php echo $lab_dept_mast->_Page->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->Incharge->Visible) { // Incharge ?>
		<th class="<?php echo $lab_dept_mast->Incharge->headerCellClass() ?>"><span id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge"><?php echo $lab_dept_mast->Incharge->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->AutoNum->Visible) { // AutoNum ?>
		<th class="<?php echo $lab_dept_mast->AutoNum->headerCellClass() ?>"><span id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum"><?php echo $lab_dept_mast->AutoNum->caption() ?></span></th>
<?php } ?>
<?php if ($lab_dept_mast->id->Visible) { // id ?>
		<th class="<?php echo $lab_dept_mast->id->headerCellClass() ?>"><span id="elh_lab_dept_mast_id" class="lab_dept_mast_id"><?php echo $lab_dept_mast->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_dept_mast_delete->RecCnt = 0;
$i = 0;
while (!$lab_dept_mast_delete->Recordset->EOF) {
	$lab_dept_mast_delete->RecCnt++;
	$lab_dept_mast_delete->RowCnt++;

	// Set row properties
	$lab_dept_mast->resetAttributes();
	$lab_dept_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_dept_mast_delete->loadRowValues($lab_dept_mast_delete->Recordset);

	// Render row
	$lab_dept_mast_delete->renderRow();
?>
	<tr<?php echo $lab_dept_mast->rowAttributes() ?>>
<?php if ($lab_dept_mast->MainCD->Visible) { // MainCD ?>
		<td<?php echo $lab_dept_mast->MainCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD">
<span<?php echo $lab_dept_mast->MainCD->viewAttributes() ?>>
<?php echo $lab_dept_mast->MainCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->Code->Visible) { // Code ?>
		<td<?php echo $lab_dept_mast->Code->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_Code" class="lab_dept_mast_Code">
<span<?php echo $lab_dept_mast->Code->viewAttributes() ?>>
<?php echo $lab_dept_mast->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->Name->Visible) { // Name ?>
		<td<?php echo $lab_dept_mast->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_Name" class="lab_dept_mast_Name">
<span<?php echo $lab_dept_mast->Name->viewAttributes() ?>>
<?php echo $lab_dept_mast->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->Order->Visible) { // Order ?>
		<td<?php echo $lab_dept_mast->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_Order" class="lab_dept_mast_Order">
<span<?php echo $lab_dept_mast->Order->viewAttributes() ?>>
<?php echo $lab_dept_mast->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->SignCD->Visible) { // SignCD ?>
		<td<?php echo $lab_dept_mast->SignCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD">
<span<?php echo $lab_dept_mast->SignCD->viewAttributes() ?>>
<?php echo $lab_dept_mast->SignCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->Collection->Visible) { // Collection ?>
		<td<?php echo $lab_dept_mast->Collection->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_Collection" class="lab_dept_mast_Collection">
<span<?php echo $lab_dept_mast->Collection->viewAttributes() ?>>
<?php echo $lab_dept_mast->Collection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->EditDate->Visible) { // EditDate ?>
		<td<?php echo $lab_dept_mast->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate">
<span<?php echo $lab_dept_mast->EditDate->viewAttributes() ?>>
<?php echo $lab_dept_mast->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->SMS->Visible) { // SMS ?>
		<td<?php echo $lab_dept_mast->SMS->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_SMS" class="lab_dept_mast_SMS">
<span<?php echo $lab_dept_mast->SMS->viewAttributes() ?>>
<?php echo $lab_dept_mast->SMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->WorkList->Visible) { // WorkList ?>
		<td<?php echo $lab_dept_mast->WorkList->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList">
<span<?php echo $lab_dept_mast->WorkList->viewAttributes() ?>>
<?php echo $lab_dept_mast->WorkList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->_Page->Visible) { // Page ?>
		<td<?php echo $lab_dept_mast->_Page->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast__Page" class="lab_dept_mast__Page">
<span<?php echo $lab_dept_mast->_Page->viewAttributes() ?>>
<?php echo $lab_dept_mast->_Page->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->Incharge->Visible) { // Incharge ?>
		<td<?php echo $lab_dept_mast->Incharge->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge">
<span<?php echo $lab_dept_mast->Incharge->viewAttributes() ?>>
<?php echo $lab_dept_mast->Incharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->AutoNum->Visible) { // AutoNum ?>
		<td<?php echo $lab_dept_mast->AutoNum->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum">
<span<?php echo $lab_dept_mast->AutoNum->viewAttributes() ?>>
<?php echo $lab_dept_mast->AutoNum->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_dept_mast->id->Visible) { // id ?>
		<td<?php echo $lab_dept_mast->id->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_delete->RowCnt ?>_lab_dept_mast_id" class="lab_dept_mast_id">
<span<?php echo $lab_dept_mast->id->viewAttributes() ?>>
<?php echo $lab_dept_mast->id->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_dept_mast_delete->terminate();
?>