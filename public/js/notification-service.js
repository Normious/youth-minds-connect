class NotificationService {
    constructor() {
        this.permission = 'default';
        this.isSupported = 'Notification' in window;
        this.init();
    }

    init() {
        if (!this.isSupported) {
            console.warn('Browser notifications are not supported in this browser');
            return;
        }

        this.permission = Notification.permission;
        this.requestPermission();
        this.registerServiceWorker();
    }

    async requestPermission() {
        if (this.permission === 'default') {
            try {
                this.permission = await Notification.requestPermission();
                console.log('Notification permission:', this.permission);
            } catch (error) {
                console.error('Error requesting notification permission:', error);
            }
        }
    }

    async registerServiceWorker() {
        if ('serviceWorker' in navigator) {
            try {
                const registration = await navigator.serviceWorker.register('/sw.js');
                console.log('Service Worker registered successfully:', registration);
                
                // Update service worker if needed
                registration.addEventListener('updatefound', () => {
                    const newWorker = registration.installing;
                    newWorker.addEventListener('statechange', () => {
                        if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                            // New service worker available
                            console.log('New service worker available');
                        }
                    });
                });
            } catch (error) {
                console.error('Service Worker registration failed:', error);
            }
        }
    }

    canShowNotification() {
        return this.isSupported && this.permission === 'granted';
    }

    showNotification(title, options = {}) {
        if (!this.canShowNotification()) {
            return;
        }

        // Default options
        const defaultOptions = {
            icon: '/favicon.ico',
            badge: '/favicon.ico',
            requireInteraction: false,
            silent: false,
            tag: 'chat-message',
            ...options
        };

        try {
            const notification = new Notification(title, defaultOptions);
            
            // Handle notification click
            notification.onclick = function(event) {
                event.preventDefault();
                window.focus();
                
                // If we have a URL to navigate to, do it
                if (defaultOptions.url) {
                    window.location.href = defaultOptions.url;
                }
                
                notification.close();
            };

            // Auto-close after 5 seconds if not requiring interaction
            if (!defaultOptions.requireInteraction) {
                setTimeout(() => {
                    notification.close();
                }, 5000);
            }

            return notification;
        } catch (error) {
            console.error('Error showing notification:', error);
        }
    }

    showChatMessageNotification(message, senderName, chatUrl) {
        const title = `New message from ${senderName}`;
        const options = {
            body: message.length > 100 ? message.substring(0, 100) + '...' : message,
            url: chatUrl,
            requireInteraction: false,
            silent: false,
            tag: 'chat-message',
            data: {
                type: 'chat-message',
                chatUrl: chatUrl
            }
        };

        return this.showNotification(title, options);
    }

    // Check if the page is currently visible
    isPageVisible() {
        return !document.hidden;
    }

    // Check if the user is currently on a chat page
    isOnChatPage() {
        return window.location.pathname.includes('/chat/');
    }

    // Check if the user is currently focused on the window
    isWindowFocused() {
        return document.hasFocus();
    }

    // Should show notification based on current state
    shouldShowNotification() {
        // Don't show notification if user is actively on the chat page and window is focused
        if (this.isOnChatPage() && this.isWindowFocused()) {
            return false;
        }
        
        return true;
    }
}

// Create global instance
window.notificationService = new NotificationService();

// Listen for page visibility changes
document.addEventListener('visibilitychange', () => {
    if (document.visibilityState === 'visible') {
        // Page became visible, could be used for additional logic
        console.log('Page became visible');
    }
});

// Listen for window focus/blur events
window.addEventListener('focus', () => {
    console.log('Window focused');
});

window.addEventListener('blur', () => {
    console.log('Window blurred');
});
