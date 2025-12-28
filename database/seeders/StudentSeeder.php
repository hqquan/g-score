<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::disableQueryLog();
        DB::table('students')->truncate();

        $file = database_path('seeders/data/diem_thi_thpt_2024.csv');

        if (!file_exists($file)) {
            throw new \Exception("CSV file not found at path: " . $file);
        }

        $handle = fopen($file, 'r');

        // skip header
        fgetcsv($handle);

        $batchSize = 1000;
        $rows = [];

        // Timer
        $startTime = microtime(true);
        $batchStart = microtime(true);
        $inserted = 0;

        while (($data = fgetcsv($handle, 1000, ',')) !== false) {

            $rows[] = [
                'sbd' => $data[0],
                'toan' => $this->normalizeScore($data[1]),
                'ngu_van' => $this->normalizeScore($data[2]),
                'ngoai_ngu' => $this->normalizeScore($data[3]),
                'vat_li' => $this->normalizeScore($data[4]),
                'hoa_hoc' => $this->normalizeScore($data[5]),
                'sinh_hoc' => $this->normalizeScore($data[6]),
                'lich_su' => $this->normalizeScore($data[7]),
                'dia_li' => $this->normalizeScore($data[8]),
                'gdcd' => $this->normalizeScore($data[9]),
                'ma_ngoai_ngu' => $data[10] ?? null,
            ];

            if (count($rows) === $batchSize) {
                DB::table('students')->insert($rows);

                // Timer
                $inserted += count($rows);
                $batchTime = round(microtime(true) - $batchStart, 2);
                $totalTime = round(microtime(true) - $startTime, 2);
                echo "Inserted {$inserted} records | Batch: {$batchTime}s | Total: {$totalTime}s\n";

                $rows = [];

                // Timer
                $batchStart = microtime(true);
            }
        }

        // Insert remaining rows
        if ($rows) {
            DB::table('students')->insert($rows);
            $inserted += count($rows);
        }

        $totalTime = round(microtime(true) - $startTime, 2);
        echo "Total records: {$inserted} | Total time: {$totalTime}s\n";

        fclose($handle);
    }

    private function normalizeScore($value)
    {
        $value = trim($value);

        return $value === '' ? null : (float) $value;
    }
}
