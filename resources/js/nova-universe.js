/**
 * NOVA — Cosmic Solar System & Warehouse Universe Canvas Engine
 * High-performance interactive background starfield, nebula, blueprint grid, and orbit physics.
 */

export class NovaUniverse {
    constructor() {
        this.canvas = document.getElementById('nova-starfield-canvas');
        this.ctx = this.canvas ? this.canvas.getContext('2d') : null;
        this.stars = [];
        this.dataPackets = [];
        this.width = window.innerWidth;
        this.height = window.innerHeight;
        this.mouseX = 0;
        this.mouseY = 0;
        this.targetMouseX = 0;
        this.targetMouseY = 0;
        this.isPaused = false;
        this.orbitSpeed = 1.0;
        this.orbitPlane = document.getElementById('solar-plane');
        this.audioEnabled = false;
        this.audioCtx = null;

        this.init();
    }

    init() {
        if (!this.canvas || !this.ctx) return;
        this.resize();
        this.createStars();
        this.createDataPackets();
        this.bindEvents();
        this.animate();
        this.initOrbitPhysics();
    }

    resize() {
        this.width = window.innerWidth;
        this.height = window.innerHeight;
        if (this.canvas) {
            this.canvas.width = this.width;
            this.canvas.height = this.height;
        }
    }

    createStars() {
        this.stars = [];
        const starCount = Math.min(Math.floor((this.width * this.height) / 3800), 400);
        for (let i = 0; i < starCount; i++) {
            this.stars.push({
                x: Math.random() * this.width,
                y: Math.random() * this.height,
                size: Math.random() * 1.8 + 0.3,
                depth: Math.random() * 0.8 + 0.2, // Parallax depth factor
                baseAlpha: Math.random() * 0.7 + 0.2,
                twinkleSpeed: Math.random() * 0.03 + 0.005,
                twinkleOffset: Math.random() * Math.PI * 2,
                color: Math.random() > 0.85 ? '#00f5d4' : (Math.random() > 0.7 ? '#00d4ff' : (Math.random() > 0.9 ? '#ffaa00' : '#ffffff'))
            });
        }
    }

    createDataPackets() {
        this.dataPackets = [];
        for (let i = 0; i < 18; i++) {
            this.dataPackets.push({
                x: Math.random() * this.width,
                y: Math.random() * this.height,
                vx: (Math.random() - 0.5) * 0.4,
                vy: (Math.random() - 0.5) * 0.4,
                size: Math.random() * 2 + 1,
                label: `SYS-${Math.floor(Math.random() * 899 + 100)}`,
                alpha: Math.random() * 0.4 + 0.1,
                life: Math.random() * 100
            });
        }
    }

    bindEvents() {
        window.addEventListener('resize', () => {
            this.resize();
            this.createStars();
        });

        window.addEventListener('mousemove', (e) => {
            this.targetMouseX = (e.clientX - this.width / 2) / (this.width / 2);
            this.targetMouseY = (e.clientY - this.height / 2) / (this.height / 2);
        });

        // Audio toggle hook
        const audioBtn = document.getElementById('btn-audio-toggle');
        if (audioBtn) {
            audioBtn.addEventListener('click', () => {
                this.toggleAudio();
            });
        }
    }

    toggleAudio() {
        this.audioEnabled = !this.audioEnabled;
        const icon = document.getElementById('audio-toggle-icon');
        const text = document.getElementById('audio-toggle-text');
        const equalizer = document.getElementById('audio-equalizer');
        
        if (this.audioEnabled) {
            if (!this.audioCtx) {
                const AudioContextClass = window.AudioContext || window.webkitAudioContext;
                if (AudioContextClass) this.audioCtx = new AudioContextClass();
            }
            if (this.audioCtx && this.audioCtx.state === 'suspended') {
                this.audioCtx.resume();
            }
            this.playSynthSound(580, 'sine', 0.1, 0.05);
            if (icon) icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M11 5L6 9H2v6h4l5 4V5z"/>';
            if (text) text.textContent = 'Audio: AKTIF';
            if (equalizer) {
                equalizer.classList.remove('hidden');
                equalizer.classList.add('flex');
            }
        } else {
            if (icon) icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>';
            if (text) text.textContent = 'Audio: NONAKTIF';
            if (equalizer) {
                equalizer.classList.add('hidden');
                equalizer.classList.remove('flex');
            }
        }
    }

