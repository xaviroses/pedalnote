# Pedal Note — tema WordPress

Tema one page a medida. El brief completo está en el `CLAUDE.md` del sitio LocalWP.

- Ruta local: `~/Local Sites/pedal-note/app/public/wp-content/themes/pedalnote/`
- Web local: http://pedalnote.local

## Desarrollo

```bash
npm install      # solo la primera vez (descarga sass, esbuild y GSAP)
npm run dev      # mientras se trabaja: recompila CSS y JS al guardar (Ctrl+C para parar)
npm run build    # versión final comprimida; ejecutar antes de cada commit
```

- Estilos: `src/scss/` → `assets/css/main.css`
- JavaScript: `src/js/` → `assets/js/main.js`
- No editar nada de `assets/css` ni `assets/js` a mano: se generan solos.
