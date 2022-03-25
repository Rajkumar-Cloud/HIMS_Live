<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class (DischargeSummary_summary)
 */
class DischargeSummary_summary extends DischargeSummary
{

	// Page ID
	public $PageID = 'summary';

	// Project ID
	public $ProjectID = "{758F4792-112B-4545-BC16-BF571BA72FA2}";

	// Page object name
	public $PageObjName = 'DischargeSummary_summary';
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
	public $ExportPrintCustom = TRUE;
	public $ExportExcelCustom = TRUE;
	public $ExportWordCustom = TRUE;
	public $ExportPdfCustom = TRUE;
	public $ExportEmailCustom = TRUE;

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

		// Table object (DischargeSummary)
		if (!isset($GLOBALS["DischargeSummary"])) {
			$GLOBALS["DischargeSummary"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["DischargeSummary"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'DischargeSummary');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fDischargeSummarysummary";

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
			return "<a class=\"ew-export-link ew-email\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" id=\"emf_DischargeSummary\" href=\"#\" onclick=\"ew.emailDialogShow({ lnk: 'emf_DischargeSummary', hdr: ew.language.phrase('ExportToEmail'), url: '$this->ExportEmailUrl', exportid: '$exportId', el: this }); return false;\">" . $ReportLanguage->phrase("ExportToEmail") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Security, $ReportLanguage, $ReportOptions;
		$exportId = session_id();
		$reportTypes = [];

		// Update Export URLs
		if ($this->ExportPrintCustom)
			$this->ExportPrintUrl .= "&amp;custom=1";
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		if ($this->ExportEmailCustom)
			$this->ExportEmailUrl .= "&amp;custom=1";

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print", $this->ExportPrintCustom);
		$item->Visible = TRUE;
		$reportTypes["print"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPrint") : "";

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fDischargeSummarysummary\" href=\"#\">" . $ReportLanguage->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fDischargeSummarysummary\" href=\"#\">" . $ReportLanguage->phrase("DeleteFilter") . "</a>";
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

		// Hide main table for custom layout
		if ($this->isExport() || $this->UseCustomTemplate)
			$this->ReportTableStyle = ' style="display: none;"';
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $ReportLanguage;

		// Filter panel button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = $this->FilterApplied ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fDischargeSummarysummary\">" . $ReportLanguage->phrase("SearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Reset filter
		$item = &$this->SearchOptions->add("resetfilter");
		$item->Body = "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" onclick=\"location='" . CurrentPageName() . "?cmd=reset'\">" . $ReportLanguage->phrase("ResetAllFilter") . "</button>";
		$item->Visible = TRUE && $this->FilterApplied;

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
		if (Post("customexport") == null) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		if ($this->isExport() && array_key_exists($this->Export, $EXPORT_REPORT)) {
			if (Post("data", "") <> "") {
				$content = Post("data");
				$ExportFileName = Post("filename", "");
				if ($ExportFileName == "")
					$ExportFileName = $this->TableVar;
			} else {
				$content = ob_get_contents();
			}
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
		$Security->loadCurrentUserLevel($this->ProjectID . 'DischargeSummary');
		$Security->TablePermission_Loaded();
		if (!$Security->canList()) {
			$Security->saveLastUrl();
			$this->setFailureMessage(DeniedMessage()); // Set no permission
			$this->terminate(GetUrl("index.php"));
		}

		// Get export parameters
		if (ReportParam("export") !== NULL)
			$this->Export = strtolower(ReportParam("export"));

		// Get custom export parameters
		if ($this->isExport() && Get("custom") !== NULL) {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;

		// Custom export (post back from ew.applyTemplate), export and terminate page
		if (Post("customexport") !== NULL) {
			$this->CustomExport = Post("customexport");
			$this->Export = $this->CustomExport;
			$this->terminate();
			exit();
		}
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
		$this->setupLookupOptions($this->patient_id);

		// Set field visibility for detail fields
		$this->patient_name->setVisibility();
		$this->profilePic->setVisibility();
		$this->gender->setVisibility();
		$this->age->setVisibility();
		$this->physician_id->setVisibility();
		$this->provisional_diagnosis->setVisibility();
		$this->Treatments->setVisibility();
		$this->FinalDiagnosis->setVisibility();
		$this->BP->setVisibility();
		$this->Pulse->setVisibility();
		$this->Resp->setVisibility();
		$this->SPO2->setVisibility();
		$this->FollowupAdvice->setVisibility();
		$this->NextReviewDate->setVisibility();
		$this->Medicine->setVisibility();
		$this->M->setVisibility();
		$this->A->setVisibility();
		$this->N->setVisibility();
		$this->NoOfDays->setVisibility();
		$this->PreRoute->setVisibility();
		$this->TimeOfTaking->setVisibility();
		$this->History->setVisibility();
		$this->vitals->setVisibility();
		$this->PatientID->setVisibility();
		$this->HospID->setVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$fieldCount = 26;
		$groupCount = 3;
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
		$this->Columns = [[FALSE, FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE]];

		// Set up groups per page dynamically
		$this->setupDisplayGroups();

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Check if search command
		$this->SearchCommand = (Get("cmd", "") == "search");

		// Load default filter values
		$this->loadDefaultFilters();

		// Load custom filters
		$this->Page_FilterLoad();

		// Set up popup filter
		$this->setupPopup();

		// Load group db values if necessary
		$this->loadGroupDbValues();

		// Extended filter
		$extendedFilter = "";

		// Restore filter list
		$this->restoreFilterList();

		// Build extended filter
		$extendedFilter = $this->getExtendedFilter();
		AddFilter($this->Filter, $extendedFilter);

		// Build popup filter
		$popupFilter = $this->getPopupFilter();
		AddFilter($this->Filter, $popupFilter);

		// Check if filter applied
		$this->FilterApplied = $this->checkFilter();

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
			$wrkpatient_id = $row["patient_id"];
			$wrkmrnNo = $row["mrnNo"];
			if ($lvl >= 1) {
				$val = $curValue ? $this->patient_id->CurrentValue : $this->patient_id->OldValue;
				$grpval = $curValue ? $this->patient_id->groupValue() : $this->patient_id->groupOldValue();
				if ($val === NULL && $wrkpatient_id !== NULL || $val !== NULL && $wrkpatient_id === NULL ||
					$grpval <> $this->patient_id->getGroupValueBase($wrkpatient_id))
				continue;
			}
			if ($lvl >= 2) {
				$val = $curValue ? $this->mrnNo->CurrentValue : $this->mrnNo->OldValue;
				$grpval = $curValue ? $this->mrnNo->groupValue() : $this->mrnNo->groupOldValue();
				if ($val === NULL && $wrkmrnNo !== NULL || $val !== NULL && $wrkmrnNo === NULL ||
					$grpval <> $this->mrnNo->getGroupValueBase($wrkmrnNo))
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
				return ($this->patient_id->CurrentValue === NULL && $this->patient_id->OldValue !== NULL) ||
					($this->patient_id->CurrentValue !== NULL && $this->patient_id->OldValue === NULL) ||
					($this->patient_id->groupValue() <> $this->patient_id->groupOldValue());
			case 2:
				return ($this->mrnNo->CurrentValue === NULL && $this->mrnNo->OldValue !== NULL) ||
					($this->mrnNo->CurrentValue !== NULL && $this->mrnNo->OldValue === NULL) ||
					($this->mrnNo->groupValue() <> $this->mrnNo->groupOldValue()) || $this->checkLevelBreak(1); // Recurse upper level
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
			$this->patient_id->setDbValue(""); // Init first value
		else // Get next group
			$this->GroupRecordset->moveNext();
		if (!$this->GroupRecordset->EOF)
			$this->patient_id->setDbValue($this->GroupRecordset->fields[0]);
		else
			$this->patient_id->setDbValue("");
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
				$this->FirstRowData["mrnNo"] = $this->Recordset->fields('mrnNo');
				$this->FirstRowData["patient_id"] = $this->Recordset->fields('patient_id');
				$this->FirstRowData["patient_name"] = $this->Recordset->fields('patient_name');
				$this->FirstRowData["gender"] = $this->Recordset->fields('gender');
				$this->FirstRowData["age"] = $this->Recordset->fields('age');
				$this->FirstRowData["physician_id"] = $this->Recordset->fields('physician_id');
				$this->FirstRowData["typeRegsisteration"] = $this->Recordset->fields('typeRegsisteration');
				$this->FirstRowData["PaymentCategory"] = $this->Recordset->fields('PaymentCategory');
				$this->FirstRowData["admission_consultant_id"] = $this->Recordset->fields('admission_consultant_id');
				$this->FirstRowData["leading_consultant_id"] = $this->Recordset->fields('leading_consultant_id');
				$this->FirstRowData["admission_date"] = $this->Recordset->fields('admission_date');
				$this->FirstRowData["release_date"] = $this->Recordset->fields('release_date');
				$this->FirstRowData["PaymentStatus"] = $this->Recordset->fields('PaymentStatus');
				$this->FirstRowData["status"] = $this->Recordset->fields('status');
				$this->FirstRowData["createdby"] = $this->Recordset->fields('createdby');
				$this->FirstRowData["createddatetime"] = $this->Recordset->fields('createddatetime');
				$this->FirstRowData["modifiedby"] = $this->Recordset->fields('modifiedby');
				$this->FirstRowData["modifieddatetime"] = $this->Recordset->fields('modifieddatetime');
				$this->FirstRowData["BP"] = $this->Recordset->fields('BP');
				$this->FirstRowData["Pulse"] = $this->Recordset->fields('Pulse');
				$this->FirstRowData["Resp"] = $this->Recordset->fields('Resp');
				$this->FirstRowData["SPO2"] = $this->Recordset->fields('SPO2');
				$this->FirstRowData["NextReviewDate"] = $this->Recordset->fields('NextReviewDate');
				$this->FirstRowData["Medicine"] = $this->Recordset->fields('Medicine');
				$this->FirstRowData["M"] = $this->Recordset->fields('M');
				$this->FirstRowData["A"] = $this->Recordset->fields('A');
				$this->FirstRowData["N"] = $this->Recordset->fields('N');
				$this->FirstRowData["NoOfDays"] = $this->Recordset->fields('NoOfDays');
				$this->FirstRowData["PreRoute"] = $this->Recordset->fields('PreRoute');
				$this->FirstRowData["TimeOfTaking"] = $this->Recordset->fields('TimeOfTaking');
				$this->FirstRowData["PatientID"] = $this->Recordset->fields('PatientID');
				$this->FirstRowData["HospID"] = $this->Recordset->fields('HospID');
			}
		} else { // Get next row
			$this->Recordset->moveNext();
		}
		if (!$this->Recordset->EOF) {
			$this->id->setDbValue($this->Recordset->fields('id'));
			$this->mrnNo->setDbValue($this->Recordset->fields('mrnNo'));
			if (!$firstRow) {
				if (is_array($this->patient_id->GroupDbValues))
					$this->patient_id->setDbValue(@$this->patient_id->GroupDbValues[$this->Recordset->fields('patient_id')]);
				else
					$this->patient_id->setDbValue(GroupValue($this->patient_id, $this->Recordset->fields('patient_id')));
			}
			$this->patient_name->setDbValue($this->Recordset->fields('patient_name'));
			$this->profilePic->setDbValue($this->Recordset->fields('profilePic'));
			$this->gender->setDbValue($this->Recordset->fields('gender'));
			$this->age->setDbValue($this->Recordset->fields('age'));
			$this->physician_id->setDbValue($this->Recordset->fields('physician_id'));
			$this->typeRegsisteration->setDbValue($this->Recordset->fields('typeRegsisteration'));
			$this->PaymentCategory->setDbValue($this->Recordset->fields('PaymentCategory'));
			$this->admission_consultant_id->setDbValue($this->Recordset->fields('admission_consultant_id'));
			$this->leading_consultant_id->setDbValue($this->Recordset->fields('leading_consultant_id'));
			$this->cause->setDbValue($this->Recordset->fields('cause'));
			$this->admission_date->setDbValue($this->Recordset->fields('admission_date'));
			$this->release_date->setDbValue($this->Recordset->fields('release_date'));
			$this->PaymentStatus->setDbValue($this->Recordset->fields('PaymentStatus'));
			$this->status->setDbValue($this->Recordset->fields('status'));
			$this->createdby->setDbValue($this->Recordset->fields('createdby'));
			$this->createddatetime->setDbValue($this->Recordset->fields('createddatetime'));
			$this->modifiedby->setDbValue($this->Recordset->fields('modifiedby'));
			$this->modifieddatetime->setDbValue($this->Recordset->fields('modifieddatetime'));
			$this->provisional_diagnosis->setDbValue($this->Recordset->fields('provisional_diagnosis'));
			$this->Treatments->setDbValue($this->Recordset->fields('Treatments'));
			$this->FinalDiagnosis->setDbValue($this->Recordset->fields('FinalDiagnosis'));
			$this->BP->setDbValue($this->Recordset->fields('BP'));
			$this->Pulse->setDbValue($this->Recordset->fields('Pulse'));
			$this->Resp->setDbValue($this->Recordset->fields('Resp'));
			$this->SPO2->setDbValue($this->Recordset->fields('SPO2'));
			$this->FollowupAdvice->setDbValue($this->Recordset->fields('FollowupAdvice'));
			$this->NextReviewDate->setDbValue($this->Recordset->fields('NextReviewDate'));
			$this->Medicine->setDbValue($this->Recordset->fields('Medicine'));
			$this->M->setDbValue($this->Recordset->fields('M'));
			$this->A->setDbValue($this->Recordset->fields('A'));
			$this->N->setDbValue($this->Recordset->fields('N'));
			$this->NoOfDays->setDbValue($this->Recordset->fields('NoOfDays'));
			$this->PreRoute->setDbValue($this->Recordset->fields('PreRoute'));
			$this->TimeOfTaking->setDbValue($this->Recordset->fields('TimeOfTaking'));
			$this->History->setDbValue($this->Recordset->fields('History'));
			$this->vitals->setDbValue($this->Recordset->fields('vitals'));
			$this->PatientID->setDbValue($this->Recordset->fields('PatientID'));
			$this->HospID->setDbValue($this->Recordset->fields('HospID'));
			$this->Values[1] = $this->patient_name->CurrentValue;
			$this->Values[2] = $this->profilePic->CurrentValue;
			$this->Values[3] = $this->gender->CurrentValue;
			$this->Values[4] = $this->age->CurrentValue;
			$this->Values[5] = $this->physician_id->CurrentValue;
			$this->Values[6] = $this->provisional_diagnosis->CurrentValue;
			$this->Values[7] = $this->Treatments->CurrentValue;
			$this->Values[8] = $this->FinalDiagnosis->CurrentValue;
			$this->Values[9] = $this->BP->CurrentValue;
			$this->Values[10] = $this->Pulse->CurrentValue;
			$this->Values[11] = $this->Resp->CurrentValue;
			$this->Values[12] = $this->SPO2->CurrentValue;
			$this->Values[13] = $this->FollowupAdvice->CurrentValue;
			$this->Values[14] = $this->NextReviewDate->CurrentValue;
			$this->Values[15] = $this->Medicine->CurrentValue;
			$this->Values[16] = $this->M->CurrentValue;
			$this->Values[17] = $this->A->CurrentValue;
			$this->Values[18] = $this->N->CurrentValue;
			$this->Values[19] = $this->NoOfDays->CurrentValue;
			$this->Values[20] = $this->PreRoute->CurrentValue;
			$this->Values[21] = $this->TimeOfTaking->CurrentValue;
			$this->Values[22] = $this->History->CurrentValue;
			$this->Values[23] = $this->vitals->CurrentValue;
			$this->Values[24] = $this->PatientID->CurrentValue;
			$this->Values[25] = $this->HospID->CurrentValue;
		} else {
			$this->id->setDbValue("");
			$this->mrnNo->setDbValue("");
			$this->patient_id->setDbValue("");
			$this->patient_name->setDbValue("");
			$this->profilePic->setDbValue("");
			$this->gender->setDbValue("");
			$this->age->setDbValue("");
			$this->physician_id->setDbValue("");
			$this->typeRegsisteration->setDbValue("");
			$this->PaymentCategory->setDbValue("");
			$this->admission_consultant_id->setDbValue("");
			$this->leading_consultant_id->setDbValue("");
			$this->cause->setDbValue("");
			$this->admission_date->setDbValue("");
			$this->release_date->setDbValue("");
			$this->PaymentStatus->setDbValue("");
			$this->status->setDbValue("");
			$this->createdby->setDbValue("");
			$this->createddatetime->setDbValue("");
			$this->modifiedby->setDbValue("");
			$this->modifieddatetime->setDbValue("");
			$this->provisional_diagnosis->setDbValue("");
			$this->Treatments->setDbValue("");
			$this->FinalDiagnosis->setDbValue("");
			$this->BP->setDbValue("");
			$this->Pulse->setDbValue("");
			$this->Resp->setDbValue("");
			$this->SPO2->setDbValue("");
			$this->FollowupAdvice->setDbValue("");
			$this->NextReviewDate->setDbValue("");
			$this->Medicine->setDbValue("");
			$this->M->setDbValue("");
			$this->A->setDbValue("");
			$this->N->setDbValue("");
			$this->NoOfDays->setDbValue("");
			$this->PreRoute->setDbValue("");
			$this->TimeOfTaking->setDbValue("");
			$this->History->setDbValue("");
			$this->vitals->setDbValue("");
			$this->PatientID->setDbValue("");
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
			$ar = [];
			if (is_array($this->patient_id->AdvancedFilters)) {
				foreach ($this->patient_id->AdvancedFilters as $filter)
					if ($filter->Enabled)
						$ar[] = [$filter->ID, $filter->Name];
			}
			if (is_array($this->patient_id->DropDownList)) {
				foreach ($this->patient_id->DropDownList as $val)
					$ar[] = [$val, GetDropDownDisplayValue($val, "", 0)];
			}
			$this->patient_id->EditValue = $ar;
			$this->patient_id->AdvancedSearch->SearchValue = is_array($this->patient_id->DropDownValue) ? implode(",", $this->patient_id->DropDownValue) : $this->patient_id->DropDownValue;
		} elseif ($this->RowType == ROWTYPE_TOTAL && !($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER)) { // Summary row
			PrependClass($this->RowAttrs["class"], ($this->RowTotalType == ROWTOTAL_PAGE || $this->RowTotalType == ROWTOTAL_GRAND) ? "ew-rpt-grp-aggregate" : ""); // Set up row class
			if ($this->RowTotalType == ROWTOTAL_GROUP) $this->RowAttrs["data-group"] = $this->patient_id->groupOldValue(); // Set up group attribute
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowGroupLevel >= 2) $this->RowAttrs["data-group-2"] = $this->mrnNo->groupOldValue(); // Set up group attribute 2

			// patient_id
			$this->patient_id->GroupViewValue = $this->patient_id->groupOldValue();
			$this->patient_id->GroupViewValue = FormatNumber($this->patient_id->GroupViewValue, 0, -2, -2, -2);
			$this->patient_id->CellAttrs["class"] = ($this->RowGroupLevel == 1 ? "ew-rpt-grp-summary-1" : "ew-rpt-grp-field-1");
			$this->patient_id->GroupViewValue = DisplayGroupValue($this->patient_id, $this->patient_id->GroupViewValue);
			$this->patient_id->GroupSummaryOldValue = $this->patient_id->GroupSummaryValue;
			$this->patient_id->GroupSummaryValue = $this->patient_id->GroupViewValue;
			$this->patient_id->GroupSummaryViewValue = ($this->patient_id->GroupSummaryOldValue <> $this->patient_id->GroupSummaryValue) ? $this->patient_id->GroupSummaryValue : "&nbsp;";

			// mrnNo
			$this->mrnNo->GroupViewValue = $this->mrnNo->groupOldValue();
			$this->mrnNo->CellAttrs["class"] = ($this->RowGroupLevel == 2 ? "ew-rpt-grp-summary-2" : "ew-rpt-grp-field-2");
			$this->mrnNo->GroupViewValue = DisplayGroupValue($this->mrnNo, $this->mrnNo->GroupViewValue);
			$this->mrnNo->GroupSummaryOldValue = $this->mrnNo->GroupSummaryValue;
			$this->mrnNo->GroupSummaryValue = $this->mrnNo->GroupViewValue;
			$this->mrnNo->GroupSummaryViewValue = ($this->mrnNo->GroupSummaryOldValue <> $this->mrnNo->GroupSummaryValue) ? $this->mrnNo->GroupSummaryValue : "&nbsp;";

			// patient_id
			$this->patient_id->HrefValue = "";

			// mrnNo
			$this->mrnNo->HrefValue = "";

			// patient_name
			$this->patient_name->HrefValue = "";

			// profilePic
			$this->profilePic->HrefValue = "";

			// gender
			$this->gender->HrefValue = "";

			// age
			$this->age->HrefValue = "";

			// physician_id
			$this->physician_id->HrefValue = "";

			// provisional_diagnosis
			$this->provisional_diagnosis->HrefValue = "";

			// Treatments
			$this->Treatments->HrefValue = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->HrefValue = "";

			// BP
			$this->BP->HrefValue = "";

			// Pulse
			$this->Pulse->HrefValue = "";

			// Resp
			$this->Resp->HrefValue = "";

			// SPO2
			$this->SPO2->HrefValue = "";

			// FollowupAdvice
			$this->FollowupAdvice->HrefValue = "";

			// NextReviewDate
			$this->NextReviewDate->HrefValue = "";

			// Medicine
			$this->Medicine->HrefValue = "";

			// M
			$this->M->HrefValue = "";

			// A
			$this->A->HrefValue = "";

			// N
			$this->N->HrefValue = "";

			// NoOfDays
			$this->NoOfDays->HrefValue = "";

			// PreRoute
			$this->PreRoute->HrefValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->HrefValue = "";

			// History
			$this->History->HrefValue = "";

			// vitals
			$this->vitals->HrefValue = "";

			// PatientID
			$this->PatientID->HrefValue = "";

			// HospID
			$this->HospID->HrefValue = "";
		} else {
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER) {
			$this->RowAttrs["data-group"] = $this->patient_id->groupValue(); // Set up group attribute
			if ($this->RowGroupLevel >= 2) $this->RowAttrs["data-group-2"] = $this->mrnNo->groupValue(); // Set up group attribute 2
			} else {
			$this->RowAttrs["data-group"] = $this->patient_id->groupValue(); // Set up group attribute
			$this->RowAttrs["data-group-2"] = $this->mrnNo->groupValue(); // Set up group attribute 2
			}

			// patient_id
			$this->patient_id->GroupViewValue = $this->patient_id->groupValue();
			$this->patient_id->GroupViewValue = FormatNumber($this->patient_id->GroupViewValue, 0, -2, -2, -2);
			$this->patient_id->CellAttrs["class"] = "ew-rpt-grp-field-1";
			$this->patient_id->GroupViewValue = DisplayGroupValue($this->patient_id, $this->patient_id->GroupViewValue);
			if ($this->patient_id->groupValue() == $this->patient_id->groupOldValue() && !$this->checkLevelBreak(1))
				$this->patient_id->GroupViewValue = "&nbsp;";

			// mrnNo
			$this->mrnNo->GroupViewValue = $this->mrnNo->groupValue();
			$this->mrnNo->CellAttrs["class"] = "ew-rpt-grp-field-2";
			$this->mrnNo->GroupViewValue = DisplayGroupValue($this->mrnNo, $this->mrnNo->GroupViewValue);
			if ($this->mrnNo->groupValue() == $this->mrnNo->groupOldValue() && !$this->checkLevelBreak(2))
				$this->mrnNo->GroupViewValue = "&nbsp;";

			// patient_name
			$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
			$this->patient_name->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// physician_id
			$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
			$this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
			$this->physician_id->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// provisional_diagnosis
			$this->provisional_diagnosis->ViewValue = $this->provisional_diagnosis->CurrentValue;
			$this->provisional_diagnosis->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Treatments
			$this->Treatments->ViewValue = $this->Treatments->CurrentValue;
			$this->Treatments->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// FinalDiagnosis
			$this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
			$this->FinalDiagnosis->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Resp
			$this->Resp->ViewValue = $this->Resp->CurrentValue;
			$this->Resp->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// SPO2
			$this->SPO2->ViewValue = $this->SPO2->CurrentValue;
			$this->SPO2->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// FollowupAdvice
			$this->FollowupAdvice->ViewValue = $this->FollowupAdvice->CurrentValue;
			$this->FollowupAdvice->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
			$this->NextReviewDate->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Medicine
			$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
			$this->Medicine->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// M
			$this->M->ViewValue = $this->M->CurrentValue;
			$this->M->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// A
			$this->A->ViewValue = $this->A->CurrentValue;
			$this->A->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// N
			$this->N->ViewValue = $this->N->CurrentValue;
			$this->N->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// NoOfDays
			$this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
			$this->NoOfDays->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PreRoute
			$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
			$this->PreRoute->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// TimeOfTaking
			$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
			$this->TimeOfTaking->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// History
			$this->History->ViewValue = $this->History->CurrentValue;
			$this->History->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// vitals
			$this->vitals->ViewValue = $this->vitals->CurrentValue;
			$this->vitals->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// patient_id
			$this->patient_id->HrefValue = "";

			// mrnNo
			$this->mrnNo->HrefValue = "";

			// patient_name
			$this->patient_name->HrefValue = "";

			// profilePic
			$this->profilePic->HrefValue = "";

			// gender
			$this->gender->HrefValue = "";

			// age
			$this->age->HrefValue = "";

			// physician_id
			$this->physician_id->HrefValue = "";

			// provisional_diagnosis
			$this->provisional_diagnosis->HrefValue = "";

			// Treatments
			$this->Treatments->HrefValue = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->HrefValue = "";

			// BP
			$this->BP->HrefValue = "";

			// Pulse
			$this->Pulse->HrefValue = "";

			// Resp
			$this->Resp->HrefValue = "";

			// SPO2
			$this->SPO2->HrefValue = "";

			// FollowupAdvice
			$this->FollowupAdvice->HrefValue = "";

			// NextReviewDate
			$this->NextReviewDate->HrefValue = "";

			// Medicine
			$this->Medicine->HrefValue = "";

			// M
			$this->M->HrefValue = "";

			// A
			$this->A->HrefValue = "";

			// N
			$this->N->HrefValue = "";

			// NoOfDays
			$this->NoOfDays->HrefValue = "";

			// PreRoute
			$this->PreRoute->HrefValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->HrefValue = "";

			// History
			$this->History->HrefValue = "";

			// vitals
			$this->vitals->HrefValue = "";

			// PatientID
			$this->PatientID->HrefValue = "";

			// HospID
			$this->HospID->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == ROWTYPE_TOTAL) { // Summary row

			// patient_id
			$currentValue = $this->patient_id->GroupViewValue;
			$viewValue = &$this->patient_id->GroupViewValue;
			$viewAttrs = &$this->patient_id->ViewAttrs;
			$cellAttrs = &$this->patient_id->CellAttrs;
			$hrefValue = &$this->patient_id->HrefValue;
			$linkAttrs = &$this->patient_id->LinkAttrs;
			$this->Cell_Rendered($this->patient_id, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// mrnNo
			$currentValue = $this->mrnNo->GroupViewValue;
			$viewValue = &$this->mrnNo->GroupViewValue;
			$viewAttrs = &$this->mrnNo->ViewAttrs;
			$cellAttrs = &$this->mrnNo->CellAttrs;
			$hrefValue = &$this->mrnNo->HrefValue;
			$linkAttrs = &$this->mrnNo->LinkAttrs;
			$this->Cell_Rendered($this->mrnNo, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
		} else {

			// patient_id
			$currentValue = $this->patient_id->groupValue();
			$viewValue = &$this->patient_id->GroupViewValue;
			$viewAttrs = &$this->patient_id->ViewAttrs;
			$cellAttrs = &$this->patient_id->CellAttrs;
			$hrefValue = &$this->patient_id->HrefValue;
			$linkAttrs = &$this->patient_id->LinkAttrs;
			$this->Cell_Rendered($this->patient_id, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// mrnNo
			$currentValue = $this->mrnNo->groupValue();
			$viewValue = &$this->mrnNo->GroupViewValue;
			$viewAttrs = &$this->mrnNo->ViewAttrs;
			$cellAttrs = &$this->mrnNo->CellAttrs;
			$hrefValue = &$this->mrnNo->HrefValue;
			$linkAttrs = &$this->mrnNo->LinkAttrs;
			$this->Cell_Rendered($this->mrnNo, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// patient_name
			$currentValue = $this->patient_name->CurrentValue;
			$viewValue = &$this->patient_name->ViewValue;
			$viewAttrs = &$this->patient_name->ViewAttrs;
			$cellAttrs = &$this->patient_name->CellAttrs;
			$hrefValue = &$this->patient_name->HrefValue;
			$linkAttrs = &$this->patient_name->LinkAttrs;
			$this->Cell_Rendered($this->patient_name, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// profilePic
			$currentValue = $this->profilePic->CurrentValue;
			$viewValue = &$this->profilePic->ViewValue;
			$viewAttrs = &$this->profilePic->ViewAttrs;
			$cellAttrs = &$this->profilePic->CellAttrs;
			$hrefValue = &$this->profilePic->HrefValue;
			$linkAttrs = &$this->profilePic->LinkAttrs;
			$this->Cell_Rendered($this->profilePic, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// gender
			$currentValue = $this->gender->CurrentValue;
			$viewValue = &$this->gender->ViewValue;
			$viewAttrs = &$this->gender->ViewAttrs;
			$cellAttrs = &$this->gender->CellAttrs;
			$hrefValue = &$this->gender->HrefValue;
			$linkAttrs = &$this->gender->LinkAttrs;
			$this->Cell_Rendered($this->gender, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// age
			$currentValue = $this->age->CurrentValue;
			$viewValue = &$this->age->ViewValue;
			$viewAttrs = &$this->age->ViewAttrs;
			$cellAttrs = &$this->age->CellAttrs;
			$hrefValue = &$this->age->HrefValue;
			$linkAttrs = &$this->age->LinkAttrs;
			$this->Cell_Rendered($this->age, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// physician_id
			$currentValue = $this->physician_id->CurrentValue;
			$viewValue = &$this->physician_id->ViewValue;
			$viewAttrs = &$this->physician_id->ViewAttrs;
			$cellAttrs = &$this->physician_id->CellAttrs;
			$hrefValue = &$this->physician_id->HrefValue;
			$linkAttrs = &$this->physician_id->LinkAttrs;
			$this->Cell_Rendered($this->physician_id, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// provisional_diagnosis
			$currentValue = $this->provisional_diagnosis->CurrentValue;
			$viewValue = &$this->provisional_diagnosis->ViewValue;
			$viewAttrs = &$this->provisional_diagnosis->ViewAttrs;
			$cellAttrs = &$this->provisional_diagnosis->CellAttrs;
			$hrefValue = &$this->provisional_diagnosis->HrefValue;
			$linkAttrs = &$this->provisional_diagnosis->LinkAttrs;
			$this->Cell_Rendered($this->provisional_diagnosis, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Treatments
			$currentValue = $this->Treatments->CurrentValue;
			$viewValue = &$this->Treatments->ViewValue;
			$viewAttrs = &$this->Treatments->ViewAttrs;
			$cellAttrs = &$this->Treatments->CellAttrs;
			$hrefValue = &$this->Treatments->HrefValue;
			$linkAttrs = &$this->Treatments->LinkAttrs;
			$this->Cell_Rendered($this->Treatments, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// FinalDiagnosis
			$currentValue = $this->FinalDiagnosis->CurrentValue;
			$viewValue = &$this->FinalDiagnosis->ViewValue;
			$viewAttrs = &$this->FinalDiagnosis->ViewAttrs;
			$cellAttrs = &$this->FinalDiagnosis->CellAttrs;
			$hrefValue = &$this->FinalDiagnosis->HrefValue;
			$linkAttrs = &$this->FinalDiagnosis->LinkAttrs;
			$this->Cell_Rendered($this->FinalDiagnosis, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// BP
			$currentValue = $this->BP->CurrentValue;
			$viewValue = &$this->BP->ViewValue;
			$viewAttrs = &$this->BP->ViewAttrs;
			$cellAttrs = &$this->BP->CellAttrs;
			$hrefValue = &$this->BP->HrefValue;
			$linkAttrs = &$this->BP->LinkAttrs;
			$this->Cell_Rendered($this->BP, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Pulse
			$currentValue = $this->Pulse->CurrentValue;
			$viewValue = &$this->Pulse->ViewValue;
			$viewAttrs = &$this->Pulse->ViewAttrs;
			$cellAttrs = &$this->Pulse->CellAttrs;
			$hrefValue = &$this->Pulse->HrefValue;
			$linkAttrs = &$this->Pulse->LinkAttrs;
			$this->Cell_Rendered($this->Pulse, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Resp
			$currentValue = $this->Resp->CurrentValue;
			$viewValue = &$this->Resp->ViewValue;
			$viewAttrs = &$this->Resp->ViewAttrs;
			$cellAttrs = &$this->Resp->CellAttrs;
			$hrefValue = &$this->Resp->HrefValue;
			$linkAttrs = &$this->Resp->LinkAttrs;
			$this->Cell_Rendered($this->Resp, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// SPO2
			$currentValue = $this->SPO2->CurrentValue;
			$viewValue = &$this->SPO2->ViewValue;
			$viewAttrs = &$this->SPO2->ViewAttrs;
			$cellAttrs = &$this->SPO2->CellAttrs;
			$hrefValue = &$this->SPO2->HrefValue;
			$linkAttrs = &$this->SPO2->LinkAttrs;
			$this->Cell_Rendered($this->SPO2, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// FollowupAdvice
			$currentValue = $this->FollowupAdvice->CurrentValue;
			$viewValue = &$this->FollowupAdvice->ViewValue;
			$viewAttrs = &$this->FollowupAdvice->ViewAttrs;
			$cellAttrs = &$this->FollowupAdvice->CellAttrs;
			$hrefValue = &$this->FollowupAdvice->HrefValue;
			$linkAttrs = &$this->FollowupAdvice->LinkAttrs;
			$this->Cell_Rendered($this->FollowupAdvice, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// NextReviewDate
			$currentValue = $this->NextReviewDate->CurrentValue;
			$viewValue = &$this->NextReviewDate->ViewValue;
			$viewAttrs = &$this->NextReviewDate->ViewAttrs;
			$cellAttrs = &$this->NextReviewDate->CellAttrs;
			$hrefValue = &$this->NextReviewDate->HrefValue;
			$linkAttrs = &$this->NextReviewDate->LinkAttrs;
			$this->Cell_Rendered($this->NextReviewDate, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Medicine
			$currentValue = $this->Medicine->CurrentValue;
			$viewValue = &$this->Medicine->ViewValue;
			$viewAttrs = &$this->Medicine->ViewAttrs;
			$cellAttrs = &$this->Medicine->CellAttrs;
			$hrefValue = &$this->Medicine->HrefValue;
			$linkAttrs = &$this->Medicine->LinkAttrs;
			$this->Cell_Rendered($this->Medicine, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// M
			$currentValue = $this->M->CurrentValue;
			$viewValue = &$this->M->ViewValue;
			$viewAttrs = &$this->M->ViewAttrs;
			$cellAttrs = &$this->M->CellAttrs;
			$hrefValue = &$this->M->HrefValue;
			$linkAttrs = &$this->M->LinkAttrs;
			$this->Cell_Rendered($this->M, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// A
			$currentValue = $this->A->CurrentValue;
			$viewValue = &$this->A->ViewValue;
			$viewAttrs = &$this->A->ViewAttrs;
			$cellAttrs = &$this->A->CellAttrs;
			$hrefValue = &$this->A->HrefValue;
			$linkAttrs = &$this->A->LinkAttrs;
			$this->Cell_Rendered($this->A, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// N
			$currentValue = $this->N->CurrentValue;
			$viewValue = &$this->N->ViewValue;
			$viewAttrs = &$this->N->ViewAttrs;
			$cellAttrs = &$this->N->CellAttrs;
			$hrefValue = &$this->N->HrefValue;
			$linkAttrs = &$this->N->LinkAttrs;
			$this->Cell_Rendered($this->N, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// NoOfDays
			$currentValue = $this->NoOfDays->CurrentValue;
			$viewValue = &$this->NoOfDays->ViewValue;
			$viewAttrs = &$this->NoOfDays->ViewAttrs;
			$cellAttrs = &$this->NoOfDays->CellAttrs;
			$hrefValue = &$this->NoOfDays->HrefValue;
			$linkAttrs = &$this->NoOfDays->LinkAttrs;
			$this->Cell_Rendered($this->NoOfDays, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PreRoute
			$currentValue = $this->PreRoute->CurrentValue;
			$viewValue = &$this->PreRoute->ViewValue;
			$viewAttrs = &$this->PreRoute->ViewAttrs;
			$cellAttrs = &$this->PreRoute->CellAttrs;
			$hrefValue = &$this->PreRoute->HrefValue;
			$linkAttrs = &$this->PreRoute->LinkAttrs;
			$this->Cell_Rendered($this->PreRoute, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// TimeOfTaking
			$currentValue = $this->TimeOfTaking->CurrentValue;
			$viewValue = &$this->TimeOfTaking->ViewValue;
			$viewAttrs = &$this->TimeOfTaking->ViewAttrs;
			$cellAttrs = &$this->TimeOfTaking->CellAttrs;
			$hrefValue = &$this->TimeOfTaking->HrefValue;
			$linkAttrs = &$this->TimeOfTaking->LinkAttrs;
			$this->Cell_Rendered($this->TimeOfTaking, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// History
			$currentValue = $this->History->CurrentValue;
			$viewValue = &$this->History->ViewValue;
			$viewAttrs = &$this->History->ViewAttrs;
			$cellAttrs = &$this->History->CellAttrs;
			$hrefValue = &$this->History->HrefValue;
			$linkAttrs = &$this->History->LinkAttrs;
			$this->Cell_Rendered($this->History, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// vitals
			$currentValue = $this->vitals->CurrentValue;
			$viewValue = &$this->vitals->ViewValue;
			$viewAttrs = &$this->vitals->ViewAttrs;
			$cellAttrs = &$this->vitals->CellAttrs;
			$hrefValue = &$this->vitals->HrefValue;
			$linkAttrs = &$this->vitals->LinkAttrs;
			$this->Cell_Rendered($this->vitals, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// PatientID
			$currentValue = $this->PatientID->CurrentValue;
			$viewValue = &$this->PatientID->ViewValue;
			$viewAttrs = &$this->PatientID->ViewAttrs;
			$cellAttrs = &$this->PatientID->CellAttrs;
			$hrefValue = &$this->PatientID->HrefValue;
			$linkAttrs = &$this->PatientID->LinkAttrs;
			$this->Cell_Rendered($this->PatientID, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

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
					$this->PopupName = $name;
					if (IsAdvancedFilterValue($arValues) || $arValues == INIT_VALUE)
						$this->PopupValue = $arValues;
					if (!MatchedArray($arValues, @$_SESSION["sel_$name"])) {
						if ($this->hasSessionFilterValues($name))
							$this->ExpiredExtendedFilter = $name; // Clear extended filter for this field
					}
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
		if ($this->patient_id->Visible)
			$this->GroupColumnCount += 1;
		if ($this->mrnNo->Visible) {
			$this->GroupColumnCount += 1;
			$this->SubGroupColumnCount += 1;
		}
		if ($this->patient_name->Visible)
			$this->DetailColumnCount += 1;
		if ($this->profilePic->Visible)
			$this->DetailColumnCount += 1;
		if ($this->gender->Visible)
			$this->DetailColumnCount += 1;
		if ($this->age->Visible)
			$this->DetailColumnCount += 1;
		if ($this->physician_id->Visible)
			$this->DetailColumnCount += 1;
		if ($this->provisional_diagnosis->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Treatments->Visible)
			$this->DetailColumnCount += 1;
		if ($this->FinalDiagnosis->Visible)
			$this->DetailColumnCount += 1;
		if ($this->BP->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Pulse->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Resp->Visible)
			$this->DetailColumnCount += 1;
		if ($this->SPO2->Visible)
			$this->DetailColumnCount += 1;
		if ($this->FollowupAdvice->Visible)
			$this->DetailColumnCount += 1;
		if ($this->NextReviewDate->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Medicine->Visible)
			$this->DetailColumnCount += 1;
		if ($this->M->Visible)
			$this->DetailColumnCount += 1;
		if ($this->A->Visible)
			$this->DetailColumnCount += 1;
		if ($this->N->Visible)
			$this->DetailColumnCount += 1;
		if ($this->NoOfDays->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PreRoute->Visible)
			$this->DetailColumnCount += 1;
		if ($this->TimeOfTaking->Visible)
			$this->DetailColumnCount += 1;
		if ($this->History->Visible)
			$this->DetailColumnCount += 1;
		if ($this->vitals->Visible)
			$this->DetailColumnCount += 1;
		if ($this->PatientID->Visible)
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

			// Replace images in custom template
			if (preg_match_all('/<img([^>]*)>/i', $emailMessage, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					if (preg_match('/\s+src\s*=\s*[\'"]([\s\S]*?)[\'"]/i', $match[1], $submatches)) { // Match src='src'
						$src = $submatches[1];

						// Add embedded temp image if not in grTmpImages
						if (StartsString("cid:", $src)) {
							$tmpimage = substr($src, 4);
							if (StartsString("tmp", $tmpimage)) {

								// Add file extension
								$addimage = FALSE;
								$folder = (UPLOAD_TEMP_PATH) ? IncludeTrailingDelimiter(UPLOAD_TEMP_PATH, TRUE) : UploadPath(TRUE);
								if (file_exists($folder . $tmpimage . ".gif")) {
									$tmpimage .= ".gif";
									$addimage = TRUE;
								} elseif (file_exists($folder . $tmpimage . ".jpg")) {
									$tmpimage .= ".jpg";
									$addimage = TRUE;
								} elseif (file_exists($folder . $tmpimage . ".png")) {
									$tmpimage .= ".png";
									$addimage = TRUE;
								}

								// Add to TempImages
								if ($addimage) {
									foreach ($TempImages as $tmpimage2)
										if ($tmpimage == $tmpimage2)
											$addimage = FALSE;
									if ($addimage)
										$TempImages[] = $tmpimage;
								}
							}

						// Not embedded image, create temp image
						} else {
							$data = @file_get_contents($src);
							if ($data <> "")
								$emailMessage = str_replace($match[0], "<img src=\"" . TempImage($data) . "\">", $emailMessage);
						}
					}
				}
			}
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

		// Replace images in custom template to hyperlinks
		if (preg_match_all('/<img([^>]*)>/i', $html, $matches, PREG_SET_ORDER)) {
			foreach ($matches as $match) {
				if (preg_match('/\s+src\s*=\s*[\'"]([\s\S]*?)[\'"]/i', $match[1], $submatches)) { // Match src='src'
					$src = $submatches[1];
					$html = str_replace($match[0], "<a class=\"ew-export-link\" href=\"" . FullUrl($src, "export") . "\">" . $src . "</a>", $html);
				}
			}
		}
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

		// Replace images in custom template to hyperlinks
		if (preg_match_all('/<img([^>]*)>/i', $html, $matches, PREG_SET_ORDER)) {
			foreach ($matches as $match) {
				if (preg_match('/\s+src\s*=\s*[\'"]([\s\S]*?)[\'"]/i', $match[1], $submatches)) { // Match src='src'
					$src = $submatches[1];
					$html = str_replace($match[0], "<a class=\"ew-export-link\" href=\"" . FullUrl($src, "export") . "\">" . $src . "</a>", $html);
				}
			}
		}
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
			return "`patient_name` ASC";
		$resetSort = ReportParam("cmd") === "resetsort";
		$orderBy = ReportParam("order", "");
		$orderType = ReportParam("ordertype", "");

		// Check for a resetsort command
		if ($resetSort) {
			$this->setOrderBy("");
			$this->setStartGroup(1);
			$this->patient_id->setSort("");
			$this->mrnNo->setSort("");
			$this->patient_name->setSort("");
			$this->profilePic->setSort("");
			$this->gender->setSort("");
			$this->age->setSort("");
			$this->physician_id->setSort("");
			$this->provisional_diagnosis->setSort("");
			$this->Treatments->setSort("");
			$this->FinalDiagnosis->setSort("");
			$this->BP->setSort("");
			$this->Pulse->setSort("");
			$this->Resp->setSort("");
			$this->SPO2->setSort("");
			$this->FollowupAdvice->setSort("");
			$this->NextReviewDate->setSort("");
			$this->Medicine->setSort("");
			$this->M->setSort("");
			$this->A->setSort("");
			$this->N->setSort("");
			$this->NoOfDays->setSort("");
			$this->PreRoute->setSort("");
			$this->TimeOfTaking->setSort("");
			$this->History->setSort("");
			$this->vitals->setSort("");
			$this->PatientID->setSort("");
			$this->HospID->setSort("");

		// Check for an Order parameter
		} elseif ($orderBy <> "") {
			$this->CurrentOrder = $orderBy;
			$this->CurrentOrderType = $orderType;
			$sortSql = $this->sortSql();
			$this->setOrderBy($sortSql);
			$this->setStartGroup(1);
		}

		// Set up default sort
		if ($this->getOrderBy() == "") {
			$this->setOrderBy("`patient_name` ASC");
			$this->patient_name->setSort("ASC");
		}
		return $this->getOrderBy();
	}

	// Return extended filter
	protected function getExtendedFilter()
	{
		global $FormError;
		$filter = "";
		if ($this->DrillDown)
			return "";
		$postBack = IsPost();
		$restoreSession = TRUE;
		$setupFilter = FALSE;

		// Reset extended filter if filter changed
		if ($postBack) {

		// Reset search command
		} elseif (Get("cmd", "") == "reset") {

			// Load default values
			$this->setSessionDropDownValue($this->patient_id->DropDownValue, $this->patient_id->AdvancedSearch->SearchOperator, "patient_id"); // Field patient_id

			//$setupFilter = TRUE; // No need to set up, just use default
		} else {
			$restoreSession = !$this->SearchCommand;

			// Field patient_id
			if ($this->getDropDownValue($this->patient_id)) {
				$setupFilter = TRUE;
			} elseif ($this->patient_id->DropDownValue <> INIT_VALUE && !isset($_SESSION["x_DischargeSummary_patient_id"])) {
				$setupFilter = TRUE;
			}
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				return $filter;
			}
		}

		// Restore session
		if ($restoreSession) {
			$this->getSessionDropDownValue($this->patient_id); // Field patient_id
		}

		// Call page filter validated event
		$this->Page_FilterValidated();

		// Build SQL
		$this->buildDropDownFilter($this->patient_id, $filter, $this->patient_id->AdvancedSearch->SearchOperator, FALSE, TRUE); // Field patient_id

		// Save parms to session
		$this->setSessionDropDownValue($this->patient_id->DropDownValue, $this->patient_id->AdvancedSearch->SearchOperator, "patient_id"); // Field patient_id

		// Setup filter
		if ($setupFilter) {
		}

		// Field patient_id
		LoadDropDownList($this->patient_id->DropDownList, $this->patient_id->DropDownValue);
		return $filter;
	}

	// Build dropdown filter
	protected function buildDropDownFilter(&$fld, &$filterClause, $fldOpr, $default = FALSE, $saveFilter = FALSE)
	{
		$fldVal = ($default) ? $fld->DefaultDropDownValue : $fld->DropDownValue;
		$sql = "";
		if (is_array($fldVal)) {
			foreach ($fldVal as $val) {
				$wrk = $this->getDropDownFilter($fld, $val, $fldOpr);

				// Call Page Filtering event
				if (!StartsString("@@", $val))
					$this->Page_Filtering($fld, $wrk, "dropdown", $fldOpr, $val);
				if ($wrk <> "") {
					if ($sql <> "")
						$sql .= " OR " . $wrk;
					else
						$sql = $wrk;
				}
			}
		} else {
			$sql = $this->getDropDownFilter($fld, $fldVal, $fldOpr);

			// Call Page Filtering event
			if (!StartsString("@@", $fldVal))
				$this->Page_Filtering($fld, $sql, "dropdown", $fldOpr, $fldVal);
		}
		if ($sql <> "") {
			AddFilter($filterClause, $sql);
			if ($saveFilter) $fld->CurrentFilter = $sql;
		}
	}

	// Get dropdown filter
	protected function getDropDownFilter(&$fld, $fldVal, $fldOpr)
	{
		$fldName = $fld->Name;
		$fldExpression = $fld->Expression;
		$fldDataType = $fld->DataType;
		$fldDelimiter = $fld->Delimiter;
		$fldVal = strval($fldVal);
		if ($fldOpr == "") $fldOpr = "=";
		$wrk = "";
		if (SameString($fldVal, NULL_VALUE)) {
			$wrk = $fldExpression . " IS NULL";
		} elseif (SameString($fldVal, NOT_NULL_VALUE)) {
			$wrk = $fldExpression . " IS NOT NULL";
		} elseif (SameString($fldVal, EMPTY_VALUE)) {
			$wrk = $fldExpression . " = ''";
		} elseif (SameString($fldVal, ALL_VALUE)) {
			$wrk = "1 = 1";
		} else {
			if (StartsString("@@", $fldVal)) {
				$wrk = $this->getCustomFilter($fld, $fldVal, $this->Dbid);
			} elseif ($fldDelimiter <> "" && trim($fldVal) <> "" && ($fldDataType == DATATYPE_STRING || $fldDataType == DATATYPE_MEMO)) {
				$wrk = GetMultiValueSearchSql($fldExpression, trim($fldVal), $this->Dbid);
			} else {
				if ($fldVal <> "" && $fldVal <> INIT_VALUE) {
					if ($fldDataType == DATATYPE_DATE && $fldOpr <> "") {
						$wrk = GetDateFilterSql($fldExpression, $fldOpr, $fldVal, $fldDataType, $this->Dbid);
					} else {
						$wrk = GetFilterSql($fldOpr, $fldVal, $fldDataType, $this->Dbid);
						if ($wrk <> "") $wrk = $fldExpression . $wrk;
					}
				}
			}
		}
		return $wrk;
	}

	// Get custom filter
	protected function getCustomFilter(&$fld, $fldVal, $dbid = 0)
	{
		$wrk = "";
		if (is_array($fld->AdvancedFilters)) {
			foreach ($fld->AdvancedFilters as $filter) {
				if ($filter->ID == $fldVal && $filter->Enabled) {
					$fldExpr = $fld->Expression;
					$fn = $filter->FunctionName;
					$wrkid = StartsString("@@", $filter->ID) ? substr($filter->ID, 2) : $filter->ID;
					if ($fn <> "") {
						$fn = PROJECT_NAMESPACE . $fn;
						$wrk = $fn($fldExpr, $dbid);
					} else
						$wrk = "";
					$this->Page_Filtering($fld, $wrk, "custom", $wrkid);
					break;
				}
			}
		}
		return $wrk;
	}

	// Build extended filter
	protected function buildExtendedFilter(&$fld, &$filterClause, $default = FALSE, $saveFilter = FALSE)
	{
		$wrk = GetExtendedFilter($fld, $default, $this->Dbid);
		if (!$default)
			$this->Page_Filtering($fld, $wrk, "extended", $fld->AdvancedSearch->SearchOperator, $fld->AdvancedSearch->SearchValue, $fld->AdvancedSearch->SearchCondition, $fld->AdvancedSearch->SearchOperator2, $fld->AdvancedSearch->SearchValue2);
		if ($wrk <> "") {
			AddFilter($filterClause, $wrk);
			if ($saveFilter) $fld->CurrentFilter = $wrk;
		}
	}

	// Get drop down value from querystring
	protected function getDropDownValue(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		if (IsPost())
			return FALSE; // Skip post back
		$opr = Get("z_$parm");
		if ($opr !== NULL)
			$fld->AdvancedSearch->SearchOperator = $opr;
		$val = Get("x_$parm");
		if ($val !== NULL) {
			if ($fld->isMultiSelect() && !is_array($val)) // Split values for modal lookup
				$fld->DropDownValue = explode(LOOKUP_FILTER_VALUE_SEPARATOR, $val);
			else
				$fld->DropDownValue = $val;
			return TRUE;
		}
		return FALSE;
	}

	// Get filter values from querystring
	protected function getFilterValues(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		if (IsPost())
			return; // Skip post back
		$got = FALSE;
		if (Get("x_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchValue = Get("x_$parm");
			$got = TRUE;
		}
		if (Get("z_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchOperator = Get("z_$parm");
			$got = TRUE;
		}
		if (Get("v_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchCondition = Get("v_$parm");
			$got = TRUE;
		}
		if (Get("y_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchValue2 = Get("y_$parm");
			$got = TRUE;
		}
		if (Get("w_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchOperator2 = Get("w_$parm");
			$got = TRUE;
		}
		return $got;
	}

	// Set default ext filter
	protected function setDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
	{
		$fld->AdvancedSearch->SearchValueDefault = $sv1; // Default ext filter value 1
		$fld->AdvancedSearch->SearchValue2Default = $sv2; // Default ext filter value 2 (if operator 2 is enabled)
		$fld->AdvancedSearch->SearchOperatorDefault = $so1; // Default search operator 1
		$fld->AdvancedSearch->SearchOperator2Default = $so2; // Default search operator 2 (if operator 2 is enabled)
		$fld->AdvancedSearch->SearchConditionDefault = $sc; // Default search condition (if operator 2 is enabled)
	}

	// Apply default ext filter
	protected function applyDefaultExtFilter(&$fld)
	{
		$fld->AdvancedSearch->SearchValue = $fld->AdvancedSearch->SearchValueDefault;
		$fld->AdvancedSearch->SearchValue2 = $fld->AdvancedSearch->SearchValue2Default;
		$fld->AdvancedSearch->SearchOperator = $fld->AdvancedSearch->SearchOperatorDefault;
		$fld->AdvancedSearch->SearchOperator2 = $fld->AdvancedSearch->SearchOperator2Default;
		$fld->AdvancedSearch->SearchCondition = $fld->AdvancedSearch->SearchConditionDefault;
	}

	// Check if Text Filter applied
	protected function textFilterApplied(&$fld)
	{
		return (strval($fld->AdvancedSearch->SearchValue) <> strval($fld->AdvancedSearch->SearchValueDefault) ||
			strval($fld->AdvancedSearch->SearchValue2) <> strval($fld->AdvancedSearch->SearchValue2Default) ||
			(strval($fld->AdvancedSearch->SearchValue) <> "" &&
				strval($fld->AdvancedSearch->SearchOperator) <> strval($fld->AdvancedSearch->SearchOperatorDefault)) ||
			(strval($fld->AdvancedSearch->SearchValue2) <> "" &&
				strval($fld->AdvancedSearch->SearchOperator2) <> strval($fld->AdvancedSearch->SearchOperator2Default)) ||
			strval($fld->AdvancedSearch->SearchCondition) <> strval($fld->AdvancedSearch->SearchConditionDefault));
	}

	// Check if Non-Text Filter applied
	protected function nonTextFilterApplied(&$fld)
	{
		if (is_array($fld->DropDownValue)) {
			if (is_array($fld->DefaultDropDownValue)) {
				if (count($fld->DefaultDropDownValue) <> count($fld->DropDownValue))
					return TRUE;
				else
					return (count(array_diff($fld->DefaultDropDownValue, $fld->DropDownValue)) <> 0);
			} else {
				return TRUE;
			}
		} else {
			if (is_array($fld->DefaultDropDownValue))
				return TRUE;
			else
				$v1 = strval($fld->DefaultDropDownValue);
			if ($v1 == INIT_VALUE)
				$v1 = "";
			$v2 = strval($fld->DropDownValue);
			if ($v2 == INIT_VALUE || $v2 == ALL_VALUE)
				$v2 = "";
			return ($v1 <> $v2);
		}
	}

	// Get dropdown value from session
	protected function getSessionDropDownValue(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		$this->getSessionValue($fld->DropDownValue, 'x_DischargeSummary_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator, 'z_DischargeSummary_' . $parm);
	}

	// Get filter values from session
	protected function getSessionFilterValues(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		$this->getSessionValue($fld->AdvancedSearch->SearchValue, 'x_DischargeSummary_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator, 'z_DischargeSummary_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchCondition, 'v_DischargeSummary_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchValue2, 'y_DischargeSummary_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator2, 'w_DischargeSummary_' . $parm);
	}

	// Get value from session
	protected function getSessionValue(&$sv, $sn)
	{
		if (array_key_exists($sn, $_SESSION))
			$sv = $_SESSION[$sn];
	}

	// Set dropdown value to session
	protected function setSessionDropDownValue($sv, $so, $parm)
	{
		$_SESSION['x_DischargeSummary_' . $parm] = $sv;
		$_SESSION['z_DischargeSummary_' . $parm] = $so;
	}

	// Set filter values to session
	protected function setSessionFilterValues($sv1, $so1, $sc, $sv2, $so2, $parm)
	{
		$_SESSION['x_DischargeSummary_' . $parm] = $sv1;
		$_SESSION['z_DischargeSummary_' . $parm] = $so1;
		$_SESSION['v_DischargeSummary_' . $parm] = $sc;
		$_SESSION['y_DischargeSummary_' . $parm] = $sv2;
		$_SESSION['w_DischargeSummary_' . $parm] = $so2;
	}

	// Check if has session filter values
	protected function hasSessionFilterValues($parm)
	{
		return (@$_SESSION['x_' . $parm] <> "" && @$_SESSION['x_' . $parm] <> INIT_VALUE ||
			@$_SESSION['x_' . $parm] <> "" && @$_SESSION['x_' . $parm] <> INIT_VALUE ||
			@$_SESSION['y_' . $parm] <> "" && @$_SESSION['y_' . $parm] <> INIT_VALUE);
	}

	// Dropdown filter exist
	protected function dropDownFilterExist(&$fld, $fldOpr)
	{
		$wrk = "";
		$this->buildDropDownFilter($fld, $wrk, $fldOpr);
		return ($wrk <> "");
	}

	// Extended filter exist
	protected function extendedFilterExist(&$fld)
	{
		$extWrk = "";
		$this->buildExtendedFilter($fld, $extWrk);
		return ($extWrk <> "");
	}

	// Validate form
	protected function validateForm()
	{
		global $ReportLanguage, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			$FormError .= ($FormError <> "") ? "<p>&nbsp;</p>" : "";
			$FormError .= $formCustomError;
		}
		return $validateForm;
	}

	// Clear selection stored in session
	protected function clearSessionSelection($parm)
	{
		$_SESSION["sel_DischargeSummary_$parm"] = "";
		$_SESSION["rf_DischargeSummary_$parm"] = "";
		$_SESSION["rt_DischargeSummary_$parm"] = "";
	}

	// Load selection from session
	protected function loadSelectionFromSession($parm)
	{
		foreach ($this->fields as $fld) {
			if ($fld->Param == $parm) {
				$fld->SelectionList = @$_SESSION["sel_DischargeSummary_$parm"];
				$fld->RangeFrom = @$_SESSION["rf_DischargeSummary_$parm"];
				$fld->RangeTo = @$_SESSION["rt_DischargeSummary_$parm"];
				break;
			}
		}
	}

	// Load default value for filters
	protected function loadDefaultFilters()
	{

		/**
		* Set up default values for non Text filters
		*/
		// Field patient_id

		$this->patient_id->DefaultDropDownValue = INIT_VALUE;
		if (!$this->SearchCommand)
			$this->patient_id->DropDownValue = $this->patient_id->DefaultDropDownValue;

		/**
		* Set up default values for extended filters
		* function setDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
		* Parameters:
		* $fld - Field object
		* $so1 - Default search operator 1
		* $sv1 - Default ext filter value 1
		* $sc - Default search condition (if operator 2 is enabled)
		* $so2 - Default search operator 2 (if operator 2 is enabled)
		* $sv2 - Default ext filter value 2 (if operator 2 is enabled)
		*/

		/**
		* Set up default values for popup filters
		*/
	}

	// Check if filter applied
	protected function checkFilter()
	{

		// Check patient_id extended filter
		if ($this->nonTextFilterApplied($this->patient_id))
			return TRUE;
		return FALSE;
	}

	// Show list of filters
	public function showFilterList($showDate = FALSE)
	{
		global $ReportLanguage;

		// Initialize
		$filterList = "";
		$captionClass = $this->isExport("email") ? "ew-filter-caption-email" : "ew-filter-caption";
		$captionSuffix = $this->isExport("email") ? ": " : "";

		// Field patient_id
		$extWrk = "";
		$wrk = "";
		$this->buildDropDownFilter($this->patient_id, $extWrk, $this->patient_id->AdvancedSearch->SearchOperator);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->patient_id->caption() . "</span>" . $captionSuffix . $filter . "</div>";
		$divdataclass = ($this->isExport() || $this->UseCustomTemplate) ? " data-class=\"tp_current_filters d-none\"" : "";

		// Show Filters
		if ($filterList <> "" || $showDate) {
			$message = "<div" . $divdataclass . "><div id=\"ew-filter-list\" class=\"alert alert-info d-table\">";
			if ($showDate)
				$message .= "<div id=\"ew-current-date\">" . $ReportLanguage->phrase("ReportGeneratedDate") . FormatDateTime(date("Y-m-d H:i:s"), 1) . "</div>";
			if ($filterList <> "")
				$message .= "<div id=\"ew-current-filters\">" . $ReportLanguage->phrase("CurrentFilters") . "</div>" . $filterList;
			$message .= "</div></div>";
			$this->Message_Showing($message, "");
			Write($message);
		} else {
			echo "<span" . $divdataclass . "></span>"; // Show dummy span
		}
	}

	// Get list of filters
	public function getFilterList()
	{

		// Initialize
		$filterList = "";

		// Field patient_id
		$wrk = "";
		$wrk = ($this->patient_id->DropDownValue <> INIT_VALUE) ? $this->patient_id->DropDownValue : "";
		if (is_array($wrk))
			$wrk = implode("||", $wrk);
		if ($wrk <> "")
			$wrk = "\"x_patient_id\":\"" . JsEncode($wrk) . "\"";
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Return filter list in json
		if ($filterList <> "")
			return "{\"data\":{" . $filterList . "}}";
		else
			return "null";
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd", "") <> "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter", ""), TRUE);
		return $this->setupFilterList($filter);
	}

	// Setup list of filters
	protected function setupFilterList($filter)
	{
		if (!is_array($filter))
			return FALSE;

		// Field patient_id
		$restoreFilter = FALSE;
		if (array_key_exists("x_patient_id", $filter)) {
			$wrk = $filter["x_patient_id"];
			if (strpos($wrk, "||") !== FALSE)
				$wrk = explode("||", $wrk);
			$this->setSessionDropDownValue($wrk, @$filter["z_patient_id"], "patient_id");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionDropDownValue(INIT_VALUE, "", "patient_id");
		}
		return TRUE;
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