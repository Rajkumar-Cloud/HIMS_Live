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
<?php include_once "header.php"; ?>
<script>
var fivf_follow_up_trackingdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_follow_up_trackingdelete = currentForm = new ew.Form("fivf_follow_up_trackingdelete", "delete");
	loadjs.done("fivf_follow_up_trackingdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_follow_up_tracking_delete->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_delete->showMessage();
?>
<form name="fivf_follow_up_trackingdelete" id="fivf_follow_up_trackingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_follow_up_tracking_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_follow_up_tracking_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->id->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id"><?php echo $ivf_follow_up_tracking_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->RIDNO->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO"><?php echo $ivf_follow_up_tracking_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->Name->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name"><?php echo $ivf_follow_up_tracking_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->Age->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age"><?php echo $ivf_follow_up_tracking_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->MReadMore->Visible) { // MReadMore ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->MReadMore->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore"><?php echo $ivf_follow_up_tracking_delete->MReadMore->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->status->Visible) { // status ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->status->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status"><?php echo $ivf_follow_up_tracking_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->createdby->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby"><?php echo $ivf_follow_up_tracking_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->createddatetime->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime"><?php echo $ivf_follow_up_tracking_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->modifiedby->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby"><?php echo $ivf_follow_up_tracking_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime"><?php echo $ivf_follow_up_tracking_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo"><?php echo $ivf_follow_up_tracking_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->createdUserName->Visible) { // createdUserName ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->createdUserName->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName"><?php echo $ivf_follow_up_tracking_delete->createdUserName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->FollowUpDate->Visible) { // FollowUpDate ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->FollowUpDate->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate"><?php echo $ivf_follow_up_tracking_delete->FollowUpDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->NextVistDate->Visible) { // NextVistDate ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->NextVistDate->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate"><?php echo $ivf_follow_up_tracking_delete->NextVistDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $ivf_follow_up_tracking_delete->HospID->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID"><?php echo $ivf_follow_up_tracking_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_follow_up_tracking_delete->RecordCount = 0;
$i = 0;
while (!$ivf_follow_up_tracking_delete->Recordset->EOF) {
	$ivf_follow_up_tracking_delete->RecordCount++;
	$ivf_follow_up_tracking_delete->RowCount++;

	// Set row properties
	$ivf_follow_up_tracking->resetAttributes();
	$ivf_follow_up_tracking->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_follow_up_tracking_delete->loadRowValues($ivf_follow_up_tracking_delete->Recordset);

	// Render row
	$ivf_follow_up_tracking_delete->renderRow();
?>
	<tr <?php echo $ivf_follow_up_tracking->rowAttributes() ?>>
<?php if ($ivf_follow_up_tracking_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_follow_up_tracking_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking_delete->id->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $ivf_follow_up_tracking_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking_delete->RIDNO->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_follow_up_tracking_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking_delete->Name->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->Age->Visible) { // Age ?>
		<td <?php echo $ivf_follow_up_tracking_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking_delete->Age->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->MReadMore->Visible) { // MReadMore ?>
		<td <?php echo $ivf_follow_up_tracking_delete->MReadMore->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking_delete->MReadMore->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->MReadMore->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->status->Visible) { // status ?>
		<td <?php echo $ivf_follow_up_tracking_delete->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking_delete->status->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $ivf_follow_up_tracking_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking_delete->createdby->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $ivf_follow_up_tracking_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking_delete->createddatetime->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $ivf_follow_up_tracking_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking_delete->modifiedby->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $ivf_follow_up_tracking_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking_delete->modifieddatetime->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_follow_up_tracking_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking_delete->TidNo->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->createdUserName->Visible) { // createdUserName ?>
		<td <?php echo $ivf_follow_up_tracking_delete->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName">
<span<?php echo $ivf_follow_up_tracking_delete->createdUserName->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->createdUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->FollowUpDate->Visible) { // FollowUpDate ?>
		<td <?php echo $ivf_follow_up_tracking_delete->FollowUpDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate">
<span<?php echo $ivf_follow_up_tracking_delete->FollowUpDate->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->FollowUpDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->NextVistDate->Visible) { // NextVistDate ?>
		<td <?php echo $ivf_follow_up_tracking_delete->NextVistDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate">
<span<?php echo $ivf_follow_up_tracking_delete->NextVistDate->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->NextVistDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_follow_up_tracking_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $ivf_follow_up_tracking_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_delete->RowCount ?>_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID">
<span<?php echo $ivf_follow_up_tracking_delete->HospID->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_delete->HospID->getViewValue() ?></span>
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
$ivf_follow_up_tracking_delete->terminate();
?>