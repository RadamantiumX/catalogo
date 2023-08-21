const modal = document.querySelector('.modal');
const modalBtns = document.querySelectorAll('.btn-modal');
const closeBtn = document.querySelector('.modal__button--no');

// Agrega event listeners a los botones para mostrar el modal
modalBtns.forEach(function(btn) {
    btn.addEventListener('click', () => {
        modal.style.display = 'block';
    });
});

// Cierra el modal al hacer clic en el botón "No"
closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Cierra el modal si se hace clic fuera del contenido del modal
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});