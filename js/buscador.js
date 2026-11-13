document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formBusqueda');
  if (!form) return;

  const input = document.getElementById('inputBusqueda');
  const select = document.getElementById('selectDificultad');
  const estado = document.getElementById('estado');
  const resultados = document.getElementById('resultados');
  const detalle = document.getElementById('detalle');

  let temporizador = null; // para esperar a que el usuario deje de tipear
  let controlador = null;  // para cancelar la petición anterior

  // Crea un elemento con su texto. textContent evita inyección de HTML (XSS)
  function crear(etiqueta, clase, texto) {
    const nodo = document.createElement(etiqueta);
    if (clase) nodo.className = clase;
    if (texto !== undefined) nodo.textContent = texto;
    return nodo;
  }

  function mostrarEstado(texto, esError = false) {
    estado.textContent = texto;
    estado.className = esError ? 'text-danger' : 'text-muted';
  }

  // Hace el fetch, valida el código HTTP y devuelve el JSON
  async function pedirJSON(url, opciones = {}) {
    const response = await fetch(url, opciones);

    let json = null;
    try {
      json = await response.json();
    } catch (e) {
      json = null;
    }

    if (!response.ok) {
      throw new Error((json && json.message) || `Error HTTP: ${response.status}`);
    }
    if (!json || json.status !== 'success') {
      throw new Error('Respuesta inválida del servidor.');
    }
    return json;
  }

  // Dibuja una tarjeta por cada ruta recibida
  function renderizarResultados(rutas) {
    resultados.replaceChildren();
    detalle.replaceChildren();

    rutas.forEach((ruta) => {
      const col = crear('div', 'col-md-6 col-lg-4');
      const card = crear('div', 'card h-100');
      const cuerpo = crear('div', 'card-body');

      const boton = crear('button', 'btn btn-sm btn-outline-dark', 'Ver detalle');
      boton.type = 'button';
      boton.addEventListener('click', () => verDetalle(ruta.id));

      cuerpo.append(
        crear('h2', 'h5 card-title', ruta.nombre),
        crear('p', 'card-text mb-2', `${ruta.provincia} · ${ruta.categoria} · Dificultad: ${ruta.dificultad}`),
        boton
      );
      card.append(cuerpo);
      col.append(card);
      resultados.append(col);
    });
  }

  // Búsqueda: pide la lista al endpoint y actualiza solo la sección de resultados
  async function buscar() {
    if (controlador) controlador.abort();
    controlador = new AbortController();

    const params = new URLSearchParams({
      q: input.value.trim(),
      dificultad: select.value,
    });

    mostrarEstado('Buscando...');

    try {
      const json = await pedirJSON(`api/rutas.php?${params}`, { signal: controlador.signal });
      renderizarResultados(json.data);
      mostrarEstado(json.total === 0 ? 'No se encontraron rutas.' : `${json.total} ruta(s) encontrada(s).`);
    } catch (error) {
      if (error.name === 'AbortError') return; // la cancelamos nosotros a propósito
      console.error('Error al buscar:', error);
      resultados.replaceChildren();
      mostrarEstado('No se pudieron cargar las rutas. Intentá de nuevo.', true);
    }
  }

  // Detalle de una ruta (click en el botón de la tarjeta)
  async function verDetalle(id) {
    try {
      const json = await pedirJSON(`api/rutas.php?id=${encodeURIComponent(id)}`);
      const r = json.data;

      const card = crear('div', 'card border-dark');
      const cuerpo = crear('div', 'card-body');
      cuerpo.append(
        crear('h2', 'h4', r.nombre),
        crear('p', 'mb-1', `Provincia: ${r.provincia}`),
        crear('p', 'mb-1', `Categoría: ${r.categoria}`),
        crear('p', 'mb-1', `Dificultad: ${r.dificultad}`),
        crear('p', 'mb-1', `Distancia: ${r.distancia_km !== null ? r.distancia_km + ' km' : 'sin dato'}`),
        crear('p', 'mt-2 mb-0', r.descripcion || 'Sin descripción.')
      );
      card.append(cuerpo);

      detalle.replaceChildren(card);
      detalle.scrollIntoView({ behavior: 'smooth' });
    } catch (error) {
      console.error('Error al cargar el detalle:', error);
      detalle.replaceChildren(crear('div', 'alert alert-danger', 'No se pudo cargar el detalle de la ruta.'));
    }
  }

  // Eventos
  form.addEventListener('submit', (e) => {
    e.preventDefault();          // evita que el formulario recargue la página
    clearTimeout(temporizador);
    buscar();
  });

  input.addEventListener('input', () => {
    clearTimeout(temporizador);
    temporizador = setTimeout(buscar, 300); // espera 300 ms después de la última tecla
  });

  select.addEventListener('change', buscar);

  buscar(); // carga inicial: muestra las rutas apenas se abre la página
});