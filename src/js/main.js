// Pedal Note — punto de entrada JS.
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initParallax } from './parallax.js';
import { initReveal } from './reveal.js';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (reduceMotion) {
  // Sin animaciones: el hero (oculto hasta animarse) se muestra tal cual
  document.documentElement.classList.remove('js-anim');
} else {
  gsap.registerPlugin(ScrollTrigger);
  initParallax(gsap);
  initReveal(gsap);
}
