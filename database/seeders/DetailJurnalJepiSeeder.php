<?php
use App\Jurnal;
use App\DetailJurnal;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Database\Seeder;

class DetailJurnalJepiSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->command->info("Hapus Jurnal");

       /* $jurnal = new Jurnal;
        $jurnal->tanggal_posting = date('Y-m-d');
        $jurnal->keterangan = 'Tambahan TB 31 Juli';
        $jurnal->id_tipe_jurnal = '5';
        $jurnal->save();*/

        $this->file = '/database/excel/rsij/tb_agustus_dua.xlsx';
        $this->tablename = 'detail_jurnal';
        $this->truncate = false;

        parent::run();
    }
}
