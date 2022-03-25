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
$lab_dept_mast_view = new lab_dept_mast_view();

// Run the page
$lab_dept_mast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_dept_mast_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_dept_mast->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_dept_mastview = currentForm = new ew.Form("flab_dept_mastview", "view");

// Form_CustomValidate event
flab_dept_mastview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_dept_mastview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_dept_mast->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_dept_mast_view->ExportOptions->render("body") ?>
<?php $lab_dept_mast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_dept_mast_view->showPageHeader(); ?>
<?php
$lab_dept_mast_view->showMessage();
?>
<form name="flab_dept_mastview" id="flab_dept_mastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_dept_mast_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_dept_mast_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_dept_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_dept_mast->MainCD->Visible) { // MainCD ?>
	<tr id="r_MainCD">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_MainCD"><?php echo $lab_dept_mast->MainCD->caption() ?></span></td>
		<td data-name="MainCD"<?php echo $lab_dept_mast->MainCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_MainCD">
<span<?php echo $lab_dept_mast->MainCD->viewAttributes() ?>>
<?php echo $lab_dept_mast->MainCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->Code->Visible) { // Code ?>
	<tr id="r_Code">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Code"><?php echo $lab_dept_mast->Code->caption() ?></span></td>
		<td data-name="Code"<?php echo $lab_dept_mast->Code->cellAttributes() ?>>
<span id="el_lab_dept_mast_Code">
<span<?php echo $lab_dept_mast->Code->viewAttributes() ?>>
<?php echo $lab_dept_mast->Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Name"><?php echo $lab_dept_mast->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $lab_dept_mast->Name->cellAttributes() ?>>
<span id="el_lab_dept_mast_Name">
<span<?php echo $lab_dept_mast->Name->viewAttributes() ?>>
<?php echo $lab_dept_mast->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->Order->Visible) { // Order ?>
	<tr id="r_Order">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Order"><?php echo $lab_dept_mast->Order->caption() ?></span></td>
		<td data-name="Order"<?php echo $lab_dept_mast->Order->cellAttributes() ?>>
<span id="el_lab_dept_mast_Order">
<span<?php echo $lab_dept_mast->Order->viewAttributes() ?>>
<?php echo $lab_dept_mast->Order->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->SignCD->Visible) { // SignCD ?>
	<tr id="r_SignCD">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_SignCD"><?php echo $lab_dept_mast->SignCD->caption() ?></span></td>
		<td data-name="SignCD"<?php echo $lab_dept_mast->SignCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_SignCD">
<span<?php echo $lab_dept_mast->SignCD->viewAttributes() ?>>
<?php echo $lab_dept_mast->SignCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->Collection->Visible) { // Collection ?>
	<tr id="r_Collection">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Collection"><?php echo $lab_dept_mast->Collection->caption() ?></span></td>
		<td data-name="Collection"<?php echo $lab_dept_mast->Collection->cellAttributes() ?>>
<span id="el_lab_dept_mast_Collection">
<span<?php echo $lab_dept_mast->Collection->viewAttributes() ?>>
<?php echo $lab_dept_mast->Collection->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_EditDate"><?php echo $lab_dept_mast->EditDate->caption() ?></span></td>
		<td data-name="EditDate"<?php echo $lab_dept_mast->EditDate->cellAttributes() ?>>
<span id="el_lab_dept_mast_EditDate">
<span<?php echo $lab_dept_mast->EditDate->viewAttributes() ?>>
<?php echo $lab_dept_mast->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->SMS->Visible) { // SMS ?>
	<tr id="r_SMS">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_SMS"><?php echo $lab_dept_mast->SMS->caption() ?></span></td>
		<td data-name="SMS"<?php echo $lab_dept_mast->SMS->cellAttributes() ?>>
<span id="el_lab_dept_mast_SMS">
<span<?php echo $lab_dept_mast->SMS->viewAttributes() ?>>
<?php echo $lab_dept_mast->SMS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->Note->Visible) { // Note ?>
	<tr id="r_Note">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Note"><?php echo $lab_dept_mast->Note->caption() ?></span></td>
		<td data-name="Note"<?php echo $lab_dept_mast->Note->cellAttributes() ?>>
<span id="el_lab_dept_mast_Note">
<span<?php echo $lab_dept_mast->Note->viewAttributes() ?>>
<?php echo $lab_dept_mast->Note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->WorkList->Visible) { // WorkList ?>
	<tr id="r_WorkList">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_WorkList"><?php echo $lab_dept_mast->WorkList->caption() ?></span></td>
		<td data-name="WorkList"<?php echo $lab_dept_mast->WorkList->cellAttributes() ?>>
<span id="el_lab_dept_mast_WorkList">
<span<?php echo $lab_dept_mast->WorkList->viewAttributes() ?>>
<?php echo $lab_dept_mast->WorkList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->_Page->Visible) { // Page ?>
	<tr id="r__Page">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast__Page"><?php echo $lab_dept_mast->_Page->caption() ?></span></td>
		<td data-name="_Page"<?php echo $lab_dept_mast->_Page->cellAttributes() ?>>
<span id="el_lab_dept_mast__Page">
<span<?php echo $lab_dept_mast->_Page->viewAttributes() ?>>
<?php echo $lab_dept_mast->_Page->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->Incharge->Visible) { // Incharge ?>
	<tr id="r_Incharge">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Incharge"><?php echo $lab_dept_mast->Incharge->caption() ?></span></td>
		<td data-name="Incharge"<?php echo $lab_dept_mast->Incharge->cellAttributes() ?>>
<span id="el_lab_dept_mast_Incharge">
<span<?php echo $lab_dept_mast->Incharge->viewAttributes() ?>>
<?php echo $lab_dept_mast->Incharge->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->AutoNum->Visible) { // AutoNum ?>
	<tr id="r_AutoNum">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_AutoNum"><?php echo $lab_dept_mast->AutoNum->caption() ?></span></td>
		<td data-name="AutoNum"<?php echo $lab_dept_mast->AutoNum->cellAttributes() ?>>
<span id="el_lab_dept_mast_AutoNum">
<span<?php echo $lab_dept_mast->AutoNum->viewAttributes() ?>>
<?php echo $lab_dept_mast->AutoNum->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_dept_mast->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_dept_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_id"><?php echo $lab_dept_mast->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_dept_mast->id->cellAttributes() ?>>
<span id="el_lab_dept_mast_id">
<span<?php echo $lab_dept_mast->id->viewAttributes() ?>>
<?php echo $lab_dept_mast->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_dept_mast_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_dept_mast->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_dept_mast_view->terminate();
?>