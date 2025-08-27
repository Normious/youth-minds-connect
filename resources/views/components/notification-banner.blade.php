@auth
    <div id="notification-banner" class="fixed bottom-4 right-4 bg-blue-500 text-white p-4 rounded-lg shadow-lg max-w-sm z-50" style="display: none;">
        <div class="flex items-start space-x-3">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-sm font-medium">Stay Connected</h3>
                <p class="text-xs mt-1 opacity-90">
                    Enable notifications to get instant alerts when you receive new messages.
                </p>
                <div class="flex space-x-2 mt-3">
                    <button 
                        id="enable-notifications-btn"
                        class="bg-white text-blue-500 px-3 py-1 rounded text-xs font-medium hover:bg-gray-100 transition duration-150 ease-in-out"
                    >
                        Enable
                    </button>
                    <button 
                        id="dismiss-banner-btn"
                        class="text-white opacity-75 hover:opacity-100 text-xs transition duration-150 ease-in-out"
                    >
                        Dismiss
                    </button>
                </div>
            </div>
            <button 
                id="close-banner-btn"
                class="flex-shrink-0 text-white opacity-75 hover:opacity-100 transition duration-150 ease-in-out"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const banner = document.getElementById('notification-banner');
        const enableBtn = document.getElementById('enable-notifications-btn');
        const dismissBtn = document.getElementById('dismiss-banner-btn');
        const closeBtn = document.getElementById('close-banner-btn');

        // Check if banner should be shown
        function shouldShowBanner() {
            // Don't show if notifications are already enabled or denied
            if (Notification.permission !== 'default') {
                return false;
            }

            // Don't show if user has dismissed it before
            if (localStorage.getItem('notification-banner-dismissed')) {
                return false;
            }

            // Don't show on chat pages (users are already engaged)
            if (window.location.pathname.includes('/chat/')) {
                return false;
            }

            return true;
        }

        function showBanner() {
            if (shouldShowBanner()) {
                banner.style.display = 'block';
                
                // Auto-hide after 10 seconds
                setTimeout(() => {
                    hideBanner();
                }, 10000);
            }
        }

        function hideBanner() {
            banner.style.display = 'none';
        }

        function dismissBanner() {
            hideBanner();
            localStorage.setItem('notification-banner-dismissed', 'true');
        }

        // Event listeners
        enableBtn.addEventListener('click', async function() {
            try {
                const permission = await Notification.requestPermission();
                if (permission === 'granted') {
                    hideBanner();
                    // Show success message
                    if (window.notificationService) {
                        window.notificationService.showNotification(
                            'Notifications Enabled',
                            {
                                body: 'You will now receive notifications for new messages!',
                                icon: '/favicon.ico'
                            }
                        );
                    }
                }
            } catch (error) {
                console.error('Error requesting notification permission:', error);
            }
        });

        dismissBtn.addEventListener('click', dismissBanner);
        closeBtn.addEventListener('click', dismissBanner);

        // Show banner after a delay
        setTimeout(showBanner, 3000);
    });
    </script>
@endauth
