<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => 'Share',
                'description' => 'Share creation, share construction',
            ],
            [
                'name'        => 'Study',
                'description' => 'Development skills',
            ],
            [
                'name'        => 'Queries',
                'description' => 'please help each other',
            ],
            [
                'name'        => 'Post',
                'description' => 'Website post',
            ],
        ];
        
        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
