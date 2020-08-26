const gulp = require('gulp');

// Копируем все шрифты из папки dev в dist

// module.exports = function fonts() {
//   return gulp.src('dev/static/fonts/**/*.*')
//     .pipe(gulp.dest('dist/static/fonts'))
// };
module.exports = function fonts() {
  gulp.src('dev/static/css/**/*.*')
      .pipe(gulp.dest('dist/static/css'))
  gulp.src('dev/static/js/vendor/**/*.*')
      .pipe(gulp.dest('dist/static/js/vendor'))

  return gulp.src('dev/static/fonts/**/*.*')
    .pipe(gulp.dest('dist/static/fonts'))
};
