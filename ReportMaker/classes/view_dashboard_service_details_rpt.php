<?php
namespace PHPReportMaker12\HIMS___2019;

/**
 * Page class (view_dashboard_service_details_rpt)
 */
class view_dashboard_service_details_rpt extends view_dashboard_service_details_base
{

	// Page ID
	public $PageID = 'rpt';

	// Project ID
	public $ProjectID = "{55283AC9-9E27-42B1-8A30-44C43BC7CEA5}";

	// Page object name
	public $PageObjName = 'view_dashboard_service_details_rpt';
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

		// Table object (view_dashboard_service_details_base)
		if (!isset($GLOBALS["view_dashboard_service_details_base"])) {
			$GLOBALS["view_dashboard_service_details_base"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_dashboard_service_details_base"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportEmailUrl = $this->pageUrl() . "export=email";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'rpt');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_dashboard_service_details');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fview_dashboard_service_detailsrpt";

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
			return "<a class=\"ew-export-link ew-email\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" id=\"emf_view_dashboard_service_details\" href=\"#\" onclick=\"ew.emailDialogShow({ lnk: 'emf_view_dashboard_service_details', hdr: ew.language.phrase('ExportToEmail'), url: '$this->ExportEmailUrl', exportid: '$exportId', el: this }); return false;\">" . $ReportLanguage->phrase("ExportToEmail") . "</a>";
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
		$item->Visible = FALSE;
		$reportTypes["print"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPrint") : "";

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = FALSE;
		$reportTypes["excel"] = $item->Visible ? $ReportLanguage->phrase("ReportFormExcel") : "";

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = FALSE;
		$reportTypes["word"] = $item->Visible ? $ReportLanguage->phrase("ReportFormWord") : "";

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;
		$item->Visible = FALSE;
		$reportTypes["pdf"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPdf") : "";

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = FALSE;
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_dashboard_service_detailsrpt\" href=\"#\">" . $ReportLanguage->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_dashboard_service_detailsrpt\" href=\"#\">" . $ReportLanguage->phrase("DeleteFilter") . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fview_dashboard_service_detailsrpt\">" . $ReportLanguage->phrase("SearchBtn") . "</button>";
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
		$Security->loadCurrentUserLevel($this->ProjectID . 'view_dashboard_service_details');
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

		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Services->setVisibility();
		$this->amount->setVisibility();
		$this->SubTotal->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->createdDate->setVisibility();
		$this->DrName->setVisibility();
		$this->DRDepartment->setVisibility();
		$this->ItemCode->setVisibility();
		$this->DEptCd->setVisibility();
		$this->CODE->setVisibility();
		$this->SERVICE->setVisibility();
		$this->SERVICE_TYPE->setVisibility();
		$this->DEPARTMENT->setVisibility();
		$this->HospID->setVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$fieldCount = 18;
		$groupCount = 1;
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
		$this->Columns = [[FALSE, FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE]];

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

		// Get total count
		$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
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

		// Get current page records
		$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(), $this->Filter, $this->Sort);
		$this->Recordset = $this->getRecordset($sql, $this->DisplayGroups, $this->StartGroup - 1);
		$this->setupFieldCount();
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

	// Load row values
	public function loadRowValues($firstRow = FALSE)
	{
		if (!$this->Recordset)
			return;
		if ($firstRow) { // Get first row
				$this->FirstRowData = [];
				$this->FirstRowData["PatientId"] = $this->Recordset->fields('PatientId');
				$this->FirstRowData["PatientName"] = $this->Recordset->fields('PatientName');
				$this->FirstRowData["Services"] = $this->Recordset->fields('Services');
				$this->FirstRowData["amount"] = $this->Recordset->fields('amount');
				$this->FirstRowData["SubTotal"] = $this->Recordset->fields('SubTotal');
				$this->FirstRowData["createdby"] = $this->Recordset->fields('createdby');
				$this->FirstRowData["createddatetime"] = $this->Recordset->fields('createddatetime');
				$this->FirstRowData["createdDate"] = $this->Recordset->fields('createdDate');
				$this->FirstRowData["DrName"] = $this->Recordset->fields('DrName');
				$this->FirstRowData["DRDepartment"] = $this->Recordset->fields('DRDepartment');
				$this->FirstRowData["ItemCode"] = $this->Recordset->fields('ItemCode');
				$this->FirstRowData["DEptCd"] = $this->Recordset->fields('DEptCd');
				$this->FirstRowData["CODE"] = $this->Recordset->fields('CODE');
				$this->FirstRowData["SERVICE"] = $this->Recordset->fields('SERVICE');
				$this->FirstRowData["SERVICE_TYPE"] = $this->Recordset->fields('SERVICE_TYPE');
				$this->FirstRowData["DEPARTMENT"] = $this->Recordset->fields('DEPARTMENT');
				$this->FirstRowData["HospID"] = $this->Recordset->fields('HospID');
		} else { // Get next row
			$this->Recordset->moveNext();
		}
		if (!$this->Recordset->EOF) {
			$this->PatientId->setDbValue($this->Recordset->fields('PatientId'));
			$this->PatientName->setDbValue($this->Recordset->fields('PatientName'));
			$this->Services->setDbValue($this->Recordset->fields('Services'));
			$this->amount->setDbValue($this->Recordset->fields('amount'));
			$this->SubTotal->setDbValue($this->Recordset->fields('SubTotal'));
			$this->createdby->setDbValue($this->Recordset->fields('createdby'));
			$this->createddatetime->setDbValue($this->Recordset->fields('createddatetime'));
			$this->createdDate->setDbValue($this->Recordset->fields('createdDate'));
			$this->DrName->setDbValue($this->Recordset->fields('DrName'));
			$this->DRDepartment->setDbValue($this->Recordset->fields('DRDepartment'));
			$this->ItemCode->setDbValue($this->Recordset->fields('ItemCode'));
			$this->DEptCd->setDbValue($this->Recordset->fields('DEptCd'));
			$this->CODE->setDbValue($this->Recordset->fields('CODE'));
			$this->SERVICE->setDbValue($this->Recordset->fields('SERVICE'));
			$this->SERVICE_TYPE->setDbValue($this->Recordset->fields('SERVICE_TYPE'));
			$this->DEPARTMENT->setDbValue($this->Recordset->fields('DEPARTMENT'));
			$this->HospID->setDbValue($this->Recordset->fields('HospID'));
			$this->Values[1] = $this->PatientId->CurrentValue;
			$this->Values[2] = $this->PatientName->CurrentValue;
			$this->Values[3] = $this->Services->CurrentValue;
			$this->Values[4] = $this->amount->CurrentValue;
			$this->Values[5] = $this->SubTotal->CurrentValue;
			$this->Values[6] = $this->createdby->CurrentValue;
			$this->Values[7] = $this->createddatetime->CurrentValue;
			$this->Values[8] = $this->createdDate->CurrentValue;
			$this->Values[9] = $this->DrName->CurrentValue;
			$this->Values[10] = $this->DRDepartment->CurrentValue;
			$this->Values[11] = $this->ItemCode->CurrentValue;
			$this->Values[12] = $this->DEptCd->CurrentValue;
			$this->Values[13] = $this->CODE->CurrentValue;
			$this->Values[14] = $this->SERVICE->CurrentValue;
			$this->Values[15] = $this->SERVICE_TYPE->CurrentValue;
			$this->Values[16] = $this->DEPARTMENT->CurrentValue;
			$this->Values[17] = $this->HospID->CurrentValue;
		} else {
			$this->PatientId->setDbValue("");
			$this->PatientName->setDbValue("");
			$this->Services->setDbValue("");
			$this->amount->setDbValue("");
			$this->SubTotal->setDbValue("");
			$this->createdby->setDbValue("");
			$this->createddatetime->setDbValue("");
			$this->createdDate->setDbValue("");
			$this->DrName->setDbValue("");
			$this->DRDepartment->setDbValue("");
			$this->ItemCode->setDbValue("");
			$this->DEptCd->setDbValue("");
			$this->CODE->setDbValue("");
			$this->SERVICE->setDbValue("");
			$this->SERVICE_TYPE->setDbValue("");
			$this->DEPARTMENT->setDbValue("");
			$this->HospID->setDbValue("");
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

			// PatientId
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->HrefValue = "";

			// Services
			$this->Services->HrefValue = "";

			// amount
			$this->amount->HrefValue = "";

			// SubTotal
			$this->SubTotal->HrefValue = "";

			// createdby
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->HrefValue = "";

			// createdDate
			$this->createdDate->HrefValue = "";

			// DrName
			$this->DrName->HrefValue = "";

			// DRDepartment
			$this->DRDepartment->HrefValue = "";

			// ItemCode
			$this->ItemCode->HrefValue = "";

			// DEptCd
			$this->DEptCd->HrefValue = "";

			// CODE
			$this->CODE->HrefValue = "";

			// SERVICE
			$this->SERVICE->HrefValue = "";

			// SERVICE_TYPE
			$this->SERVICE_TYPE->HrefValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->HrefValue = "";

			// HospID
			$this->HospID->HrefValue = "";
		} else {
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER) {
			} else {
			}

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Services
			$this->Services->ViewValue = $this->Services->CurrentValue;
			$this->Services->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// SubTotal
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createdDate
			$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
			$this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 0);
			$this->createdDate->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// DrName
			$this->DrName->ViewValue = $this->DrName->CurrentValue;
			$this->DrName->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// DRDepartment
			$this->DRDepartment->ViewValue = $this->DRDepartment->CurrentValue;
			$this->DRDepartment->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// ItemCode
			$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
			$this->ItemCode->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// CODE
			$this->CODE->ViewValue = $this->CODE->CurrentValue;
			$this->CODE->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// SERVICE
			$this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
			$this->SERVICE->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// SERVICE_TYPE
			$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
			$this->SERVICE_TYPE->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// DEPARTMENT
			$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
			$this->DEPARTMENT->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PatientId
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->HrefValue = "";

			// Services
			$this->Services->HrefValue = "";

			// amount
			$this->amount->HrefValue = "";

			// SubTotal
			$this->SubTotal->HrefValue = "";

			// createdby
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->HrefValue = "";

			// createdDate
			$this->createdDate->HrefValue = "";

			// DrName
			$this->DrName->HrefValue = "";

			// DRDepartment
			$this->DRDepartment->HrefValue = "";

			// ItemCode
			$this->ItemCode->HrefValue = "";

			// DEptCd
			$this->DEptCd->HrefValue = "";

			// CODE
			$this->CODE->HrefValue = "";

			// SERVICE
			$this->SERVICE->HrefValue = "";

			// SERVICE_TYPE
			$this->SERVICE_TYPE->HrefValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->HrefValue = "";

			// HospID
			$this->HospID->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == ROWTYPE_TOTAL) { // Summary row
		} else {

			// PatientId
			$currentValue = $this->PatientId->CurrentValue;
			$viewValue = &$this->PatientId->ViewValue;
			$viewAttrs = &$this->PatientId->ViewAttrs;
			$cellAttrs = &$this->PatientId->CellAttrs;
			$hrefValue = &$this->PatientId->HrefValue;
			$linkAttrs = &$this->PatientId->LinkAttrs;
			$this->Cell_Rendered($this->PatientId, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PatientName
			$currentValue = $this->PatientName->CurrentValue;
			$viewValue = &$this->PatientName->ViewValue;
			$viewAttrs = &$this->PatientName->ViewAttrs;
			$cellAttrs = &$this->PatientName->CellAttrs;
			$hrefValue = &$this->PatientName->HrefValue;
			$linkAttrs = &$this->PatientName->LinkAttrs;
			$this->Cell_Rendered($this->PatientName, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Services
			$currentValue = $this->Services->CurrentValue;
			$viewValue = &$this->Services->ViewValue;
			$viewAttrs = &$this->Services->ViewAttrs;
			$cellAttrs = &$this->Services->CellAttrs;
			$hrefValue = &$this->Services->HrefValue;
			$linkAttrs = &$this->Services->LinkAttrs;
			$this->Cell_Rendered($this->Services, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// amount
			$currentValue = $this->amount->CurrentValue;
			$viewValue = &$this->amount->ViewValue;
			$viewAttrs = &$this->amount->ViewAttrs;
			$cellAttrs = &$this->amount->CellAttrs;
			$hrefValue = &$this->amount->HrefValue;
			$linkAttrs = &$this->amount->LinkAttrs;
			$this->Cell_Rendered($this->amount, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// SubTotal
			$currentValue = $this->SubTotal->CurrentValue;
			$viewValue = &$this->SubTotal->ViewValue;
			$viewAttrs = &$this->SubTotal->ViewAttrs;
			$cellAttrs = &$this->SubTotal->CellAttrs;
			$hrefValue = &$this->SubTotal->HrefValue;
			$linkAttrs = &$this->SubTotal->LinkAttrs;
			$this->Cell_Rendered($this->SubTotal, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// createdby
			$currentValue = $this->createdby->CurrentValue;
			$viewValue = &$this->createdby->ViewValue;
			$viewAttrs = &$this->createdby->ViewAttrs;
			$cellAttrs = &$this->createdby->CellAttrs;
			$hrefValue = &$this->createdby->HrefValue;
			$linkAttrs = &$this->createdby->LinkAttrs;
			$this->Cell_Rendered($this->createdby, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// createddatetime
			$currentValue = $this->createddatetime->CurrentValue;
			$viewValue = &$this->createddatetime->ViewValue;
			$viewAttrs = &$this->createddatetime->ViewAttrs;
			$cellAttrs = &$this->createddatetime->CellAttrs;
			$hrefValue = &$this->createddatetime->HrefValue;
			$linkAttrs = &$this->createddatetime->LinkAttrs;
			$this->Cell_Rendered($this->createddatetime, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// createdDate
			$currentValue = $this->createdDate->CurrentValue;
			$viewValue = &$this->createdDate->ViewValue;
			$viewAttrs = &$this->createdDate->ViewAttrs;
			$cellAttrs = &$this->createdDate->CellAttrs;
			$hrefValue = &$this->createdDate->HrefValue;
			$linkAttrs = &$this->createdDate->LinkAttrs;
			$this->Cell_Rendered($this->createdDate, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// DrName
			$currentValue = $this->DrName->CurrentValue;
			$viewValue = &$this->DrName->ViewValue;
			$viewAttrs = &$this->DrName->ViewAttrs;
			$cellAttrs = &$this->DrName->CellAttrs;
			$hrefValue = &$this->DrName->HrefValue;
			$linkAttrs = &$this->DrName->LinkAttrs;
			$this->Cell_Rendered($this->DrName, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// DRDepartment
			$currentValue = $this->DRDepartment->CurrentValue;
			$viewValue = &$this->DRDepartment->ViewValue;
			$viewAttrs = &$this->DRDepartment->ViewAttrs;
			$cellAttrs = &$this->DRDepartment->CellAttrs;
			$hrefValue = &$this->DRDepartment->HrefValue;
			$linkAttrs = &$this->DRDepartment->LinkAttrs;
			$this->Cell_Rendered($this->DRDepartment, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// ItemCode
			$currentValue = $this->ItemCode->CurrentValue;
			$viewValue = &$this->ItemCode->ViewValue;
			$viewAttrs = &$this->ItemCode->ViewAttrs;
			$cellAttrs = &$this->ItemCode->CellAttrs;
			$hrefValue = &$this->ItemCode->HrefValue;
			$linkAttrs = &$this->ItemCode->LinkAttrs;
			$this->Cell_Rendered($this->ItemCode, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// DEptCd
			$currentValue = $this->DEptCd->CurrentValue;
			$viewValue = &$this->DEptCd->ViewValue;
			$viewAttrs = &$this->DEptCd->ViewAttrs;
			$cellAttrs = &$this->DEptCd->CellAttrs;
			$hrefValue = &$this->DEptCd->HrefValue;
			$linkAttrs = &$this->DEptCd->LinkAttrs;
			$this->Cell_Rendered($this->DEptCd, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// CODE
			$currentValue = $this->CODE->CurrentValue;
			$viewValue = &$this->CODE->ViewValue;
			$viewAttrs = &$this->CODE->ViewAttrs;
			$cellAttrs = &$this->CODE->CellAttrs;
			$hrefValue = &$this->CODE->HrefValue;
			$linkAttrs = &$this->CODE->LinkAttrs;
			$this->Cell_Rendered($this->CODE, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// SERVICE
			$currentValue = $this->SERVICE->CurrentValue;
			$viewValue = &$this->SERVICE->ViewValue;
			$viewAttrs = &$this->SERVICE->ViewAttrs;
			$cellAttrs = &$this->SERVICE->CellAttrs;
			$hrefValue = &$this->SERVICE->HrefValue;
			$linkAttrs = &$this->SERVICE->LinkAttrs;
			$this->Cell_Rendered($this->SERVICE, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// SERVICE_TYPE
			$currentValue = $this->SERVICE_TYPE->CurrentValue;
			$viewValue = &$this->SERVICE_TYPE->ViewValue;
			$viewAttrs = &$this->SERVICE_TYPE->ViewAttrs;
			$cellAttrs = &$this->SERVICE_TYPE->CellAttrs;
			$hrefValue = &$this->SERVICE_TYPE->HrefValue;
			$linkAttrs = &$this->SERVICE_TYPE->LinkAttrs;
			$this->Cell_Rendered($this->SERVICE_TYPE, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// DEPARTMENT
			$currentValue = $this->DEPARTMENT->CurrentValue;
			$viewValue = &$this->DEPARTMENT->ViewValue;
			$viewAttrs = &$this->DEPARTMENT->ViewAttrs;
			$cellAttrs = &$this->DEPARTMENT->CellAttrs;
			$hrefValue = &$this->DEPARTMENT->HrefValue;
			$linkAttrs = &$this->DEPARTMENT->LinkAttrs;
			$this->Cell_Rendered($this->DEPARTMENT, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// HospID
			$currentValue = $this->HospID->CurrentValue;
			$viewValue = &$this->HospID->ViewValue;
			$viewAttrs = &$this->HospID->ViewAttrs;
			$cellAttrs = &$this->HospID->CellAttrs;
			$hrefValue = &$this->HospID->HrefValue;
			$linkAttrs = &$this->HospID->LinkAttrs;
			$this->Cell_Rendered($this->HospID, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
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
		if ($this->PatientId->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PatientName->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Services->Visible)
			$this->DetailColumnCount += 1;
		if ($this->amount->Visible)
			$this->DetailColumnCount += 1;
		if ($this->SubTotal->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createdby->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createddatetime->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createdDate->Visible)
			$this->DetailColumnCount += 1;
		if ($this->DrName->Visible)
			$this->DetailColumnCount += 1;
		if ($this->DRDepartment->Visible)
			$this->DetailColumnCount += 1;
		if ($this->ItemCode->Visible)
			$this->DetailColumnCount += 1;
		if ($this->DEptCd->Visible)
			$this->DetailColumnCount += 1;
		if ($this->CODE->Visible)
			$this->DetailColumnCount += 1;
		if ($this->SERVICE->Visible)
			$this->DetailColumnCount += 1;
		if ($this->SERVICE_TYPE->Visible)
			$this->DetailColumnCount += 1;
		if ($this->DEPARTMENT->Visible)
			$this->DetailColumnCount += 1;
		if ($this->HospID->Visible)
			$this->DetailColumnCount += 1;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/") + 1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', "", $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("rpt", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Set up export options (extended)
	protected function setupExportOptionsExt()
	{
		global $ReportLanguage, $ReportOptions;
		$reportTypes = $ReportOptions["ReportTypes"];
		$item = &$this->ExportOptions->getItem("pdf");
		$item->Visible = FALSE;
		if ($item->Visible)
			$reportTypes["pdf"] = $ReportLanguage->phrase("ReportFormPdf");
		$item->Body = "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPdfUrl . "', '" . session_id() . "');\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		$ReportOptions["ReportTypes"] = $reportTypes;
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
			$this->PatientId->setSort("");
			$this->PatientName->setSort("");
			$this->Services->setSort("");
			$this->amount->setSort("");
			$this->SubTotal->setSort("");
			$this->createdby->setSort("");
			$this->createddatetime->setSort("");
			$this->createdDate->setSort("");
			$this->DrName->setSort("");
			$this->DRDepartment->setSort("");
			$this->ItemCode->setSort("");
			$this->DEptCd->setSort("");
			$this->CODE->setSort("");
			$this->SERVICE->setSort("");
			$this->SERVICE_TYPE->setSort("");
			$this->DEPARTMENT->setSort("");
			$this->HospID->setSort("");

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