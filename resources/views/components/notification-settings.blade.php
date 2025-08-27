<div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
        Browser Notifications
    </h3>
    
    <div class="space-y-4">
        <!-- Notification Status -->
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Chat Message Notifications
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Receive notifications when you get new messages
                </p>
            </div>
            <div class="flex items-center space-x-3">
                <span id="notification-status" class="text-sm text-gray-500 dark:text-gray-400">
                    Checking...
                </span>
                <button 
                    id="notification-toggle" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed"
                    style="display: none;"
                >
                    Enable Notifications
                </button>
            </div>
        </div>

        <!-- Notification Instructions -->
        <div id="notification-instructions" class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-md p-4" style="display: none;">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">
                        Enable Browser Notifications
                    </h3>
                    <div class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                        <p>To receive notifications for new messages, please:</p>
                        <ol class="list-decimal list-inside mt-1 space-y-1">
                            <li>Click the "Enable Notifications" button above</li>
                            <li>Allow notifications when prompted by your browser</li>
                            <li>You'll receive notifications even when not on the chat page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Notification -->
        <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
            <button 
                id="test-notification" 
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed"
                disabled
            >
                Test Notification
            </button>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Send a test notification to verify your settings
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusElement = document.getElementById('notification-status');
    const toggleButton = document.getElementById('notification-toggle');
    const instructionsDiv = document.getElementById('notification-instructions');
    const testButton = document.getElementById('test-notification');

    function updateNotificationStatus() {
        if (!('Notification' in window)) {
            statusElement.textContent = 'Not supported';
            statusElement.className = 'text-sm text-red-500 dark:text-red-400';
            return;
        }

        switch (Notification.permission) {
            case 'granted':
                statusElement.textContent = 'Enabled';
                statusElement.className = 'text-sm text-green-500 dark:text-green-400';
                toggleButton.style.display = 'none';
                instructionsDiv.style.display = 'none';
                testButton.disabled = false;
                break;
            case 'denied':
                statusElement.textContent = 'Blocked';
                statusElement.className = 'text-sm text-red-500 dark:text-red-400';
                toggleButton.textContent = 'Reset Permissions';
                toggleButton.style.display = 'inline-block';
                instructionsDiv.style.display = 'block';
                testButton.disabled = true;
                break;
            case 'default':
                statusElement.textContent = 'Not enabled';
                statusElement.className = 'text-sm text-yellow-500 dark:text-yellow-400';
                toggleButton.textContent = 'Enable Notifications';
                toggleButton.style.display = 'inline-block';
                instructionsDiv.style.display = 'block';
                testButton.disabled = true;
                break;
        }
    }

    toggleButton.addEventListener('click', async function() {
        if (Notification.permission === 'denied') {
            // Show instructions for resetting permissions
            alert('To enable notifications, please:\n\n1. Click the lock/info icon in your browser\'s address bar\n2. Find "Notifications" in the site settings\n3. Change it from "Block" to "Allow"\n4. Refresh this page');
            return;
        }

        try {
            const permission = await Notification.requestPermission();
            updateNotificationStatus();
        } catch (error) {
            console.error('Error requesting notification permission:', error);
        }
    });

    testButton.addEventListener('click', function() {
        if (window.notificationService && window.notificationService.canShowNotification()) {
            window.notificationService.showNotification(
                'Test Notification',
                {
                    body: 'This is a test notification to verify your settings are working correctly.',
                    icon: '/favicon.ico',
                    tag: 'test-notification'
                }
            );
        }
    });

    // Initial status check
    updateNotificationStatus();
});
</script>
