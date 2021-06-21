require('./bootstrap');

// Import modules...
import {
    createApp,
    h
} from 'vue';
import {
    App as InertiaApp,
    plugin as InertiaPlugin
} from '@inertiajs/inertia-vue3';
import {
    InertiaProgress
} from '@inertiajs/progress';

import PrimeVue from 'primevue/config';

const el = document.getElementById('app');

createApp({
        render: () =>
            h(InertiaApp, {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            }),
    })
    .mixin({
        methods: {
            route
        }
    })
    .use(InertiaPlugin)
    .use(PrimeVue, {
        locale: {
            startsWith: '... ile başlayan',
            contains: 'Contains',
            notContains: 'Not contains',
            endsWith: 'Ends with',
            equals: 'Eşit',
            notEquals: 'Eşit Değil',
            noFilter: 'Fİltre Yok',
            lt: 'Şundan Küçük',
            lte: 'Less than or equal to',
            gt: 'Şundan Büyük',
            gte: 'Greater than or equal to',
            dateIs: 'Date is',
            dateIsNot: 'Date is not',
            dateBefore: 'Date is before',
            dateAfter: 'Date is after',
            clear: 'Temizle',
            apply: 'Uygula',
            matchAll: 'Match All',
            matchAny: 'Match Any',
            addRule: 'Şart Ekle',
            removeRule: 'Şartı Sil',
            accept: 'Evet',
            reject: 'Hayır',
            choose: 'Seç',
            upload: 'Yükle',
            cancel: 'İptal',
            dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            today: 'Today',
            weekHeader: 'Wk',
            firstDayOfWeek: 0,
            dateFormat: 'mm/dd/yy',
            weak: 'Weak',
            medium: 'Medium',
            strong: 'Strong',
            passwordPrompt: 'Enter a password',
            emptyFilterMessage: 'No results found',
            emptyMessage: 'No available options'
        }
    })
    .mount(el);

InertiaProgress.init({
    color: '#4B5563'
});
