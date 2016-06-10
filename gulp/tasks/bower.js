'use strict';

var config = require('./../config');
var gulp = require('gulp');
var bower = require('gulp-bower');

// Run bower install
gulp.task('bower', function() {
    return bower({
        cwd: config.bower.workingDirectory,
        directory: config.bower.components
    })
});
