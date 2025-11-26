# Liga de Flag Football - Mar del Plata 🏈

Landing page oficial de la Liga de Flag Football de Mar del Plata.

## 🚀 Despliegue en GitHub Pages

Este proyecto está configurado para desplegarse automáticamente en GitHub Pages.

### Pasos para el primer despliegue:

1. **Sube tu código a GitHub:**
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git branch -M main
   git remote add origin https://github.com/[tu-usuario]/flag-football.git
   git push -u origin main
   ```

2. **Configura GitHub Pages:**
   - Ve a tu repositorio en GitHub
   - Click en **Settings** (Configuración)
   - En el menú lateral, click en **Pages**
   - En **Source** (Origen), selecciona **GitHub Actions**
   - ¡Listo! El workflow se ejecutará automáticamente

3. **Accede a tu sitio:**
   - Tu sitio estará disponible en: `https://[tu-usuario].github.io/flag-football/`
   - El despliegue toma unos 2-3 minutos la primera vez

### 🔄 Despliegues Futuros

Cada vez que hagas `git push` a la rama `main`, el sitio se actualizará automáticamente.

## 💻 Desarrollo Local

```bash
# Instalar dependencias
npm install

# Iniciar servidor de desarrollo
npm run dev

# Construir para producción
npm run build

# Previsualizar build de producción
npm run preview
```

## 🛠️ Tecnologías

- **React** - Librería de UI
- **Vite** - Build tool y dev server
- **CSS** - Estilos personalizados
- **GitHub Actions** - CI/CD automático

## 📁 Estructura del Proyecto

```
flag-football-landing/
├── src/
│   ├── components/     # Componentes React
│   ├── assets/         # Imágenes y recursos
│   ├── App.jsx         # Componente principal
│   └── index.css       # Estilos globales
├── public/             # Archivos estáticos
└── .github/
    └── workflows/      # GitHub Actions
```

## 📝 Notas

- El proyecto usa `base: '/flag-football/'` en `vite.config.js` para GitHub Pages
- Las imágenes están optimizadas para web
- El sitio es completamente responsive

---

Desarrollado con ❤️ para la Liga de Flag Football MDP
