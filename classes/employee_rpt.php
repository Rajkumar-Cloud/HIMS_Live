<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class (employee_rpt)
 */
class employee_rpt extends employee_base
{

	// Page ID
	public $PageID = 'rpt';

	// Project ID
	public $ProjectID = "{758F4792-112B-4545-BC16-BF571BA72FA2}";

	// Page object name
	public $PageObjName = 'employee_rpt';
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

		// Table object (employee_base)
		if (!isset($GLOBALS["employee_base"])) {
			$GLOBALS["employee_base"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee_base"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');

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
		$this->FilterOptions->TagClassName = "ew-filter-option femployeerpt";

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
			return "<a class=\"ew-export-link ew-email\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" id=\"emf_employee\" href=\"#\" onclick=\"ew.emailDialogShow({ lnk: 'emf_employee', hdr: ew.language.phrase('ExportToEmail'), url: '$this->ExportEmailUrl', exportid: '$exportId', el: this }); return false;\">" . $ReportLanguage->phrase("ExportToEmail") . "</a>";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"femployeerpt\" href=\"#\">" . $ReportLanguage->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"femployeerpt\" href=\"#\">" . $ReportLanguage->phrase("DeleteFilter") . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"femployeerpt\">" . $ReportLanguage->phrase("SearchBtn") . "</button>";
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
		$Security->loadCurrentUserLevel($this->ProjectID . 'employee');
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

		$this->id->setVisibility();
		$this->empNo->setVisibility();
		$this->tittle->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->_gender->setVisibility();
		$this->dob->setVisibility();
		$this->start_date->setVisibility();
		$this->end_date->setVisibility();
		$this->employee_role_id->setVisibility();
		$this->default_shift_start->setVisibility();
		$this->default_shift_end->setVisibility();
		$this->working_days->setVisibility();
		$this->_working_location->setVisibility();
		$this->profilePic->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$fieldCount = 22;
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
		$this->Columns = [[FALSE, FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE]];

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
				$this->FirstRowData["id"] = $this->Recordset->fields('id');
				$this->FirstRowData["empNo"] = $this->Recordset->fields('empNo');
				$this->FirstRowData["tittle"] = $this->Recordset->fields('tittle');
				$this->FirstRowData["first_name"] = $this->Recordset->fields('first_name');
				$this->FirstRowData["middle_name"] = $this->Recordset->fields('middle_name');
				$this->FirstRowData["last_name"] = $this->Recordset->fields('last_name');
				$this->FirstRowData["_gender"] = $this->Recordset->fields('gender');
				$this->FirstRowData["dob"] = $this->Recordset->fields('dob');
				$this->FirstRowData["start_date"] = $this->Recordset->fields('start_date');
				$this->FirstRowData["end_date"] = $this->Recordset->fields('end_date');
				$this->FirstRowData["employee_role_id"] = $this->Recordset->fields('employee_role_id');
				$this->FirstRowData["default_shift_start"] = $this->Recordset->fields('default_shift_start');
				$this->FirstRowData["default_shift_end"] = $this->Recordset->fields('default_shift_end');
				$this->FirstRowData["working_days"] = $this->Recordset->fields('working_days');
				$this->FirstRowData["_working_location"] = $this->Recordset->fields('working_location');
				$this->FirstRowData["profilePic"] = $this->Recordset->fields('profilePic');
				$this->FirstRowData["status"] = $this->Recordset->fields('status');
				$this->FirstRowData["createdby"] = $this->Recordset->fields('createdby');
				$this->FirstRowData["createddatetime"] = $this->Recordset->fields('createddatetime');
				$this->FirstRowData["modifiedby"] = $this->Recordset->fields('modifiedby');
				$this->FirstRowData["modifieddatetime"] = $this->Recordset->fields('modifieddatetime');
		} else { // Get next row
			$this->Recordset->moveNext();
		}
		if (!$this->Recordset->EOF) {
			$this->id->setDbValue($this->Recordset->fields('id'));
			$this->empNo->setDbValue($this->Recordset->fields('empNo'));
			$this->tittle->setDbValue($this->Recordset->fields('tittle'));
			$this->first_name->setDbValue($this->Recordset->fields('first_name'));
			$this->middle_name->setDbValue($this->Recordset->fields('middle_name'));
			$this->last_name->setDbValue($this->Recordset->fields('last_name'));
			$this->_gender->setDbValue($this->Recordset->fields('gender'));
			$this->dob->setDbValue($this->Recordset->fields('dob'));
			$this->start_date->setDbValue($this->Recordset->fields('start_date'));
			$this->end_date->setDbValue($this->Recordset->fields('end_date'));
			$this->employee_role_id->setDbValue($this->Recordset->fields('employee_role_id'));
			$this->default_shift_start->setDbValue($this->Recordset->fields('default_shift_start'));
			$this->default_shift_end->setDbValue($this->Recordset->fields('default_shift_end'));
			$this->working_days->setDbValue($this->Recordset->fields('working_days'));
			$this->_working_location->setDbValue($this->Recordset->fields('working_location'));
			$this->profilePic->setDbValue($this->Recordset->fields('profilePic'));
			$this->status->setDbValue($this->Recordset->fields('status'));
			$this->createdby->setDbValue($this->Recordset->fields('createdby'));
			$this->createddatetime->setDbValue($this->Recordset->fields('createddatetime'));
			$this->modifiedby->setDbValue($this->Recordset->fields('modifiedby'));
			$this->modifieddatetime->setDbValue($this->Recordset->fields('modifieddatetime'));
			$this->Values[1] = $this->id->CurrentValue;
			$this->Values[2] = $this->empNo->CurrentValue;
			$this->Values[3] = $this->tittle->CurrentValue;
			$this->Values[4] = $this->first_name->CurrentValue;
			$this->Values[5] = $this->middle_name->CurrentValue;
			$this->Values[6] = $this->last_name->CurrentValue;
			$this->Values[7] = $this->_gender->CurrentValue;
			$this->Values[8] = $this->dob->CurrentValue;
			$this->Values[9] = $this->start_date->CurrentValue;
			$this->Values[10] = $this->end_date->CurrentValue;
			$this->Values[11] = $this->employee_role_id->CurrentValue;
			$this->Values[12] = $this->default_shift_start->CurrentValue;
			$this->Values[13] = $this->default_shift_end->CurrentValue;
			$this->Values[14] = $this->working_days->CurrentValue;
			$this->Values[15] = $this->_working_location->CurrentValue;
			$this->Values[16] = $this->profilePic->CurrentValue;
			$this->Values[17] = $this->status->CurrentValue;
			$this->Values[18] = $this->createdby->CurrentValue;
			$this->Values[19] = $this->createddatetime->CurrentValue;
			$this->Values[20] = $this->modifiedby->CurrentValue;
			$this->Values[21] = $this->modifieddatetime->CurrentValue;
		} else {
			$this->id->setDbValue("");
			$this->empNo->setDbValue("");
			$this->tittle->setDbValue("");
			$this->first_name->setDbValue("");
			$this->middle_name->setDbValue("");
			$this->last_name->setDbValue("");
			$this->_gender->setDbValue("");
			$this->dob->setDbValue("");
			$this->start_date->setDbValue("");
			$this->end_date->setDbValue("");
			$this->employee_role_id->setDbValue("");
			$this->default_shift_start->setDbValue("");
			$this->default_shift_end->setDbValue("");
			$this->working_days->setDbValue("");
			$this->_working_location->setDbValue("");
			$this->profilePic->setDbValue("");
			$this->status->setDbValue("");
			$this->createdby->setDbValue("");
			$this->createddatetime->setDbValue("");
			$this->modifiedby->setDbValue("");
			$this->modifieddatetime->setDbValue("");
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

			// id
			$this->id->HrefValue = "";

			// empNo
			$this->empNo->HrefValue = "";

			// tittle
			$this->tittle->HrefValue = "";

			// first_name
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->HrefValue = "";

			// gender
			$this->_gender->HrefValue = "";

			// dob
			$this->dob->HrefValue = "";

			// start_date
			$this->start_date->HrefValue = "";

			// end_date
			$this->end_date->HrefValue = "";

			// employee_role_id
			$this->employee_role_id->HrefValue = "";

			// default_shift_start
			$this->default_shift_start->HrefValue = "";

			// default_shift_end
			$this->default_shift_end->HrefValue = "";

			// working_days
			$this->working_days->HrefValue = "";

			// working_location
			$this->_working_location->HrefValue = "";

			// profilePic
			$this->profilePic->HrefValue = "";

			// status
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->HrefValue = "";
		} else {
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER) {
			} else {
			}

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// empNo
			$this->empNo->ViewValue = $this->empNo->CurrentValue;
			$this->empNo->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// tittle
			$this->tittle->ViewValue = $this->tittle->CurrentValue;
			$this->tittle->ViewValue = FormatNumber($this->tittle->ViewValue, 0, -2, -2, -2);
			$this->tittle->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// middle_name
			$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
			$this->middle_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// gender
			$this->_gender->ViewValue = $this->_gender->CurrentValue;
			$this->_gender->ViewValue = FormatNumber($this->_gender->ViewValue, 0, -2, -2, -2);
			$this->_gender->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
			$this->dob->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
			$this->start_date->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 0);
			$this->end_date->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// employee_role_id
			$this->employee_role_id->ViewValue = $this->employee_role_id->CurrentValue;
			$this->employee_role_id->ViewValue = FormatNumber($this->employee_role_id->ViewValue, 0, -2, -2, -2);
			$this->employee_role_id->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// default_shift_start
			$this->default_shift_start->ViewValue = $this->default_shift_start->CurrentValue;
			$this->default_shift_start->ViewValue = FormatDateTime($this->default_shift_start->ViewValue, 4);
			$this->default_shift_start->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// default_shift_end
			$this->default_shift_end->ViewValue = $this->default_shift_end->CurrentValue;
			$this->default_shift_end->ViewValue = FormatDateTime($this->default_shift_end->ViewValue, 4);
			$this->default_shift_end->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// working_days
			$this->working_days->ViewValue = $this->working_days->CurrentValue;
			$this->working_days->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// working_location
			$this->_working_location->ViewValue = $this->_working_location->CurrentValue;
			$this->_working_location->ViewValue = FormatNumber($this->_working_location->ViewValue, 0, -2, -2, -2);
			$this->_working_location->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// id
			$this->id->HrefValue = "";

