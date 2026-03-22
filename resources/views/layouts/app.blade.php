<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AttendanceTracker Pro - Multi-Tenant Management</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#10b981'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
</head>

<body class="bg-gray-50 min-h-screen overflow-x-hidden">
    @php
        $isDashboardRoute = request()->routeIs('user.dashboard');
        $isAnalyticsRoute = request()->routeIs('user.analytics');
        $currentPageTitle = trim($__env->yieldContent('title', $isAnalyticsRoute ? 'Analytics' : 'Dashboard'));
    @endphp
    <!-- Header Section -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="px-4 sm:px-6 py-4">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div class="flex min-w-0 items-center gap-3 sm:gap-8">
                    <div class="font-['Pacifico'] text-xl sm:text-2xl text-primary font-bold">
                        <span class="hidden sm:inline">AttendanceTracker Pro</span>
                        <span class="sm:hidden">ATP</span>
                    </div>
                    <div class="hidden lg:flex min-w-0 items-center gap-4 xl:gap-6">
                        <div class="flex items-center gap-2 px-3 py-1 bg-gray-100 rounded-full">
                            <span class="text-xs font-medium text-gray-600">View:</span>
                            <select id="dashboardView"
                                class="text-sm font-medium bg-transparent border-none focus:outline-none pr-6 cursor-pointer"
                                onchange="switchDashboard()">
                                <option value="super-admin">Super Admin</option>
                                <option value="company-admin">Company Admin</option>
                            </select>
                        </div>
                        <nav class="flex flex-wrap gap-2 xl:gap-6">
                            <a href="{{ route('user.dashboard') }}"
                                class="{{ $isDashboardRoute ? 'text-primary bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} font-medium px-3 py-2 rounded-button cursor-pointer">Dashboard</a>
                            <a href="#"
                                class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-button hover:bg-gray-50 cursor-pointer"
                                id="nav-item-1">Companies</a>
                            <a href="#"
                                class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-button hover:bg-gray-50 cursor-pointer"
                                id="nav-item-2">Packages</a>
                            <a href="{{ route('user.analytics') }}"
                                class="{{ $isAnalyticsRoute ? 'text-primary bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} px-3 py-2 rounded-button cursor-pointer"
                                id="nav-item-3">Analytics</a>
                        </nav>
                    </div>
                </div>
                <div class="flex shrink-0 items-center gap-2 sm:gap-4">
                    <button
                        class="lg:hidden p-2 text-gray-600 hover:text-gray-900 rounded-button hover:bg-gray-100 cursor-pointer"
                        onclick="toggleMobileMenu()">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-menu-line text-xl"></i>
                        </div>
                    </button>
                    <button
                        class="relative p-2 text-gray-600 hover:text-gray-900 rounded-button hover:bg-gray-100 cursor-pointer">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-notification-line text-xl"></i>
                        </div>
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    <div class="relative">
                        <button
                            class="flex max-w-full items-center space-x-2 sm:space-x-3 p-2 rounded-button hover:bg-gray-100 cursor-pointer"
                            onclick="toggleDropdown('profileDropdown')">
                            <img src="https://readdy.ai/api/search-image?query=professional%20business%20person%20headshot%20portrait%20clean%20white%20background%20corporate%20style&width=40&height=40&seq=admin001&orientation=squarish"
                                alt="Admin" class="w-8 h-8 rounded-full object-cover object-top">
                            <span class="hidden max-w-32 truncate sm:block text-gray-700 font-medium">Sarah Johnson</span>
                            <div class="w-4 h-4 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line text-gray-500"></i>
                            </div>
                        </button>
                        <div id="profileDropdown"
                            class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2">
                            <a href="#"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-50 cursor-pointer">Profile
                                Settings</a>
                            <a href="#"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-50 cursor-pointer">Account</a>
                            <hr class="my-2 border-gray-200">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 cursor-pointer">Sign
                                Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block px-4 sm:px-6 py-2 bg-gray-50 border-t border-gray-200">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                    <span>
                        @if ($isAnalyticsRoute)
                            Analytics
                        @else
                            Dashboard
                        @endif
                    </span>
                    <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                    <span class="text-gray-900" id="breadcrumb-current">{{ $currentPageTitle }}</span>
                </div>
                <div id="companyInfo" class="hidden flex flex-wrap items-center gap-2 text-sm">
                    <div class="w-6 h-6 bg-purple-100 rounded flex items-center justify-center">
                        <i class="ri-building-line text-purple-600"></i>
                    </div>
                    <span class="text-gray-900 font-medium">TechCorp Solutions</span>
                    <span class="text-gray-500">•</span>
                    <span class="text-gray-600">Enterprise Plan</span>
                </div>
            </div>
        </div>
        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-200">
            <nav class="px-4 py-4 space-y-2">
                <div class="mb-4">
                    <select id="mobileDashboardView"
                        class="w-full text-sm font-medium bg-gray-100 rounded-button px-3 py-2 border-none focus:outline-none cursor-pointer"
                        onchange="switchDashboard()">
                        <option value="super-admin">Super Admin</option>
                        <option value="company-admin">Company Admin</option>
                    </select>
                </div>
                <a href="{{ route('user.dashboard') }}"
                    class="{{ $isDashboardRoute ? 'text-primary bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} block font-medium px-3 py-2 rounded-button cursor-pointer">Dashboard</a>
                <a href="#"
                    class="block text-gray-600 hover:text-gray-900 px-3 py-2 rounded-button hover:bg-gray-50 cursor-pointer"
                    id="mobile-nav-1">Companies</a>
                <a href="#"
                    class="block text-gray-600 hover:text-gray-900 px-3 py-2 rounded-button hover:bg-gray-50 cursor-pointer"
                    id="mobile-nav-2">Packages</a>
                <a href="{{ route('user.analytics') }}"
                    class="{{ $isAnalyticsRoute ? 'text-primary bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }} block px-3 py-2 rounded-button cursor-pointer"
                    id="mobile-nav-3">Analytics</a>
            </nav>
        </div>
    </header>
    <div class="flex w-full min-w-0">
        <!-- Main Content -->
        @yield('content')
    </div>

    <script id="dropdownToggle">
        function toggleHiddenById(elementId, shouldHide) {
            const element = document.getElementById(elementId);

            if (!element) {
                return;
            }

            element.classList.toggle('hidden', shouldHide);
        }

        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);

            if (!dropdown) {
                return;
            }

            dropdown.classList.toggle('hidden');
        }

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');

            if (!mobileMenu) {
                return;
            }

            mobileMenu.classList.toggle('hidden');
        }

        function switchDashboard() {
            const dashboardViewSelect = document.getElementById('dashboardView');
            const mobileDashboardView = document.getElementById('mobileDashboardView');

            if (!dashboardViewSelect && !mobileDashboardView) {
                return;
            }

            const activeElement = document.activeElement;
            const dashboardView = activeElement === mobileDashboardView && mobileDashboardView ?
                mobileDashboardView.value :
                (dashboardViewSelect?.value || mobileDashboardView?.value);

            if (!dashboardView) {
                return;
            }

            if (dashboardViewSelect) {
                dashboardViewSelect.value = dashboardView;
            }

            if (mobileDashboardView) {
                mobileDashboardView.value = dashboardView;
            }
            const superAdminElements = ['superAdminStats', 'superAdminMain', 'superAdminActions', 'rolePermissionConfig'];
            const companyAdminElements = ['companyAdminStats', 'companyAdminMain', 'companyAdminActions',
                'holidayManagementPanel'
            ];
            const companyInfo = document.getElementById('companyInfo');
            const breadcrumbCurrent = document.getElementById('breadcrumb-current');
            const navItem1 = document.getElementById('nav-item-1');
            const navItem2 = document.getElementById('nav-item-2');
            const navItem3 = document.getElementById('nav-item-3');
            const mobileNav1 = document.getElementById('mobile-nav-1');
            const mobileNav2 = document.getElementById('mobile-nav-2');
            const mobileNav3 = document.getElementById('mobile-nav-3');

            if (dashboardView === 'super-admin') {
                superAdminElements.forEach(id => {
                    toggleHiddenById(id, false);
                });
                companyAdminElements.forEach(id => {
                    toggleHiddenById(id, true);
                });
                companyInfo?.classList.add('hidden');

                if (breadcrumbCurrent) breadcrumbCurrent.textContent = 'Super Admin Overview';
                if (navItem1) navItem1.textContent = 'Companies';
                if (navItem2) navItem2.textContent = 'Packages';
                if (navItem3) navItem3.textContent = 'Analytics';
                if (mobileNav1) mobileNav1.textContent = 'Companies';
                if (mobileNav2) mobileNav2.textContent = 'Packages';
                if (mobileNav3) mobileNav3.textContent = 'Analytics';
            } else {
                superAdminElements.forEach(id => {
                    toggleHiddenById(id, true);
                });
                companyAdminElements.forEach(id => {
                    toggleHiddenById(id, false);
                });
                companyInfo?.classList.remove('hidden');

                if (breadcrumbCurrent) breadcrumbCurrent.textContent = 'Company Dashboard';
                if (navItem1) navItem1.textContent = 'Employees';
                if (navItem2) navItem2.textContent = 'Departments';
                if (navItem3) navItem3.textContent = 'Reports';
                if (mobileNav1) mobileNav1.textContent = 'Employees';
                if (mobileNav2) mobileNav2.textContent = 'Departments';
                if (mobileNav3) mobileNav3.textContent = 'Reports';
            }
        }

        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('[id$="Dropdown"]');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target) && !event.target.closest('button')) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>

    <script id="toggleSwitches">
        function toggleSwitch(element) {
            element.classList.toggle('active');
        }
    </script>

    <script id="holidayManagement">
        function openAddHolidayModal() {
            const modal = document.getElementById('addHolidayModal');

            if (!modal) {
                return;
            }

            modal.classList.remove('hidden');
        }

        function closeAddHolidayModal() {
            const modal = document.getElementById('addHolidayModal');

            if (!modal) {
                return;
            }

            modal.classList.add('hidden');
        }

        function removeHoliday(button) {
            const holidayItem = button.closest('.p-3');
            holidayItem.remove();
        }
    </script>

    <script id="attendanceChart">
        document.addEventListener('DOMContentLoaded', function() {
            const chartDom = document.getElementById('attendanceChart');

            if (!chartDom || typeof echarts === 'undefined') {
                return;
            }

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
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
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
                    name: 'Check-ins',
                    type: 'line',
                    data: [820, 932, 901, 934, 1290, 1330, 1320],
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
</body>

</html>
