<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\TimeSlot;
use Illuminate\Support\Str;

class DemoBookingSeeder extends Seeder
{
    public function run(): void
    {
        // Maak 6 pakketten aan, 3 actief, 3 inactief
        $packages = collect([
            ['name' => 'Basic', 'description' => 'Basic pakket', 'price' => 49, 'duration_minutes' => 60, 'active' => true],
            ['name' => 'Pro', 'description' => 'Pro pakket', 'price' => 99, 'duration_minutes' => 60, 'active' => true],
            ['name' => 'Premium', 'description' => 'Premium pakket', 'price' => 199, 'duration_minutes' => 60, 'active' => true],
            ['name' => 'Business', 'description' => 'Business pakket', 'price' => 299, 'duration_minutes' => 90, 'active' => false],
            ['name' => 'Ultimate', 'description' => 'Ultimate pakket', 'price' => 399, 'duration_minutes' => 120, 'active' => false],
            ['name' => 'VIP', 'description' => 'VIP pakket', 'price' => 500, 'duration_minutes' => 120, 'active' => false],
        ]);

        $statuses = ['available', 'booked', 'cancelled'];
        $startDate = now()->setDate(2026, 2, 12)->startOfDay();
        // Voor elk pakket: maak voor 7 dagen, elk 5 tijdsloten (ook avond), met verschillende statussen
        $timeRanges = [
            ['14:00', '15:00'],
            ['15:00', '16:00'],
            ['16:00', '17:00'],
            ['18:00', '19:00'],
            ['20:00', '21:00'],
        ];
        $packages->each(function ($data) use ($statuses, $startDate, $timeRanges) {
            $package = Package::create($data);
            for ($day = 0; $day < 7; $day++) {
                $date = $startDate->copy()->addDays($day);
                foreach ($timeRanges as $i => $range) {
                    $start = $date->copy()->setTimeFromTimeString($range[0]);
                    $end = $date->copy()->setTimeFromTimeString($range[1]);
                    $status = $statuses[($day + $i) % count($statuses)];
                    TimeSlot::create([
                        'package_id' => $package->id,
                        'start_time' => $start,
                        'end_time' => $end,
                        'status' => $status,
                    ]);
                }
            }
        });
    }
}
