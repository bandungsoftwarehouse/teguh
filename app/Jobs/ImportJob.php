<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
//IMPORT PACKAGE LEAGUE/CSV
use League\Csv\Reader;
use App\User;
use File;
class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    //MEMINTA DATA NAMA FILE
    public function __construct($filename)
    {
        $this->filename = $filename;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // READ DATA DARI FILE CSV YANG DISIMPAN DIDALAM FOLDER
        // STORAGE > APP > PUBLIC > IMPORT > NAMAFILE.CSV
        $csv = Reader::createFromPath(storage_path('app/public/import/' . $this->filename), 'r');
        //BARIS PERTAMA DI-SET SEBAGAI KEY DARI ARRAY YANG DIHASILKAN
        $csv->setHeaderOffset(0);
        
        //LOOPING DATA YANG TELAH DI-LOAD
        foreach ($csv as $row) {
            //SIMPAN KE DALAM TABLE USER
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => \Hash::make($row['password'])
                /*
                'remember_token' => $row['remember_token'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at']*/
            ]);
        }
        //APABILA PROSES TELAH SELESAI, FILE DIHAPUS.
        File::delete(storage_path('app/public/import/' . $this->filename));
    }
}
