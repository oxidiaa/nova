<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NOVA — Network Of Warehouse Access. One Portal, All Warehouse Information. Central gateway and digital solar system for enterprise warehouse operations.">
    <meta name="keywords" content="NOVA, Warehouse Portal, MARS, SATURNUS, WMS, Inventory, Enterprise Warehouse, Logistics Portal">
    <meta name="theme-color" content="#050816">

    <title>NOVA — Network Of Warehouse Access | One Portal, All Warehouse Information</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Orbitron:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

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
                <span>INITIALIZING NOVA CORE v3.8</span>
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
                “One Portal, All Warehouse Information”
            </p>
        </div>

        <button id="btn-skip-boot" class="absolute bottom-8 right-8 px-4 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-slate-400 hover:text-white transition-all">
            SKIP INTRO [ESC]
        </button>
    </div>

    <!-- ==========================================================================
         2. INTERACTIVE COSMOS BACKGROUND CANVAS & WAREHOUSE GRID
         ========================================================================== -->
    <canvas id="nova-starfield-canvas" class="fixed inset-0 pointer-events-none z-0"></canvas>
    <div class="fixed inset-0 warehouse-scanlines z-[1] pointer-events-none opacity-40"></div>

    <!-- ==========================================================================
         3. ENTERPRISE HEADER & NAVIGATION
         ========================================================================== -->
    <header class="sticky top-0 z-50 glass-panel border-b border-white/10 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            
            <!-- Left: Logo Branding -->
            <a href="#" class="flex items-center gap-3.5 group">
                <div class="relative w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 via-orange-600 to-cyan-500 p-[1px] shadow-lg shadow-orange-500/20 group-hover:shadow-cyan-500/40 transition-all">
                    <div class="w-full h-full bg-[#070c20] rounded-[11px] flex items-center justify-center relative overflow-hidden">
                        <!-- Sun Core Icon -->
                        <div class="w-4 h-4 rounded-full bg-gradient-to-r from-amber-400 to-orange-500 shadow-[0_0_10px_#ff9900] group-hover:scale-125 transition-transform duration-300"></div>
                        <div class="absolute inset-0 border border-cyan-400/30 rounded-full animate-[spin_10s_linear_infinite]"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-orbitron font-extrabold text-2xl tracking-wider text-white group-hover:text-cyan-300 transition-colors">
                            NOVA
                        </span>
                        <span class="text-[9px] font-mono px-2 py-0.5 rounded bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 font-semibold tracking-wider">
                            GATEWAY
                        </span>
                    </div>
                    <span class="text-[10px] font-mono text-slate-400 tracking-wider block -mt-0.5">
                        Network Of Warehouse Access
                    </span>
                </div>
            </a>

            <!-- Center: Navigation Links -->
            <nav class="hidden md:flex items-center gap-1 lg:gap-2">
                <a href="#hero-solar-system" class="px-3.5 py-2 rounded-lg text-xs font-bold font-orbitron tracking-wider text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 transition-all">
                    SOLAR ORBIT
                </a>
                <a href="#system-directory-section" class="px-3.5 py-2 rounded-lg text-xs font-bold font-orbitron tracking-wider text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    SYSTEM DIRECTORY
                </a>
                <a href="#warehouse-info-section" class="px-3.5 py-2 rounded-lg text-xs font-bold font-orbitron tracking-wider text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    WAREHOUSE INFO
                </a>
                <a href="#ecosystem-section" class="px-3.5 py-2 rounded-lg text-xs font-bold font-orbitron tracking-wider text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                    ECOSYSTEM
                </a>
            </nav>

            <!-- Right: Live Clock, Search, Audio, Notification & Directory CTA -->
            <div class="flex items-center gap-2 sm:gap-3">
                
                <!-- Digital Live Clock -->
                <div class="hidden xl:flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 font-mono text-xs text-slate-300">
                    <span class="status-beacon online"></span>
                    <span id="nova-live-clock">--:--:-- WIB</span>
                </div>

                <!-- Global Search / Command Palette Trigger -->
                <button 
                    data-open-cmd-palette
                    class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-xs text-slate-300 hover:text-white transition-all group"
                    title="Press Ctrl + K to search"
                >
                    <svg class="w-4 h-4 text-cyan-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span class="hidden sm:inline font-mono text-[11px]">Search Systems...</span>
                    <kbd class="hidden md:inline-block px-1.5 py-0.5 rounded bg-black/40 border border-white/10 text-[10px] font-mono text-slate-400">Ctrl+K</kbd>
                </button>

                <!-- Audio FX Synthesizer Toggle -->
                <button 
                    id="btn-audio-toggle"
                    class="p-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 hover:text-cyan-300 transition-all relative"
                    title="Toggle synthesized cyber audio feedback"
                >
                    <svg id="audio-toggle-icon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                    </svg>
                </button>

                <!-- Notifications Popover Bell -->
                <div class="relative">
                    <button 
                        id="btn-notifications"
                        class="p-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 hover:text-amber-300 transition-all relative"
                        title="Warehouse System Telemetry Alerts"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-amber-400 shadow-[0_0_8px_#ffb800]"></span>
                    </button>

                    <!-- Notifications Dropdown Drawer -->
                    <div id="notifications-drawer" class="hidden absolute right-0 mt-3 w-80 sm:w-96 glass-panel rounded-2xl p-4 shadow-2xl border border-white/15 z-50">
                        <div class="flex items-center justify-between border-b border-white/10 pb-3 mb-3">
                            <div class="flex items-center gap-2">
                                <span class="font-orbitron font-bold text-sm text-white">LIVE TELEMETRY</span>
                                <span class="px-2 py-0.5 text-[10px] rounded-full bg-cyan-500/20 text-cyan-300 font-mono">3 New</span>
                            </div>
                            <button id="notifications-close" class="text-slate-400 hover:text-white text-xs font-mono">✕</button>
                        </div>
                        <div class="space-y-2.5 text-xs font-mono">
                            <div class="p-2.5 rounded-xl bg-cyan-950/40 border border-cyan-500/20">
                                <div class="flex items-center justify-between text-cyan-300 font-bold mb-1">
                                    <span>MARS ORDER DISPATCH</span>
                                    <span class="text-[10px] text-slate-400">2m ago</span>
                                </div>
                                <p class="text-slate-300">Requisition #MR-9042 approved by Supervisor. Routing to Aisle 14.</p>
                            </div>
                            <div class="p-2.5 rounded-xl bg-amber-950/40 border border-amber-500/20">
                                <div class="flex items-center justify-between text-amber-300 font-bold mb-1">
                                    <span>SATURNUS RFID SCAN</span>
                                    <span class="text-[10px] text-slate-400">7m ago</span>
                                </div>
                                <p class="text-slate-300">Dock 04 Inbound portal verified 120 new RFID asset pallets.</p>
                            </div>
                            <div class="p-2.5 rounded-xl bg-emerald-950/40 border border-emerald-500/20">
                                <div class="flex items-center justify-between text-emerald-300 font-bold mb-1">
                                    <span>MARS REQUISITION</span>
                                    <span class="text-[10px] text-slate-400">14m ago</span>
                                </div>
                                <p class="text-slate-300">Replenishment batch #924 synced with warehouse inventory.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Primary CTA: System Directory -->
                <a 
                    href="#system-directory-section"
                    class="py-2 px-3.5 sm:px-4 rounded-xl bg-gradient-to-r from-cyan-500 via-blue-500 to-violet-600 text-slate-950 hover:text-white font-orbitron font-bold text-xs tracking-wider shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all duration-300 flex items-center gap-1.5 btn-shimmer"
                >
                    <span class="hidden sm:inline">EXPLORE</span>
                    <span>DIRECTORY</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
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
                <span>CENTRAL WAREHOUSE DIGITAL GATEWAY</span>
                <span class="text-slate-500">|</span>
                <span class="text-slate-300 font-bold">ALL SYSTEMS OPERATIONAL</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black font-orbitron tracking-tight text-white mb-4 leading-tight">
                WELCOME TO <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-cyan-300 to-blue-400 glow-text-cyan">NOVA</span>
            </h1>

            <p class="text-xl sm:text-2xl font-tech font-semibold text-cyan-200 tracking-wide mb-3">
                “One Portal, All Warehouse Information”
            </p>

            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Your single command gateway to the Warehouse digital ecosystem. Explore applications orbiting around NOVA Core, or navigate directly to the enterprise directory.
            </p>

            <!-- Action CTAs -->
            <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 mt-6">
                <a 
                    href="#system-directory-section"
                    class="py-3 px-6 rounded-xl bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-orbitron font-extrabold text-xs tracking-wider shadow-lg shadow-cyan-500/30 hover:shadow-cyan-400/50 transition-all duration-300 flex items-center gap-2 btn-shimmer"
                >
                    <span>EXPLORE SYSTEMS →</span>
                </a>
                <a 
                    href="#warehouse-info-section"
                    class="py-3 px-6 rounded-xl glass-panel hover:bg-white/10 border border-white/15 text-white font-orbitron font-bold text-xs tracking-wider transition-all duration-300 flex items-center gap-2"
                >
                    <svg class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <span>WAREHOUSE INFORMATION</span>
                </a>
            </div>
        </div>

        <!-- Solar Orbit Control Deck (Top Overlay of Universe Stage) -->
        <div class="max-w-6xl mx-auto px-4 mb-2 flex flex-wrap items-center justify-between gap-3 text-xs font-mono">
            <div class="flex items-center gap-2">
                <span class="text-slate-400">ORBIT CONTROLS:</span>
                
                <!-- Pause/Resume Orbit -->
                <button 
                    id="btn-orbit-pause" 
                    class="px-3 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-cyan-300 flex items-center gap-1.5 transition-all"
                >
                    <svg id="orbit-pause-icon" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span id="orbit-pause-text">PAUSE ORBIT</span>
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
                <span class="text-slate-400 hidden sm:inline">VIEW:</span>
                <button data-view-angle="3d" class="px-2.5 py-1 rounded-lg bg-cyan-500/20 border border-cyan-400 text-cyan-300 transition-all text-[11px]">
                    3D PERSPECTIVE
                </button>
                <button data-view-angle="solar" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-slate-400 hover:text-white transition-all text-[11px]">
                    SOLAR TOP-DOWN
                </button>
                <button data-view-angle="iso" class="px-2.5 py-1 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-slate-400 hover:text-white transition-all text-[11px]">
                    ISOMETRIC GRID
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
                    title="NOVA Central Energy Core"
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
                            
                            <!-- Planet Sphere -->
                            <div class="planet-body planet-mars">
                                <span class="text-white text-2xl font-black font-orbitron select-none drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)]">M</span>
                            </div>
                            
                            <!-- Planet Label -->
                            <div class="planet-badge">🪐 MARS</div>

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
                                    Material Request, Ordering & Requisition Workflow for warehouse consumables.
                                </p>
                                <div class="flex items-center justify-between text-[11px] font-mono text-slate-400 mb-3">
                                    <span class="text-emerald-400">● Online (99.98%)</span>
                                    <span>Ping: 18ms</span>
                                </div>
                                <button 
                                    onclick="window.novaApp.openLaunchModal('mars')"
                                    class="w-full py-2 px-3 rounded-xl bg-gradient-to-r from-orange-500 to-red-600 text-white text-xs font-bold font-orbitron tracking-wider flex items-center justify-center gap-1.5 shadow-lg shadow-orange-500/30 btn-shimmer"
                                >
                                    <span>ACCESS SYSTEM</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
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
                            
                            <!-- Planet Sphere -->
                            <div class="planet-body planet-saturnus">
                                <span class="text-white text-2xl font-black font-orbitron select-none drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)]">S</span>
                            </div>
                            
                            <!-- Planet Label -->
                            <div class="planet-badge">🪐 SATURNUS</div>

                            <!-- Holographic Hover Card -->
                            <div class="planet-hud-card glass-panel-glow rounded-2xl p-5">
                                <div class="flex items-center justify-between border-b border-white/10 pb-2 mb-2">
                                    <div>
                                        <h4 class="font-orbitron font-bold text-base text-amber-300">SATURNUS</h4>
                                        <span class="text-[10px] text-slate-400 line-clamp-1">Smart Asset Tracking Network System</span>
                                    </div>
                                    <span class="status-beacon online"></span>
                                </div>
                                <p class="text-xs text-slate-300 mb-3 leading-relaxed">
                                    Asset Registration, RFID Tracking & Decommissioning Utility System.
                                </p>
                                <div class="flex items-center justify-between text-[11px] font-mono text-slate-400 mb-3">
                                    <span class="text-emerald-400">● Online (12.4k RFID)</span>
                                    <span>Ping: 24ms</span>
                                </div>
                                <button 
                                    onclick="window.novaApp.openLaunchModal('saturnus')"
                                    class="w-full py-2 px-3 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-600 text-slate-950 font-bold font-orbitron text-xs tracking-wider flex items-center justify-center gap-1.5 shadow-lg shadow-amber-500/30 btn-shimmer"
                                >
                                    <span>ACCESS SYSTEM</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- ==========================================================================
         5. INFORMATION & ECOSYSTEM SECTION (STATISTICS COUNTERS)
         ========================================================================== -->

    <!-- ==========================================================================
         6. SYSTEM DIRECTORY (MATRIX GRID VIEW)
         ========================================================================== -->
    <section id="system-directory-section" class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header & Filter Controls -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-mono tracking-wider mb-2">
                        <span>SYSTEM MATRIX</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold font-orbitron text-white">
                        System Directory
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">
                        Explore and launch the 2 core digital applications in the warehouse network.
                    </p>
                </div>

                <!-- Instant Search Bar -->
                <div class="w-full md:w-80">
                    <div class="relative">
                        <input 
                            type="text" 
                            id="system-search-input"
                            placeholder="Filter by name, acronym, module..." 
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
                    All Systems (2)
                </button>
                <button data-sys-filter="favorites" class="px-4 py-2 rounded-xl text-slate-300 hover:bg-white/5 border border-white/10 transition-all shrink-0 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-400 fill-amber-400" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <span>Pinned / Favorites</span>
                </button>
                <button data-sys-filter="operations" class="px-4 py-2 rounded-xl text-slate-300 hover:bg-white/5 border border-white/10 transition-all shrink-0">
                    Material & Request (MARS)
                </button>
                <button data-sys-filter="assets" class="px-4 py-2 rounded-xl text-slate-300 hover:bg-white/5 border border-white/10 transition-all shrink-0">
                    Assets & RFID (SATURNUS)
                </button>
            </div>

            <!-- Dynamic System Cards Grid -->
            <div id="system-directory-grid" class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <!-- Injected dynamically via nova-app.js -->
            </div>
                <!-- Injected dynamically via nova-app.js -->
            </div>

        </div>
    </section>

    <!-- ==========================================================================
         7. WAREHOUSE INFORMATION & INTERACTIVE FLOOR MAP HUB
         ========================================================================== -->
    <section id="warehouse-info-section" class="relative z-10 py-20 bg-[#070c20]/80 border-t border-white/10 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-500/10 border border-yellow-500/30 text-yellow-400 text-xs font-mono tracking-wider mb-2">
                        <span>FACILITY TELEMETRY</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold font-orbitron text-white">
                        Warehouse Floor & Operations Info
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">
                        Select a warehouse zone to inspect active docks, thermal status, and shift supervisor notes.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="px-4 py-2 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-mono">
                        🛡️ <strong>428 DAYS</strong> Zero Lost-Time Incident
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left: Clickable Zone Cards -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    
                    <div data-zone-id="zone-a" class="glass-card rounded-2xl p-5 cursor-pointer border border-cyan-400 bg-cyan-500/10 transition-all">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-cyan-400/20 text-cyan-300">ZONE A</span>
                            <span class="status-beacon online"></span>
                        </div>
                        <h3 class="font-orbitron font-bold text-white text-base">Inbound Receiving</h3>
                        <p class="text-xs text-slate-300 mt-1">Docks 01–08 | Fast-Scan RFID Gates</p>
                        <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-xs font-mono text-slate-400">
                            <span>Occupancy: <strong class="text-cyan-300">78%</strong></span>
                            <span>Click to view →</span>
                        </div>
                    </div>

                    <div data-zone-id="zone-b" class="glass-card rounded-2xl p-5 cursor-pointer border border-white/10 hover:border-purple-400/50 transition-all">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-purple-400/20 text-purple-300">ZONE B</span>
                            <span class="status-beacon online"></span>
                        </div>
                        <h3 class="font-orbitron font-bold text-white text-base">High-Bay ASRS Racks</h3>
                        <p class="text-xs text-slate-300 mt-1">Aisles 01–24 | Automated Crane Storage</p>
                        <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-xs font-mono text-slate-400">
                            <span>Capacity: <strong class="text-purple-300">86.4%</strong></span>
                            <span>Click to view →</span>
                        </div>
                    </div>

                    <div data-zone-id="zone-c" class="glass-card rounded-2xl p-5 cursor-pointer border border-white/10 hover:border-blue-400/50 transition-all">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-blue-400/20 text-blue-300">ZONE C</span>
                            <span class="status-beacon online"></span>
                        </div>
                        <h3 class="font-orbitron font-bold text-white text-base">Cold Chain Storage</h3>
                        <p class="text-xs text-slate-300 mt-1">Climate Vaults C1 & C2 | Temp 4.1°C</p>
                        <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-xs font-mono text-slate-400">
                            <span>Status: <strong class="text-blue-300">Strict Cold</strong></span>
                            <span>Click to view →</span>
                        </div>
                    </div>

                    <div data-zone-id="zone-d" class="glass-card rounded-2xl p-5 cursor-pointer border border-white/10 hover:border-emerald-400/50 transition-all">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-emerald-400/20 text-emerald-300">ZONE D</span>
                            <span class="status-beacon online"></span>
                        </div>
                        <h3 class="font-orbitron font-bold text-white text-base">Outbound Staging & Docks</h3>
                        <p class="text-xs text-slate-300 mt-1">Truck Bays 09–16 | Cross-Dock Fast Track</p>
                        <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-xs font-mono text-slate-400">
                            <span>Velocity: <strong class="text-emerald-300">91.8%</strong></span>
                            <span>Click to view →</span>
                        </div>
                    </div>

                </div>

                <!-- Right: Zone Live Telemetry Display -->
                <div class="lg:col-span-5 glass-panel rounded-2xl p-6 border border-white/15">
                    <div id="zone-detail-display">
                        <div class="space-y-3 font-mono text-sm">
                            <div class="flex items-center justify-between border-b border-white/10 pb-2">
                                <h4 class="font-orbitron font-bold text-cyan-300 text-base">Zone A — Inbound Receiving & Staging</h4>
                                <span class="px-2 py-0.5 text-xs rounded bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">Active</span>
                            </div>
                            <div class="grid grid-cols-2 gap-3 text-xs">
                                <div class="p-2.5 rounded-lg bg-white/5">
                                    <span class="text-slate-400 block">Dock Status</span>
                                    <span class="text-white font-bold">8 Active / 2 Scheduled</span>
                                </div>
                                <div class="p-2.5 rounded-lg bg-white/5">
                                    <span class="text-slate-400 block">Occupancy</span>
                                    <span class="text-cyan-300 font-bold">78% Capacity</span>
                                </div>
                                <div class="p-2.5 rounded-lg bg-white/5">
                                    <span class="text-slate-400 block">Environment</span>
                                    <span class="text-amber-300 font-bold">24.2°C Ambient</span>
                                </div>
                                <div class="p-2.5 rounded-lg bg-white/5">
                                    <span class="text-slate-400 block">Zone Lead</span>
                                    <span class="text-white font-bold">Budi Pratama (Dock Master)</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-lg bg-cyan-950/40 border border-cyan-500/20 text-xs text-cyan-200">
                                <strong class="text-cyan-400">Live Activity:</strong> ASN-8902 Verified by SATURNUS (120 pallets Putaway)
                            </div>
                        </div>
                    </div>
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
                        <h3 id="launch-modal-title" class="font-orbitron font-black text-2xl text-white">SYSTEM</h3>
                        <span id="launch-modal-badge" class="text-xs font-mono px-2 py-0.5 rounded-full border">Online</span>
                    </div>
                    <span id="launch-modal-subtitle" class="text-xs font-mono text-slate-400 block">Full System Name</span>
                </div>
            </div>

            <!-- Description -->
            <p id="launch-modal-desc" class="text-sm text-slate-300 leading-relaxed mb-6">
                System description goes here.
            </p>

            <!-- Telemetry Stats Grid -->
            <div id="launch-modal-stats" class="grid grid-cols-3 gap-3 mb-6">
                <!-- Injected dynamically -->
            </div>

            <!-- Target Endpoint URL -->
            <div class="p-3 rounded-xl bg-black/40 border border-white/10 font-mono text-xs text-slate-400 mb-6 flex items-center justify-between">
                <span class="text-slate-500">SSO TARGET:</span>
                <span id="launch-modal-url" class="text-cyan-400 font-bold truncate max-w-[240px]">https://...</span>
            </div>

            <!-- Launch Button -->
            <button 
                id="launch-modal-btn"
                class="w-full py-3.5 px-6 rounded-2xl bg-gradient-to-r from-cyan-400 via-blue-500 to-violet-600 text-slate-950 hover:text-white font-orbitron font-extrabold text-sm tracking-wider shadow-xl shadow-cyan-500/30 hover:shadow-cyan-500/50 transition-all duration-300 flex items-center justify-center gap-2 btn-shimmer"
            >
                <span>LAUNCH PORTAL INSTANCE</span>
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
                    placeholder="Type a warehouse system (e.g. MARS, SATURNUS)..." 
                    class="w-full bg-transparent text-white font-mono text-sm outline-none placeholder-slate-500"
                >
                <kbd class="px-2 py-0.5 rounded bg-black/40 border border-white/10 text-[10px] font-mono text-slate-400">ESC</kbd>
            </div>

            <div id="cmd-palette-results" class="max-h-80 overflow-y-auto p-3 space-y-1">
                <!-- Results rendered via nova-app.js -->
            </div>

            <div class="p-3 bg-black/30 border-t border-white/10 flex items-center justify-between text-[11px] font-mono text-slate-400">
                <span>Select with mouse or click system to launch</span>
                <span>NOVA Enterprise Gateway</span>
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
                        Network Of Warehouse Access — One Portal, All Warehouse Information
                    </p>
                    <p class="text-xs text-slate-400 max-w-md leading-relaxed">
                        Central enterprise command gateway connecting material requisition, asset lifecycle telemetry, and warehouse operations.
                    </p>
                </div>

                <!-- Col 2: Core Applications -->
                <div class="space-y-2 font-mono text-xs">
                    <span class="font-orbitron font-bold text-white text-sm block mb-3">SYSTEM NODES</span>
                    <div><a href="#system-directory-section" class="text-slate-400 hover:text-cyan-300 transition-colors">MARS (Material Request)</a></div>
                    <div><a href="#system-directory-section" class="text-slate-400 hover:text-amber-300 transition-colors">SATURNUS (Asset Tracking)</a></div>
                </div>

                <!-- Col 3: Operations & Support -->
                <div class="space-y-2 font-mono text-xs">
                    <span class="font-orbitron font-bold text-white text-sm block mb-3">COMMAND CENTER</span>
                    <div><a href="#warehouse-info-section" class="text-slate-400 hover:text-white transition-colors">Warehouse Floor Zones</a></div>
                    <div><a href="#system-directory-section" class="text-slate-400 hover:text-white transition-colors">RFID & Telemetry Hub</a></div>
                    <div><a href="#" class="text-slate-400 hover:text-white transition-colors">Shift 2 Handover Bulletin</a></div>
                    <div class="pt-2">
                        <button id="btn-replay-intro" class="px-3 py-1 rounded bg-white/5 hover:bg-white/10 border border-white/10 text-cyan-300 transition-all text-[11px]">
                            ↺ Replay Boot Animation
                        </button>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-xs text-slate-500">
                <div>
                    &copy; 2026 NOVA Warehouse Universe. Network Of Warehouse Access. All systems secured.
                </div>
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1 text-emerald-400">
                        <span class="status-beacon online"></span>
                        CORE STABLE (99.98%)
                    </span>
                    <span>NODE ID: WH-01-CENTRAL</span>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