			// empNo
			$this->empNo->HrefValue = "";

			// tittle
			$this->tittle->HrefValue = "";

			// first_name
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->HrefValue = "";

			// gender
			$this->_gender->HrefValue = "";

			// dob
			$this->dob->HrefValue = "";

			// start_date
			$this->start_date->HrefValue = "";

			// end_date
			$this->end_date->HrefValue = "";

			// employee_role_id
			$this->employee_role_id->HrefValue = "";

			// default_shift_start
			$this->default_shift_start->HrefValue = "";

			// default_shift_end
			$this->default_shift_end->HrefValue = "";

			// working_days
			$this->working_days->HrefValue = "";

			// working_location
			$this->_working_location->HrefValue = "";

			// profilePic
			$this->profilePic->HrefValue = "";

			// status
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == ROWTYPE_TOTAL) { // Summary row
		} else {

			// id
			$currentValue = $this->id->CurrentValue;
			$viewValue = &$this->id->ViewValue;
			$viewAttrs = &$this->id->ViewAttrs;
			$cellAttrs = &$this->id->CellAttrs;
			$hrefValue = &$this->id->HrefValue;
			$linkAttrs = &$this->id->LinkAttrs;
			$this->Cell_Rendered($this->id, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// empNo
			$currentValue = $this->empNo->CurrentValue;
			$viewValue = &$this->empNo->ViewValue;
			$viewAttrs = &$this->empNo->ViewAttrs;
			$cellAttrs = &$this->empNo->CellAttrs;
			$hrefValue = &$this->empNo->HrefValue;
			$linkAttrs = &$this->empNo->LinkAttrs;
			$this->Cell_Rendered($this->empNo, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// tittle
			$currentValue = $this->tittle->CurrentValue;
			$viewValue = &$this->tittle->ViewValue;
			$viewAttrs = &$this->tittle->ViewAttrs;
			$cellAttrs = &$this->tittle->CellAttrs;
			$hrefValue = &$this->tittle->HrefValue;
			$linkAttrs = &$this->tittle->LinkAttrs;
			$this->Cell_Rendered($this->tittle, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// first_name
			$currentValue = $this->first_name->CurrentValue;
			$viewValue = &$this->first_name->ViewValue;
			$viewAttrs = &$this->first_name->ViewAttrs;
			$cellAttrs = &$this->first_name->CellAttrs;
			$hrefValue = &$this->first_name->HrefValue;
			$linkAttrs = &$this->first_name->LinkAttrs;
			$this->Cell_Rendered($this->first_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// middle_name
			$currentValue = $this->middle_name->CurrentValue;
			$viewValue = &$this->middle_name->ViewValue;
			$viewAttrs = &$this->middle_name->ViewAttrs;
			$cellAttrs = &$this->middle_name->CellAttrs;
			$hrefValue = &$this->middle_name->HrefValue;
			$linkAttrs = &$this->middle_name->LinkAttrs;
			$this->Cell_Rendered($this->middle_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// last_name
			$currentValue = $this->last_name->CurrentValue;
			$viewValue = &$this->last_name->ViewValue;
			$viewAttrs = &$this->last_name->ViewAttrs;
			$cellAttrs = &$this->last_name->CellAttrs;
			$hrefValue = &$this->last_name->HrefValue;
			$linkAttrs = &$this->last_name->LinkAttrs;
			$this->Cell_Rendered($this->last_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// gender
			$currentValue = $this->_gender->CurrentValue;
			$viewValue = &$this->_gender->ViewValue;
			$viewAttrs = &$this->_gender->ViewAttrs;
			$cellAttrs = &$this->_gender->CellAttrs;
			$hrefValue = &$this->_gender->HrefValue;
			$linkAttrs = &$this->_gender->LinkAttrs;
			$this->Cell_Rendered($this->_gender, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// dob
			$currentValue = $this->dob->CurrentValue;
			$viewValue = &$this->dob->ViewValue;
			$viewAttrs = &$this->dob->ViewAttrs;
			$cellAttrs = &$this->dob->CellAttrs;
			$hrefValue = &$this->dob->HrefValue;
			$linkAttrs = &$this->dob->LinkAttrs;
			$this->Cell_Rendered($this->dob, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// start_date
			$currentValue = $this->start_date->CurrentValue;
			$viewValue = &$this->start_date->ViewValue;
			$viewAttrs = &$this->start_date->ViewAttrs;
			$cellAttrs = &$this->start_date->CellAttrs;
			$hrefValue = &$this->start_date->HrefValue;
			$linkAttrs = &$this->start_date->LinkAttrs;
			$this->Cell_Rendered($this->start_date, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// end_date
			$currentValue = $this->end_date->CurrentValue;
			$viewValue = &$this->end_date->ViewValue;
			$viewAttrs = &$this->end_date->ViewAttrs;
			$cellAttrs = &$this->end_date->CellAttrs;
			$hrefValue = &$this->end_date->HrefValue;
			$linkAttrs = &$this->end_date->LinkAttrs;
			$this->Cell_Rendered($this->end_date, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// employee_role_id
			$currentValue = $this->employee_role_id->CurrentValue;
			$viewValue = &$this->employee_role_id->ViewValue;
			$viewAttrs = &$this->employee_role_id->ViewAttrs;
			$cellAttrs = &$this->employee_role_id->CellAttrs;
			$hrefValue = &$this->employee_role_id->HrefValue;
			$linkAttrs = &$this->employee_role_id->LinkAttrs;
			$this->Cell_Rendered($this->employee_role_id, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// default_shift_start
			$currentValue = $this->default_shift_start->CurrentValue;
			$viewValue = &$this->default_shift_start->ViewValue;
			$viewAttrs = &$this->default_shift_start->ViewAttrs;
			$cellAttrs = &$this->default_shift_start->CellAttrs;
			$hrefValue = &$this->default_shift_start->HrefValue;
			$linkAttrs = &$this->default_shift_start->LinkAttrs;
			$this->Cell_Rendered($this->default_shift_start, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// default_shift_end
			$currentValue = $this->default_shift_end->CurrentValue;
			$viewValue = &$this->default_shift_end->ViewValue;
			$viewAttrs = &$this->default_shift_end->ViewAttrs;
			$cellAttrs = &$this->default_shift_end->CellAttrs;
			$hrefValue = &$this->default_shift_end->HrefValue;
			$linkAttrs = &$this->default_shift_end->LinkAttrs;
			$this->Cell_Rendered($this->default_shift_end, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// working_days
			$currentValue = $this->working_days->CurrentValue;
			$viewValue = &$this->working_days->ViewValue;
			$viewAttrs = &$this->working_days->ViewAttrs;
			$cellAttrs = &$this->working_days->CellAttrs;
			$hrefValue = &$this->working_days->HrefValue;
			$linkAttrs = &$this->working_days->LinkAttrs;
			$this->Cell_Rendered($this->working_days, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// working_location
			$currentValue = $this->_working_location->CurrentValue;
			$viewValue = &$this->_working_location->ViewValue;
			$viewAttrs = &$this->_working_location->ViewAttrs;
			$cellAttrs = &$this->_working_location->CellAttrs;
			$hrefValue = &$this->_working_location->HrefValue;
			$linkAttrs = &$this->_working_location->LinkAttrs;
			$this->Cell_Rendered($this->_working_location, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// profilePic
			$currentValue = $this->profilePic->CurrentValue;
			$viewValue = &$this->profilePic->ViewValue;
			$viewAttrs = &$this->profilePic->ViewAttrs;
			$cellAttrs = &$this->profilePic->CellAttrs;
			$hrefValue = &$this->profilePic->HrefValue;
			$linkAttrs = &$this->profilePic->LinkAttrs;
			$this->Cell_Rendered($this->profilePic, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// status
			$currentValue = $this->status->CurrentValue;
			$viewValue = &$this->status->ViewValue;
			$viewAttrs = &$this->status->ViewAttrs;
			$cellAttrs = &$this->status->CellAttrs;
			$hrefValue = &$this->status->HrefValue;
			$linkAttrs = &$this->status->LinkAttrs;
			$this->Cell_Rendered($this->status, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

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

			// modifiedby
			$currentValue = $this->modifiedby->CurrentValue;
			$viewValue = &$this->modifiedby->ViewValue;
			$viewAttrs = &$this->modifiedby->ViewAttrs;
			$cellAttrs = &$this->modifiedby->CellAttrs;
			$hrefValue = &$this->modifiedby->HrefValue;
			$linkAttrs = &$this->modifiedby->LinkAttrs;
			$this->Cell_Rendered($this->modifiedby, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// modifieddatetime
			$currentValue = $this->modifieddatetime->CurrentValue;
			$viewValue = &$this->modifieddatetime->ViewValue;
			$viewAttrs = &$this->modifieddatetime->ViewAttrs;
			$cellAttrs = &$this->modifieddatetime->CellAttrs;
			$hrefValue = &$this->modifieddatetime->HrefValue;
			$linkAttrs = &$this->modifieddatetime->LinkAttrs;
			$this->Cell_Rendered($this->modifieddatetime, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
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
		if ($this->id->Visible)
			$this->DetailColumnCount += 1;
		if ($this->empNo->Visible)
			$this->DetailColumnCount += 1;
		if ($this->tittle->Visible)
			$this->DetailColumnCount += 1;
		if ($this->first_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->middle_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->last_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->_gender->Visible)
			$this->DetailColumnCount += 1;
		if ($this->dob->Visible)
			$this->DetailColumnCount += 1;
		if ($this->start_date->Visible)
			$this->DetailColumnCount += 1;
		if ($this->end_date->Visible)
			$this->DetailColumnCount += 1;
		if ($this->employee_role_id->Visible)
			$this->DetailColumnCount += 1;
		if ($this->default_shift_start->Visible)
			$this->DetailColumnCount += 1;
		if ($this->default_shift_end->Visible)
			$this->DetailColumnCount += 1;
		if ($this->working_days->Visible)
			$this->DetailColumnCount += 1;
		if ($this->_working_location->Visible)
			$this->DetailColumnCount += 1;
		if ($this->profilePic->Visible)
			$this->DetailColumnCount += 1;
		if ($this->status->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createdby->Visible)
			$this->DetailColumnCount += 1;
		if ($this->createddatetime->Visible)
			$this->DetailColumnCount += 1;
		if ($this->modifiedby->Visible)
			$this->DetailColumnCount += 1;
		if ($this->modifieddatetime->Visible)
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
			$this->id->setSort("");
			$this->empNo->setSort("");
			$this->tittle->setSort("");
			$this->first_name->setSort("");
			$this->middle_name->setSort("");
			$this->last_name->setSort("");
			$this->_gender->setSort("");
			$this->dob->setSort("");
			$this->start_date->setSort("");
			$this->end_date->setSort("");
			$this->employee_role_id->setSort("");
			$this->default_shift_start->setSort("");
			$this->default_shift_end->setSort("");
			$this->working_days->setSort("");
			$this->_working_location->setSort("");
			$this->profilePic->setSort("");
			$this->status->setSort("");
			$this->createdby->setSort("");
			$this->createddatetime->setSort("");
			$this->modifiedby->setSort("");
			$this->modifieddatetime->setSort("");

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