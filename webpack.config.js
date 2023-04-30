const path = require('path');

module.exports = {
    resolve: {
        extensions: ['.js', '.vue', 'json', '.*scss'],
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
    devtool: "source-map",
};
