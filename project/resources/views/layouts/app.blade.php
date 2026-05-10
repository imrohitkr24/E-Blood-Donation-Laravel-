<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Blood Donation System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* E-RaktKosh maroon palette */
        .bg-maroon { background-color: #a71d2a !important; }
        .text-maroon { color: #a71d2a !important; }
        .btn-maroon { background-color: #a71d2a; color: white; border: none; }
        .btn-maroon:hover { background-color: #881520; color: white; }
        
        /* Navbar enhancements */
        .navbar-brand { font-weight: bold; color: #ffffff !important; font-size: 1.5rem; }
        .nav-link { color: rgba(255, 255, 255, 0.9) !important; font-weight: 500; }
        .nav-link:hover { color: #ffffff !important; text-decoration: underline; }
        
        .footer { background-color: #343a40; color: white; padding: 20px 0; margin-top: auto; }
        .shadow-soft { box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-maroon shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <span class="fs-3 me-2">🩸</span> 
                <span>E-Blood Donation</span>
            </a>
            <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item"><a class="nav-link px-3" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-outline-light ms-2 rounded-pill px-4" href="{{ route('register') }}">Join as Donor</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link px-3" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light rounded-pill px-4 border-0">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-5 flex-grow-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} E-Blood Donation System (e-RaktKosh Inspired). Built for saving lives.</p>
        </div>
    </footer>

    <!-- Chatbot Widget -->
    <div id="chatbot-widget" class="position-fixed bottom-0 end-0 m-4 shadow-lg rounded-4 overflow-hidden transition-effect" style="width: 350px; z-index: 1050; display: none; background: #fff; border: 1px solid #ddd;">
        <div class="bg-maroon text-white p-3 d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">🩸 BloodBot</h6>
            <button id="close-chat" class="btn-close btn-close-white" aria-label="Close"></button>
        </div>
        <div id="chat-messages" class="p-3 bg-light" style="height: 300px; overflow-y: auto; font-size: 0.9rem;">
            <div class="mb-2 text-start">
                <span class="d-inline-block bg-white text-dark p-2 rounded-3 shadow-sm">Hello! I am BloodBot. How can I help you today?</span>
            </div>
            <div class="mb-2 text-start">
                <span class="d-inline-block bg-white text-dark p-2 rounded-3 shadow-sm border" style="font-size:0.85rem;">
                    <strong>Try asking:</strong><br>
                    - What are the advantages of donating?<br>
                    - Who can donate blood?<br>
                    - How often can I donate?
                </span>
            </div>
        </div>
        <div class="p-2 bg-white border-top">
            <div class="input-group">
                <input type="text" id="chat-input" class="form-control border-secondary" placeholder="Type a message..." aria-label="Type a message">
                <button class="btn btn-maroon" type="button" id="send-chat">Send</button>
            </div>
        </div>
    </div>
    
    <button id="chatbot-toggle" class="btn btn-maroon rounded-circle position-fixed bottom-0 end-0 m-4 shadow-lg d-flex align-items-center justify-content-center transition-effect" style="width: 60px; height: 60px; z-index: 1049;" title="Chat with BloodBot">
        <span class="fs-3">💬</span>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chatbot Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatToggle = document.getElementById('chatbot-toggle');
            const chatWidget = document.getElementById('chatbot-widget');
            const closeChat = document.getElementById('close-chat');
            const chatInput = document.getElementById('chat-input');
            const sendChat = document.getElementById('send-chat');
            const chatMessages = document.getElementById('chat-messages');

            chatToggle.addEventListener('click', () => {
                chatWidget.style.display = 'block';
                chatToggle.style.display = 'none';
            });

            closeChat.addEventListener('click', () => {
                chatWidget.style.display = 'none';
                chatToggle.style.display = 'flex';
            });

            function appendMessage(text, sender) {
                const align = sender === 'user' ? 'text-end' : 'text-start';
                const bg = sender === 'user' ? 'bg-maroon text-white' : 'bg-white text-dark border';
                const html = `<div class="mb-2 ${align}"><span class="d-inline-block p-2 rounded-3 shadow-sm ${bg}">${text}</span></div>`;
                chatMessages.insertAdjacentHTML('beforeend', html);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function getBotResponse(input) {
                const text = input.toLowerCase();
                if (text.includes('advantage') || text.includes('benefit') || text.includes('why donate') || text.includes('advantages')) {
                    return "Blood donation reduces the risk of heart disease, burns calories, provides a free health screening, and most importantly, saves lives!";
                } else if (text.includes('who can') || text.includes('eligible') || text.includes('age')) {
                    return "Generally, anyone aged 18-65 weighing over 45kg and in good health can donate blood.";
                } else if (text.includes('how often') || text.includes('when can') || text.includes('frequency')) {
                    return "You can donate whole blood every 3 months (90 days) for men, and every 4 months (120 days) for women.";
                } else if (text.includes('safe') || text.includes('hurt') || text.includes('pain')) {
                    return "Yes, blood donation is completely safe. Sterile, single-use equipment is used for each donor, so there is no risk of infection.";
                } else if (text.includes('hello') || text.includes('hi') || text.includes('hey')) {
                    return "Hi there! Feel free to ask me anything about blood donation.";
                } else {
                    return "I'm a simple bot. You can ask me about advantages of donation, eligibility, frequency, or safety.";
                }
            }

            function handleSend() {
                const text = chatInput.value.trim();
                if (text) {
                    appendMessage(text, 'user');
                    chatInput.value = '';
                    setTimeout(() => {
                        appendMessage(getBotResponse(text), 'bot');
                    }, 500);
                }
            }

            sendChat.addEventListener('click', handleSend);
            chatInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') handleSend();
            });
        });
    </script>
</body>
</html>
