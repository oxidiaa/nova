/**
 * NOVA — Network Of Warehouse Access
 * Main Application Logic, System Directory Registry, Command Palette, SSO Launcher, and Telemetry.
 */

import { NovaUniverse } from './nova-universe.js';

export const WAREHOUSE_SYSTEMS = [
    {
        id: 'mars',
        name: 'MARS',
        fullName: 'Metalart Automatic Request System',
        shortDesc: 'Material Request, Ordering & Requisition Workflow',
        fullDesc: 'Centralized ordering platform for warehouse materials, spare parts, packaging consumables, and expedited procurement with multi-tier approval chains.',
        category: 'operations',
        categoryLabel: 'Material & Request',
        status: 'online',
        statusLabel: '● Online (99.98% Uptime)',
        uptime: '99.98%',
        latency: '18ms',
        version: 'v3.8.2',
        color: '#ff6b00',
        gradient: 'from-orange-500 to-red-600',
        badgeColor: 'bg-orange-500/20 text-orange-400 border-orange-500/30',
        orbitRing: 1,
        planetClass: 'planet-mars',
        icon: 'rocket',
        endpoint: '/system/mars',
        stats: '1,840 Daily Orders'
    },
    {
        id: 'saturnus',
        name: 'SATURNUS',
        fullName: 'Smart Asset Tracking, Unregistration & Registration Network Utility System',
        shortDesc: 'Asset Registration, RFID Telemetry & Decommissioning',
        fullDesc: 'Enterprise asset management engine managing lifecycle tracking, RFID/Barcode portal scans, maintenance logs, and asset decommissioning protocols.',
        category: 'assets',
        categoryLabel: 'Assets & RFID',
        status: 'online',
        statusLabel: '● Online (12,480 Active RFID Tags)',
        uptime: '99.95%',
        latency: '24ms',
        version: 'v4.1.0',
        color: '#e09f3e',
        gradient: 'from-amber-400 to-yellow-600',
        badgeColor: 'bg-amber-500/20 text-amber-300 border-amber-500/30',
        orbitRing: 2,
        planetClass: 'planet-saturnus',
        icon: 'rfid',
        endpoint: '/system/saturnus',
        stats: '12,480 Tracked Assets'
    }
];

class NovaApp {
    constructor() {
        this.universe = null;
        this.currentFilter = 'all';
        this.searchQuery = '';
        this.favorites = this.loadFavorites();
        this.init();
    }

    init() {
        // 1. Initialize Cosmos Canvas
        this.universe = new NovaUniverse();

        // 2. Cinematic Opening Sequence
        this.initCinematicIntro();

        // 3. Live Digital Clock & Date
        this.initClock();

        // 4. Render System Directory Grid
        this.renderSystemGrid();

        // 5. Setup Search and Filter Handlers
        this.initFiltersAndSearch();

        // 6. Setup System Launch Modal
        this.initLaunchModal();

        // 7. Command Palette (Ctrl+K)
        this.initCommandPalette();

        // 8. Notifications Popover
        this.initNotifications();

        // 9. Real-time Telemetry Ticker in Header
        this.initTelemetryTicker();

        // 10. Mobile Navigation Drawer
        this.initMobileNav();
    }

    loadFavorites() {
        try {
            return JSON.parse(localStorage.getItem('nova_fav_systems') || '["mars", "saturnus"]');
        } catch (e) {
            return ['mars', 'saturnus'];
        }
    }

    saveFavorites() {
        try {
            localStorage.setItem('nova_fav_systems', JSON.stringify(this.favorites));
        } catch (e) {}
    }

    toggleFavorite(systemId, e) {
        if (e) e.stopPropagation();
        if (this.favorites.includes(systemId)) {
            this.favorites = this.favorites.filter(id => id !== systemId);
        } else {
            this.favorites.push(systemId);
        }
        this.saveFavorites();
        this.renderSystemGrid();
        if (this.universe) this.universe.playSynthSound(800, 'sine', 0.1, 0.04);
    }

