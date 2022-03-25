<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class index
{

	// Page ID
	public $PageID = "index";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Page object name
	public $PageObjName = "index";

	// Page headings
	public $Heading = "";
	public $Subheading = "";

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
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
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
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

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
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
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'index');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &GetConnection();

		// User table object (user_login)
		if (!isset($UserTable)) {
			$UserTable = new user_login();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$Breadcrumb;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
		}

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();
		$Breadcrumb = new Breadcrumb();

		// If session expired, show session expired message
		if (Get("expired") == "1")
			$this->setFailureMessage($Language->phrase("SessionExpired"));
		if (!$Security->isLoggedIn())
			$Security->autoLogin();
		$Security->loadUserLevel(); // Load User Level
		if ($Security->allowList(CurrentProjectID() . 'dashboard.php'))
			$this->terminate("dashboard.php"); // Exit and go to default page
		if ($Security->allowList(CurrentProjectID() . 'employee'))
			$this->terminate("employeelist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_address'))
			$this->terminate("employee_addresslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_email'))
			$this->terminate("employee_emaillist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_has_degree'))
			$this->terminate("employee_has_degreelist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_has_experience'))
			$this->terminate("employee_has_experiencelist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_telephone'))
			$this->terminate("employee_telephonelist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_document'))
			$this->terminate("employee_documentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'hospital'))
			$this->terminate("hospitallist.php");
		if ($Security->allowList(CurrentProjectID() . 'user_login'))
			$this->terminate("user_loginlist.php");
		if ($Security->allowList(CurrentProjectID() . 'userlevelpermissions'))
			$this->terminate("userlevelpermissionslist.php");
		if ($Security->allowList(CurrentProjectID() . 'userlevels'))
			$this->terminate("userlevelslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_status'))
			$this->terminate("sys_statuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_gender'))
			$this->terminate("sys_genderlist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_tittle'))
			$this->terminate("sys_tittlelist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_address_type'))
			$this->terminate("sys_address_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_email_type'))
			$this->terminate("sys_email_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_tele_type'))
			$this->terminate("sys_tele_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_telephone_type'))
			$this->terminate("sys_telephone_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'audittrail'))
			$this->terminate("audittraillist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient'))
			$this->terminate("patientlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_address'))
			$this->terminate("patient_addresslist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_telephone'))
			$this->terminate("patient_telephonelist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_email'))
			$this->terminate("patient_emaillist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_emergency_contact'))
			$this->terminate("patient_emergency_contactlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_document'))
			$this->terminate("patient_documentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_degree'))
			$this->terminate("mas_degreelist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_pharmacy'))
			$this->terminate("mas_pharmacylist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_employee_role_job_description'))
			$this->terminate("mas_employee_role_job_descriptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ip_admission'))
			$this->terminate("ip_admissionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy'))
			$this->terminate("pharmacylist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_services'))
			$this->terminate("pharmacy_serviceslist.php");
		if ($Security->allowList(CurrentProjectID() . 'doctors'))
			$this->terminate("doctorslist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_category'))
			$this->terminate("mas_categorylist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_clinicaldetails'))
			$this->terminate("mas_clinicaldetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_document'))
			$this->terminate("mas_documentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_modepayment'))
			$this->terminate("mas_modepaymentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_reference_type'))
			$this->terminate("mas_reference_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_paymentcategory'))
			$this->terminate("mas_paymentcategorylist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_payment_status'))
			$this->terminate("mas_payment_statuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_typeofregsistration'))
			$this->terminate("mas_typeofregsistrationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_procedure'))
			$this->terminate("mas_procedurelist.php");
		if ($Security->allowList(CurrentProjectID() . 'reception'))
			$this->terminate("receptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_services_billing'))
			$this->terminate("mas_services_billinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_services_type'))
			$this->terminate("mas_services_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_billing_department'))
			$this->terminate("mas_billing_departmentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_role_job_description'))
			$this->terminate("employee_role_job_descriptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf'))
			$this->terminate("ivflist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_art_summary'))
			$this->terminate("ivf_art_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_otherprocedure'))
			$this->terminate("ivf_otherprocedurelist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_vitals_history'))
			$this->terminate("ivf_vitals_historylist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport'))
			$this->terminate("ivf_semenanalysisreportlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_categoryallergy'))
			$this->terminate("pres_categoryallergylist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_container_type'))
			$this->terminate("pres_container_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_fluidformulation'))
			$this->terminate("pres_fluidformulationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_fluids'))
			$this->terminate("pres_fluidslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_frequencies'))
			$this->terminate("pres_frequencieslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_genericinteractions'))
			$this->terminate("pres_genericinteractionslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_indicationstable'))
			$this->terminate("pres_indicationstablelist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_quantity'))
			$this->terminate("pres_quantitylist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_restricteddruglist'))
			$this->terminate("pres_restricteddruglistlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_routes'))
			$this->terminate("pres_routeslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_mas_generic'))
			$this->terminate("pres_mas_genericlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_mas_unit'))
			$this->terminate("pres_mas_unitlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_mas_forms'))
			$this->terminate("pres_mas_formslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_tradenames_new'))
			$this->terminate("pres_tradenames_newlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_trade_combination_names_new'))
			$this->terminate("pres_trade_combination_names_newlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_sideeffect_table'))
			$this->terminate("pres_sideeffect_tablelist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_mas_timeoftaking'))
			$this->terminate("pres_mas_timeoftakinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_mas_route'))
			$this->terminate("pres_mas_routelist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_mas_status'))
			$this->terminate("pres_mas_statuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_tradenames'))
			$this->terminate("pres_tradenameslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pres_trade_combination_names'))
			$this->terminate("pres_trade_combination_nameslist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_vitals'))
			$this->terminate("patient_vitalslist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_opd_follow_up'))
			$this->terminate("patient_opd_follow_uplist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_history'))
			$this->terminate("patient_historylist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_final_diagnosis'))
			$this->terminate("patient_final_diagnosislist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_follow_up'))
			$this->terminate("patient_follow_uplist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_investigations'))
			$this->terminate("patient_investigationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_ot_delivery_register'))
			$this->terminate("patient_ot_delivery_registerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_prescription'))
			$this->terminate("patient_prescriptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_provisional_diagnosis'))
			$this->terminate("patient_provisional_diagnosislist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_services'))
			$this->terminate("patient_serviceslist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_insurance'))
			$this->terminate("patient_insurancelist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_ot_surgery_register'))
			$this->terminate("patient_ot_surgery_registerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_mas_sampletype'))
			$this->terminate("lab_mas_sampletypelist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_bloodgroup'))
			$this->terminate("mas_bloodgrouplist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_job'))
			$this->terminate("mas_joblist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_language'))
			$this->terminate("mas_languagelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_patient_discharge_summary'))
			$this->terminate("view_patient_discharge_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_marital_status'))
			$this->terminate("mas_marital_statuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_patient_billing'))
			$this->terminate("view_patient_billinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_where_didyou_hear'))
			$this->terminate("mas_where_didyou_hearlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_user_template'))
			$this->terminate("mas_user_templatelist.php");
		if ($Security->allowList(CurrentProjectID() . 'appointment_scheduler.php'))
			$this->terminate("./appointment_scheduler.php");
		if ($Security->allowList(CurrentProjectID() . 'ajaxinsert.php'))
			$this->terminate("./ajaxinsert.php");
		if ($Security->allowList(CurrentProjectID() . 'ajaxdb.php'))
			$this->terminate("./ajaxdb.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_template_type'))
			$this->terminate("mas_template_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_follow_up'))
			$this->terminate("view_follow_uplist.php");
		if ($Security->allowList(CurrentProjectID() . 'billing_other_voucher'))
			$this->terminate("billing_other_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'billing_voucher'))
			$this->terminate("billing_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'appointment_scheduler'))
			$this->terminate("_appointment_schedulerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_activity_card'))
			$this->terminate("view_activity_cardlist.php");
		if ($Security->allowList(CurrentProjectID() . 'activitycard.php'))
			$this->terminate("./activitycard.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_user_template_prescription'))
			$this->terminate("mas_user_template_prescriptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_template_prescription_type'))
			$this->terminate("mas_template_prescription_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_activity_card'))
			$this->terminate("mas_activity_cardlist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_days'))
			$this->terminate("sys_dayslist.php");
		if ($Security->allowList(CurrentProjectID() . 'appointment_sch_api.php'))
			$this->terminate("./appointment_sch_api.php");
		if ($Security->allowList(CurrentProjectID() . 'procedurelistcal.php'))
			$this->terminate("./procedurelistcal.php");
		if ($Security->allowList(CurrentProjectID() . 'view_appointment_scheduler'))
			$this->terminate("view_appointment_schedulerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'appointment_block_slot'))
			$this->terminate("appointment_block_slotlist.php");
		if ($Security->allowList(CurrentProjectID() . 'appointment_reminder'))
			$this->terminate("appointment_reminderlist.php");
		if ($Security->allowList(CurrentProjectID() . 'receipts'))
			$this->terminate("receiptslist.php");
		if ($Security->allowList(CurrentProjectID() . 'billing_type'))
			$this->terminate("billing_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_patient_discharge_summary_group'))
			$this->terminate("view_patient_discharge_summary_grouplist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_opd_follow_up'))
			$this->terminate("view_opd_follow_uplist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_mas_template_type'))
			$this->terminate("ivf_mas_template_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_mas_user_template'))
			$this->terminate("ivf_mas_user_templatelist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_chart'))
			$this->terminate("ivf_stimulation_chartlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_et_chart'))
			$this->terminate("ivf_et_chartlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_ovum_pick_up_chart'))
			$this->terminate("ivf_ovum_pick_up_chartlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_embryology_chart'))
			$this->terminate("ivf_embryology_chartlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ivf_treatment'))
			$this->terminate("view_ivf_treatmentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_follow_up_tracking'))
			$this->terminate("ivf_follow_up_trackinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_treatment_plan'))
			$this->terminate("ivf_treatment_planlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ajaxselect.php'))
			$this->terminate("./ajaxselect.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_mas_art_cycle'))
			$this->terminate("ivf_mas_art_cyclelist.php");
		if ($Security->allowList(CurrentProjectID() . 'FertilityHome.php'))
			$this->terminate("./FertilityHome.php");
		if ($Security->allowList(CurrentProjectID() . 'treatment.php'))
			$this->terminate("./treatment.php");
		if ($Security->allowList(CurrentProjectID() . 'thaw'))
			$this->terminate("thawlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_outcome'))
			$this->terminate("ivf_outcomelist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_donorsemendetails'))
			$this->terminate("ivf_donorsemendetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation'))
			$this->terminate("ivf_oocytedenudationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation_stage'))
			$this->terminate("ivf_oocytedenudation_stagelist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_agency'))
			$this->terminate("ivf_agencylist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_vitrification'))
			$this->terminate("ivf_vitrificationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_et'))
			$this->terminate("view_etlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_donor_semen_stock'))
			$this->terminate("view_donor_semen_stocklist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_issuing_semen'))
			$this->terminate("view_issuing_semenlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_partner_semenstock'))
			$this->terminate("view_partner_semenstocklist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_profile_details'))
			$this->terminate("lab_profile_detailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_profile_master'))
			$this->terminate("lab_profile_masterlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_test_result'))
			$this->terminate("lab_test_resultlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_test_master'))
			$this->terminate("lab_test_masterlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_patient_services'))
			$this->terminate("view_patient_serviceslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_billing_voucher'))
			$this->terminate("view_billing_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_semenanalysis'))
			$this->terminate("view_semenanalysislist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_history_master'))
			$this->terminate("ivf_history_masterlist.php");
		if ($Security->allowList(CurrentProjectID() . 'billing_discount'))
			$this->terminate("billing_discountlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_resultreleased'))
			$this->terminate("view_lab_resultreleasedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_unit_mast'))
			$this->terminate("lab_unit_mastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_services'))
			$this->terminate("view_lab_serviceslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_print'))
			$this->terminate("view_lab_printlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_labreport_print'))
			$this->terminate("view_labreport_printlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_batchmas'))
			$this->terminate("pharmacy_batchmaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_master_generic'))
			$this->terminate("pharmacy_master_genericlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_pharled'))
			$this->terminate("pharmacy_pharledlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_storemast'))
			$this->terminate("pharmacy_storemastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_customers'))
			$this->terminate("pharmacy_customerslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_purchaseorder'))
			$this->terminate("pharmacy_purchaseorderlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_po'))
			$this->terminate("pharmacy_polist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_suppliers'))
			$this->terminate("pharmacy_supplierslist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_products'))
			$this->terminate("pharmacy_productslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacygrn'))
			$this->terminate("view_pharmacygrnlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_grn'))
			$this->terminate("pharmacy_grnlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ivf_treatment_plan'))
			$this->terminate("view_ivf_treatment_planlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_barcode_ivf'))
			$this->terminate("view_barcode_ivflist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_donor_ivf'))
			$this->terminate("view_donor_ivflist.php");
		if ($Security->allowList(CurrentProjectID() . 'donorivf.php'))
			$this->terminate("./donorivf.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_semenan_medication'))
			$this->terminate("ivf_semenan_medicationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'help'))
			$this->terminate("helplist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_followups'))
			$this->terminate("view_followupslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_search_product'))
			$this->terminate("view_pharmacy_search_productlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_master_genericgrp'))
			$this->terminate("pharmacy_master_genericgrplist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_master_mfr_master'))
			$this->terminate("pharmacy_master_mfr_masterlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_master_product_similar'))
			$this->terminate("pharmacy_master_product_similarlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_billing_voucher'))
			$this->terminate("pharmacy_billing_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_billing_transfer'))
			$this->terminate("pharmacy_billing_transferlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_comb_master'))
			$this->terminate("pharmacy_comb_masterlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_combination'))
			$this->terminate("pharmacy_combinationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'hospital_pharmacy'))
			$this->terminate("hospital_pharmacylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_admission'))
			$this->terminate("view_ip_admissionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_billing'))
			$this->terminate("view_ip_billinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_advance'))
			$this->terminate("view_ip_advancelist.php");
		if ($Security->allowList(CurrentProjectID() . 'billing_refund_voucher'))
			$this->terminate("billing_refund_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_follow_up_tracking'))
			$this->terminate("view_follow_up_trackinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'depositdetails'))
			$this->terminate("depositdetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'bankbranches'))
			$this->terminate("bankbrancheslist.php");
		if ($Security->allowList(CurrentProjectID() . 'banktransferto'))
			$this->terminate("banktransfertolist.php");
		if ($Security->allowList(CurrentProjectID() . 'hospital_store'))
			$this->terminate("hospital_storelist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_intent_issue'))
			$this->terminate("store_intent_issuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_storeled'))
			$this->terminate("store_storeledlist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_storemast'))
			$this->terminate("store_storemastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_suppliers'))
			$this->terminate("store_supplierslist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_inj'))
			$this->terminate("ivf_stimulation_injlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_tablet'))
			$this->terminate("ivf_stimulation_tabletlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_trigger'))
			$this->terminate("ivf_stimulation_triggerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'deposit_pettycash'))
			$this->terminate("deposit_pettycashlist.php");
		if ($Security->allowList(CurrentProjectID() . 'deposit_account_head'))
			$this->terminate("deposit_account_headlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_patient_admission'))
			$this->terminate("view_ip_patient_admissionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'camera.php'))
			$this->terminate("./camera.php");
		if ($Security->allowList(CurrentProjectID() . 'upload.php'))
			$this->terminate("./upload.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacytransfer'))
			$this->terminate("view_pharmacytransferlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_admission_issue'))
			$this->terminate("view_ip_admission_issuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_admission_prescription'))
			$this->terminate("view_ip_admission_prescriptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_admission_services'))
			$this->terminate("view_ip_admission_serviceslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_admission_bill_summary'))
			$this->terminate("view_ip_admission_bill_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_batchmas'))
			$this->terminate("store_batchmaslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_item_received'))
			$this->terminate("view_item_receivedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_consumption'))
			$this->terminate("view_pharmacy_consumptionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_payment'))
			$this->terminate("pharmacy_paymentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_till_search'))
			$this->terminate("view_till_searchlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_billing_voucher_print'))
			$this->terminate("view_billing_voucher_printlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_gst_output'))
			$this->terminate("view_gst_outputlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_movement'))
			$this->terminate("view_pharmacy_movementlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_movement_item'))
			$this->terminate("view_pharmacy_movement_itemlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_sales'))
			$this->terminate("view_pharmacy_saleslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sms_type'))
			$this->terminate("sms_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'sms_cintent'))
			$this->terminate("sms_cintentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_billing_return'))
			$this->terminate("pharmacy_billing_returnlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_pharled_return'))
			$this->terminate("view_pharmacy_pharled_returnlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_purchase_request'))
			$this->terminate("pharmacy_purchase_requestlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_purchase_request_items'))
			$this->terminate("pharmacy_purchase_request_itemslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_purchase_request_approved'))
			$this->terminate("view_pharmacy_purchase_request_approvedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_purchase_request_items_approved'))
			$this->terminate("view_pharmacy_purchase_request_items_approvedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_purchase_request_items_purchased'))
			$this->terminate("view_pharmacy_purchase_request_items_purchasedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_purchase_request_purchased'))
			$this->terminate("view_pharmacy_purchase_request_purchasedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_collection_details'))
			$this->terminate("view_dashboard_collection_detailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_summary_details'))
			$this->terminate("view_dashboard_summary_detailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_summary_modeofpayment_details'))
			$this->terminate("view_dashboard_summary_modeofpayment_detailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_service_details'))
			$this->terminate("view_dashboard_service_detailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_service_servicetype'))
			$this->terminate("view_dashboard_service_servicetypelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_service_summary'))
			$this->terminate("view_dashboard_service_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_patient_details'))
			$this->terminate("view_dashboard_patient_detailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_patient_summary'))
			$this->terminate("view_dashboard_patient_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_summary_payment_mode'))
			$this->terminate("view_dashboard_summary_payment_modelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_billing_transaction'))
			$this->terminate("view_billing_transactionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dashboard_service_drwise_summary'))
			$this->terminate("view_dashboard_service_drwise_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_till_search_view'))
			$this->terminate("_view_till_search_viewlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_gnrh'))
			$this->terminate("ivf_stimulation_gnrhlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_hmg'))
			$this->terminate("ivf_stimulation_hmglist.php");
		if ($Security->allowList(CurrentProjectID() . 'ivf_stimulation_rfsh'))
			$this->terminate("ivf_stimulation_rfshlist.php");
		if ($Security->allowList(CurrentProjectID() . 'task_management'))
			$this->terminate("task_managementlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_delivery_registered'))
			$this->terminate("view_delivery_registeredlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_icsi_advised'))
			$this->terminate("view_icsi_advisedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_next_review_date'))
			$this->terminate("view_next_review_datelist.php");
		if ($Security->allowList(CurrentProjectID() . 'BillCollectionReport.php'))
			$this->terminate("./BillCollectionReport.php");
		if ($Security->allowList(CurrentProjectID() . 'CollectionSummary.php'))
			$this->terminate("./CollectionSummary.php");
		if ($Security->allowList(CurrentProjectID() . 'view_bill_collection_report'))
			$this->terminate("view_bill_collection_reportlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_bill_collection_summary'))
			$this->terminate("view_bill_collection_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_procedure_registered'))
			$this->terminate("view_procedure_registeredlist.php");
		if ($Security->allowList(CurrentProjectID() . 'monitor_treatment_plan'))
			$this->terminate("monitor_treatment_planlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_search_product_new'))
			$this->terminate("view_pharmacy_search_product_newlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_iui_excel'))
			$this->terminate("view_iui_excellist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_service'))
			$this->terminate("view_lab_servicelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_patient_services_dashboard'))
			$this->terminate("view_patient_services_dashboardlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_find_diff_bills'))
			$this->terminate("view_find_diff_billslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_profile'))
			$this->terminate("view_lab_profilelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_servicess'))
			$this->terminate("view_lab_servicesslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_resultreleasedd'))
			$this->terminate("view_lab_resultreleaseddlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_app'))
			$this->terminate("patient_applist.php");
		if ($Security->allowList(CurrentProjectID() . 'bulkservice.php'))
			$this->terminate("./bulkservice.php");
		if ($Security->allowList(CurrentProjectID() . 'bulkserviceinsert.php'))
			$this->terminate("./bulkserviceinsert.php");
		if ($Security->allowList(CurrentProjectID() . 'mas_lab_services_type'))
			$this->terminate("mas_lab_services_typelist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_dept_mast'))
			$this->terminate("lab_dept_mastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_drug_mast'))
			$this->terminate("lab_drug_mastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'lab_sepcimen_mast'))
			$this->terminate("lab_sepcimen_mastlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_service_sub'))
			$this->terminate("view_lab_service_sublist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_treatmend_status'))
			$this->terminate("view_treatmend_statuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_treatment_culture'))
			$this->terminate("view_treatment_culturelist.php");
		if ($Security->allowList(CurrentProjectID() . 'appointment_patienttypee'))
			$this->terminate("appointment_patienttypeelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_services_auth'))
			$this->terminate("view_lab_services_authlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_lab_resultreleased_auth'))
			$this->terminate("view_lab_resultreleased_authlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_an_registration'))
			$this->terminate("patient_an_registrationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_appointment_scheduler_new'))
			$this->terminate("view_appointment_scheduler_newlist.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_billing_issue'))
			$this->terminate("pharmacy_billing_issuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_appointment'))
			$this->terminate("view_appointmentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_patient_clinical_summary'))
			$this->terminate("view_patient_clinical_summarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_billing_voucher_voucher'))
			$this->terminate("view_billing_voucher_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ongoing_treatment'))
			$this->terminate("view_ongoing_treatmentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'patient_room'))
			$this->terminate("patient_roomlist.php");
		if ($Security->allowList(CurrentProjectID() . 'room_master'))
			$this->terminate("room_masterlist.php");
		if ($Security->allowList(CurrentProjectID() . 'room_types'))
			$this->terminate("room_typeslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_doctor_notes'))
			$this->terminate("view_doctor_noteslist.php");
		if ($Security->allowList(CurrentProjectID() . 'master_procedure_treatment'))
			$this->terminate("master_procedure_treatmentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_drug_issue'))
			$this->terminate("view_drug_issuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_drug_issue_op'))
			$this->terminate("view_drug_issue_oplist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_grn'))
			$this->terminate("store_grnlist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_purchaseorder'))
			$this->terminate("store_purchaseorderlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_store_grn'))
			$this->terminate("view_store_grnlist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_payment'))
			$this->terminate("store_paymentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_stock_value'))
			$this->terminate("view_pharmacy_stock_valuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_last_sale'))
			$this->terminate("view_pharmacy_last_salelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_non_movement'))
			$this->terminate("view_pharmacy_non_movementlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_pharled'))
			$this->terminate("view_pharmacy_pharledlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_purchaseorder'))
			$this->terminate("view_pharmacy_purchaseorderlist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_benifits'))
			$this->terminate("hr_benifitslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_clients'))
			$this->terminate("hr_clientslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_companyloans'))
			$this->terminate("hr_companyloanslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_companystructures'))
			$this->terminate("hr_companystructureslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_educationlevel'))
			$this->terminate("hr_educationlevellist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_educations'))
			$this->terminate("hr_educationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_employementtype'))
			$this->terminate("hr_employementtypelist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_ethnicity'))
			$this->terminate("hr_ethnicitylist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_expensescategories'))
			$this->terminate("hr_expensescategorieslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_expensespaymentmethods'))
			$this->terminate("hr_expensespaymentmethodslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_experiencelevel'))
			$this->terminate("hr_experiencelevellist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_holidays'))
			$this->terminate("hr_holidayslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_immigrationstatus'))
			$this->terminate("hr_immigrationstatuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_jobfunction'))
			$this->terminate("hr_jobfunctionlist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_jobtitles'))
			$this->terminate("hr_jobtitleslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_languages'))
			$this->terminate("hr_languageslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_leaveperiods'))
			$this->terminate("hr_leaveperiodslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_leavetypes'))
			$this->terminate("hr_leavetypeslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_payfrequency'))
			$this->terminate("hr_payfrequencylist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_paygrades'))
			$this->terminate("hr_paygradeslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_projects'))
			$this->terminate("hr_projectslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_salarycomponent'))
			$this->terminate("hr_salarycomponentlist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_salarycomponenttype'))
			$this->terminate("hr_salarycomponenttypelist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_skills'))
			$this->terminate("hr_skillslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_supportedlanguages'))
			$this->terminate("hr_supportedlanguageslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_certifications'))
			$this->terminate("sys_certificationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_country'))
			$this->terminate("sys_countrylist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_currencytypes'))
			$this->terminate("sys_currencytypeslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_nationality'))
			$this->terminate("sys_nationalitylist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_province'))
			$this->terminate("sys_provincelist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_timezones'))
			$this->terminate("sys_timezoneslist.php");
		if ($Security->allowList(CurrentProjectID() . 'sys_workdays'))
			$this->terminate("sys_workdayslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_attendance'))
			$this->terminate("employee_attendancelist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_attendancesheets'))
			$this->terminate("employee_attendancesheetslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_certifications'))
			$this->terminate("employee_certificationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_company_loans'))
			$this->terminate("employee_company_loanslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_dependents'))
			$this->terminate("employee_dependentslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_emergency_contacts'))
			$this->terminate("employee_emergency_contactslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_immigrationdocuments'))
			$this->terminate("employee_immigrationdocumentslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_immigrations'))
			$this->terminate("employee_immigrationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_languages'))
			$this->terminate("employee_languageslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_leavedays'))
			$this->terminate("employee_leavedayslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_leaves'))
			$this->terminate("employee_leaveslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_overtime'))
			$this->terminate("employee_overtimelist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_permissions'))
			$this->terminate("employee_permissionslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_projects'))
			$this->terminate("employee_projectslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_salary'))
			$this->terminate("employee_salarylist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_skills'))
			$this->terminate("employee_skillslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_timeentry'))
			$this->terminate("employee_timeentrylist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_timesheets'))
			$this->terminate("employee_timesheetslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employee_travel_records'))
			$this->terminate("employee_travel_recordslist.php");
		if ($Security->allowList(CurrentProjectID() . 'employees_archived'))
			$this->terminate("employees_archivedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'employees_payroll'))
			$this->terminate("employees_payrolllist.php");
		if ($Security->allowList(CurrentProjectID() . 'employeetrainingsessions'))
			$this->terminate("employeetrainingsessionslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_courses'))
			$this->terminate("hr_courseslist.php");
		if ($Security->allowList(CurrentProjectID() . 'hr_trainingsessions'))
			$this->terminate("hr_trainingsessionslist.php");
		if ($Security->allowList(CurrentProjectID() . 'payroll_deductiongroup'))
			$this->terminate("payroll_deductiongrouplist.php");
		if ($Security->allowList(CurrentProjectID() . 'payroll_overtimecategories'))
			$this->terminate("payroll_overtimecategorieslist.php");
		if ($Security->allowList(CurrentProjectID() . 'recruitment_applications'))
			$this->terminate("recruitment_applicationslist.php");
		if ($Security->allowList(CurrentProjectID() . 'recruitment_calls'))
			$this->terminate("recruitment_callslist.php");
		if ($Security->allowList(CurrentProjectID() . 'recruitment_candidates'))
			$this->terminate("recruitment_candidateslist.php");
		if ($Security->allowList(CurrentProjectID() . 'recruitment_interviews'))
			$this->terminate("recruitment_interviewslist.php");
		if ($Security->allowList(CurrentProjectID() . 'recruitment_job'))
			$this->terminate("recruitment_joblist.php");
		if ($Security->allowList(CurrentProjectID() . 'welcome.php'))
			$this->terminate("./welcome.php");
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_stock_movement'))
			$this->terminate("pharmacy_stock_movementlist.php");
		if ($Security->allowList(CurrentProjectID() . 'report_revenue'))
			$this->terminate("report_revenuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_report_revenue'))
			$this->terminate("view_report_revenuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_contactdetails'))
			$this->terminate("crm_contactdetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_contactsubdetails'))
			$this->terminate("crm_contactsubdetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_crmentity'))
			$this->terminate("crm_crmentitylist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_leadaddress'))
			$this->terminate("crm_leadaddresslist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_leaddetails'))
			$this->terminate("crm_leaddetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_leads_relation'))
			$this->terminate("crm_leads_relationlist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_leadsource'))
			$this->terminate("crm_leadsourcelist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_leadstatus'))
			$this->terminate("crm_leadstatuslist.php");
		if ($Security->allowList(CurrentProjectID() . 'crm_leadsubdetails'))
			$this->terminate("crm_leadsubdetailslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_stock_movement'))
			$this->terminate("view_pharmacy_stock_movementlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_stock_movement_sum'))
			$this->terminate("view_pharmacy_stock_movement_sumlist.php");
		if ($Security->allowList(CurrentProjectID() . 'home.php'))
			$this->terminate("./home.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_purchase_value'))
			$this->terminate("view_pharmacy_report_purchase_valuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_search_product'))
			$this->terminate("view_pharmacy_report_search_productlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_stock_value'))
			$this->terminate("view_pharmacy_report_stock_valuelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_supplier_ledger'))
			$this->terminate("view_pharmacy_report_supplier_ledgerlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_supplier_wise_outstanding'))
			$this->terminate("view_pharmacy_report_supplier_wise_outstandinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_earning'))
			$this->terminate("view_pharmacy_report_earninglist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_gst_report'))
			$this->terminate("view_pharmacy_gst_reportlist.php");
		if ($Security->allowList(CurrentProjectID() . 'store_billing_transfer'))
			$this->terminate("store_billing_transferlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_store_transfer'))
			$this->terminate("view_store_transferlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_store_search_product'))
			$this->terminate("view_store_search_productlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_gst_issueitem'))
			$this->terminate("view_gst_issueitemlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_billing_voucher'))
			$this->terminate("view_pharmacy_billing_voucherlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_purchaseorder_new'))
			$this->terminate("view_pharmacy_purchaseorder_newlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_till_search_view_revenew'))
			$this->terminate("view_till_search_view_revenewlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_report_revenue1'))
			$this->terminate("view_report_revenue1list.php");
		if ($Security->allowList(CurrentProjectID() . 'sms_curl'))
			$this->terminate("sms_curllist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_vitals_history'))
			$this->terminate("view_vitals_historylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_drug_issue_op_h1'))
			$this->terminate("view_drug_issue_op_h1list.php");
		if ($Security->allowList(CurrentProjectID() . 'view_drug_issue_op_h1_notsch'))
			$this->terminate("view_drug_issue_op_h1_notschlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_drug_issue_op_notsch'))
			$this->terminate("view_drug_issue_op_notschlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_report_stock_value_max'))
			$this->terminate("view_pharmacy_report_stock_value_maxlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_stock_movement'))
			$this->terminate("view_stock_movementlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view1'))
			$this->terminate("view1list.php");
		if ($Security->allowList(CurrentProjectID() . 'view_dues'))
			$this->terminate("view_dueslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_advance_utilize'))
			$this->terminate("view_advance_utilizelist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_advance_freezed'))
			$this->terminate("view_advance_freezedlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ivf_oocytedenudation_embryology_chart'))
			$this->terminate("view_ivf_oocytedenudation_embryology_chartlist.php");
		if ($Security->allowList(CurrentProjectID() . 'qaqcrecord_andrology'))
			$this->terminate("qaqcrecord_andrologylist.php");
		if ($Security->allowList(CurrentProjectID() . 'qaqcrecord_endrology'))
			$this->terminate("qaqcrecord_endrologylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_revenue_report_ip'))
			$this->terminate("view_revenue_report_iplist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_revenue_report_opd'))
			$this->terminate("view_revenue_report_opdlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_revenue_report_pharmacy'))
			$this->terminate("view_revenue_report_pharmacylist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_item_received_items'))
			$this->terminate("view_item_received_itemslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_pharmacy_search_product_search'))
			$this->terminate("_view_pharmacy_search_product_searchlist.php");
		if ($Security->allowList(CurrentProjectID() . 'ipbulkservice.php'))
			$this->terminate("./ipbulkservice.php");
		if ($Security->allowList(CurrentProjectID() . 'ipbulkserviceinsert.php'))
			$this->terminate("./ipbulkserviceinsert.php");
		if ($Security->allowList(CurrentProjectID() . 'view_ip_af_billing'))
			$this->terminate("view_ip_af_billinglist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_template_couple_vitals'))
			$this->terminate("view_template_couple_vitalslist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_template_for_et'))
			$this->terminate("view_template_for_etlist.php");
		if ($Security->allowList(CurrentProjectID() . 'view_template_for_opu'))
			$this->terminate("view_template_for_opulist.php");
		if ($Security->isLoggedIn()) {
			$this->setFailureMessage(DeniedMessage() . "<br><br><a href=\"logout.php\">" . $Language->phrase("BackToLogin") . "</a>");
		} else {
			$this->terminate("login.php"); // Exit and go to login page
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}
}
?>