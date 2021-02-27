<?php

namespace App;

use PhpOffice\PhpSpreadsheet\Spreadsheet as Worksheet;
use Symfony\Component\Console\Helper\ProgressBar;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class Spreadsheet
{
    private $destination;
    private $table;
    private $header;
    private $data;
    private $output;

    public function __construct($destination = null, $output, $table, $header, $data)
    {
        $this->destination = $destination;
        $this->table = $table;
        $this->header = $header;
        $this->data = $data;
        $this->output = $output;
    }

    public function generate()
    {
        $this->output->writeln('Create new Worksheet');

        $spreadsheet = new Worksheet();
        $sheet = $spreadsheet->getActiveSheet();

        $filedate = Carbon::now()->format('Y-m-d_H-i-s');
        $workbook = new Xlsx($spreadsheet);
        $sheet = $spreadsheet->getActiveSheet();

        $this->output->writeln('Writing data to file');

        //write header
        foreach ($this->header as $indexCol => $item) {
            $sheet->setCellValueByColumnAndRow($indexCol + 1, 1, $item);
        }

        //write content
        $progressBar = new ProgressBar($this->output);
        $progressBar->setMaxSteps(count($this->data));
        $progressBar->start();
        foreach ($this->data as $indexRow => $row) {
            foreach ($row as $indexCol => $item) {
                $sheet->setCellValueByColumnAndRow($indexCol + 1, $indexRow + 2, $item);
            }
            $progressBar->advance();
        }

        if (empty($this->destination)) {
            $workbook->save('data/' . $this->table . $filedate . '.xlsx');
        } else {
            $workbook->save($this->destination);
        }

        $progressBar->finish();
        $this->output->writeln('');
        $this->output->writeln('File Saved');
    }
}
