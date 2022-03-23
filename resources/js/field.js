Nova.booting((Vue, router, store) => {
  Vue.component('index-collapsible-field', require('./components/IndexField'))
  Vue.component('detail-collapsible-field', require('./components/DetailField'))
  Vue.component('form-collapsible-field', require('./components/FormField'))
})
