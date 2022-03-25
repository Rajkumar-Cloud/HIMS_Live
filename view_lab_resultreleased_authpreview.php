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
WriteHeader(FALSE, "utf-8");

// Create page object
$view_lab_resultreleased_auth_preview = new view_lab_resultreleased_auth_preview();

// Run the page
$view_lab_resultreleased_auth_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_auth_preview->Page_Render();
?>
<?php $view_lab_resultreleased_auth_preview->showPageHeader(); ?>
<div class="card ew-grid view_lab_resultreleased_auth"><!-- .card -->
<?php if ($view_lab_resultreleased_auth_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_lab_resultreleased_auth_preview->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleased_auth_preview->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleased_auth->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->id) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->id->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->id->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->id->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->id->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->PatID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->PatID->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->PatID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->PatID->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->PatID->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->PatientName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->PatientName->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->PatientName->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->PatientName->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->PatientName->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Age) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Age->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Age->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Age->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Age->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Gender) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Gender->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Gender->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Gender->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Gender->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->sid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->sid->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->sid->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->sid->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->sid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->sid->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->ItemCode) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->ItemCode->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->ItemCode->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->ItemCode->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->ItemCode->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->ItemCode->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->DEptCd) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DEptCd->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->DEptCd->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DEptCd->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->DEptCd->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DEptCd->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Resulted) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Resulted->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Resulted->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Resulted->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Resulted->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Resulted->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Services) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Services->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Services->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Services->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Services->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Services->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->LabReport) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->LabReport->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->LabReport->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->LabReport->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->LabReport->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->LabReport->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->LabReport->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->LabReport->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Pic1) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Pic1->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Pic1->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Pic1->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Pic1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Pic1->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Pic2) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Pic2->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Pic2->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Pic2->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Pic2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Pic2->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->TestUnit) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->TestUnit->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->TestUnit->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->TestUnit->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->TestUnit->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->TestUnit->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->RefValue) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->RefValue->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->RefValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->RefValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->RefValue->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->RefValue->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->RefValue->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->RefValue->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Order) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Order->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Order->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Order->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Order->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Order->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Repeated) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Repeated->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Repeated->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Repeated->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Repeated->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Repeated->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Vid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Vid->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Vid->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Vid->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Vid->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Vid->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->invoiceId) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->invoiceId->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->invoiceId->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->invoiceId->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->invoiceId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->invoiceId->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->DrID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DrID->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->DrID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DrID->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->DrID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DrID->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->DrCODE) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DrCODE->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->DrCODE->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DrCODE->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->DrCODE->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DrCODE->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->DrName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DrName->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->DrName->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DrName->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->DrName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->DrName->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->Department) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Department->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->Department->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Department->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->Department->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->Department->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->createddatetime) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->createddatetime->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->createddatetime->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->createddatetime->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->createddatetime->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->createddatetime->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->status) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->status->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->status->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->status->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->status->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->status->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->TestType) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->TestType->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->TestType->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->TestType->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->TestType->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->TestType->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->ResultDate) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->ResultDate->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->ResultDate->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->ResultDate->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->ResultDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->ResultDate->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->ResultedBy) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->ResultedBy->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->ResultedBy->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->ResultedBy->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->ResultedBy->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->ResultedBy->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleased_auth->SortUrl($view_lab_resultreleased_auth->HospID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->HospID->headerCellClass() ?>"><?php echo $view_lab_resultreleased_auth->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_auth->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_lab_resultreleased_auth->HospID->Name ?>" data-sort-order="<?php echo $view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->HospID->Name && $view_lab_resultreleased_auth_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_auth->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_auth_preview->SortField == $view_lab_resultreleased_auth->HospID->Name) { ?><?php if ($view_lab_resultreleased_auth_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_lab_resultreleased_auth_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleased_auth_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_lab_resultreleased_auth_preview->RecCount = 0;
$view_lab_resultreleased_auth_preview->RowCnt = 0;
while ($view_lab_resultreleased_auth_preview->Recordset && !$view_lab_resultreleased_auth_preview->Recordset->EOF) {

	// Init row class and style
	$view_lab_resultreleased_auth_preview->RecCount++;
	$view_lab_resultreleased_auth_preview->RowCnt++;
	$view_lab_resultreleased_auth_preview->CssStyle = "";
	$view_lab_resultreleased_auth_preview->loadListRowValues($view_lab_resultreleased_auth_preview->Recordset);

	// Render row
	$view_lab_resultreleased_auth_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_lab_resultreleased_auth_preview->resetAttributes();
	$view_lab_resultreleased_auth_preview->renderListRow();

	// Render list options
	$view_lab_resultreleased_auth_preview->renderListOptions();
?>
	<tr<?php echo $view_lab_resultreleased_auth_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_auth_preview->ListOptions->render("body", "left", $view_lab_resultreleased_auth_preview->RowCnt);
?>
<?php if ($view_lab_resultreleased_auth->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_lab_resultreleased_auth->id->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->id->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_lab_resultreleased_auth->PatID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->PatID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_lab_resultreleased_auth->PatientName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->PatientName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_lab_resultreleased_auth->Age->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Age->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_lab_resultreleased_auth->Gender->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Gender->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_lab_resultreleased_auth->sid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->sid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_lab_resultreleased_auth->ItemCode->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->ItemCode->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_lab_resultreleased_auth->DEptCd->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->DEptCd->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_lab_resultreleased_auth->Resulted->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Resulted->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_lab_resultreleased_auth->Services->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Services->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->LabReport->Visible) { // LabReport ?>
		<!-- LabReport -->
		<td<?php echo $view_lab_resultreleased_auth->LabReport->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->LabReport->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->LabReport->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_lab_resultreleased_auth->Pic1->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Pic1->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleased_auth->Pic1, $view_lab_resultreleased_auth->Pic1->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_lab_resultreleased_auth->Pic2->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Pic2->viewAttributes() ?>>
<?php echo GetFileViewTag($view_lab_resultreleased_auth->Pic2, $view_lab_resultreleased_auth->Pic2->getViewValue()) ?>
</span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_lab_resultreleased_auth->TestUnit->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->TestUnit->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->RefValue->Visible) { // RefValue ?>
		<!-- RefValue -->
		<td<?php echo $view_lab_resultreleased_auth->RefValue->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->RefValue->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->RefValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_lab_resultreleased_auth->Order->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Order->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_lab_resultreleased_auth->Repeated->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Repeated->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_lab_resultreleased_auth->Vid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Vid->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_lab_resultreleased_auth->invoiceId->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->invoiceId->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_lab_resultreleased_auth->DrID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->DrID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_lab_resultreleased_auth->DrCODE->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->DrCODE->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_lab_resultreleased_auth->DrName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->DrName->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_lab_resultreleased_auth->Department->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->Department->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_lab_resultreleased_auth->createddatetime->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_lab_resultreleased_auth->status->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->status->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_lab_resultreleased_auth->TestType->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->TestType->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_lab_resultreleased_auth->ResultDate->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->ResultDate->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_lab_resultreleased_auth->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->ResultedBy->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_auth->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_lab_resultreleased_auth->HospID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_auth->HospID->viewAttributes() ?>>
<?php echo $view_lab_resultreleased_auth->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_auth_preview->ListOptions->render("body", "right", $view_lab_resultreleased_auth_preview->RowCnt);
?>
	</tr>
<?php
	$view_lab_resultreleased_auth_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_lab_resultreleased_auth_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_lab_resultreleased_auth_preview->Pager)) $view_lab_resultreleased_auth_preview->Pager = new PrevNextPager($view_lab_resultreleased_auth_preview->StartRec, $view_lab_resultreleased_auth_preview->DisplayRecs, $view_lab_resultreleased_auth_preview->TotalRecs) ?>
<?php if ($view_lab_resultreleased_auth_preview->Pager->RecordCount > 0 && $view_lab_resultreleased_auth_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_lab_resultreleased_auth_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_lab_resultreleased_auth_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_lab_resultreleased_auth_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_lab_resultreleased_auth_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_lab_resultreleased_auth_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_lab_resultreleased_auth_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_lab_resultreleased_auth_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_lab_resultreleased_auth_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_resultreleased_auth_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_resultreleased_auth_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_resultreleased_auth_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_lab_resultreleased_auth_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_lab_resultreleased_auth_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($view_lab_resultreleased_auth_preview->Recordset)
	$view_lab_resultreleased_auth_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_lab_resultreleased_auth_preview->terminate();
?>