<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Laporan Data Anggota');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times');

// add a page
$pdf->AddPage();

$table1 = '<table border="0" width="650px">';
$table1 .= '<tr>
                <td style="text-align:center; font-family: sans-serif; font-size:24px; font-weight:bold;">LAPORAN DATA ANGGOTA</td>
            </tr>';
$table1 .= '</table> <br/><br/>';

$table2 = '<table border="1" width="650px">';
$table2 .= '<tr style="background-color: lightblue;">
                <td height="30" style="text-align:center; font-weight:bold; font-family:sans serif; font-size:14px">ID Anggota</td>
                <td style="text-align:center; font-weight:bold;font-family:sans serif; font-size:14px">Nama Anggota</td>
                <td style="text-align:center; font-weight:bold;font-family:sans serif; font-size:14px;">Kelas</td>
                <td style="text-align:center; font-weight:bold;font-family:sans serif; font-size:14px;">Jenis Kelamin</td>
                <td style="text-align:center; font-weight:bold;font-family:sans serif; font-size:14px;">Alamat</td>
                <td style="text-align:center; font-weight:bold;font-family:sans serif; font-size:14px;">No Handphone</td>
            </tr>';

foreach ($data as $row) {
    $table2 .= '<tr>
                <td height="30" style="text-align:center;  font-family:sans-serif; font-size:12px;">' . $row->id_anggota . '</td>
                <td style="text-align:center;  font-family:sans-serif; font-size:12px;">' . $row->nama_anggota . '</td>
                <td style="text-align:center;  font-family:sans-serif; font-size:12px;">' . $row->kelas . '</td>
                <td style="text-align:center;  font-family:sans-serif; font-size:12px;">' . $row->jenis_kelamin . '</td>
                <td style="text-align:center;  font-family:sans-serif; font-size:12px;">' . $row->alamat . '</td>
                <td style="text-align:center;  font-family:sans-serif; font-size:12px;">' . $row->no_hp . '</td>
            </tr>';
}
$table2 .= '</table>';
$pdf->writeHTMLCell(0, 0, '', '', $table1, 0, 1, 0, true, 'L', true);
$pdf->writeHTMLCell(0, 0, '', '', $table2, 0, 1, 0, true, 'L', true);

// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+