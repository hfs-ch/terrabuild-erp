/**
 * ============================================================
 * TerraBuild ERP - Premium JavaScript Application
 * Version: 3.1
 * Description: Complete professional ERP interface controller
 * Compatible with Laravel + AdminLTE 3 + Bootstrap 5
 * ============================================================
 */

import './bootstrap';

/**
 * ============================================================
 * MAIN APPLICATION CLASS
 * ============================================================
 */
class TerraBuildERP {
    constructor() {
        // Configuration
        this.config = {
            darkModeStorageKey: 'terrabuild-dark-mode',
            sidebarStorageKey: 'terrabuild-sidebar-state',
            animationDelay: 80,
            notificationDuration: 4000,
            scrollThreshold: 300,
            counterDuration: 1500,
        };

        // State
        this.state = {
            isDarkMode: false,
            isSidebarOpen: true,
            isNavbarReduced: false,
        };

        // Initialize application
        this.init();
    }

    /**
     * ============================================================
     * INITIALIZATION
     * ============================================================
     */
    init() {
        console.log('🏗️ TerraBuild ERP v3.1 Initialized');

        // Load saved states
        this.loadState();

        // Initialize all modules
        this.initDarkMode();
        this.initSidebar();
        this.initLoader();
        this.initCards();
        this.initRipple();
        this.initCounters();
        this.initAlerts();
        this.initSearch();
        this.initTooltips();
        this.initBackToTop();
        this.initNavbarScroll();
        this.initPageTransitions();
        this.initFormValidation();
        this.initNotifications();
        this.initDropdowns();
        this.initTableHover();

        // Global event listeners
        this.initGlobalListeners();

        console.log('✅ TerraBuild ERP Ready');
    }

    /**
     * ============================================================
     * STATE MANAGEMENT
     * ============================================================
     */
    loadState() {
        // Dark mode
        const darkMode = localStorage.getItem(this.config.darkModeStorageKey);
        if (darkMode === 'true') {
            this.state.isDarkMode = true;
            document.body.classList.add('dark-mode');
        }

        // Sidebar
        const sidebarState = localStorage.getItem(this.config.sidebarStorageKey);
        if (sidebarState === 'closed') {
            this.state.isSidebarOpen = false;
        }
    }

    saveState() {
        localStorage.setItem(this.config.darkModeStorageKey, this.state.isDarkMode);
        localStorage.setItem(this.config.sidebarStorageKey, this.state.isSidebarOpen ? 'open' : 'closed');
    }

