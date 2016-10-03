var batch = require('gulp-batch');
var browserSync = require('browser-sync').create();
var clean = require('gulp-clean');
var clearFix = require('postcss-clearfix');
var colorShort = require('postcss-color-short');
var cssMqpacker = require('css-mqpacker');
var cssNano = require('cssnano');
var discardComments = require('postcss-discard-comments');
var focus = require('postcss-focus');
var gulp = require('gulp');
var postcss = require('gulp-postcss');
var precss = require('precss');
var atImport = require('postcss-import');
var px2Rem = require('postcss-pxtorem');
var short = require ('postcss-short');
var cssnext = require('postcss-cssnext');
var size = require('postcss-size');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var watch = require('gulp-watch');
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');

gulp.task('postcss', function () {
  var processors = [
    atImport,
    precss,
    colorShort,
    focus,
    cssnext({browsers: ['last 2 versions']}),
    short,
    size,
    clearFix,
    px2Rem,
    cssMqpacker,
    discardComments,
    cssNano
  ];

  var reportError = function (error) {
    notify({
        title: 'Gulp Task Error',
        message: 'Check the console.'
    }).write(error);

    console.log(error.toString());

    this.emit('end');
  }

  return gulp.src('build/scss/style.css')
    .pipe(plumber({
          errorHandler: reportError
      }))
    .pipe(postcss(processors))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream())
    .on('error', reportError);
});

// JavaScript
gulp.task( 'customJS', function() {
    return gulp.src( 'build/js/*.js' )
    .pipe( concat( 'custom.js' ) )
    .pipe( gulp.dest( './js/' ) )
    .pipe( rename( {
      basename: 'custom',
      suffix: '.min'
    }))
    .pipe( uglify() )
    .pipe( gulp.dest( './js/' ) )
    .pipe( notify( { message: 'TASK: "customJs" Completed! 💯', onLast: true } ) );
 });

gulp.task('js', function () {
  return gulp.src('build/js/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('./js'))
    .pipe(browserSync.stream());
});

var localDevUrl = 'local.dev/code387/';
// Live reload sync on every screen connect to localhost
gulp.task('init-live-reload', function() {
  browserSync.init({
    proxy: localDevUrl,
    notify: false,
    open:false
  });
});

// Watch Files For Changes
gulp.task('dev-watch', function() {
  gulp.watch( './build/js/*.js', ['customJS'] );
  gulp.watch( './build/scss/*.css', ['postcss']);
  gulp.watch( './**/*.php').on('change', browserSync.reload);
  gulp.watch( './style.css').on('change', browserSync.reload);
});

gulp.task('dev-watch-sync', ['init-live-reload', 'dev-watch']);

// Default Task
gulp.task('default', ['dev-watch-sync']);