    playSynthSound(freq = 440, type = 'sine', duration = 0.12, volume = 0.05) {
        if (!this.audioEnabled || !this.audioCtx) return;
        try {
            const osc = this.audioCtx.createOscillator();
            const gain = this.audioCtx.createGain();
            osc.type = type;
            osc.frequency.setValueAtTime(freq, this.audioCtx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(freq * 1.5, this.audioCtx.currentTime + duration);

            gain.gain.setValueAtTime(volume, this.audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.0001, this.audioCtx.currentTime + duration);

            osc.connect(gain);
            gain.connect(this.audioCtx.destination);
            osc.start();
            osc.stop(this.audioCtx.currentTime + duration);
        } catch (e) {
            // Audio context safely ignored if blocked by browser policy
        }
    }

    drawSubtleWarehouseGrid() {
        if (!this.ctx) return;
        this.ctx.save();
        this.ctx.strokeStyle = 'rgba(0, 212, 255, 0.025)';
        this.ctx.lineWidth = 1;

        const gridSize = 80;
        const offsetX = (this.mouseX * 15) % gridSize;
        const offsetY = (this.mouseY * 15) % gridSize;

        // Vertical lines
        for (let x = offsetX; x < this.width; x += gridSize) {
            this.ctx.beginPath();
            this.ctx.moveTo(x, 0);
            this.ctx.lineTo(x, this.height);
            this.ctx.stroke();
        }

        // Horizontal lines
        for (let y = offsetY; y < this.height; y += gridSize) {
            this.ctx.beginPath();
            this.ctx.moveTo(0, y);
            this.ctx.lineTo(this.width, y);
            this.ctx.stroke();
        }

        // Corner warehouse crosshair accents
        this.ctx.strokeStyle = 'rgba(0, 245, 212, 0.12)';
        const crossPositions = [
            { x: 120, y: 140 },
            { x: this.width - 120, y: 140 },
            { x: 120, y: this.height - 140 },
            { x: this.width - 120, y: this.height - 140 }
        ];

        crossPositions.forEach(pos => {
            this.ctx.beginPath();
            this.ctx.moveTo(pos.x - 8, pos.y);
            this.ctx.lineTo(pos.x + 8, pos.y);
            this.ctx.moveTo(pos.x, pos.y - 8);
            this.ctx.lineTo(pos.x, pos.y + 8);
            this.ctx.stroke();
        });

        this.ctx.restore();
    }

    drawNebulaClouds() {
        if (!this.ctx) return;
        const time = Date.now() * 0.0003;
        
        // Nebula 1 - Core Golden/Amber Radiance
        const grad1 = this.ctx.createRadialGradient(
            this.width / 2 + Math.sin(time) * 30,
            this.height / 2 + Math.cos(time) * 20,
            20,
            this.width / 2,
            this.height / 2,
            380
        );
        grad1.addColorStop(0, 'rgba(255, 170, 0, 0.07)');
        grad1.addColorStop(0.5, 'rgba(0, 212, 255, 0.03)');
        grad1.addColorStop(1, 'transparent');

        this.ctx.fillStyle = grad1;
        this.ctx.fillRect(0, 0, this.width, this.height);

        // Nebula 2 - Upper Violet Cloud
        const grad2 = this.ctx.createRadialGradient(
            this.width * 0.8,
            this.height * 0.3,
            40,
            this.width * 0.8,
            this.height * 0.3,
            450
        );
        grad2.addColorStop(0, 'rgba(138, 43, 226, 0.05)');
        grad2.addColorStop(1, 'transparent');
        this.ctx.fillStyle = grad2;
        this.ctx.fillRect(0, 0, this.width, this.height);
    }

    drawStars() {
        if (!this.ctx) return;
        const time = Date.now();

        this.stars.forEach(star => {
            const parallaxX = star.x - this.mouseX * 30 * star.depth;
            const parallaxY = star.y - this.mouseY * 30 * star.depth;

            // Twinkle calculation
            const twinkle = Math.sin(time * star.twinkleSpeed + star.twinkleOffset);
            const alpha = Math.max(0.1, Math.min(1, star.baseAlpha + twinkle * 0.3));

            this.ctx.save();
            this.ctx.globalAlpha = alpha;
            this.ctx.fillStyle = star.color;
            this.ctx.beginPath();
            this.ctx.arc(parallaxX, parallaxY, star.size, 0, Math.PI * 2);
            this.ctx.fill();

            if (star.size > 1.4) {
                this.ctx.shadowBlur = 8;
                this.ctx.shadowColor = star.color;
                this.ctx.fill();
            }
            this.ctx.restore();
        });
    }

    drawDataPackets() {
        if (!this.ctx) return;
        this.ctx.save();
        this.ctx.font = '9px "JetBrains Mono", monospace';
        this.ctx.fillStyle = 'rgba(0, 245, 212, 0.35)';

        this.dataPackets.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;

            if (p.x < 0) p.x = this.width;
            if (p.x > this.width) p.x = 0;
            if (p.y < 0) p.y = this.height;
            if (p.y > this.height) p.y = 0;

            this.ctx.globalAlpha = p.alpha;
            this.ctx.fillRect(p.x, p.y, p.size, p.size);
            this.ctx.fillText(p.label, p.x + 6, p.y + 3);
        });

