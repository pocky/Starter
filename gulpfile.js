var gulp = require('gulp');
var compass = require('gulp-compass');
var minifyCSS = require('gulp-minify-css');
var jshint = require('gulp-jshint');
var rjs = require('gulp-requirejs');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');
var gulpif = require('gulp-if');
var argv = require('yargs').argv;

var production = !!(argv.production);

gulp.task('rjs', function() {
    rjs({
        baseUrl: './web/assets/js/{,*/}*.js',
        mainConfigFile: 'web/assets/js/common.js',
        dir: './web/assets-built',
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
        .pipe(gulpif(production, uglify()))
        .pipe(gulp.dest('./web/assets-built/js'));
});

gulp.task('compass', function() {
    gulp.src('./web/assets/sass/{,*/}*.scss')
        .pipe(compass({
            config_file: './config.rb',
            css: './web/assets-built/css',
            sass: './web/assets/sass'
        }))
        .on('error', function(error) {
            console.log(error);
            this.emit('end');
        })
        .pipe(gulpif(production, minifyCSS()))
        .pipe(gulp.dest('./web/assets-built/css'));
});

gulp.task('lint', function() {
    gulp.src('./web/assets/js/{,*/}*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(jshint.reporter('fail'));
});

gulp.task('default', [
    'compass',
    'lint',
    'rjs'
]);