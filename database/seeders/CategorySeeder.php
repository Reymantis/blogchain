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
                'name' => 'International ',
                'slug' => 'international',
                'description' => 'Latest international news and updates.',
                'color' => '#3498db',
                'live' => true,
                'children' => [
                    [
                        'name' => 'News',
                        'slug' => 'World News',
                        'description' => 'Global news and events from around the world.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                    [
                        'name' => 'Politics',
                        'slug' => 'politics',
                        'description' => 'Political news and analysis from various countries.',
                        'color' => '#f39c12',
                        'live' => true,
                    ],

                ],
            ],
            [
                'name' => 'Local Regions',
                'slug' => 'local-regions',
                'description' => 'Local news and updates from various regions.',
                'color' => '#2ecc71',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Berlin',
                        'slug' => 'berlin',
                        'description' => 'all local news from Berlin',
                        'color' => '#27ae60',
                        'live' => true,
                    ],
                    [
                        'name' => 'Cape Town',
                        'slug' => 'cape-town',
                        'description' => 'all local news from Cape Town',
                        'color' => '#16a085',
                        'live' => true,
                    ],
                    [
                        'name' => 'Other Cities',
                        'slug' => 'Cities',
                        'description' => 'all local news from other cities',
                        'color' => '#16a085',
                        'live' => true,
                    ],

                ],
            ],
            [
                'name' => 'DeFi',
                'slug' => 'decentralized-finance',
                'description' => 'Exploring the decentralized web and its technologies.',
                'color' => '#e74c3c',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Cryptocurrency',
                        'slug' => 'cryptocurrency',
                        'description' => 'Latest news and trends in the cryptocurrency market.',
                        'color' => '#f1c40f',
                        'live' => true,
                    ],

                    [
                        'name' => 'Blockchain',
                        'slug' => 'blockchain',
                        'description' => 'Understanding blockchain technology and its applications.',
                        'color' => '#2c3e50',
                        'live' => true,
                    ],
                    [
                        'name' => 'Smart Contracts',
                        'slug' => 'smart-contracts',
                        'description' => 'Exploring smart contracts and their use cases.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],

                    [
                        'name' => 'NFTs',
                        'slug' => 'nfts',
                        'description' => 'Non-fungible tokens and their impact on digital ownership.',
                        'color' => '#d35400',
                        'live' => true,
                    ],
                    [
                        'name' => 'Bitcoin',
                        'slug' => 'bitcoin',
                        'description' => 'All about Bitcoin, the first cryptocurrency.',
                        'color' => '#c0392b',
                        'live' => true,
                    ],
                    [
                        'name' => 'Trending Coins',
                        'slug' => 'trending-coins',
                        'description' => 'Latest trends and updates on popular cryptocurrencies.',
                        'color' => '#d35400',
                        'live' => true,

                    ],

                ],
            ],
            [
                'name' => 'Web & Tech',
                'slug' => 'web and tech',
                'description' => 'Web development and Design.',
                'color' => '#e74c3c',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Development',
                        'slug' => 'web development',
                        'description' => 'Latest news and trends in the cryptocurrency market.',
                        'color' => '#f1c40f',
                        'live' => true,
                    ],
                    [
                        'name' => 'Design',
                        'slug' => 'web development',
                        'description' => 'Latest news and trends in the cryptocurrency market.',
                        'color' => '#f1c40f',
                        'live' => true,
                    ],
                    [
                        'name' => 'Programming Languages',
                        'slug' => 'programming-languages',
                        'description' => 'Exploring various programming languages and their applications.',
                        'color' => '#2c3e50',
                        'live' => true,
                    ],
                    [
                        'name' => 'Software Development',
                        'slug' => 'software-development',
                        'description' => 'Latest trends and updates in software development.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                    [
                        'name' => 'Artificial Intelligence',
                        'slug' => 'artificial-intelligence',
                        'description' => 'Exploring AI technologies and their impact on society.',
                        'color' => '#d35400',
                        'live' => true,
                    ],

                ],
            ],
            [
                'name' => 'Arts & Media',
                'slug' => 'Art and Entertainment',
                'description' => 'Exploring the world of arts and entertainment.',
                'color' => '#f1c40f',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Visual Arts',
                        'slug' => 'visual-arts',
                        'description' => 'Exploring the world of visual arts and artists.',
                        'color' => '#e67e22',
                        'live' => true,
                    ],
                    [
                        'name' => 'Film and Cinema',
                        'slug' => 'film-and-cinema',
                        'description' => 'Latest news and reviews from the film industry.',
                        'color' => '#d35400',
                        'live' => true,
                    ],
                    [
                        'name' => 'Music',
                        'slug' => 'music',
                        'description' => 'Exploring the world of music and artists.',
                        'color' => '#c0392b',
                        'live' => true,
                    ],
                    [
                        'name' => 'Photography',
                        'slug' => 'photography',
                        'description' => 'The art of photography and photographers.',
                        'color' => '#3498db',
                        'live' => true,
                    ],

                ],
            ],
            [
                'name' => 'User Generated Content',
                'slug' => 'user-generated-content',
                'description' => 'Content created by users and community members.',
                'color' => '#9b59b6',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Pending Categorization',
                        'slug' => 'pending-categorization',
                        'description' => 'Posts that do not fit into any specific category.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],
                    [
                        'name' => 'Uncategorized',
                        'slug' => 'uncategorized',
                        'description' => 'Posts that do not fit into any specific category.',
                        'color' => '#7f8c8d',
                        'live' => true,
                    ],

                ],
            ]];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
