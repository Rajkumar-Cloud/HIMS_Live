<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmContactdetailsDelete extends CrmContactdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_contactdetails';

    // Page object name
    public $PageObjName = "CrmContactdetailsDelete";

    // Rendering View
    public $RenderingView = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
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
        $url = ScriptName() . "?";
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
        return $url;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;
        global $UserTable;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (crm_contactdetails)
        if (!isset($GLOBALS["crm_contactdetails"]) || get_class($GLOBALS["crm_contactdetails"]) == PROJECT_NAMESPACE . "crm_contactdetails") {
            $GLOBALS["crm_contactdetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_contactdetails');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("crm_contactdetails"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        } else { // Check if response is JSON
            if (StartsString("application/json", $Response->getHeaderLine("Content-type")) && $Response->getBody()->getSize()) { // With JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }
            SaveDebugMessage();
            Redirect(GetUrl($url));
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray($ar)
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue($ar)
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['contactid'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit()
    {
    }
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $TotalRecords = 0;
    public $RecordCount;
    public $RecKeys = [];
    public $StartRowCount = 1;
    public $RowCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action
        $this->contactid->setVisibility();
        $this->contact_no->setVisibility();
        $this->parentid->setVisibility();
        $this->salutation->setVisibility();
        $this->firstname->setVisibility();
        $this->lastname->setVisibility();
        $this->_email->setVisibility();
        $this->phone->setVisibility();
        $this->mobile->setVisibility();
        $this->reportsto->setVisibility();
        $this->training->setVisibility();
        $this->usertype->setVisibility();
        $this->contacttype->setVisibility();
        $this->otheremail->setVisibility();
        $this->donotcall->setVisibility();
        $this->emailoptout->setVisibility();
        $this->imagename->Visible = false;
        $this->isconvertedfromlead->setVisibility();
        $this->verification->Visible = false;
        $this->secondary_email->setVisibility();
        $this->notifilanguage->setVisibility();
        $this->contactstatus->setVisibility();
        $this->dav_status->setVisibility();
        $this->jobtitle->setVisibility();
        $this->decision_maker->setVisibility();
        $this->sum_time->setVisibility();
        $this->phone_extra->setVisibility();
        $this->mobile_extra->setVisibility();
        $this->approvals->Visible = false;
        $this->gender->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("CrmContactdetailsList"); // Prevent SQL injection, return to list
            return;
        }

        // Set up filter (WHERE Clause)
        $this->CurrentFilter = $filter;

        // Get action
        if (IsApi()) {
            $this->CurrentAction = "delete"; // Delete record directly
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action");
        } elseif (Get("action") == "1") {
            $this->CurrentAction = "delete"; // Delete record directly
        } else {
            $this->CurrentAction = "show"; // Display record
        }
        if ($this->isDelete()) {
            $this->SendEmail = true; // Send email on delete success
            if ($this->deleteRows()) { // Delete rows
                if ($this->getSuccessMessage() == "") {
                    $this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
                }
                if (IsApi()) {
                    $this->terminate(true);
                    return;
                } else {
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
                }
            } else { // Delete failed
                if (IsApi()) {
                    $this->terminate();
                    return;
                }
                $this->CurrentAction = "show"; // Display record
            }
        }
        if ($this->isShow()) { // Load records for display
            if ($this->Recordset = $this->loadRecordset()) {
                $this->TotalRecords = $this->Recordset->recordCount(); // Get record count
            }
            if ($this->TotalRecords <= 0) { // No record found, exit
                if ($this->Recordset) {
                    $this->Recordset->close();
                }
                $this->terminate("CrmContactdetailsList"); // Return to list
                return;
            }
        }

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Visible", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->contactid->setDbValue($row['contactid']);
        $this->contact_no->setDbValue($row['contact_no']);
        $this->parentid->setDbValue($row['parentid']);
        $this->salutation->setDbValue($row['salutation']);
        $this->firstname->setDbValue($row['firstname']);
        $this->lastname->setDbValue($row['lastname']);
        $this->_email->setDbValue($row['email']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->reportsto->setDbValue($row['reportsto']);
        $this->training->setDbValue($row['training']);
        $this->usertype->setDbValue($row['usertype']);
        $this->contacttype->setDbValue($row['contacttype']);
        $this->otheremail->setDbValue($row['otheremail']);
        $this->donotcall->setDbValue($row['donotcall']);
        $this->emailoptout->setDbValue($row['emailoptout']);
        $this->imagename->setDbValue($row['imagename']);
        $this->isconvertedfromlead->setDbValue($row['isconvertedfromlead']);
        $this->verification->setDbValue($row['verification']);
        $this->secondary_email->setDbValue($row['secondary_email']);
        $this->notifilanguage->setDbValue($row['notifilanguage']);
        $this->contactstatus->setDbValue($row['contactstatus']);
        $this->dav_status->setDbValue($row['dav_status']);
        $this->jobtitle->setDbValue($row['jobtitle']);
        $this->decision_maker->setDbValue($row['decision_maker']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->approvals->setDbValue($row['approvals']);
        $this->gender->setDbValue($row['gender']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['contactid'] = null;
        $row['contact_no'] = null;
        $row['parentid'] = null;
        $row['salutation'] = null;
        $row['firstname'] = null;
        $row['lastname'] = null;
        $row['email'] = null;
        $row['phone'] = null;
        $row['mobile'] = null;
        $row['reportsto'] = null;
        $row['training'] = null;
        $row['usertype'] = null;
        $row['contacttype'] = null;
        $row['otheremail'] = null;
        $row['donotcall'] = null;
        $row['emailoptout'] = null;
        $row['imagename'] = null;
        $row['isconvertedfromlead'] = null;
        $row['verification'] = null;
        $row['secondary_email'] = null;
        $row['notifilanguage'] = null;
        $row['contactstatus'] = null;
        $row['dav_status'] = null;
        $row['jobtitle'] = null;
        $row['decision_maker'] = null;
        $row['sum_time'] = null;
        $row['phone_extra'] = null;
        $row['mobile_extra'] = null;
        $row['approvals'] = null;
        $row['gender'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue))) {
            $this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // contactid

        // contact_no

        // parentid

        // salutation

        // firstname

        // lastname

        // email

        // phone

        // mobile

        // reportsto

        // training

        // usertype

        // contacttype

        // otheremail

        // donotcall

        // emailoptout

        // imagename

        // isconvertedfromlead

        // verification

        // secondary_email

        // notifilanguage

        // contactstatus

        // dav_status

        // jobtitle

        // decision_maker

        // sum_time

        // phone_extra

        // mobile_extra

        // approvals

        // gender
        if ($this->RowType == ROWTYPE_VIEW) {
            // contactid
            $this->contactid->ViewValue = $this->contactid->CurrentValue;
            $this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
            $this->contactid->ViewCustomAttributes = "";

            // contact_no
            $this->contact_no->ViewValue = $this->contact_no->CurrentValue;
            $this->contact_no->ViewCustomAttributes = "";

            // parentid
            $this->parentid->ViewValue = $this->parentid->CurrentValue;
            $this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
            $this->parentid->ViewCustomAttributes = "";

            // salutation
            $this->salutation->ViewValue = $this->salutation->CurrentValue;
            $this->salutation->ViewCustomAttributes = "";

            // firstname
            $this->firstname->ViewValue = $this->firstname->CurrentValue;
            $this->firstname->ViewCustomAttributes = "";

            // lastname
            $this->lastname->ViewValue = $this->lastname->CurrentValue;
            $this->lastname->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // phone
            $this->phone->ViewValue = $this->phone->CurrentValue;
            $this->phone->ViewCustomAttributes = "";

            // mobile
            $this->mobile->ViewValue = $this->mobile->CurrentValue;
            $this->mobile->ViewCustomAttributes = "";

            // reportsto
            $this->reportsto->ViewValue = $this->reportsto->CurrentValue;
            $this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
            $this->reportsto->ViewCustomAttributes = "";

            // training
            $this->training->ViewValue = $this->training->CurrentValue;
            $this->training->ViewCustomAttributes = "";

            // usertype
            $this->usertype->ViewValue = $this->usertype->CurrentValue;
            $this->usertype->ViewCustomAttributes = "";

            // contacttype
            $this->contacttype->ViewValue = $this->contacttype->CurrentValue;
            $this->contacttype->ViewCustomAttributes = "";

            // otheremail
            $this->otheremail->ViewValue = $this->otheremail->CurrentValue;
            $this->otheremail->ViewCustomAttributes = "";

            // donotcall
            $this->donotcall->ViewValue = $this->donotcall->CurrentValue;
            $this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
            $this->donotcall->ViewCustomAttributes = "";

            // emailoptout
            $this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
            $this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
            $this->emailoptout->ViewCustomAttributes = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
            $this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
            $this->isconvertedfromlead->ViewCustomAttributes = "";

            // secondary_email
            $this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
            $this->secondary_email->ViewCustomAttributes = "";

            // notifilanguage
            $this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
            $this->notifilanguage->ViewCustomAttributes = "";

            // contactstatus
            $this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
            $this->contactstatus->ViewCustomAttributes = "";

            // dav_status
            $this->dav_status->ViewValue = $this->dav_status->CurrentValue;
            $this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
            $this->dav_status->ViewCustomAttributes = "";

            // jobtitle
            $this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
            $this->jobtitle->ViewCustomAttributes = "";

            // decision_maker
            $this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
            $this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
            $this->decision_maker->ViewCustomAttributes = "";

            // sum_time
            $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
            $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
            $this->sum_time->ViewCustomAttributes = "";

            // phone_extra
            $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
            $this->phone_extra->ViewCustomAttributes = "";

            // mobile_extra
            $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
            $this->mobile_extra->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // contactid
            $this->contactid->LinkCustomAttributes = "";
            $this->contactid->HrefValue = "";
            $this->contactid->TooltipValue = "";

            // contact_no
            $this->contact_no->LinkCustomAttributes = "";
            $this->contact_no->HrefValue = "";
            $this->contact_no->TooltipValue = "";

            // parentid
            $this->parentid->LinkCustomAttributes = "";
            $this->parentid->HrefValue = "";
            $this->parentid->TooltipValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";
            $this->salutation->TooltipValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";
            $this->firstname->TooltipValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";
            $this->lastname->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";
            $this->phone->TooltipValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";
            $this->mobile->TooltipValue = "";

            // reportsto
            $this->reportsto->LinkCustomAttributes = "";
            $this->reportsto->HrefValue = "";
            $this->reportsto->TooltipValue = "";

            // training
            $this->training->LinkCustomAttributes = "";
            $this->training->HrefValue = "";
            $this->training->TooltipValue = "";

            // usertype
            $this->usertype->LinkCustomAttributes = "";
            $this->usertype->HrefValue = "";
            $this->usertype->TooltipValue = "";

            // contacttype
            $this->contacttype->LinkCustomAttributes = "";
            $this->contacttype->HrefValue = "";
            $this->contacttype->TooltipValue = "";

            // otheremail
            $this->otheremail->LinkCustomAttributes = "";
            $this->otheremail->HrefValue = "";
            $this->otheremail->TooltipValue = "";

            // donotcall
            $this->donotcall->LinkCustomAttributes = "";
            $this->donotcall->HrefValue = "";
            $this->donotcall->TooltipValue = "";

            // emailoptout
            $this->emailoptout->LinkCustomAttributes = "";
            $this->emailoptout->HrefValue = "";
            $this->emailoptout->TooltipValue = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->LinkCustomAttributes = "";
            $this->isconvertedfromlead->HrefValue = "";
            $this->isconvertedfromlead->TooltipValue = "";

            // secondary_email
            $this->secondary_email->LinkCustomAttributes = "";
            $this->secondary_email->HrefValue = "";
            $this->secondary_email->TooltipValue = "";

            // notifilanguage
            $this->notifilanguage->LinkCustomAttributes = "";
            $this->notifilanguage->HrefValue = "";
            $this->notifilanguage->TooltipValue = "";

            // contactstatus
            $this->contactstatus->LinkCustomAttributes = "";
            $this->contactstatus->HrefValue = "";
            $this->contactstatus->TooltipValue = "";

            // dav_status
            $this->dav_status->LinkCustomAttributes = "";
            $this->dav_status->HrefValue = "";
            $this->dav_status->TooltipValue = "";

            // jobtitle
            $this->jobtitle->LinkCustomAttributes = "";
            $this->jobtitle->HrefValue = "";
            $this->jobtitle->TooltipValue = "";

            // decision_maker
            $this->decision_maker->LinkCustomAttributes = "";
            $this->decision_maker->HrefValue = "";
            $this->decision_maker->TooltipValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";
            $this->sum_time->TooltipValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";
            $this->phone_extra->TooltipValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";
            $this->mobile_extra->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }
        $conn->beginTransaction();

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['contactid'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }
        if ($deleteRows) {
            $conn->commit(); // Commit the changes
        } else {
            $conn->rollback(); // Rollback changes
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmContactdetailsList"), "", $this->TableVar, true);
        $pageId = "delete";
        $Breadcrumb->add("delete", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
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
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }
}
