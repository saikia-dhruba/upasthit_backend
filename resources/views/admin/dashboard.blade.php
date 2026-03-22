@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main class="flex-1 min-w-0 p-3 sm:p-6">
        <!-- Statistics Overview - Super Admin View -->
        <div id="superAdminStats" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Companies</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-gray-900 mt-2">245</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+8.3%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-primary">
                            <i class="ri-building-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Active Users</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-gray-900 mt-2">12,847</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+15.2%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-secondary">
                            <i class="ri-user-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Monthly Revenue</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-gray-900 mt-2">$89,245</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+22.1%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-purple-600">
                            <i class="ri-money-dollar-circle-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Platform Health</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-secondary mt-2">Excellent</p>
                        <div class="flex items-center mt-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-gray-600 text-sm ml-2">99.9% Uptime</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-secondary">
                            <i class="ri-shield-check-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Overview - Company Admin View -->
        <div id="companyAdminStats"
            class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Employees</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-gray-900 mt-2">187</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+5.2%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-primary">
                            <i class="ri-user-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Today's Check-ins</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-gray-900 mt-2">156</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+3.1%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-secondary">
                            <i class="ri-check-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Attendance Rate</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-gray-900 mt-2">94.8%</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+1.2%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-orange-500">
                            <i class="ri-bar-chart-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Plan Status</p>
                        <p class="dashboard-stat-value text-3xl font-bold text-purple-600 mt-2">Enterprise</p>
                        <div class="flex items-center mt-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-gray-600 text-sm ml-2">Active</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-purple-600">
                            <i class="ri-vip-crown-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Grid - Super Admin View -->
        <div id="superAdminMain" class="grid grid-cols-1 xl:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <!-- Companies Management -->
            <div class="xl:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <h3 class="text-lg font-semibold text-gray-900">Companies Management</h3>
                        <div class="dashboard-toolbar flex items-center space-x-2">
                            <input type="text" placeholder="Search companies..."
                                class="w-full min-w-0 px-3 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <button
                                class="w-full sm:w-auto px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-600 text-sm whitespace-nowrap rounded-button! cursor-pointer">Add
                                Company</button>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4 max-h-80 sm:max-h-96 overflow-y-auto">
                        <div
                            class="dashboard-list-item flex items-start sm:items-center space-x-3 sm:space-x-4 p-3 sm:p-4 bg-gray-50 rounded-lg">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="ri-building-line text-blue-600 text-xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                    <h4 class="font-medium text-gray-900 truncate">TechCorp Solutions</h4>
                                    <span class="text-xs sm:text-sm text-gray-500 mt-1 sm:mt-0">Enterprise</span>
                                </div>
                                <p class="text-xs sm:text-sm text-gray-600 mt-1">187 employees • Last activity: 5
                                    min ago</p>
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center mt-2 space-y-2 sm:space-y-0 sm:space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 w-fit">Active</span>
                                    <div class="dashboard-inline-actions flex space-x-2">
                                        <button
                                            class="text-primary hover:text-blue-700 text-xs sm:text-sm font-medium cursor-pointer">Manage</button>
                                        <button
                                            class="text-gray-500 hover:text-gray-700 text-xs sm:text-sm cursor-pointer">Suspend</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list-item flex items-start sm:items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="ri-building-line text-purple-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-gray-900">Global Dynamics Inc</h4>
                                    <span class="text-sm text-gray-500">Premium</span>
                                </div>
                                <p class="text-sm text-gray-600">95 employees • Last activity: 1 hour ago</p>
                                <div class="dashboard-inline-actions flex items-center mt-2 space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                    <button
                                        class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Manage</button>
                                    <button
                                        class="text-gray-500 hover:text-gray-700 text-sm cursor-pointer">Suspend</button>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list-item flex items-start sm:items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="ri-building-line text-orange-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-gray-900">StartupXYZ Ltd</h4>
                                    <span class="text-sm text-gray-500">Basic</span>
                                </div>
                                <p class="text-sm text-gray-600">23 employees • Last activity: 3 hours ago</p>
                                <div class="dashboard-inline-actions flex items-center mt-2 space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Trial</span>
                                    <button
                                        class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Manage</button>
                                    <button
                                        class="text-gray-500 hover:text-gray-700 text-sm cursor-pointer">Contact</button>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list-item flex items-start sm:items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="ri-building-line text-gray-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-gray-900">Industrial Works Co</h4>
                                    <span class="text-sm text-gray-500">Enterprise</span>
                                </div>
                                <p class="text-sm text-gray-600">342 employees • Last activity: 2 days ago</p>
                                <div class="dashboard-inline-actions flex items-center mt-2 space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Suspended</span>
                                    <button
                                        class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Reactivate</button>
                                    <button
                                        class="text-gray-500 hover:text-gray-700 text-sm cursor-pointer">Contact</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Admin Main Content -->
            <div id="companyAdminMain" class="hidden xl:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Real-time Employee Feed</h3>
                        <div class="dashboard-inline-actions flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm text-gray-600">Live</span>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4 max-h-80 sm:max-h-96 overflow-y-auto">
                        <div
                            class="dashboard-list-item flex items-start sm:items-center space-x-3 sm:space-x-4 p-3 sm:p-4 bg-gray-50 rounded-lg">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20male&width=48&height=48&seq=user001&orientation=squarish"
                                alt="User"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover object-top flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                    <h4 class="font-medium text-gray-900 truncate">Michael Chen</h4>
                                    <span class="text-xs sm:text-sm text-gray-500 mt-1 sm:mt-0">2 min ago</span>
                                </div>
                                <p class="text-xs sm:text-sm text-gray-600 mt-1">Check-in • Office Building A,
                                    Floor
                                    3</p>
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center mt-2 space-y-2 sm:space-y-0 sm:space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 w-fit">On
                                        Time</span>
                                    <div class="dashboard-inline-actions flex space-x-2">
                                        <button
                                            class="text-primary hover:text-blue-700 text-xs sm:text-sm font-medium cursor-pointer">Approve</button>
                                        <button
                                            class="text-gray-500 hover:text-gray-700 text-xs sm:text-sm cursor-pointer">Flag</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list-item flex items-start sm:items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20female&width=48&height=48&seq=user002&orientation=squarish"
                                alt="User" class="w-12 h-12 rounded-full object-cover object-top">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-gray-900">Emma Rodriguez</h4>
                                    <span class="text-sm text-gray-500">5 min ago</span>
                                </div>
                                <p class="text-sm text-gray-600">Check-out • Remote Location</p>
                                <div class="dashboard-inline-actions flex items-center mt-2 space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Remote</span>
                                    <button
                                        class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Approve</button>
                                    <button class="text-gray-500 hover:text-gray-700 text-sm cursor-pointer">Flag</button>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list-item flex items-start sm:items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20male&width=48&height=48&seq=user003&orientation=squarish"
                                alt="User" class="w-12 h-12 rounded-full object-cover object-top">
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-gray-900">David Kim</h4>
                                    <span class="text-sm text-gray-500">8 min ago</span>
                                </div>
                                <p class="text-sm text-gray-600">Check-in • Office Building B, Floor 1</p>
                                <div class="dashboard-inline-actions flex items-center mt-2 space-x-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Late</span>
                                    <button
                                        class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Approve</button>
                                    <button class="text-gray-500 hover:text-gray-700 text-sm cursor-pointer">Flag</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Super Admin Quick Actions -->
            <div id="superAdminActions" class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Platform Actions</h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4">
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-primary text-white rounded-button hover:bg-blue-600 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-building-add-line text-xl"></i>
                            </div>
                            <span class="font-medium">Add New Company</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-vip-crown-line text-xl"></i>
                            </div>
                            <span class="font-medium">Manage Packages</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-global-line text-xl"></i>
                            </div>
                            <span class="font-medium">Platform Settings</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-file-chart-line text-xl"></i>
                            </div>
                            <span class="font-medium">Revenue Analytics</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-customer-service-line text-xl"></i>
                            </div>
                            <span class="font-medium">Support Center</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Company Admin Quick Actions -->
            <div id="companyAdminActions" class="hidden bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4">
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-primary text-white rounded-button hover:bg-blue-600 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-user-add-line text-xl"></i>
                            </div>
                            <span class="font-medium">Add New Employee</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-calendar-line text-xl"></i>
                            </div>
                            <span class="font-medium">Manage Schedules</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-team-line text-xl"></i>
                            </div>
                            <span class="font-medium">Department Setup</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-notification-line text-xl"></i>
                            </div>
                            <span class="font-medium">Send Notifications</span>
                        </button>
                        <button
                            class="dashboard-action-button w-full flex items-center space-x-3 p-4 text-left bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap !rounded-button cursor-pointer">
                            <div class="w-6 h-6 flex items-center justify-center">
                                <i class="ri-file-chart-line text-xl"></i>
                            </div>
                            <span class="font-medium">Generate Reports</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Management Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 sm:mb-8">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-900">User Management</h3>
                    <div
                        class="dashboard-toolbar flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search users..."
                                class="w-full sm:w-auto pl-10 pr-4 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <div
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center text-gray-400">
                                <i class="ri-search-line"></i>
                            </div>
                        </div>
                        <select
                            class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary pr-8 cursor-pointer">
                            <option>All Roles</option>
                            <option>Admin</option>
                            <option>Manager</option>
                            <option>Employee</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="dashboard-table-shell overflow-x-auto">
                <table class="w-full min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th
                                class="hidden sm:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role</th>
                            <th
                                class="hidden md:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subscription</th>
                            <th
                                class="hidden lg:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Last Activity</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 sm:px-6 py-4">
                                <div class="flex items-center">
                                    <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20female&width=40&height=40&seq=user005&orientation=squarish"
                                        alt="User"
                                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover object-top flex-shrink-0">
                                    <div class="ml-3 sm:ml-4 min-w-0">
                                        <div class="text-sm font-medium text-gray-900 truncate">Jennifer Wilson
                                        </div>
                                        <div class="text-xs sm:text-sm text-gray-500 truncate sm:hidden">Manager
                                        </div>
                                        <div class="text-xs sm:text-sm text-gray-500 truncate hidden sm:block">
                                            jennifer.wilson@company.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden sm:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Manager</td>
                            <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Enterprise</span>
                            </td>
                            <td class="hidden lg:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500">2
                                hours ago</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                            </td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                <div class="flex flex-col sm:flex-row space-y-1 sm:space-y-0 sm:space-x-3">
                                    <button class="text-primary hover:text-blue-700 text-left cursor-pointer">Edit</button>
                                    <button
                                        class="text-red-600 hover:text-red-700 text-left cursor-pointer">Deactivate</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20male&width=40&height=40&seq=user006&orientation=squarish"
                                        alt="User" class="w-10 h-10 rounded-full object-cover object-top">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Robert Martinez</div>
                                        <div class="text-sm text-gray-500">robert.martinez@company.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Employee</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Premium</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 day ago</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-primary hover:text-blue-700 mr-3 cursor-pointer">Edit</button>
                                <button class="text-red-600 hover:text-red-700 cursor-pointer">Deactivate</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20female&width=40&height=40&seq=user007&orientation=squarish"
                                        alt="User" class="w-10 h-10 rounded-full object-cover object-top">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Amanda Foster</div>
                                        <div class="text-sm text-gray-500">amanda.foster@company.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Employee</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Free</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 hours ago</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-primary hover:text-blue-700 mr-3 cursor-pointer">Edit</button>
                                <button class="text-red-600 hover:text-red-700 cursor-pointer">Deactivate</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Role and Permission Configuration (Super Admin Only) -->
        <div id="rolePermissionConfig" class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 sm:mb-8">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Role & Permission Configuration</h3>
                <p class="text-sm text-gray-600 mt-1">Configure app features based on subscription tiers</p>
            </div>
            <div class="p-4 sm:p-6">
                <div class="dashboard-table-shell overflow-x-auto">
                    <table class="w-full min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-2 sm:px-4 font-medium text-gray-900 text-sm sm:text-base">
                                    Feature</th>
                                <th class="text-center py-3 px-2 sm:px-4 font-medium text-gray-900 text-sm sm:text-base">
                                    Free</th>
                                <th class="text-center py-3 px-2 sm:px-4 font-medium text-gray-900 text-sm sm:text-base">
                                    Premium</th>
                                <th class="text-center py-3 px-2 sm:px-4 font-medium text-gray-900 text-sm sm:text-base">
                                    Enterprise</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-3 sm:py-4 px-2 sm:px-4 text-xs sm:text-sm text-gray-900">Basic
                                    Check-in/Check-out</td>
                                <td class="py-3 sm:py-4 px-2 sm:px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-sm text-gray-900">GPS Location Tracking</td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-sm text-gray-900">Advanced Reporting</td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-sm text-gray-900">Team Management</td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-4 text-sm text-gray-900">API Access</td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="custom-toggle active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Holiday Management Panel (Company Admin View) -->
        <div id="holidayManagementPanel" class="hidden bg-white rounded-lg shadow-sm border border-gray-200 mb-6 sm:mb-8">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-900">Holiday Management</h3>
                    <button
                        class="w-full sm:w-auto px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-600 text-sm whitespace-nowrap rounded-button! cursor-pointer"
                        onclick="openAddHolidayModal()">Add Holiday</button>
                </div>
            </div>
            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Monthly Calendar -->
                    <div class="lg:col-span-2">
                        <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                            <h4 class="font-medium text-gray-900">March 2026</h4>
                            <div class="dashboard-inline-actions flex items-center space-x-2">
                                <button
                                    class="p-2 text-gray-500 hover:text-gray-700 rounded-button hover:bg-gray-100 cursor-pointer">
                                    <div class="w-4 h-4 flex items-center justify-center">
                                        <i class="ri-arrow-left-s-line"></i>
                                    </div>
                                </button>
                                <button
                                    class="p-2 text-gray-500 hover:text-gray-700 rounded-button hover:bg-gray-100 cursor-pointer">
                                    <div class="w-4 h-4 flex items-center justify-center">
                                        <i class="ri-arrow-right-s-line"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="dashboard-calendar-shell">
                        <div class="dashboard-calendar-grid grid grid-cols-7 gap-1 mb-2">
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Sun</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Mon</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Tue</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Wed</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Thu</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Fri</div>
                            <div class="text-center text-xs font-medium text-gray-500 py-2">Sat</div>
                        </div>
                        <div class="dashboard-calendar-grid grid grid-cols-7 gap-1">
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-400 flex items-center justify-center">
                                23</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-400 flex items-center justify-center">
                                24</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-400 flex items-center justify-center">
                                25</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-400 flex items-center justify-center">
                                26</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-400 flex items-center justify-center">
                                27</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-400 flex items-center justify-center">
                                28</div>
                            <div class="aspect-square p-2 text-center text-sm bg-red-100 text-red-800 rounded cursor-pointer hover:bg-red-200 flex items-center justify-center"
                                title="New Year's Day">1</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                2</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                3</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                4</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                5</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                6</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                7</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                8</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                9</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                10</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                11</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                12</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                13</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                14</div>
                            <div class="aspect-square p-2 text-center text-sm bg-blue-100 text-blue-800 rounded cursor-pointer hover:bg-blue-200 flex items-center justify-center"
                                title="Independence Day">15</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                16</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                17</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                18</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                19</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                20</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                21</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-white bg-primary rounded cursor-pointer hover:bg-blue-600 flex items-center justify-center">
                                22</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                23</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                24</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                25</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                26</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                27</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                28</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                29</div>
                            <div
                                class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded flex items-center justify-center">
                                30</div>
                            <div class="aspect-square p-2 text-center text-sm bg-green-100 text-green-800 rounded cursor-pointer hover:bg-green-200 flex items-center justify-center"
                                title="Company Holiday">31</div>
                        </div>
                        </div>
                    </div>
                    <!-- Holiday List -->
                    <div>
                        <h4 class="font-medium text-gray-900 mb-4">Upcoming Holidays</h4>
                        <div class="space-y-3">
                            <div class="p-3 bg-red-50 rounded-lg border border-red-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-red-900">New Year's Day</h5>
                                        <p class="text-sm text-red-700">March 1, 2026</p>
                                    </div>
                                    <button class="text-red-600 hover:text-red-800 cursor-pointer"
                                        onclick="removeHoliday(this)">
                                        <div class="w-4 h-4 flex items-center justify-center">
                                            <i class="ri-delete-bin-line"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-blue-900">Independence Day</h5>
                                        <p class="text-sm text-blue-700">March 15, 2026</p>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-800 cursor-pointer"
                                        onclick="removeHoliday(this)">
                                        <div class="w-4 h-4 flex items-center justify-center">
                                            <i class="ri-delete-bin-line"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3 bg-green-50 rounded-lg border border-green-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-green-900">Company Holiday</h5>
                                        <p class="text-sm text-green-700">March 31, 2026</p>
                                    </div>
                                    <button class="text-green-600 hover:text-green-800 cursor-pointer"
                                        onclick="removeHoliday(this)">
                                        <div class="w-4 h-4 flex items-center justify-center">
                                            <i class="ri-delete-bin-line"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <h4 class="font-medium text-gray-900 mb-3">Monthly Attendance Calculation</h4>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600">Working Days:</span>
                            <span class="font-medium text-gray-900 ml-2">28</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Holidays:</span>
                            <span class="font-medium text-red-600 ml-2">3</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Effective Days:</span>
                            <span class="font-medium text-primary ml-2">25</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule Management and Analytics Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6">
            <!-- Schedule Management Interface -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <h3 class="text-lg font-semibold text-gray-900">Schedule Management</h3>
                        <div class="dashboard-inline-actions flex items-center space-x-2">
                            <button
                                class="px-3 py-1 text-xs sm:text-sm bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 whitespace-nowrap rounded-button! cursor-pointer">Today</button>
                            <button
                                class="px-3 py-1 text-xs sm:text-sm bg-primary text-white rounded-button hover:bg-blue-600 whitespace-nowrap rounded-button! cursor-pointer">Week</button>
                            <button
                                class="px-3 py-1 text-xs sm:text-sm bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 whitespace-nowrap rounded-button! cursor-pointer">Month</button>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="dashboard-calendar-shell">
                    <div class="dashboard-calendar-grid grid grid-cols-7 gap-1 sm:gap-2 mb-4">
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Mon
                        </div>
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Tue
                        </div>
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Wed
                        </div>
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Thu
                        </div>
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Fri
                        </div>
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Sat
                        </div>
                        <div class="text-center text-xs sm:text-sm font-medium text-gray-500 py-1 sm:py-2">Sun
                        </div>
                    </div>
                    <div class="dashboard-calendar-grid grid grid-cols-7 gap-1 sm:gap-2">
                        <div
                            class="aspect-square p-1 sm:p-2 text-center text-xs sm:text-sm text-gray-400 flex items-center justify-center">
                            28</div>
                        <div class="aspect-square p-2 text-center text-sm text-gray-400">29</div>
                        <div class="aspect-square p-2 text-center text-sm text-gray-400">30</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 bg-blue-100 rounded cursor-pointer hover:bg-blue-200">
                            1</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            2</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            3</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            4</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            5</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            6</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            7</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            8</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            9</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            10</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            11</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            12</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            13</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            14</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            15</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            16</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            17</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            18</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            19</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            20</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            21</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-white bg-primary rounded cursor-pointer hover:bg-blue-600">
                            22</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            23</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            24</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            25</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            26</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            27</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            28</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            29</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            30</div>
                        <div
                            class="aspect-square p-2 text-center text-sm text-gray-900 cursor-pointer hover:bg-gray-100 rounded">
                            31</div>
                    </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="dashboard-inline-actions flex items-center space-x-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Regular Shift</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Night Shift</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Holiday</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics and Reporting Dashboard -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <h3 class="text-lg font-semibold text-gray-900">Attendance Analytics</h3>
                        <button
                            class="w-full sm:w-fit px-4 py-2 text-xs sm:text-sm bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 whitespace-nowrap rounded-button! cursor-pointer">Export
                            Report</button>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div id="attendanceChart" class="h-48 sm:h-64"></div>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">94.2%</p>
                            <p class="text-sm text-gray-600">Attendance Rate</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-gray-900">8.5h</p>
                            <p class="text-sm text-gray-600">Avg Daily Hours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Holiday Modal -->
        <div id="addHolidayModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="dashboard-modal-panel bg-white rounded-lg p-6 w-full max-w-md mx-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Add New Holiday</h3>
                    <button class="text-gray-500 hover:text-gray-700 cursor-pointer" onclick="closeAddHolidayModal()">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-close-line text-xl"></i>
                        </div>
                    </button>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Holiday Name</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Enter holiday name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary pr-8 cursor-pointer">
                            <option>National Holiday</option>
                            <option>Company Holiday</option>
                            <option>Religious Holiday</option>
                            <option>Optional Holiday</option>
                        </select>
                    </div>
                    <div class="dashboard-toolbar flex space-x-3 pt-4">
                        <button type="button"
                            class="w-full sm:flex-1 px-4 py-2 text-gray-600 border border-gray-300 rounded-button hover:bg-gray-50 whitespace-nowrap rounded-button! cursor-pointer"
                            onclick="closeAddHolidayModal()">Cancel</button>
                        <button type="submit"
                            class="w-full sm:flex-1 px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-600 whitespace-nowrap rounded-button! cursor-pointer">Add
                            Holiday</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
