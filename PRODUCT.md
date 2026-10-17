# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

- **Estudiantes (usuario primario):** alumnos universitarios del Tecnológico de Monterrey (TEC de México). Usan la plataforma en medio de su carga académica para revisar cursos, tareas, fechas de entrega, calificaciones y materiales. Escenario real: escritorio entre clases y móvil en traslados o ratos muertos; necesitan ubicar algo concreto en segundos y cerrar.
- **Docentes:** publican cursos, materiales y tareas, y califican entregas.
- **Administradores:** gestionan cursos, inscripciones y la estructura académica (programas, periodos, planes).

## Product Purpose

Un sistema de gestión del aprendizaje (LMS) para universitarios, en la línea funcional de Moodle, pero más claro y ligero. Existe para que un estudiante encuentre lo que necesita —la próxima entrega, una calificación, un material— en segundos y con la mínima fricción. El éxito se mide por la velocidad con que un alumno resuelve una consulta cotidiana sin perderse en menús ni ruido.

## Positioning

Alternativa **más clara y ligera** a Moodle. El mecanismo diferencial es una arquitectura de información radicalmente más simple y una interfaz monocroma, orientada al contenido, que reduce la carga cognitiva en lugar de competir con ella.

## Operating Context

- Estructura de término universitario: **programa → curso/materia → módulo → recurso/tarea**.
- Flujo guiado por calendario: periodos, fechas límite, entregas y calificaciones.
- Idioma de la interfaz: **español (es-MX)**.
- Uso recurrente y breve (varias veces al día) más que sesiones largas.
- Terminología a respetar: "curso", "materia", "tarea", "entrega", "calificación", "periodo", "recurso".

## Capabilities and Constraints

**Funcionalidad confirmada:** cursos y módulos; recursos y materiales; tareas y envío de entregas; calificaciones; calendario; anuncios; notificaciones; los tres roles anteriores.

**Restricciones confirmadas:**
- **Paleta exclusivamente en blanco y negro**, expresada como una **escala de grises**. No se introduce ningún color con matiz (hue) en ningún punto de la interfaz.
- Interfaz en español (es-MX).

**Decisiones abiertas (no inventar):** integración con SSO/inicio de sesión institucional; app nativa frente a web responsiva; funcionamiento sin conexión; analítica o reportes.

## Brand Commitments

- Nombre visible del producto: **midnaOS**.
- Voz: directa, calmada, académica; sin jerga innecesaria y sin tono infantilizante.
- El nombre evoca *The Legend of Zelda: Twilight Princess* (Midna) y la identidad visual se inspira en el **Reino del Crepúsculo**, pero **no se usan activos, logotipos, iconografía ni material con derechos de Zelda/TEC** — solo las ideas abstractas de dualidad luz/sombra.

## Evidence on Hand

No hay datos reales de cursos, capturas, logotipos ni activos institucionales. Todo contenido de cursos/alumnos/calificaciones usado antes de una integración real es **ilustrativo y debe etiquetarse como tal**. No fabricar marca oficial del TEC, logotipos ni datos reales de estudiantes.

## Product Principles

1. **Encontrar en segundos.** Cualquier objetivo (fecha, calificación, material) accesible en pocos clics.
2. **Luz y sombra, no color.** La jerarquía se sostiene con valor, peso, escala y espacio; el color nunca es la señal.
3. **Menos pantalla, más estudio.** La interfaz se retira; el contenido es el producto.
4. **Consistencia operativa.** El mismo patrón resuelve cada curso, tarea y listado.

## Accessibility & Inclusion

- Contraste de texto: ≥4.5:1 en cuerpo, ≥3:1 en texto grande, en **ambos** temas.
- Navegación completa por teclado con foco visible (un LMS debe usarse sin ratón).
- Tipografía de cuerpo elegida por legibilidad (Atkinson Hyperlegible).
- Respetar `prefers-reduced-motion`. Objetivos táctiles ≥44×44px. Contenido en español; soporte de ampliación de texto sin romper el diseño.
