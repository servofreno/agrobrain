const provinciasPorComunidad = {
    andalucia: ['Almería', 'Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla'],
    aragon: ['Huesca', 'Teruel', 'Zaragoza'],
    asturias: ['Asturias'],
    canarias: ['Las Palmas', 'Santa Cruz de Tenerife'],
    cantabria: ['Cantabria'],
    castilla_la_mancha: ['Albacete', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Toledo'],
    castilla_y_leon: ['Ávila', 'Burgos', 'León', 'Palencia', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'],
    cataluna: ['Barcelona', 'Girona', 'Lleida', 'Tarragona'],
    extremadura: ['Badajoz', 'Cáceres'],
    galicia: ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'],
    madrid: ['Madrid'],
    murcia: ['Murcia'],
    navarra: ['Navarra'],
    pais_vasco: ['Álava', 'Gipuzkoa', 'Bizkaia'],
    rioja: ['La Rioja'],
    valencia: ['Alicante', 'Castellón', 'Valencia'],
};

const todasLasProvincias = ['Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Barcelona', 'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Córdoba', 'Cuenca', 'Gerona', 'Granada', 'Guadalajara', 'Guipúzcoa', 'Huelva', 'Huesca', 'Islas Baleares', 'Jaén', 'La Coruña', 'La Rioja', 'Las Palmas', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Murcia', 'Navarra', 'Orense', 'Palencia', 'Pontevedra', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'];

function actualizarProvincias() {
    const comunidadSeleccionada = document.getElementById('comunidades').value;
    const provincias = provinciasPorComunidad[comunidadSeleccionada] || todasLasProvincias;

    const selectProvincias = document.getElementById('provincias');
    selectProvincias.innerHTML = '';

    provincias.forEach(provincia => {
        const option = document.createElement('option');
        option.value = provincia.toLowerCase();
        option.text = provincia;
        selectProvincias.appendChild(option);
    });
}

document.getElementById('comunidades').addEventListener('change', actualizarProvincias);

document.addEventListener('DOMContentLoaded', function () {
    actualizarProvincias();
});