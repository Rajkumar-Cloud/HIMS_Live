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
$patient_emergency_contact_preview = new patient_emergency_contact_preview();

// Run the page
$patient_emergency_contact_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_preview->Page_Render();
?>
<?php $patient_emergency_contact_preview->showPageHeader(); ?>
<?php if ($patient_emergency_contact_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_emergency_contact"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_emergency_contact_preview->renderListOptions();

// Render list options (header, left)
$patient_emergency_contact_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_emergency_contact_preview->id->Visible) { // id ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->id) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->id->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->id->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->id->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->id->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_preview->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->patient_id) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->patient_id->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->patient_id->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->patient_id->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->patient_id->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_preview->name->Visible) { // name ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->name) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->name->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->name->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->name->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->name->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_preview->relationship->Visible) { // relationship ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->relationship) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->relationship->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->relationship->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->relationship->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->relationship->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->relationship->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->relationship->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->relationship->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_preview->telephone->Visible) { // telephone ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->telephone) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->telephone->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->telephone->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->telephone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->telephone->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->telephone->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->telephone->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_preview->address->Visible) { // address ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->address) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->address->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->address->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->address->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->address->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->address->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->address->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->address->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_emergency_contact_preview->status->Visible) { // status ?>
	<?php if ($patient_emergency_contact->SortUrl($patient_emergency_contact_preview->status) == "") { ?>
		<th class="<?php echo $patient_emergency_contact_preview->status->headerCellClass() ?>"><?php echo $patient_emergency_contact_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_emergency_contact_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_emergency_contact_preview->status->Name) ?>" data-sort-order="<?php echo $patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->status->Name && $patient_emergency_contact_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_emergency_contact_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_emergency_contact_preview->SortField == $patient_emergency_contact_preview->status->Name) { ?><?php if ($patient_emergency_contact_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_emergency_contact_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_emergency_contact_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_emergency_contact_preview->RecCount = 0;
$patient_emergency_contact_preview->RowCount = 0;
while ($patient_emergency_contact_preview->Recordset && !$patient_emergency_contact_preview->Recordset->EOF) {

	// Init row class and style
	$patient_emergency_contact_preview->RecCount++;
	$patient_emergency_contact_preview->RowCount++;
	$patient_emergency_contact_preview->CssStyle = "";
	$patient_emergency_contact_preview->loadListRowValues($patient_emergency_contact_preview->Recordset);

	// Render row
	$patient_emergency_contact->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_emergency_contact_preview->resetAttributes();
	$patient_emergency_contact_preview->renderListRow();

	// Render list options
	$patient_emergency_contact_preview->renderListOptions();
?>
	<tr <?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_emergency_contact_preview->ListOptions->render("body", "left", $patient_emergency_contact_preview->RowCount);
?>
<?php if ($patient_emergency_contact_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_emergency_contact_preview->id->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->id->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_preview->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_emergency_contact_preview->patient_id->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->patient_id->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_preview->name->Visible) { // name ?>
		<!-- name -->
		<td<?php echo $patient_emergency_contact_preview->name->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->name->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_preview->relationship->Visible) { // relationship ?>
		<!-- relationship -->
		<td<?php echo $patient_emergency_contact_preview->relationship->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->relationship->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->relationship->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_preview->telephone->Visible) { // telephone ?>
		<!-- telephone -->
		<td<?php echo $patient_emergency_contact_preview->telephone->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->telephone->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->telephone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_preview->address->Visible) { // address ?>
		<!-- address -->
		<td<?php echo $patient_emergency_contact_preview->address->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->address->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->address->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_emergency_contact_preview->status->cellAttributes() ?>>
<span<?php echo $patient_emergency_contact_preview->status->viewAttributes() ?>><?php echo $patient_emergency_contact_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_emergency_contact_preview->ListOptions->render("body", "right", $patient_emergency_contact_preview->RowCount);
?>
	</tr>
<?php
	$patient_emergency_contact_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_emergency_contact_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_emergency_contact_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_emergency_contact_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_emergency_contact_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_emergency_contact_preview->Recordset)
	$patient_emergency_contact_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_emergency_contact_preview->terminate();
?>