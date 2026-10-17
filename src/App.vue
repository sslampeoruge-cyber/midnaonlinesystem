<script setup lang="ts">
import { computed, h, ref, type FunctionalComponent } from "vue";

type ViewId =
  | "inicio"
  | "cursos"
  | "calendario"
  | "calificaciones"
  | "mensajes";

const icons = {
  home: ["M4 11.5 12 4l8 7.5", "M6 10v10h12V10"],
  book: ["M5 4h11a3 3 0 0 1 3 3v13H8a3 3 0 0 0-3 3z", "M5 4v16"],
  calendar: ["M4 6h16v14H4z", "M4 10h16", "M9 3v4", "M15 3v4"],
  chart: ["M5 20V12", "M12 20V4", "M19 20v-5"],
  bell: [
    "M6 9a6 6 0 0 1 12 0c0 5 2 6 2 6H4s2-1 2-6",
    "M10.4 20a1.7 1.7 0 0 0 3.2 0",
  ],
  search: ["M11 4a7 7 0 1 0 0 14 7 7 0 0 0 0-14", "M16.4 16.4 21 21"],
  clock: ["M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18", "M12 7.5V12l3 2"],
  arrow: ["M5 12h14", "M13 6l6 6-6 6"],
  user: [
    "M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8",
    "M4 21c0-4.4 3.6-6.5 8-6.5s8 2.1 8 6.5",
  ],
  check: ["M4 12.5 9.5 18 20 6"],
  alert: ["M12 4 3 20h18z", "M12 10v4.5", "M12 17.6v.1"],
} satisfies Record<string, string[]>;

const AppIcon: FunctionalComponent<{ name: keyof typeof icons; size?: number }> = (
  props
) =>
  h(
    "svg",
    {
      class: "icon",
      viewBox: "0 0 24 24",
      width: props.size ?? 20,
      height: props.size ?? 20,
      fill: "none",
      stroke: "currentColor",
      "stroke-width": 1.5,
      "stroke-linecap": "round",
      "stroke-linejoin": "round",
      "aria-hidden": "true",
    },
    icons[props.name].map((d) => h("path", { d }))
  );

const nav: { id: ViewId; label: string; icon: keyof typeof icons }[] = [
  { id: "inicio", label: "Inicio", icon: "home" },
  { id: "cursos", label: "Cursos", icon: "book" },
  { id: "calendario", label: "Calendario", icon: "calendar" },
  { id: "calificaciones", label: "Calificaciones", icon: "chart" },
  { id: "mensajes", label: "Mensajes", icon: "bell" },
];

const activeView = ref<ViewId>("inicio");

type Status = "pendiente" | "atrasada" | "entregada";

const deadlines: { when: string; course: string; name: string; title: string; status: Status }[] = [
  { when: "MIÉ 15 OCT · 12:00", course: "TC1028", name: "Inglés IV", title: "Quiz 3 · Grafos", status: "atrasada" },
  { when: "JUE 17 OCT · 23:59", course: "TC2005", name: "Programación Web", title: "Proyecto 2 · Analizador léxico", status: "pendiente" },
  { when: "VIE 18 OCT · 20:00", course: "MA1010", name: "Lenguaje y Autómatas II", title: "Tarea 7 · Integrales definidas", status: "pendiente" },
  { when: "DOM 20 OCT · 23:59", course: "F1001", name: "Administración de Base de Datos", title: "Ensayo · Dilemas contemporáneos", status: "pendiente" },
  { when: "LUN 13 OCT · 23:59", course: "TC2005", name: "Programación Web", title: "Tarea 5 · Recursión", status: "entregada" },
];

const courses: { code: string; name: string; pending: number; progress: number; next: string }[] = [
  { code: "TC2005", name: "Programación Web", pending: 2, progress: 72, next: "Proyecto 2 · 17 oct" },
  { code: "MA1010", name: "Lenguaje y Autómatas II", pending: 3, progress: 48, next: "Tarea 7 · 18 oct" },
  { code: "TC1028", name: "Inglés IV", pending: 1, progress: 85, next: "Quiz 3 · vencido" },
  { code: "F1001", name: "Administración de Base de Datos", pending: 1, progress: 60, next: "Ensayo · 20 oct" },
];

const grades: { course: string; activity: string; date: string; grade: number; status: string }[] = [
  { course: "TC2005", activity: "Tarea 5 · Recursión", date: "10 oct", grade: 96, status: "Calificada" },
  { course: "MA1010", activity: "Examen 2", date: "06 oct", grade: 84, status: "Calificada" },
  { course: "TC1028", activity: "Tarea 4 · Búsqueda", date: "02 oct", grade: 100, status: "Calificada" },
  { course: "F1001", activity: "Actividad 2", date: "28 sep", grade: 90, status: "Calificada" },
];

