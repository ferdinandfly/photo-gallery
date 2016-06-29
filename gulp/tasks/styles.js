'use strict';

var config = require('./../config');
var gulp = require('gulp');
var concat = require('gulp-concat');
var cleanCss    = require('gulp-clean-css');
var environments = require('gulp-environments');
var production = environments.production;
var sass = require('gulp-sass');

var sassOptions = {
    outputStyle: 'compressed'
};

gulp.task('styles',function() {
    return gulp.src(config.sass.src)
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(concat(config.sass.dest))
        .pipe(production(cleanCss()))
        .pipe(gulp.dest(config.dest.css))
});

gulp.task('watch-styles', ['styles'],function(){
    gulp.watch(config.sass.src, ['styles']);
});

gulp.task('styles-vendor',function() {
    return gulp.src(config.css.src)
        .pipe(concat(config.css.dest))
        .pipe(production(cleanCss()))
        .pipe(gulp.dest(config.dest.css))
});

gulp.task('watch-styles-vendor',['styles-vendor'], function(){
    gulp.watch(config.css.src, ['styles-vendor']);
});