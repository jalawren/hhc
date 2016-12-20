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

            0  => ['category_id' => 1, 'name' => 'nutritionfacts.org', 'author' => 'Dr. Michael Greger M.D.', 'description' => 'The latest in nutrition related research delivered in easy to understand video segments brought to you by Dr. Michael Greger M.D.', 'url' => 'http://nutritionfacts.org'],
            1  => ['category_id' => 1, 'name' => 'proteinaholic.com', 'author' => 'Dr. Garth Davis', 'description' => 'In Proteinaholic, Dr. Garth Davis sets the record straight, dispelling the myths that have been perpetuated by doctors, weight loss experts, and the media.', 'url' => 'http://proteinaholic.com'],
            2  => ['category_id' => 1, 'name' => 'zenhabits.net', 'author' => 'Leo Babauta', 'description' => 'Zen Habits is about finding simplicity and mindfulness in the daily chaos of our lives. It’s about clearing the clutter so we can focus on what’s important, create something amazing, find happiness.', 'url' => 'http://zenhabits.net'],
            3  => ['category_id' => 1, 'name' => 'drfuhrman.com', 'author' => 'Dr. Joel Fuhrman, M.D.', 'description' => 'Smart Nutrition, Superior Health. | DrFuhrman.com', 'url' => 'https://drfuhrman.com'],
            4  => ['category_id' => 1, 'name' => 'developgoodhabits.com ', 'author' => 'Steve “S.J.” Scott.', 'description' => 'Develop Good Habits - Build a Great Life - One Habit at a Time', 'url' => 'http://developgoodhabits.com '],
            5  => ['category_id' => 2, 'name' => 'The Power of Habit', 'author' => 'Charles Duhigg', 'description' => 'In The Power of Habit, Pulitzer Prize–winning business reporter Charles Duhigg takes us to the thrilling edge of scientific discoveries that explain why habits exist and how they can be changed. ', 'url' => 'https://www.amazon.com/Power-Habit-What-Life-Business/dp/081298160X'],
            6  => ['category_id' => 2, 'name' => 'Tools of Titans', 'author' => 'Tim Ferriss', 'description' => 'This book contains the distilled tools, tactics, and ‘inside baseball’ you won’t find anywhere else. It also includes new tips from past guests, and life lessons from new ‘guests’ you haven’t met.', 'url' => 'https://www.amazon.com/Tools-Titans-Billionaires-World-Class-Performers/dp/1328683788'],
            7  => ['category_id' => 2, 'name' => 'The Power of Now ', 'author' => 'Eckhart Tolle', 'description' => 'Much more than simple principles and platitudes, the book takes readers on an inspiring spiritual journey to find their true and deepest self and reach the ultimate in personal growth and spirituality: the discovery of truth and light. ', 'url' => 'https://www.amazon.com/Power-Now-Guide-Spiritual-Enlightenment/dp/1577314808'],
            8  => ['category_id' => 2, 'name' => 'Ego is the Enemy ', 'author' => 'Ryan Holiday', 'description' => 'Ego Is the Enemy draws on a vast array of stories and examples, from literature to philosophy to his­tory.', 'url' => 'https://www.amazon.com/Ego-Enemy-Ryan-Holiday/dp/1591847818'],
            9  => ['category_id' => 2, 'name' => 'The Obstacle is the Way ', 'author' => 'Ryan Holiday', 'description' => 'Ryan Holiday shows us how some of the most successful people in history—from John D. Rockefeller to Amelia Earhart to Ulysses S. Grant to Steve Jobs—have applied stoicism to overcome difficult or even impossible situations.', 'url' => 'https://www.amazon.com/Obstacle-Way-Timeless-Turning-Triumph/dp/1591846358'],
            10 => ['category_id' => 2, 'name' => 'Seven Habits of Highly Successful People', 'author' => 'Stephen Covey', 'description' => 'One of the most inspiring and impactful books ever written, The 7 Habits of Highly Effective People has captivated readers for 25 years. It has transformed the lives of Presidents and CEOs, educators and parents.', 'url' => 'https://www.amazon.com/Habits-Highly-Effective-People-Powerful/dp/1451639619'],
            11 => ['category_id' => 2, 'name' => 'Proteinaholic', 'author' => 'Dr. Garth Davis', 'description' => 'An acclaimed surgeon specializing in weight loss delivers a paradigm-shifting examination of the diet and health industry’s focus on protein, explaining why it is detrimental to our health, and can prevent us from losing weight.', 'url' => 'https://www.amazon.com/Proteinaholic-Obsession-Meat-Killing-About/dp/0062279319'],
            12 => ['category_id' => 2, 'name' => 'How Not to Die ', 'author' => 'Dr. Michael Greger, MD', 'description' => 'From the physician behind the wildly popular website NutritionFacts.org, How Not to Die reveals the groundbreaking scientific evidence behind the only diet that can prevent and reverse many of the causes of disease-related death.', 'url' => 'https://www.amazon.com/How-Not-Die-Discover-Scientifically/dp/1250066115'],
            13 => ['category_id' => 2, 'name' => 'Approaching the Natural ', 'author' => 'Sid Garza Hillman', 'description' => 'Sid Garza-Hillman, nutritionist, philosopher, actor, and musician introduces his original philosophy of health.', 'url' => 'https://www.amazon.com/Approaching-Natural-Manifesto-Sid-Garza-Hillman/dp/1937359352'],
            14 => ['category_id' => 2, 'name' => 'The Healthy Habit Revolution', 'author' => 'Derek Doepker', 'description' => 'Learn How to Create Habits That Stick In Just 5 Minutes A Day', 'url' => 'https://www.amazon.com/Healthy-Habit-Revolution-Create-Minutes/dp/1505924545'],
            15 => ['category_id' => 3, 'name' => 'Approaching the Natural', 'author' => 'Sid Garza Hillman', 'description' => 'The Approaching the Natural Podcast features conversations and musings on philosophy of health. ', 'url' => 'http://sidgarzahillman.com/podcasts'],
            16 => ['category_id' => 3, 'name' => 'The Rich Roll Podcast', 'author' => 'Rich Roll', 'description' => 'Plantpowered Wellness Advocate, Bestselling Author, Ultra-Athlete & Podcast Host Rich Roll.', 'url' => 'http://www.richroll.com'],
            17 => ['category_id' => 3, 'name' => 'The Tim Ferriss Show', 'author' => 'Tim Ferriss', 'description' => 'Tim Ferriss is a self-experimenter and bestselling author, best known for The 4-Hour Workweek, which has been translated into 40+ languages.', 'url' => 'http://fourhourworkweek.com/podcast'],
            18 => ['category_id' => 3, 'name' => 'The School of Greatness', 'author' => 'Lewis Howes', 'description' => 'A Real-World Guide to Living Bigger, Loving Deeper, and Leaving a Legacy by Lewis Howes', 'url' => 'http://lewishowes.com/category/podcast/'],
            19 => ['category_id' => 3, 'name' => 'Ben Greenfield Fitness: Diet, Fat Loss, and Performance', 'author' => 'Ben Greenfield', 'description' => 'Ben Greenfield Fitness - Diet, Fat Loss and Performance Advice', 'url' => 'https://bengreenfieldfitness.com/podcasts/'],
            20 => ['category_id' => 3, 'name' => 'This Life with Dr. Drew and Bob Forrest', 'author' => 'Dr. Drew Pinsky and Bob Forrest', 'description' => 'Dr. Drew Pinsky and Bob Forrest from Celebrity Rehab talk about "this life" with interesting celebrity and non-celebrity guests every week.', 'url' => 'http://drdrew.com/thislife/'],
            21 => ['category_id' => 3, 'name' => 'Found my Fitness', 'author' => 'Dr. Rhonda Patrick', 'description' => 'Promoting strategies to increase healthspan, well-being, cognitive and physical performance through deeper understandings of biology.', 'url' => 'https://www.foundmyfitness.com'],
            22 => ['category_id' => 3, 'name' => 'The Joe Rogan Experience ', 'author' => 'Joe Rogan', 'description' => 'The Joe Rogan Experience podcast is a long form conversation hosted by comedian, UFC color commentator, and actor Joe Rogan.', 'url' => 'http://podcasts.joerogan.net'],
            23 => ['category_id' => 3, 'name' => 'Smart Drug Smarts: Brain Optimization ', 'author' => 'Jesse Lawler', 'description' => 'Smart Drug Smarts is for people who want to keep up on the latest breakthroughs in brain health and optimization and the related areas of neuroscience.', 'url' => 'http://smartdrugsmarts.com'],
            24 => ['category_id' => 3, 'name' => 'Half Size Me', 'author' => 'Heather Robertson', 'description' => 'Half Size Me – Real People. Real Stories. Real Weight Loss.', 'url' => 'http://www.halfsizeme.com'],

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
