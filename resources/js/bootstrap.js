import Alpine from 'alpinejs';
import htmx from "htmx.org";

window.Alpine = Alpine;
Alpine.start();

htmx.config = { ...htmx.config, useTemplateFragments: true, globalViewTransitions: true, withCredentials: true, };
window.htmx = htmx;
