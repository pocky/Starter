requirejs.config({
    baseUrl: '/assets/js',
    paths: {
        jquery: [
            '//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min',
            '../vendor/jquery/jquery.min'
        ],
        bootstrap: [
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min',
            '../vendor/admin-lte/js/bootstrap.min'
        ]
    },
    shim: {
        bootstrap: ['jquery']
    }
});