        this.ctx.restore();
    }

    animate() {
        // Smooth mouse interpolation
        this.mouseX += (this.targetMouseX - this.mouseX) * 0.05;
        this.mouseY += (this.targetMouseY - this.mouseY) * 0.05;

        // Apply slight 3D perspective tilt to solar system plane
        if (this.orbitPlane && this.currentViewAngle === '3d') {
            const rotX = 24 - this.mouseY * 12;
            const rotY = this.mouseX * 14;
            this.orbitPlane.style.transform = `rotateX(${rotX}deg) rotateY(${rotY}deg)`;
        }

        if (this.ctx) {
            this.ctx.clearRect(0, 0, this.width, this.height);
            this.drawSubtleWarehouseGrid();
            this.drawNebulaClouds();
            this.drawStars();
            this.drawDataPackets();
        }

        requestAnimationFrame(() => this.animate());
    }

    initOrbitPhysics() {
        this.currentViewAngle = '3d';
        
        // Planet Hover sounds and highlights
        const planetNodes = document.querySelectorAll('.planet-node');
        planetNodes.forEach(node => {
            node.addEventListener('mouseenter', () => {
                const track = node.closest('.orbit-carrier')?.previousElementSibling;
                if (track && track.classList.contains('orbit-track')) {
                    track.classList.add('highlight');
                }
                this.playSynthSound(680, 'sine', 0.1, 0.04);
            });

            node.addEventListener('mouseleave', () => {
                const track = node.closest('.orbit-carrier')?.previousElementSibling;
                if (track && track.classList.contains('orbit-track')) {
                    track.classList.remove('highlight');
                }
            });
        });

        // Orbit Pause/Play Controller
        const btnPause = document.getElementById('btn-orbit-pause');
        if (btnPause) {
            btnPause.addEventListener('click', () => {
                this.toggleOrbitPause();
            });
        }

        // Orbit Speed Controllers
        const speedButtons = document.querySelectorAll('[data-orbit-speed]');
        speedButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const speed = parseFloat(btn.getAttribute('data-orbit-speed') || '1.0');
                this.setOrbitSpeed(speed);
                speedButtons.forEach(b => b.classList.remove('bg-cyan-500/20', 'border-cyan-400', 'text-cyan-300'));
                btn.classList.add('bg-cyan-500/20', 'border-cyan-400', 'text-cyan-300');
                this.playSynthSound(500, 'triangle', 0.08, 0.03);
            });
        });

        // Angle View Controllers
        const viewButtons = document.querySelectorAll('[data-view-angle]');
        viewButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const angle = btn.getAttribute('data-view-angle');
                this.setViewAngle(angle);
                viewButtons.forEach(b => b.classList.remove('bg-cyan-500/20', 'border-cyan-400', 'text-cyan-300'));
                btn.classList.add('bg-cyan-500/20', 'border-cyan-400', 'text-cyan-300');
                this.playSynthSound(720, 'sine', 0.1, 0.04);
            });
        });
    }

    toggleOrbitPause() {
        this.isPaused = !this.isPaused;
        const carriers = document.querySelectorAll('.orbit-carrier');
        const icon = document.getElementById('orbit-pause-icon');
        const text = document.getElementById('orbit-pause-text');

        carriers.forEach(c => {
            if (this.isPaused) {
                c.classList.add('paused');
            } else {
                c.classList.remove('paused');
            }
        });

        if (this.isPaused) {
            if (icon) icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>';
            if (text) text.textContent = 'LANJUTKAN ORBIT';
        } else {
            if (icon) icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>';
            if (text) text.textContent = 'JEDA ORBIT';
        }
    }

    setOrbitSpeed(multiplier) {
        this.orbitSpeed = multiplier;
        const baseDurations = {
            'carrier-1': 24,
            'carrier-2': 38
        };

        Object.entries(baseDurations).forEach(([id, baseSec]) => {
            const el = document.getElementById(id);
            if (el) {
                const newDuration = (baseSec / multiplier).toFixed(1);
                el.style.animationDuration = `${newDuration}s`;
                // Also update counter rotators inside
                const rotators = el.querySelectorAll('.planet-counter-rotator');
                rotators.forEach(r => {
                    r.style.animationDuration = `${newDuration}s`;
                });
            }
        });
    }

    setViewAngle(angle) {
        this.currentViewAngle = angle;
        if (!this.orbitPlane) return;

        if (angle === 'solar') {
            this.orbitPlane.style.transform = 'rotateX(0deg) rotateY(0deg)';
        } else if (angle === 'iso') {
            this.orbitPlane.style.transform = 'rotateX(42deg) rotateZ(-18deg)';
        } else {
            this.orbitPlane.style.transform = 'rotateX(24deg) rotateY(0deg)';
        }
    }
}
