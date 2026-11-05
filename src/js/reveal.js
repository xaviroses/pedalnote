// Animaciones ligeras al hacer scroll (GSAP + ScrollTrigger + SplitText).
// Todo es sutil y de una sola vez, salvo los «scrub», ligados al scroll.
// Sin JS o con prefers-reduced-motion no se ejecuta: el contenido se ve tal cual.
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';

const EASE = 'power3.out';

// Dispara una vez cuando el elemento entra en pantalla
const onEnter = (trigger, start = 'top 82%') => ({
  trigger,
  start,
  toggleActions: 'play none none none',
});

const one = (sel, root = document) => root.querySelector(sel);
const all = (sel, root = document) => [...root.querySelectorAll(sel)];

export function initReveal(gsap) {
  gsap.registerPlugin(ScrollTrigger, SplitText);

  // 1 · Hero: textos grandes en «slide up reveal» por líneas, al cargar la página
  const heroTexts = all('.hero__title, .hero__tagline, .hero__intro');
  if (heroTexts.length) {
    document.fonts.ready.then(() => {
      gsap.set('.hero__content', { visibility: 'visible', animation: 'none' });
      heroTexts.forEach((el, i) => {
        SplitText.create(el, {
          type: 'lines',
          mask: 'lines',
          autoSplit: true,
          onSplit: (self) =>
            gsap.from(self.lines, {
              yPercent: 105,
              duration: 1.1,
              ease: EASE,
              stagger: 0.08,
              delay: 0.15 + i * 0.12,
            }),
        });
      });
    });
  }

  // 2 · Banda de claves: las palabras se encienden al ritmo del scroll (scrub)
  const claves = one('.claves__text');
  if (claves) {
    document.fonts.ready.then(() => {
      const split = SplitText.create(claves, { type: 'words' });
      gsap.fromTo(
        split.words,
        { opacity: 0.22 },
        {
          opacity: 1,
          ease: 'none',
          stagger: 0.1,
          scrollTrigger: { trigger: claves, start: 'top 85%', end: 'bottom 45%', scrub: true },
        }
      );
    });
  }

  // 3 · Diagramas (Innovation / Transformation): las barras se dibujan desde su lado
  //     y la etiqueta entra deslizándose desde ese mismo lado, en orden de lectura
  all('.concept').forEach((section) => {
    const lead = one('.concept__lead', section);
    const tl = gsap.timeline({ scrollTrigger: onEnter(lead || section, 'top 78%') });
    if (lead) {
      tl.from(one('.diagram__bar', lead), { scaleX: 0, transformOrigin: 'left center', duration: 0.7, ease: EASE })
        .from(one(':scope > span:last-child', lead), { x: -14, opacity: 0, duration: 0.6, ease: EASE }, '<0.25');
    }
    all('.diagram__step', section).forEach((step, i) => {
      const left = step.classList.contains('diagram__step--label-left');
      tl.from(
        one('.diagram__bar', step),
        { scaleX: 0, transformOrigin: left ? 'right center' : 'left center', duration: 0.6, ease: EASE },
        0.35 + i * 0.12
      ).from(one('.diagram__label', step), { x: left ? 14 : -14, opacity: 0, duration: 0.5, ease: EASE }, '<0.2');
    });
    const swatches = all('.swatches span', section);
    if (swatches.length) {
      tl.from(swatches, { scaleY: 0, transformOrigin: 'bottom center', duration: 0.4, stagger: 0.06, ease: EASE }, '>-0.1');
    }
  });

  // 4 · Etiquetas laterales: solo se dibuja la línea fina (el texto no se mueve),
  //     ligada al scroll en los dos sentidos (scrub)
  all('.side-label__line').forEach((line) => {
    gsap.fromTo(
      line,
      { scaleY: 0 },
      {
        scaleY: 1,
        transformOrigin: 'top center',
        ease: 'none',
        scrollTrigger: { trigger: line, start: 'top 90%', end: 'bottom 60%', scrub: true },
      }
    );
  });

  // 5 · Tipos de proyecto: título y cada servicio suben y aparecen ligados al
  //     scroll (scrub, en los dos sentidos), cada uno en su propio tramo
  all('.services__title, .services__item').forEach((el) => {
    gsap.fromTo(
      el,
      { y: 24, opacity: 0 },
      { y: 0, opacity: 1, ease: 'none', scrollTrigger: { trigger: el, start: 'top 92%', end: 'top 70%', scrub: true } }
    );
  });

  // 6 · Selected Work: el rectángulo crece de abajo arriba y después suben
  //     nombre, claim y texto en cascada. Cada caso al entrar en pantalla.
  const header = one('.work__header');
  if (header) {
    gsap.from(header.children, { y: 20, opacity: 0, duration: 0.8, ease: EASE, stagger: 0.1, scrollTrigger: onEnter(header) });
  }
  all('.work__case').forEach((item) => {
    gsap
      .timeline({ scrollTrigger: onEnter(item, 'top 88%') })
      .from(one('.work__swatch', item), { scaleY: 0, transformOrigin: 'bottom center', duration: 0.6, ease: EASE })
      .from(all('.work__name, .work__claim, .work__text', item), { y: 16, opacity: 0, duration: 0.6, ease: EASE, stagger: 0.08 }, '-=0.2');
  });

  // 7 · Texto de Coe: cada párrafo pasa de tenue a nítido ligado al scroll
  all('.founder__bio p').forEach((p) => {
    gsap.fromTo(
      p,
      { opacity: 0.15, y: 12 },
      { opacity: 1, y: 0, ease: 'none', scrollTrigger: { trigger: p, start: 'top 90%', end: 'top 60%', scrub: true } }
    );
  });
}
