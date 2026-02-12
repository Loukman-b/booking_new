<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Expense;
use App\Models\Package;
use App\Models\Payment;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Maak admin gebruiker aan
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@booking.test',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Maak normale gebruikers aan
        $users = User::factory(10)->create();

        // Maak pakketten aan
        $packages = collect([
            [
                'name' => 'Starter',
                'description' => 'Ideaal voor startende ondernemers die net beginnen met online afspraken plannen.',
                'features' => [
                    'Tot 20 boekingen per maand',
                    'Basis notificaties',
                    'Simpele kalender',
                ],
                'price' => 29.00,
                'duration_minutes' => 15,
                'active' => true,
            ],
            [
                'name' => 'Basic',
                'description' => 'Basis pakket voor kleine bedrijven met tot 50 boekingen per maand, 1 medewerker account en e-mail notificaties.',
                'features' => [
                    'Tot 50 boekingen per maand',
                    '1 medewerker account',
                    'E-mail notificaties',
                    'Basis kalender integratie',
                    'Standaard support',
                ],
                'price' => 49.00,
                'duration_minutes' => 30,
                'active' => true,
            ],
            [
                'name' => 'Pro',
                'description' => 'Professioneel pakket voor groeiende bedrijven met tot 200 boekingen per maand, 5 medewerker accounts en SMS notificaties.',
                'features' => [
                    'Tot 200 boekingen per maand',
                    '5 medewerker accounts',
                    'SMS & e-mail notificaties',
                    'Geavanceerde kalender integratie',
                    'Priority support',
                    'Basis analytics',
                ],
                'price' => 99.00,
                'duration_minutes' => 60,
                'active' => true,
            ],
            [
                'name' => 'Premium',
                'description' => 'Premium pakket met alle features: onbeperkte boekingen, onbeperkt medewerkers en dedicated account manager.',
                'features' => [
                    'Onbeperkt boekingen',
                    'Onbeperkt medewerker accounts',
                    'Alle notificatie opties',
                    'Volledige kalender integraties',
                    'Geavanceerde analytics & rapporten',
                    'Eigen branding & huisstijl',
                    'Dedicated account manager',
                ],
                'price' => 199.00,
                'duration_minutes' => 90,
                'active' => true,
            ],
        ])->map(fn($data) => Package::factory()->create($data));

        // Maak tijdsloten aan voor komende 30 dagen
        $timeSlots = collect();
        for ($i = 0; $i < 30; $i++) {
            $date = now()->addDays($i);
            
            // Maak 8 tijdsloten per dag (9:00 - 17:00)
            for ($hour = 9; $hour < 17; $hour++) {
                $timeSlots->push(
                    TimeSlot::factory()->create([
                        'package_id' => $packages->random()->id,
                        'start_time' => $date->copy()->setTime($hour, 0),
                        'end_time' => $date->copy()->setTime($hour + 1, 0),
                        'status' => collect(['available', 'available', 'available', 'booked'])->random(), // 75% kans beschikbaar
                    ])
                );
            }
        }

        // Maak boekingen aan
        $bookings = collect();
        for ($i = 0; $i < 50; $i++) {
            $package = $packages->random();
            $booking = Booking::factory()->create([
                'package_id' => $package->id,
                'time_slot_id' => $timeSlots->random()->id,
                'customer_name' => $users->random()->name,
                'customer_email' => fake()->safeEmail(),
                'customer_phone' => fake()->phoneNumber(),
                'price_at_booking' => $package->price,
                'status' => collect(['confirmed', 'confirmed', 'completed', 'cancelled'])->random(),
            ]);
            $bookings->push($booking);
        }

        // Maak betalingen aan voor boekingen
        $bookings->each(function ($booking) use ($packages) {
            $package = $packages->firstWhere('id', $booking->package_id);
            Payment::factory()->create([
                'booking_id' => $booking->id,
                'amount' => $package->price,
                'payment_method' => collect(['iDEAL', 'Creditcard', 'PayPal'])->random(),
                'paid_at' => $booking->created_at,
            ]);
        });

        // Maak uitgaven aan
        for ($i = 0; $i < 30; $i++) {
            Expense::factory()->create([
                'created_by' => $admin->id,
                'description' => collect([
                    'Software licenties',
                    'Server hosting kosten',
                    'Marketing campagne',
                    'Kantoorbenodigdheden',
                    'Freelancer werkzaamheden',
                    'Domain registratie',
                    'Email service',
                    'Backup oplossing',
                ])->random(),
                'amount' => fake()->randomFloat(2, 10, 500),
                'expense_date' => now()->subDays(rand(1, 90)),
            ]);
        }

        $this->command->info('✅ Test data succesvol aangemaakt!');
        $this->command->info('📧 Admin email: admin@booking.test');
        $this->command->info('🔑 Admin password: password');
        $this->command->info('📊 ' . User::count() . ' gebruikers');
        $this->command->info('📦 ' . Package::count() . ' pakketten');
        $this->command->info('⏰ ' . TimeSlot::count() . ' tijdsloten');
        $this->command->info('📅 ' . Booking::count() . ' boekingen');
        $this->command->info('💰 ' . Payment::count() . ' betalingen');
        $this->command->info('💸 ' . Expense::count() . ' uitgaven');
    }
}
