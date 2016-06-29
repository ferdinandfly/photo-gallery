'use strict';

var config = require('./../config');
var gulp   = require('gulp');

gulp.task('images', function() {
    return gulp.src(config.images.src)
        .pipe(gulp.dest(config.dest.images));
});

gulp.task('watch-images', ['images'],function(){
    gulp.watch(config.images.src, ['images']);
});