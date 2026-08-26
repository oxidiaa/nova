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
        shortDesc: 'Alur Kerja Permintaan Material, Pemesanan & Rekuisisi',
        fullDesc: 'Memonitor ketersediaan stok dan melakukan proses reorder/pemesanan ulang item yang persediaannya sudah berada pada level minimum.',
        category: 'operations',
        categoryLabel: 'Permintaan & Material',
        status: 'online',
        statusLabel: '● Online (Uptime 99,98%)',
        uptime: '99,98%',
        latency: '18ms',
        version: 'v3.8.2',
        color: '#ff6b00',
        gradient: 'from-orange-500 to-red-600',
        badgeColor: 'bg-orange-500/20 text-orange-400 border-orange-500/30',
        orbitRing: 1,
        planetClass: 'planet-mars',
        icon: 'rocket',
        endpoint: window.NOVA_CONFIG?.marsUrl || '/system/mars',
        stats: '1.840 Permintaan Harian'
    },
    {
        id: 'saturnus',
        name: 'SATURNUS',
        fullName: 'Smart Asset Tracking, Unregistration & Registration Network Utility System',
        shortDesc: 'Registrasi Aset, Telemetri RFID & Penonaktifan',
        fullDesc: 'Registrasi barang consumable, alur persetujuan unregistrasi, pelacakan aset RFID, dan sinkronisasi inventaris gudang secara real-time.',
        category: 'assets',
        categoryLabel: 'Aset & RFID',
        status: 'online',
        statusLabel: '● Online (12.480 Tag RFID Aktif)',
        uptime: '99,95%',
        latency: '24ms',
        version: 'v4.1.0',
        color: '#e09f3e',
        gradient: 'from-amber-400 to-yellow-600',
        badgeColor: 'bg-amber-500/20 text-amber-300 border-amber-500/30',
        orbitRing: 2,
        planetClass: 'planet-saturnus',
        icon: 'rfid',
        endpoint: window.NOVA_CONFIG?.saturnusUrl || 'http://127.0.0.1:8001',
        stats: '12.480 Aset Terlacak'
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
        } catch (e) { }
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
        const cards = document.querySelectorAll('.system-directory-card');
        const emptyState = document.getElementById('system-empty-state');
        const q = (this.searchQuery || '').toLowerCase().trim();
        let visibleCount = 0;

        cards.forEach(card => {
            const sysId = card.getAttribute('data-sys-id');
            const category = card.getAttribute('data-sys-category');
            const isFav = this.favorites.includes(sysId);
            const searchTerms = (card.getAttribute('data-search-terms') || '').toLowerCase();
            const textContent = (card.textContent || '').toLowerCase();
            const combinedSearch = `${searchTerms} ${textContent}`;

            const matchesCategory =
                this.currentFilter === 'all' ||
                (this.currentFilter === 'favorites' && isFav) ||
                (this.currentFilter === category);

            const matchesQuery = !q || combinedSearch.includes(q);

            if (matchesCategory && matchesQuery) {
                card.classList.remove('hidden');
                card.classList.add('flex');
                visibleCount++;
            } else {
                card.classList.add('hidden');
                card.classList.remove('flex');
            }

            // Update favorite star visual
            const favSvg = card.querySelector('.btn-fav-star svg');
            const favBtn = card.querySelector('.btn-fav-star');
            if (favSvg) {
                if (isFav) {
                    favSvg.classList.add('text-amber-400', 'fill-amber-400');
                    if (favBtn) favBtn.title = 'Hapus dari favorit';
                } else {
                    favSvg.classList.remove('text-amber-400', 'fill-amber-400');
                    if (favBtn) favBtn.title = 'Sematkan ke favorit';
                }
            }
        });

        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
                const queryText = emptyState.querySelector('.search-query-text');
                if (queryText) queryText.textContent = this.searchQuery;
            } else {
                emptyState.classList.add('hidden');
            }
        }
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

    directLaunch(systemId, e) {
        if (e) e.stopPropagation();
        const card = document.querySelector(`.system-directory-card[data-sys-id="${systemId}"]`);
        const targetUrl = card?.getAttribute('data-sys-url')
            || (systemId === 'saturnus' ? (window.NOVA_CONFIG?.saturnusUrl || 'http://127.0.0.1:8001') : (window.NOVA_CONFIG?.marsUrl || `/system/${systemId}`));

        if (this.universe) this.universe.playSynthSound(750, 'sine', 0.15, 0.06);

        // Open immediately so browser popup blocker does not block user interaction
        const win = window.open(targetUrl, '_blank');
        if (!win || win.closed || typeof win.closed === 'undefined') {
            window.location.href = targetUrl;
        }
    }

    openLaunchModal(systemId) {
        const card = document.querySelector(`.system-directory-card[data-sys-id="${systemId}"]`);
        const modal = document.getElementById('nova-launch-modal');
        const modalTitle = document.getElementById('launch-modal-title');
        const modalSubtitle = document.getElementById('launch-modal-subtitle');
        const modalDesc = document.getElementById('launch-modal-desc');
        const modalUrl = document.getElementById('launch-modal-url');
        const modalBadge = document.getElementById('launch-modal-badge');
        const modalStats = document.getElementById('launch-modal-stats');
        const launchBtn = document.getElementById('launch-modal-btn');

        const name = card?.querySelector('.sys-name')?.textContent.trim() || systemId.toUpperCase();
        const fullName = card?.querySelector('.sys-fullname')?.textContent.trim() || '';
        const desc = card?.querySelector('.sys-desc')?.textContent.trim() || '';
        const latency = card?.querySelector('.sys-latency')?.textContent.trim() || '18ms';
        const stats = card?.querySelector('.sys-stats')?.textContent.trim() || '';
        const version = card?.querySelector('.sys-version')?.textContent.trim() || 'v3.8.2';
        const statusLabel = card?.querySelector('.sys-status-label')?.textContent.trim() || '● Online';
        const badgeElem = card?.querySelector('.sys-badge');
        const badgeColor = badgeElem ? badgeElem.className : 'bg-cyan-500/20 text-cyan-300 border-cyan-500/30';
        const targetUrl = card?.getAttribute('data-sys-url')
            || (systemId === 'saturnus' ? (window.NOVA_CONFIG?.saturnusUrl || 'http://127.0.0.1:8001') : (window.NOVA_CONFIG?.marsUrl || `/system/${systemId}`));

        if (modalTitle) modalTitle.textContent = name;
        if (modalSubtitle) modalSubtitle.textContent = fullName;
        if (modalDesc) modalDesc.textContent = desc;

        if (modalUrl) {
            modalUrl.textContent = targetUrl;
            modalUrl.href = targetUrl;
        }

        if (modalBadge) {
            modalBadge.textContent = statusLabel;
            modalBadge.className = `text-xs font-mono font-bold px-2.5 py-1 rounded-full border ${badgeColor}`;
        }
        if (modalStats) {
            modalStats.innerHTML = `
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-center">
                    <span class="text-xs text-slate-400 block font-mono">Waktu Aktif</span>
                    <span class="text-sm font-bold text-emerald-400 font-mono">99,98%</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-center">
                    <span class="text-xs text-slate-400 block font-mono">Latensi</span>
                    <span class="text-sm font-bold text-cyan-300 font-mono">${latency}</span>
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-center">
                    <span class="text-xs text-slate-400 block font-mono">Versi Rilis</span>
                    <span class="text-sm font-bold text-white font-mono">${version}</span>
                </div>
            `;
        }

        if (launchBtn) {
            launchBtn.onclick = (e) => {
                if (e) e.stopPropagation();
                if (this.universe) this.universe.playSynthSound(750, 'sine', 0.2, 0.06);
                this.closeLaunchModal();
                const win = window.open(targetUrl, '_blank');
                if (!win || win.closed || typeof win.closed === 'undefined') {
                    window.location.href = targetUrl;
                }
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

    simulateLaunch(sys, e) {
        if (e) e.stopPropagation();
        const targetUrl = sys.id === 'saturnus' ? (window.NOVA_CONFIG?.saturnusUrl || sys.endpoint || 'http://127.0.0.1:8001') : (sys.endpoint || `/system/${sys.id}`);

        if (this.universe) this.universe.playSynthSound(750, 'sine', 0.2, 0.06);
        this.closeLaunchModal();

        // Direct open immediately without async timeout delay to avoid browser popup blocker
        const win = window.open(targetUrl, '_blank');
        if (!win || win.closed || typeof win.closed === 'undefined') {
            window.location.href = targetUrl;
        }
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
        const cards = Array.from(document.querySelectorAll('.system-directory-card'));
        const results = cards.filter(card => {
            if (!q) return true;
            const text = `${card.getAttribute('data-search-terms') || ''} ${card.textContent || ''}`.toLowerCase();
            return text.includes(q);
        });

        if (results.length === 0) {
            paletteResults.innerHTML = `<div class="p-6 text-center text-slate-400 text-sm font-mono">Tidak ada sistem gudang yang cocok dengan "${query}"</div>`;
            return;
        }

        paletteResults.innerHTML = results.map(card => {
            const id = card.getAttribute('data-sys-id');
            const name = card.querySelector('.sys-name')?.textContent.trim() || id.toUpperCase();
            const fullName = card.querySelector('.sys-fullname')?.textContent.trim() || '';
            const catLabel = card.querySelector('.sys-badge')?.textContent.trim() || '';
            const planetClass = id === 'mars' ? 'planet-mars' : 'planet-saturnus';
            return `
                <div 
                    onclick="window.novaApp.directLaunch('${id}', event); window.novaApp.closeCommandPalette();"
                    class="p-3 rounded-xl hover:bg-cyan-500/10 hover:border-cyan-500/30 border border-transparent flex items-center justify-between cursor-pointer transition-all group"
                >
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center font-orbitron font-bold text-xs text-white ${planetClass}">
                            ${name.slice(0, 2)}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-orbitron font-bold text-sm text-white group-hover:text-cyan-300">${name}</span>
                                <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-white/5 text-slate-400">${catLabel}</span>
                            </div>
                            <p class="text-xs text-slate-400 line-clamp-1">${fullName}</p>
                        </div>
                    </div>
                    <span class="text-xs font-mono text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity">Buka →</span>
                </div>
            `;
        }).join('');
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
            { text: 'MARS • 1.840 Permintaan Harian • SLA 99,98%', color: 'text-orange-300', sysId: 'mars' },
            { text: 'SATURNUS • 12.480 Tag RFID Aktif Tersinkronisasi', color: 'text-amber-300', sysId: 'saturnus' },
            { text: 'SIMPUL GATEWAY • Latensi 18ms • WH-01 Normal', color: 'text-cyan-300', sysId: null },
            { text: 'CORE SSO • Protokol Pusat Pergudangan Online', color: 'text-emerald-300', sysId: null },
            { text: 'PENGIRIMAN MARS • Rekuisisi #MR-9042 Aktif', color: 'text-orange-400', sysId: 'mars' },
            { text: 'PEMINDAIAN SATURNUS • Inbound Dock 04 Terverifikasi', color: 'text-amber-400', sysId: 'saturnus' }
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
