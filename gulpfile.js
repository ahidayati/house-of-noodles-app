const gulp = require('gulp');
const { src, series, parallel, dest, watch } = require('gulp');
const concat = require('gulp-concat');

function compilejs() {
    return src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.js', 'assets/js/main.js'])
        .pipe(concat('all.js'))
        .pipe(dest('assets/dist/'))
}

exports.default = compilejs;