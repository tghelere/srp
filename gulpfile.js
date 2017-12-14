const 	gulp = require('gulp'),
		sass = require('gulp-sass'),
		watch = require('gulp-watch'),
		uglify = require('gulp-uglify'),
		concat = require('gulp-concat'),
		util = require('gulp-util')
		cssmin = require('gulp-cssmin'),
		stripCssComments = require('gulp-strip-css-comments'),
		jshint = require('gulp-jshint')

const 	js = [
	'./scripts/plugins/*.js',
    './scripts/main.js'
]

gulp.task('hint', () => {
	return gulp.src(js[1])
	.pipe(jshint())
	.pipe(jshint.reporter('default'))
})

gulp.task('minify-js', () => {
	return gulp.src(js)
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js/'))
})

gulp.task('sass', () => {
	return gulp.src('sass/**/*.sass')
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	.pipe(gulp.dest('styles/'))
})

gulp.task('minify-css', ['sass'], () => {
    return gulp.src('styles/*.css')    
    .pipe(stripCssComments({all: true}))
    .pipe(cssmin())
    .pipe(gulp.dest('assets/css/'))
});

gulp.task('watch', ['sass', 'minify-css', 'minify-js'], () => {
	gulp.watch(js, ['hint'])
	gulp.watch(js, ['minify-js'])
	gulp.watch('sass/**/*.sass', ['sass'])
	gulp.watch('assets/css/*.css', ['minify-css'])
})

gulp.task('default', ['sass', 'minify-js', 'minify-css', 'hint', 'watch'])