const statusLabel: Record<Status, string> = {
  pendiente: "Pendiente",
  atrasada: "Atrasada",
  entregada: "Entregada",
};

const greeting = computed(() => {
  const hour = new Date().getHours();
  if (hour < 12) return "Buenos días";
  if (hour < 19) return "Buenas tardes";
  return "Buenas noches";
});

const today = computed(() => {
  const value = new Intl.DateTimeFormat("es-MX", {
    weekday: "long",
    day: "numeric",
    month: "long",
  }).format(new Date());
  return value.charAt(0).toUpperCase() + value.slice(1);
});

const activeLabel = computed(() => nav.find((item) => item.id === activeView.value)?.label ?? "");
</script>

<template>
  <a class="skip" href="#contenido">Saltar al contenido</a>

  <div class="app">
    <aside class="rail">
      <a class="brand" href="#contenido" aria-label="midnaOS, inicio">
        <span class="brand__mark" aria-hidden="true"></span>
        <span class="brand__name">midna<span class="brand__os">OS</span></span>
      </a>

      <nav class="nav" aria-label="Navegación principal">
        <ul class="nav__list">
          <li v-for="item in nav" :key="item.id">
            <button
              type="button"
              class="nav__item"
              :class="{ 'is-active': activeView === item.id }"
              :aria-current="activeView === item.id ? 'page' : undefined"
              @click="activeView = item.id"
            >
              <AppIcon :name="item.icon" :size="18" />
              <span>{{ item.label }}</span>
            </button>
          </li>
        </ul>
      </nav>

      <div class="user">
        <span class="user__avatar" aria-hidden="true">AG</span>
        <span class="user__meta">
          <span class="user__name">Sebastian García</span>
          <span class="user__role">Estudiante</span>
        </span>
      </div>
    </aside>

    <div class="main">
      <header class="topbar">
        <form class="search" role="search" @submit.prevent>
          <AppIcon name="search" :size="18" />
          <input
            id="busqueda"
            type="search"
            class="search__input"
            placeholder="Buscar tareas, cursos o materiales"
            aria-label="Buscar en midnaOS"
          />
        </form>

        <div class="topbar__actions">
          <button type="button" class="iconbtn" aria-label="Notificaciones, 3 sin leer">
            <AppIcon name="bell" :size="20" />
            <span class="iconbtn__badge" aria-hidden="true">3</span>
          </button>
          <button type="button" class="iconbtn" aria-label="Abrir perfil de Sebastian">
            <AppIcon name="user" :size="20" />
          </button>
        </div>
      </header>

      <main id="contenido" class="content" tabindex="-1">
        <template v-if="activeView === 'inicio'">
          <div class="pagehead">
            <h1>{{ greeting }}, Sebastian.</h1>
            <p class="pagehead__date">{{ today }}</p>
          </div>

          <div class="grid">
            <div class="col">
              <section class="block" aria-labelledby="entregas-title">
                <div class="block__head">
                  <h2 id="entregas-title">Próximas entregas</h2>
                  <span class="block__meta">5 en 7 días</span>
                </div>

                <ul class="deadlines">
                  <li
                    v-for="(item, index) in deadlines"
                    :key="item.title"
                    class="deadline"
                    :class="`is-${item.status}`"
                    :style="{ '--i': index }"
                  >
                    <span class="deadline__when">{{ item.when }}</span>
                    <span class="deadline__code">{{ item.course }}</span>
                    <span class="deadline__body">
                      <span class="deadline__title">{{ item.title }}</span>
                      <span class="deadline__course">{{ item.name }}</span>
                    </span>
                    <span class="status" :class="`status--${item.status}`">
                      <span class="status__mark" aria-hidden="true">
                        <AppIcon :name="item.status === 'entregada' ? 'check' : 'clock'" :size="14" />
                      </span>
                      {{ statusLabel[item.status] }}
                    </span>
                  </li>
                </ul>
              </section>

              <section class="block" aria-labelledby="cal-title">
                <div class="block__head">
                  <h2 id="cal-title">Calificaciones recientes</h2>
                  <button type="button" class="link">
                    Ver todas
                    <AppIcon name="arrow" :size="16" />
                  </button>
                </div>

                <div class="table-scroll">
                  <table class="grades">
                    <thead>
                      <tr>
                        <th scope="col">Materia</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col" class="num">Calificación</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="row in grades" :key="row.activity">
                        <td class="grades__code">{{ row.course }}</td>
                        <td>{{ row.activity }}</td>
                        <td class="grades__date">{{ row.date }}</td>
                        <td class="num grades__grade">{{ row.grade }}<span class="grades__den">/100</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>

            <div class="col">
              <section class="block" aria-labelledby="cursos-title">
                <div class="block__head">
                  <h2 id="cursos-title">Mis cursos</h2>
                  <span class="block__meta">Periodo ago·dic</span>
                </div>

                <ul class="courses">
                  <li v-for="course in courses" :key="course.code" class="course">
                    <span class="course__code">{{ course.code }}</span>
                    <span class="course__name">{{ course.name }}</span>
                    <span class="course__next">{{ course.next }}</span>
                    <div class="course__foot">
                      <span class="course__pending">{{ course.pending }} por entregar</span>
                      <span class="course__progress">
                        <span class="course__bar" aria-hidden="true">
                          <span class="course__fill" :style="{ transform: `scaleX(${course.progress / 100})` }"></span>
                        </span>
                        <span class="course__pct num">{{ course.progress }}%</span>
                      </span>
                    </div>
                  </li>
                </ul>
              </section>
            </div>
          </div>
        </template>

        <template v-else>
          <div class="pagehead">
            <h1>{{ activeLabel }}</h1>
            <p class="pagehead__date">Sección en preparación</p>
          </div>

          <div class="empty">
            <span class="empty__mark" aria-hidden="true"><AppIcon :name="nav.find((n) => n.id === activeView)?.icon || 'clock'" :size="28" /></span>
            <p class="empty__title">Aún no hay nada aquí</p>
            <p class="empty__text">Esta vista todavía no está implementada.</p>
            <button type="button" class="btn" @click="activeView = 'inicio'">Volver al inicio</button>
          </div>
        </template>

        <footer class="foot">
          <span>midnaOS · datos de demostración</span>
          <span>Diseño monocromo · El Reino del Crepúsculo</span>
        </footer>
      </main>
    </div>
  </div>
