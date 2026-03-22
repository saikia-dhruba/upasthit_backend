@extends('layouts.app')

@section('title', 'Analytics')

@section('content')
    <main class="flex-1 min-w-0 p-3 sm:p-6">
        <!-- Page Header -->
        <div class="mb-6 sm:mb-8">
            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Analytics Dashboard</h1>
                    <p class="text-gray-600 mt-1">Comprehensive attendance analytics and reporting insights</p>
                </div>
                <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-3">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                        <select
                            class="w-full sm:w-auto px-3 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary pr-8 cursor-pointer">
                            <option>All Departments</option>
                            <option>Engineering</option>
                            <option>Marketing</option>
                            <option>Sales</option>
                            <option>HR</option>
                        </select>
                        <select
                            class="w-full sm:w-auto px-3 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary pr-8 cursor-pointer">
                            <option>Last 30 Days</option>
                            <option>Last 7 Days</option>
                            <option>Last 90 Days</option>
                            <option>This Year</option>
                        </select>
                    </div>
                    <button
                        class="w-full sm:w-auto px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-600 text-sm whitespace-nowrap rounded-button! cursor-pointer">
                        <div class="flex items-center justify-center space-x-2">
                            <div class="w-4 h-4 flex items-center justify-center">
                                <i class="ri-download-line"></i>
                            </div>
                            <span>Export Report</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Key Performance Indicators -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Overall Attendance Rate</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">94.8%</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+2.3%</span>
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
                        <p class="text-gray-600 text-sm font-medium">Average Working Hours</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">8.2h</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+0.5h</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-primary">
                            <i class="ri-time-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Late Arrivals</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">23</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-red-500">
                                <i class="ri-arrow-down-line"></i>
                            </div>
                            <span class="text-red-500 text-sm font-medium ml-1">-12%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-orange-500">
                            <i class="ri-alarm-warning-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Remote Work Sessions</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2">156</p>
                        <div class="flex items-center mt-2">
                            <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                <i class="ri-arrow-up-line"></i>
                            </div>
                            <span class="text-green-500 text-sm font-medium ml-1">+18%</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <div class="w-6 h-6 flex items-center justify-center text-purple-600">
                            <i class="ri-home-wifi-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <!-- Attendance Trends Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <h3 class="text-lg font-semibold text-gray-900">Attendance Trends</h3>
                        <div class="flex flex-wrap items-center gap-2">
                            <button
                                class="px-3 py-1 text-xs sm:text-sm bg-primary text-white rounded-button hover:bg-blue-600 whitespace-nowrap rounded-button! cursor-pointer">Daily</button>
                            <button
                                class="px-3 py-1 text-xs sm:text-sm bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 whitespace-nowrap rounded-button! cursor-pointer">Weekly</button>
                            <button
                                class="px-3 py-1 text-xs sm:text-sm bg-gray-100 text-gray-700 rounded-button hover:bg-gray-200 whitespace-nowrap rounded-button! cursor-pointer">Monthly</button>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-6">
                    <div id="attendanceTrendChart" class="h-64 sm:h-80"></div>
                </div>
            </div>

            <!-- Department Performance Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Department Performance</h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div id="departmentChart" class="h-64 sm:h-80"></div>
                </div>
            </div>
        </div>

        <!-- Detailed Analytics Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
            <!-- Working Hours Distribution -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Working Hours Distribution</h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div id="hoursDistributionChart" class="h-48 sm:h-64"></div>
                </div>
            </div>

            <!-- Top Performers -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Top Performers</h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20female&width=40&height=40&seq=perf001&orientation=squarish"
                                alt="Employee" class="w-10 h-10 rounded-full object-cover object-top">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-gray-900">Emily Chen</h4>
                                <p class="text-sm text-gray-600">Engineering</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-sm font-medium text-green-600">98.5%</p>
                                <p class="text-xs text-gray-500">Attendance</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20male&width=40&height=40&seq=perf002&orientation=squarish"
                                alt="Employee" class="w-10 h-10 rounded-full object-cover object-top">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-gray-900">Marcus Rodriguez</h4>
                                <p class="text-sm text-gray-600">Marketing</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-sm font-medium text-green-600">97.8%</p>
                                <p class="text-xs text-gray-500">Attendance</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20female&width=40&height=40&seq=perf003&orientation=squarish"
                                alt="Employee" class="w-10 h-10 rounded-full object-cover object-top">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-gray-900">Sarah Thompson</h4>
                                <p class="text-sm text-gray-600">Sales</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-sm font-medium text-green-600">96.9%</p>
                                <p class="text-xs text-gray-500">Attendance</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style%20male&width=40&height=40&seq=perf004&orientation=squarish"
                                alt="Employee" class="w-10 h-10 rounded-full object-cover object-top">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-gray-900">David Kim</h4>
                                <p class="text-sm text-gray-600">HR</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-sm font-medium text-green-600">96.2%</p>
                                <p class="text-xs text-gray-500">Attendance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparative Analysis -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-4 sm:p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Comparative Analysis</h3>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="space-y-4">
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-gray-900">This Month vs Last Month</h4>
                                <p class="text-sm text-gray-600">Attendance Rate</p>
                            </div>
                            <div class="text-left sm:text-right">
                                <p class="text-lg font-bold text-green-600">+2.3%</p>
                                <div class="w-4 h-4 flex items-center justify-center text-green-500">
                                    <i class="ri-arrow-up-line"></i>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-gray-900">Remote vs Office</h4>
                                <p class="text-sm text-gray-600">Working Hours</p>
                            </div>
                            <div class="text-left sm:text-right">
                                <p class="text-lg font-bold text-blue-600">8.1h vs 8.3h</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-gray-900">Peak Hours</h4>
                                <p class="text-sm text-gray-600">Check-in Time</p>
                            </div>
                            <div class="text-left sm:text-right">
                                <p class="text-lg font-bold text-gray-900">9:00 AM</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-gray-900">Weekend Activity</h4>
                                <p class="text-sm text-gray-600">Overtime Sessions</p>
                            </div>
                            <div class="text-left sm:text-right">
                                <p class="text-lg font-bold text-orange-600">12%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Logs Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 sm:mb-8">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Activity Logs</h3>
                        <div class="mt-2">
                            <button
                                class="text-primary text-sm font-medium bg-blue-50 px-3 py-1 rounded-button cursor-pointer">All
                                Activity Logs</button>
                        </div>
                    </div>
                    <button
                        class="w-full sm:w-auto px-4 py-2 bg-primary text-white rounded-button hover:bg-blue-600 text-sm whitespace-nowrap rounded-button! cursor-pointer">
                        <div class="flex items-center justify-center space-x-2">
                            <div class="w-4 h-4 flex items-center justify-center">
                                <i class="ri-refresh-line"></i>
                            </div>
                            <span>Reload</span>
                        </div>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[48rem]">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User Name</th>
                            <th
                                class="hidden sm:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Route</th>
                            <th
                                class="hidden md:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Method</th>
                            <th
                                class="hidden lg:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Device</th>
                            <th
                                class="hidden lg:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                IP Address</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 sm:px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Admin
                                    User</span>
                            </td>
                            <td class="hidden sm:table-cell px-6 py-4 text-sm text-gray-900">user/logs/activity</td>
                            <td class="hidden md:table-cell px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">GET</span>
                            </td>
                            <td class="hidden lg:table-cell px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Desktop</span>
                            </td>
                            <td class="hidden lg:table-cell px-6 py-4 text-sm text-gray-500">127.0.0.1</td>
                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-500">Mar 22, 2026 12:45</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Admin
                                    User</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">user/logs/errors</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">GET</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Desktop</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">127.0.0.1</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Mar 22, 2026 12:45</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Guest</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">user/login</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">POST</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Desktop</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">127.0.0.1</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Mar 22, 2026 12:45</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Admin
                                    User</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">user/management/roles</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">GET</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Desktop</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">127.0.0.1</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Mar 22, 2026 12:41</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Guest</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">user/login</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">POST</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Desktop</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">127.0.0.1</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Mar 22, 2026 12:41</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Detailed Reporting Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-900">Detailed Reports</h3>
                    <div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Search reports..."
                                class="w-full sm:w-auto pl-10 pr-4 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <div
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center text-gray-400">
                                <i class="ri-search-line"></i>
                            </div>
                        </div>
                        <select
                            class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-button text-sm focus:outline-none focus:ring-2 focus:ring-primary pr-8 cursor-pointer">
                            <option>All Report Types</option>
                            <option>Attendance Summary</option>
                            <option>Time Tracking</option>
                            <option>Department Analysis</option>
                            <option>Performance Metrics</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 flex items-center justify-center text-primary">
                                    <i class="ri-file-chart-line"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Monthly Attendance Report</h4>
                                <p class="text-sm text-gray-600">March 2026</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="text-sm text-gray-500">Generated: Mar 22, 2026</span>
                            <button
                                class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Download</button>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 flex items-center justify-center text-secondary">
                                    <i class="ri-time-line"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Time Tracking Analysis</h4>
                                <p class="text-sm text-gray-600">Q1 2026</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="text-sm text-gray-500">Generated: Mar 20, 2026</span>
                            <button
                                class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Download</button>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 flex items-center justify-center text-purple-600">
                                    <i class="ri-team-line"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Department Performance</h4>
                                <p class="text-sm text-gray-600">All Departments</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="text-sm text-gray-500">Generated: Mar 18, 2026</span>
                            <button
                                class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Download</button>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 flex items-center justify-center text-orange-500">
                                    <i class="ri-bar-chart-line"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Productivity Metrics</h4>
                                <p class="text-sm text-gray-600">Weekly Summary</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="text-sm text-gray-500">Generated: Mar 15, 2026</span>
                            <button
                                class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Download</button>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 flex items-center justify-center text-red-600">
                                    <i class="ri-alert-line"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Absence Analysis</h4>
                                <p class="text-sm text-gray-600">Last 30 Days</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="text-sm text-gray-500">Generated: Mar 12, 2026</span>
                            <button
                                class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Download</button>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 flex items-center justify-center text-gray-600">
                                    <i class="ri-file-text-line"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Custom Report Builder</h4>
                                <p class="text-sm text-gray-600">Create New Report</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="text-sm text-gray-500">Template Available</span>
                            <button
                                class="text-primary hover:text-blue-700 text-sm font-medium cursor-pointer">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script id="attendanceTrendChart">
        document.addEventListener('DOMContentLoaded', function() {
            const chartDom = document.getElementById('attendanceTrendChart');
            const myChart = echarts.init(chartDom);
            const option = {
                animation: false,
                grid: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0,
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        color: '#6b7280',
                        fontSize: 12
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        color: '#6b7280',
                        fontSize: 12
                    },
                    splitLine: {
                        lineStyle: {
                            color: '#f3f4f6'
                        }
                    }
                },
                series: [{
                        name: 'Attendance Rate',
                        type: 'line',
                        data: [92.5, 94.2, 93.8, 95.1],
                        smooth: true,
                        symbol: 'none',
                        lineStyle: {
                            color: 'rgba(87, 181, 231, 1)',
                            width: 3
                        },
                        areaStyle: {
                            color: {
                                type: 'linear',
                                x: 0,
                                y: 0,
                                x2: 0,
                                y2: 1,
                                colorStops: [{
                                        offset: 0,
                                        color: 'rgba(87, 181, 231, 0.1)'
                                    },
                                    {
                                        offset: 1,
                                        color: 'rgba(87, 181, 231, 0.01)'
                                    }
                                ]
                            }
                        }
                    },
                    {
                        name: 'Working Hours',
                        type: 'line',
                        data: [8.1, 8.3, 8.0, 8.2],
                        smooth: true,
                        symbol: 'none',
                        lineStyle: {
                            color: 'rgba(141, 211, 199, 1)',
                            width: 3
                        },
                        areaStyle: {
                            color: {
                                type: 'linear',
                                x: 0,
                                y: 0,
                                x2: 0,
                                y2: 1,
                                colorStops: [{
                                        offset: 0,
                                        color: 'rgba(141, 211, 199, 0.1)'
                                    },
                                    {
                                        offset: 1,
                                        color: 'rgba(141, 211, 199, 0.01)'
                                    }
                                ]
                            }
                        }
                    }
                ],
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    borderColor: '#e5e7eb',
                    textStyle: {
                        color: '#1f2937'
                    }
                }
            };
            myChart.setOption(option);
            window.addEventListener('resize', function() {
                myChart.resize();
            });
        });
    </script>

    <script id="departmentChart">
        document.addEventListener('DOMContentLoaded', function() {
            const chartDom = document.getElementById('departmentChart');
            const myChart = echarts.init(chartDom);
            const option = {
                animation: false,
                grid: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0,
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['Engineering', 'Marketing', 'Sales', 'HR', 'Finance'],
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        color: '#6b7280',
                        fontSize: 12
                    }
                },
                yAxis: {
                    type: 'value',
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisLabel: {
                        color: '#6b7280',
                        fontSize: 12
                    },
                    splitLine: {
                        lineStyle: {
                            color: '#f3f4f6'
                        }
                    }
                },
                series: [{
                    name: 'Attendance Rate',
                    type: 'bar',
                    data: [96.2, 94.8, 93.5, 97.1, 95.3],
                    itemStyle: {
                        color: 'rgba(87, 181, 231, 1)',
                        borderRadius: [4, 4, 0, 0]
                    }
                }],
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    borderColor: '#e5e7eb',
                    textStyle: {
                        color: '#1f2937'
                    }
                }
            };
            myChart.setOption(option);
            window.addEventListener('resize', function() {
                myChart.resize();
            });
        });
    </script>

    <script id="hoursDistributionChart">
        document.addEventListener('DOMContentLoaded', function() {
            const chartDom = document.getElementById('hoursDistributionChart');
            const myChart = echarts.init(chartDom);
            const option = {
                animation: false,
                series: [{
                    name: 'Working Hours',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    data: [{
                            value: 35,
                            name: '6-7 hours',
                            itemStyle: {
                                color: 'rgba(87, 181, 231, 1)'
                            }
                        },
                        {
                            value: 45,
                            name: '7-8 hours',
                            itemStyle: {
                                color: 'rgba(141, 211, 199, 1)'
                            }
                        },
                        {
                            value: 15,
                            name: '8-9 hours',
                            itemStyle: {
                                color: 'rgba(251, 191, 114, 1)'
                            }
                        },
                        {
                            value: 5,
                            name: '9+ hours',
                            itemStyle: {
                                color: 'rgba(252, 141, 98, 1)'
                            }
                        }
                    ],
                    itemStyle: {
                        borderRadius: 4
                    },
                    label: {
                        show: true,
                        color: '#1f2937',
                        fontSize: 12
                    }
                }],
                tooltip: {
                    trigger: 'item',
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    borderColor: '#e5e7eb',
                    textStyle: {
                        color: '#1f2937'
                    }
                }
            };
            myChart.setOption(option);
            window.addEventListener('resize', function() {
                myChart.resize();
            });
        });
    </script>
@endsection
