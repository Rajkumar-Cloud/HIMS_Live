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
$patient_insurance_preview = new patient_insurance_preview();

// Run the page
$patient_insurance_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_preview->Page_Render();
?>
<?php $patient_insurance_preview->showPageHeader(); ?>
<?php if ($patient_insurance_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_insurance"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_insurance_preview->renderListOptions();

// Render list options (header, left)
$patient_insurance_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_insurance_preview->id->Visible) { // id ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->id) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->id->headerCellClass() ?>"><?php echo $patient_insurance_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->id->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->id->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->id->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->Reception->headerCellClass() ?>"><?php echo $patient_insurance_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->Reception->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->Reception->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->PatientId->headerCellClass() ?>"><?php echo $patient_insurance_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->PatientId->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->PatientId->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->PatientName->headerCellClass() ?>"><?php echo $patient_insurance_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->PatientName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->PatientName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->Company->Visible) { // Company ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->Company) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->Company->headerCellClass() ?>"><?php echo $patient_insurance_preview->Company->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->Company->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->Company->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->Company->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->Company->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->Company->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->AddressInsuranceCarierName) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->AddressInsuranceCarierName->headerCellClass() ?>"><?php echo $patient_insurance_preview->AddressInsuranceCarierName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->AddressInsuranceCarierName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->AddressInsuranceCarierName->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->AddressInsuranceCarierName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->AddressInsuranceCarierName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->AddressInsuranceCarierName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->ContactName->Visible) { // ContactName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->ContactName) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->ContactName->headerCellClass() ?>"><?php echo $patient_insurance_preview->ContactName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->ContactName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->ContactName->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->ContactName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->ContactName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->ContactName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->ContactMobile->Visible) { // ContactMobile ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->ContactMobile) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->ContactMobile->headerCellClass() ?>"><?php echo $patient_insurance_preview->ContactMobile->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->ContactMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->ContactMobile->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->ContactMobile->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->ContactMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->ContactMobile->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyType->Visible) { // PolicyType ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->PolicyType) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyType->headerCellClass() ?>"><?php echo $patient_insurance_preview->PolicyType->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->PolicyType->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->PolicyType->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->PolicyType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->PolicyType->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyName->Visible) { // PolicyName ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->PolicyName) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyName->headerCellClass() ?>"><?php echo $patient_insurance_preview->PolicyName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->PolicyName->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->PolicyName->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->PolicyName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->PolicyName->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyNo->Visible) { // PolicyNo ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->PolicyNo) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyNo->headerCellClass() ?>"><?php echo $patient_insurance_preview->PolicyNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->PolicyNo->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->PolicyNo->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->PolicyNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->PolicyNo->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyAmount->Visible) { // PolicyAmount ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->PolicyAmount) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyAmount->headerCellClass() ?>"><?php echo $patient_insurance_preview->PolicyAmount->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->PolicyAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->PolicyAmount->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->PolicyAmount->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->PolicyAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->PolicyAmount->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->RefLetterNo->Visible) { // RefLetterNo ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->RefLetterNo) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->RefLetterNo->headerCellClass() ?>"><?php echo $patient_insurance_preview->RefLetterNo->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->RefLetterNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->RefLetterNo->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->RefLetterNo->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->RefLetterNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->RefLetterNo->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->ReferenceBy->Visible) { // ReferenceBy ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->ReferenceBy) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->ReferenceBy->headerCellClass() ?>"><?php echo $patient_insurance_preview->ReferenceBy->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->ReferenceBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->ReferenceBy->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->ReferenceBy->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->ReferenceBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->ReferenceBy->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->ReferenceDate->Visible) { // ReferenceDate ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->ReferenceDate) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->ReferenceDate->headerCellClass() ?>"><?php echo $patient_insurance_preview->ReferenceDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->ReferenceDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->ReferenceDate->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->ReferenceDate->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->ReferenceDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->ReferenceDate->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->createdby->Visible) { // createdby ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->createdby) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->createdby->headerCellClass() ?>"><?php echo $patient_insurance_preview->createdby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->createdby->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->createdby->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->createdby->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->createddatetime) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->createddatetime->headerCellClass() ?>"><?php echo $patient_insurance_preview->createddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->createddatetime->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->createddatetime->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->createddatetime->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->modifiedby) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->modifiedby->headerCellClass() ?>"><?php echo $patient_insurance_preview->modifiedby->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->modifiedby->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->modifiedby->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->modifiedby->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->modifieddatetime) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->modifieddatetime->headerCellClass() ?>"><?php echo $patient_insurance_preview->modifieddatetime->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->modifieddatetime->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->modifieddatetime->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->modifieddatetime->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_insurance->SortUrl($patient_insurance_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_insurance_preview->mrnno->headerCellClass() ?>"><?php echo $patient_insurance_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_insurance_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_insurance_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_insurance_preview->SortField == $patient_insurance_preview->mrnno->Name && $patient_insurance_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance_preview->SortField == $patient_insurance_preview->mrnno->Name) { ?><?php if ($patient_insurance_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_insurance_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_insurance_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_insurance_preview->RecCount = 0;
$patient_insurance_preview->RowCount = 0;
while ($patient_insurance_preview->Recordset && !$patient_insurance_preview->Recordset->EOF) {

	// Init row class and style
	$patient_insurance_preview->RecCount++;
	$patient_insurance_preview->RowCount++;
	$patient_insurance_preview->CssStyle = "";
	$patient_insurance_preview->loadListRowValues($patient_insurance_preview->Recordset);

	// Render row
	$patient_insurance->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_insurance_preview->resetAttributes();
	$patient_insurance_preview->renderListRow();

	// Render list options
	$patient_insurance_preview->renderListOptions();
?>
	<tr <?php echo $patient_insurance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_insurance_preview->ListOptions->render("body", "left", $patient_insurance_preview->RowCount);
?>
<?php if ($patient_insurance_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_insurance_preview->id->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->id->viewAttributes() ?>><?php echo $patient_insurance_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_insurance_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->Reception->viewAttributes() ?>><?php echo $patient_insurance_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_insurance_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->PatientId->viewAttributes() ?>><?php echo $patient_insurance_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_insurance_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->PatientName->viewAttributes() ?>><?php echo $patient_insurance_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->Company->Visible) { // Company ?>
		<!-- Company -->
		<td<?php echo $patient_insurance_preview->Company->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->Company->viewAttributes() ?>><?php echo $patient_insurance_preview->Company->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<!-- AddressInsuranceCarierName -->
		<td<?php echo $patient_insurance_preview->AddressInsuranceCarierName->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->AddressInsuranceCarierName->viewAttributes() ?>><?php echo $patient_insurance_preview->AddressInsuranceCarierName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->ContactName->Visible) { // ContactName ?>
		<!-- ContactName -->
		<td<?php echo $patient_insurance_preview->ContactName->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->ContactName->viewAttributes() ?>><?php echo $patient_insurance_preview->ContactName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->ContactMobile->Visible) { // ContactMobile ?>
		<!-- ContactMobile -->
		<td<?php echo $patient_insurance_preview->ContactMobile->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->ContactMobile->viewAttributes() ?>><?php echo $patient_insurance_preview->ContactMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyType->Visible) { // PolicyType ?>
		<!-- PolicyType -->
		<td<?php echo $patient_insurance_preview->PolicyType->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->PolicyType->viewAttributes() ?>><?php echo $patient_insurance_preview->PolicyType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyName->Visible) { // PolicyName ?>
		<!-- PolicyName -->
		<td<?php echo $patient_insurance_preview->PolicyName->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->PolicyName->viewAttributes() ?>><?php echo $patient_insurance_preview->PolicyName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyNo->Visible) { // PolicyNo ?>
		<!-- PolicyNo -->
		<td<?php echo $patient_insurance_preview->PolicyNo->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->PolicyNo->viewAttributes() ?>><?php echo $patient_insurance_preview->PolicyNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->PolicyAmount->Visible) { // PolicyAmount ?>
		<!-- PolicyAmount -->
		<td<?php echo $patient_insurance_preview->PolicyAmount->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->PolicyAmount->viewAttributes() ?>><?php echo $patient_insurance_preview->PolicyAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->RefLetterNo->Visible) { // RefLetterNo ?>
		<!-- RefLetterNo -->
		<td<?php echo $patient_insurance_preview->RefLetterNo->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->RefLetterNo->viewAttributes() ?>><?php echo $patient_insurance_preview->RefLetterNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->ReferenceBy->Visible) { // ReferenceBy ?>
		<!-- ReferenceBy -->
		<td<?php echo $patient_insurance_preview->ReferenceBy->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->ReferenceBy->viewAttributes() ?>><?php echo $patient_insurance_preview->ReferenceBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->ReferenceDate->Visible) { // ReferenceDate ?>
		<!-- ReferenceDate -->
		<td<?php echo $patient_insurance_preview->ReferenceDate->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->ReferenceDate->viewAttributes() ?>><?php echo $patient_insurance_preview->ReferenceDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->createdby->Visible) { // createdby ?>
		<!-- createdby -->
		<td<?php echo $patient_insurance_preview->createdby->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->createdby->viewAttributes() ?>><?php echo $patient_insurance_preview->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->createddatetime->Visible) { // createddatetime ?>
		<!-- createddatetime -->
		<td<?php echo $patient_insurance_preview->createddatetime->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->createddatetime->viewAttributes() ?>><?php echo $patient_insurance_preview->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->modifiedby->Visible) { // modifiedby ?>
		<!-- modifiedby -->
		<td<?php echo $patient_insurance_preview->modifiedby->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->modifiedby->viewAttributes() ?>><?php echo $patient_insurance_preview->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->modifieddatetime->Visible) { // modifieddatetime ?>
		<!-- modifieddatetime -->
		<td<?php echo $patient_insurance_preview->modifieddatetime->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->modifieddatetime->viewAttributes() ?>><?php echo $patient_insurance_preview->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_insurance_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_insurance_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_insurance_preview->mrnno->viewAttributes() ?>><?php echo $patient_insurance_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_insurance_preview->ListOptions->render("body", "right", $patient_insurance_preview->RowCount);
?>
	</tr>
<?php
	$patient_insurance_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_insurance_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_insurance_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_insurance_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_insurance_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_insurance_preview->Recordset)
	$patient_insurance_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_insurance_preview->terminate();
?>