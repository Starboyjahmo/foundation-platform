<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upcoming Events - Helping Hands Foundation</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans flex flex-col min-h-screen">

<!-- NAVBAR -->
<header class="bg-blue-900 text-white shadow-md fixed w-full z-50">
  <div class="container mx-auto flex justify-between items-center p-4">
    <div class="text-xl font-bold">Helping Hands Foundation</div>

    <!-- Desktop Menu -->
    <nav class="hidden md:flex space-x-8 font-medium">
      <a href="/" class="hover:text-gray-300 transition">Home</a>
      <a href="/events" class="hover:text-gray-300 transition">Events</a>
      <a href="/donate" class="hover:text-gray-300 transition">Donate</a>
      <a href="/chat" class="hover:text-gray-300 transition">Live Chat</a>
      <a href="/about" class="hover:text-gray-300 transition">About Us</a>
    </nav>

    <!-- Mobile Menu Button -->
    <button id="menu-btn" class="md:hidden text-2xl">☰</button>
  </div>

  <!-- Mobile Menu -->
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
    <h1 class="text-3xl font-bold mb-6 text-center">Upcoming Events</h1>
    <div class="grid md:grid-cols-3 gap-6">
        @forelse($events as $event)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transform transition duration-300">
            @if($event->image)
            <img src="{{ $event->image }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                <p class="text-gray-600 mb-1"><strong>Location:</strong> {{ $event->location }}</p>
                <p class="text-gray-600 mb-1"><strong>Date:</strong> {{ $event->event_date }}</p>
                <p class="text-gray-700 mt-2">{{ $event->description }}</p>
                
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500 col-span-3">No events available at the moment.</p>
        @endforelse
    </div>
    <!-- Coming Soon Card 1 -->

    
   <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transform transition duration-300"> <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-xl font-semibold"> Coming Soon </div> <div class="p-6"> <h2 class="text-xl font-semibold mb-2">Community Outreach Program</h2> <p class="text-gray-600 mb-1"><strong>Location:</strong> To be announced</p> <p class="text-gray-600 mb-1"><strong>Date:</strong> Coming Soon</p> <p class="text-gray-700 mt-2">A new outreach initiative aimed at supporting local communities will be announced soon.</p> </div> </div>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transform transition duration-300"> <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-xl font-semibold"> Coming Soon </div> <div class="p-6"> <h2 class="text-xl font-semibold mb-2">Community Outreach Program</h2> <p class="text-gray-600 mb-1"><strong>Location:</strong> To be announced</p> <p class="text-gray-600 mb-1"><strong>Date:</strong> Coming Soon</p> <p class="text-gray-700 mt-2">A new outreach initiative aimed at supporting local communities will be announced soon.</p> </div> </div>
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