var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var minifyCSS = require('gulp-minify');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var gulpif = require('gulp-if');
var shell = require('gulp-shell');
var livereload = require('gulp-livereload');
var argv = require('yargs').argv;

var prod = !!(argv.prod);

gulp.task('rjs', shell.task([
        'node ./node_modules/.bin/r.js -o build.js'
    ])
);

gulp.task('less', function() {
    gulp.src('./web/assets/less/{,*/}*.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .on('error', function(error) {
            console.log(error);
            this.emit('end');
        })
        .pipe(gulpif(prod, minifyCSS()))
        .pipe(gulp.dest(gulpif(prod, './web/assets-prod/css', './web/assets/css')));
});

gulp.task('lint', function() {
    gulp.src('./web/assets/js/{,*/}*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(jshint.reporter('fail'));
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('./web/assets/less/{,*/}*.less', ['less'])
        .on('change', livereload.changed);
});

gulp.task('default', [
    'less',
    'lint',
    'rjs'
]);

module.exports = gulp;
