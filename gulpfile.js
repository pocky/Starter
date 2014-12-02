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
var browserify  = require('browserify');
var source      = require('vinyl-source-stream');

var prod = !!(argv.prod);

gulp.task('browserify', function() {
    browserify('./app/Resources/assets/js/common.js')
        .bundle()
        .pipe(source('common.js'))
        .pipe(gulp.dest('./web/assets/js/'));
});

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
    gulp.src('./app/Resources/assets/vendor/**')
        .pipe(copy('./web/assets/vendor/', {prefix: 4} ));
});

gulp.task('del', function() {
   del(['./web/assets/less']);
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('./app/Resources/assets/{less,js}/{,*/}*.{less,js}', ['less', 'lint', 'copy', 'browserify'])
        .on('change', livereload.changed);
});

gulp.task('default', [
    'less',
    'lint',
    'copy',
    'browserify',
    'del'
]);

module.exports = gulp;
