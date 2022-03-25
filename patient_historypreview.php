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
$patient_history_preview = new patient_history_preview();

// Run the page
$patient_history_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_preview->Page_Render();
?>
<?php $patient_history_preview->showPageHeader(); ?>
<div class="card ew-grid patient_history"><!-- .card -->
<?php if ($patient_history_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_history_preview->renderListOptions();

// Render list options (header, left)
$patient_history_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_history->id->Visible) { // id ?>
	<?php if ($patient_history->SortUrl($patient_history->id) == "") { ?>
		<th class="<?php echo $patient_history->id->headerCellClass() ?>"><?php echo $patient_history->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->id->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->id->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->id->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_history->SortUrl($patient_history->mrnno) == "") { ?>
		<th class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><?php echo $patient_history->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->mrnno->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->mrnno->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->mrnno->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_history->SortUrl($patient_history->PatientName) == "") { ?>
		<th class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><?php echo $patient_history->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->PatientName->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->PatientName->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->PatientName->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_history->SortUrl($patient_history->PatientId) == "") { ?>
		<th class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><?php echo $patient_history->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->PatientId->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->PatientId->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->PatientId->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_history->SortUrl($patient_history->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><?php echo $patient_history->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->MobileNumber->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->MobileNumber->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_history->SortUrl($patient_history->MaritalHistory) == "") { ?>
		<th class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><?php echo $patient_history->MaritalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->MaritalHistory->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->MaritalHistory->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->MaritalHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->MaritalHistory->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_history->SortUrl($patient_history->MenstrualHistory) == "") { ?>
		<th class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><?php echo $patient_history->MenstrualHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->MenstrualHistory->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->MenstrualHistory->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->MenstrualHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->MenstrualHistory->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_history->SortUrl($patient_history->ObstetricHistory) == "") { ?>
		<th class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><?php echo $patient_history->ObstetricHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->ObstetricHistory->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->ObstetricHistory->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->ObstetricHistory->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->ObstetricHistory->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
	<?php if ($patient_history->SortUrl($patient_history->Age) == "") { ?>
		<th class="<?php echo $patient_history->Age->headerCellClass() ?>"><?php echo $patient_history->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->Age->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->Age->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->Age->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
	<?php if ($patient_history->SortUrl($patient_history->Gender) == "") { ?>
		<th class="<?php echo $patient_history->Gender->headerCellClass() ?>"><?php echo $patient_history->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->Gender->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->Gender->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->Gender->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
	<?php if ($patient_history->SortUrl($patient_history->PatID) == "") { ?>
		<th class="<?php echo $patient_history->PatID->headerCellClass() ?>"><?php echo $patient_history->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->PatID->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->PatID->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->PatID->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
	<?php if ($patient_history->SortUrl($patient_history->Reception) == "") { ?>
		<th class="<?php echo $patient_history->Reception->headerCellClass() ?>"><?php echo $patient_history->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->Reception->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->Reception->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->Reception->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
	<?php if ($patient_history->SortUrl($patient_history->HospID) == "") { ?>
		<th class="<?php echo $patient_history->HospID->headerCellClass() ?>"><?php echo $patient_history->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_history->HospID->Name ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history->HospID->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_history->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history->HospID->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_history_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_history_preview->RecCount = 0;
$patient_history_preview->RowCnt = 0;
while ($patient_history_preview->Recordset && !$patient_history_preview->Recordset->EOF) {

	// Init row class and style
	$patient_history_preview->RecCount++;
	$patient_history_preview->RowCnt++;
	$patient_history_preview->CssStyle = "";
	$patient_history_preview->loadListRowValues($patient_history_preview->Recordset);

	// Render row
	$patient_history_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_history_preview->resetAttributes();
	$patient_history_preview->renderListRow();

	// Render list options
	$patient_history_preview->renderListOptions();
?>
	<tr<?php echo $patient_history_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_history_preview->ListOptions->render("body", "left", $patient_history_preview->RowCnt);
?>
<?php if ($patient_history->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_history->id->cellAttributes() ?>>
<span<?php echo $patient_history->id->viewAttributes() ?>>
<?php echo $patient_history->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_history->mrnno->cellAttributes() ?>>
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<?php echo $patient_history->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_history->PatientName->cellAttributes() ?>>
<span<?php echo $patient_history->PatientName->viewAttributes() ?>>
<?php echo $patient_history->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_history->PatientId->cellAttributes() ?>>
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<?php echo $patient_history->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_history->MobileNumber->viewAttributes() ?>>
<?php echo $patient_history->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
		<!-- MaritalHistory -->
		<td<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
<span<?php echo $patient_history->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_history->MaritalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<!-- MenstrualHistory -->
		<td<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
<span<?php echo $patient_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_history->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<!-- ObstetricHistory -->
		<td<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
<span<?php echo $patient_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_history->ObstetricHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_history->Age->cellAttributes() ?>>
<span<?php echo $patient_history->Age->viewAttributes() ?>>
<?php echo $patient_history->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_history->Gender->cellAttributes() ?>>
<span<?php echo $patient_history->Gender->viewAttributes() ?>>
<?php echo $patient_history->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_history->PatID->cellAttributes() ?>>
<span<?php echo $patient_history->PatID->viewAttributes() ?>>
<?php echo $patient_history->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_history->Reception->cellAttributes() ?>>
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<?php echo $patient_history->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_history->HospID->cellAttributes() ?>>
<span<?php echo $patient_history->HospID->viewAttributes() ?>>
<?php echo $patient_history->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_history_preview->ListOptions->render("body", "right", $patient_history_preview->RowCnt);
?>
	</tr>
<?php
	$patient_history_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_history_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_history_preview->Pager)) $patient_history_preview->Pager = new PrevNextPager($patient_history_preview->StartRec, $patient_history_preview->DisplayRecs, $patient_history_preview->TotalRecs) ?>
<?php if ($patient_history_preview->Pager->RecordCount > 0 && $patient_history_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_history_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_history_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_history_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_history_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_history_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_history_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_history_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_history_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_history_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_history_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_history_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_history_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_history_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_history_preview->Recordset)
	$patient_history_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_history_preview->terminate();
?>