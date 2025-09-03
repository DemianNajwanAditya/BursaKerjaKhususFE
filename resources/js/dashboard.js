// Enhanced Dashboard JavaScript with Modern Animations

// DOM Elements
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');
const menuBtn = document.querySelector('.menu-btn');
const notifBtn = document.querySelector('.notif-btn');
const sidebarLinks = document.querySelectorAll('.sidebar-link');
const lowonganCards = document.querySelectorAll('.lowongan-card');

// Sidebar Toggle Function
function toggleSidebar() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    
    // Add body scroll lock when sidebar is open
    if (sidebar.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
        
        // Animate sidebar menu items
        animateSidebarItems();
    } else {
        document.body.style.overflow = '';
    }
    
    // Add haptic feedback for mobile
    if ('vibrate' in navigator) {
        navigator.vibrate(50);
    }
}

// Animate sidebar menu items
function animateSidebarItems() {
    const menuItems = document.querySelectorAll('.sidebar-menu li');
    
    menuItems.forEach((item, index) => {
        item.style.animation = 'none';
        item.offsetHeight; // Trigger reflow
        item.style.animation = `fadeInUp 0.6s ease ${index * 0.1}s forwards`;
    });
}

// Close sidebar when clicking on overlay
overlay.addEventListener('click', () => {
    toggleSidebar();
});

// Close sidebar when clicking on menu links
sidebarLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        
        // Add ripple effect
        createRipple(e, link);
        
        // Close sidebar after short delay
        setTimeout(() => {
            toggleSidebar();
        }, 200);
    });
});

// Create ripple effect for buttons
function createRipple(event, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        pointer-events: none;
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        z-index: 1000;
    `;
    
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add ripple CSS animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .sidebar-link {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(style);

// Enhanced notification button with animation
notifBtn.addEventListener('click', function(e) {
    createRipple(e, this);
    
    // Animate notification icon
    const icon = this.querySelector('svg');
    icon.style.animation = 'bell-ring 0.5s ease-in-out';
    
    // Reset animation
    setTimeout(() => {
        icon.style.animation = '';
    }, 500);
    
    // Show notification popup (you can customize this)
    showNotificationPopup();
});

// Add bell ring animation
const bellRingStyle = document.createElement('style');
bellRingStyle.textContent = `
    @keyframes bell-ring {
        0%, 100% { transform: rotate(0deg); }
        10%, 30%, 50%, 70%, 90% { transform: rotate(10deg); }
        20%, 40%, 60%, 80% { transform: rotate(-10deg); }
    }
`;
document.head.appendChild(bellRingStyle);

// Show notification popup
function showNotificationPopup() {
    // Remove existing popup if any
    const existingPopup = document.querySelector('.notification-popup');
    if (existingPopup) {
        existingPopup.remove();
    }
    
    const popup = document.createElement('div');
    popup.className = 'notification-popup';
    popup.innerHTML = `
        <div class="notification-header">
            <h4>🔔 Notifikasi</h4>
            <button class="close-notification">&times;</button>
        </div>
        <div class="notification-body">
            <div class="notification-item">
                <div class="notification-icon">📄</div>
                <div class="notification-content">
                    <h5>Lowongan Baru Tersedia</h5>
                    <p>PT Kaizen Jaya Abadi membuka lowongan untuk posisi Operator Produksi</p>
                    <span class="notification-time">2 menit yang lalu</span>
                </div>
            </div>
            <div class="notification-item">
                <div class="notification-icon">⏰</div>
                <div class="notification-content">
                    <h5>Batas Waktu Mendekati</h5>
                    <p>Pendaftaran Staff Administrasi akan berakhir dalam 2 hari</p>
                    <span class="notification-time">1 jam yang lalu</span>
                </div>
            </div>
        </div>
    `;
    
    // Add popup styles
    const popupStyles = `
        .notification-popup {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 350px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 10000;
            animation: slideInRight 0.4s ease-out;
            overflow: hidden;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
        }
        
        .notification-header h4 {
            margin: 0;
            font-size: 1.1rem;
        }
        
        .close-notification {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            transition: background 0.3s ease;
        }
        
        .close-notification:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .notification-body {
            padding: 0;
        }
        
        .notification-item {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }
        
        .notification-item:hover {
            background: rgba(99, 102, 241, 0.05);
        }
        
        .notification-item:last-child {
            border-bottom: none;
        }
        
        .notification-icon {
            font-size: 1.5rem;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .notification-content h5 {
            margin: 0 0 5px 0;
            color: #1f2937;
            font-size: 0.95rem;
        }
        
        .notification-content p {
            margin: 0 0 8px 0;
            color: #6b7280;
            font-size: 0.85rem;
            line-height: 1.4;
        }
        
        .notification-time {
            color: #9ca3af;
            font-size: 0.75rem;
        }
        
        @media (max-width: 768px) {
            .notification-popup {
                width: calc(100vw - 40px);
                right: 20px;
                left: 20px;
            }
        }
    `;
    
    if (!document.querySelector('#notification-styles')) {
        const notifStyle = document.createElement('style');
        notifStyle.id = 'notification-styles';
        notifStyle.textContent = popupStyles;
        document.head.appendChild(notifStyle);
    }
    
    document.body.appendChild(popup);
    
    // Close popup when clicking close button
    popup.querySelector('.close-notification').addEventListener('click', () => {
        popup.style.animation = 'slideOutRight 0.3s ease-in-out forwards';
        setTimeout(() => popup.remove(), 300);
    });
    
    // Auto close after 8 seconds
       // Auto close after 8 seconds
    setTimeout(() => {
        if (popup.parentNode) {
            popup.style.animation = 'slideOutRight 0.3s ease-in-out forwards';
            setTimeout(() => popup.remove(), 300);
        }
    }, 8000);
}