import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp({});

// Rejestracja komponentu
app.component('example-component', ExampleComponent);

// Podłączenie Vue do elementu w Blade
app.mount('#app');
                  


