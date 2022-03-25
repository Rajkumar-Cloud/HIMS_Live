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
$pres_tradenames_new_view = new pres_tradenames_new_view();

// Run the page
$pres_tradenames_new_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_tradenames_newview = currentForm = new ew.Form("fpres_tradenames_newview", "view");

// Form_CustomValidate event
fpres_tradenames_newview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenames_newview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_tradenames_newview.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_view->Generic_Name->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_view->Generic_Name->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Form"] = <?php echo $pres_tradenames_new_view->Form->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Form"].options = <?php echo JsonEncode($pres_tradenames_new_view->Form->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Unit"] = <?php echo $pres_tradenames_new_view->Unit->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Unit"].options = <?php echo JsonEncode($pres_tradenames_new_view->Unit->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_view->TypeOfDrug->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_view->TypeOfDrug->options(FALSE, TRUE)) ?>;
fpres_tradenames_newview.lists["x_ProductType"] = <?php echo $pres_tradenames_new_view->ProductType->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_ProductType"].options = <?php echo JsonEncode($pres_tradenames_new_view->ProductType->options(FALSE, TRUE)) ?>;
fpres_tradenames_newview.lists["x_Generic_Name1"] = <?php echo $pres_tradenames_new_view->Generic_Name1->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Generic_Name1"].options = <?php echo JsonEncode($pres_tradenames_new_view->Generic_Name1->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Unit1"] = <?php echo $pres_tradenames_new_view->Unit1->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Unit1"].options = <?php echo JsonEncode($pres_tradenames_new_view->Unit1->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Generic_Name2"] = <?php echo $pres_tradenames_new_view->Generic_Name2->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Generic_Name2"].options = <?php echo JsonEncode($pres_tradenames_new_view->Generic_Name2->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Unit2"] = <?php echo $pres_tradenames_new_view->Unit2->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Unit2"].options = <?php echo JsonEncode($pres_tradenames_new_view->Unit2->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Generic_Name3"] = <?php echo $pres_tradenames_new_view->Generic_Name3->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Generic_Name3"].options = <?php echo JsonEncode($pres_tradenames_new_view->Generic_Name3->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Unit3"] = <?php echo $pres_tradenames_new_view->Unit3->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Unit3"].options = <?php echo JsonEncode($pres_tradenames_new_view->Unit3->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Generic_Name4"] = <?php echo $pres_tradenames_new_view->Generic_Name4->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Generic_Name4"].options = <?php echo JsonEncode($pres_tradenames_new_view->Generic_Name4->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Generic_Name5"] = <?php echo $pres_tradenames_new_view->Generic_Name5->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Generic_Name5"].options = <?php echo JsonEncode($pres_tradenames_new_view->Generic_Name5->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Unit4"] = <?php echo $pres_tradenames_new_view->Unit4->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Unit4"].options = <?php echo JsonEncode($pres_tradenames_new_view->Unit4->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_Unit5"] = <?php echo $pres_tradenames_new_view->Unit5->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_Unit5"].options = <?php echo JsonEncode($pres_tradenames_new_view->Unit5->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_AlterNative1"] = <?php echo $pres_tradenames_new_view->AlterNative1->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_AlterNative1"].options = <?php echo JsonEncode($pres_tradenames_new_view->AlterNative1->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_AlterNative2"] = <?php echo $pres_tradenames_new_view->AlterNative2->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_AlterNative2"].options = <?php echo JsonEncode($pres_tradenames_new_view->AlterNative2->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_AlterNative3"] = <?php echo $pres_tradenames_new_view->AlterNative3->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_AlterNative3"].options = <?php echo JsonEncode($pres_tradenames_new_view->AlterNative3->lookupOptions()) ?>;
fpres_tradenames_newview.lists["x_AlterNative4"] = <?php echo $pres_tradenames_new_view->AlterNative4->Lookup->toClientList() ?>;
fpres_tradenames_newview.lists["x_AlterNative4"].options = <?php echo JsonEncode($pres_tradenames_new_view->AlterNative4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_tradenames_new_view->ExportOptions->render("body") ?>
<?php $pres_tradenames_new_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_tradenames_new_view->showPageHeader(); ?>
<?php
$pres_tradenames_new_view->showMessage();
?>
<form name="fpres_tradenames_newview" id="fpres_tradenames_newview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_tradenames_new_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_tradenames_new_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="modal" value="<?php echo (int)$pres_tradenames_new_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_tradenames_new->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_ID"><?php echo $pres_tradenames_new->ID->caption() ?></span></td>
		<td data-name="ID"<?php echo $pres_tradenames_new->ID->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ID">
<span<?php echo $pres_tradenames_new->ID->viewAttributes() ?>>
<?php echo $pres_tradenames_new->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
	<tr id="r_Drug_Name">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Drug_Name"><?php echo $pres_tradenames_new->Drug_Name->caption() ?></span></td>
		<td data-name="Drug_Name"<?php echo $pres_tradenames_new->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Drug_Name">
<span<?php echo $pres_tradenames_new->Drug_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Drug_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
	<tr id="r_Generic_Name">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name"><?php echo $pres_tradenames_new->Generic_Name->caption() ?></span></td>
		<td data-name="Generic_Name"<?php echo $pres_tradenames_new->Generic_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name">
<span<?php echo $pres_tradenames_new->Generic_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
	<tr id="r_Trade_Name">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Trade_Name"><?php echo $pres_tradenames_new->Trade_Name->caption() ?></span></td>
		<td data-name="Trade_Name"<?php echo $pres_tradenames_new->Trade_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Trade_Name">
<span<?php echo $pres_tradenames_new->Trade_Name->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Trade_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
	<tr id="r_PR_CODE">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_PR_CODE"><?php echo $pres_tradenames_new->PR_CODE->caption() ?></span></td>
		<td data-name="PR_CODE"<?php echo $pres_tradenames_new->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_PR_CODE">
<span<?php echo $pres_tradenames_new->PR_CODE->viewAttributes() ?>>
<?php echo $pres_tradenames_new->PR_CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Form"><?php echo $pres_tradenames_new->Form->caption() ?></span></td>
		<td data-name="Form"<?php echo $pres_tradenames_new->Form->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Form">
<span<?php echo $pres_tradenames_new->Form->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
	<tr id="r_Strength">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength"><?php echo $pres_tradenames_new->Strength->caption() ?></span></td>
		<td data-name="Strength"<?php echo $pres_tradenames_new->Strength->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength">
<span<?php echo $pres_tradenames_new->Strength->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
	<tr id="r_Unit">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit"><?php echo $pres_tradenames_new->Unit->caption() ?></span></td>
		<td data-name="Unit"<?php echo $pres_tradenames_new->Unit->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit">
<span<?php echo $pres_tradenames_new->Unit->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<tr id="r_CONTAINER_TYPE">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_CONTAINER_TYPE"><?php echo $pres_tradenames_new->CONTAINER_TYPE->caption() ?></span></td>
		<td data-name="CONTAINER_TYPE"<?php echo $pres_tradenames_new->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_TYPE">
<span<?php echo $pres_tradenames_new->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_tradenames_new->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<tr id="r_CONTAINER_STRENGTH">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_CONTAINER_STRENGTH"><?php echo $pres_tradenames_new->CONTAINER_STRENGTH->caption() ?></span></td>
		<td data-name="CONTAINER_STRENGTH"<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_STRENGTH">
<span<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->viewAttributes() ?>>
<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<tr id="r_TypeOfDrug">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_TypeOfDrug"><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?></span></td>
		<td data-name="TypeOfDrug"<?php echo $pres_tradenames_new->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_tradenames_new_TypeOfDrug">
<span<?php echo $pres_tradenames_new->TypeOfDrug->viewAttributes() ?>>
<?php echo $pres_tradenames_new->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
	<tr id="r_ProductType">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_ProductType"><?php echo $pres_tradenames_new->ProductType->caption() ?></span></td>
		<td data-name="ProductType"<?php echo $pres_tradenames_new->ProductType->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ProductType">
<span<?php echo $pres_tradenames_new->ProductType->viewAttributes() ?>>
<?php echo $pres_tradenames_new->ProductType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
	<tr id="r_Generic_Name1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name1"><?php echo $pres_tradenames_new->Generic_Name1->caption() ?></span></td>
		<td data-name="Generic_Name1"<?php echo $pres_tradenames_new->Generic_Name1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name1">
<span<?php echo $pres_tradenames_new->Generic_Name1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
	<tr id="r_Strength1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength1"><?php echo $pres_tradenames_new->Strength1->caption() ?></span></td>
		<td data-name="Strength1"<?php echo $pres_tradenames_new->Strength1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength1">
<span<?php echo $pres_tradenames_new->Strength1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
	<tr id="r_Unit1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit1"><?php echo $pres_tradenames_new->Unit1->caption() ?></span></td>
		<td data-name="Unit1"<?php echo $pres_tradenames_new->Unit1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit1">
<span<?php echo $pres_tradenames_new->Unit1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
	<tr id="r_Generic_Name2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name2"><?php echo $pres_tradenames_new->Generic_Name2->caption() ?></span></td>
		<td data-name="Generic_Name2"<?php echo $pres_tradenames_new->Generic_Name2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name2">
<span<?php echo $pres_tradenames_new->Generic_Name2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
	<tr id="r_Strength2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength2"><?php echo $pres_tradenames_new->Strength2->caption() ?></span></td>
		<td data-name="Strength2"<?php echo $pres_tradenames_new->Strength2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength2">
<span<?php echo $pres_tradenames_new->Strength2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
	<tr id="r_Unit2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit2"><?php echo $pres_tradenames_new->Unit2->caption() ?></span></td>
		<td data-name="Unit2"<?php echo $pres_tradenames_new->Unit2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit2">
<span<?php echo $pres_tradenames_new->Unit2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
	<tr id="r_Generic_Name3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name3"><?php echo $pres_tradenames_new->Generic_Name3->caption() ?></span></td>
		<td data-name="Generic_Name3"<?php echo $pres_tradenames_new->Generic_Name3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name3">
<span<?php echo $pres_tradenames_new->Generic_Name3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
	<tr id="r_Strength3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength3"><?php echo $pres_tradenames_new->Strength3->caption() ?></span></td>
		<td data-name="Strength3"<?php echo $pres_tradenames_new->Strength3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength3">
<span<?php echo $pres_tradenames_new->Strength3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
	<tr id="r_Unit3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit3"><?php echo $pres_tradenames_new->Unit3->caption() ?></span></td>
		<td data-name="Unit3"<?php echo $pres_tradenames_new->Unit3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit3">
<span<?php echo $pres_tradenames_new->Unit3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
	<tr id="r_Generic_Name4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name4"><?php echo $pres_tradenames_new->Generic_Name4->caption() ?></span></td>
		<td data-name="Generic_Name4"<?php echo $pres_tradenames_new->Generic_Name4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name4">
<span<?php echo $pres_tradenames_new->Generic_Name4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
	<tr id="r_Generic_Name5">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name5"><?php echo $pres_tradenames_new->Generic_Name5->caption() ?></span></td>
		<td data-name="Generic_Name5"<?php echo $pres_tradenames_new->Generic_Name5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name5">
<span<?php echo $pres_tradenames_new->Generic_Name5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
	<tr id="r_Strength4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength4"><?php echo $pres_tradenames_new->Strength4->caption() ?></span></td>
		<td data-name="Strength4"<?php echo $pres_tradenames_new->Strength4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength4">
<span<?php echo $pres_tradenames_new->Strength4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
	<tr id="r_Strength5">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength5"><?php echo $pres_tradenames_new->Strength5->caption() ?></span></td>
		<td data-name="Strength5"<?php echo $pres_tradenames_new->Strength5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength5">
<span<?php echo $pres_tradenames_new->Strength5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Strength5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
	<tr id="r_Unit4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit4"><?php echo $pres_tradenames_new->Unit4->caption() ?></span></td>
		<td data-name="Unit4"<?php echo $pres_tradenames_new->Unit4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit4">
<span<?php echo $pres_tradenames_new->Unit4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
	<tr id="r_Unit5">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit5"><?php echo $pres_tradenames_new->Unit5->caption() ?></span></td>
		<td data-name="Unit5"<?php echo $pres_tradenames_new->Unit5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit5">
<span<?php echo $pres_tradenames_new->Unit5->viewAttributes() ?>>
<?php echo $pres_tradenames_new->Unit5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
	<tr id="r_AlterNative1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative1"><?php echo $pres_tradenames_new->AlterNative1->caption() ?></span></td>
		<td data-name="AlterNative1"<?php echo $pres_tradenames_new->AlterNative1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative1">
<span<?php echo $pres_tradenames_new->AlterNative1->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
	<tr id="r_AlterNative2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative2"><?php echo $pres_tradenames_new->AlterNative2->caption() ?></span></td>
		<td data-name="AlterNative2"<?php echo $pres_tradenames_new->AlterNative2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative2">
<span<?php echo $pres_tradenames_new->AlterNative2->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
	<tr id="r_AlterNative3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative3"><?php echo $pres_tradenames_new->AlterNative3->caption() ?></span></td>
		<td data-name="AlterNative3"<?php echo $pres_tradenames_new->AlterNative3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative3">
<span<?php echo $pres_tradenames_new->AlterNative3->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
	<tr id="r_AlterNative4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative4"><?php echo $pres_tradenames_new->AlterNative4->caption() ?></span></td>
		<td data-name="AlterNative4"<?php echo $pres_tradenames_new->AlterNative4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative4">
<span<?php echo $pres_tradenames_new->AlterNative4->viewAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pres_trade_combination_names_new", explode(",", $pres_tradenames_new->getCurrentDetailTable())) && $pres_trade_combination_names_new->DetailView) {
?>
<?php if ($pres_tradenames_new->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pres_trade_combination_names_new", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pres_trade_combination_names_newgrid.php" ?>
<?php } ?>
</form>
<?php
$pres_tradenames_new_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames_new->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_tradenames_new_view->terminate();
?>