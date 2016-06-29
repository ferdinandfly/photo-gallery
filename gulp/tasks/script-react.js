'use strict';

var config     = require('./../config');
var gulp        = require('gulp');
var gutil       = require('gulp-util');
var source     = require('vinyl-source-stream');
var buffer     = require('vinyl-buffer');
var browserify = require('browserify');
var watchify   = require('watchify');
var babelify   = require('babelify');
var rename     = require('gulp-rename');
var uglify     = require('gulp-uglify');


gulp.task('script-react', function() {
    var bundler = browserify({
        entries: [config.react.src],
        debug: true,
        cache: {},
        packageCache: {},
        fullPaths: true
    }).transform(babelify);

    var watcher  = watchify(bundler);

    return watcher
        .on('update', function () {
            var updateStart = Date.now();
            console.log('Updating!');
            watcher.bundle()
                .on('error', gutil.log.bind(gutil, 'Browserify Error', gutil.colors.red('411')))
                .pipe(source(config.react.src))
                .pipe(buffer())
                .on('error', gutil.log)
                .pipe(rename(config.react.dest))
                .pipe(gulp.dest(config.dest.js));
            console.log('Updated!', (Date.now() - updateStart) + 'ms');
        })
        .transform(babelify)
        .bundle()
        .on('error', gutil.log.bind(gutil, 'Browserify Error', gutil.colors.red('411')))
        .pipe(source(config.react.src))
        .pipe(rename(config.react.dest))
        .pipe(gulp.dest(config.dest.js));
});

gulp.task('script-react-prod', function(){
    var bundler = browserify({
        entries: [config.react.src],
        debug: false,
        cache: {},
        packageCache: {},
        fullPaths: false
    }).transform(babelify);
    bundler
        .bundle()
        .on('error', gutil.log.bind(gutil, 'Browserify Error', gutil.colors.red('411')))
        .pipe(source(config.react.src))
        .pipe(buffer())
        .pipe(uglify())
        .pipe(rename(config.react.dest))
        .pipe(gulp.dest(config.dest.js));
});