<?php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Database\Seeder;

class TrialBalanceSeed extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/excel/Trail/agustus_dua.xlsx';
        $this->tablename = 'detail_jurnal_satu';
        $this->truncate = false;

        parent::run();
    }
}
