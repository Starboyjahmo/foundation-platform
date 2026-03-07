<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Donate - Helping Hands Foundation</title>
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
<main class="flex-grow container mx-auto py-28 px-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Donate to Helping Hands Foundation</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('donate.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg mx-auto flex flex-col gap-4">
        @csrf
        <input type="text" name="name" placeholder="Your Name" class="w-full p-2 border rounded" required>
        <input type="email" name="email" placeholder="Your Email" class="w-full p-2 border rounded" required>
        <input type="number" name="amount" placeholder="Amount (KES)" class="w-full p-2 border rounded" required>
        <select name="payment_method" class="w-full p-2 border rounded" required>
            <option value="Mpesa">Mpesa</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Cash">Cash</option>
        </select>
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Donate Now</button>
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