    /**
     * ============================================================
     * 1. DARK MODE SYSTEM - FIXED
     * ============================================================
     */
    initDarkMode() {
        // Chercher le toggle existant ou le créer
        let toggle = document.getElementById('darkModeToggle');
        
        if (!toggle) {
            // Créer le toggle automatiquement s'il n'existe pas
            toggle = this.createDarkModeToggle();
        }

        if (!toggle) {
            console.warn('⚠️ Dark mode toggle could not be created');
            return;
        }

        // Set initial icon
        this.updateDarkModeIcon(toggle);

        // Event listener
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggleDarkMode(toggle);
        });

        // Listen for system preference changes
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        mediaQuery.addEventListener('change', (e) => {
            if (!localStorage.getItem(this.config.darkModeStorageKey)) {
                this.state.isDarkMode = e.matches;
                document.body.classList.toggle('dark-mode', e.matches);
                this.updateDarkModeIcon(toggle);
                this.saveState();
            }
        });

        console.log('🌙 Dark Mode initialized');
    }

    createDarkModeToggle() {
        // Essayer de trouver le menu utilisateur
        const userMenu = document.querySelector('.navbar-nav.ms-auto');
        const navbarNav = document.querySelector('.navbar-nav');
        
        let container = userMenu || navbarNav;
        
        if (!container) {
            // Créer un conteneur si aucun n'existe
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                container = document.createElement('ul');
                container.className = 'navbar-nav ms-auto';
                navbar.appendChild(container);
            } else {
                // Dernier recours : créer un bouton flottant
                return this.createFloatingDarkModeToggle();
            }
        }

        // Créer l'élément du menu
        const darkModeItem = document.createElement('li');
        darkModeItem.className = 'nav-item';
        darkModeItem.innerHTML = `
            <a class="nav-link" href="#" id="darkModeToggle" role="button" title="Basculer le mode sombre">
                <i class="fas fa-moon"></i>
                <span class="d-none d-sm-inline ms-1">Sombre</span>
            </a>
        `;
        
        // Insérer avant le dernier élément si possible
        const lastItem = container.lastElementChild;
        if (lastItem && lastItem.classList.contains('nav-item')) {
            container.insertBefore(darkModeItem, lastItem);
        } else {
            container.appendChild(darkModeItem);
        }
        
        return document.getElementById('darkModeToggle');
    }

    createFloatingDarkModeToggle() {
        const toggle = document.createElement('button');
        toggle.id = 'darkModeToggle';
        toggle.className = 'btn btn-outline-secondary rounded-circle';
        toggle.style.cssText = `
            width: 48px;
            height: 48px;
            padding: 0;
            border: none;
            position: fixed;
            bottom: 100px;
            right: 30px;
            z-index: 999;
            background: var(--bg-card, #ffffff);
            box-shadow: var(--shadow-md, 0 8px 24px rgba(0,0,0,0.08));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        `;
        toggle.innerHTML = '<i class="fas fa-moon" style="font-size: 20px;"></i>';
        toggle.setAttribute('aria-label', 'Toggle dark mode');
        document.body.appendChild(toggle);
        
        // Ajouter des styles supplémentaires
        const style = document.createElement('style');
        style.textContent = `
            #darkModeToggle:hover {
                transform: scale(1.1);
                box-shadow: var(--shadow-lg, 0 16px 48px rgba(0,0,0,0.10));
            }
            @media (max-width: 767px) {
                #darkModeToggle {
                    width: 42px;
                    height: 42px;
                    bottom: 80px;
                    right: 20px;
                }
                #darkModeToggle i {
                    font-size: 17px;
                }
            }
        `;
        document.head.appendChild(style);
        
        return toggle;
    }

    toggleDarkMode(toggle) {
        this.state.isDarkMode = !this.state.isDarkMode;
        document.body.classList.toggle('dark-mode', this.state.isDarkMode);
        this.updateDarkModeIcon(toggle);
        this.saveState();

        // Mettre à jour le texte du bouton si présent
        const span = toggle.querySelector('span');
        if (span) {
            span.textContent = this.state.isDarkMode ? 'Clair' : 'Sombre';
        }

        // Dispatch event for other components
        document.dispatchEvent(new CustomEvent('darkModeToggled', {
            detail: { isDarkMode: this.state.isDarkMode }
        }));

        // Afficher une notification
        this.showNotification(
            this.state.isDarkMode ? '🌙 Mode sombre activé' : '☀️ Mode clair activé',
            'info',
            2000
        );
    }

    updateDarkModeIcon(toggle) {
        const icon = toggle.querySelector('i');
        if (icon) {
            icon.className = this.state.isDarkMode ? 'fas fa-sun' : 'fas fa-moon';
        }
        toggle.setAttribute('aria-label', this.state.isDarkMode ? 'Switch to light mode' : 'Switch to dark mode');
    }

    /**
     * ============================================================
     * 2. SIDEBAR SYSTEM
     * ============================================================
     */
    initSidebar() {
        const sidebar = document.querySelector('.main-sidebar');
        const toggle = document.querySelector('.sidebar-toggle');
        const body = document.body;

        if (!sidebar || !toggle) return;

        // Set initial state
        if (!this.state.isSidebarOpen) {
            sidebar.classList.add('sidebar-closed');
            body.classList.add('sidebar-collapse');
        }

        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggleSidebar(sidebar, body);
        });

        // Auto-close on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 767) {
                const isSidebarClick = sidebar.contains(e.target);
                const isToggleClick = toggle.contains(e.target);
                if (!isSidebarClick && !isToggleClick && this.state.isSidebarOpen) {
                    this.toggleSidebar(sidebar, body);
                }
            }
        });
    }

    toggleSidebar(sidebar, body) {
        this.state.isSidebarOpen = !this.state.isSidebarOpen;
        
        if (this.state.isSidebarOpen) {
            sidebar.classList.remove('sidebar-closed');
            body.classList.remove('sidebar-collapse');
            sidebar.classList.add('sidebar-open');
        } else {
            sidebar.classList.add('sidebar-closed');
            body.classList.add('sidebar-collapse');
            sidebar.classList.remove('sidebar-open');
        }

        this.saveState();

        // Dispatch event
        document.dispatchEvent(new CustomEvent('sidebarToggled', {
            detail: { isOpen: this.state.isSidebarOpen }
        }));
    }

    /**
     * ============================================================
     * 3. LOADER SYSTEM
     * ============================================================
     */
    initLoader() {
        const loader = document.querySelector('.loader-overlay') || this.createLoader();
        
        // Hide loader after page load
        window.addEventListener('load', () => {
            setTimeout(() => {
                this.hideLoader(loader);
            }, 500);
        });

        // Fallback: hide after 3 seconds
        setTimeout(() => {
            if (loader && loader.style.opacity !== '0') {
                this.hideLoader(loader);
            }
        }, 3000);
    }

    createLoader() {
        const loader = document.createElement('div');
        loader.className = 'loader-overlay';
        loader.innerHTML = `
            <div class="loader-container">
                <div class="loader-spinner"></div>
                <div class="loader-text">Chargement...</div>
            </div>
        `;
        document.body.appendChild(loader);
        return loader;
    }

    hideLoader(loader) {
        if (!loader) return;
        loader.style.transition = 'opacity 0.5s ease';
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    }

    showLoader() {
        const loader = document.querySelector('.loader-overlay');
        if (loader) {
            loader.style.display = 'flex';
            loader.style.opacity = '1';
        }
    }

    /**
     * ============================================================
     * 4. CARDS ANIMATION
     * ============================================================
     */
    initCards() {
        const cards = document.querySelectorAll('.card:not(.no-animate)');
        
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px) scale(0.98)';
            
            // Stagger animation
            setTimeout(() => {
                card.style.transition = 'all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, index * this.config.animationDelay);
        });
    }

    /**
     * ============================================================
     * 5. RIPPLE EFFECT
     * ============================================================
     */
    initRipple() {
        document.querySelectorAll('.btn:not(.no-ripple)').forEach(btn => {
            btn.addEventListener('click', this.createRipple.bind(this));
        });
    }

    createRipple(event) {
        const btn = event.currentTarget;
        const rect = btn.getBoundingClientRect();
        
        // Create ripple element
        const ripple = document.createElement('span');
        const size = Math.max(rect.width, rect.height);
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%);
            transform: scale(0);
            animation: rippleEffect 0.7s ease-out forwards;
            pointer-events: none;
            width: ${size}px;
            height: ${size}px;
            left: ${event.clientX - rect.left - size / 2}px;
            top: ${event.clientY - rect.top - size / 2}px;
        `;

        btn.style.position = 'relative';
        btn.style.overflow = 'hidden';
        btn.appendChild(ripple);

        // Remove ripple after animation
        setTimeout(() => {
            ripple.remove();
        }, 700);
    }

    /**
     * ============================================================
     * 6. ANIMATED COUNTERS (KPI)
     * ============================================================
     */
    initCounters() {
        const counters = document.querySelectorAll('.counter:not(.no-animate)');
        
        // Use Intersection Observer for better performance
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        counters.forEach(counter => {
            // Set initial value if not set
            if (!counter.dataset.target) {
                counter.dataset.target = counter.textContent.replace(/[^0-9]/g, '');
            }
            observer.observe(counter);
        });
    }

    animateCounter(element) {
        const target = parseInt(element.dataset.target) || 0;
        const duration = this.config.counterDuration;
        const startTime = performance.now();
        const startValue = 0;

        // Use requestAnimationFrame for smooth animation
        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Ease out cubic
            const eased = 1 - Math.pow(1 - progress, 3);
            const currentValue = Math.round(startValue + (target - startValue) * eased);
            
            element.textContent = this.formatNumber(currentValue);
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = this.formatNumber(target);
            }
        };

        requestAnimationFrame(updateCounter);
    }

    formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    }

    /**
     * ============================================================
     * 7. ALERTS SYSTEM
     * ============================================================
     */
    initAlerts() {
        const alerts = document.querySelectorAll('.alert:not(.no-auto-close)');
        
        alerts.forEach(alert => {
            // Auto-close after duration
            setTimeout(() => {
                this.closeAlert(alert);
            }, this.config.notificationDuration);

            // Add close button if not exists
            if (!alert.querySelector('.btn-close')) {
                const closeBtn = document.createElement('button');
                closeBtn.className = 'btn-close';
                closeBtn.setAttribute('aria-label', 'Close');
                closeBtn.addEventListener('click', () => this.closeAlert(alert));
                alert.appendChild(closeBtn);
            }
        });
    }

    closeAlert(alert) {
        if (!alert) return;
        alert.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
        alert.style.opacity = '0';
        alert.style.transform = 'translateX(30px) scale(0.95)';
        setTimeout(() => {
            alert.remove();
        }, 400);
    }

    /**
     * ============================================================
     * 8. SEARCH SYSTEM
     * ============================================================
     */
    initSearch() {
        const searchInputs = document.querySelectorAll('[data-search]');
        
        searchInputs.forEach(input => {
            const targetTable = document.querySelector(input.dataset.search);
            if (!targetTable) return;

            input.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase().trim();
                this.filterTable(targetTable, searchTerm);
            });

            // Add clear button functionality
            const clearBtn = input.closest('.input-group')?.querySelector('.search-clear');
            if (clearBtn) {
                clearBtn.addEventListener('click', () => {
                    input.value = '';
                    input.dispatchEvent(new Event('input'));
                });
            }
        });
    }

    filterTable(table, searchTerm) {
        if (!table) return;
        
        const rows = table.querySelectorAll('tbody tr');
        let hasResults = false;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const match = text.includes(searchTerm);
            row.style.display = match ? '' : 'none';
            if (match) hasResults = true;
        });

        // Show/hide no results message
        const noResults = table.parentElement?.querySelector('.no-results');
        if (noResults) {
            noResults.style.display = hasResults ? 'none' : '';
        }
    }

    /**
     * ============================================================
     * 9. TOOLTIPS
     * ============================================================
     */
    initTooltips() {
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(tooltipTriggerEl => {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    animation: true,
                    delay: { show: 100, hide: 100 }
                });
            });
        }
    }

    /**
     * ============================================================
     * 10. BACK TO TOP
     * ============================================================
     */
    initBackToTop() {
        const button = document.querySelector('.back-to-top') || this.createBackToTopButton();
        
        // Show/hide based on scroll
        window.addEventListener('scroll', () => {
            const scrollY = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollY > this.config.scrollThreshold) {
                button.classList.add('visible');
            } else {
                button.classList.remove('visible');
            }
        });

        // Scroll to top on click
        button.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    createBackToTopButton() {
        const button = document.createElement('button');
        button.className = 'back-to-top';
        button.setAttribute('aria-label', 'Back to top');
        button.innerHTML = '<i class="fas fa-arrow-up"></i>';
        document.body.appendChild(button);
        
        // Add styles dynamically
        const style = document.createElement('style');
        style.textContent = `
            .back-to-top {
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background: var(--secondary-gradient, #C9962E);
                color: white;
                border: none;
                box-shadow: 0 8px 24px rgba(201, 150, 46, 0.35);
                cursor: pointer;
                opacity: 0;
                transform: translateY(20px) scale(0.8);
                transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
                z-index: 999;
                font-size: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .back-to-top.visible {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            .back-to-top:hover {
                transform: translateY(-3px) scale(1.05);
                box-shadow: 0 12px 32px rgba(201, 150, 46, 0.45);
            }
            @media (max-width: 767px) {
                .back-to-top {
                    bottom: 20px;
                    right: 20px;
                    width: 42px;
                    height: 42px;
                    font-size: 17px;
                }
            }
        `;
        document.head.appendChild(style);
        
        return button;
    }

    /**
     * ============================================================
     * 11. NAVBAR SCROLL EFFECT
     * ============================================================
     */
    initNavbarScroll() {
        let lastScroll = 0;
        const navbar = document.querySelector('.main-header');
        if (!navbar) return;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            
            // Reduce navbar on scroll
            if (currentScroll > 50) {
                if (!this.state.isNavbarReduced) {
                    this.state.isNavbarReduced = true;
                    navbar.style.height = '60px';
                    navbar.style.boxShadow = '0 4px 25px rgba(0,0,0,0.12)';
                }
            } else {
                if (this.state.isNavbarReduced) {
                    this.state.isNavbarReduced = false;
                    navbar.style.height = '';
                    navbar.style.boxShadow = '';
                }
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * ============================================================
     * 12. PAGE TRANSITIONS
     * ============================================================
     */
    initPageTransitions() {
        // Apply fade-in to content wrapper
        const content = document.querySelector('.content-wrapper');
        if (content) {
            content.style.opacity = '0';
            content.style.transition = 'opacity 0.4s ease';
            
            setTimeout(() => {
                content.style.opacity = '1';
            }, 100);
        }

        // Intercept link clicks for smooth transitions
        document.querySelectorAll('a:not([target="_blank"]):not([href^="#"]):not([href^="javascript"])').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href && !href.startsWith('http') && !href.includes('#')) {
                    e.preventDefault();
                    this.navigateTo(href);
                }
            });
        });
    }

    navigateTo(url) {
        const content = document.querySelector('.content-wrapper');
        if (content) {
            content.style.opacity = '0';
            content.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                window.location.href = url;
            }, 300);
        } else {
            window.location.href = url;
        }
    }

    /**
     * ============================================================
     * 13. FORM VALIDATION
     * ============================================================
     */
    initFormValidation() {
        document.querySelectorAll('form[data-validate]').forEach(form => {
            form.addEventListener('submit', (e) => {
                if (!this.validateForm(form)) {
                    e.preventDefault();
                }
            });

            // Real-time validation
            form.querySelectorAll('.form-control, .form-select').forEach(input => {
                input.addEventListener('blur', () => {
                    this.validateField(input);
                });
                input.addEventListener('input', () => {
                    if (input.classList.contains('is-invalid')) {
                        this.validateField(input);
                    }
                });
            });
        });
    }

    validateForm(form) {
        let isValid = true;
        form.querySelectorAll('.form-control, .form-select').forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });
        return isValid;
    }

    validateField(input) {
        const validity = input.validity;
        const feedback = input.closest('.form-group')?.querySelector('.invalid-feedback');
        
        if (validity.valid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            if (feedback) feedback.style.display = 'none';
            return true;
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            if (feedback) {
                feedback.textContent = this.getValidationMessage(input);
                feedback.style.display = 'block';
            }
            return false;
        }
    }

    getValidationMessage(input) {
        const validity = input.validity;
        if (validity.valueMissing) return 'Ce champ est requis.';
        if (validity.typeMismatch) return 'Veuillez entrer une valeur valide.';
        if (validity.tooShort) return `Minimum ${input.minLength} caractères.`;
        if (validity.tooLong) return `Maximum ${input.maxLength} caractères.`;
        if (validity.rangeUnderflow) return `Valeur minimum: ${input.min}.`;
        if (validity.rangeOverflow) return `Valeur maximum: ${input.max}.`;
        if (validity.patternMismatch) return 'Format invalide.';
        return 'Valeur invalide.';
    }

    /**
     * ============================================================
     * 14. NOTIFICATIONS SYSTEM
     * ============================================================
     */
    initNotifications() {
        // Create notification container if not exists
        if (!document.querySelector('.notification-container')) {
            const container = document.createElement('div');
            container.className = 'notification-container';
            document.body.appendChild(container);
        }
    }

    showNotification(message, type = 'info', duration = 4000) {
        const container = document.querySelector('.notification-container');
        if (!container) return;

        const notification = document.createElement('div');
        const icons = {
            success: 'fa-check-circle',
            danger: 'fa-exclamation-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };

        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <i class="fas ${icons[type] || icons.info} notification-icon"></i>
            <span class="notification-message">${message}</span>
            <button class="notification-close" aria-label="Close notification">
                <i class="fas fa-times"></i>
            </button>
        `;

        container.appendChild(notification);

        // Trigger animation
        requestAnimationFrame(() => {
            notification.classList.add('show');
        });

        // Auto-close
        const timeout = setTimeout(() => {
            this.closeNotification(notification);
        }, duration);

        // Close on click
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn?.addEventListener('click', () => {
            clearTimeout(timeout);
            this.closeNotification(notification);
        });

        return notification;
    }

    closeNotification(notification) {
        if (!notification) return;
        notification.classList.remove('show');
        notification.classList.add('hiding');
        
        setTimeout(() => {
            notification.remove();
        }, 400);
    }

    /**
     * ============================================================
     * 15. DROPDOWN ANIMATIONS
     * ============================================================
     */
    initDropdowns() {
        if (typeof bootstrap !== 'undefined') {
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                const dropdownMenu = dropdown.querySelector('.dropdown-menu');
                if (dropdownMenu) {
                    dropdown.addEventListener('show.bs.dropdown', () => {
                        dropdownMenu.style.animation = 'dropdownFade 0.25s ease forwards';
                    });
                }
            });
        }
    }

    /**
     * ============================================================
     * 16. TABLE HOVER EFFECTS
     * ============================================================
     */
    initTableHover() {
        document.querySelectorAll('table tbody tr:not(.no-hover)').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.transition = 'all 0.2s ease';
                row.style.transform = 'scale(1.005)';
                row.style.boxShadow = '0 4px 12px rgba(0,0,0,0.05)';
            });
            row.addEventListener('mouseleave', () => {
                row.style.transform = 'scale(1)';
                row.style.boxShadow = 'none';
            });
        });
    }

    /**
     * ============================================================
     * 17. GLOBAL EVENT LISTENERS
     * ============================================================
     */
    initGlobalListeners() {
        // Keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl + Shift + D: Toggle dark mode
            if (e.ctrlKey && e.shiftKey && e.key === 'D') {
                e.preventDefault();
                const toggle = document.getElementById('darkModeToggle');
                if (toggle) toggle.click();
            }

            // ESC: Close notifications
            if (e.key === 'Escape') {
                document.querySelectorAll('.notification.show').forEach(notification => {
                    this.closeNotification(notification);
                });
            }
        });

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                this.handleResize();
            }, 250);
        });
    }

    handleResize() {
        // Auto-close sidebar on mobile
        if (window.innerWidth <= 767 && this.state.isSidebarOpen) {
            const sidebar = document.querySelector('.main-sidebar');
            const body = document.body;
            if (sidebar && !sidebar.classList.contains('sidebar-open')) {
                this.toggleSidebar(sidebar, body);
            }
        }
    }

    /**
     * ============================================================
     * 18. UTILITY METHODS
     * ============================================================
     */

    // Debounce utility
    debounce(func, wait = 300) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Throttle utility
    throttle(func, limit = 300) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // DOM ready check
    ready(fn) {
        if (document.readyState !== 'loading') {
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }
}

