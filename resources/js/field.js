Nova.booting((Vue, router) => {
  Vue.component("index-nova-toggle", require("./components/IndexField").default);
  Vue.component("detail-nova-toggle", require("./components/DetailField").default);
  Vue.component("form-nova-toggle", require("./components/FormField").default);
});
