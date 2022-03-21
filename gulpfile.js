const gulp = require('gulp');
const { src, series, parallel, dest, watch } = require('gulp');
const concat = require('gulp-concat');
const sass = require('gulp-sass')(require('sass'));
const prefix = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');


// function to compile js files
function compilejs() {
    return src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.js', 'assets/js/main.js'])
        .pipe(concat('all.js'))
        .pipe(dest('assets/dist/'))
}

// function to convert and compile scss to css
function compilescss(){
    return src('assets/scss/main.scss')
        .pipe(sass())
        .pipe(prefix())
        .pipe(minify())
        .pipe(dest('assets/dist/'))
}

// watchtask
function watchTask(){
    watch('assets/js/main.js', compilejs);
    watch('assets/scss/main.scss', compilescss);
}

// default gulp
// run gulp on cli to run the default function
exports.default = series(
    compilejs,
    compilescss,
    watchTask
);