</template>

<style scoped>
.icon {
  flex: none;
}
.skip {
  position: absolute;
  left: var(--space-md);
  top: var(--space-md);
  z-index: var(--z-toast);
  padding: var(--space-xs) var(--space-md);
  background: var(--action-bg);
  color: var(--action-fg);
  text-decoration: none;
  transform: translateY(-200%);
}
.skip:focus {
  transform: translateY(0);
}
.app {
  display: grid;
  grid-template-columns: 264px minmax(0, 1fr);
  min-height: 100dvh;
}
.rail {
  position: sticky;
  top: 0;
  align-self: start;
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
  height: 100dvh;
  padding: var(--space-lg) var(--space-md);
  background: var(--action-bg);
  color: var(--action-fg);
}
.rail :where(a, button):focus-visible {
  outline-color: var(--action-fg);
}
.brand {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-xs) var(--space-sm);
  text-decoration: none;
  font-family: var(--font-display);
  font-size: var(--fs-title);
  font-weight: 400;
  letter-spacing: -0.01em;
}
.brand__mark {
  width: 14px;
  height: 14px;
  background: var(--action-fg);
  clip-path: polygon(50% 0, 100% 100%, 0 100%);
}
.brand__name { line-height: 1; }
.brand__os { font-weight: 700; }
.nav__list {
  display: flex;
  flex-direction: column;
  gap: 2px;
  list-style: none;
  margin: 0;
  padding: 0;
}
.nav__item {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  width: 100%;
  min-height: 44px;
  padding: 0 var(--space-sm);
  border: none;
  background: transparent;
  color: inherit;
  font-size: var(--fs-body);
  text-align: left;
}
.nav__item:hover { background: color-mix(in srgb, var(--action-fg) 12%, transparent); }
.nav__item.is-active { background: var(--action-fg); color: var(--action-bg); font-weight: 700; }
.user { display: flex; align-items: center; gap: var(--space-sm); margin-top: auto; padding-top: var(--space-md); border-top: var(--border-width) solid color-mix(in srgb, var(--action-fg) 22%, transparent); }
.user__avatar { display: grid; place-items: center; width: 40px; height: 40px; background: var(--action-fg); color: var(--action-bg); font-family: var(--font-body); font-size: var(--fs-label); font-weight: 700; letter-spacing: 0.06em; }
.user__meta { display: flex; flex-direction: column; line-height: 1.25; }
.user__name { font-weight: 700; }
.user__role { font-size: var(--fs-label); letter-spacing: var(--ls-label); text-transform: uppercase; opacity: 0.7; }
.main { display: flex; flex-direction: column; min-width: 0; }
.topbar { position: sticky; top: 0; z-index: var(--z-sticky); display: flex; align-items: center; gap: var(--space-md); padding: var(--space-sm) var(--gutter); background: var(--surface); border-bottom: var(--border-width) solid var(--border); }
.search { display: flex; align-items: center; gap: var(--space-xs); flex: 1; max-width: 520px; height: 44px; padding: 0 var(--space-sm); border: var(--border-width) solid var(--border-strong); background: var(--surface); color: var(--text-muted); }
.search:focus-within { border-color: var(--text-primary); color: var(--text-primary); }
.search__input { flex: 1; min-width: 0; border: none; outline: none; background: transparent; color: var(--text-primary); }
.search__input::placeholder { color: var(--text-secondary); }
.topbar__actions { display: flex; gap: var(--space-xs); margin-left: auto; }
.iconbtn { position: relative; display: grid; place-items: center; width: 44px; height: 44px; border: var(--border-width) solid var(--border); background: var(--surface); color: var(--text-primary); }
.iconbtn:hover { background: var(--action-ghost-hover); }
.iconbtn__badge { position: absolute; top: -6px; right: -6px; min-width: 18px; height: 18px; padding: 0 4px; display: grid; place-items: center; background: var(--action-bg); color: var(--action-fg); font-size: var(--fs-label); line-height: 1; }
.content { flex: 1; width: 100%; max-width: var(--container); margin-inline: auto; padding: var(--space-xl) var(--gutter) var(--space-section); }
.pagehead h1 { margin-left: -0.03em; }
.pagehead { display: flex; align-items: baseline; justify-content: space-between; flex-wrap: wrap; gap: var(--space-xs) var(--space-lg); margin-bottom: var(--space-section); }
.pagehead__date { font-size: var(--fs-label); letter-spacing: var(--ls-label); text-transform: uppercase; color: var(--text-secondary); }
.grid { display: grid; grid-template-columns: minmax(0, 1.55fr) minmax(0, 1fr); gap: var(--space-xxl); }
.col { display: flex; flex-direction: column; gap: var(--space-section); min-width: 0; }
.block__head { display: flex; align-items: baseline; justify-content: space-between; gap: var(--space-md); padding-bottom: var(--space-sm); border-bottom: 2px solid var(--text-primary); }
.block__meta { font-size: var(--fs-label); letter-spacing: var(--ls-label); text-transform: uppercase; color: var(--text-secondary); }
.deadlines { list-style: none; margin: 0; padding: 0; }
.deadline { display: grid; grid-template-columns: 150px 68px minmax(0, 1fr) auto; align-items: center; gap: var(--space-md); padding: var(--space-sm) var(--space-xs); border-bottom: var(--border-width) solid var(--border); }
.deadline:hover { background: var(--action-ghost-hover); }
.deadline__when { font-family: var(--font-mono); font-size: var(--fs-label); letter-spacing: 0.04em; font-variant-numeric: tabular-nums; color: var(--text-secondary); }
.deadline__code { font-family: var(--font-mono); font-size: var(--fs-label); font-weight: 500; }
.deadline__body { display: flex; flex-direction: column; min-width: 0; }
.deadline__title { font-weight: 700; line-height: 1.3; }
.deadline__course { color: var(--text-secondary); }
.status { display: inline-flex; align-items: center; gap: var(--space-xs); padding: var(--space-xxs) var(--space-xs); border: var(--border-width) solid var(--border-strong); font-size: var(--fs-label); letter-spacing: var(--ls-label); text-transform: uppercase; white-space: nowrap; }
.status__mark { display: grid; place-items: center; }
.courses { list-style: none; margin: 0; padding: 0; }
.course { display: grid; gap: var(--space-xxs); padding: var(--space-md) var(--space-xs); border-bottom: var(--border-width) solid var(--border); }
.course:hover { background: var(--action-ghost-hover); }
.course__code { font-family: var(--font-mono); font-size: var(--fs-label); font-weight: 500; letter-spacing: 0.04em; }
.course__name { font-weight: 700; line-height: 1.3; }
.course__next { color: var(--text-secondary); }
.course__foot { display: flex; align-items: center; justify-content: space-between; gap: var(--space-md); margin-top: var(--space-xs); }
.course__pending { font-size: var(--fs-label); letter-spacing: var(--ls-label); text-transform: uppercase; color: var(--text-secondary); }
.course__progress { display: flex; align-items: center; gap: var(--space-xs); }
.course__bar { position: relative; display: block; width: 80px; height: 4px; background: var(--surface-alt); border: var(--border-width) solid var(--border); }
.course__fill { position: absolute; inset: 0; background: var(--text-primary); transform-origin: left; }
.course__pct { font-size: var(--fs-label); color: var(--text-secondary); }
.table-scroll { overflow-x: auto; }
.grades { width: 100%; border-collapse: collapse; }
.grades th { padding: var(--space-xs) var(--space-xs) var(--space-sm); border-bottom: var(--border-width) solid var(--border); background: var(--surface-sunken); font-size: var(--fs-label); font-weight: 500; letter-spacing: var(--ls-label); text-transform: uppercase; color: var(--text-secondary); text-align: left; }
.grades td { padding: var(--space-sm) var(--space-xs); border-bottom: var(--border-width) solid var(--border); vertical-align: middle; }
.grades tbody tr:hover { background: var(--action-ghost-hover); }
.grades__code, .grades__date { font-family: var(--font-mono); font-size: var(--fs-label); color: var(--text-secondary); }
.num { text-align: right; font-variant-numeric: tabular-nums; }
.grades__grade { font-family: var(--font-mono); font-weight: 500; }
.grades__den { color: var(--text-secondary); }
.link { display: inline-flex; align-items: center; gap: var(--space-xxs); border: none; background: transparent; color: var(--text-primary); text-decoration: underline; text-decoration-thickness: 1px; text-underline-offset: 0.18em; text-decoration-color: var(--border-strong); }
.link:hover { text-decoration-color: currentColor; }
.empty { display: flex; flex-direction: column; align-items: flex-start; gap: var(--space-sm); max-width: 46ch; padding: var(--space-xxl) 0; }
.empty__mark { display: grid; place-items: center; width: 56px; height: 56px; border: var(--border-width) solid var(--border-strong); color: var(--text-secondary); margin-bottom: var(--space-xs); }
.empty__title { font-family: var(--font-display); font-size: var(--fs-headline); font-weight: 700; }
.empty__text { color: var(--text-secondary); }
.btn { margin-top: var(--space-sm); min-height: 44px; padding: 0 var(--space-lg); border: var(--border-width) solid var(--action-bg); background: var(--action-bg); color: var(--action-fg); font-weight: 700; }
.btn:hover { background: var(--action-bg-hover); border-color: var(--action-bg-hover); }
.foot { display: flex; justify-content: space-between; flex-wrap: wrap; gap: var(--space-xs); margin-top: var(--space-section); padding-top: var(--space-md); border-top: var(--border-width) solid var(--border); font-size: var(--fs-label); letter-spacing: var(--ls-label); text-transform: uppercase; color: var(--text-secondary); }
@media (max-width: 1080px) { .grid { grid-template-columns: minmax(0, 1fr); gap: var(--space-section); } }
@media (max-width: 860px) {
  .app { grid-template-columns: minmax(0, 1fr); }
  .rail { position: fixed; inset: auto 0 0 0; z-index: var(--z-sticky); height: auto; flex-direction: row; align-items: center; gap: var(--space-sm); padding: var(--space-xs) var(--space-md); border-top: var(--border-width) solid color-mix(in srgb, var(--action-fg) 20%, transparent); }
  .brand { padding: var(--space-xxs); }
  .brand__name { display: none; }
  .nav { flex: 1; min-width: 0; }
  .nav__list { flex-direction: row; justify-content: space-around; gap: var(--space-xxs); }
  .nav__item { flex: 1; min-width: 44px; flex-direction: column; justify-content: center; align-items: center; width: auto; gap: 2px; padding: var(--space-xxs) var(--space-xs); }
  .nav__item span:last-child { position: absolute; width: 1px; height: 1px; margin: -1px; padding: 0; overflow: hidden; clip-path: inset(50%); white-space: nowrap; border: 0; }
  .user { display: none; }
  .main { padding-bottom: 76px; }
  .deadline { grid-template-columns: auto auto minmax(0, 1fr); grid-template-areas: "when code status" "body body body"; row-gap: var(--space-xs); }
  .deadline__when { grid-area: when; }
  .deadline__code { grid-area: code; }
  .deadline__body { grid-area: body; }
  .status { grid-area: status; justify-self: end; }
}
</style>
