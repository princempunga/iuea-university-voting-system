<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->index(['election_id', 'candidate_id'], 'idx_vote_tally');
        });

        Schema::table('election_voter', function (Blueprint $table) {
            $table->index(['user_id', 'election_id'], 'idx_voter_lookup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropIndex('idx_vote_tally');
        });

        Schema::table('election_voter', function (Blueprint $table) {
            $table->dropIndex('idx_voter_lookup');
        });
    }
};
