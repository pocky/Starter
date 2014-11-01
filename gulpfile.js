var gulp = require('gulp');
var compass = require('gulp-compass');
var minifyCSS = require('gulp-minify-css');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var gulpif = require('gulp-if');
var shell = require('gulp-shell');
var argv = require('yargs').argv;

var prod = !!(argv.prod);

gulp.task('rjs', shell.task([
        'node ./node_modules/.bin/r.js -o build.js'
    ])
);

gulp.task('compass', function() {
    gulp.src('./web/assets/sass/{,*/}*.scss')
        .pipe(compass({
            config_file: './config.rb',
            sass: './web/assets/sass'
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
    gulp.watch('./web/assets/sass/{,*/}*.scss', ['compass']);
});

gulp.task('default', [
    'compass',
    'lint',
    'rjs'
]);

module.exports = gulp;
