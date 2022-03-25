<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class (patientdashboard_summary)
 */
class patientdashboard_summary extends patientdashboard
{

	// Page ID
	public $PageID = 'summary';

	// Project ID
	public $ProjectID = "{758F4792-112B-4545-BC16-BF571BA72FA2}";

	// Page object name
	public $PageObjName = 'patientdashboard_summary';
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Page headings
	public $Heading = '';
	public $Subheading = '';
	public $PageHeader;
	public $PageFooter;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportPdfUrl;
	public $ExportEmailUrl;

	// CSS
	public $ReportTableClass = "";
	public $ReportTableStyle = "";

	// Custom export
	public $ExportPrintCustom = FALSE;
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Page heading
	public function pageHeading()
	{
		global $ReportLanguage;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "TableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $ReportLanguage;
		if ($this->Subheading <> "")
			return $this->Subheading;
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$pageUrl = CurrentPageName() . "?";
		if ($this->UseTokenInUrl) $pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}

	// Get failure message
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}

	// Get success message
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}

	// Get warning message
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") // Fotoer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
	}

	// Validate page request
	public function isPageRequest()
	{
		if ($this->UseTokenInUrl) {
			if (IsPost())
				return ($this->TableVar == Post("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $ReportLanguage, $DashboardReport;
		global $UserTable, $UserTableConn;

		// Initialize
		if (!$DashboardReport)
			$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		$ReportLanguage = new ReportLanguage();
		if ($Language === NULL)
			$Language = $ReportLanguage;

		// Parent constuctor
		parent::__construct();

		// Table object (patientdashboard)
		if (!isset($GLOBALS["patientdashboard"])) {
			$GLOBALS["patientdashboard"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patientdashboard"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportEmailUrl = $this->pageUrl() . "export=email";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'summary');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patientdashboard');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (user_login_base)
		if (!isset($UserTable)) {
			$UserTable = new user_login_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Search options
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option fpatientdashboardsummary";

		// Generate report options
		$this->GenerateOptions = new ListOptions();
		$this->GenerateOptions->Tag = "div";
		$this->GenerateOptions->TagClassName = "ew-generate-option";
	}

	// Get export HTML tag
	public function getExportTag($type, $custom = FALSE)
	{
		global $ReportLanguage;
		$exportId = session_id();
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportExcelUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("ExportToExcel") . "</a>";
			else
				return "<a class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" href=\"" . $this->ExportExcelUrl . "\">" . $ReportLanguage->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportWordUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("ExportToWord") . "</a>";
			else
				return "<a class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" href=\"" . $this->ExportWordUrl . "\">" . $ReportLanguage->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "print")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPrintUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("PrinterFriendly") . "</a>";
			else
				return "<a class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly"), TRUE) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" href=\"" . $this->ExportPrintUrl . "\">" . $ReportLanguage->phrase("PrinterFriendly") . "</a>";
		} elseif (SameText($type, "pdf")) {
			return "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"" . $this->ExportPdfUrl . "\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "email")) {
			return "<a class=\"ew-export-link ew-email\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" id=\"emf_patientdashboard\" href=\"#\" onclick=\"ew.emailDialogShow({ lnk: 'emf_patientdashboard', hdr: ew.language.phrase('ExportToEmail'), url: '$this->ExportEmailUrl', exportid: '$exportId', el: this }); return false;\">" . $ReportLanguage->phrase("ExportToEmail") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Security, $ReportLanguage, $ReportOptions;
		$exportId = session_id();
		$reportTypes = [];

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = TRUE;
		$reportTypes["print"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPrint") : "";

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;
		$reportTypes["excel"] = $item->Visible ? $ReportLanguage->phrase("ReportFormExcel") : "";

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = TRUE;
		$reportTypes["word"] = $item->Visible ? $ReportLanguage->phrase("ReportFormWord") : "";

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;
		$item->Visible = TRUE;
		$reportTypes["pdf"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPdf") : "";

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = TRUE;
		$reportTypes["email"] = $item->Visible ? $ReportLanguage->phrase("ReportFormEmail") : "";

		// Report types
		$ReportOptions["ReportTypes"] = $reportTypes;

		// Drop down button for export
		$this->ExportOptions->UseDropDownButton = FALSE;
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseImageAndText = $this->ExportOptions->UseDropDownButton;
		$this->ExportOptions->DropDownButtonPhrase = $ReportLanguage->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatientdashboardsummary\" href=\"#\">" . $ReportLanguage->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatientdashboardsummary\" href=\"#\">" . $ReportLanguage->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton; // v8
		$this->FilterOptions->DropDownButtonPhrase = $ReportLanguage->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Set up export options (extended)
		$this->setupExportOptionsExt();

		// Hide options for export
		if ($this->isExport()) {
			$this->ExportOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}

		// Set up table class
		if ($this->isExport("word") || $this->isExport("excel") || $this->isExport("pdf"))
			$this->ReportTableClass = "ew-table";
		else
			$this->ReportTableClass = "table ew-table";
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $ReportLanguage;

		// Filter panel button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = $this->FilterApplied ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fpatientdashboardsummary\">" . $ReportLanguage->phrase("SearchBtn") . "</button>";
		$item->Visible = FALSE;

		// Reset filter
		$item = &$this->SearchOptions->add("resetfilter");
		$item->Body = "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" onclick=\"location='" . CurrentPageName() . "?cmd=reset'\">" . $ReportLanguage->phrase("ResetAllFilter") . "</button>";
		$item->Visible = FALSE && $this->FilterApplied;

		// Button group for reset filter
		$this->SearchOptions->UseButtonGroup = TRUE;

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide options for export
		if ($this->isExport())
			$this->SearchOptions->hideAllOptions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ReportLanguage, $EXPORT_REPORT, $ExportFileName, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		if ($this->isExport() && array_key_exists($this->Export, $EXPORT_REPORT)) {
			$content = ob_get_contents();
			if (ob_get_length())
				ob_end_clean();

			// Remove all <div data-tagid="..." id="orig..." class="hide">...</div> (for customviewtag export, except "googlemaps")
			if (preg_match_all('/<div\s+data-tagid=[\'"]([\s\S]*?)[\'"]\s+id=[\'"]orig([\s\S]*?)[\'"]\s+class\s*=\s*[\'"]hide[\'"]>([\s\S]*?)<\/div\s*>/i', $content, $divmatches, PREG_SET_ORDER)) {
				foreach ($divmatches as $divmatch) {
					if ($divmatch[1] <> "googlemaps")
						$content = str_replace($divmatch[0], "", $content);
				}
			}
			$fn = $EXPORT_REPORT[$this->Export];
			$saveResponse = $this->$fn($content);
			if (ReportParam("generaterequest") === TRUE) { // Generate report request
				$this->writeGenResponse($saveResponse);
				$url = ""; // Avoid redirect
			}
		}

		// Close connection if not in dashboard
		if (!$DashboardReport)
			CloseConnections();

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			header("Location: " . $url);
		}
		if (!$DashboardReport)
			exit();
	}

	// Initialize common variables
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $FilterOptions; // Filter options

	// Recordset
	public $GroupRecordset = NULL;
	public $Recordset = NULL;
	public $DetailRecordCount = 0;

	// Paging variables
	public $RecordIndex = 0; // Record index
	public $RecordCount = 0; // Record count
	public $StartGroup = 0; // Start group
	public $StopGroup = 0; // Stop group
	public $TotalGroups = 0; // Total groups
	public $GroupCount = 0; // Group count
	public $GroupCounter = []; // Group counter
	public $DisplayGroups = 3; // Groups per page
	public $GroupRange = 10;
	public $Sort = "";
	public $Filter = "";
	public $PageFirstGroupFilter = "";
	public $UserIDFilter = "";
	public $DrillDown = FALSE;
	public $DrillDownInPanel = FALSE;
	public $DrillDownList = "";

	// Clear field for ext filter
	public $ExpiredExtendedFilter = "";
	public $PopupName = "";
	public $PopupValue = "";
	public $FilterApplied;
	public $SearchCommand = FALSE;
	public $ShowHeader;
	public $GroupColumnCount = 0;
	public $SubGroupColumnCount = 0;
	public $DetailColumnCount = 0;
	public $Counts;
	public $Columns;
	public $Values;
	public $Summaries;
	public $Minimums;
	public $Maximums;
	public $GrandCounts;
	public $GrandSummaries;
	public $GrandMinimums;
	public $GrandMaximums;
	public $TotalCount;
	public $GrandSummarySetup = FALSE;
	public $GroupIndexes;
	public $DetailRows = [];
	public $TopContentClass = "col-sm-12 ew-top";
	public $LeftContentClass = "ew-left";
	public $CenterContentClass = "col-sm-12 ew-center";
	public $RightContentClass = "ew-right";
	public $BottomContentClass = "col-sm-12 ew-bottom";

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $ExportFileName, $ReportLanguage, $Security, $UserProfile,
			$Security, $FormError, $DrillDownInPanel, $Breadcrumb, $ReportLanguage,
			$DashboardReport, $CustomExportType;
		global $ReportLanguage;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		if (!$Security->isLoggedIn()) $Security->autoLogin(); // Auto login
		$Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel($this->ProjectID . 'patientdashboard');
		$Security->TablePermission_Loaded();
		if (!$Security->canList()) {
			$Security->saveLastUrl();
			$this->setFailureMessage(DeniedMessage()); // Set no permission
			$this->terminate(GetUrl("index.php"));
		}

		// Get export parameters
		if (ReportParam("export") !== NULL)
			$this->Export = strtolower(ReportParam("export"));
		$ExportType = $this->Export; // Get export parameter, used in header
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Setup placeholder
		// Setup export options

		$this->setupExportOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			echo $ReportLanguage->phrase("InvalidPostRequest");
			$this->terminate();
			exit();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Set field visibility for detail fields

		$this->WhereDidYouHear->setVisibility();
		$this->street->setVisibility();
		$this->town->setVisibility();
		$this->province->setVisibility();
		$this->country->setVisibility();
		$this->postal_code->setVisibility();
		$this->PEmail->setVisibility();
		$this->PEmergencyContact->setVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$fieldCount = 9;
		$groupCount = 2;
		$this->Values = &InitArray($fieldCount, 0);
		$this->Counts = &Init2DArray($groupCount, $fieldCount, 0);
		$this->Summaries = &Init2DArray($groupCount, $fieldCount, 0);
		$this->Minimums = &Init2DArray($groupCount, $fieldCount, NULL);
		$this->Maximums = &Init2DArray($groupCount, $fieldCount, NULL);
		$this->GrandCounts = &InitArray($fieldCount, 0);
		$this->GrandSummaries = &InitArray($fieldCount, 0);
		$this->GrandMinimums = &InitArray($fieldCount, NULL);
		$this->GrandMaximums = &InitArray($fieldCount, NULL);

		// Set up array if accumulation required: [Accum, SkipNullOrZero]
		$this->Columns = [[FALSE, FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE]];

		// Set up groups per page dynamically
		$this->setupDisplayGroups();

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Load custom filters
		$this->Page_FilterLoad();

		// Set up popup filter
		$this->setupPopup();

		// Load group db values if necessary
		$this->loadGroupDbValues();

		// Extended filter
		$extendedFilter = "";

		// Build popup filter
		$popupFilter = $this->getPopupFilter();
		AddFilter($this->Filter, $popupFilter);

		// No filter
		$this->FilterApplied = FALSE;
		$this->FilterOptions->getItem("savecurrentfilter")->Visible = FALSE;
		$this->FilterOptions->getItem("deletefilter")->Visible = FALSE;

		// Call Page Selecting event
		$this->Page_Selecting($this->Filter);

		// Search options
		$this->setupSearchOptions();

		// Get sort
		$this->Sort = $this->getSort();

		// Get total group count
		$sql = BuildReportSql($this->getSqlSelectGroup(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
		$this->TotalGroups = $this->getRecordCount($sql);
		if ($this->DisplayGroups <= 0 || $this->DrillDown || $DashboardReport) // Display all groups
			$this->DisplayGroups = $this->TotalGroups;
		$this->StartGroup = 1;

		// Show header
		$this->ShowHeader = ($this->TotalGroups > 0);

		// Set up start position if not export all
		if ($this->ExportAll && $this->isExport())
			$this->DisplayGroups = $this->TotalGroups;
		else
			$this->setupStartGroup();

		// Set no record found message
		if ($this->TotalGroups == 0) {
			if ($Security->canList()) {
				if ($this->Filter == "0=101") {
					$this->setWarningMessage($ReportLanguage->phrase("EnterSearchCriteria"));
				} else {
					$this->setWarningMessage($ReportLanguage->phrase("NoRecord"));
				}
			} else {
				$this->setWarningMessage(DeniedMessage());
			}
		}

		// Hide export options if export/dashboard report
		if ($this->isExport() || $DashboardReport)
			$this->ExportOptions->hideAllOptions();

		// Hide search/filter options if export/drilldown/dashboard report
		if ($this->isExport() || $this->DrillDown || $DashboardReport) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
			$this->GenerateOptions->hideAllOptions();
		}

		// Get current page groups
		$grpSort = UpdateSortFields($this->getSqlOrderByGroup(), $this->Sort, 2); // Get grouping field only
		$sql = BuildReportSql($this->getSqlSelectGroup(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderByGroup(), $this->Filter, $grpSort);
		$this->GroupRecordset = $this->getRecordset($sql, $this->DisplayGroups, $this->StartGroup - 1);

		// Init detail recordset
		$this->Recordset = NULL;
		$this->setupFieldCount();
	}

	// Get summary count
	public function getSummaryCount($lvl, $curValue = TRUE)
	{
		$cnt = 0;
		foreach ($this->DetailRows as $row) {
			$wrkfirst_name = $row["first_name"];
			if ($lvl >= 1) {
				$val = $curValue ? $this->first_name->CurrentValue : $this->first_name->OldValue;
				$grpval = $curValue ? $this->first_name->groupValue() : $this->first_name->groupOldValue();
				if ($val === NULL && $wrkfirst_name !== NULL || $val !== NULL && $wrkfirst_name === NULL ||
					$grpval <> $this->first_name->getGroupValueBase($wrkfirst_name))
				continue;
			}
			$cnt++;
		}
		return $cnt;
	}

	// Check level break
	public function checkLevelBreak($lvl)
	{
		switch ($lvl) {
			case 1:
				return ($this->first_name->CurrentValue === NULL && $this->first_name->OldValue !== NULL) ||
					($this->first_name->CurrentValue !== NULL && $this->first_name->OldValue === NULL) ||
					($this->first_name->groupValue() <> $this->first_name->groupOldValue());
		}
	}

	// Accummulate summary
	public function accumulateSummary()
	{
		$cntx = count($this->Summaries);
		for ($ix = 0; $ix < $cntx; $ix++) {
			$cnty = count($this->Summaries[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				if ($this->Columns[$iy][0]) { // Accumulate required
					$valwrk = $this->Values[$iy];
					if ($valwrk === NULL) {
						if (!$this->Columns[$iy][1])
							$this->Counts[$ix][$iy]++;
					} else {
						$accum = (!$this->Columns[$iy][1] || !is_numeric($valwrk) || $valwrk <> 0);
						if ($accum) {
							$this->Counts[$ix][$iy]++;
							if (is_numeric($valwrk)) {
								$this->Summaries[$ix][$iy] += $valwrk;
								if ($this->Minimums[$ix][$iy] === NULL) {
									$this->Minimums[$ix][$iy] = $valwrk;
									$this->Maximums[$ix][$iy] = $valwrk;
								} else {
									if ($this->Minimums[$ix][$iy] > $valwrk)
										$this->Minimums[$ix][$iy] = $valwrk;
									if ($this->Maximums[$ix][$iy] < $valwrk)
										$this->Maximums[$ix][$iy] = $valwrk;
								}
							}
						}
					}
				}
			}
		}
		$cntx = count($this->Summaries);
		for ($ix = 0; $ix < $cntx; $ix++)
			$this->Counts[$ix][0]++;
	}

	// Reset level summary
	public function resetLevelSummary($lvl)
	{

		// Clear summary values
		$cntx = count($this->Summaries);
		for ($ix = $lvl; $ix < $cntx; $ix++) {
			$cnty = count($this->Summaries[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				$this->Counts[$ix][$iy] = 0;
				if ($this->Columns[$iy][0]) {
					$this->Summaries[$ix][$iy] = 0;
					$this->Minimums[$ix][$iy] = NULL;
					$this->Maximums[$ix][$iy] = NULL;
				}
			}
		}
		$cntx = count($this->Summaries);
		for ($ix = $lvl; $ix < $cntx; $ix++)
			$this->Counts[$ix][0] = 0;

		// Reset record count
		$this->RecordCount = 0;
	}

	// Load group row values
	public function loadGroupRowValues($firstRow = FALSE)
	{
		if (!$this->GroupRecordset)
			return;
		if ($firstRow) // Get first group

			//$this->GroupRecordset->moveFirst(); // NOTE: no need to move position
			$this->first_name->setDbValue(""); // Init first value
		else // Get next group
			$this->GroupRecordset->moveNext();
		if (!$this->GroupRecordset->EOF)
			$this->first_name->setDbValue($this->GroupRecordset->fields[0]);
		else
			$this->first_name->setDbValue("");
	}

	// Load row values
	public function loadRowValues($firstRow = FALSE)
	{
		if (!$this->Recordset)
			return;
		if ($firstRow) { // Get first row
			$this->Recordset->moveFirst(); // Move first
			if ($this->GroupCount == 1) {
				$this->FirstRowData = [];
				$this->FirstRowData["id"] = $this->Recordset->fields('id');
				$this->FirstRowData["title"] = $this->Recordset->fields('title');
				$this->FirstRowData["first_name"] = $this->Recordset->fields('first_name');
				$this->FirstRowData["middle_name"] = $this->Recordset->fields('middle_name');
				$this->FirstRowData["last_name"] = $this->Recordset->fields('last_name');
				$this->FirstRowData["gender"] = $this->Recordset->fields('gender');
				$this->FirstRowData["dob"] = $this->Recordset->fields('dob');
				$this->FirstRowData["Age"] = $this->Recordset->fields('Age');
				$this->FirstRowData["blood_group"] = $this->Recordset->fields('blood_group');
				$this->FirstRowData["mobile_no"] = $this->Recordset->fields('mobile_no');
				$this->FirstRowData["IdentificationMark"] = $this->Recordset->fields('IdentificationMark');
				$this->FirstRowData["Religion"] = $this->Recordset->fields('Religion');
				$this->FirstRowData["Nationality"] = $this->Recordset->fields('Nationality');
				$this->FirstRowData["status"] = $this->Recordset->fields('status');
				$this->FirstRowData["createdby"] = $this->Recordset->fields('createdby');
				$this->FirstRowData["createddatetime"] = $this->Recordset->fields('createddatetime');
				$this->FirstRowData["modifiedby"] = $this->Recordset->fields('modifiedby');
				$this->FirstRowData["modifieddatetime"] = $this->Recordset->fields('modifieddatetime');
				$this->FirstRowData["ReferedByDr"] = $this->Recordset->fields('ReferedByDr');
				$this->FirstRowData["ReferClinicname"] = $this->Recordset->fields('ReferClinicname');
				$this->FirstRowData["ReferCity"] = $this->Recordset->fields('ReferCity');
				$this->FirstRowData["ReferMobileNo"] = $this->Recordset->fields('ReferMobileNo');
				$this->FirstRowData["ReferA4TreatingConsultant"] = $this->Recordset->fields('ReferA4TreatingConsultant');
				$this->FirstRowData["PurposreReferredfor"] = $this->Recordset->fields('PurposreReferredfor');
				$this->FirstRowData["spouse_title"] = $this->Recordset->fields('spouse_title');
				$this->FirstRowData["spouse_first_name"] = $this->Recordset->fields('spouse_first_name');
				$this->FirstRowData["spouse_middle_name"] = $this->Recordset->fields('spouse_middle_name');
				$this->FirstRowData["spouse_last_name"] = $this->Recordset->fields('spouse_last_name');
				$this->FirstRowData["spouse_gender"] = $this->Recordset->fields('spouse_gender');
				$this->FirstRowData["spouse_dob"] = $this->Recordset->fields('spouse_dob');
				$this->FirstRowData["spouse_Age"] = $this->Recordset->fields('spouse_Age');
				$this->FirstRowData["spouse_blood_group"] = $this->Recordset->fields('spouse_blood_group');
				$this->FirstRowData["spouse_mobile_no"] = $this->Recordset->fields('spouse_mobile_no');
				$this->FirstRowData["Maritalstatus"] = $this->Recordset->fields('Maritalstatus');
				$this->FirstRowData["Business"] = $this->Recordset->fields('Business');
				$this->FirstRowData["Patient_Language"] = $this->Recordset->fields('Patient_Language');
				$this->FirstRowData["Passport"] = $this->Recordset->fields('Passport');
				$this->FirstRowData["VisaNo"] = $this->Recordset->fields('VisaNo');
				$this->FirstRowData["ValidityOfVisa"] = $this->Recordset->fields('ValidityOfVisa');
				$this->FirstRowData["WhereDidYouHear"] = $this->Recordset->fields('WhereDidYouHear');
				$this->FirstRowData["PatientID"] = $this->Recordset->fields('PatientID');
				$this->FirstRowData["HospID"] = $this->Recordset->fields('HospID');
				$this->FirstRowData["street"] = $this->Recordset->fields('street');
				$this->FirstRowData["town"] = $this->Recordset->fields('town');
				$this->FirstRowData["province"] = $this->Recordset->fields('province');
				$this->FirstRowData["country"] = $this->Recordset->fields('country');
				$this->FirstRowData["postal_code"] = $this->Recordset->fields('postal_code');
				$this->FirstRowData["PEmail"] = $this->Recordset->fields('PEmail');
				$this->FirstRowData["PEmergencyContact"] = $this->Recordset->fields('PEmergencyContact');
			}
		} else { // Get next row
			$this->Recordset->moveNext();
		}
		if (!$this->Recordset->EOF) {
			$this->id->setDbValue($this->Recordset->fields('id'));
			$this->title->setDbValue($this->Recordset->fields('title'));
			if (!$firstRow) {
				if (is_array($this->first_name->GroupDbValues))
					$this->first_name->setDbValue(@$this->first_name->GroupDbValues[$this->Recordset->fields('first_name')]);
				else
					$this->first_name->setDbValue(GroupValue($this->first_name, $this->Recordset->fields('first_name')));
			}
			$this->middle_name->setDbValue($this->Recordset->fields('middle_name'));
			$this->last_name->setDbValue($this->Recordset->fields('last_name'));
			$this->gender->setDbValue($this->Recordset->fields('gender'));
			$this->dob->setDbValue($this->Recordset->fields('dob'));
			$this->Age->setDbValue($this->Recordset->fields('Age'));
			$this->blood_group->setDbValue($this->Recordset->fields('blood_group'));
			$this->mobile_no->setDbValue($this->Recordset->fields('mobile_no'));
			$this->description->setDbValue($this->Recordset->fields('description'));
			$this->IdentificationMark->setDbValue($this->Recordset->fields('IdentificationMark'));
			$this->Religion->setDbValue($this->Recordset->fields('Religion'));
			$this->Nationality->setDbValue($this->Recordset->fields('Nationality'));
			$this->profilePic->setDbValue($this->Recordset->fields('profilePic'));
			$this->status->setDbValue($this->Recordset->fields('status'));
			$this->createdby->setDbValue($this->Recordset->fields('createdby'));
			$this->createddatetime->setDbValue($this->Recordset->fields('createddatetime'));
			$this->modifiedby->setDbValue($this->Recordset->fields('modifiedby'));
			$this->modifieddatetime->setDbValue($this->Recordset->fields('modifieddatetime'));
			$this->ReferedByDr->setDbValue($this->Recordset->fields('ReferedByDr'));
			$this->ReferClinicname->setDbValue($this->Recordset->fields('ReferClinicname'));
			$this->ReferCity->setDbValue($this->Recordset->fields('ReferCity'));
			$this->ReferMobileNo->setDbValue($this->Recordset->fields('ReferMobileNo'));
			$this->ReferA4TreatingConsultant->setDbValue($this->Recordset->fields('ReferA4TreatingConsultant'));
			$this->PurposreReferredfor->setDbValue($this->Recordset->fields('PurposreReferredfor'));
			$this->spouse_title->setDbValue($this->Recordset->fields('spouse_title'));
			$this->spouse_first_name->setDbValue($this->Recordset->fields('spouse_first_name'));
			$this->spouse_middle_name->setDbValue($this->Recordset->fields('spouse_middle_name'));
			$this->spouse_last_name->setDbValue($this->Recordset->fields('spouse_last_name'));
			$this->spouse_gender->setDbValue($this->Recordset->fields('spouse_gender'));
			$this->spouse_dob->setDbValue($this->Recordset->fields('spouse_dob'));
			$this->spouse_Age->setDbValue($this->Recordset->fields('spouse_Age'));
			$this->spouse_blood_group->setDbValue($this->Recordset->fields('spouse_blood_group'));
			$this->spouse_mobile_no->setDbValue($this->Recordset->fields('spouse_mobile_no'));
			$this->Maritalstatus->setDbValue($this->Recordset->fields('Maritalstatus'));
			$this->Business->setDbValue($this->Recordset->fields('Business'));
			$this->Patient_Language->setDbValue($this->Recordset->fields('Patient_Language'));
			$this->Passport->setDbValue($this->Recordset->fields('Passport'));
			$this->VisaNo->setDbValue($this->Recordset->fields('VisaNo'));
			$this->ValidityOfVisa->setDbValue($this->Recordset->fields('ValidityOfVisa'));
			$this->WhereDidYouHear->setDbValue($this->Recordset->fields('WhereDidYouHear'));
			$this->PatientID->setDbValue($this->Recordset->fields('PatientID'));
			$this->HospID->setDbValue($this->Recordset->fields('HospID'));
			$this->street->setDbValue($this->Recordset->fields('street'));
			$this->town->setDbValue($this->Recordset->fields('town'));
			$this->province->setDbValue($this->Recordset->fields('province'));
			$this->country->setDbValue($this->Recordset->fields('country'));
			$this->postal_code->setDbValue($this->Recordset->fields('postal_code'));
			$this->PEmail->setDbValue($this->Recordset->fields('PEmail'));
			$this->PEmergencyContact->setDbValue($this->Recordset->fields('PEmergencyContact'));
			$this->Values[1] = $this->WhereDidYouHear->CurrentValue;
			$this->Values[2] = $this->street->CurrentValue;
			$this->Values[3] = $this->town->CurrentValue;
			$this->Values[4] = $this->province->CurrentValue;
			$this->Values[5] = $this->country->CurrentValue;
			$this->Values[6] = $this->postal_code->CurrentValue;
			$this->Values[7] = $this->PEmail->CurrentValue;
			$this->Values[8] = $this->PEmergencyContact->CurrentValue;
		} else {
			$this->id->setDbValue("");
			$this->title->setDbValue("");
			$this->first_name->setDbValue("");
			$this->middle_name->setDbValue("");
			$this->last_name->setDbValue("");
			$this->gender->setDbValue("");
			$this->dob->setDbValue("");
			$this->Age->setDbValue("");
			$this->blood_group->setDbValue("");
			$this->mobile_no->setDbValue("");
			$this->description->setDbValue("");
			$this->IdentificationMark->setDbValue("");
			$this->Religion->setDbValue("");
			$this->Nationality->setDbValue("");
			$this->profilePic->setDbValue("");
			$this->status->setDbValue("");
			$this->createdby->setDbValue("");
			$this->createddatetime->setDbValue("");
			$this->modifiedby->setDbValue("");
			$this->modifieddatetime->setDbValue("");
			$this->ReferedByDr->setDbValue("");
			$this->ReferClinicname->setDbValue("");
			$this->ReferCity->setDbValue("");
			$this->ReferMobileNo->setDbValue("");
			$this->ReferA4TreatingConsultant->setDbValue("");
			$this->PurposreReferredfor->setDbValue("");
			$this->spouse_title->setDbValue("");
			$this->spouse_first_name->setDbValue("");
			$this->spouse_middle_name->setDbValue("");
			$this->spouse_last_name->setDbValue("");
			$this->spouse_gender->setDbValue("");
			$this->spouse_dob->setDbValue("");
			$this->spouse_Age->setDbValue("");
			$this->spouse_blood_group->setDbValue("");
			$this->spouse_mobile_no->setDbValue("");
			$this->Maritalstatus->setDbValue("");
			$this->Business->setDbValue("");
			$this->Patient_Language->setDbValue("");
			$this->Passport->setDbValue("");
			$this->VisaNo->setDbValue("");
			$this->ValidityOfVisa->setDbValue("");
			$this->WhereDidYouHear->setDbValue("");
			$this->PatientID->setDbValue("");
			$this->HospID->setDbValue("");
			$this->street->setDbValue("");
			$this->town->setDbValue("");
			$this->province->setDbValue("");
			$this->country->setDbValue("");
			$this->postal_code->setDbValue("");
			$this->PEmail->setDbValue("");
			$this->PEmergencyContact->setDbValue("");
		}
	}

	// Render row
	public function renderRow()
	{
		global $Security, $ReportLanguage, $Language;
		$conn = &$this->getConnection();
		if (!$this->GrandSummarySetup) { // Get Grand total
			$hasCount = FALSE;
			$hasSummary = FALSE;

			// Get total count from SQL directly
			$sql = BuildReportSql($this->getSqlSelectCount(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
			$rstot = $conn->execute($sql);
			if ($rstot) {
				$this->TotalCount = ($rstot->recordCount() > 1) ? $rstot->recordCount() : $rstot->fields[0];
				$rstot->close();
				$hasCount = TRUE;
			} else {
				$this->TotalCount = 0;
			}
			$hasSummary = TRUE;

			// Accumulate grand summary from detail records
			if (!$hasCount || !$hasSummary) {
				$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
				$this->Recordset = $conn->execute($sql);
				if ($this->Recordset) {
					$this->loadRowValues(TRUE);
					while (!$this->Recordset->EOF) {
						$this->accumulateGrandSummary();
						$this->loadRowValues();
					}
					$this->Recordset->close();
				}
			}
			$this->GrandSummarySetup = TRUE; // No need to set up again
		}

		// Call Row_Rendering event
		$this->Row_Rendering();
		if ($this->RowType == ROWTYPE_SEARCH) { // Search row
		} elseif ($this->RowType == ROWTYPE_TOTAL && !($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER)) { // Summary row
			PrependClass($this->RowAttrs["class"], ($this->RowTotalType == ROWTOTAL_PAGE || $this->RowTotalType == ROWTOTAL_GRAND) ? "ew-rpt-grp-aggregate" : ""); // Set up row class
			if ($this->RowTotalType == ROWTOTAL_GROUP) $this->RowAttrs["data-group"] = $this->first_name->groupOldValue(); // Set up group attribute

			// first_name
			$this->first_name->GroupViewValue = $this->first_name->groupOldValue();
			$this->first_name->CellAttrs["class"] = ($this->RowGroupLevel == 1 ? "ew-rpt-grp-summary-1" : "ew-rpt-grp-field-1");
			$this->first_name->GroupViewValue = DisplayGroupValue($this->first_name, $this->first_name->GroupViewValue);
			$this->first_name->GroupSummaryOldValue = $this->first_name->GroupSummaryValue;
			$this->first_name->GroupSummaryValue = $this->first_name->GroupViewValue;
			$this->first_name->GroupSummaryViewValue = ($this->first_name->GroupSummaryOldValue <> $this->first_name->GroupSummaryValue) ? $this->first_name->GroupSummaryValue : "&nbsp;";

			// first_name
			$this->first_name->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->HrefValue = "";

			// street
			$this->street->HrefValue = "";

			// town
			$this->town->HrefValue = "";

			// province
			$this->province->HrefValue = "";

			// country
			$this->country->HrefValue = "";

			// postal_code
			$this->postal_code->HrefValue = "";

			// PEmail
			$this->PEmail->HrefValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->HrefValue = "";
		} else {
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER) {
			$this->RowAttrs["data-group"] = $this->first_name->groupValue(); // Set up group attribute
			} else {
			$this->RowAttrs["data-group"] = $this->first_name->groupValue(); // Set up group attribute
			}

			// first_name
			$this->first_name->GroupViewValue = $this->first_name->groupValue();
			$this->first_name->CellAttrs["class"] = "ew-rpt-grp-field-1";
			$this->first_name->GroupViewValue = DisplayGroupValue($this->first_name, $this->first_name->GroupViewValue);
			if ($this->first_name->groupValue() == $this->first_name->groupOldValue() && !$this->checkLevelBreak(1))
				$this->first_name->GroupViewValue = "&nbsp;";

			// WhereDidYouHear
			$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
			$this->WhereDidYouHear->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// street
			$this->street->ViewValue = $this->street->CurrentValue;
			$this->street->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// town
			$this->town->ViewValue = $this->town->CurrentValue;
			$this->town->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PEmail
			$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
			$this->PEmail->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PEmergencyContact
			$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
			$this->PEmergencyContact->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// first_name
			$this->first_name->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->HrefValue = "";

			// street
			$this->street->HrefValue = "";

			// town
			$this->town->HrefValue = "";

			// province
			$this->province->HrefValue = "";

			// country
			$this->country->HrefValue = "";

			// postal_code
			$this->postal_code->HrefValue = "";

			// PEmail
			$this->PEmail->HrefValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == ROWTYPE_TOTAL) { // Summary row

			// first_name
			$currentValue = $this->first_name->GroupViewValue;
			$viewValue = &$this->first_name->GroupViewValue;
			$viewAttrs = &$this->first_name->ViewAttrs;
			$cellAttrs = &$this->first_name->CellAttrs;
			$hrefValue = &$this->first_name->HrefValue;
			$linkAttrs = &$this->first_name->LinkAttrs;
			$this->Cell_Rendered($this->first_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
		} else {

			// first_name
			$currentValue = $this->first_name->groupValue();
			$viewValue = &$this->first_name->GroupViewValue;
			$viewAttrs = &$this->first_name->ViewAttrs;
			$cellAttrs = &$this->first_name->CellAttrs;
			$hrefValue = &$this->first_name->HrefValue;
			$linkAttrs = &$this->first_name->LinkAttrs;
			$this->Cell_Rendered($this->first_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// WhereDidYouHear
			$currentValue = $this->WhereDidYouHear->CurrentValue;
			$viewValue = &$this->WhereDidYouHear->ViewValue;
			$viewAttrs = &$this->WhereDidYouHear->ViewAttrs;
			$cellAttrs = &$this->WhereDidYouHear->CellAttrs;
			$hrefValue = &$this->WhereDidYouHear->HrefValue;
			$linkAttrs = &$this->WhereDidYouHear->LinkAttrs;
			$this->Cell_Rendered($this->WhereDidYouHear, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// street
			$currentValue = $this->street->CurrentValue;
			$viewValue = &$this->street->ViewValue;
			$viewAttrs = &$this->street->ViewAttrs;
			$cellAttrs = &$this->street->CellAttrs;
			$hrefValue = &$this->street->HrefValue;
			$linkAttrs = &$this->street->LinkAttrs;
			$this->Cell_Rendered($this->street, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// town
			$currentValue = $this->town->CurrentValue;
			$viewValue = &$this->town->ViewValue;
			$viewAttrs = &$this->town->ViewAttrs;
			$cellAttrs = &$this->town->CellAttrs;
			$hrefValue = &$this->town->HrefValue;
			$linkAttrs = &$this->town->LinkAttrs;
			$this->Cell_Rendered($this->town, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// province
			$currentValue = $this->province->CurrentValue;
			$viewValue = &$this->province->ViewValue;
			$viewAttrs = &$this->province->ViewAttrs;
			$cellAttrs = &$this->province->CellAttrs;
			$hrefValue = &$this->province->HrefValue;
			$linkAttrs = &$this->province->LinkAttrs;
			$this->Cell_Rendered($this->province, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// country
			$currentValue = $this->country->CurrentValue;
			$viewValue = &$this->country->ViewValue;
			$viewAttrs = &$this->country->ViewAttrs;
			$cellAttrs = &$this->country->CellAttrs;
			$hrefValue = &$this->country->HrefValue;
			$linkAttrs = &$this->country->LinkAttrs;
			$this->Cell_Rendered($this->country, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// postal_code
			$currentValue = $this->postal_code->CurrentValue;
			$viewValue = &$this->postal_code->ViewValue;
			$viewAttrs = &$this->postal_code->ViewAttrs;
			$cellAttrs = &$this->postal_code->CellAttrs;
			$hrefValue = &$this->postal_code->HrefValue;
			$linkAttrs = &$this->postal_code->LinkAttrs;
			$this->Cell_Rendered($this->postal_code, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PEmail
			$currentValue = $this->PEmail->CurrentValue;
			$viewValue = &$this->PEmail->ViewValue;
			$viewAttrs = &$this->PEmail->ViewAttrs;
			$cellAttrs = &$this->PEmail->CellAttrs;
			$hrefValue = &$this->PEmail->HrefValue;
			$linkAttrs = &$this->PEmail->LinkAttrs;
			$this->Cell_Rendered($this->PEmail, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PEmergencyContact
			$currentValue = $this->PEmergencyContact->CurrentValue;
			$viewValue = &$this->PEmergencyContact->ViewValue;
			$viewAttrs = &$this->PEmergencyContact->ViewAttrs;
			$cellAttrs = &$this->PEmergencyContact->CellAttrs;
			$hrefValue = &$this->PEmergencyContact->HrefValue;
			$linkAttrs = &$this->PEmergencyContact->LinkAttrs;
			$this->Cell_Rendered($this->PEmergencyContact, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
		}

		// Call Row_Rendered event
		$this->Row_Rendered();
		$this->setupFieldCount();
	}

	// Accummulate grand summary
	protected function accumulateGrandSummary()
	{
		$this->TotalCount++;
		$cntgs = count($this->GrandSummaries);
		for ($iy = 1; $iy < $cntgs; $iy++) {
			if ($this->Columns[$iy][0]) {
				$valwrk = $this->Values[$iy];
				if ($valwrk === NULL || !is_numeric($valwrk)) {
					if (!$this->Columns[$iy][1])
						$this->GrandCounts[$iy]++;
				} else {
					if (!$this->Columns[$iy][1] || $valwrk <> 0) {
						$this->GrandCounts[$iy]++;
						$this->GrandSummaries[$iy] += $valwrk;
						if ($this->GrandMinimums[$iy] === NULL) {
							$this->GrandMinimums[$iy] = $valwrk;
							$this->GrandMaximums[$iy] = $valwrk;
						} else {
							if ($this->GrandMinimums[$iy] > $valwrk)
								$this->GrandMinimums[$iy] = $valwrk;
							if ($this->GrandMaximums[$iy] < $valwrk)
								$this->GrandMaximums[$iy] = $valwrk;
						}
					}
				}
			}
		}
	}

	// Load group db values if necessary
	protected function loadGroupDbValues()
	{
		$conn = &$this->getConnection();
	}

	// Set up popup
	protected function setupPopup()
	{
		global $ReportLanguage;
		$conn = &$this->getConnection();
		if ($this->DrillDown)
			return;

		// Process post back form
		if (IsPost()) {
			$name = Post("popup", ""); // Get popup form name
			if ($name <> "") {
				$arValues = Post("sel_$name");
				$cntValues = is_array($arValues) ? count($arValues) : 0;
				if ($cntValues > 0) {
					if (trim($arValues[0]) == "") // Select all
						$arValues = INIT_VALUE;
					$_SESSION["sel_$name"] = $arValues;
					$_SESSION["rf_$name"] = Post("rf_$name", "");
					$_SESSION["rt_$name"] = Post("rt_$name", "");
					$this->resetPager();
				}
			}

		// Get 'reset' command
		} elseif (Get("cmd") !== NULL) {
			$cmd = Get("cmd");
			if (SameText($cmd, "reset")) {
				$this->resetPager();
			}
		}

		// Load selection criteria to array
	}

	// Setup field count
	protected function setupFieldCount()
	{
		$this->GroupColumnCount = 0;
		$this->SubGroupColumnCount = 0;
		$this->DetailColumnCount = 0;
		if ($this->first_name->Visible)
			$this->GroupColumnCount += 1;
		if ($this->WhereDidYouHear->Visible)
			$this->DetailColumnCount += 1;
		if ($this->street->Visible)
			$this->DetailColumnCount += 1;
		if ($this->town->Visible)
			$this->DetailColumnCount += 1;
		if ($this->province->Visible)
			$this->DetailColumnCount += 1;
		if ($this->country->Visible)
			$this->DetailColumnCount += 1;
		if ($this->postal_code->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PEmail->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PEmergencyContact->Visible)
			$this->DetailColumnCount += 1;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/") + 1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', "", $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("summary", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Set up export options (extended)
	protected function setupExportOptionsExt()
	{
		global $ReportLanguage, $ReportOptions;
		$reportTypes = $ReportOptions["ReportTypes"];
		$item = &$this->ExportOptions->getItem("pdf");
		$item->Visible = TRUE;
		if ($item->Visible)
			$reportTypes["pdf"] = $ReportLanguage->phrase("ReportFormPdf");
		$item->Body = "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPdfUrl . "', '" . session_id() . "');\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		$ReportOptions["ReportTypes"] = $reportTypes;
	}

	// Export email
	public function exportEmail($emailContent)
	{
		global $TempImages, $ReportLanguage;
		$genRequest = ReportParam("generaterequest") === TRUE;
		$failRespPfx = $genRequest ? "" : "<p class=\"text-danger\">";
		$successRespPfx = $genRequest ? "" : "<p class=\"text-success\">";
		$respSfx = $genRequest ? "" : "</p>";
		$contentType = ReportParam("contenttype", "");
		$sender = ReportParam("sender", "");
		$recipient = ReportParam("recipient", "");
		$cc = ReportParam("cc", "");
		$bcc = ReportParam("bcc", "");

		// Subject
		$emailSubject = ReportParam("subject", "");

		// Message
		$emailMessage = ReportParam("message", "");

		// Check sender
		if ($sender == "")
			return $failRespPfx . $ReportLanguage->phrase("EnterSenderEmail") . $respSfx;
		if (!CheckEmail($sender))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperSenderEmail") . $respSfx;

		// Check recipient
		if (!CheckEmailList($recipient, MAX_EMAIL_RECIPIENT))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperRecipientEmail") . $respSfx;

		// Check cc
		if (!CheckEmailList($cc, MAX_EMAIL_RECIPIENT))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperCcEmail") . $respSfx;

		// Check bcc
		if (!CheckEmailList($bcc, MAX_EMAIL_RECIPIENT))
			return $failRespPfx . $ReportLanguage->phrase("EnterProperBccEmail") . $respSfx;

		// Check email sent count
		$emailCount = $genRequest ? 0 : LoadEmailCount();
		if (intval($emailCount) >= MAX_EMAIL_SENT_COUNT)
			return $failRespPfx . $ReportLanguage->phrase("ExceedMaxEmailExport") . $respSfx;
		if ($emailMessage <> "") {
			if (REMOVE_XSS)
				$emailMessage = RemoveXSS($emailMessage);
			$emailMessage .= ($contentType == "url") ? "\r\n\r\n" : "<br><br>";
		}
		$attachmentContent = AdjustEmailContent($emailContent);
		$appPath = FullUrl();
		$appPath = substr($appPath, 0, strrpos($appPath, "/") + 1);
		if (ContainsString($attachmentContent, "<head>"))
			$attachmentContent = str_replace("<head>", "<head><base href=\"" . $appPath . "\">", $attachmentContent); // Add <base href> statement inside the header
		else
			$attachmentContent = "<base href=\"" . $appPath . "\">" . $attachmentContent; // Add <base href> statement as the first statement

		//$attachmentFile = $this->TableVar . "_" . Date("YmdHis") . ".html";
		$attachmentFile = $this->TableVar . "_" . Date("YmdHis") . "_" . Random() . ".html";
		if ($contentType == "url") {
			SaveFile(UPLOAD_DEST_PATH, $attachmentFile, $attachmentContent);
			$attachmentFile = UPLOAD_DEST_PATH . $attachmentFile;
			$url = $appPath . $attachmentFile;
			$emailMessage .= $url; // Send URL only
			$attachmentFile = "";
			$attachmentContent = "";
		} else {
			$emailMessage .= $attachmentContent;
			$attachmentFile = "";
			$attachmentContent = "";
		}

		// Send email
		$email = new Email();
		$email->Sender = $sender; // Sender
		$email->Recipient = $recipient; // Recipient
		$email->Cc = $cc; // Cc
		$email->Bcc = $bcc; // Bcc
		$email->Subject = $emailSubject; // Subject
		$email->Content = $emailMessage; // Content
		if ($attachmentFile <> "")
			$email->addAttachment($attachmentFile, $attachmentContent);
		if ($contentType <> "url") {
			foreach ($TempImages as $tmpimage)
				$email->addEmbeddedImage($tmpimage);
		}
		$email->Format = ($contentType == "url") ? "text" : "html";
		$email->Charset = EMAIL_CHARSET;
		$eventArgs = [];
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $eventArgs))
			$emailSent = $email->send();
		DeleteTempImages($emailContent);

		// Check email sent status
		if ($emailSent) {

			// Update email sent count and write log
			AddEmailLog($sender, $recipient, $emailSubject, $emailMessage);

			// Sent email success
			return $successRespPfx . $ReportLanguage->phrase("SendEmailSuccess") . $respSfx; // Set up success message
		} else {

			// Sent email failure
			return $failRespPfx . $email->SendErrDescription . $respSfx;
		}
	}

	// Export to HTML
	public function exportHtml($html)
	{

		//global $ExportFileName;
		//header('Content-Type: text/html' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
		//header('Content-Disposition: attachment; filename=' . $ExportFileName . '.html');

		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";

		// Save generate file for print
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
			$baseTag = "<base href=\"" . BaseUrl() . "\">";
			$html = preg_replace('/<head>/', '<head>' . $baseTag, $html);
			SaveFile($folder, $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file")
			Write($html);
		return $saveToFile;
	}

	// Export to Word
	public function exportWord($html)
	{
		global $ExportFileName;
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	SaveFile(ServerMapPath($folder), $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			AddHeader('Content-Type', 'application/vnd.ms-word' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
			AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.doc');
			Write($html);
		}
		return $saveToFile;
	}

	// Export to Excel
	public function exportExcel($html)
	{
		global $ExportFileName;
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	SaveFile(ServerMapPath($folder), $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			AddHeader('Content-Type', 'application/vnd.ms-excel' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
			AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.xls');
			Write($html);
		}
		return $saveToFile;
	}

	// Export PDF
	public function exportPdf($html)
	{
		global $ExportFileName, $PDF_MEMORY_LIMIT, $PDF_TIME_LIMIT, $PDF_IMAGE_SCALE_FACTOR;
		@ini_set("memory_limit", $PDF_MEMORY_LIMIT);
		set_time_limit($PDF_TIME_LIMIT);
		$html = CheckHtml($html);
		if (DEBUG_ENABLED) // Add debug message
			$html = str_replace("</body>", GetDebugMessage() . "</body>", $html);
		$dompdf = new \Dompdf\Dompdf(["pdf_backend" => "Cpdf"]);
		$doc = new \DOMDocument("1.0", "utf-8");
		@$doc->loadHTML('<?xml encoding="uft-8">' . ConvertToUtf8($html)); // Convert to utf-8
		$spans = $doc->getElementsByTagName("span");
		foreach ($spans as $span) {
			$classNames = $span->getAttribute("class");
			if ($classNames == "ew-filter-caption") // Insert colon
				$span->parentNode->insertBefore($doc->createElement("span", ":&nbsp;"), $span->nextSibling);
			elseif (preg_match('/\bicon\-\w+\b/', $classNames)) // Remove icons
				$span->parentNode->removeChild($span);
		}
		$images = $doc->getElementsByTagName("img");
		$pageSize = "a4";
		$pageOrientation = "portrait";
		$this->ExportPageOrientation = $pageOrientation;
		$portrait = SameText($pageOrientation, "portrait");
		foreach ($images as $image) {
			$imagefn = $image->getAttribute("src");
			if (file_exists($imagefn)) {
				$imagefn = realpath($imagefn);
				$size = getimagesize($imagefn); // Get image size
				if ($size[0] <> 0) {
					if (SameText($pageSize, "letter")) { // Letter paper (8.5 in. by 11 in.)
						$w = $portrait ? 216 : 279;
					} elseif (SameText($pageSize, "legal")) { // Legal paper (8.5 in. by 14 in.)
						$w = $portrait ? 216 : 356;
					} else {
						$w = $portrait ? 210 : 297; // A4 paper (210 mm by 297 mm)
					}
					$w = min($size[0], ($w - 20 * 2) / 25.4 * 72 * $PDF_IMAGE_SCALE_FACTOR); // Resize image, adjust the scale factor if necessary
					$h = $w / $size[0] * $size[1];
					$image->setAttribute("width", $w);
					$image->setAttribute("height", $h);
				}
			}
		}
		$html = $doc->saveHTML();
		$html = ConvertFromUtf8($html);
		$dompdf->load_html($html);
		$dompdf->set_paper($pageSize, $pageOrientation);
		$dompdf->render();
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
			SaveFile(ServerMapPath($folder), $fileName, $dompdf->output());
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			$exportFile = EndsText(".pdf", $ExportFileName) ? $ExportFileName : $ExportFileName . ".pdf";
			$dompdf->stream($exportFile, ["Attachment" => 1]); // 0 to open in browser, 1 to download
		}
		DeleteTempImages($html);
		return $saveToFile;
	}

	// Set up starting group
	protected function setupStartGroup()
	{

		// Exit if no groups
		if ($this->DisplayGroups == 0)
			return;
		$startGrp = ReportParam(TABLE_START_GROUP, "");
		$pageNo = ReportParam("pageno", "");

		// Check for a 'start' parameter
		if ($startGrp != "") {
			$this->StartGroup = $startGrp;
			$this->setStartGroup($this->StartGroup);
		} elseif ($pageNo != "") {
			if (is_numeric($pageNo)) {
				$this->StartGroup = ($pageNo - 1) * $this->DisplayGroups + 1;
				if ($this->StartGroup <= 0) {
					$this->StartGroup = 1;
				} elseif ($this->StartGroup >= intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1) {
					$this->StartGroup = intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1;
				}
				$this->setStartGroup($this->StartGroup);
			} else {
				$this->StartGroup = $this->getStartGroup();
			}
		} else {
			$this->StartGroup = $this->getStartGroup();
		}

		// Check if correct start group counter
		if (!is_numeric($this->StartGroup) || $this->StartGroup == "") { // Avoid invalid start group counter
			$this->StartGroup = 1; // Reset start group counter
			$this->setStartGroup($this->StartGroup);
		} elseif (intval($this->StartGroup) > intval($this->TotalGroups)) { // Avoid starting group > total groups
			$this->StartGroup = intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1; // Point to last page first group
			$this->setStartGroup($this->StartGroup);
		} elseif (($this->StartGroup-1) % $this->DisplayGroups <> 0) {
			$this->StartGroup = intval(($this->StartGroup - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1; // Point to page boundary
			$this->setStartGroup($this->StartGroup);
		}
	}

	// Reset pager
	protected function resetPager()
	{

		// Reset start position (reset command)
		$this->StartGroup = 1;
		$this->setStartGroup($this->StartGroup);
	}

	// Set up number of groups displayed per page
	protected function setupDisplayGroups()
	{
		if (ReportParam(TABLE_GROUP_PER_PAGE) !== NULL) {
			$wrk = ReportParam(TABLE_GROUP_PER_PAGE);
			if (is_numeric($wrk)) {
				$this->DisplayGroups = intval($wrk);
			} else {
				if (strtoupper($wrk) == "ALL") { // Display all groups
					$this->DisplayGroups = -1;
				} else {
					$this->DisplayGroups = 3; // Non-numeric, load default
				}
			}
			$this->setGroupPerPage($this->DisplayGroups); // Save to session

			// Reset start position (reset command)
			$this->StartGroup = 1;
			$this->setStartGroup($this->StartGroup);
		} else {
			if ($this->getGroupPerPage() <> "") {
				$this->DisplayGroups = $this->getGroupPerPage(); // Restore from session
			} else {
				$this->DisplayGroups = 3; // Load default
			}
		}
	}

	// Get sort parameters based on sort links clicked
	protected function getSort()
	{
		if ($this->DrillDown)
			return "";
		$resetSort = ReportParam("cmd") === "resetsort";
		$orderBy = ReportParam("order", "");
		$orderType = ReportParam("ordertype", "");

		// Check for a resetsort command
		if ($resetSort) {
			$this->setOrderBy("");
			$this->setStartGroup(1);
			$this->first_name->setSort("");
			$this->WhereDidYouHear->setSort("");
			$this->street->setSort("");
			$this->town->setSort("");
			$this->province->setSort("");
			$this->country->setSort("");
			$this->postal_code->setSort("");
			$this->PEmail->setSort("");
			$this->PEmergencyContact->setSort("");

		// Check for an Order parameter
		} elseif ($orderBy <> "") {
			$this->CurrentOrder = $orderBy;
			$this->CurrentOrderType = $orderType;
			$sortSql = $this->sortSql();
			$this->setOrderBy($sortSql);
			$this->setStartGroup(1);
		}
		return $this->getOrderBy();
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Render lookup
					$this->RowType == ROWTYPE_VIEW;
					$fn = $fld->Lookup->RenderViewFunc;
					$render = method_exists($this, $fn);

					// Format the field values
					$fld->setDbValue($row[1]);
					if ($render) {
						$this->$fn();
						$row[1] = $fld->ViewValue;
						$row['df'] = $row[1];
					} elseif ($fld->isEncrypt()) {
						$row[1] = $fld->CurrentValue;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Return popup filter
	protected function getPopupFilter()
	{
		$wrk = "";
		if ($this->DrillDown)
			return "";
		return $wrk;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>