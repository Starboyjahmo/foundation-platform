<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Helping Hands Foundation</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-50 font-sans">

<!-- NAVBAR -->
<header class="bg-blue-900 text-white fixed w-full z-50 shadow">

<div class="max-w-7xl mx-auto flex justify-between items-center p-4">

<h1 class="text-xl font-bold">Helping Hands Foundation</h1>

<!-- Desktop Menu -->
<nav class="hidden md:flex space-x-8 font-medium">

<a href="/" class="hover:text-gray-300 transition">Home</a>

<a href="/events" class="hover:text-gray-300 transition">Events</a>

<a href="/donate" class="hover:text-gray-300 transition">Donate</a>

<a href="/chat" class="hover:text-gray-300 transition">Live Chat</a>

<a href="/about" class="hover:text-gray-300 transition">About Us</a>

</nav>

<!-- Mobile Button -->
<button id="menu-btn" class="md:hidden text-2xl">
☰
</button>

</div>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden bg-blue-800 text-center py-4 space-y-4">

<a href="/" class="block hover:text-gray-300">Home</a>

<a href="/events" class="block hover:text-gray-300">Events</a>

<a href="/donate" class="block hover:text-gray-300">Donate</a>

<a href="/chat" class="block hover:text-gray-300">Live Chat</a>

<a href="/about" class="block hover:text-gray-300">About Us</a>

</div>

</header>


<!-- HERO -->
<section class="pt-32 pb-24 bg-gradient-to-r from-blue-600 to-blue-500 text-white text-center px-6">

<h1 class="text-4xl md:text-5xl font-bold mb-6">

Support Communities & Change Lives

</h1>

<p class="max-w-2xl mx-auto mb-8 text-lg">

Join our foundation to support communities through charity events,
donations, and volunteering opportunities.

</p>

<a href="/donate"
class="bg-green-500 hover:bg-green-600 px-8 py-3 rounded-lg font-semibold transition transform hover:scale-105">

Donate Now

</a>

</section>


<!-- ABOUT -->
<section class="max-w-6xl mx-auto py-20 px-6 text-center">

<h2 class="text-3xl font-bold mb-6">

About Our Foundation

</h2>

<p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">

Helping Hands Foundation is committed to supporting communities through
charity programs, fundraising events, and volunteer initiatives.
Together we can make a difference in people's lives.

</p>

</section>


<!-- UPCOMING EVENTS -->
<section class="bg-gray-100 py-20 px-6">

<div class="max-w-6xl mx-auto">

<h2 class="text-3xl font-bold text-center mb-12">

Upcoming Events

</h2>

<div class="grid md:grid-cols-3 gap-8">

@if($events->count() > 0)

@foreach($events as $event)

<div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transform transition duration-300">

@if($event->image)

<img src="{{ $event->image }}" class="w-full h-48 object-cover">

@endif

<div class="p-6">

<h3 class="text-xl font-semibold mb-2">

{{ $event->title }}

</h3>

<p class="text-gray-600">

<strong>Location:</strong> {{ $event->location }}

</p>

<p class="text-gray-600">

<strong>Date:</strong> {{ $event->event_date }}

</p>

<p class="text-gray-700 mt-2">

{{ $event->description }}

</p>

</div>

</div>

@endforeach

@else

<p class="text-center text-gray-500 col-span-3">

No events available at the moment.

</p>

@endif

</div>

</div>

</section>


<!-- IMPACT -->
<section class="max-w-6xl mx-auto py-20 px-6 text-center">

<h2 class="text-3xl font-bold mb-12">

Our Impact

</h2>

<div class="grid md:grid-cols-3 gap-8">


<!-- Donation Target -->

<div class="bg-white p-10 rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition">

<h3 class="text-4xl font-bold text-green-600">

KSh 500,000

</h3>

<p class="text-gray-600 mt-2">

Donation Target

</p>

</div>


<!-- Followers -->

<div class="bg-white p-10 rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition">

<h3 class="text-4xl font-bold text-blue-600">

40,000

</h3>

<p class="text-gray-600 mt-2">

Community Followers

</p>

</div>


<!-- Events Hosted -->

<div class="bg-white p-10 rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition">

<h3 class="text-4xl font-bold text-purple-600">

{{ $totalEvents }}

</h3>

<p class="text-gray-600 mt-2">

Events Hosted

</p>

</div>

</div>

</section>


<!-- JOIN SECTION -->
<section class="bg-blue-50 py-20 text-center px-6">

<h2 class="text-3xl font-bold mb-6">

Join Our Community

</h2>

<p class="text-gray-700 max-w-2xl mx-auto mb-8">

Become a volunteer or supporter and help us bring positive change
to communities.

</p>

<a href="/register"
class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transform hover:scale-105 transition">

Join the Foundation

</a>

</section>


<!-- FOOTER -->
<footer class="bg-blue-900 text-white py-8 text-center">

<p class="mb-2">

© 2026 Helping Hands Foundation

</p>

<p>

Email: support@foundation.org | Phone: +254 700 000 000

</p>

</footer>


<!-- MOBILE MENU SCRIPT -->
<script>

const btn = document.getElementById("menu-btn");
const menu = document.getElementById("mobile-menu");

btn.addEventListener("click", () => {

menu.classList.toggle("hidden");

});

</script>


</body>
</html>