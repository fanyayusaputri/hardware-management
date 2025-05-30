<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom nis, kelas, dan role
            $table->string('nis')->unique()->nullable();
            $table->string('kelas')->nullable();
            
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom nis, kelas, dan role jika migrasi di rollback
            $table->dropColumn(['nis', 'kelas', 'role']);
        });
    }
}
