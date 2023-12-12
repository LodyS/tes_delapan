<?php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Database\Seeder;

class SetSurplusDetailSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('set_surplus_defisit_detail')->delete();
        $this->file = '/database/excel/rsij/settingsurplus.xlsx';
        $this->tablename = 'set_surplus_defisit_detail';

        $this->truncate = false;
        //$this->textOutput = false;

        parent::run();
    }
}
