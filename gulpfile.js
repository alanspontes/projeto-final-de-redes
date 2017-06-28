'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');


//task para o sass
//gulp.task('sass', function () {
  //return sass('/sass/*.sass').pipe(sass(gulp.dest('css')))});

gulp.task('sass', function () {
    return gulp.src('sass/**/*.sass')
       .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('css'));
});

gulp.task('watch', function () {
    gulp.watch('sass/**/*.sass', ['sass']);
});

//task para default
gulp.task('default', ['sass', 'watch']);


