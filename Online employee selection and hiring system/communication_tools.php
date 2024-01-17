<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Communication Tool Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    .dashboard {
      display: flex;
    }

    .sidebar {
      background-color: #f5f5f5;
      width: 250px;
      padding: 20px;
    }

    .compose-button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      margin-bottom: 10px;
      cursor: pointer;
    }

    .categories {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .categories li {
      padding: 10px;
      cursor: pointer;
    }

    .categories li.active {
      background-color: #ddd;
    }

    .content {
      flex: 1;
      padding: 20px;
    }

    .message {
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 10px;
    }

    .message-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
    }

    .sender {
      font-weight: bold;
    }

    .time {
      color: #777;
    }

    .message-content {
      color: #333;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <div class="sidebar">
      <button class="compose-button">Compose</button>
      <ul class="categories">
        <li class="active">Inbox (3)</li>
        <li>Sent</li>
        <li>Drafts</li>
        <li>Archive</li>
      </ul>
    </div>
    <div class="content">
      <div class="messages">
        <div class="message">
          <div class="message-header">
            <span class="sender">John Doe</span>
            <span class="time">2 hours ago</span>
          </div>
          <div class="message-content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit...
          </div>
        </div>
        <!-- More messages go here -->
      </div>
    </div>
  </div>
  <script>// JavaScript code for the communication tool dashboard

// Get DOM elements
const composeButton = document.querySelector('.compose-button');
const categories = document.querySelectorAll('.categories li');
const messages = document.querySelector('.messages');

// Event listener for the "Compose" button
composeButton.addEventListener('click', () => {
  // Simulate opening a new message composition window
  alert('Compose a new message...');
});

// Event listener for message categories
categories.forEach(category => {
  category.addEventListener('click', () => {
    // Remove the "active" class from all categories
    categories.forEach(cat => cat.classList.remove('active'));
    // Add the "active" class to the clicked category
    category.classList.add('active');

    // Simulate changing the messages based on the selected category
    messages.innerHTML = `
      <div class="message">
        <div class="message-header">
          <span class="sender">Alice Smith</span>
          <span class="time">1 hour ago</span>
        </div>
        <div class="message-content">
          Hello there, how are you?
        </div>
      </div>
      <!-- More messages go here -->
    `;
  });
});
</script>
</body>
</html>
