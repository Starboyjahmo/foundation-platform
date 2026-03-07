<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Chat - Helping Hands Foundation</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">

<!-- NAVBAR -->
<header class="bg-blue-900 text-white shadow-md fixed w-full z-50">
  <div class="container mx-auto flex justify-between items-center p-4">
    <div class="text-xl font-bold">Helping Hands Foundation</div>
    <nav class="hidden md:flex space-x-8 font-medium">
      <a href="/" class="hover:text-gray-300 transition">Home</a>
      <a href="/events" class="hover:text-gray-300 transition">Events</a>
      <a href="/donate" class="hover:text-gray-300 transition">Donate</a>
      <a href="/chat" class="hover:text-gray-300 transition">Live Chat</a>
      <a href="/about" class="hover:text-gray-300 transition">About Us</a>
    </nav>
    <button id="menu-btn" class="md:hidden text-2xl">☰</button>
  </div>

  <div id="mobile-menu" class="hidden md:hidden bg-blue-800 text-center py-4 space-y-4">
    <a href="/" class="block hover:text-gray-300 transition">Home</a>
    <a href="/events" class="block hover:text-gray-300 transition">Events</a>
    <a href="/donate" class="block hover:text-gray-300 transition">Donate</a>
    <a href="/chat" class="block hover:text-gray-300 transition">Live Chat</a>
    <a href="/about" class="block hover:text-gray-300 transition">About Us</a>
  </div>
</header>

<!-- MAIN CONTENT -->
<main class="flex-grow max-w-2xl mx-auto py-28 px-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Live Chat</h1>

    <div class="bg-white p-4 rounded shadow h-96 overflow-y-scroll mb-6">
        @foreach($messages->reverse() as $msg)
            <p><strong>{{ $msg->user_name }}:</strong> {{ $msg->message }}</p>
        @endforeach
    </div>

    <form action="{{ route('chat.store') }}" method="POST" class="flex flex-col gap-4 md:flex-row">
        @csrf
        <input type="text" name="user_name" placeholder="Your name" class="flex-1 p-2 border rounded" required>
        <input type="text" name="message" placeholder="Message" class="flex-1 p-2 border rounded" required>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Send</button>
    </form>
</main>

<!-- FOOTER -->
<footer class="bg-blue-900 text-white py-8 text-center">
  <p class="mb-2">© 2026 Helping Hands Foundation</p>
  <p>Email: support@foundation.org | Phone: +254 700 000 000</p>
</footer>

<script>
const btn = document.getElementById('menu-btn');
const menu = document.getElementById('mobile-menu');
btn.addEventListener('click', () => {
  menu.classList.toggle('hidden');
});
</script>

</body>
</html>