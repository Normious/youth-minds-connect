const chatInput = document.getElementById('chat-input');
const chatBox = document.getElementById('chat-box');
const sendBtn = document.getElementById('send-btn');

sendBtn.addEventListener('click', () => {
    if (!isAuthenticated) {
        alert("Please log in to send a message.");
        window.location.href = "/login";  // Redirect to the login page
        return;
    }

    const message = chatInput.value.trim();
    if (message) {
        const newMessage = document.createElement('div');
        newMessage.classList.add('chat-message');
        newMessage.innerHTML = `<strong>You:</strong> ${message}`;
        chatBox.appendChild(newMessage);
        chatInput.value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
    }
});
