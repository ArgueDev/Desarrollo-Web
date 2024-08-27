if (document.querySelector('#mapa')) {
    const lat = -2.192808;
    const lng = -79.879631;
    const zoom = 16;

    var map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">DevWebCamp</h2>
            <p class="mapa__texto">Malecon 2000 de Guayaquil</p>
        `)
        .openPopup();
}