    initCinematicIntro() {
        const bootOverlay = document.getElementById('cinematic-boot');
        const skipBtn = document.getElementById('btn-skip-boot');
        const replayBtn = document.getElementById('btn-replay-intro');

        const finishBoot = () => {
            if (!bootOverlay) return;
            bootOverlay.classList.add('loaded');
            setTimeout(() => {
                bootOverlay.style.display = 'none';
            }, 800);
        };

        if (skipBtn) {
            skipBtn.addEventListener('click', finishBoot);
        }

        // Automatically unlock after 1.8s
        setTimeout(finishBoot, 1800);

        if (replayBtn) {
            replayBtn.addEventListener('click', () => {
                if (!bootOverlay) return;
                bootOverlay.style.display = 'flex';
                bootOverlay.classList.remove('loaded');
                if (this.universe) this.universe.playSynthSound(440, 'sine', 0.2, 0.08);
                setTimeout(finishBoot, 1900);
            });
        }
    }

    initClock() {
        const clockEl = document.getElementById('nova-live-clock');
        const mobileClockEl = document.getElementById('mobile-live-clock');
        const dateEl = document.getElementById('nova-live-date');

        const updateClock = () => {
            const now = new Date();
            // WIB Time (UTC+7)
            const timeOptions = {
                timeZone: 'Asia/Jakarta',
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            const dateOptions = {
                timeZone: 'Asia/Jakarta',
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            };

            const timeString = new Intl.DateTimeFormat('id-ID', timeOptions).format(now);
            if (clockEl) {
                clockEl.textContent = `${timeString} WIB`;
            }
            if (mobileClockEl) {
                mobileClockEl.textContent = `${timeString} WIB`;
            }
            if (dateEl) {
                const dateString = new Intl.DateTimeFormat('id-ID', dateOptions).format(now).toUpperCase();
                dateEl.textContent = `${dateString} • WH-01`;
            }
        };
        updateClock();
        setInterval(updateClock, 1000);
    }

    renderSystemGrid() {
        const gridContainer = document.getElementById('system-directory-grid');
        if (!gridContainer) return;

        let filtered = WAREHOUSE_SYSTEMS.filter(sys => {
            const matchesCategory = 
                this.currentFilter === 'all' || 
                (this.currentFilter === 'favorites' && this.favorites.includes(sys.id)) ||
                (this.currentFilter === sys.category);
            
            const q = this.searchQuery.toLowerCase().trim();
            const matchesQuery = !q || 
                sys.name.toLowerCase().includes(q) || 
                sys.fullName.toLowerCase().includes(q) || 
                sys.shortDesc.toLowerCase().includes(q) ||
                sys.categoryLabel.toLowerCase().includes(q);

            return matchesCategory && matchesQuery;
        });

        if (filtered.length === 0) {
            gridContainer.innerHTML = `
                <div class="col-span-full py-16 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 mb-4">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold font-orbitron text-white">No Systems Found</h3>
                    <p class="text-slate-400 text-sm mt-1 max-w-md mx-auto">No warehouse applications matched "${this.searchQuery}". Try searching for MARS, SATURNUS, or WMS.</p>
                </div>
            `;
            return;
        }

        gridContainer.innerHTML = filtered.map(sys => {
            const isFav = this.favorites.includes(sys.id);
            const isLocked = sys.status === 'coming_soon';

            return `
                <div class="glass-card rounded-2xl p-6 relative flex flex-col justify-between group overflow-hidden border border-white/10 hover:border-cyan-400/40">
                    <!-- Ambient Glow Flare -->
                    <div class="absolute -right-12 -top-12 w-32 h-32 rounded-full blur-2xl opacity-20 pointer-events-none transition-opacity duration-300 group-hover:opacity-40" style="background-color: ${sys.color};"></div>
                    
                    <!-- Card Top Header -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center font-orbitron font-bold text-white shadow-lg ${sys.planetClass}">
                                    ${sys.name.slice(0, 2)}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-orbitron font-bold text-lg text-white group-hover:text-cyan-300 transition-colors">
                                            ${sys.name}
                                        </h3>
                                        <span class="text-[10px] font-mono font-medium px-2 py-0.5 rounded-full border ${sys.badgeColor}">
                                            ${sys.categoryLabel}
                                        </span>
                                    </div>
                                    <span class="text-xs text-slate-400 line-clamp-1">${sys.fullName}</span>
                                </div>
                            </div>

                            <!-- Favorite Star Button -->
                            <button 
                                onclick="window.novaApp.toggleFavorite('${sys.id}', event)" 
                                class="p-2 rounded-lg text-slate-400 hover:text-amber-400 hover:bg-white/5 transition-colors"
                                title="${isFav ? 'Remove from favorites' : 'Pin to favorites'}"
                            >
                                <svg class="w-5 h-5 ${isFav ? 'text-amber-400 fill-amber-400' : ''}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Short Description -->
                        <p class="text-sm text-slate-300 leading-relaxed mb-4">
                            ${sys.fullDesc}
                        </p>

                        <!-- Telemetry Grid Pills -->
                        <div class="grid grid-cols-2 gap-2 py-3 border-y border-white/5 font-mono text-xs mb-4">
                            <div class="flex items-center gap-1.5 text-slate-300">
                                <span class="status-beacon ${isLocked ? 'locked' : 'online'}"></span>
                                <span class="text-[11px]">${isLocked ? 'Locked' : 'Operational'}</span>
                            </div>
                            <div class="text-right text-slate-400 text-[11px]">
                                Ping: <span class="text-cyan-300">${sys.latency}</span>
                            </div>
                            <div class="text-slate-400 text-[11px]">
                                Metrics: <span class="text-slate-200">${sys.stats}</span>
                            </div>
                            <div class="text-right text-slate-400 text-[11px]">
                                Rel: <span class="text-emerald-400">${sys.version}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Launch Button -->
                    <div>
                        ${isLocked ? `
                            <button disabled class="w-full py-2.5 px-4 rounded-xl bg-slate-800/60 border border-slate-700 text-slate-400 text-xs font-bold font-orbitron tracking-wider flex items-center justify-center gap-2 cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                COMING SOON
                            </button>
                        ` : `
                            <button 
                                onclick="window.novaApp.openLaunchModal('${sys.id}')"
                                class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r ${sys.gradient} text-white text-xs font-bold font-orbitron tracking-wider shadow-lg hover:shadow-cyan-500/25 transition-all duration-300 flex items-center justify-center gap-2 btn-shimmer group-hover:scale-[1.02]"
                            >
                                <span>ACCESS SYSTEM</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        `}
                    </div>
                </div>
            `;
        }).join('');
    }

    initFiltersAndSearch() {
        const filterBtns = document.querySelectorAll('[data-sys-filter]');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                this.currentFilter = btn.getAttribute('data-sys-filter') || 'all';
                filterBtns.forEach(b => {
                    b.classList.remove('bg-cyan-500', 'text-slate-950', 'shadow-lg', 'shadow-cyan-500/20');
                    b.classList.add('text-slate-300', 'hover:bg-white/5');
                });
                btn.classList.add('bg-cyan-500', 'text-slate-950', 'shadow-lg', 'shadow-cyan-500/20');
                btn.classList.remove('text-slate-300', 'hover:bg-white/5');
                this.renderSystemGrid();
                if (this.universe) this.universe.playSynthSound(600, 'sine', 0.08, 0.03);
            });
        });

        const searchInput = document.getElementById('system-search-input');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                this.searchQuery = e.target.value;
                this.renderSystemGrid();
            });
        }
    }

    openLaunchModal(systemId) {
        const sys = WAREHOUSE_SYSTEMS.find(s => s.id === systemId);
        if (!sys) return;

        const modal = document.getElementById('nova-launch-modal');
        const modalTitle = document.getElementById('launch-modal-title');
        const modalSubtitle = document.getElementById('launch-modal-subtitle');
        const modalDesc = document.getElementById('launch-modal-desc');
        const modalUrl = document.getElementById('launch-modal-url');
        const modalBadge = document.getElementById('launch-modal-badge');
        const modalStats = document.getElementById('launch-modal-stats');
        const launchBtn = document.getElementById('launch-modal-btn');

        if (modalTitle) modalTitle.textContent = sys.name;
        if (modalSubtitle) modalSubtitle.textContent = sys.fullName;
        if (modalDesc) modalDesc.textContent = sys.fullDesc;
        if (modalUrl) modalUrl.textContent = `https://nova.warehouse.corp/apps/${sys.id}`;
        if (modalBadge) {
            modalBadge.textContent = sys.statusLabel;
            modalBadge.className = `text-xs font-mono font-bold px-2.5 py-1 rounded-full border ${sys.badgeColor}`;
        }
        if (modalStats) {
            modalStats.innerHTML = `
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-center">
                    <span class="text-xs text-slate-400 block font-mono">Uptime</span>
                    <span class="text-sm font-bold text-emerald-400 font-mono">${sys.uptime}</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-center">
                    <span class="text-xs text-slate-400 block font-mono">Latency</span>
                    <span class="text-sm font-bold text-cyan-300 font-mono">${sys.latency}</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-center">
                    <span class="text-xs text-slate-400 block font-mono">Release</span>
                    <span class="text-sm font-bold text-white font-mono">${sys.version}</span>
                </div>
            `;
        }

        if (launchBtn) {
            launchBtn.onclick = () => {
                this.simulateLaunch(sys);
            };
        }

        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        if (this.universe) this.universe.playSynthSound(540, 'triangle', 0.12, 0.05);
    }

    closeLaunchModal() {
        const modal = document.getElementById('nova-launch-modal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    simulateLaunch(sys) {
        const launchBtn = document.getElementById('launch-modal-btn');
        if (!launchBtn) return;

        launchBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>AUTHENTICATING SSO GATEWAY...</span>
        `;

        if (this.universe) this.universe.playSynthSound(750, 'sine', 0.2, 0.06);

        setTimeout(() => {
            launchBtn.innerHTML = `
                <svg class="w-4 h-4 text-emerald-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>HANDSHAKE VERIFIED! OPENING...</span>
            `;
            setTimeout(() => {
                this.closeLaunchModal();
                alert(`[NOVA SSO GATEWAY]\n\nSuccessfully authorized token for ${sys.name} (${sys.fullName}).\nRedirecting to secure warehouse instance: https://nova.warehouse.corp/apps/${sys.id}`);
                launchBtn.innerHTML = `
                    <span>LAUNCH PORTAL INSTANCE</span>
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                `;
            }, 600);
        }, 1000);
    }

    initLaunchModal() {
        const closeBtn = document.getElementById('launch-modal-close');
        const modalBackdrop = document.getElementById('nova-launch-modal');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => this.closeLaunchModal());
        }
        if (modalBackdrop) {
            modalBackdrop.addEventListener('click', (e) => {
                if (e.target === modalBackdrop) {
                    this.closeLaunchModal();
                }
            });
        }
    }

    openCommandPalette() {
        const palette = document.getElementById('nova-command-palette');
        const paletteInput = document.getElementById('cmd-palette-input');
        if (!palette) return;
        palette.classList.remove('hidden');
        palette.classList.add('flex');
        if (paletteInput) {
            paletteInput.value = '';
            paletteInput.focus();
            this.renderPaletteResults('');
        }
        if (this.universe) this.universe.playSynthSound(620, 'sine', 0.1, 0.04);
    }

    closeCommandPalette() {
        const palette = document.getElementById('nova-command-palette');
        if (!palette) return;
        palette.classList.add('hidden');
        palette.classList.remove('flex');
    }

    initCommandPalette() {
        const palette = document.getElementById('nova-command-palette');
        const paletteInput = document.getElementById('cmd-palette-input');
        const triggerBtns = document.querySelectorAll('[data-open-cmd-palette]');

        triggerBtns.forEach(b => b.addEventListener('click', () => this.openCommandPalette()));

        window.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                if (palette && !palette.classList.contains('hidden')) {
                    this.closeCommandPalette();
                } else {
                    this.openCommandPalette();
                }
            } else if (e.key === 'Escape') {
                this.closeCommandPalette();
                this.closeLaunchModal();
                this.closeNotifications();
            }
        });

        if (palette) {
            palette.addEventListener('click', (e) => {
                if (e.target === palette) this.closeCommandPalette();
            });
        }

        if (paletteInput) {
            paletteInput.addEventListener('input', (e) => this.renderPaletteResults(e.target.value));
        }
    }

    renderPaletteResults(query) {
        const paletteResults = document.getElementById('cmd-palette-results');
        if (!paletteResults) return;
        const q = (query || '').toLowerCase().trim();
        const results = WAREHOUSE_SYSTEMS.filter(s => 
            !q || 
            s.name.toLowerCase().includes(q) || 
            s.fullName.toLowerCase().includes(q) ||
            s.categoryLabel.toLowerCase().includes(q)
        );

        if (results.length === 0) {
            paletteResults.innerHTML = `<div class="p-6 text-center text-slate-400 text-sm font-mono">No warehouse systems matching "${query}"</div>`;
            return;
        }

        paletteResults.innerHTML = results.map(s => `
            <div 
                onclick="window.novaApp.openLaunchModal('${s.id}'); window.novaApp.closeCommandPalette();"
                class="p-3 rounded-xl hover:bg-cyan-500/10 hover:border-cyan-500/30 border border-transparent flex items-center justify-between cursor-pointer transition-all group"
            >
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center font-orbitron font-bold text-xs text-white ${s.planetClass}">
                        ${s.name.slice(0, 2)}
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-orbitron font-bold text-sm text-white group-hover:text-cyan-300">${s.name}</span>
                            <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-white/5 text-slate-400">${s.categoryLabel}</span>
                        </div>
                        <p class="text-xs text-slate-400 line-clamp-1">${s.fullName}</p>
                    </div>
                </div>
                <span class="text-xs font-mono text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity">Launch →</span>
            </div>
        `).join('');
    }

    initNotifications() {
        const notifBtn = document.getElementById('btn-notifications');
        const notifDrawer = document.getElementById('notifications-drawer');
        const notifClose = document.getElementById('notifications-close');

        if (notifBtn && notifDrawer) {
            notifBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                notifDrawer.classList.toggle('hidden');
                if (this.universe) this.universe.playSynthSound(700, 'sine', 0.1, 0.04);
            });
        }

        if (notifClose && notifDrawer) {
            notifClose.addEventListener('click', () => {
                notifDrawer.classList.add('hidden');
            });
        }

        document.addEventListener('click', (e) => {
            if (notifDrawer && !notifDrawer.contains(e.target) && notifBtn && !notifBtn.contains(e.target)) {
                notifDrawer.classList.add('hidden');
            }
        });
    }

    closeNotifications() {
        const notifDrawer = document.getElementById('notifications-drawer');
        if (notifDrawer) notifDrawer.classList.add('hidden');
    }

    initTelemetryTicker() {
        const tickerEl = document.getElementById('nav-telemetry-text');
        if (!tickerEl) return;

        const feeds = [
            { text: 'MARS • 1,840 Daily Orders • 99.98% SLA', color: 'text-orange-300', sysId: 'mars' },
            { text: 'SATURNUS • 12,480 Active RFID Tags Synced', color: 'text-amber-300', sysId: 'saturnus' },
            { text: 'GATEWAY NODE • Latency 18ms • WH-01 Nominal', color: 'text-cyan-300', sysId: null },
            { text: 'SSO CORE • Central Warehouse Protocol Online', color: 'text-emerald-300', sysId: null },
            { text: 'MARS DISPATCH • Requisition #MR-9042 Active', color: 'text-orange-400', sysId: 'mars' },
            { text: 'SATURNUS SCAN • Dock 04 Inbound Verified', color: 'text-amber-400', sysId: 'saturnus' }
        ];

        let currentIndex = 0;
        setInterval(() => {
            tickerEl.style.opacity = '0';
            tickerEl.style.transform = 'translateY(-4px)';
            
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % feeds.length;
                const currentFeed = feeds[currentIndex];
                tickerEl.textContent = currentFeed.text;
                tickerEl.className = `font-mono text-[11px] truncate tracking-tight transition-all duration-300 block ${currentFeed.color}`;
                tickerEl.style.opacity = '1';
                tickerEl.style.transform = 'translateY(0)';
            }, 300);
        }, 4000);
    }

    initMobileNav() {
        const mobileBtn = document.getElementById('btn-mobile-menu');
        const mobileDrawer = document.getElementById('mobile-nav-drawer');
        if (mobileBtn && mobileDrawer) {
            mobileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileDrawer.classList.toggle('hidden');
                if (this.universe) this.universe.playSynthSound(500, 'triangle', 0.08, 0.03);
            });

            // Close when clicking any link/button inside
            mobileDrawer.querySelectorAll('a, button').forEach(el => {
                el.addEventListener('click', () => {
                    mobileDrawer.classList.add('hidden');
                });
            });

            document.addEventListener('click', (e) => {
                if (!mobileDrawer.contains(e.target) && !mobileBtn.contains(e.target)) {
                    mobileDrawer.classList.add('hidden');
                }
            });
        }
    }
}

// Attach globally
window.addEventListener('DOMContentLoaded', () => {
    window.novaApp = new NovaApp();
});
