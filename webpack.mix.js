const mix = require('laravel-mix');

//__ the src path were not correctly rendered (object instead of a string)
mix.override(webpackConfig => {
    webpackConfig.module.rules.forEach(rule => {
        if (rule.test.toString() === '/(\\.(png|jpe?g|gif|webp)$|^((?!font).)*\\.svg$)/') {
            if (Array.isArray(rule.use)) {
                rule.use.forEach(ruleUse => {
                    if (ruleUse.loader === 'file-loader') {
                        ruleUse.options.esModule = false;
                    }
                });
            }
        }
    });
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .vue({
        transformAssetUrls: {
            video: ['src', 'poster'],
            source: 'src',
            img: 'src',
            image: ['xlink:href', 'href'],
            use: ['xlink:href', 'href']
        }
    })
    .webpackConfig(require('./webpack.config'));
