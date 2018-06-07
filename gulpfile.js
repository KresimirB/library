var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
// var browserify = require("browserify");

gulp.task('pozovi', function() {
    console.log('di si sokre');
});

gulp.task('scss', function(){
    return gulp.src('production/scss/**/*.scss')
           .pipe(sass())
           .pipe(gulp.dest('production/css'))
           .pipe(browserSync.reload({
               stream: true
           }))
});

gulp.task('watch', ['browserSync', 'scss'], function(){
    gulp.watch('production/scss/**/*.scss', ['scss']);
    gulp.watch('production/*.html', browserSync.reload);
    gulp.watch('production/js/**/*.js', browserSync.reload);
})

gulp.task('browserSync', function() {
    browserSync.init({
      server: {
        baseDir: 'production'
      },
    })
  })

  gulp.task('useref', function(){
    return gulp.src('production/*.html')
      .pipe(useref())
      // Minifies only if it's a JavaScript file
      .pipe(gulpIf('*.js', uglify()))
      .pipe(gulpIf('*.css', cssnano()))
      .pipe(gulp.dest('distribution'))
  });