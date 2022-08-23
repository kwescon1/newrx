<?php

use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('school_id')->unsigned()->constrained('schools')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('hostels')->insert(['name' => 'Wagyingo', 'school_id' =>  School::latest()->first()->id]);
        DB::table('hostels')->insert(['name' => 'Victory Towers', 'school_id' =>  School::latest()->first()->id]);
        DB::table('hostels')->insert(['name' => 'New Franco', 'school_id' =>  School::latest()->first()->id]);
        DB::table('hostels')->insert(['name' => 'Georgia', 'school_id' =>  School::latest()->first()->id]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostels_migration');
    }
}
