# Browser Notifications for Chat Messages

This feature adds browser notifications to the Youth Minds Connect application, allowing users to receive real-time notifications when they receive new chat messages.

## Features

### 1. Real-time Notifications
- Receive notifications when new messages arrive
- Works even when the browser tab is not active
- Shows sender name and message preview
- Click notifications to open the chat

### 2. Smart Notification Logic
- Only shows notifications for messages from other users
- Doesn't show notifications when actively chatting (user is on chat page and window is focused)
- Respects user's notification preferences

### 3. User-Friendly Setup
- Notification banner encourages users to enable notifications
- Settings page allows users to manage notification preferences
- Test notification feature to verify settings
- Clear instructions for enabling notifications

### 4. Service Worker Support
- Handles notifications when app is not active
- Provides offline functionality
- Manages notification clicks and actions

## Files Added/Modified

### New Files
- `public/js/notification-service.js` - Core notification service
- `public/js/global-notifications.js` - Global notification handler
- `public/sw.js` - Service worker for background notifications
- `resources/views/components/notification-settings.blade.php` - Settings component
- `resources/views/components/notification-banner.blade.php` - Notification banner
- `NOTIFICATIONS.md` - This documentation

### Modified Files
- `app/Models/Dialogue.php` - Added user relationship
- `app/Events/ChatMessageSent.php` - Added user data to broadcast
- `resources/views/layouts/app.blade.php` - Added meta tags and scripts
- `resources/views/chat/show.blade.php` - Integrated notifications
- `resources/views/chat.blade.php` - Integrated notifications
- `resources/views/profile/edit.blade.php` - Added notification settings

## How It Works

### 1. Permission Request
- Users are prompted to enable notifications via a banner
- Permission is requested using the browser's Notification API
- Users can manage settings in their profile page

### 2. Message Detection
- Real-time chat messages are detected using Laravel Echo and Pusher
- The system checks if the message is from another user
- Notifications are only shown when appropriate

### 3. Notification Display
- Browser notifications show sender name and message preview
- Clicking notifications opens the relevant chat
- Notifications auto-dismiss after 5 seconds

### 4. Background Handling
- Service worker handles notifications when app is not active
- Provides offline functionality and caching
- Manages notification interactions

## Browser Support

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Limited support (requires HTTPS)
- **Mobile browsers**: Varies by platform

## Security Considerations

- Notifications only work over HTTPS (required by browsers)
- User permission is required before showing notifications
- No sensitive data is included in notifications
- Service worker is properly scoped and secured

## Usage

### For Users
1. Visit any page on the site
2. Click "Enable" in the notification banner
3. Allow notifications when prompted by your browser
4. Receive notifications for new messages
5. Manage settings in your profile page

### For Developers
1. The notification service is automatically loaded for authenticated users
2. Notifications are integrated into existing chat functionality
3. No additional setup required
4. Service worker is automatically registered

## Testing

1. Enable notifications in your browser
2. Open the chat page
3. Send a message from another user/account
4. Verify notification appears
5. Test notification click functionality
6. Test settings page functionality

## Troubleshooting

### Notifications not working?
- Check browser permissions
- Ensure you're on HTTPS
- Check browser console for errors
- Verify Pusher/Echo connection

### Service worker issues?
- Check browser console for registration errors
- Clear browser cache and reload
- Check HTTPS requirement

### Permission denied?
- Users can reset permissions in browser settings
- Instructions are provided in the settings page
- Banner will show appropriate guidance
