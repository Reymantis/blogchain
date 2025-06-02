<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Latest trends and updates in technology.',
                'color' => '#3498db',
                'live' => true,
                'children' => [
                    [
                        'name' => 'AI',
                        'slug' => 'ai',
                        'description' => 'Artificial Intelligence news and insights.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                    [
                        'name' => 'Blockchain',
                        'slug' => 'blockchain',
                        'description' => 'Blockchain technology and cryptocurrency updates.',
                        'color' => '#f39c12',
                        'live' => true,
                    ],
                    [
                        'name' => 'Cybersecurity',
                        'slug' => 'cybersecurity',
                        'description' => 'Latest in cybersecurity and data protection.',
                        'color' => '#e67e22',
                        'live' => true,
                    ],
                    [
                        'name' => 'Gadgets',
                        'slug' => 'gadgets',
                        'description' => 'Reviews and news about the latest gadgets.',
                        'color' => '#1abc9c',
                        'live' => true,
                    ]
                ]
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'description' => 'Tips and news about health and wellness.',
                'color' => '#2ecc71',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Nutrition',
                        'slug' => 'nutrition',
                        'description' => 'Guides on healthy eating and nutrition.',
                        'color' => '#27ae60',
                        'live' => true,
                    ],
                    [
                        'name' => 'Fitness',
                        'slug' => 'fitness',
                        'description' => 'Workouts and fitness tips for a healthier life.',
                        'color' => '#16a085',
                        'live' => true,
                    ],
                    [
                        'name' => 'Mental Health',
                        'slug' => 'mental-health',
                        'description' => 'Resources and tips for mental well-being.',
                        'color' => '#2980b9',
                        'live' => true,
                    ],
                    [
                        'name' => 'Wellness',
                        'slug' => 'wellness',
                        'description' => 'Holistic approaches to health and wellness.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                ]
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'description' => 'Insights into lifestyle choices and trends.',
                'color' => '#e74c3c',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Fashion',
                        'slug' => 'fashion',
                        'description' => 'Latest fashion trends and style tips.',
                        'color' => '#c0392b',
                        'live' => true,
                    ],
                    [
                        'name' => 'Home Decor',
                        'slug' => 'home-decor',
                        'description' => 'Ideas and inspiration for home decoration.',
                        'color' => '#d35400',
                        'live' => true,
                    ],
                    [
                        'name' => 'Personal Finance',
                        'slug' => 'personal-finance',
                        'description' => 'Tips on managing personal finances effectively.',
                        'color' => '#f1c40f',
                        'live' => true,
                    ],
                    [
                        'name' => 'Relationships',
                        'slug' => 'relationships',
                        'description' => 'Advice and insights on building healthy relationships.',
                        'color' => '#9b59b6',
                        'live' => true,
                    ],
                    [
                        'name' => 'Parenting',
                        'slug' => 'parenting',
                        'description' => 'Guides and tips for parents.',
                        'color' => '#34495e',
                        'live' => true,
                    ],
                    [
                        'name' => 'Self-Care',
                        'slug' => 'self-care',
                        'description' => 'Tips and practices for self-care and personal growth.',
                        'color' => '#2c3e50',
                        'live' => true,
                    ],
                    [
                        'name' => 'Pets',
                        'slug' => 'pets',
                        'description' => 'Care tips and advice for pet owners.',
                        'color' => '#7f8c8d',
                        'live' => true,
                    ]
                ]
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'description' => 'Travel guides and tips for adventurers.',
                'color' => '#f1c40f',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Destinations',
                        'slug' => 'destinations',
                        'description' => 'Explore popular travel destinations around the world.',
                        'color' => '#e67e22',
                        'live' => true,
                    ],
                    [
                        'name' => 'Travel Tips',
                        'slug' => 'travel-tips',
                        'description' => 'Essential tips for a smooth travel experience.',
                        'color' => '#d35400',
                        'live' => true,
                    ],
                    [
                        'name' => 'Adventure Travel',
                        'slug' => 'adventure-travel',
                        'description' => 'Guides for adventure seekers and thrill lovers.',
                        'color' => '#c0392b',
                        'live' => true,
                    ],
                    [
                        'name' => 'Cultural Travel',
                        'slug' => 'cultural-travel',
                        'description' => 'Discover cultures and traditions through travel.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                    [
                        'name' => 'Travel Photography',
                        'slug' => 'travel-photography',
                        'description' => 'Tips and inspiration for capturing travel moments.',
                        'color' => '#3498db',
                        'live' => true,
                    ],
                    [
                        'name' => 'Sustainable Travel',
                        'slug' => 'sustainable-travel',
                        'description' => 'Guides for eco-friendly and responsible travel.',
                        'color' => '#2ecc71',
                        'live' => true,
                    ]
                ]
            ],
            [
                'name' => 'Food',
                'slug' => 'food',
                'description' => 'Delicious recipes and food reviews.',
                'color' => '#9b59b6',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Recipes',
                        'slug' => 'recipes',
                        'description' => 'A collection of easy and delicious recipes.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                    [
                        'name' => 'Restaurant Reviews',
                        'slug' => 'restaurant-reviews',
                        'description' => 'Reviews of the best restaurants in town.',
                        'color' => '#c0392b',
                        'live' => true,
                    ],
                    [
                        'name' => 'Food Trends',
                        'slug' => 'food-trends',
                        'description' => 'Latest trends in the food industry.',
                        'color' => '#f39c12',
                        'live' => true,
                    ],
                    [
                        'name' => 'Healthy Eating',
                        'slug' => 'healthy-eating',
                        'description' => 'Tips for maintaining a healthy diet.',
                        'color' => '#27ae60',
                        'live' => true,
                    ],
                    [
                        'name' => 'Beverages',
                        'slug' => 'beverages',
                        'description' => 'Exploring different types of beverages and drinks.',
                        'color' => '#2980b9',
                        'live' => true,
                    ],
                    [
                        'name' => 'Food Photography',
                        'slug' => 'food-photography',
                        'description' => 'Tips for capturing beautiful food photos.',
                        'color' => '#16a085',
                        'live' => true,
                    ],
                    [
                        'name' => 'Vegan & Vegetarian',
                        'slug' => 'vegan-vegetarian',
                        'description' => 'Delicious vegan and vegetarian recipes.',
                        'color' => '#2c3e50',
                        'live' => true,
                    ]
                ]
            ]];


        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
