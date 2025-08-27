// Global notification handler for chat messages
// This script should be included on all pages to handle notifications when user is not on chat pages

class GlobalNotificationHandler {
    constructor() {
        this.userId = null;
        this.init();
    }

    init() {
        // Get user ID from meta tag or data attribute
        const userIdMeta = document.querySelector('meta[name="user-id"]');
        if (userIdMeta) {
            this.userId = parseInt(userIdMeta.getAttribute('content'));
        }

        // Initialize notification service if not already done
        if (!window.notificationService) {
            // Load notification service if not already loaded
            const script = document.createElement('script');
            script.src = '/js/notification-service.js';
            script.onload = () => {
                this.setupGlobalListeners();
            };
            document.head.appendChild(script);
        } else {
            this.setupGlobalListeners();
        }
    }

    setupGlobalListeners() {
        // Listen for all chat channels the user might be part of
        // This is a simplified approach - in a real app, you'd need to know which chats the user is part of
        if (typeof Echo !== 'undefined' && this.userId) {
            // Listen to a general user channel for notifications
            Echo.private(`user.${this.userId}`)
                .listen('\\App\\Events\\ChatMessageSent', (e) => {
                    this.handleChatMessage(e);
                })
                .error((error) => {
                    console.error('Global notification channel error:', error);
                });
        }
    }

    handleChatMessage(e) {
        // Only show notification if message is from someone else
        if (e.user_id !== this.userId && window.notificationService) {
            const senderName = e.user ? e.user.name : 'Someone';
            const chatUrl = `/chat/${e.chat_id}`;
            
            window.notificationService.showChatMessageNotification(
                e.content,
                senderName,
                chatUrl
            );
        }
    }
}

// Initialize global notification handler when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Only initialize if user is authenticated
    const isAuthenticated = document.querySelector('meta[name="authenticated"]');
    if (isAuthenticated && isAuthenticated.getAttribute('content') === 'true') {
        window.globalNotificationHandler = new GlobalNotificationHandler();
    }
});
