const gulp = require('gulp')
const sass = require('gulp-sass')
const watch = require('gulp-watch')

gulp.task('sass', () => {
	return gulp.src('sass/**/*.sass')
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	.pipe(gulp.dest('assets/css/'))
})

gulp.task('watch', () => {
	gulp.watch('sass/**/*.sass', ['sass'])
})

gulp.task('default', ['sass', 'watch'])