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
$pres_tradenames_new_delete = new pres_tradenames_new_delete();

// Run the page
$pres_tradenames_new_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_tradenames_newdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_tradenames_newdelete = currentForm = new ew.Form("fpres_tradenames_newdelete", "delete");
	loadjs.done("fpres_tradenames_newdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_tradenames_new_delete->showPageHeader(); ?>
<?php
$pres_tradenames_new_delete->showMessage();
?>
<form name="fpres_tradenames_newdelete" id="fpres_tradenames_newdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_tradenames_new_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_tradenames_new_delete->ID->Visible) { // ID ?>
		<th class="<?php echo $pres_tradenames_new_delete->ID->headerCellClass() ?>"><span id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><?php echo $pres_tradenames_new_delete->ID->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Drug_Name->Visible) { // Drug_Name ?>
		<th class="<?php echo $pres_tradenames_new_delete->Drug_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><?php echo $pres_tradenames_new_delete->Drug_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name->Visible) { // Generic_Name ?>
		<th class="<?php echo $pres_tradenames_new_delete->Generic_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><?php echo $pres_tradenames_new_delete->Generic_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Trade_Name->Visible) { // Trade_Name ?>
		<th class="<?php echo $pres_tradenames_new_delete->Trade_Name->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><?php echo $pres_tradenames_new_delete->Trade_Name->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->PR_CODE->Visible) { // PR_CODE ?>
		<th class="<?php echo $pres_tradenames_new_delete->PR_CODE->headerCellClass() ?>"><span id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><?php echo $pres_tradenames_new_delete->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Form->Visible) { // Form ?>
		<th class="<?php echo $pres_tradenames_new_delete->Form->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><?php echo $pres_tradenames_new_delete->Form->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength->Visible) { // Strength ?>
		<th class="<?php echo $pres_tradenames_new_delete->Strength->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><?php echo $pres_tradenames_new_delete->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit->Visible) { // Unit ?>
		<th class="<?php echo $pres_tradenames_new_delete->Unit->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><?php echo $pres_tradenames_new_delete->Unit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<th class="<?php echo $pres_tradenames_new_delete->TypeOfDrug->headerCellClass() ?>"><span id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><?php echo $pres_tradenames_new_delete->TypeOfDrug->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->ProductType->Visible) { // ProductType ?>
		<th class="<?php echo $pres_tradenames_new_delete->ProductType->headerCellClass() ?>"><span id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><?php echo $pres_tradenames_new_delete->ProductType->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name1->Visible) { // Generic_Name1 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Generic_Name1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><?php echo $pres_tradenames_new_delete->Generic_Name1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength1->Visible) { // Strength1 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Strength1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><?php echo $pres_tradenames_new_delete->Strength1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit1->Visible) { // Unit1 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Unit1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><?php echo $pres_tradenames_new_delete->Unit1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name2->Visible) { // Generic_Name2 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Generic_Name2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><?php echo $pres_tradenames_new_delete->Generic_Name2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength2->Visible) { // Strength2 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Strength2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><?php echo $pres_tradenames_new_delete->Strength2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit2->Visible) { // Unit2 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Unit2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><?php echo $pres_tradenames_new_delete->Unit2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name3->Visible) { // Generic_Name3 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Generic_Name3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><?php echo $pres_tradenames_new_delete->Generic_Name3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength3->Visible) { // Strength3 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Strength3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><?php echo $pres_tradenames_new_delete->Strength3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit3->Visible) { // Unit3 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Unit3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><?php echo $pres_tradenames_new_delete->Unit3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name4->Visible) { // Generic_Name4 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Generic_Name4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><?php echo $pres_tradenames_new_delete->Generic_Name4->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name5->Visible) { // Generic_Name5 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Generic_Name5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><?php echo $pres_tradenames_new_delete->Generic_Name5->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength4->Visible) { // Strength4 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Strength4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><?php echo $pres_tradenames_new_delete->Strength4->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength5->Visible) { // Strength5 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Strength5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><?php echo $pres_tradenames_new_delete->Strength5->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit4->Visible) { // Unit4 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Unit4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><?php echo $pres_tradenames_new_delete->Unit4->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit5->Visible) { // Unit5 ?>
		<th class="<?php echo $pres_tradenames_new_delete->Unit5->headerCellClass() ?>"><span id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><?php echo $pres_tradenames_new_delete->Unit5->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative1->Visible) { // AlterNative1 ?>
		<th class="<?php echo $pres_tradenames_new_delete->AlterNative1->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><?php echo $pres_tradenames_new_delete->AlterNative1->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative2->Visible) { // AlterNative2 ?>
		<th class="<?php echo $pres_tradenames_new_delete->AlterNative2->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><?php echo $pres_tradenames_new_delete->AlterNative2->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative3->Visible) { // AlterNative3 ?>
		<th class="<?php echo $pres_tradenames_new_delete->AlterNative3->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><?php echo $pres_tradenames_new_delete->AlterNative3->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative4->Visible) { // AlterNative4 ?>
		<th class="<?php echo $pres_tradenames_new_delete->AlterNative4->headerCellClass() ?>"><span id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><?php echo $pres_tradenames_new_delete->AlterNative4->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_tradenames_new_delete->RecordCount = 0;
$i = 0;
while (!$pres_tradenames_new_delete->Recordset->EOF) {
	$pres_tradenames_new_delete->RecordCount++;
	$pres_tradenames_new_delete->RowCount++;

	// Set row properties
	$pres_tradenames_new->resetAttributes();
	$pres_tradenames_new->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_tradenames_new_delete->loadRowValues($pres_tradenames_new_delete->Recordset);

	// Render row
	$pres_tradenames_new_delete->renderRow();
?>
	<tr <?php echo $pres_tradenames_new->rowAttributes() ?>>
<?php if ($pres_tradenames_new_delete->ID->Visible) { // ID ?>
		<td <?php echo $pres_tradenames_new_delete->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_ID" class="pres_tradenames_new_ID">
<span<?php echo $pres_tradenames_new_delete->ID->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Drug_Name->Visible) { // Drug_Name ?>
		<td <?php echo $pres_tradenames_new_delete->Drug_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name">
<span<?php echo $pres_tradenames_new_delete->Drug_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Drug_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name->Visible) { // Generic_Name ?>
		<td <?php echo $pres_tradenames_new_delete->Generic_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name">
<span<?php echo $pres_tradenames_new_delete->Generic_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Generic_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Trade_Name->Visible) { // Trade_Name ?>
		<td <?php echo $pres_tradenames_new_delete->Trade_Name->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name">
<span<?php echo $pres_tradenames_new_delete->Trade_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Trade_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->PR_CODE->Visible) { // PR_CODE ?>
		<td <?php echo $pres_tradenames_new_delete->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE">
<span<?php echo $pres_tradenames_new_delete->PR_CODE->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Form->Visible) { // Form ?>
		<td <?php echo $pres_tradenames_new_delete->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Form" class="pres_tradenames_new_Form">
<span<?php echo $pres_tradenames_new_delete->Form->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength->Visible) { // Strength ?>
		<td <?php echo $pres_tradenames_new_delete->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength">
<span<?php echo $pres_tradenames_new_delete->Strength->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit->Visible) { // Unit ?>
		<td <?php echo $pres_tradenames_new_delete->Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit">
<span<?php echo $pres_tradenames_new_delete->Unit->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->TypeOfDrug->Visible) { // TypeOfDrug ?>
		<td <?php echo $pres_tradenames_new_delete->TypeOfDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug">
<span<?php echo $pres_tradenames_new_delete->TypeOfDrug->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->ProductType->Visible) { // ProductType ?>
		<td <?php echo $pres_tradenames_new_delete->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType">
<span<?php echo $pres_tradenames_new_delete->ProductType->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->ProductType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name1->Visible) { // Generic_Name1 ?>
		<td <?php echo $pres_tradenames_new_delete->Generic_Name1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1">
<span<?php echo $pres_tradenames_new_delete->Generic_Name1->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Generic_Name1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength1->Visible) { // Strength1 ?>
		<td <?php echo $pres_tradenames_new_delete->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1">
<span<?php echo $pres_tradenames_new_delete->Strength1->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Strength1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit1->Visible) { // Unit1 ?>
		<td <?php echo $pres_tradenames_new_delete->Unit1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1">
<span<?php echo $pres_tradenames_new_delete->Unit1->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Unit1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name2->Visible) { // Generic_Name2 ?>
		<td <?php echo $pres_tradenames_new_delete->Generic_Name2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2">
<span<?php echo $pres_tradenames_new_delete->Generic_Name2->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Generic_Name2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength2->Visible) { // Strength2 ?>
		<td <?php echo $pres_tradenames_new_delete->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2">
<span<?php echo $pres_tradenames_new_delete->Strength2->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Strength2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit2->Visible) { // Unit2 ?>
		<td <?php echo $pres_tradenames_new_delete->Unit2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2">
<span<?php echo $pres_tradenames_new_delete->Unit2->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Unit2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name3->Visible) { // Generic_Name3 ?>
		<td <?php echo $pres_tradenames_new_delete->Generic_Name3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3">
<span<?php echo $pres_tradenames_new_delete->Generic_Name3->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Generic_Name3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength3->Visible) { // Strength3 ?>
		<td <?php echo $pres_tradenames_new_delete->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3">
<span<?php echo $pres_tradenames_new_delete->Strength3->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Strength3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit3->Visible) { // Unit3 ?>
		<td <?php echo $pres_tradenames_new_delete->Unit3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3">
<span<?php echo $pres_tradenames_new_delete->Unit3->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Unit3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name4->Visible) { // Generic_Name4 ?>
		<td <?php echo $pres_tradenames_new_delete->Generic_Name4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4">
<span<?php echo $pres_tradenames_new_delete->Generic_Name4->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Generic_Name4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Generic_Name5->Visible) { // Generic_Name5 ?>
		<td <?php echo $pres_tradenames_new_delete->Generic_Name5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5">
<span<?php echo $pres_tradenames_new_delete->Generic_Name5->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Generic_Name5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength4->Visible) { // Strength4 ?>
		<td <?php echo $pres_tradenames_new_delete->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4">
<span<?php echo $pres_tradenames_new_delete->Strength4->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Strength4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Strength5->Visible) { // Strength5 ?>
		<td <?php echo $pres_tradenames_new_delete->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5">
<span<?php echo $pres_tradenames_new_delete->Strength5->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Strength5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit4->Visible) { // Unit4 ?>
		<td <?php echo $pres_tradenames_new_delete->Unit4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4">
<span<?php echo $pres_tradenames_new_delete->Unit4->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Unit4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->Unit5->Visible) { // Unit5 ?>
		<td <?php echo $pres_tradenames_new_delete->Unit5->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5">
<span<?php echo $pres_tradenames_new_delete->Unit5->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->Unit5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative1->Visible) { // AlterNative1 ?>
		<td <?php echo $pres_tradenames_new_delete->AlterNative1->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1">
<span<?php echo $pres_tradenames_new_delete->AlterNative1->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->AlterNative1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative2->Visible) { // AlterNative2 ?>
		<td <?php echo $pres_tradenames_new_delete->AlterNative2->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2">
<span<?php echo $pres_tradenames_new_delete->AlterNative2->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->AlterNative2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative3->Visible) { // AlterNative3 ?>
		<td <?php echo $pres_tradenames_new_delete->AlterNative3->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3">
<span<?php echo $pres_tradenames_new_delete->AlterNative3->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->AlterNative3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_new_delete->AlterNative4->Visible) { // AlterNative4 ?>
		<td <?php echo $pres_tradenames_new_delete->AlterNative4->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_new_delete->RowCount ?>_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4">
<span<?php echo $pres_tradenames_new_delete->AlterNative4->viewAttributes() ?>><?php echo $pres_tradenames_new_delete->AlterNative4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_tradenames_new_delete->Recordset->moveNext();
}
$pres_tradenames_new_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_tradenames_new_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_tradenames_new_delete->showPageFooter();
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
$pres_tradenames_new_delete->terminate();
?>