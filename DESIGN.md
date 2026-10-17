---
name: midnaOS
description: Un sistema de diseño monocromo del Reino del Crepúsculo para una plataforma universitaria de aprendizaje.
colors:
  ink: "#000000"
  ink-900: "#0a0a0a"
  ink-800: "#161616"
  ink-700: "#262626"
  ink-600: "#3d3d3d"
  ink-500: "#5c5c5c"
  ink-400: "#8a8a8a"
  ink-300: "#b3b3b3"
  ink-200: "#d4d4d4"
  ink-100: "#e8e8e8"
  ink-50: "#f5f5f5"
  paper: "#ffffff"
typography:
  display:
    fontFamily: "Playfair Display, Georgia, serif"
    fontSize: "clamp(2.5rem, 5.8vw, 4.25rem)"
    fontWeight: 700
    lineHeight: 0.98
    letterSpacing: "-0.03em"
  headline:
    fontFamily: "Playfair Display, Georgia, serif"
    fontSize: "clamp(1.5rem, 2.2vw, 2rem)"
    fontWeight: 700
    lineHeight: 1.12
    letterSpacing: "-0.02em"
  title:
    fontFamily: "Atkinson Hyperlegible, system-ui, sans-serif"
    fontSize: "clamp(1.25rem, 1.6vw, 1.375rem)"
    fontWeight: 700
    lineHeight: 1.3
  body:
    fontFamily: "Atkinson Hyperlegible, system-ui, sans-serif"
    fontSize: "1.0625rem"
    fontWeight: 400
    lineHeight: 1.55
  label:
    fontFamily: "Atkinson Hyperlegible, system-ui, sans-serif"
    fontSize: "0.8125rem"
    fontWeight: 500
    letterSpacing: "0.08em"
rounded:
  none: "0px"
  xs: "2px"
  sm: "4px"
spacing:
  xxs: "4px"
  xs: "8px"
  sm: "12px"
  md: "16px"
  lg: "24px"
  xl: "40px"
  xxl: "64px"
  xxl2: "96px"
  xxl3: "128px"
  section: "clamp(72px, 8vw, 120px)"
---

<!-- SEED: establecido con el usuario antes de la implementación; vuelve a ejecutar `$impeccable document` cuando haya código para capturar los tokens y componentes reales. -->

# Design System: midnaOS

## Overview

**Creative North Star: "El Reino del Crepúsculo"**

midnaOS vive en dos mundos y solo dos. El **Mundo de la Luz** es papel blanco con tinta negra; el **Reino del Crepúsculo** invierte los términos en tinta negra con luz blanca. No hay un tercer tema, no hay un acento cromático, no hay un color de marca: la identidad entera se construye con **valor, peso, escala y espacio**. Esta es una decisión de producto, no una limitación —sirve a la vez a la claridad de un LMS y a la accesibilidad.

El carácter es **editorial y operativo**: la autoridad de una publicación académica puesta al servicio de una herramienta densa en datos. Los títulos hablan con una serif de alto contraste; el cuerpo y la interfaz con una sans diseñada para máxima legibilidad; los códigos de curso, fechas y metadatos con un monoespaciado que no es disfraz técnico sino medición real. La geometría es **facetada** —ángulos y esquinas rectas que citan la *Fused Shadow* de Midna sin copiar ningún activo con derechos— y el contraste entre superficies se resuelve por **escalones de valor y bordes de 1px**, no por sombras decorativas.

El movimiento es mínimo y con propósito: una sola transición de estado, jamás una animación de entrada idéntica repetida en cada sección. La urgencia estructural es la del calendario: la próxima entrega debe leerse antes que cualquier adorno.

**Key Characteristics:**
- Monocromo estricto: una sola rampa de grises, cero matiz.
- Dos temas espejo: blanco-sobre-negro y negro-sobre-blanco.
- Tipografía en tres voces: serif editorial, sans legible, mono para datos.
- Geometría facetada de esquinas rectas; radar de radios 0–4px.
- Profundidad por valor y borde; sombras reservadas a capas flotantes.

## Colors

Una sola rampa neutra de doce escalones, de negro puro a papel blanco. Ningún color con matiz entra jamás al sistema; toda señal de jerarquía es de valor.

### Primary
- **Obsidian Ink** (`#000000` / ink-950): tinta primaria, titulares y el relleno de acciones primarias. En el tema oscuro invierte su rol y pasa a ser el lienzo. Su presencia marca lo accionable y lo definitivo.
- **Penumbra** (`#0a0a0a` / ink-900): fondo del tema Crepúsculo y superficies hundidas sobre negro. El escalón que evita el negro plano.

### Neutral
- **Tar** (`#262626` / ink-700): bordes fuertes y separadores sobre superficies oscuras; texto grande sobre papel.
- **Slate** (`#3d3d3d` / ink-600): texto secundario sobre papel, límite alto de ilegibilidad decorativa.
- **Ash** (`#5c5c5c` / ink-500): el gris de cuerpo secundario; debe mantenerse ≥4.5:1 sobre blanco.
- **Fog** (`#8a8a8a` / ink-400): iconografía inactiva y placeholders — nunca texto que deba leerse.
- **Mist** (`#b3b3b3` / ink-300): bordes y líneas de división por defecto en tema claro.
- **Cloud** (`#d4d4d4` / ink-200): bordes suaves, track de controles, separadores de tabla.
- **Veil** (`#e8e8e8` / ink-100): filas alternas y superficies elevadas en tema claro.
- **Haze** (`#f5f5f5` / ink-50): fondo de página en tema claro, ligeramente por encima del papel.
- **Paper** (`#ffffff`): superficie de tarjeta en tema claro y tinta de texto en tema oscuro.

