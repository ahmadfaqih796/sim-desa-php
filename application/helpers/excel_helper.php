<?php

// application/helpers/excel_helper.php

use PhpOffice\PhpSpreadsheet\IOFactory;

function readExcelFile($filePath)
{
   $spreadsheet = IOFactory::load($filePath);
   $sheet = $spreadsheet->getActiveSheet();
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();
   $data = [];

   for ($row = 2; $row <= $highestRow; $row++) {
      $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
      $data[] = $rowData[0];
   }

   return $data;
}
