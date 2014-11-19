({
    mainConfigFile: './app/Resources/assets/js/common.js',
    baseUrl: './js',
    appDir: 'app/Resources/assets',
    dir: 'web/assets',
    modules: [
        {
            name: 'common',
            include: ['jquery', 'bootstrap']
        },
        {
            name: 'app/base',
            exclude: ['common']
        }
    ],
    paths: {
        jquery: "empty:",
        bootstrap: "empty:"
    }
})
