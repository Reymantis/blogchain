<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3-Column Layout with Sliding Sidebars</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    <style>
        /* Custom styles for the sliding animations */
        .slide-enter {
            transform: translateX(-100%);
        }

        .slide-enter-active {
            transition: transform 0.3s ease-out;
            transform: translateX(0);
        }

        .slide-leave {
            transform: translateX(0);
        }

        .slide-leave-active {
            transition: transform 0.3s ease-in;
            transform: translateX(-100%);
        }

        .slide-right-enter {
            transform: translateX(100%);
        }

        .slide-right-enter-active {
            transition: transform 0.3s ease-out;
            transform: translateX(0);
        }

        .slide-right-leave {
            transform: translateX(0);
        }

        .slide-right-leave-active {
            transition: transform 0.3s ease-in;
            transform: translateX(100%);
        }
    </style>
</head>
<body class="bg-gray-100 h-screen overflow-hidden" x-data="{
    leftSidebarOpen: false,
    rightSidebarOpen: false,
    toggleLeftSidebar() { this.leftSidebarOpen = !this.leftSidebarOpen },
    toggleRightSidebar() { this.rightSidebarOpen = !this.rightSidebarOpen },
    closeSidebars() { this.leftSidebarOpen = false; this.rightSidebarOpen = false }
}">

<!-- Mobile Menu Buttons -->
<div class="lg:hidden fixed top-4 left-4 right-4 z-50 flex justify-between">
    <button @click="toggleLeftSidebar()" class="bg-blue-600 text-white p-3 rounded-xl shadow-lg hover:bg-blue-700 transition-all duration-200 hover:scale-105">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
    <button @click="toggleRightSidebar()"
            class="bg-green-600 text-white p-3 rounded-xl shadow-lg hover:bg-green-700 transition-all duration-200 hover:scale-105">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
        </svg>
    </button>
</div>

<!-- Main Container -->
<div class="flex h-full">

    <!-- Left Sidebar - Desktop -->
    <div class="hidden lg:block w-70 max-w-[280px] bg-blue-800 text-white shadow-lg">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-6">Left Sidebar</h2>
            <nav class="space-y-2">
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Dashboard</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Analytics</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Projects</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Team</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Settings</a>
            </nav>
        </div>
        <div class="absolute bottom-4 left-4 right-4">
            <div class="bg-blue-700 p-4 rounded-lg">
                <p class="text-sm">Welcome back!</p>
                <p class="text-xs text-blue-200">Last login: Today</p>
            </div>
        </div>
    </div>

    <!-- Left Sidebar - Mobile Overlay -->
    <div x-show="leftSidebarOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
         @click="closeSidebars()"></div>

    <div x-show="leftSidebarOpen"
         x-transition:enter="transform transition ease-out duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transform transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="lg:hidden fixed left-0 top-0 bottom-0 w-70 max-w-[280px] bg-blue-800 text-white shadow-xl z-50">
        <div class="flex justify-between items-center p-4 border-b border-blue-700">
            <h2 class="text-xl font-bold">Left Menu</h2>
            <button @click="leftSidebarOpen = false" class="text-white hover:text-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <nav class="space-y-2">
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Dashboard</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Analytics</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Projects</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Team</a>
                <a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:translate-x-1">Settings</a>
            </nav>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col bg-white">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b px-6 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">Main Content Area</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">June 4, 2025</span>
                    <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 rounded-xl p-8 mb-8 border border-blue-100">
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">Welcome to Your
                        Dashboard</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">This is the main content area that adapts to different screen sizes. On larger screens,
                        you'll see sidebars on both sides. On mobile devices, tap the menu buttons to access the sidebar content.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Statistics</h3>
                        <p class="text-3xl font-bold text-blue-600">1,234</p>
                        <p class="text-sm text-gray-500">Total Users</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Revenue</h3>
                        <p class="text-3xl font-bold text-green-600">$45,678</p>
                        <p class="text-sm text-gray-500">This Month</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Orders</h3>
                        <p class="text-3xl font-bold text-purple-600">890</p>
                        <p class="text-sm text-gray-500">Pending</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md border p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">JD</div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">John Doe created a new project</p>
                                <p class="text-sm text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold">SM</div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Sarah Miller completed a task</p>
                                <p class="text-sm text-gray-500">4 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-semibold">RJ</div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Robert Johnson updated the database</p>
                                <p class="text-sm text-gray-500">6 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Right Sidebar - Desktop -->
    <div class="hidden lg:block w-70 max-w-[280px] bg-green-800 text-white shadow-lg">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-6">Right Sidebar</h2>
            <div class="space-y-4">
                <div class="bg-green-700 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Quick Stats</h4>
                    <p class="text-sm">Active Users: 156</p>
                    <p class="text-sm">Online Now: 23</p>
                </div>
                <div class="bg-green-700 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Notifications</h4>
                    <div class="space-y-2">
                        <p class="text-sm bg-green-600 p-2 rounded">New message received</p>
                        <p class="text-sm bg-green-600 p-2 rounded">Task deadline approaching</p>
                        <p class="text-sm bg-green-600 p-2 rounded">System update available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar - Mobile Overlay -->
    <div x-show="rightSidebarOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
         @click="closeSidebars()"></div>

    <div x-show="rightSidebarOpen"
         x-transition:enter="transform transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transform transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="lg:hidden fixed right-0 top-0 bottom-0 w-70 max-w-[280px] bg-green-800 text-white shadow-xl z-50">
        <div class="flex justify-between items-center p-4 border-b border-green-700">
            <h2 class="text-xl font-bold">Right Menu</h2>
            <button @click="rightSidebarOpen = false" class="text-white hover:text-green-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="bg-green-700 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Quick Stats</h4>
                    <p class="text-sm">Active Users: 156</p>
                    <p class="text-sm">Online Now: 23</p>
                </div>
                <div class="bg-green-700 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Notifications</h4>
                    <div class="space-y-2">
                        <p class="text-sm bg-green-600 p-2 rounded">New message received</p>
                        <p class="text-sm bg-green-600 p-2 rounded">Task deadline approaching</p>
                        <p class="text-sm bg-green-600 p-2 rounded">System update available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
