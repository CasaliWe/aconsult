import './bootstrap';

/* ─── Observador global de animações por scroll ─── */
document.addEventListener('DOMContentLoaded', () => {
    const observador = new IntersectionObserver((entradas) => {
        entradas.forEach(entrada => {
            if (entrada.isIntersecting) {
                entrada.target.classList.add('animado');
                observador.unobserve(entrada.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.animar-entrada').forEach(el => {
        observador.observe(el);
    });
});