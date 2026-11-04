// Genera las versiones optimizadas de las fotos (AVIF, WebP y JPG en varios anchos).
// Uso: npm run images -- "/ruta/a/xd-export/desktop"
// Los originales del XD no se versionan (pesan ~60 MB); solo el resultado en assets/img.
import sharp from 'sharp';
import { mkdir } from 'node:fs/promises';
import path from 'node:path';

const SRC = process.argv[2];
if (!SRC) {
  console.error('Indica la carpeta de originales: npm run images -- "<carpeta>"');
  process.exit(1);
}
const OUT = path.resolve('assets/img');

// nombre final ← archivo exportado del XD (a 2x)
const PHOTOS = {
  hero: 'pedalhomehorb@2x.png', // provisional: composición con texto incrustado
  claves: 'pedalhomehorb2@2x.png',
  'servicios-innovation': 'moretext3@2x.png',
  'servicios-transformation': 'moretext2@2x.png',
  'selected-work': 'moretext4@2x.png',
  'banda-marca': '18@2x.png',
  fundador: 'moretext@2x.png',
};
const WIDTHS = [640, 1024, 1440, 1920, 2560];

// Rótulos manuscritos (PNG con transparencia)
const LETTERING = {
  'rotulo-innovation': 'innovation@2x.png',
  'rotulo-transformation': 'transformation@2x.png',
};

await mkdir(OUT, { recursive: true });

for (const [name, file] of Object.entries(PHOTOS)) {
  const input = sharp(path.join(SRC, file));
  const { width } = await input.metadata();
  for (const w of WIDTHS.filter((w) => w <= width)) {
    const base = input.clone().resize({ width: w, withoutEnlargement: true });
    await Promise.all([
      base.clone().avif({ quality: 50, effort: 6 }).toFile(`${OUT}/${name}-${w}.avif`),
      base.clone().webp({ quality: 74 }).toFile(`${OUT}/${name}-${w}.webp`),
      base.clone().jpeg({ quality: 76, mozjpeg: true, progressive: true }).toFile(`${OUT}/${name}-${w}.jpg`),
    ]);
  }
  console.log('✔', name);
}

for (const [name, file] of Object.entries(LETTERING)) {
  const input = sharp(path.join(SRC, file));
  await input.clone().webp({ quality: 85, alphaQuality: 90 }).toFile(`${OUT}/${name}.webp`);
  await input.clone().png({ compressionLevel: 9, palette: true }).toFile(`${OUT}/${name}.png`);
  console.log('✔', name);
}
