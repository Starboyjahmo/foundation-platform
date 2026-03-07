<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - Helping Hands Foundation</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-green-600 text-white">
<div class="max-w-7xl mx-auto px-4">

<div class="flex justify-between items-center py-4">

<h1 class="text-xl font-bold">Helping Hands Foundation</h1>

<!-- Mobile Menu Button -->
<button id="menu-btn" class="md:hidden text-2xl">
☰
</button>

<!-- Desktop Menu -->
<ul class="hidden md:flex space-x-8 font-medium mx-auto">
<li><a href="/" class="hover:text-gray-200 transition">Home</a></li>
<li><a href="/events" class="hover:text-gray-200 transition">Events</a></li>
<li><a href="/dashboard" class="hover:text-gray-200 transition">Dashboard</a></li>
<li><a href="/donate" class="hover:text-gray-200 transition">Donate</a></li>
<li><a href="/chat" class="hover:text-gray-200 transition">Live Chat</a></li>
</ul>

</div>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden pb-4">
<a href="/" class="block py-2">Home</a>
<a href="/events" class="block py-2">Events</a>
<a href="/dashboard" class="block py-2">Dashboard</a>
<a href="/donate" class="block py-2">Donate</a>
<a href="/chat" class="block py-2">Live Chat</a>
</div>

</div>
</nav>

<div class="max-w-7xl mx-auto p-6">

<!-- DASHBOARD TITLE -->
<h2 class="text-3xl font-bold mb-8 text-gray-700">
Admin Dashboard
</h2>

<!-- STATS CARDS -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

<div class="bg-green-500 text-white p-6 rounded-xl shadow hover:scale-105 transition">
<h3 class="text-lg font-semibold">Members</h3>
<p class="text-3xl font-bold mt-2">{{ $totalMembers }}</p>
</div>

<div class="bg-blue-500 text-white p-6 rounded-xl shadow hover:scale-105 transition">
<h3 class="text-lg font-semibold">Total Donations</h3>
<p class="text-3xl font-bold mt-2">
KES {{ number_format($totalDonations) }}
</p>
</div>

<div class="bg-yellow-500 text-white p-6 rounded-xl shadow hover:scale-105 transition">
<h3 class="text-lg font-semibold">Events</h3>
<p class="text-3xl font-bold mt-2">{{ $totalEvents }}</p>
</div>

</div>


<!-- DONATION GRAPH -->
<div class="bg-white p-6 rounded-xl shadow mb-10">

<h2 class="text-xl font-bold mb-4 text-gray-700">
Donations Overview
</h2>

<canvas id="donationChart" height="100"></canvas>

</div>


<!-- RECENT DONATIONS -->
<div class="bg-white p-6 rounded-xl shadow">

<h2 class="text-xl font-bold mb-4 text-gray-700">
Recent Donations
</h2>

<div class="overflow-x-auto">

<table class="min-w-full">

<thead class="bg-gray-100">

<tr>
<th class="p-3 text-left">Name</th>
<th class="p-3 text-left">Email</th>
<th class="p-3 text-left">Amount</th>
<th class="p-3 text-left">Method</th>
<th class="p-3 text-left">Status</th>
</tr>

</thead>

<tbody>

@foreach($recentDonations as $donation)

<tr class="border-b">

<td class="p-3">{{ $donation->name }}</td>

<td class="p-3">{{ $donation->email }}</td>

<td class="p-3">
KES {{ number_format($donation->amount) }}
</td>

<td class="p-3">
{{ $donation->payment_method }}
</td>

<td class="p-3">

<span class="px-3 py-1 rounded-full text-sm
@if($donation->status == 'completed')
bg-green-200 text-green-800
@else
bg-yellow-200 text-yellow-800
@endif
">

{{ $donation->status }}

</span>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>


<!-- MOBILE MENU SCRIPT -->
<script>

document.getElementById('menu-btn')
.addEventListener('click', function(){

document.getElementById('mobile-menu')
.classList.toggle('hidden');

});

</script>


<!-- DONATION CHART -->
<script>

const ctx = document.getElementById('donationChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: [

@foreach($donationsByMonth as $d)

'Month {{ $d->month }}',

@endforeach

],

datasets: [{

label: 'Donations (KES)',

data: [

@foreach($donationsByMonth as $d)

{{ $d->total }},

@endforeach

],

backgroundColor: '#16a34a'

}]

},

options: {

responsive: true,

plugins: {

legend: {

display: false

}

}

}

});

</script>

</body>
</html>