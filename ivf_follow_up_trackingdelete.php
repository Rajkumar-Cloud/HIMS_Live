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
$ivf_follow_up_tracking_delete = new ivf_follow_up_tracking_delete();

// Run the page
$ivf_follow_up_tracking_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_follow_up_trackingdelete = currentForm = new ew.Form("fivf_follow_up_trackingdelete", "delete");

// Form_CustomValidate event
fivf_follow_up_trackingdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_follow_up_trackingdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_follow_up_tracking_delete->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_delete->showMessage();
?>
<form name="fivf_follow_up_trackingdelete" id="fivf_follow_up_trackingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_follow_up_tracking_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_follow_up_tracking_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_follow_up_tracking_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
		<th class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id"><?php echo $ivf_follow_up_tracking->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name"><?php echo $ivf_follow_up_tracking->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
		<th class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age"><?php echo $ivf_follow_up_tracking->Age->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
		<th class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
		<th class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status"><?php echo $ivf_follow_up_tracking->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
		<th class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
		<th class="<?php echo $ivf_follow_up_tracking->createdUserName->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName"><?php echo $ivf_follow_up_tracking->createdUserName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->FollowUpDate->Visible) { // FollowUpDate ?>
		<th class="<?php echo $ivf_follow_up_tracking->FollowUpDate->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate"><?php echo $ivf_follow_up_tracking->FollowUpDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->NextVistDate->Visible) { // NextVistDate ?>
		<th class="<?php echo $ivf_follow_up_tracking->NextVistDate->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate"><?php echo $ivf_follow_up_tracking->NextVistDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking->HospID->Visible) { // HospID ?>
		<th class="<?php echo $ivf_follow_up_tracking->HospID->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID"><?php echo $ivf_follow_up_tracking->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_follow_up_tracking_delete->RecCnt = 0;
$i = 0;
while (!$ivf_follow_up_tracking_delete->Recordset->EOF) {
	$ivf_follow_up_tracking_delete->RecCnt++;
	$ivf_follow_up_tracking_delete->RowCnt++;

	// Set row properties
	$ivf_follow_up_tracking->resetAttributes();
	$ivf_follow_up_tracking->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_follow_up_tracking_delete->loadRowValues($ivf_follow_up_tracking_delete->Recordset);

	// Render row
	$ivf_follow_up_tracking_delete->renderRow();
?>
	<tr<?php echo $ivf_follow_up_tracking->rowAttributes() ?>>
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
		<td<?php echo $ivf_follow_up_tracking->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $ivf_follow_up_tracking->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
		<td<?php echo $ivf_follow_up_tracking->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
		<td<?php echo $ivf_follow_up_tracking->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking->Age->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
		<td<?php echo $ivf_follow_up_tracking->MReadMore->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking->MReadMore->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->MReadMore->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
		<td<?php echo $ivf_follow_up_tracking->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking->status->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
		<td<?php echo $ivf_follow_up_tracking->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking->createdby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $ivf_follow_up_tracking->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking->createddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $ivf_follow_up_tracking->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking->modifiedby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $ivf_follow_up_tracking->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_follow_up_tracking->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
		<td<?php echo $ivf_follow_up_tracking->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName">
<span<?php echo $ivf_follow_up_tracking->createdUserName->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->FollowUpDate->Visible) { // FollowUpDate ?>
		<td<?php echo $ivf_follow_up_tracking->FollowUpDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate">
<span<?php echo $ivf_follow_up_tracking->FollowUpDate->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->FollowUpDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->NextVistDate->Visible) { // NextVistDate ?>
		<td<?php echo $ivf_follow_up_tracking->NextVistDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate">
<span<?php echo $ivf_follow_up_tracking->NextVistDate->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->NextVistDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking->HospID->Visible) { // HospID ?>
		<td<?php echo $ivf_follow_up_tracking->HospID->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCnt ?>_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID">
<span<?php echo $ivf_follow_up_tracking->HospID->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_follow_up_tracking_delete->Recordset->moveNext();
}
$ivf_follow_up_tracking_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_follow_up_tracking_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_follow_up_tracking_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_follow_up_tracking_delete->terminate();
?>