/**
 * ============================================================
 * INSTANTIATE APPLICATION
 * ============================================================
 */
let app;

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    app = new TerraBuildERP();
});

// Expose app globally for debugging
window.TerraBuild = window.TerraBuild || {};
window.TerraBuild.app = app;

// Export for module usage
export default TerraBuildERP;

/**
 * ============================================================
 * ADDITIONAL STYLES FOR DYNAMIC ELEMENTS
 * ============================================================
 */
const dynamicStyles = `
    /* Notification Container */
    .notification-container {
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 400px;
        width: 100%;
        pointer-events: none;
    }

    .notification-container .notification {
        pointer-events: auto;
        background: var(--bg-card, #ffffff);
        border-radius: var(--radius-lg, 14px);
        padding: 16px 20px;
        box-shadow: var(--shadow-lg, 0 16px 48px rgba(0,0,0,0.10));
        display: flex;
        align-items: center;
        gap: 14px;
        transform: translateX(120%) scale(0.9);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        border-left: 4px solid var(--info, #0ea5e9);
        color: var(--text-primary, #1a2332);
    }

    .notification-container .notification.show {
        transform: translateX(0) scale(1);
        opacity: 1;
    }

    .notification-container .notification.hiding {
        transform: translateX(50px) scale(0.9);
        opacity: 0;
    }

    .notification-container .notification-success {
        border-left-color: var(--success, #10b981);
    }

    .notification-container .notification-danger {
        border-left-color: var(--danger, #ef4444);
    }

    .notification-container .notification-warning {
        border-left-color: var(--warning, #f59e0b);
    }

    .notification-container .notification-info {
        border-left-color: var(--info, #0ea5e9);
    }

    .notification-icon {
        font-size: 22px;
        flex-shrink: 0;
    }

    .notification-success .notification-icon {
        color: var(--success, #10b981);
    }

    .notification-danger .notification-icon {
        color: var(--danger, #ef4444);
    }

    .notification-warning .notification-icon {
        color: var(--warning, #f59e0b);
    }

    .notification-info .notification-icon {
        color: var(--info, #0ea5e9);
    }

    .notification-message {
        flex: 1;
        font-weight: 500;
        font-size: var(--font-size-sm, 0.875rem);
    }

    .notification-close {
        background: transparent;
        border: none;
        color: var(--text-muted, #7a8499);
        cursor: pointer;
        padding: 4px;
        font-size: 16px;
        transition: var(--transition-fast, 0.2s ease);
        border-radius: var(--radius-sm, 8px);
    }

    .notification-close:hover {
        background: var(--gray-100, #f1f4f8);
        color: var(--text-primary, #1a2332);
    }

    /* Loader */
    .loader-overlay {
        position: fixed;
        inset: 0;
        background: var(--bg-body, #f0f2f6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        transition: opacity 0.5s ease;
    }

    .loader-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .loader-spinner {
        width: 48px;
        height: 48px;
        border: 4px solid var(--gray-200, #e8ecf1);
        border-top-color: var(--secondary, #C9962E);
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    .loader-text {
        color: var(--text-secondary, #3d4658);
        font-weight: 600;
        font-size: var(--font-size-sm, 0.875rem);
        letter-spacing: 0.5px;
    }

    /* Dark mode overrides for dynamic elements */
    body.dark-mode .notification-container .notification {
        background: var(--bg-card, #1a2332);
        color: var(--text-primary, #e8ecf1);
        border-left-color: var(--info, #0ea5e9);
    }

    body.dark-mode .notification-close:hover {
        background: var(--gray-200, #273444);
        color: var(--text-primary, #e8ecf1);
    }

    body.dark-mode .loader-overlay {
        background: var(--bg-body, #0f1419);
    }

    body.dark-mode .loader-spinner {
        border-color: var(--gray-300, #3d4658);
        border-top-color: var(--secondary, #C9962E);
    }

    body.dark-mode .loader-text {
        color: var(--gray-400, #a8b0c0);
    }

    /* Responsive notifications */
    @media (max-width: 767px) {
        .notification-container {
            top: 70px;
            right: 10px;
            left: 10px;
            max-width: none;
            width: auto;
        }

        .notification-container .notification {
            padding: 14px 16px;
            font-size: var(--font-size-sm, 0.875rem);
        }
    }
`;

