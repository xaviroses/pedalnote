// Pedal Note — punto de entrada JS.
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initParallax } from './parallax.js';
import { initReveal } from './reveal.js';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
  gsap.registerPlugin(ScrollTrigger);
  initParallax(gsap);
  initReveal(gsap);
}
