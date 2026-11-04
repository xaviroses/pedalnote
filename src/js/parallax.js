// Parallax de imágenes de fondo con GSAP ScrollTrigger (solo transform).
// Marcado: <div class="parallax"><div class="parallax__layer" data-parallax>…</div></div>
// Solo en pantallas anchas (mismo criterio que mq-wide del CSS); en móvil, foto fija.
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const WIDE = '(min-width: 1024px), (min-width: 768px) and (orientation: landscape)';

export function initParallax(gsap) {
  const layers = gsap.utils.toArray('[data-parallax]');
  if (!layers.length) return;

  const mm = gsap.matchMedia();
  mm.add(WIDE, () => {
    layers.forEach((layer) => {
      const frame = layer.parentElement;
      // Recorrido = lo que sobresale la capa por cada lado (--parallax-extra en CSS)
      const travel = () => (layer.offsetHeight - frame.offsetHeight) / 2;

      gsap.fromTo(
        layer,
        { y: () => -travel() },
        {
          y: () => travel(),
          ease: 'none',
          scrollTrigger: {
            trigger: frame,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true,
            invalidateOnRefresh: true,
          },
        }
      );
    });
  });

  // Recalcular cuando terminen de cargar las imágenes (cambia el alto de la página)
  window.addEventListener('load', () => ScrollTrigger.refresh());
}
