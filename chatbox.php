<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Chat Box</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f2ef;
        }

        /* Modal Animation */
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Chat Message Animation */
        @keyframes messageFadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Modal Styling */
        #name-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            animation: modalFadeIn 0.3s ease;
        }

        #name-modal div {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 300px;
            text-align: center;
        }

        #name-modal input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        #name-modal button {
            width: calc(100% - 22px);
            padding: 10px;
            border: none;
            background-color: #28a745; /* Green color */
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Chat Box Styling */
        #chat-box-container {
            width: 100%;
            max-width: 600px;
            height: 80vh;
            max-height: 80vh;
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        #chat-box {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            background-color: #eef3f8;
        }

        #chat-box .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            animation: messageFadeIn 0.3s ease;
        }

        #chat-box .message p {
            margin: 0;
        }

        #chat-box .message .name {
            font-weight: bold;
            color: #28a745; /* Green color */
            margin-bottom: 5px;
        }

        #chat-box .message .email {
            font-size: 0.8em;
            color: #888;
            margin-bottom: 5px;
        }

        #chat-box .message .text {
            font-size: 1em;
            color: #333;
        }

        #chat-box .message.self {
            align-self: flex-end;
            background-color: #d4edda;
        }

        #chat-input-container {
            display: flex;
            padding: 10px;
            background-color: #eef3f8;
        }

        #chat-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
            background-color: #fff;
        }

        #send-button {
            padding: 10px 15px;
            border: none;
            background-color: #28a745; /* Green color */
            color: #fff;
            border-radius: 20px;
            cursor: pointer;
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            #chat-box-container {
                height: 70vh;
            }

            #name-modal div {
                width: 80%;
            }
        }

        @media (max-width: 480px) {
            #chat-box-container {
                height: 60vh;
            }

            #name-modal div {
                width: 90%;
            }

            #chat-input-container {
                flex-direction: column;
                padding: 5px;
            }

            #send-button {
                width: calc(100% - 22px);
                margin-left: 0;
                margin-top: 5px;
                border-radius: 10px;
            }

            #chat-input {
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <!-- Modal for User Name and Email -->
    <div id="name-modal">
        <div>
            <h2>Welcome to the Student Chat Box!</h2>
            <input type="text" id="name-input" placeholder="Your name">
            <input type="email" id="email-input" placeholder="Your email">
            <button id="name-submit">Submit</button>
        </div>
    </div>

    <div id="chat-box-container">
        <div id="chat-box"></div>
        <div id="chat-input-container">
            <input type="text" id="chat-input" placeholder="Type your message...">
            <button id="send-button">Send</button>
        </div>
    </div>

    <script>
        
    let userName = '';
    let userEmail = '';
    
    // Function to fetch messages periodically
    function fetchMessagesPeriodically() {
        fetchMessages(); // Fetch messages initially
        setInterval(fetchMessages, 5000); // Fetch messages every 5 seconds (adjust interval as needed)
    }

    document.getElementById('name-submit').addEventListener('click', function() {
        userName = document.getElementById('name-input').value.trim();
        userEmail = document.getElementById('email-input').value.trim();
        if (userName && userEmail) {
            document.getElementById('name-modal').style.animation = 'modalFadeIn 0.3s ease forwards';
            setTimeout(function() {
                document.getElementById('name-modal').style.display = 'none';
            }, 300);
            fetchMessagesPeriodically(); // Start periodic fetching of messages
        } else {
            alert('Please enter both your name and email.');
        }
    });

    document.getElementById('send-button').addEventListener('click', sendMessage);
    document.getElementById('chat-input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    function sendMessage() {
        var chatBox = document.getElementById('chat-box');
        var input = document.getElementById('chat-input');
        var message = input.value.trim();

        if (message !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_message.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    input.value = '';
                    fetchMessages(); // Fetch messages after sending new message
                }
            };
            xhr.send("name=" + encodeURIComponent(userName) + "&email=" + encodeURIComponent(userEmail) + "&message=" + encodeURIComponent(message));
        }
    }

    function fetchMessages() {
        var chatBox = document.getElementById('chat-box');
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_messages.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                chatBox.innerHTML = '';
                var messages = JSON.parse(xhr.responseText);
                for (var i = 0; i < messages.length; i++) {
                    var messageElement = document.createElement('div');
                    messageElement.className = 'message';
                    if (messages[i].name === userName && messages[i].email === userEmail) {
                        messageElement.classList.add('self');
                    }
                    var nameElement = document.createElement('p');
                    nameElement.className = 'name';
                    nameElement.textContent = messages[i].name;

                    var emailElement = document.createElement('p');
                    emailElement.className = 'email';
                    emailElement.textContent = messages[i].email;

                    var textElement = document.createElement('p');
                    textElement.className = 'text';
                    textElement.textContent = messages[i].message;

                    messageElement.appendChild(nameElement);
                    messageElement.appendChild(emailElement);
                    messageElement.appendChild(textElement);
                    chatBox.appendChild(messageElement);
                }
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        };
        xhr.send();
    }

    // Ensure the modal appears when the page loads
    window.onload = function() {
        document.getElementById('name-modal').style.display = 'flex';
    };


    </script>
</body>
</html>
