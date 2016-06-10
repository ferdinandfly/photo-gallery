'use strict';

var config = require('./config');
var gulp = require('gulp');

require('./tasks/styles');
require('./tasks/script-react');
require('./tasks/images');
gulp.task('dev', [ 'watch-styles', "watch-images", 'script-react'] );
gulp.task('prod', [ 'styles', "images", 'script-react-prod']);
gulp.task('watch', ['watch-styles']);
