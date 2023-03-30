const detallesButtons = document.querySelectorAll('.detalles-btn');
const detallesDescripcion = document.querySelector('#detalles-descripcion');
const detallesFecha = document.querySelector('#detalles-fecha');
const detallesDisponible = document.querySelector('#detalles-disponible');
const detallesPrecio = document.querySelector('#detalles-precio');
const detallesImagen = document.querySelector('#detalles-imagen');

detallesButtons.forEach(button => {
  button.addEventListener('click', () => {
    detallesDescripcion.textContent = button.getAttribute('data-descripcion');
    detallesFecha.textContent = button.getAttribute('data-fecha');
    detallesDisponible.textContent = button.getAttribute('data-disponible');
    detallesPrecio.textContent = button.getAttribute('data-precio');
    detallesImagen.src = 'img/' + button.getAttribute('data-imagen');
  });
});