### Named Rules
**The No-Hue Rule.** Nunca se introduce un color con matiz. Si algo necesita destacar, cambia de valor, de peso, de escala o de espacio —jamás de tono.

**The Two Worlds Rule.** Existen exactamente dos temas y son espejos. No hay variantes tintadas ni un tercer modo; cualquier tema nuevo debe poder describirse como una inversión de valor.

## Typography

**Display Font:** Playfair Display (con Georgia, serif)
**Body Font:** Atkinson Hyperlegible (con system-ui, sans-serif)
**Label/Mono Font:** JetBrains Mono (con ui-monospace, monospace)

**Character:** La serif de alto contraste aporta la autoridad académica y un aire crepuscular elegante; la sans hiperlegible mantiene el trabajo diario sin fricción; el monoespaciado fija datos y mediciones. La combinación es editorial arriba, funcional en medio, precisa abajo.

### Hierarchy
- **Display** (700, `clamp(2.25rem, 5vw, 3.5rem)`, 1.05): solo titulares de portada y encabezados de curso. Tracking -0.02em.
- **Headline** (700, `clamp(1.5rem, 2.5vw, 2rem)`, 1.15): títulos de sección y de página interna.
- **Title** (700, 1.125rem, 1.3): encabezados de tarjeta, nombre de tarea, fila de lista.
- **Body** (400, 1rem, 1.6): prosa y descripciones; medida 65–75ch. Atkinson Hyperlegible para legibilidad.
- **Label** (500, 0.8125rem, tracking 0.08em, MAYÚSCULAS): meta, estados, encabezados de tabla y otros elementos de interfaz. No es disfraz técnico.

### Named Rules
**The Data-Voice Rule.** El monoespaciado se reserva a códigos, fechas, cifras y valores numéricos tabulares (dato/medición real). No es un disfraz de "técnico".

## Layout

Modelo contenido-primero sobre una retícula de 12 columnas con contenedor máximo ~1280px; el margen se ensancha antes que la línea de texto. Ritmo de espaciado anclado a 4px, con pasos 8/12/16/24/40/64. Las vistas de lista y calificaciones son **densas** (filas compactas, alineación tabular de cifras); las vistas de curso son **generosas** (más aire sobre cada encabezado que debajo). Responsive mobile-first en 375 / 768 / 1024 / 1440. La navegación lateral colapsa a barra inferior en móvil (≤5 destinos).

## Elevation & Depth

Sistema **plano por defecto**. La profundidad se comunica con **escalones de valor** de la rampa y **bordes de 1px**, nunca con sombras de reposo. Las sombras aparecen únicamente en **capas flotantes** (menús, diálogos, popovers, toasts), siempre con desplazamiento y desenfoque suave; se prohíben las sombras de halo que no aportan elevación real.

### Shadow Vocabulary
- **overlay** (`box-shadow: 0 8px 24px rgba(0,0,0,0.16)`): menús, popovers y diálogos en tema claro.
- **overlay-inv** (`box-shadow: 0 8px 24px rgba(0,0,0,0.55)`): las mismas capas sobre el tema Crepúsculo.

### Named Rules
**The Flat-By-Default Rule.** En reposo, todo es plano y se separa por valor o borde. La sombra es una respuesta a estar por encima del plano, no una decoración.

## Shapes

Lenguaje **facetado**. Esquinas rectas o radios mínimos (0–4px); nada de píldoras salvo en controles pequeños (chips, badges de estado). Los bordes son de 1px, de valor constante. Como firma del mundo, siluetas angulares y acentos triangulares pueden aparecer de forma **escasa** —en iconos, separadores o el logotipo— citando la geometría del Crepúsculo sin copiar activos con derechos.

### Named Rules
**The Facet Rule.** Si una forma puede ser esquina, no es curva. El radio es una excepción deliberada, no un valor por defecto.

## Do's and Don'ts

### Do:
- **Do** construir toda jerarquía con valor, peso, escala y espacio.
- **Do** mantener cuerpo ≥4.5:1 y texto grande ≥3:1 en **ambos** temas.
- **Do** tematizar las superficies del navegador (selección, caret, scrollbar, anillo de foco) desde la paleta.
- **Do** usar monoespaciado solo para códigos, fechas y cifras tabulares.
- **Do** fijar el contraste por bordes de 1px y escalones de la rampa.

### Don't:
- **Don't** introducir ningún color con matiz, ni siquiera para estados de error o éxito.
- **Don't** usar sombras en reposo ni halos sin elevación real.
- **Don't** usar píldoras o radios grandes fuera de controles pequeños.
- **Don't** repetir la misma animación de entrada en cada sección; el movimiento es mínimo y con propósito.
- **Don't** usar activos, logotipos ni iconografía con derechos de Zelda o del TEC: solo las ideas abstractas de luz/sombra.
