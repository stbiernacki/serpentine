import Vue from "vue";

const globalAppComponents = require.context(
    "./",
    true,
    /App[A-Z]\w+\/index\.(vue|js)$/
);

globalAppComponents.keys().forEach(function (fileName) {
    let baseComponentConfig = globalAppComponents(fileName);
    baseComponentConfig = baseComponentConfig.default || baseComponentConfig;

    let baseComponentName =
        baseComponentConfig.name ||
        fileName.replace(/^.+\//, "").replace(/\.\w$/, "");
    Vue.component(baseComponentName, baseComponentConfig);
});
