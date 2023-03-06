Nova.booting(Vue => {
    Vue.component('index-nova-inline-relationship-extended', require('./components/IndexField').default);
    Vue.component('detail-nova-inline-relationship-extended', require('./components/DetailField').default);
    Vue.component('form-nova-inline-relationship-extended', require('./components/FormField').default);

    Vue.config.devtools = false;
});
