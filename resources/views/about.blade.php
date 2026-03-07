<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About Us - Helping Hands Foundation</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-50 font-sans">


<!-- NAVBAR -->

<header class="bg-blue-900 text-white fixed w-full z-50 shadow">

<div class="max-w-7xl mx-auto flex justify-between items-center p-4">

<h1 class="text-xl font-bold">Helping Hands Foundation</h1>

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

<a href="/" class="block hover:text-gray-300">Home</a>

<a href="/events" class="block hover:text-gray-300">Events</a>

<a href="/donate" class="block hover:text-gray-300">Donate</a>

<a href="/chat" class="block hover:text-gray-300">Live Chat</a>

<a href="/about" class="block hover:text-gray-300">About Us</a>

</div>

</header>


<!-- HERO -->

<section class="pt-32 pb-20 bg-gradient-to-r from-blue-600 to-blue-500 text-white text-center px-6">

<h1 class="text-4xl md:text-5xl font-bold mb-4">

About Helping Hands Foundation

</h1>

<p class="max-w-2xl mx-auto text-lg">

Working together to support communities and create lasting change.

</p>

</section>


<!-- ABOUT FOUNDATION -->

<section class="max-w-6xl mx-auto py-20 px-6">

<div class="grid md:grid-cols-2 gap-12 items-center">

<div>

<h2 class="text-3xl font-bold mb-6">

Who We Are

</h2>

<p class="text-gray-700 leading-relaxed mb-4">

Helping Hands Foundation is a community-driven non-profit organization dedicated
to improving lives through charity work, community outreach programs, and
volunteer initiatives.

</p>

<p class="text-gray-700 leading-relaxed">

Our mission is to bring people together to support those in need through
donations, education programs, and local community events.

</p>

</div>

<div>

<img src="https://images.unsplash.com/photo-1593113598332-cd288d649433"
class="rounded-xl shadow-lg">

</div>

</div>

</section>


<!-- MISSION / VISION -->

<section class="bg-gray-100 py-20 px-6">

<div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">

<div class="bg-white p-10 rounded-xl shadow hover:shadow-xl transition">

<h3 class="text-2xl font-bold mb-4 text-blue-700">

Our Mission

</h3>

<p class="text-gray-700">

To support vulnerable communities by providing resources, organizing
charity events, and empowering individuals through collaboration
and community involvement.

</p>

</div>


<div class="bg-white p-10 rounded-xl shadow hover:shadow-xl transition">

<h3 class="text-2xl font-bold mb-4 text-green-600">

Our Vision

</h3>

<p class="text-gray-700">

A world where communities support each other and every individual
has access to opportunities that improve their lives.

</p>

</div>

</div>

</section>


<!-- CORE VALUES -->

<section class="max-w-6xl mx-auto py-20 px-6 text-center">

<h2 class="text-3xl font-bold mb-12">

Our Core Values

</h2>

<div class="grid md:grid-cols-3 gap-10">

<div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">

<h3 class="text-xl font-semibold mb-2 text-blue-700">

Community

</h3>

<p class="text-gray-600">

We believe strong communities create stronger futures.

</p>

</div>

<div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">

<h3 class="text-xl font-semibold mb-2 text-green-600">

Transparency

</h3>

<p class="text-gray-600">

We ensure donations and resources are used responsibly.

</p>

</div>

<div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">

<h3 class="text-xl font-semibold mb-2 text-purple-600">

Impact

</h3>

<p class="text-gray-600">

Our goal is to create meaningful change in people's lives.

</p>

</div>

</div>

</section>


<!-- CALL TO ACTION -->

<section class="bg-blue-50 py-20 text-center px-6">

<h2 class="text-3xl font-bold mb-6">

Be Part of the Change

</h2>

<p class="max-w-xl mx-auto text-gray-700 mb-8">

Support our mission by donating, volunteering, or sharing our work
with others.

</p>

<a href="/donate"
class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-lg font-semibold transition transform hover:scale-105">

Donate Now

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



<script>

const btn = document.getElementById("menu-btn");
const menu = document.getElementById("mobile-menu");

btn.addEventListener("click", () => {

menu.classList.toggle("hidden");

});

</script>


</body>
</html>