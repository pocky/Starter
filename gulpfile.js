var gulp        = require('gulp');
var less        = require('gulp-less');
var minifyCSS   = require('gulp-minify');
var jshint      = require('gulp-jshint');
var uglify      = require('gulp-uglify');
var gulpif      = require('gulp-if');
var shell       = require('gulp-shell');
var livereload  = require('gulp-livereload');
var copy        = require('gulp-copy');
var del         = require('del');
var path        = require('path');
var argv        = require('yargs').argv;

var prod = !!(argv.prod);

gulp.task('rjs', shell.task([
        'node ./node_modules/.bin/r.js -o build.js'
    ])
);

gulp.task('less', function() {
    gulp.src('./app/Resources/assets/less/{,*/}*.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .on('error', function(error) {
            console.log(error);
            this.emit('end');
        })
        .pipe(gulpif(prod, minifyCSS()))
        .pipe(gulp.dest('./web/assets/css'));
});

gulp.task('lint', function() {
    gulp.src('./app/Resources/assets/js/{,*/}*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(jshint.reporter('fail'));
});

gulp.task('copy', function() {
    gulp.src('./app/Resources/assets/**')
        .pipe(copy('./web/assets/', {prefix: 3} ));
});

gulp.task('del', function() {
   del(['./web/assets/less']);
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('./app/Resources/assets/{less,js}/{,*/}*.{less,js}', ['less', 'lint', 'copy'])
        .on('change', livereload.changed);
});

gulp.task('default', [
    'less',
    'lint',
    'rjs',
    'del'
]);

module.exports = gulp;
