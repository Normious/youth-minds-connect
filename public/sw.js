// Service Worker for handling notifications
const CACHE_NAME = 'youth-minds-connect-v1';
const urlsToCache = [
    '/',
    '/css/style.css',
    '/js/script.js',
    '/favicon.ico'
];

// Install event
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('Opened cache');
                return cache.addAll(urlsToCache);
            })
    );
});

// Fetch event
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Return cached version or fetch from network
                return response || fetch(event.request);
            })
    );
});

// Push event for handling push notifications
self.addEventListener('push', event => {
    console.log('Push event received:', event);
    
    let notificationData = {
        title: 'New Message',
        body: 'You have received a new message',
        icon: '/favicon.ico',
        badge: '/favicon.ico',
        tag: 'chat-message',
        data: {
            url: '/chat'
        }
    };

    // If we have data from the push event, use it
    if (event.data) {
        try {
            const data = event.data.json();
            notificationData = {
                ...notificationData,
                ...data
            };
        } catch (error) {
            console.error('Error parsing push data:', error);
        }
    }

    const options = {
        body: notificationData.body,
        icon: notificationData.icon,
        badge: notificationData.badge,
        tag: notificationData.tag,
        data: notificationData.data,
        requireInteraction: false,
        silent: false,
        actions: [
            {
                action: 'open',
                title: 'Open Chat',
                icon: '/favicon.ico'
            },
            {
                action: 'close',
                title: 'Close',
                icon: '/favicon.ico'
            }
        ]
    };

    event.waitUntil(
        self.registration.showNotification(notificationData.title, options)
    );
});

// Notification click event
self.addEventListener('notificationclick', event => {
    console.log('Notification clicked:', event);
    
    event.notification.close();

    if (event.action === 'close') {
        return;
    }

    // Default action or 'open' action
    const urlToOpen = event.notification.data?.url || '/chat';

    event.waitUntil(
        clients.matchAll({
            type: 'window',
            includeUncontrolled: true
        }).then(windowClients => {
            // Check if there's already a window/tab open with the target URL
            for (let i = 0; i < windowClients.length; i++) {
                const client = windowClients[i];
                if (client.url.includes(urlToOpen) && 'focus' in client) {
                    // If so, just focus it
                    return client.focus();
                }
            }
            
            // If not, open a new window/tab
            if (clients.openWindow) {
                return clients.openWindow(urlToOpen);
            }
        })
    );
});

// Background sync for offline functionality
self.addEventListener('sync', event => {
    console.log('Background sync event:', event);
    
    if (event.tag === 'background-sync') {
        event.waitUntil(
            // Handle background sync tasks
            console.log('Background sync completed')
        );
    }
});
