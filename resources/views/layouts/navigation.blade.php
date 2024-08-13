<nav x-data="{ navOpen: false, notifOpen: false, msgOpen: false }" class="bg-white border-b border-gray-400 shadow-lg sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-2 py-4 sm:px-6 lg:px-8 ml-0 lg:ml-64">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-blue-500" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- super-user routes --}}
                    @role('super-user')
                        <x-nav-link class="flex flex-col" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Dashboard') }}

                        </x-nav-link>

                        <x-nav-link class="flex flex-col" :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Jobs') }}
                        </x-nav-link>
                        {{-- applications --}}
                        <x-nav-link class="flex flex-col" :href="route('job-application.list')" :active="request()->routeIs('job-application.list')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM5 6V5H19V6H5Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Job Applicants') }}
                        </x-nav-link>
                        {{-- alumni profiles --}}
                        <x-nav-link class="flex flex-col" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="53.000000pt" height="53.000000pt"
                                viewBox="0 0 53.000000 53.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,53.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M132 478 c-15 -15 -16 -55 -2 -63 8 -5 7 -12 -2 -23 -11 -15 -11 -15
                    2 -6 8 6 27 14 41 18 34 8 44 32 24 62 -17 26 -44 31 -63 12z" fill="currentColor" />
                                    <path d="M332 478 c-28 -28 -7 -78 33 -78 12 0 27 -6 35 -12 12 -11 12 -10 3
                    2 -8 10 -9 21 -3 30 14 22 12 36 -6 54 -18 19 -45 21 -62 4z" fill="currentColor" />
                                    <path d="M243 443 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
                                        fill="currentColor" />
                                    <path d="M230 372 c-61 -50 11 -135 74 -89 37 27 8 107 -39 107 -7 0 -23 -8
                    -35 -18z" fill="currentColor" />
                                    <path d="M86 321 c-3 -4 -19 -11 -35 -14 -50 -10 -53 -71 -3 -83 15 -4 34 -12
                    42 -18 13 -9 13 -9 2 6 -9 11 -10 18 -2 23 13 8 13 52 0 60 -8 5 -7 11 1 21 6
                    8 9 14 6 14 -3 0 -8 -4 -11 -9z" fill="currentColor" />
                                    <path d="M438 318 c9 -11 10 -18 2 -23 -5 -3 -10 -17 -10 -30 0 -13 5 -27 10
                    -30 8 -5 7 -12 -2 -23 -11 -15 -11 -15 2 -6 8 6 27 14 42 18 48 11 48 71 -1
                    82 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                    <path d="M180 233 l-35 -33 29 -24 c53 -44 128 -44 182 -1 l29 24 -32 32 c-26
                    27 -39 32 -84 33 -48 2 -57 -1 -89 -31z" fill="currentColor" />
                                    <path d="M128 138 c9 -11 10 -18 2 -23 -14 -8 -13 -48 2 -63 19 -19 46 -14 63
                    12 20 30 10 54 -24 62 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                    <path d="M395 140 c-3 -5 -16 -10 -29 -10 -42 0 -63 -53 -31 -80 36 -30 88 16
                    66 58 -7 13 -7 22 1 30 7 7 9 12 6 12 -4 0 -10 -4 -13 -10z" fill="currentColor" />
                                    <path d="M243 83 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
                                        fill="currentColor" />
                                </g>
                            </svg>
                            {{ __('Alumni Profiles') }}
                        </x-nav-link>
                        {{-- users --}}
                        <x-nav-link class="flex flex-col" :href="route('users.index')" :active="request()->routeIs('users.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Users') }}
                        </x-nav-link>

                        {{-- Permissions --}}
                        <x-nav-link class="flex flex-col" :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M2245 4835 c-244 -44 -472 -168 -643 -349 -403 -426 -429 -1083 -61
                                        -1540 480 -597 1398 -577 1856 41 170 229 253 527 223 803 -30 284 -142 520
                                        -340 720 -166 168 -389 285 -618 325 -102 18 -320 18 -417 0z" fill="currentColor" />
                                    <path d="M3886 2499 c-340 -46 -627 -302 -711 -635 -20 -77 -25 -122 -25 -222
                                        l0 -125 -259 -256 c-219 -216 -261 -262 -270 -296 -6 -23 -11 -150 -11 -300 0
                                        -251 1 -263 23 -305 12 -25 37 -55 56 -67 33 -23 40 -23 322 -23 178 0 298 4
                                        316 11 15 5 143 125 285 266 l256 256 134 1 c157 2 232 19 363 81 219 103 388
                                        301 455 535 49 169 36 395 -32 559 -64 153 -211 325 -344 403 -168 98 -376
                                        142 -558 117z m209 -638 c53 -24 111 -90 126 -143 44 -164 -96 -321 -261 -293
                                        -140 24 -230 192 -171 320 52 114 193 168 306 116z" fill="currentColor" />
                                    <path d="M2090 2310 c-426 -41 -807 -140 -1125 -295 -167 -81 -292 -165 -400
                                        -267 -140 -132 -217 -245 -266 -393 -23 -67 -24 -83 -24 -340 l0 -270 27 -57
                                        c34 -73 98 -137 174 -174 l59 -29 932 -3 932 -2 3 262 3 263 33 70 c29 61 59
                                        96 262 300 222 223 230 232 230 270 0 182 69 423 162 568 17 26 28 50 25 54
                                        -4 3 -69 14 -144 25 -159 22 -719 33 -883 18z" fill="currentColor" />
                                </g>
                            </svg>
                            {{ __('Permissions') }}
                        </x-nav-link>

                        {{-- Roles --}}
                        <x-nav-link class="flex flex-col" :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="64.000000pt" height="64.000000pt"
                                viewBox="0 0 64.000000 64.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M95 608 c-3 -7 -4 -141 -3 -298 l3 -285 164 -3 165 -3 43 43 c33 33
                                    43 49 43 75 0 18 -4 33 -10 33 -5 0 -10 -11 -10 -24 0 -21 -5 -25 -37 -28 -36
                                    -3 -38 -5 -41 -41 l-3 -37 -150 0 -149 0 0 280 0 280 190 0 190 0 0 -64 0 -65
                                    -52 -3 -53 -3 0 -115 0 -115 40 -3 c22 -2 48 -11 58 -19 15 -15 19 -15 35 0 9
                                    8 35 17 57 19 l40 3 0 115 0 115 -52 3 -52 3 -3 72 -3 72 -203 3 c-158 2 -204
                                    0 -207 -10z m500 -258 l0 -95 -35 -3 c-19 -2 -41 -8 -47 -14 -9 -7 -17 -7 -26
                                    0 -6 6 -28 12 -47 14 l-35 3 -3 84 c-2 46 0 90 2 98 4 11 27 13 98 11 l93 -3
                                    0 -95z m-125 -253 c0 -2 -9 -12 -20 -22 -19 -18 -20 -17 -20 3 0 15 6 22 20
                                    22 11 0 20 -2 20 -3z" />
                                    <path d="M467 424 c-17 -17 -6 -35 19 -32 15 2 29 -2 31 -9 3 -7 -10 -13 -34
                                    -15 -38 -3 -38 -3 -38 -48 l0 -45 55 0 55 0 3 34 c2 19 -1 44 -7 55 -5 12 -11
                                    30 -13 41 -2 14 -12 21 -33 23 -17 2 -34 0 -38 -4z" />
                                    <path d="M240 560 c0 -6 27 -10 60 -10 33 0 60 4 60 10 0 6 -27 10 -60 10 -33
                                    0 -60 -4 -60 -10z" />
                                    <path d="M140 510 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 510 c0 -6 52 -10 135 -10 83 0 135 4 135 10 0 6 -52 10 -135 10
                                    -83 0 -135 -4 -135 -10z" />
                                    <path d="M140 450 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 450 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                    0 -80 -4 -80 -10z" />
                                    <path d="M140 390 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 390 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                    0 -80 -4 -80 -10z" />
                                    <path d="M140 330 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 330 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                    0 -80 -4 -80 -10z" />
                                    <path d="M140 270 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 270 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                    0 -80 -4 -80 -10z" />
                                    <path d="M140 210 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 210 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                    0 -80 -4 -80 -10z" />
                                    <path d="M140 150 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 150 c0 -6 52 -10 135 -10 83 0 135 4 135 10 0 6 -52 10 -135 10
                                    -83 0 -135 -4 -135 -10z" />
                                    <path d="M140 90 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                    -15 -4 -15 -10z" />
                                    <path d="M190 90 c0 -6 38 -10 95 -10 57 0 95 4 95 10 0 6 -38 10 -95 10 -57
                                    0 -95 -4 -95 -10z" />
                                </g>
                            </svg>

                            {{ __('Roles') }}
                        </x-nav-link>
                    @endrole
                    {{-- admin routes --}}
                    @role('admin')
                        <x-nav-link class="flex flex-col" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Dashboard') }}

                        </x-nav-link>
                        {{-- jobs --}}
                        <x-nav-link class="flex flex-col" :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Jobs') }}
                        </x-nav-link>
                        {{-- users --}}
                        <x-nav-link class="flex flex-col" :href="route('users.index')" :active="request()->routeIs('users.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Users') }}
                        </x-nav-link>
                        {{-- permissions --}}
                        <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M2245 4835 c-244 -44 -472 -168 -643 -349 -403 -426 -429 -1083 -61
                                            -1540 480 -597 1398 -577 1856 41 170 229 253 527 223 803 -30 284 -142 520
                                            -340 720 -166 168 -389 285 -618 325 -102 18 -320 18 -417 0z" />
                                    <path d="M3886 2499 c-340 -46 -627 -302 -711 -635 -20 -77 -25 -122 -25 -222
                                            l0 -125 -259 -256 c-219 -216 -261 -262 -270 -296 -6 -23 -11 -150 -11 -300 0
                                            -251 1 -263 23 -305 12 -25 37 -55 56 -67 33 -23 40 -23 322 -23 178 0 298 4
                                            316 11 15 5 143 125 285 266 l256 256 134 1 c157 2 232 19 363 81 219 103 388
                                            301 455 535 49 169 36 395 -32 559 -64 153 -211 325 -344 403 -168 98 -376
                                            142 -558 117z m209 -638 c53 -24 111 -90 126 -143 44 -164 -96 -321 -261 -293
                                            -140 24 -230 192 -171 320 52 114 193 168 306 116z" />
                                    <path d="M2090 2310 c-426 -41 -807 -140 -1125 -295 -167 -81 -292 -165 -400
                                            -267 -140 -132 -217 -245 -266 -393 -23 -67 -24 -83 -24 -340 l0 -270 27 -57
                                            c34 -73 98 -137 174 -174 l59 -29 932 -3 932 -2 3 262 3 263 33 70 c29 61 59
                                            96 262 300 222 223 230 232 230 270 0 182 69 423 162 568 17 26 28 50 25 54
                                            -4 3 -69 14 -144 25 -159 22 -719 33 -883 18z" />
                                </g>
                            </svg>
                            {{ __('Permissions') }}
                        </x-nav-link>
                        {{-- roles --}}
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt"
                                height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M2245 4835 c-244 -44 -472 -168 -643 -349 -403 -426 -429 -1083 -61
                                                -1540 480 -597 1398 -577 1856 41 170 229 253 527 223 803 -30 284 -142 520
                                                -340 720 -166 168 -389 285 -618 325 -102 18 -320 18 -417 0z" />
                                    <path d="M3886 2499 c-340 -46 -627 -302 -711 -635 -20 -77 -25 -122 -25 -222
                                                l0 -125 -259 -256 c-219 -216 -261 -262 -270 -296 -6 -23 -11 -150 -11 -300 0
                                                -251 1 -263 23 -305 12 -25 37 -55 56 -67 33 -23 40 -23 322 -23 178 0 298 4
                                                316 11 15 5 143 125 285 266 l256 256 134 1 c157 2 232 19 363 81 219 103 388
                                                301 455 535 49 169 36 395 -32 559 -64 153 -211 325 -344 403 -168 98 -376
                                                142 -558 117z m209 -638 c53 -24 111 -90 126 -143 44 -164 -96 -321 -261 -293
                                                -140 24 -230 192 -171 320 52 114 193 168 306 116z" />
                                    <path d="M2090 2310 c-426 -41 -807 -140 -1125 -295 -167 -81 -292 -165 -400
                                                -267 -140 -132 -217 -245 -266 -393 -23 -67 -24 -83 -24 -340 l0 -270 27 -57
                                                c34 -73 98 -137 174 -174 l59 -29 932 -3 932 -2 3 262 3 263 33 70 c29 61 59
                                                96 262 300 222 223 230 232 230 270 0 182 69 423 162 568 17 26 28 50 25 54
                                                -4 3 -69 14 -144 25 -159 22 -719 33 -883 18z" />
                                </g>
                            </svg>

                            {{ __('Roles') }}
                        </x-nav-link>
                    @endrole
                    {{-- Alumni routes --}}
                    @role('alumni')
                        <x-nav-link class="flex flex-col" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Dashboard') }}

                        </x-nav-link>

                        <x-nav-link class="flex flex-col" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="53.000000pt"
                                height="53.000000pt" viewBox="0 0 53.000000 53.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,53.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M132 478 c-15 -15 -16 -55 -2 -63 8 -5 7 -12 -2 -23 -11 -15 -11 -15
                    2 -6 8 6 27 14 41 18 34 8 44 32 24 62 -17 26 -44 31 -63 12z" fill="currentColor" />
                                    <path d="M332 478 c-28 -28 -7 -78 33 -78 12 0 27 -6 35 -12 12 -11 12 -10 3
                    2 -8 10 -9 21 -3 30 14 22 12 36 -6 54 -18 19 -45 21 -62 4z" fill="currentColor" />
                                    <path d="M243 443 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
                                        fill="currentColor" />
                                    <path d="M230 372 c-61 -50 11 -135 74 -89 37 27 8 107 -39 107 -7 0 -23 -8
                    -35 -18z" fill="currentColor" />
                                    <path d="M86 321 c-3 -4 -19 -11 -35 -14 -50 -10 -53 -71 -3 -83 15 -4 34 -12
                    42 -18 13 -9 13 -9 2 6 -9 11 -10 18 -2 23 13 8 13 52 0 60 -8 5 -7 11 1 21 6
                    8 9 14 6 14 -3 0 -8 -4 -11 -9z" fill="currentColor" />
                                    <path d="M438 318 c9 -11 10 -18 2 -23 -5 -3 -10 -17 -10 -30 0 -13 5 -27 10
                    -30 8 -5 7 -12 -2 -23 -11 -15 -11 -15 2 -6 8 6 27 14 42 18 48 11 48 71 -1
                    82 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                    <path d="M180 233 l-35 -33 29 -24 c53 -44 128 -44 182 -1 l29 24 -32 32 c-26
                    27 -39 32 -84 33 -48 2 -57 -1 -89 -31z" fill="currentColor" />
                                    <path d="M128 138 c9 -11 10 -18 2 -23 -14 -8 -13 -48 2 -63 19 -19 46 -14 63
                    12 20 30 10 54 -24 62 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                    <path d="M395 140 c-3 -5 -16 -10 -29 -10 -42 0 -63 -53 -31 -80 36 -30 88 16
                    66 58 -7 13 -7 22 1 30 7 7 9 12 6 12 -4 0 -10 -4 -13 -10z" fill="currentColor" />
                                    <path d="M243 83 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
                                        fill="currentColor" />
                                </g>
                            </svg>
                            {{ __('Network') }}
                        </x-nav-link>
                        <x-nav-link class="flex flex-col" :href="route('alumni.job.index')" :active="request()->routeIs('alumni.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Jobs') }}
                        </x-nav-link>
                        {{-- job applications --}}
                        <x-nav-link class="flex flex-col" :href="route('job-applications.index')" :active="request()->routeIs('job-applications.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM5 6V5H19V6H5Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('My Applications') }}
                        </x-nav-link>
                        {{-- projects of alumni --}}
                        <x-nav-link class="flex flex-col" :href="route('project.index')" :active="request()->routeIs('project.index')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 4H4C3.45 4 3 4.45 3 5V19C3 19.55 3.45 20 4 20H20C20.55 20 21 19.55 21 19V8C21 7.45 20.55 7 20 7H12L10 4ZM4 6H10.59L12.59 8H20V18H4V6Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('My Projects') }}
                        </x-nav-link>
                    @endrole

                    {{-- Employer routes --}}
                    @role('employer')
                        <x-nav-link class="flex flex-col" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Dashboard') }}

                        </x-nav-link>

                        {{-- jobs --}}
                        <x-nav-link class="flex flex-col" :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                                    fill="currentColor">
                                </path>
                            </svg>
                            {{ __('Jobs') }}
                        </x-nav-link>
                        {{-- alumni profiles --}}
                        <x-nav-link class="flex flex-col" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="53.000000pt"
                                height="53.000000pt" viewBox="0 0 53.000000 53.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,53.000000) scale(0.100000,-0.100000)" fill="#000000"
                                    stroke="none">
                                    <path d="M132 478 c-15 -15 -16 -55 -2 -63 8 -5 7 -12 -2 -23 -11 -15 -11 -15
                    2 -6 8 6 27 14 41 18 34 8 44 32 24 62 -17 26 -44 31 -63 12z" fill="currentColor" />
                                    <path d="M332 478 c-28 -28 -7 -78 33 -78 12 0 27 -6 35 -12 12 -11 12 -10 3
                    2 -8 10 -9 21 -3 30 14 22 12 36 -6 54 -18 19 -45 21 -62 4z" fill="currentColor" />
                                    <path d="M243 443 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
                                        fill="currentColor" />
                                    <path d="M230 372 c-61 -50 11 -135 74 -89 37 27 8 107 -39 107 -7 0 -23 -8
                    -35 -18z" fill="currentColor" />
                                    <path d="M86 321 c-3 -4 -19 -11 -35 -14 -50 -10 -53 -71 -3 -83 15 -4 34 -12
                    42 -18 13 -9 13 -9 2 6 -9 11 -10 18 -2 23 13 8 13 52 0 60 -8 5 -7 11 1 21 6
                    8 9 14 6 14 -3 0 -8 -4 -11 -9z" fill="currentColor" />
                                    <path d="M438 318 c9 -11 10 -18 2 -23 -5 -3 -10 -17 -10 -30 0 -13 5 -27 10
                    -30 8 -5 7 -12 -2 -23 -11 -15 -11 -15 2 -6 8 6 27 14 42 18 48 11 48 71 -1
                    82 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                    <path d="M180 233 l-35 -33 29 -24 c53 -44 128 -44 182 -1 l29 24 -32 32 c-26
                    27 -39 32 -84 33 -48 2 -57 -1 -89 -31z" fill="currentColor" />
                                    <path d="M128 138 c9 -11 10 -18 2 -23 -14 -8 -13 -48 2 -63 19 -19 46 -14 63
                    12 20 30 10 54 -24 62 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                    <path d="M395 140 c-3 -5 -16 -10 -29 -10 -42 0 -63 -53 -31 -80 36 -30 88 16
                    66 58 -7 13 -7 22 1 30 7 7 9 12 6 12 -4 0 -10 -4 -13 -10z" fill="currentColor" />
                                    <path d="M243 83 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z"
                                        fill="currentColor" />
                                </g>
                            </svg>
                            {{ __('Alumni Profiles') }}
                        </x-nav-link>
                    @endrole

                    @can('view notification')
                        <!-- Notification Icon -->
                        <div class="relative p-3">
                            <button @click="notifOpen = !notifOpen"
                                class="relative flex items-center text-gray-900 text-3xl">
                                <i class="fa-solid fa-bell"></i>
                                <span
                                    class="absolute top-0 right-0 w-5 h-5 bg-red-600 rounded-full text-sm text-white flex items-center justify-center">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            </button>

                            <!-- Dropdown Content -->
                            <div x-show="notifOpen" @click.away="notifOpen = false"
                                class="origin-top-right absolute right-0 mt-10 lg:w-96 w-72 rounded-md shadow-lg bg-white ring-4 ring-red-400 ring-opacity-20">
                                <div class="py-1 p-10">
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                        <x-dropdown-link class="text-4xl font-bold text-red-600"
                                            href="{{ route('notifications.show', $notification->id) }}">
                                            {{ $notification->data['message'] }}
                                        </x-dropdown-link>
                                    @empty
                                        <x-dropdown-link>
                                            No new notifications
                                        </x-dropdown-link>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endcan

                    {{-- @can('view profile')
                        <x-nav-link class="flex flex-col" :href="route('alumni.profile.view')" :active="request()->routeIs('alumni.profile.view')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Me') }}
                        </x-nav-link>
                    @endcan --}}

                    <x-dropdown align="left" width="48">
                        <!-- Trigger Button -->
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-xl leading-4 font-medium rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150">
                                {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                                        fill="currentColor" />
                                </svg> --}}
                                <div class="mr-2">
                                    {{-- @role("alumni") --}}
                                    @if (\Illuminate\Support\Facades\Auth::user()->profile_photo)
                                        <img src="{{Storage::url(Auth::user()->profile_photo) }}"
                                            alt="Profile Picture" class="w-8 h-8 rounded-full">
                                    @else
                                        <img src="{{ asset('images/profile.jpg') }}" alt="Default Profile Picture"
                                            class="w-8 h-8 rounded-full">
                                    @endif
                                    {{-- @endrole --}}
                                </div>
                                {{ __('Me') }}
                                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <!-- Dropdown Content -->
                        <x-slot name="content">
                            <!-- View Profile Link -->
                            @can('view profile')
                                <x-dropdown-link :href="route('alumni.profile.view')">
                                    {{ __('View Profile') }}
                                </x-dropdown-link>
                            @endcan
                            <!-- Sign Out Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Sign Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>


                </div>
            </div>

            <div class="flex items-center">
                <!-- Hamburger -->
                <div class="sm:hidden md:hidden">
                    <button @click="navOpen = !navOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': navOpen, 'inline-flex': !navOpen }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !navOpen, 'inline-flex': navOpen }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Notification Icon -->
                @can('view notification')
                    <div class="relative p-1 sm:hidden">
                        <button @click="notifOpen = !notifOpen" class="relative flex items-center text-gray-900 text-2xl">
                            <i class="fa-solid fa-bell"></i>
                            <span
                                class="absolute top-0 right-0 w-3 h-3 bg-red-600 rounded-full text-xs text-white flex items-center justify-center">
                                {{ auth()->user()->unreadNotifications->where('type', '!=', 'App\Notifications\NewMessageNotification')->count() }}
                            </span>
                        </button>

                        <!-- Dropdown Content -->
                        <div x-show="notifOpen" @click.away="notifOpen = false"
                            class="origin-top-right absolute right-0 mt-10 lg:w-96 w-72 rounded-md shadow-lg bg-white ring-4 ring-red-400 ring-opacity-20">
                            <div class="py-1 p-10">
                                @forelse (auth()->user()->unreadNotifications->where('type', '!=', 'App\Notifications\NewMessageNotification') as $notification)
                                    <x-dropdown-link class="text-4xl font-bold text-red-600"
                                        href="{{ route('notifications.show', $notification->id) }}">
                                        {{ $notification->data['message'] }}
                                    </x-dropdown-link>
                                @empty
                                    <x-dropdown-link>
                                        No new notifications
                                    </x-dropdown-link>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endcan


                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 sm:order-3">


                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': navOpen, 'hidden': !navOpen }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @role('super-user|admin')
                <x-responsive-nav-link class="flex flex-row" class="flex flex-col" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                            fill="currentColor">
                        </path>
                    </svg>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                {{-- alumni profiles --}}
                @can('view alumni profile')
                    <x-responsive-nav-link class="flex flex-row" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="53.000000pt" height="53.000000pt"
                            viewBox="0 0 53.000000 53.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,53.000000) scale(0.100000,-0.100000)" fill="#000000"
                                stroke="none">
                                <path d="M132 478 c-15 -15 -16 -55 -2 -63 8 -5 7 -12 -2 -23 -11 -15 -11 -15
                        2 -6 8 6 27 14 41 18 34 8 44 32 24 62 -17 26 -44 31 -63 12z" fill="currentColor" />
                                <path d="M332 478 c-28 -28 -7 -78 33 -78 12 0 27 -6 35 -12 12 -11 12 -10 3
                        2 -8 10 -9 21 -3 30 14 22 12 36 -6 54 -18 19 -45 21 -62 4z" fill="currentColor" />
                                <path d="M243 443 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z" fill="currentColor" />
                                <path d="M230 372 c-61 -50 11 -135 74 -89 37 27 8 107 -39 107 -7 0 -23 -8
                        -35 -18z" fill="currentColor" />
                                <path d="M86 321 c-3 -4 -19 -11 -35 -14 -50 -10 -53 -71 -3 -83 15 -4 34 -12
                        42 -18 13 -9 13 -9 2 6 -9 11 -10 18 -2 23 13 8 13 52 0 60 -8 5 -7 11 1 21 6
                        8 9 14 6 14 -3 0 -8 -4 -11 -9z" fill="currentColor" />
                                <path d="M438 318 c9 -11 10 -18 2 -23 -5 -3 -10 -17 -10 -30 0 -13 5 -27 10
                        -30 8 -5 7 -12 -2 -23 -11 -15 -11 -15 2 -6 8 6 27 14 42 18 48 11 48 71 -1
                        82 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                <path d="M180 233 l-35 -33 29 -24 c53 -44 128 -44 182 -1 l29 24 -32 32 c-26
                        27 -39 32 -84 33 -48 2 -57 -1 -89 -31z" fill="currentColor" />
                                <path d="M128 138 c9 -11 10 -18 2 -23 -14 -8 -13 -48 2 -63 19 -19 46 -14 63
                        12 20 30 10 54 -24 62 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                                <path d="M395 140 c-3 -5 -16 -10 -29 -10 -42 0 -63 -53 -31 -80 36 -30 88 16
                        66 58 -7 13 -7 22 1 30 7 7 9 12 6 12 -4 0 -10 -4 -13 -10z" fill="currentColor" />
                                <path d="M243 83 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z" fill="currentColor" />
                            </g>
                        </svg>
                        {{ __('Alumni Profiles') }}
                    </x-responsive-nav-link>
                @endcan
                <x-responsive-nav-link class="flex flex-row" :href="route('users.index')" :active="request()->routeIs('users')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                            fill="currentColor" />
                    </svg>
                    {{ __('Users') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                            fill="currentColor">
                        </path>
                    </svg>
                    {{ __('Jobs') }}
                </x-responsive-nav-link>

                @can('view applications')
                    <x-responsive-nav-link class="flex flex-row" :href="route('job-application.list')" :active="request()->routeIs('job-application.list')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM5 6V5H19V6H5Z"
                                fill="currentColor" />
                        </svg>
                        {{ __('Job Applicants') }}
                    </x-responsive-nav-link>
                @endcan
                <x-responsive-nav-link class="flex flex-row" :href="route('roles.index')" :active="request()->routeIs('roles')">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="64.000000pt" height="64.000000pt"
                        viewBox="0 0 64.000000 64.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M95 608 c-3 -7 -4 -141 -3 -298 l3 -285 164 -3 165 -3 43 43 c33 33
                                43 49 43 75 0 18 -4 33 -10 33 -5 0 -10 -11 -10 -24 0 -21 -5 -25 -37 -28 -36
                                -3 -38 -5 -41 -41 l-3 -37 -150 0 -149 0 0 280 0 280 190 0 190 0 0 -64 0 -65
                                -52 -3 -53 -3 0 -115 0 -115 40 -3 c22 -2 48 -11 58 -19 15 -15 19 -15 35 0 9
                                8 35 17 57 19 l40 3 0 115 0 115 -52 3 -52 3 -3 72 -3 72 -203 3 c-158 2 -204
                                0 -207 -10z m500 -258 l0 -95 -35 -3 c-19 -2 -41 -8 -47 -14 -9 -7 -17 -7 -26
                                0 -6 6 -28 12 -47 14 l-35 3 -3 84 c-2 46 0 90 2 98 4 11 27 13 98 11 l93 -3
                                0 -95z m-125 -253 c0 -2 -9 -12 -20 -22 -19 -18 -20 -17 -20 3 0 15 6 22 20
                                22 11 0 20 -2 20 -3z" />
                            <path d="M467 424 c-17 -17 -6 -35 19 -32 15 2 29 -2 31 -9 3 -7 -10 -13 -34
                                -15 -38 -3 -38 -3 -38 -48 l0 -45 55 0 55 0 3 34 c2 19 -1 44 -7 55 -5 12 -11
                                30 -13 41 -2 14 -12 21 -33 23 -17 2 -34 0 -38 -4z" />
                            <path d="M240 560 c0 -6 27 -10 60 -10 33 0 60 4 60 10 0 6 -27 10 -60 10 -33
                                0 -60 -4 -60 -10z" />
                            <path d="M140 510 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 510 c0 -6 52 -10 135 -10 83 0 135 4 135 10 0 6 -52 10 -135 10
                                -83 0 -135 -4 -135 -10z" />
                            <path d="M140 450 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 450 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                0 -80 -4 -80 -10z" />
                            <path d="M140 390 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 390 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                0 -80 -4 -80 -10z" />
                            <path d="M140 330 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 330 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                0 -80 -4 -80 -10z" />
                            <path d="M140 270 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 270 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                0 -80 -4 -80 -10z" />
                            <path d="M140 210 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 210 c0 -6 33 -10 80 -10 47 0 80 4 80 10 0 6 -33 10 -80 10 -47
                                0 -80 -4 -80 -10z" />
                            <path d="M140 150 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 150 c0 -6 52 -10 135 -10 83 0 135 4 135 10 0 6 -52 10 -135 10
                                -83 0 -135 -4 -135 -10z" />
                            <path d="M140 90 c0 -5 7 -10 15 -10 8 0 15 5 15 10 0 6 -7 10 -15 10 -8 0
                                -15 -4 -15 -10z" />
                            <path d="M190 90 c0 -6 38 -10 95 -10 57 0 95 4 95 10 0 6 -38 10 -95 10 -57
                                0 -95 -4 -95 -10z" />
                        </g>
                    </svg>

                    {{ __('Roles') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('permissions.index')" :active="request()->routeIs('permissions')">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt" height="512.000000pt"
                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M2245 4835 c-244 -44 -472 -168 -643 -349 -403 -426 -429 -1083 -61
                                    -1540 480 -597 1398 -577 1856 41 170 229 253 527 223 803 -30 284 -142 520
                                    -340 720 -166 168 -389 285 -618 325 -102 18 -320 18 -417 0z" fill="currentColor" />
                            <path d="M3886 2499 c-340 -46 -627 -302 -711 -635 -20 -77 -25 -122 -25 -222
                                    l0 -125 -259 -256 c-219 -216 -261 -262 -270 -296 -6 -23 -11 -150 -11 -300 0
                                    -251 1 -263 23 -305 12 -25 37 -55 56 -67 33 -23 40 -23 322 -23 178 0 298 4
                                    316 11 15 5 143 125 285 266 l256 256 134 1 c157 2 232 19 363 81 219 103 388
                                    301 455 535 49 169 36 395 -32 559 -64 153 -211 325 -344 403 -168 98 -376
                                    142 -558 117z m209 -638 c53 -24 111 -90 126 -143 44 -164 -96 -321 -261 -293
                                    -140 24 -230 192 -171 320 52 114 193 168 306 116z" fill="currentColor" />
                            <path d="M2090 2310 c-426 -41 -807 -140 -1125 -295 -167 -81 -292 -165 -400
                                    -267 -140 -132 -217 -245 -266 -393 -23 -67 -24 -83 -24 -340 l0 -270 27 -57
                                    c34 -73 98 -137 174 -174 l59 -29 932 -3 932 -2 3 262 3 263 33 70 c29 61 59
                                    96 262 300 222 223 230 232 230 270 0 182 69 423 162 568 17 26 28 50 25 54
                                    -4 3 -69 14 -144 25 -159 22 -719 33 -883 18z" fill="currentColor" />
                        </g>
                    </svg>
                    {{ __('Permissions') }}
                </x-responsive-nav-link>
            @endrole
            {{-- Alumni routes --}}
            @role('alumni')
                <x-responsive-nav-link class="flex flex-row" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                            fill="currentColor">
                        </path>
                    </svg>
                    {{ __(' Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('alumni.profile.view')" :active="request()->routeIs('alumni.profile.view')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"
                            fill="currentColor" />
                    </svg>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="53.000000pt" height="53.000000pt"
                        viewBox="0 0 53.000000 53.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,53.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M132 478 c-15 -15 -16 -55 -2 -63 8 -5 7 -12 -2 -23 -11 -15 -11 -15
            2 -6 8 6 27 14 41 18 34 8 44 32 24 62 -17 26 -44 31 -63 12z" fill="currentColor" />
                            <path d="M332 478 c-28 -28 -7 -78 33 -78 12 0 27 -6 35 -12 12 -11 12 -10 3
            2 -8 10 -9 21 -3 30 14 22 12 36 -6 54 -18 19 -45 21 -62 4z" fill="currentColor" />
                            <path d="M243 443 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z" fill="currentColor" />
                            <path d="M230 372 c-61 -50 11 -135 74 -89 37 27 8 107 -39 107 -7 0 -23 -8
            -35 -18z" fill="currentColor" />
                            <path d="M86 321 c-3 -4 -19 -11 -35 -14 -50 -10 -53 -71 -3 -83 15 -4 34 -12
            42 -18 13 -9 13 -9 2 6 -9 11 -10 18 -2 23 13 8 13 52 0 60 -8 5 -7 11 1 21 6
            8 9 14 6 14 -3 0 -8 -4 -11 -9z" fill="currentColor" />
                            <path d="M438 318 c9 -11 10 -18 2 -23 -5 -3 -10 -17 -10 -30 0 -13 5 -27 10
            -30 8 -5 7 -12 -2 -23 -11 -15 -11 -15 2 -6 8 6 27 14 42 18 48 11 48 71 -1
            82 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                            <path d="M180 233 l-35 -33 29 -24 c53 -44 128 -44 182 -1 l29 24 -32 32 c-26
            27 -39 32 -84 33 -48 2 -57 -1 -89 -31z" fill="currentColor" />
                            <path d="M128 138 c9 -11 10 -18 2 -23 -14 -8 -13 -48 2 -63 19 -19 46 -14 63
            12 20 30 10 54 -24 62 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                            <path d="M395 140 c-3 -5 -16 -10 -29 -10 -42 0 -63 -53 -31 -80 36 -30 88 16
            66 58 -7 13 -7 22 1 30 7 7 9 12 6 12 -4 0 -10 -4 -13 -10z" fill="currentColor" />
                            <path d="M243 83 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z" fill="currentColor" />
                        </g>
                    </svg>
                    {{ __('Network') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('alumni.job.index')" :active="request()->routeIs('alumni.job.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                            fill="currentColor">
                        </path>
                    </svg>
                    {{ __('Jobs') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('job-applications.index')" :active="request()->routeIs('job-applications.index')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM5 6V5H19V6H5Z"
                            fill="currentColor" />
                    </svg>
                    {{ __('My Applications') }}
                </x-responsive-nav-link>


                <x-responsive-nav-link class="flex flex-row" class="flex flex-row" :href="route('project.index')" :active="request()->routeIs('project.index')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 4H4C3.45 4 3 4.45 3 5V19C3 19.55 3.45 20 4 20H20C20.55 20 21 19.55 21 19V8C21 7.45 20.55 7 20 7H12L10 4ZM4 6H10.59L12.59 8H20V18H4V6Z"
                            fill="currentColor" />
                    </svg>
                    {{ __('My Projects') }}
                </x-responsive-nav-link>
            @endrole
            {{-- Employer routes --}}
            @role('employer')
                <x-responsive-nav-link class="flex flex-row" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 25 1.0507812 C 24.7825 1.0507812 24.565859 1.1197656 24.380859 1.2597656 L 1.3808594 19.210938 C 0.95085938 19.550938 0.8709375 20.179141 1.2109375 20.619141 C 1.5509375 21.049141 2.1791406 21.129062 2.6191406 20.789062 L 4 19.710938 L 4 46 C 4 46.55 4.45 47 5 47 L 19 47 L 19 29 L 31 29 L 31 47 L 45 47 C 45.55 47 46 46.55 46 46 L 46 19.710938 L 47.380859 20.789062 C 47.570859 20.929063 47.78 21 48 21 C 48.3 21 48.589063 20.869141 48.789062 20.619141 C 49.129063 20.179141 49.049141 19.550938 48.619141 19.210938 L 25.619141 1.2597656 C 25.434141 1.1197656 25.2175 1.0507812 25 1.0507812 z M 35 5 L 35 6.0507812 L 41 10.730469 L 41 5 L 35 5 z"
                            fill="currentColor">
                        </path>
                    </svg>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('role-permission.job.index')" :active="request()->routeIs('role-permission.job.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 50 50">
                        <path
                            d="M 20 3 C 18.355469 3 17 4.355469 17 6 L 17 9 L 3 9 C 1.347656 9 0 10.347656 0 12 L 0 25 C 0 26.652344 1.347656 28 3 28 L 47 28 C 48.652344 28 50 26.652344 50 25 L 50 12 C 50 10.347656 48.652344 9 47 9 L 33 9 L 33 6 C 33 4.355469 31.644531 3 30 3 Z M 20 5 L 30 5 C 30.5625 5 31 5.4375 31 6 L 31 9 L 19 9 L 19 6 C 19 5.4375 19.4375 5 20 5 Z M 25 22 C 26.105469 22 27 22.894531 27 24 C 27 25.105469 26.105469 26 25 26 C 23.894531 26 23 25.105469 23 24 C 23 22.894531 23.894531 22 25 22 Z M 0 27 L 0 44 C 0 45.652344 1.347656 47 3 47 L 47 47 C 48.652344 47 50 45.652344 50 44 L 50 27 C 50 28.652344 48.652344 30 47 30 L 3 30 C 1.347656 30 0 28.652344 0 27 Z"
                            fill="currentColor">
                        </path>
                    </svg>
                    {{ __('Jobs') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link class="flex flex-row" :href="route('profiles.index')" :active="request()->routeIs('profiles.index')">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="53.000000pt" height="53.000000pt"
                        viewBox="0 0 53.000000 53.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,53.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M132 478 c-15 -15 -16 -55 -2 -63 8 -5 7 -12 -2 -23 -11 -15 -11 -15
            2 -6 8 6 27 14 41 18 34 8 44 32 24 62 -17 26 -44 31 -63 12z" fill="currentColor" />
                            <path d="M332 478 c-28 -28 -7 -78 33 -78 12 0 27 -6 35 -12 12 -11 12 -10 3
            2 -8 10 -9 21 -3 30 14 22 12 36 -6 54 -18 19 -45 21 -62 4z" fill="currentColor" />
                            <path d="M243 443 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z" fill="currentColor" />
                            <path d="M230 372 c-61 -50 11 -135 74 -89 37 27 8 107 -39 107 -7 0 -23 -8
            -35 -18z" fill="currentColor" />
                            <path d="M86 321 c-3 -4 -19 -11 -35 -14 -50 -10 -53 -71 -3 -83 15 -4 34 -12
            42 -18 13 -9 13 -9 2 6 -9 11 -10 18 -2 23 13 8 13 52 0 60 -8 5 -7 11 1 21 6
            8 9 14 6 14 -3 0 -8 -4 -11 -9z" fill="currentColor" />
                            <path d="M438 318 c9 -11 10 -18 2 -23 -5 -3 -10 -17 -10 -30 0 -13 5 -27 10
            -30 8 -5 7 -12 -2 -23 -11 -15 -11 -15 2 -6 8 6 27 14 42 18 48 11 48 71 -1
            82 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                            <path d="M180 233 l-35 -33 29 -24 c53 -44 128 -44 182 -1 l29 24 -32 32 c-26
            27 -39 32 -84 33 -48 2 -57 -1 -89 -31z" fill="currentColor" />
                            <path d="M128 138 c9 -11 10 -18 2 -23 -14 -8 -13 -48 2 -63 19 -19 46 -14 63
            12 20 30 10 54 -24 62 -14 4 -33 12 -41 18 -13 9 -13 9 -2 -6z" fill="currentColor" />
                            <path d="M395 140 c-3 -5 -16 -10 -29 -10 -42 0 -63 -53 -31 -80 36 -30 88 16
            66 58 -7 13 -7 22 1 30 7 7 9 12 6 12 -4 0 -10 -4 -13 -10z" fill="currentColor" />
                            <path d="M243 83 c15 -2 37 -2 50 0 12 2 0 4 -28 4 -27 0 -38 -2 -22 -4z" fill="currentColor" />
                        </g>
                    </svg>
                    {{ __('Alumni Profiles') }}
                </x-responsive-nav-link>
            @endrole
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                {{-- <div class="font-medium text-base text-gray-800">{{ \Illuminate\Support\Facades\Auth::user()->name }}
                </div>
                <div class="font-medium text-sm text-gray-500">{{ \Illuminate\Support\Facades\Auth::user()->email }}
                </div>
            </div> --}}

                <div class="mt-3 space-y-1">
                    @can('view profile')
                        <x-responsive-nav-link :href="route('alumni.profile.view')">
                            {{ __('View Profile') }}
                        </x-responsive-nav-link>
                        <div class="mr-2">
                            @if (\Illuminate\Support\Facades\Auth::user()->profile_photo)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url(Auth::user()->profile_photo) }}"
                                    alt="Profile Picture" class="w-8 h-8 rounded-full">
                            @else
                                <img src="{{ asset('images/profile.jpg') }}" alt="Default Profile Picture"
                                    class="w-8 h-8 rounded-full">
                            @endif
                        </div>
                    @endcan
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
</nav>
