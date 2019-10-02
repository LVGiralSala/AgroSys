@extends ('layouts.app')
@section ('contenido')  

<div class="container-fluid">
    <?php
        require '../vendor/autoload.php';

        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');

        echo "<meta http-equiv='refresh' content='0;url=hello world.xlsx'/>";
    ?>
    <h1>lv</h1>
@endsection