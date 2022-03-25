<?php

namespace PHPMaker2021\HIMS;

/**
 * Export to Excel
 */
class ExportExcel extends ExportBase
{
    // Export a value (caption, field value, or aggregate)
    protected function exportValueEx(&$fld, $val, $useStyle = true)
    {
        if (($fld->DataType == DATATYPE_STRING || $fld->DataType == DATATYPE_MEMO) && is_numeric($val)) {
            $val = "=\"" . strval($val) . "\"";
        }
        $this->Text .= parent::exportValueEx($fld, $val, $useStyle);
    }

    // Export
    public function export()
    {
        global $ExportFileName;
        if (!Config("DEBUG") && ob_get_length()) {
            ob_end_clean();
        }
        AddHeader('Content-Type', 'application/vnd.ms-excel' . ((Config("PROJECT_CHARSET") != "") ? '; charset=' . Config("PROJECT_CHARSET") : ''));
        AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.xls');
        if (SameText(Config("PROJECT_CHARSET"), "utf-8")) {
            Write("\xEF\xBB\xBF");
        }
        Write($this->Text);
    }
}
