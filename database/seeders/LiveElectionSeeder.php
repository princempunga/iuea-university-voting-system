<?php

namespace Database\Seeders;

use App\Models\Election;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiveElectionSeeder extends Seeder
{
    public function run(): void
    {
        // Guild President Election
        $guildElection = Election::create([
            'title' => 'SCR Guild President Elections',
            'category' => 'guild_president',
            'description' => 'Official election for the IUEA Guild President 2026/2027.',
            'start_time' => now()->subDay(),
            'end_time' => now()->addDays(2),
            'is_active' => true,
            'status' => 'active',
        ]);

        $gp1 = Candidate::create([
            'election_id' => $guildElection->id,
            'name' => 'Kidega Emmanuel',
            'faculty' => 'Science & Technology',
            'candidate_number' => 'GP/01',
            'bio' => 'Advocating for digital transformation and student welfare.',
            'photo_url' => 'https://randomuser.me/api/portraits/men/32.jpg',
        ]);

        $gp2 = Candidate::create([
            'election_id' => $guildElection->id,
            'name' => 'Nabirye Sarah',
            'faculty' => 'Business & Management',
            'candidate_number' => 'GP/02',
            'bio' => 'Empowering student leaders through entrepreneurship.',
            'photo_url' => 'https://randomuser.me/api/portraits/women/44.jpg',
        ]);

        // Faculty Representative Election
        $facultyElection = Election::create([
            'title' => 'Faculty Representative',
            'category' => 'faculty_representative',
            'description' => 'Selecting the student voice for the respective Faculty.',
            'start_time' => now()->subDay(),
            'end_time' => now()->addDays(2),
            'is_active' => true,
            'status' => 'active',
        ]);

        $fr1 = Candidate::create([
            'election_id' => $facultyElection->id,
            'name' => 'Luyima Mark',
            'faculty' => 'Engineering',
            'candidate_number' => 'FR/ENG/01',
            'bio' => 'Bridge between administration and engineering students.',
            'photo_url' => 'https://randomuser.me/api/portraits/men/62.jpg',
        ]);

        $fr2 = Candidate::create([
            'election_id' => $facultyElection->id,
            'name' => 'Aisha Nakato',
            'faculty' => 'Engineering',
            'candidate_number' => 'FR/ENG/02',
            'bio' => 'Innovation and excellence in engineering representation.',
            'photo_url' => 'https://randomuser.me/api/portraits/women/65.jpg',
        ]);

        // Add some random votes
        $users = User::all();
        if ($users->isEmpty()) {
            $users = User::factory(50)->create();
        }

        foreach ($users as $user) {
            // Vote for Guild President
            Vote::create([
                'election_id' => $guildElection->id,
                'candidate_id' => rand(0, 1) ? $gp1->id : $gp2->id,
            ]);

            // Vote for Faculty Rep
            Vote::create([
                'election_id' => $facultyElection->id,
                'candidate_id' => rand(0, 1) ? $fr1->id : $fr2->id,
            ]);
        }
    }
}