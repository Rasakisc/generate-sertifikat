<?php

// Tabel MySerti. Nama tabel dan kolom ditebak dari view milik backend
// (dashboard, organisasi/index, organisasi/member) karena model aslinya belum ada di repo.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // login bisa pakai email atau username
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('name');
        });

        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('Nama', 100);
            $table->string('Kode', 50)->unique();
            $table->string('Logo')->nullable();
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_User')->constrained('users')->cascadeOnDelete();
            $table->foreignId('id_Organisasi')->constrained('organizations')->cascadeOnDelete();
            $table->string('role', 20)->default('Member'); // Owner, Admin, Member
            $table->timestamps();
            $table->unique(['id_User', 'id_Organisasi']);
        });

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Organisasi')->constrained('organizations')->cascadeOnDelete();
            $table->string('Judul');
            $table->boolean('is_Premium')->default(false);
            $table->timestamps();
        });

        Schema::create('details_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Sertifikat')->constrained('certificates')->cascadeOnDelete();
            $table->string('NomorSertifikat');
            $table->string('NamaPenerima');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('details_certificates');
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('members');
        Schema::dropIfExists('organizations');
        Schema::table('users', fn (Blueprint $table) => $table->dropColumn('username'));
    }
};
