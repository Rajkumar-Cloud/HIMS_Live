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
WriteHeader(FALSE, "utf-8");

// Create page object
$view_lab_resultreleased_preview = new view_lab_resultreleased_preview();

// Run the page
$view_lab_resultreleased_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_preview->Page_Render();
?>
<?php $view_lab_resultreleased_preview->showPageHeader(); ?>
<?php if ($view_lab_resultreleased_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_lab_resultreleased"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_lab_resultreleased_preview->renderListOptions();

// Render list options (header, left)
$view_lab_resultreleased_preview->ListOptions->render("header", "left");
?>
<?php if ($view_lab_resultreleased_preview->id->Visible) { // id ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->id) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->id->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->id->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->id->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->id->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->PatID->Visible) { // PatID ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->PatID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->PatID->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->PatID->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->PatID->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->PatID->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->PatientName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->PatientName->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->PatientName->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->PatientName->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->PatientName->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Age->Visible) { // Age ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Age) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Age->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Age->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Age->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Age->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Gender) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Gender->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Gender->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Gender->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Gender->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->sid->Visible) { // sid ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->sid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->sid->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->sid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->sid->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->sid->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->sid->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->ItemCode) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->ItemCode->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->ItemCode->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->ItemCode->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->ItemCode->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->ItemCode->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->DEptCd) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DEptCd->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->DEptCd->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->DEptCd->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DEptCd->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DEptCd->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Resulted->Visible) { // Resulted ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Resulted) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Resulted->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Resulted->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Resulted->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Resulted->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Resulted->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Services->Visible) { // Services ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Services) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Services->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Services->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Services->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Services->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Services->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->LabReport->Visible) { // LabReport ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->LabReport) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->LabReport->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->LabReport->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->LabReport->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->LabReport->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->LabReport->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->LabReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->LabReport->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Pic1) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Pic1->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Pic1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Pic1->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Pic1->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Pic1->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Pic2) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Pic2->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Pic2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Pic2->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Pic2->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Pic2->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->TestUnit) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->TestUnit->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->TestUnit->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->TestUnit->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->TestUnit->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->TestUnit->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->RefValue->Visible) { // RefValue ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->RefValue) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->RefValue->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->RefValue->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->RefValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->RefValue->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->RefValue->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->RefValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->RefValue->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Order->Visible) { // Order ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Order) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Order->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Order->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Order->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Order->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Order->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Repeated->Visible) { // Repeated ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Repeated) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Repeated->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Repeated->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Repeated->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Repeated->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Repeated->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Vid->Visible) { // Vid ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Vid) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Vid->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Vid->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Vid->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Vid->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Vid->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->invoiceId) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->invoiceId->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->invoiceId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->invoiceId->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->invoiceId->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->invoiceId->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DrID->Visible) { // DrID ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->DrID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DrID->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->DrID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->DrID->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DrID->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DrID->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->DrCODE) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DrCODE->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->DrCODE->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->DrCODE->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DrCODE->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DrCODE->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DrName->Visible) { // DrName ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->DrName) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DrName->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->DrName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->DrName->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DrName->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->DrName->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Department->Visible) { // Department ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->Department) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Department->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->Department->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->Department->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Department->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->Department->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->createddatetime) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->createddatetime->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->createddatetime->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->createddatetime->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->status->Visible) { // status ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->status) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->status->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->status->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->status->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->status->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->TestType->Visible) { // TestType ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->TestType) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->TestType->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->TestType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->TestType->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->TestType->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->TestType->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->ResultDate) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->ResultDate->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->ResultDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->ResultDate->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->ResultDate->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->ResultDate->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->ResultedBy) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->ResultedBy->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->ResultedBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->ResultedBy->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->ResultedBy->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->ResultedBy->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_resultreleased->SortUrl($view_lab_resultreleased_preview->HospID) == "") { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->HospID->headerCellClass() ?>"><?php echo $view_lab_resultreleased_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_lab_resultreleased_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_lab_resultreleased_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->HospID->Name && $view_lab_resultreleased_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_resultreleased_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_resultreleased_preview->SortField == $view_lab_resultreleased_preview->HospID->Name) { ?><?php if ($view_lab_resultreleased_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_resultreleased_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_resultreleased_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_lab_resultreleased_preview->RecCount = 0;
$view_lab_resultreleased_preview->RowCount = 0;
while ($view_lab_resultreleased_preview->Recordset && !$view_lab_resultreleased_preview->Recordset->EOF) {

	// Init row class and style
	$view_lab_resultreleased_preview->RecCount++;
	$view_lab_resultreleased_preview->RowCount++;
	$view_lab_resultreleased_preview->CssStyle = "";
	$view_lab_resultreleased_preview->loadListRowValues($view_lab_resultreleased_preview->Recordset);

	// Render row
	$view_lab_resultreleased->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_lab_resultreleased_preview->resetAttributes();
	$view_lab_resultreleased_preview->renderListRow();

	// Render list options
	$view_lab_resultreleased_preview->renderListOptions();
?>
	<tr <?php echo $view_lab_resultreleased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_resultreleased_preview->ListOptions->render("body", "left", $view_lab_resultreleased_preview->RowCount);
?>
<?php if ($view_lab_resultreleased_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $view_lab_resultreleased_preview->id->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->id->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $view_lab_resultreleased_preview->PatID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->PatID->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $view_lab_resultreleased_preview->PatientName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->PatientName->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $view_lab_resultreleased_preview->Age->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Age->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $view_lab_resultreleased_preview->Gender->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Gender->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->sid->Visible) { // sid ?>
		<!-- sid -->
		<td<?php echo $view_lab_resultreleased_preview->sid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->sid->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->ItemCode->Visible) { // ItemCode ?>
		<!-- ItemCode -->
		<td<?php echo $view_lab_resultreleased_preview->ItemCode->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->ItemCode->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DEptCd->Visible) { // DEptCd ?>
		<!-- DEptCd -->
		<td<?php echo $view_lab_resultreleased_preview->DEptCd->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->DEptCd->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Resulted->Visible) { // Resulted ?>
		<!-- Resulted -->
		<td<?php echo $view_lab_resultreleased_preview->Resulted->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Resulted->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Services->Visible) { // Services ?>
		<!-- Services -->
		<td<?php echo $view_lab_resultreleased_preview->Services->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Services->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->LabReport->Visible) { // LabReport ?>
		<!-- LabReport -->
		<td<?php echo $view_lab_resultreleased_preview->LabReport->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->LabReport->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->LabReport->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Pic1->Visible) { // Pic1 ?>
		<!-- Pic1 -->
		<td<?php echo $view_lab_resultreleased_preview->Pic1->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Pic1->viewAttributes() ?>><?php echo GetFileViewTag($view_lab_resultreleased_preview->Pic1, $view_lab_resultreleased_preview->Pic1->getViewValue(), FALSE) ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Pic2->Visible) { // Pic2 ?>
		<!-- Pic2 -->
		<td<?php echo $view_lab_resultreleased_preview->Pic2->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Pic2->viewAttributes() ?>><?php echo GetFileViewTag($view_lab_resultreleased_preview->Pic2, $view_lab_resultreleased_preview->Pic2->getViewValue(), FALSE) ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->TestUnit->Visible) { // TestUnit ?>
		<!-- TestUnit -->
		<td<?php echo $view_lab_resultreleased_preview->TestUnit->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->TestUnit->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->RefValue->Visible) { // RefValue ?>
		<!-- RefValue -->
		<td<?php echo $view_lab_resultreleased_preview->RefValue->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->RefValue->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->RefValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Order->Visible) { // Order ?>
		<!-- Order -->
		<td<?php echo $view_lab_resultreleased_preview->Order->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Order->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Repeated->Visible) { // Repeated ?>
		<!-- Repeated -->
		<td<?php echo $view_lab_resultreleased_preview->Repeated->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Repeated->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Vid->Visible) { // Vid ?>
		<!-- Vid -->
		<td<?php echo $view_lab_resultreleased_preview->Vid->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Vid->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->invoiceId->Visible) { // invoiceId ?>
		<!-- invoiceId -->
		<td<?php echo $view_lab_resultreleased_preview->invoiceId->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->invoiceId->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DrID->Visible) { // DrID ?>
		<!-- DrID -->
		<td<?php echo $view_lab_resultreleased_preview->DrID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->DrID->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DrCODE->Visible) { // DrCODE ?>
		<!-- DrCODE -->
		<td<?php echo $view_lab_resultreleased_preview->DrCODE->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->DrCODE->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->DrName->Visible) { // DrName ?>
		<!-- DrName -->
		<td<?php echo $view_lab_resultreleased_preview->DrName->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->DrName->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->Department->Visible) { // Department ?>
		<!-- Department -->
		<td<?php echo $view_lab_resultreleased_preview->Department->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->Department->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $view_lab_resultreleased_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->createddatetime->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $view_lab_resultreleased_preview->status->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->status->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->TestType->Visible) { // TestType ?>
		<!-- TestType -->
		<td<?php echo $view_lab_resultreleased_preview->TestType->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->TestType->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->ResultDate->Visible) { // ResultDate ?>
		<!-- ResultDate -->
		<td<?php echo $view_lab_resultreleased_preview->ResultDate->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->ResultDate->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->ResultedBy->Visible) { // ResultedBy ?>
		<!-- ResultedBy -->
		<td<?php echo $view_lab_resultreleased_preview->ResultedBy->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->ResultedBy->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_lab_resultreleased_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_lab_resultreleased_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_lab_resultreleased_preview->HospID->viewAttributes() ?>><?php echo $view_lab_resultreleased_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_lab_resultreleased_preview->ListOptions->render("body", "right", $view_lab_resultreleased_preview->RowCount);
?>
	</tr>
<?php
	$view_lab_resultreleased_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_lab_resultreleased_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_lab_resultreleased_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_lab_resultreleased_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_lab_resultreleased_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_lab_resultreleased_preview->Recordset)
	$view_lab_resultreleased_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_lab_resultreleased_preview->terminate();
?>