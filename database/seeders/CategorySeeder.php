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
                    [
                        'name' => 'Ai',
                        'slug' => 'relationships',
                        'description' => 'Advice and insights on building healthy relationships.',
                        'color' => '#9b59b6',
                        'live' => true,
                    ],

                ]
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

                ]
            ],
            [
                'name' => 'Decentralized Web',
                'slug' => 'decentralized-web',
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
                        'name' => 'Web3',
                        'slug' => 'web3',
                        'description' => 'Latest updates and trends in Web3 technologies.',
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
                        'name' => 'Decentralized Finance (DeFi)',
                        'slug' => 'defi',
                        'description' => 'Insights into the world of decentralized finance.',
                        'color' => '#c0392b',
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


                ]
            ],
            [
                'name' => 'Art & Media',
                'slug' => 'art and Entertainment',
                'description' => 'Travel guides and tips for adventurers.',
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

                ]
            ],
            [
                'name' => 'Other Topics',
                'slug' => 'other-topics',
                'description' => 'A collection of various topics and interests.',
                'color' => '#9b59b6',
                'live' => true,
                'children' => [
                    [
                        'name' => 'Uncategorized',
                        'slug' => 'uncategorized',
                        'description' => 'Posts that do not fit into any specific category.',
                        'color' => '#8e44ad',
                        'live' => true,
                    ],

                ]
            ]];


        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