// Inject dynamic styles
const styleElement = document.createElement('style');
styleElement.textContent = dynamicStyles;
document.head.appendChild(styleElement);

/**
 * ============================================================
 * EXPOSE GLOBAL HELPERS
 * ============================================================
 */
window.showNotification = (message, type, duration) => {
    if (app) {
        return app.showNotification(message, type, duration);
    }
    console.warn('TerraBuild ERP not initialized yet');
};

window.toggleDarkMode = () => {
    const toggle = document.getElementById('darkModeToggle');
    if (toggle) toggle.click();
};

/**
 * ============================================================
 * FIX: Création automatique du bouton Dark Mode si absent
 * ============================================================
 */
(function() {
    // Attendre que le DOM soit chargé
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier si le bouton existe déjà
        if (document.getElementById('darkModeToggle')) {
            return;
        }

        // Essayer de trouver un emplacement approprié dans la navbar
        const navbar = document.querySelector('.navbar');
        if (!navbar) return;

        // Chercher un conteneur de navigation
        let navContainer = navbar.querySelector('.navbar-nav.ms-auto');
        if (!navContainer) {
            navContainer = navbar.querySelector('.navbar-nav');
        }
        
        if (!navContainer) {
            // Créer un nouveau conteneur
            const ul = document.createElement('ul');
            ul.className = 'navbar-nav ms-auto';
            navbar.appendChild(ul);
            navContainer = ul;
        }

        // Créer l'élément du menu
        const darkModeItem = document.createElement('li');
        darkModeItem.className = 'nav-item';
        darkModeItem.innerHTML = `
            <a class="nav-link" href="#" id="darkModeToggle" role="button" title="Basculer le mode sombre">
                <i class="fas fa-moon"></i>
                <span class="d-none d-sm-inline ms-1">Sombre</span>
            </a>
        `;
        
        // Insérer avant le dernier élément si possible
        const lastItem = navContainer.lastElementChild;
        if (lastItem && lastItem.classList.contains('nav-item')) {
            navContainer.insertBefore(darkModeItem, lastItem);
        } else {
            navContainer.appendChild(darkModeItem);
        }
        
        // Mettre à jour l'icône si le dark mode est déjà actif
        const toggle = document.getElementById('darkModeToggle');
        if (toggle) {
            const isDark = document.body.classList.contains('dark-mode');
            const icon = toggle.querySelector('i');
            if (icon) {
                icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
            }
            const span = toggle.querySelector('span');
            if (span) {
                span.textContent = isDark ? 'Clair' : 'Sombre';
            }
        }
        
        console.log('🌙 Dark Mode button created automatically');
    });
})();

/**
 * ============================================================
 * END OF FILE
 * ============================================================
 */