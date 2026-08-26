<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NOVA — Network Of Warehouse Access. Satu Portal, Semua Informasi Gudang. Gateway pusat dan tata surya digital untuk operasional pergudangan enterprise.">
    <meta name="keywords" content="NOVA, Portal Gudang, MARS, SATURNUS, WMS, Inventaris, Gudang Enterprise, Portal Logistik">
    <meta name="theme-color" content="#050816">

    <title>NOVA — Network Of Warehouse Access | Satu Portal, Semua Informasi Gudang</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Orbitron:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Dynamic Subsystems Config -->
    <script>
        window.NOVA_CONFIG = {
            saturnusUrl: @json(env('SATURNUS_URL', 'http://127.0.0.1:8001')),
            marsUrl: @json(env('MARS_URL', '/system/mars'))
        };
    </script>

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050816] text-slate-100 antialiased selection:bg-cyan-500 selection:text-black overflow-x-hidden min-h-screen relative">

    <!-- ==========================================================================
         1. CINEMATIC OPENING BOOT SEQUENCE (1.5 - 2.0s)
         ========================================================================== -->
    <div id="cinematic-boot" class="fixed inset-0 z-[99999] bg-[#030611] flex flex-col items-center justify-center overflow-hidden">
        <div class="boot-grid-bg"></div>
        <div class="boot-shockwave"></div>
        <div class="boot-core-spark mb-6"></div>

        <div class="relative z-10 text-center px-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-mono mb-4 tracking-widest uppercase">
                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                <span>MEMULAI NOVA CORE v3.8</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-black font-orbitron tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-cyan-200 to-white glow-text-cyan mb-2">
                NOVA
            </h1>
            
            <p class="text-xs md:text-sm font-mono tracking-widest text-slate-300 uppercase mb-6">
                Network Of Warehouse Access
            </p>

            <div class="w-48 h-1 bg-slate-800 rounded-full mx-auto overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 via-cyan-400 to-violet-500 animate-[shimmer_1.5s_infinite] w-full"></div>
            </div>

            <p class="text-[11px] font-mono text-cyan-400/70 mt-4 tracking-wider">
                “Satu Portal, Semua Informasi Gudang”
            </p>
        </div>

        <button id="btn-skip-boot" class="absolute bottom-8 right-8 px-4 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-slate-400 hover:text-white transition-all">
            LEWATI INTRO [ESC]
        </button>
    </div>

    <!-- ==========================================================================
         2. INTERACTIVE COSMOS BACKGROUND CANVAS & WAREHOUSE GRID
         ========================================================================== -->
    <canvas id="nova-starfield-canvas" class="fixed inset-0 pointer-events-none z-0"></canvas>
    <div class="fixed inset-0 warehouse-scanlines z-[1] pointer-events-none opacity-40"></div>

    <!-- ==========================================================================
         3. ENTERPRISE HEADER & CYBER COMMAND HUD
         ========================================================================== -->
    <header class="sticky top-0 z-50 bg-[#060a1d]/85 backdrop-blur-xl border-b border-white/10 shadow-[0_4px_30px_rgba(0,0,0,0.5)] transition-all duration-300">
        
        <!-- Scanning Laser Beam Bottom Accent -->
        <div class="nav-light-beam"></div>

        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-2 lg:gap-4">
            
            <!-- Left: Holographic Sun Core & Brand Identity -->
            <a href="#" class="flex items-center gap-3 group shrink-0" title="Gateway Pusat NOVA">
                <div class="relative w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 via-orange-500 to-cyan-400 p-[1px] shadow-lg shadow-orange-500/20 group-hover:shadow-cyan-400/40 transition-all duration-300">
                    <div class="w-full h-full bg-[#070c20] rounded-[11px] flex items-center justify-center relative overflow-hidden">
                        <!-- Sun Core -->
                        <div class="w-4 h-4 rounded-full bg-gradient-to-r from-amber-300 via-orange-400 to-amber-500 shadow-[0_0_12px_#ffaa00] group-hover:scale-125 transition-transform duration-300"></div>
                        <div class="absolute inset-0 border border-cyan-400/40 rounded-full animate-[spin_10s_linear_infinite]"></div>
                        <div class="absolute inset-1 border border-amber-400/30 rounded-full animate-[spin_6s_linear_infinite_reverse]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-orbitron font-black text-2xl tracking-wider text-white group-hover:text-cyan-300 transition-colors">
                            NOVA
                        </span>
                        <div class="flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-cyan-500/10 text-cyan-300 border border-cyan-500/30 text-[9px] font-mono font-bold tracking-wider">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                            <span>CORE v3.8</span>
                        </div>
                    </div>
                    <span class="text-[10px] font-mono text-slate-400 tracking-wider block -mt-0.5">
                        Network Of Warehouse Access
                    </span>
                </div>
            </a>

            <!-- Center: Cyber Command Hub & Real-time Live Telemetry Capsule -->
            <div class="hidden lg:flex items-center gap-3">
                
                <!-- Primary View Switcher Navigation -->
                <nav class="flex items-center p-1 rounded-xl bg-white/[0.04] border border-white/10 backdrop-blur-md">
                    <a href="#hero-solar-system" class="px-3.5 py-1.5 rounded-lg text-xs font-bold font-orbitron tracking-wider text-cyan-300 bg-cyan-500/15 border border-cyan-500/30 hover:bg-cyan-500/25 transition-all flex items-center gap-1.5">
                        <span class="text-xs">🌌</span>
                        <span>ORBIT SURYA</span>
                    </a>
                    <a href="#system-directory-section" class="px-3.5 py-1.5 rounded-lg text-xs font-bold font-orbitron tracking-wider text-slate-300 hover:text-white hover:bg-white/5 transition-all flex items-center gap-1.5">
                        <span class="text-xs">📑</span>
                        <span>DIREKTORI SISTEM</span>
                        <span class="px-1.5 py-0.2 rounded bg-cyan-500/20 text-cyan-300 text-[10px] font-mono">2</span>
                    </a>
                </nav>

                <!-- Quick Node Launch Badges (MARS & SATURNUS Direct Access) -->
                <div class="flex items-center gap-1.5 px-2 py-1 rounded-xl bg-white/[0.03] border border-white/10 font-mono text-xs">
                    <span class="text-[10px] text-slate-500 font-bold px-1 uppercase tracking-wider">SIMPUL:</span>
                    
                    <!-- MARS Quick Pill -->
                    <button 
                        onclick="window.novaApp.directLaunch('mars', event)"
                        class="nav-node-pill flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-orange-500/10 hover:bg-orange-500/25 border border-orange-500/30 text-orange-300 text-[11px] transition-all group/mars"
                        title="Buka MARS (Sistem Permintaan Material)"
                    >
                        <span class="w-1.5 h-1.5 rounded-full bg-orange-400 group-hover/mars:animate-ping"></span>
                        <span class="font-orbitron font-bold">MARS</span>
                        <span class="text-[9px] text-orange-200/60 hidden xl:inline">REQ</span>
                    </button>

                    <!-- SATURNUS Quick Pill -->
                    <button 
                        onclick="window.novaApp.directLaunch('saturnus', event)"
                        class="nav-node-pill flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-500/10 hover:bg-amber-500/25 border border-amber-500/30 text-amber-300 text-[11px] transition-all group/sat"
                        title="Buka SATURNUS (Sistem Pelacakan Aset)"
                    >
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 group-hover/sat:animate-ping"></span>
                        <span class="font-orbitron font-bold">SATURNUS</span>
                        <span class="text-[9px] text-amber-200/60 hidden xl:inline">RFID</span>
                    </button>
                </div>

                <!-- Live Warehouse Telemetry Stream Capsule -->
                <div class="hidden xl:flex items-center gap-2 px-3 py-1.5 rounded-xl bg-cyan-950/30 border border-cyan-500/20 max-w-xs cursor-pointer hover:border-cyan-500/40 transition-all" onclick="document.getElementById('notifications-drawer').classList.toggle('hidden')">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
                    </span>
                    <div class="overflow-hidden">
                        <span id="nav-telemetry-text" class="font-mono text-[11px] text-cyan-300 truncate block">
                            MARS • 1.840 Permintaan Harian • SLA 99,98%
                        </span>
                    </div>
                </div>

            </div>

            <!-- Right: Enterprise Telemetry & Action Deck -->
            <div class="flex items-center gap-2 sm:gap-2.5">
                
                <!-- Digital Live Clock & Date Widget -->
                <div class="hidden sm:flex flex-col items-end px-3 py-1 rounded-xl bg-white/[0.04] border border-white/10 font-mono text-xs">
                    <div class="flex items-center gap-1.5 text-slate-200 font-bold tracking-wider">
                        <span class="status-beacon online"></span>
                        <span id="nova-live-clock">--:--:-- WIB</span>
                    </div>
                    <span id="nova-live-date" class="text-[9px] text-slate-400 tracking-wider">
                        -- --- ---- • WH-01
                    </span>
                </div>

                <!-- Global Search / Command Palette Trigger (Ctrl + K) -->
                <button 
                    data-open-cmd-palette
                    class="flex items-center gap-2 px-3 py-2 rounded-xl bg-white/5 hover:bg-cyan-500/10 border border-white/10 hover:border-cyan-500/30 text-xs text-slate-300 hover:text-white transition-all group"
                    title="Tekan Ctrl + K untuk mencari sistem"
                >
                    <svg class="w-4 h-4 text-cyan-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span class="hidden md:inline font-mono text-[11px]">Cari Sistem Gudang...</span>
                    <kbd class="hidden sm:inline-block px-1.5 py-0.5 rounded bg-black/40 border border-white/15 text-[10px] font-mono text-slate-300 font-bold group-hover:border-cyan-400/50">Ctrl+K</kbd>
                </button>

                <!-- Audio FX Synthesizer Toggle with Soundwave Visualizer -->
                <button 
                    id="btn-audio-toggle"
                    class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-cyan-400/40 text-slate-300 hover:text-cyan-300 transition-all relative flex items-center gap-1.5 group"
                    title="Aktifkan/Nonaktifkan efek suara audio cyber"
                >
                    <svg id="audio-toggle-icon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                    </svg>
                    <!-- Animated Cyber Soundwave Bars -->
                    <div id="audio-equalizer" class="hidden items-end gap-0.5 h-3">
                        <span class="soundwave-bar"></span>
                        <span class="soundwave-bar"></span>
                        <span class="soundwave-bar"></span>
                    </div>
                </button>

                <!-- Notifications Popover Bell -->
                <div class="relative">
                    <button 
                        id="btn-notifications"
                        class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-amber-400/40 text-slate-300 hover:text-amber-300 transition-all relative"
                        title="Notifikasi & Telemetri Sistem Gudang"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-amber-400 shadow-[0_0_8px_#ffb800]"></span>
                    </button>

                    <!-- Notifications Dropdown Drawer -->
                    <div id="notifications-drawer" class="hidden absolute right-0 mt-3 w-80 sm:w-96 glass-panel rounded-2xl p-4 shadow-2xl border border-white/15 z-50 animate-[fadeIn_0.2s_ease-out]">
                        <div class="flex items-center justify-between border-b border-white/10 pb-3 mb-3">
                            <div class="flex items-center gap-2">
                                <span class="font-orbitron font-bold text-sm text-white">TELEMETRI LANGSUNG</span>
                                <span class="px-2 py-0.5 text-[10px] rounded-full bg-cyan-500/20 text-cyan-300 font-mono">3 Baru</span>
                            </div>
                            <button id="notifications-close" class="text-slate-400 hover:text-white text-xs font-mono p-1">✕</button>
                        </div>
                        <div class="space-y-2.5 text-xs font-mono">
                            <div class="p-2.5 rounded-xl bg-cyan-950/40 border border-cyan-500/20 hover:border-cyan-500/40 transition-colors cursor-pointer" onclick="window.novaApp.openLaunchModal('mars')">
                                <div class="flex items-center justify-between text-cyan-300 font-bold mb-1">
                                    <span>PENGIRIMAN PERMINTAAN MARS</span>
                                    <span class="text-[10px] text-slate-400">2 mnt lalu</span>
                                </div>
                                <p class="text-slate-300">Permintaan #MR-9042 disetujui Supervisor. Mengarah ke Lorong 14.</p>
                            </div>
                            <div class="p-2.5 rounded-xl bg-amber-950/40 border border-amber-500/20 hover:border-amber-500/40 transition-colors cursor-pointer" onclick="window.novaApp.openLaunchModal('saturnus')">
                                <div class="flex items-center justify-between text-amber-300 font-bold mb-1">
                                    <span>PEMINDAIAN RFID SATURNUS</span>
                                    <span class="text-[10px] text-slate-400">7 mnt lalu</span>
                                </div>
                                <p class="text-slate-300">Portal Masuk Dock 04 memverifikasi 120 palet aset RFID baru.</p>
                            </div>
                            <div class="p-2.5 rounded-xl bg-emerald-950/40 border border-emerald-500/20">
                                <div class="flex items-center justify-between text-emerald-300 font-bold mb-1">
                                    <span>SINKRONISASI GATEWAY NOVA</span>
                                    <span class="text-[10px] text-slate-400">14 mnt lalu</span>
                                </div>
                                <p class="text-slate-300">Seluruh 2 aplikasi gudang beroperasi normal dengan uptime 99,98%.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Primary CTA: System Directory / Launch Action -->
                <button 
                    onclick="window.novaApp.openCommandPalette()"
                    data-open-cmd-palette
                    class="py-2 px-3 sm:px-4 rounded-xl bg-gradient-to-r from-cyan-400 via-blue-500 to-violet-600 text-slate-950 hover:text-white font-orbitron font-bold text-xs tracking-wider shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all duration-300 flex items-center gap-1.5 btn-shimmer group"
                >
                    <span class="text-sm">⚡</span>
                    <span class="hidden sm:inline">SSO</span>
                    <span>AKSES</span>
                    <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

                <!-- Mobile Menu Button (Hamburger) -->
                <button 
                    id="btn-mobile-menu"
                    class="lg:hidden p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 hover:text-white transition-all"
                    title="Toggle mobile menu"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-nav-drawer" class="hidden lg:hidden border-t border-white/10 bg-[#05091b]/95 backdrop-blur-2xl px-4 py-4 space-y-3">
            <div class="flex items-center justify-between text-xs font-mono pb-2 border-b border-white/10">
                <span class="text-cyan-400 font-bold">GATEWAY NOVA</span>
                <span class="text-slate-400" id="mobile-live-clock">--:--:-- WIB</span>
            </div>
            <div class="grid grid-cols-2 gap-2 text-xs font-orbitron font-bold">
                <a href="#hero-solar-system" class="p-3 rounded-xl bg-white/5 border border-white/10 text-cyan-300 text-center hover:bg-cyan-500/10">
                    🌌 ORBIT SURYA
                </a>
                <a href="#system-directory-section" class="p-3 rounded-xl bg-white/5 border border-white/10 text-slate-200 text-center hover:bg-white/10">
                    📑 DIREKTORI (2)
                </a>
            </div>
            <div class="pt-1">
                <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider block mb-2">AKSES CEPAT SISTEM:</span>
                <div class="grid grid-cols-2 gap-2">
                    <button onclick="window.novaApp.directLaunch('mars', event)" class="p-2.5 rounded-xl bg-orange-500/15 border border-orange-500/30 text-orange-300 font-orbitron font-bold text-xs flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-orange-400"></span>
                        MARS
                    </button>
                    <button onclick="window.novaApp.directLaunch('saturnus', event)" class="p-2.5 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-300 font-orbitron font-bold text-xs flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        SATURNUS
                    </button>
                </div>
            </div>
        </div>

    </header>

    <!-- ==========================================================================
         4. HERO SECTION: DIGITAL SOLAR SYSTEM / WAREHOUSE UNIVERSE
         ========================================================================== -->
    <section id="hero-solar-system" class="relative z-10 pt-8 pb-16 overflow-hidden">
        
        <!-- Hero Tagline & Main Message Header -->
        <div class="max-w-5xl mx-auto px-4 text-center mb-6">
            
            <!-- Enterprise Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 text-xs font-mono mb-4 tracking-widest uppercase shadow-lg shadow-cyan-500/10">
                <span class="status-beacon online"></span>
                <span>GATEWAY DIGITAL PUSAT GUDANG</span>
                <span class="text-slate-500">|</span>
                <span class="text-slate-300 font-bold">SEMUA SISTEM BEROPERASI NORMAL</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black font-orbitron tracking-tight text-white mb-4 leading-tight">
                SELAMAT DATANG DI <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-cyan-300 to-blue-400 glow-text-cyan">NOVA</span>
            </h1>

            <p class="text-xl sm:text-2xl font-tech font-semibold text-cyan-200 tracking-wide mb-3">
                “Satu Portal, Untuk Semua Aplikasi Warehouse Consumable”
            </p>

            <!-- Action CTAs -->
            <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 mt-6">
                <a 
                    href="#system-directory-section"
                    class="py-3 px-6 rounded-xl bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-orbitron font-extrabold text-xs tracking-wider shadow-lg shadow-cyan-500/30 hover:shadow-cyan-400/50 transition-all duration-300 flex items-center gap-2 btn-shimmer"
                >
                    <span>JELAJAHI SISTEM →</span>
                </a>
                <button 
                    onclick="window.novaApp.openCommandPalette()"
                    data-open-cmd-palette
                    class="py-3 px-6 rounded-xl glass-panel hover:bg-cyan-500/10 hover:border-cyan-400/50 border border-white/15 text-white font-orbitron font-bold text-xs tracking-wider transition-all duration-300 flex items-center gap-2"
                >
                    <svg class="w-4 h-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>PENCARIAN CEPAT [CTRL+K]</span>
                </button>
            </div>
        </div>



        <!-- 3D SOLAR SYSTEM VIEWPORT -->
        <div class="universe-stage">
            <div id="solar-plane" class="solar-system-plane">
                
                <!-- ==========================================
                     NOVA CORE (THE CENTRAL ENERGY SUN)
                     ========================================== -->
                <div 
                    class="nova-sun-container group" 
                    title="Pusat Energi Gateway NOVA"
                    onclick="window.novaApp.openLaunchModal('mars')"
                >
                    <div class="nova-core-shield-2"></div>
                    <div class="nova-core-shield"></div>
                    <div class="nova-core-inner-glow"></div>
                    
                    <div class="nova-core-orb">
                        <span class="font-orbitron font-black text-base tracking-widest text-slate-950 select-none">
                            NOVA
                        </span>
                    </div>

                    <!-- Core Floating Info Badge -->
                    <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-slate-950/90 border border-amber-400/50 text-[11px] font-orbitron font-bold text-amber-300 whitespace-nowrap shadow-lg backdrop-blur-md">
                        ☀️ NOVA CORE
                    </div>
                </div>

                <!-- ==========================================
                     ORBIT 1: MARS (Inner Orbit)
                     ========================================== -->
                <div class="orbit-track orbit-track-1"></div>
                <div id="carrier-1" class="orbit-carrier" style="animation-duration: 24s;">
                    
                    <!-- MARS Planet Node (0 deg) -->
                    <div class="planet-node" style="top: -52px; left: calc(50% - 52px);">
                        <div class="planet-counter-rotator" style="animation-duration: 24s;">
                            
                            <!-- Planet Sphere (Directly Clickable) -->
                            <div 
                                class="planet-body planet-mars cursor-pointer group/marsplanet"
                                title="Klik untuk Membuka MARS"
                                onclick="window.novaApp.directLaunch('mars', event)"
                            >
                                <span class="text-white text-2xl font-black font-orbitron select-none drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)] group-hover/marsplanet:scale-125 transition-transform">M</span>
                            </div>
                            
                            <!-- Planet Label -->
                            <div 
                                class="planet-badge cursor-pointer"
                                title="Klik untuk Membuka MARS"
                                onclick="window.novaApp.directLaunch('mars', event)"
                            >
                                🪐 MARS
                            </div>

                            <!-- Holographic Hover Card (Planet HUD) -->
                            <div class="planet-hud-card glass-panel-glow rounded-2xl p-5">
                                <div class="flex items-center justify-between border-b border-white/10 pb-2 mb-2">
                                    <div>
                                        <h4 class="font-orbitron font-bold text-base text-orange-400">MARS</h4>
                                        <span class="text-[10px] text-slate-400 line-clamp-1">Metalart Automatic Request System</span>
                                    </div>
                                    <span class="status-beacon online"></span>
                                </div>
                                <p class="text-xs text-slate-300 mb-3 leading-relaxed">
                                    Memonitoring ketersediaan stok dan melakukan proses reorder/pemesanan ulang item yang persediaannya sudah berada pada level minimum.
                                </p>
                                <div class="flex items-center justify-between text-[11px] font-mono text-slate-400 mb-3">
                                    <span class="text-emerald-400">● Online (99,98%)</span>
                                    <span>Latensi: 18ms</span>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <button 
                                        onclick="window.novaApp.directLaunch('mars', event)"
                                        class="py-2 px-3 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 text-white text-xs font-bold font-orbitron tracking-wider flex items-center justify-center gap-1 shadow-lg shadow-orange-500/30 btn-shimmer"
                                    >
                                        <span>BUKA SISTEM</span>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </button>
                                    <button 
                                        onclick="window.novaApp.openLaunchModal('mars')"
                                        class="py-2 px-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/15 text-slate-300 hover:text-white text-[11px] font-mono flex items-center justify-center"
                                    >
                                        <span>DETAIL SSO</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- ==========================================
                     ORBIT 2: SATURNUS (Outer Orbit)
                     ========================================== -->
                <div class="orbit-track orbit-track-2"></div>
                <div id="carrier-2" class="orbit-carrier" style="animation-duration: 38s;">
                    
                    <!-- SATURNUS Planet Node (90 deg) -->
                    <div class="planet-node" style="top: calc(50% - 52px); right: -52px;">
                        <div class="planet-counter-rotator" style="animation-duration: 38s;">
                            
                            <!-- Planet Sphere (Directly Clickable to Saturnus!) -->
                            <div 
                                class="planet-body planet-saturnus cursor-pointer group/saturnplanet"
                                title="Klik untuk Membuka SATURNUS (Langsung ke Registrasi Consumable)"
                                onclick="window.novaApp.directLaunch('saturnus', event)"
                            >
                                <span class="text-white text-2xl font-black font-orbitron select-none drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)] group-hover/saturnplanet:scale-125 transition-transform">S</span>
                            </div>
                            
                            <!-- Planet Label -->
                            <div 
                                class="planet-badge cursor-pointer"
                                title="Klik untuk Membuka SATURNUS"
                                onclick="window.novaApp.directLaunch('saturnus', event)"
                            >
                                🪐 SATURNUS
                            </div>

                            <!-- Holographic Hover Card -->
                            <div class="planet-hud-card glass-panel-glow rounded-2xl p-5">
                                <div class="flex items-center justify-between border-b border-white/10 pb-2 mb-2">
                                    <div>
                                        <h4 class="font-orbitron font-bold text-base text-amber-300">SATURNUS</h4>
                                        <span class="text-[10px] text-slate-400 line-clamp-1">Registrasi Consumable & Utilitas RFID</span>
                                    </div>
                                    <span class="status-beacon online"></span>
                                </div>
                                <p class="text-xs text-slate-300 mb-3 leading-relaxed">
                                    Sistem Registrasi & Unregistrasi Consumable, Pelacakan RFID & Penonaktifan Aset.
                                </p>
                                <div class="flex items-center justify-between text-[11px] font-mono text-slate-400 mb-3">
                                    <span class="text-emerald-400">● Online (12,4k RFID)</span>
                                    <span>Latensi: 24ms</span>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <a 
                                        href="{{ env('SATURNUS_URL', 'http://127.0.0.1:8001') }}"
                                        target="_blank"
                                        onclick="event.stopPropagation(); if(window.novaApp?.universe) window.novaApp.universe.playSynthSound(750, 'sine', 0.15, 0.06);"
                                        class="py-2 px-3 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-600 text-slate-950 font-bold font-orbitron text-xs tracking-wider flex items-center justify-center gap-1 shadow-lg shadow-amber-500/30 btn-shimmer hover:brightness-110"
                                    >
                                        <span>BUKA SISTEM</span>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                    <button 
                                        onclick="window.novaApp.openLaunchModal('saturnus')"
                                        class="py-2 px-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/15 text-slate-300 hover:text-white text-[11px] font-mono flex items-center justify-center"
                                    >
                                        <span>DETAIL SSO</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Solar Orbit Control Deck (Top Overlay of Universe Stage) -->
        <div class="max-w-6xl mx-auto px-4 mb-2 flex flex-wrap items-center justify-between gap-3 text-xs font-mono">
            <div class="flex items-center gap-2">
                <span class="text-slate-400">KONTROL ORBIT:</span>
                
                <!-- Pause/Resume Orbit -->
                <button 
                    id="btn-orbit-pause" 
                    class="px-3 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-cyan-300 flex items-center gap-1.5 transition-all"
                >
                    <svg id="orbit-pause-icon" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span id="orbit-pause-text">JEDA ORBIT</span>
                </button>

                <!-- Speed Multipliers -->
                <div class="hidden sm:flex items-center rounded-lg bg-white/5 border border-white/10 p-0.5">
                    <button data-orbit-speed="0.5" class="px-2 py-0.5 rounded text-[11px] text-slate-400 hover:text-white transition-colors">0.5x</button>
                    <button data-orbit-speed="1.0" class="px-2 py-0.5 rounded text-[11px] bg-cyan-500/20 border border-cyan-400 text-cyan-300 transition-colors">1.0x</button>
                    <button data-orbit-speed="2.0" class="px-2 py-0.5 rounded text-[11px] text-slate-400 hover:text-white transition-colors">2.0x</button>
                </div>
            </div>

            <!-- View Angles -->
            <div class="flex items-center gap-1.5">
                <span class="text-slate-400 hidden sm:inline">SUDUT PANDANG:</span>
                <button data-view-angle="3d" class="px-2.5 py-1 rounded-lg bg-cyan-500/20 border border-cyan-400 text-cyan-300 transition-all text-[11px]">
                    PERSPEKTIF 3D
                </button>
                <button data-view-angle="solar" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-slate-400 hover:text-white transition-all text-[11px]">
                    TAMPILAN ATAS (SOLAR)
                </button>
                <button data-view-angle="iso" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-slate-400 hover:text-white transition-all text-[11px]">
                    GRID ISOMETRIK
                </button>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         5. SYSTEM DIRECTORY (MATRIX GRID VIEW)
         ========================================================================== -->
    <section id="system-directory-section" class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header & Filter Controls -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-mono tracking-wider mb-2">
                        <span>MATRIKS SISTEM</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold font-orbitron text-white">
                        Direktori Sistem Gudang
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">
                        Jelajahi dan buka 2 aplikasi digital utama dalam jaringan pergudangan.
                    </p>
                </div>

                <!-- Instant Search Bar -->
                <div class="w-full md:w-80">
                    <div class="relative">
                        <input 
                            type="text" 
                            id="system-search-input"
                            placeholder="Cari berdasarkan nama, singkatan, modul..." 
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white/5 border border-white/15 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 text-sm text-white placeholder-slate-500 font-mono outline-none transition-all"
                        >
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs Pills -->
            <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 text-xs font-mono no-scrollbar">
                <button data-sys-filter="all" class="px-4 py-2 rounded-xl bg-cyan-500 text-slate-950 font-bold shadow-lg shadow-cyan-500/20 transition-all shrink-0">
                    Semua Sistem (2)
                </button>
                <button data-sys-filter="favorites" class="px-4 py-2 rounded-xl text-slate-300 hover:bg-white/5 border border-white/10 transition-all shrink-0 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-400 fill-amber-400" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <span>Disematkan / Favorit</span>
                </button>
                <button data-sys-filter="operations" class="px-4 py-2 rounded-xl text-slate-300 hover:bg-white/5 border border-white/10 transition-all shrink-0">
                    Permintaan & Material (MARS)
                </button>
                <button data-sys-filter="assets" class="px-4 py-2 rounded-xl text-slate-300 hover:bg-white/5 border border-white/10 transition-all shrink-0">
                    Aset & RFID (SATURNUS)
                </button>
            </div>

            <!-- Dynamic System Cards Grid -->
            <div id="system-directory-grid" class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                
                <!-- 1. MARS System Card -->
                <div 
                    class="system-directory-card glass-card rounded-2xl p-6 relative flex flex-col justify-between group overflow-hidden border border-white/10 hover:border-cyan-400/40"
                    data-sys-id="mars"
                    data-sys-category="operations"
                    data-sys-url="{{ env('MARS_URL', '/system/mars') }}"
                    data-search-terms="mars metalart automatic request system material permintaan reorder consumable"
                >
                    <!-- Ambient Glow Flare -->
                    <div class="absolute -right-12 -top-12 w-32 h-32 rounded-full blur-2xl opacity-20 pointer-events-none transition-opacity duration-300 group-hover:opacity-40" style="background-color: #ff6b00;"></div>
                    
                    <!-- Card Top Header -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-orbitron font-bold text-white shadow-lg planet-mars">
                                    MA
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="sys-name font-orbitron font-bold text-lg text-white group-hover:text-cyan-300 transition-colors">
                                            MARS
                                        </h3>
                                        <span class="sys-badge text-[10px] font-mono font-medium px-2 py-0.5 rounded-full border bg-orange-500/20 text-orange-400 border-orange-500/30">
                                            Permintaan & Material
                                        </span>
                                    </div>
                                    <span class="sys-fullname text-xs text-slate-400 line-clamp-1">Metalart Automatic Request System</span>
                                </div>
                            </div>

                            <!-- Favorite Star Button -->
                            <button 
                                onclick="window.novaApp.toggleFavorite('mars', event)" 
                                class="btn-fav-star p-2 rounded-lg text-slate-400 hover:text-amber-400 hover:bg-white/5 transition-colors"
                                title="Sematkan ke favorit"
                            >
                                <svg class="w-5 h-5 text-amber-400 fill-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Short Description -->
                        <p class="sys-desc text-sm text-slate-300 leading-relaxed mb-4">
                            Memonitoring ketersediaan stok dan melakukan proses reorder/pemesanan ulang item yang persediaannya sudah berada pada level minimum.
                        </p>

                        <!-- Telemetry Grid Pills -->
                        <div class="grid grid-cols-2 gap-2 py-3 border-y border-white/5 font-mono text-xs mb-4">
                            <div class="flex items-center gap-1.5 text-slate-300">
                                <span class="status-beacon online"></span>
                                <span class="sys-status-label text-[11px]">Beroperasi Normal</span>
                            </div>
                            <div class="text-right text-slate-400 text-[11px]">
                                Latensi: <span class="sys-latency text-cyan-300">18ms</span>
                            </div>
                            <div class="text-slate-400 text-[11px]">
                                Metrik: <span class="sys-stats text-slate-200">1.840 Permintaan Harian</span>
                            </div>
                            <div class="text-right text-slate-400 text-[11px]">
                                Versi: <span class="sys-version text-emerald-400">v3.8.2</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Launch Button -->
                    <div>
                        <button 
                            onclick="window.novaApp.directLaunch('mars', event)"
                            class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 text-white text-xs font-bold font-orbitron tracking-wider shadow-lg hover:shadow-cyan-500/25 transition-all duration-300 flex items-center justify-center gap-2 btn-shimmer group-hover:scale-[1.02]"
                        >
                            <span>AKSES SISTEM</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- 2. SATURNUS System Card -->
                <div 
                    class="system-directory-card glass-card rounded-2xl p-6 relative flex flex-col justify-between group overflow-hidden border border-white/10 hover:border-cyan-400/40"
                    data-sys-id="saturnus"
                    data-sys-category="assets"
                    data-sys-url="{{ env('SATURNUS_URL', 'http://127.0.0.1:8001') }}"
                    data-search-terms="saturnus smart asset tracking rfid consumable unregistration registration utilitas"
                >
                    <!-- Ambient Glow Flare -->
                    <div class="absolute -right-12 -top-12 w-32 h-32 rounded-full blur-2xl opacity-20 pointer-events-none transition-opacity duration-300 group-hover:opacity-40" style="background-color: #e09f3e;"></div>
                    
                    <!-- Card Top Header -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-orbitron font-bold text-white shadow-lg planet-saturnus">
                                    SA
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="sys-name font-orbitron font-bold text-lg text-white group-hover:text-cyan-300 transition-colors">
                                            SATURNUS
                                        </h3>
                                        <span class="sys-badge text-[10px] font-mono font-medium px-2 py-0.5 rounded-full border bg-amber-500/20 text-amber-300 border-amber-500/30">
                                            Aset & RFID
                                        </span>
                                    </div>
                                    <span class="sys-fullname text-xs text-slate-400 line-clamp-1">Smart Asset Tracking, Unregistration & Registration Network Utility System</span>
                                </div>
                            </div>

                            <!-- Favorite Star Button -->
                            <button 
                                onclick="window.novaApp.toggleFavorite('saturnus', event)" 
                                class="btn-fav-star p-2 rounded-lg text-slate-400 hover:text-amber-400 hover:bg-white/5 transition-colors"
                                title="Sematkan ke favorit"
                            >
                                <svg class="w-5 h-5 text-amber-400 fill-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Short Description -->
                        <p class="sys-desc text-sm text-slate-300 leading-relaxed mb-4">
                            Registrasi barang consumable, alur persetujuan unregistrasi, pelacakan aset RFID, dan sinkronisasi inventaris gudang secara real-time.
                        </p>

                        <!-- Telemetry Grid Pills -->
                        <div class="grid grid-cols-2 gap-2 py-3 border-y border-white/5 font-mono text-xs mb-4">
                            <div class="flex items-center gap-1.5 text-slate-300">
                                <span class="status-beacon online"></span>
                                <span class="sys-status-label text-[11px]">Beroperasi Normal</span>
                            </div>
                            <div class="text-right text-slate-400 text-[11px]">
                                Latensi: <span class="sys-latency text-cyan-300">24ms</span>
                            </div>
                            <div class="text-slate-400 text-[11px]">
                                Metrik: <span class="sys-stats text-slate-200">12.480 Aset Terlacak</span>
                            </div>
                            <div class="text-right text-slate-400 text-[11px]">
                                Versi: <span class="sys-version text-emerald-400">v4.1.0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Launch Button -->
                    <div>
                        <button 
                            onclick="window.novaApp.directLaunch('saturnus', event)"
                            class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-600 text-slate-950 font-bold font-orbitron text-xs tracking-wider shadow-lg hover:shadow-amber-500/25 transition-all duration-300 flex items-center justify-center gap-2 btn-shimmer group-hover:scale-[1.02]"
                        >
                            <span>AKSES SISTEM</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Empty State (Hidden by default, shown if search has no results) -->
                <div id="system-empty-state" class="col-span-full py-16 text-center hidden">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 mb-4">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-orbitron text-white">Sistem Tidak Ditemukan</h3>
                    <p class="text-slate-400 text-sm mt-1 max-w-md mx-auto">
                        Tidak ada aplikasi gudang yang cocok dengan "<span class="search-query-text text-cyan-300 font-mono"></span>". Coba cari MARS, SATURNUS, atau WMS.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================================================
         8. INTERACTIVE SYSTEM LAUNCH MODAL (SSO HANDSHAKE)
         ========================================================================== -->
    <div id="nova-launch-modal" class="fixed inset-0 z-50 modal-backdrop hidden items-center justify-center p-4">
        <div class="glass-panel-glow rounded-3xl max-w-lg w-full p-6 sm:p-8 relative border border-cyan-400/40 shadow-2xl animate-[fadeIn_0.2s_ease-out]">
            
            <!-- Close Button -->
            <button id="launch-modal-close" class="absolute top-5 right-5 text-slate-400 hover:text-white p-2 rounded-xl bg-white/5 hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Header -->
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-cyan-500 p-[1px]">
                    <div class="w-full h-full bg-[#080d22] rounded-[15px] flex items-center justify-center font-orbitron font-extrabold text-cyan-300">
                        ⚡
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h3 id="launch-modal-title" class="font-orbitron font-black text-2xl text-white">DETAIL SISTEM</h3>
                        <span id="launch-modal-badge" class="text-xs font-mono px-2 py-0.5 rounded-full border">Online</span>
                    </div>
                    <span id="launch-modal-subtitle" class="text-xs font-mono text-slate-400 block">Nama Lengkap Sistem</span>
                </div>
            </div>

            <!-- Description -->
            <p id="launch-modal-desc" class="text-sm text-slate-300 leading-relaxed mb-6">
                Deskripsi sistem akan tampil di sini.
            </p>

            <!-- Telemetry Stats Grid -->
            <div id="launch-modal-stats" class="grid grid-cols-3 gap-3 mb-6">
                <!-- Injected dynamically -->
            </div>

            <!-- Target Endpoint URL -->
            <div class="p-3 rounded-xl bg-black/40 border border-white/10 font-mono text-xs text-slate-400 mb-6 flex items-center justify-between">
                <span class="text-slate-500">TARGET SSO:</span>
                <span id="launch-modal-url" class="text-cyan-400 font-bold truncate max-w-[240px]">https://...</span>
            </div>

            <!-- Launch Button -->
            <button 
                id="launch-modal-btn"
                class="w-full py-3.5 px-6 rounded-2xl bg-gradient-to-r from-cyan-400 via-blue-500 to-violet-600 text-slate-950 hover:text-white font-orbitron font-extrabold text-sm tracking-wider shadow-xl shadow-cyan-500/30 hover:shadow-cyan-500/50 transition-all duration-300 flex items-center justify-center gap-2 btn-shimmer"
            >
                <span>BUKA APLIKASI SEKARANG</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- ==========================================================================
         9. COMMAND PALETTE (CTRL + K QUICK FINDER)
         ========================================================================== -->
    <div id="nova-command-palette" class="fixed inset-0 z-50 modal-backdrop hidden items-start justify-center pt-24 px-4">
        <div class="glass-panel-glow rounded-2xl max-w-2xl w-full overflow-hidden border border-cyan-400/40 shadow-2xl">
            
            <div class="p-4 border-b border-white/10 flex items-center gap-3">
                <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input 
                    type="text" 
                    id="cmd-palette-input" 
                    placeholder="Ketik nama sistem gudang (contoh: MARS, SATURNUS)..." 
                    class="w-full bg-transparent text-white font-mono text-sm outline-none placeholder-slate-500"
                >
                <kbd class="px-2 py-0.5 rounded bg-black/40 border border-white/10 text-[10px] font-mono text-slate-400">ESC</kbd>
            </div>

            <div id="cmd-palette-results" class="max-h-80 overflow-y-auto p-3 space-y-1">
                <!-- Results rendered via nova-app.js -->
            </div>

            <div class="p-3 bg-black/30 border-t border-white/10 flex items-center justify-between text-[11px] font-mono text-slate-400">
                <span>Pilih dengan kursor atau klik sistem untuk membuka</span>
                <span>Gateway Enterprise NOVA</span>
            </div>
        </div>
    </div>

    <!-- ==========================================================================
         10. FUTURISTIC ENTERPRISE FOOTER
         ========================================================================== -->
    <footer class="relative z-10 border-t border-white/10 bg-[#030611] pt-14 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                
                <!-- Col 1: Branding -->
                <div class="space-y-4 md:col-span-2">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-400 to-cyan-500 p-[1px]">
                            <div class="w-full h-full bg-[#070c20] rounded-[7px] flex items-center justify-center text-amber-300 font-black font-orbitron text-xs">
                                ☀️
                            </div>
                        </div>
                        <span class="font-orbitron font-extrabold text-xl tracking-wider text-white">
                            NOVA
                        </span>
                    </div>
                    <p class="text-xs font-mono text-cyan-400 tracking-wider">
                        Network Of Warehouse Access — Satu Portal, Semua Informasi Gudang
                    </p>
                    <p class="text-xs text-slate-400 max-w-md leading-relaxed">
                        Gerbang komando enterprise terpusat yang menghubungkan rekuisisi material, telemetri siklus hidup aset, dan operasional pergudangan.
                    </p>
                </div>

                <!-- Col 2: Core Applications -->
                <div class="space-y-2 font-mono text-xs">
                    <span class="font-orbitron font-bold text-white text-sm block mb-3">SIMPUL SISTEM</span>
                    <div><a href="#system-directory-section" class="text-slate-400 hover:text-cyan-300 transition-colors">MARS (Permintaan Material)</a></div>
                    <div><a href="#system-directory-section" class="text-slate-400 hover:text-amber-300 transition-colors">SATURNUS (Pelacakan Aset & RFID)</a></div>
                </div>

                <!-- Col 3: Operations & Support -->
                <div class="space-y-2 font-mono text-xs">
                    <span class="font-orbitron font-bold text-white text-sm block mb-3">PUSAT KENDALI</span>
                    <div><a href="#hero-solar-system" class="text-slate-400 hover:text-cyan-300 transition-colors">Alam Semesta Orbit Surya</a></div>
                    <div><a href="#system-directory-section" class="text-slate-400 hover:text-white transition-colors">Matriks Direktori Sistem</a></div>
                    <div><a href="javascript:void(0)" onclick="window.novaApp.openCommandPalette()" class="text-slate-400 hover:text-white transition-colors">Pencarian Cepat Perintah [Ctrl+K]</a></div>
                    <div class="pt-2">
                        <button id="btn-replay-intro" class="px-3 py-1 rounded bg-white/5 hover:bg-white/10 border border-white/10 text-cyan-300 transition-all text-[11px]">
                            ↺ Putar Ulang Animasi Boot
                        </button>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-xs text-slate-500">
                <div>
                    &copy; 2026 NOVA Warehouse Universe. Network Of Warehouse Access. Seluruh sistem terproteksi.
                </div>
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1 text-emerald-400">
                        <span class="status-beacon online"></span>
                        CORE STABIL (99,98%)
                    </span>
                    <span>ID SIMPUL: WH-01-CENTRAL</span>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
