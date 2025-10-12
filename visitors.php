<?php
require ('config.php');

    // Fetch visitor data
    $res = $dbConnection->query("SELECT * FROM visitors ORDER BY id DESC LIMIT 1000");

    // Prepare data arrays for map and chart
    $mapData = [];
    $countryCount = [];

    foreach ($res->fetchAll() as $r) {
        // decode geo if we have it
        $country = $r['country'] ?: 'Unknown';
        $city = $r['city'] ?: '';
        $mapData[] = [
            'ip' => $r['ip_address'],
            'country' => $country,
            'city' => $city,
            'time' => $r['visit_time'],
        ];
        $countryCount[$country] = ($countryCount[$country] ?? 0) + 1;
    }

    // Fetch existing geo cache
    $geoRes = $dbConnection->query("SELECT country, city, lat, lon FROM geo_cache");
    $geoCache = [];
    foreach ($geoRes->fetchAll() as $g) {
        $key = strtolower(trim($g['country'] . ',' . $g['city']));
        $geoCache[$key] = [$g['lat'], $g['lon']];
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fiaxit . Visitors</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code:ital,wght@0,300..800;1,300..800&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <link href="https://coderthemes.com/around/assets/icons/around-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://coderthemes.com/around/assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css">
<!-- Leaflet for Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <style>
    body { background: #f8fafc; font-family: 'Segoe UI', sans-serif; }
    #map { height: 480px; border-radius: 10px; }
    .chart-container { height: 400px; }
    .navbar-brand { font-weight: bold; }
  </style>
</head>
<body >
    <main class="page-wrapper">

  

<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4">
  <div class="container-fluid">
    <span class="navbar-brand">🌐 Visitor Analytics</span>
  </div>
</nav>

<div class="container-fluid">
  <div class="row g-4">
    <!-- Map View -->
    <div class="col-lg-7">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">Global Visitor Map</div>
        <div class="card-body p-0">
          <div id="map"></div>
        </div>
      </div>
    </div>

    <!-- Chart View -->
    <div class="col-lg-5">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">Visitors per Country</div>
        <div class="card-body chart-container">
          <canvas id="countryChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Visitor Table -->
  <div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white fw-bold">Recent Visitors</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm align-middle mb-0">
          <thead class="table-dark">
            <tr>
              <th>#</th><th>IP</th><th>Country</th><th>City</th><th>Visited At</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mapData as $i => $v): ?>
            <tr>
              <td><?= $i+1 ?></td>
              <td><?= htmlspecialchars($v['ip']) ?></td>
              <td><?= htmlspecialchars($v['country']) ?></td>
              <td><?= htmlspecialchars($v['city']) ?></td>
              <td><?= htmlspecialchars($v['time']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
    // Data from PHP
    const visitors = <?= json_encode($mapData) ?>;
    const geoCache = <?= json_encode($geoCache) ?>;

    // Init map
    const map = L.map('map').setView([10, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Function to save new coordinates to cache
    async function saveToCache(country, city, lat, lon) {
        await fetch('save_geo_cache.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ country, city, lat, lon })
        });
    }

    // Add markers
    (async () => {
        for (const v of visitors) {
            if (!v.country || v.country === 'Unknown') continue;
            const key = (v.country + ',' + v.city).toLowerCase().trim();

            let coords = geoCache[key];
            if (!coords) {
                // Not in cache — fetch from Nominatim
                try {
                    const resp = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(v.country + ' ' + v.city)}`);
                    const json = await resp.json();
                    if (json.length > 0) {
                        const { lat, lon } = json[0];
                        coords = [parseFloat(lat), parseFloat(lon)];
                        geoCache[key] = coords;
                        saveToCache(v.country, v.city, coords[0], coords[1]); // save to DB
                    }
                } catch(e) { console.warn('Geo lookup failed', e); }
            }

            if (coords) {
                L.marker(coords)
                    .addTo(map)
                    .bindPopup(`<strong>${v.country}</strong><br>${v.city || ''}<br><small>${v.time}</small>`);
            }
        }
    })();

    // Chart.js
    const ctx = document.getElementById('countryChart').getContext('2d');
    const countryData = <?= json_encode($countryCount) ?>;
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(countryData),
            datasets: [{
                label: 'Visitors',
                data: Object.values(countryData),
                backgroundColor: 'rgba(25,135,84,0.7)',
                borderColor: '#198754',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
</body>
</html>
