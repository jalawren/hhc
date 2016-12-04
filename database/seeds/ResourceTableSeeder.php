<?php

use App\Resource;
use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    protected $resource;

    /**
     * Construct the class with the Post model
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [

            0 => ['name' => 'Sid Garza-Hillman – Writer. Podcaster. Speaker. Health Coach.', 'description' => 'Sid Garza-Hillman–writer, nutritionist, podcaster, YouTuber–helps people truly take control of their lives through his unique Small Steps philosophy.', 'category_id' => '2', 'url' => 'http://sidgarzahillman.com'],
            1 => ['name' => 'No Meat Athlete - Plant-Based Diet for Fitness', 'description' => 'Plant-Based Diet for Fitness | Vegan Recipes & Nutrition | Vegan Fitness & Running.', 'category_id' => '2', 'url' => 'http://www.nomeatathlete.com']
        ];

        /**
         * Create the DB records for the array for Resource
         *
         */
        foreach($records as $record)
        {
            $this->resource->create($record);
        }
    }
}
