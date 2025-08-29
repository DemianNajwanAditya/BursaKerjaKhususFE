document.addEventListener('DOMContentLoaded', function() {
    
    // Password Toggle Functionality (sudah ada di Blade)
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Ganti icon dengan animasi
            this.style.transform = 'scale(0.8)';
            setTimeout(() => {
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
                this.style.transform = 'scale(1)';
            }, 100);
        });
    }

    // Form Submission Animation
    const form = document.querySelector('form');
    const submitBtn = document.querySelector('button[type="submit"]');
    
    if (form && submitBtn) {
        form.addEventListener('submit', function(e) {
            // Tambahkan loading state
            submitBtn.classList.add('loading');
            submitBtn.textContent = 'Memproses...';
            submitBtn.disabled = true;
            
            // Note: Jangan preventDefault() karena form perlu submit ke Laravel
            // Form akan submit normal, tapi dengan visual feedback
        });
    }

    // Input Focus Animations
    const inputGroups = document.querySelectorAll('.input-group');
    inputGroups.forEach(group => {
        const input = group.querySelector('input');
        const icon = group.querySelector('i.fas');
        
        if (input && icon) {
            input.addEventListener('focus', function() {
                group.style.transform = 'translateY(-2px)';
                icon.style.color = '#667eea';
                icon.style.transform = 'translateY(-50%) scale(1.1)';
            });
            
            input.addEventListener('blur', function() {
                group.style.transform = 'translateY(0)';
                icon.style.color = '#999';
                icon.style.transform = 'translateY(-50%) scale(1)';
            });
        }
    });

    // Parallax Mouse Movement Effect
    document.addEventListener('mousemove', function(e) {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        
        // Apply parallax to form
        if (form) {
            const translateX = (x - 0.5) * 10;
            const translateY = (y - 0.5) * 10;
            form.style.transform = `translate(${translateX}px, ${translateY}px)`;
        }
    });

    // Enhanced Keyboard Navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const activeElement = document.activeElement;
            
            // Jika focus ada di email, pindah ke password
            if (activeElement.name === 'email') {
                e.preventDefault();
                const passwordInput = document.querySelector('input[name="password"]');
                if (passwordInput) {
                    passwordInput.focus();
                }
            }
        }
    });

    // Animate Error Messages jika ada
    const errorAlert = document.querySelector('.alert-error');
    if (errorAlert) {
        // Shake animation untuk form jika ada error
        if (form) {
            form.style.animation = 'shake 0.5s ease-in-out';
            setTimeout(() => {
                form.style.animation = '';
            }, 500);
        }
        
        // Auto hide error setelah 5 detik
        setTimeout(() => {
            errorAlert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            errorAlert.style.opacity = '0';
            errorAlert.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                if (errorAlert.parentNode) {
                    errorAlert.parentNode.removeChild(errorAlert);
                }
            }, 500);
        }, 5000);
    }

    // Animate Success Messages jika ada
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        // Auto hide success message setelah 4 detik
        setTimeout(() => {
            successAlert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            successAlert.style.opacity = '0';
            successAlert.style.transform = 'translateY(20px)';
            setTimeout(() => {
                if (successAlert.parentNode) {
                    successAlert.parentNode.removeChild(successAlert);
                }
            }, 500);
        }, 4000);
    }

    // Input Validation dengan Visual Feedback
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    
    if (emailInput) {
        emailInput.addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && emailRegex.test(this.value)) {
                this.style.borderColor = '#4caf50';
                this.style.boxShadow = '0 0 0 3px rgba(76, 175, 80, 0.1)';
            } else if (this.value) {
                this.style.borderColor = '#ff6b6b';
                this.style.boxShadow = '0 0 0 3px rgba(255, 107, 107, 0.1)';
            } else {
                this.style.borderColor = '#e1e5e9';
                this.style.boxShadow = 'none';
            }
        });
    }
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            if (this.value.length >= 6) {
                this.style.borderColor = '#4caf50';
                this.style.boxShadow = '0 0 0 3px rgba(76, 175, 80, 0.1)';
            } else if (this.value.length > 0) {
                this.style.borderColor = '#ffa726';
                this.style.boxShadow = '0 0 0 3px rgba(255, 167, 38, 0.1)';
            } else {
                this.style.borderColor = '#e1e5e9';
                this.style.boxShadow = 'none';
            }
        });
    }

    // Remember Me Animation
    const checkbox = document.querySelector('input[name="remember"]');
    if (checkbox) {
        checkbox.addEventListener('change', function() {
            const label = this.parentElement;
            if (this.checked) {
                label.style.transform = 'scale(1.05)';
                label.style.color = '#667eea';
            } else {
                label.style.transform = 'scale(1)';
                label.style.color = '#666';
            }
            
            setTimeout(() => {
                label.style.transform = 'scale(1)';
            }, 200);
        });
    }

    // Link Hover Animations
    const registerLink = document.querySelector('a[href*="register"]');
    if (registerLink) {
        registerLink.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        registerLink.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }

    // Add ripple effect untuk button
    if (submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.4);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    }
});

// Utility Functions
function showLoading() {
    const submitBtn = document.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.classList.add('loading');
        submitBtn.textContent = 'Memproses...';
        submitBtn.disabled = true;
    }
}

function hideLoading() {
    const submitBtn = document.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.classList.remove('loading');
        submitBtn.textContent = 'Login';
        submitBtn.disabled = false;
    }
}

// Function untuk menampilkan notifikasi custom
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        color: white;
        font-weight: 500;
        opacity: 0;
        transform: translateX(100px);
        transition: all 0.3s ease;
        z-index: 1000;
        background: ${type === 'success' ? '#4caf50' : '#f44336'};
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100px)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// CSS untuk ripple effect (ditambahkan via JavaScript)
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(rippleStyle);