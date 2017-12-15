const 	gulp = require('gulp'),
		clean = require('gulp-clean'),
		sass = require('gulp-sass'),
		watch = require('gulp-watch'),
		uglify = require('gulp-uglify'),
		concat = require('gulp-concat'),
		util = require('gulp-util')
		cssmin = require('gulp-cssmin'),
		stripCssComments = require('gulp-strip-css-comments'),
		jshint = require('gulp-jshint'),
		cleanCss = require('gulp-clean-css'),
		imagemin = require('gulp-imagemin'),
		imageminPngquant = require('imagemin-pngquant'),
		imageminZopfli = require('imagemin-zopfli'),
		imageminMozjpeg = require('imagemin-mozjpeg'),
		imageminGiflossy = require('imagemin-giflossy')


const	img = [
	'./assets/img/*',
	'./assets/css/images/*'
]

const 	js = [
	'./scripts/plugins/*.js',
    './scripts/main.js'
]

const fonts = [
	'./fonts/*',
	'./assets/fonts/'
]

const cache = [
	'./cache/*',
	'./compile/*'
]

gulp.task('cleanCache', () => {
	return gulp.src(cache)
	.pipe(clean())
})
gulp.task('cleanCss', () => {
	return gulp.src('./assets/css/*.css')
	.pipe(clean())
})
gulp.task('cleanJs', () => {
	return gulp.src('./assets/js/*.js')
	.pipe(clean())
})
gulp.task('cleanImg', () => {
	return gulp.src(img[0])
	.pipe(clean())
})
gulp.task('cleanImgStyle', () => {
	return gulp.src(img[1])
	.pipe(clean())
})
gulp.task('cleanFonts', () => {
	return gulp.src(fonts[1])
	.pipe(clean())
})



gulp.task('mv-fonts', ['cleanFonts'], () => {
	return gulp.src(fonts[0])
	.pipe(gulp.dest(fonts[1]))
})

gulp.task('hint', () => {
	return gulp.src(js[1])
	.pipe(jshint())
	.pipe(jshint.reporter('default'))
})

gulp.task('minify-js', ['cleanJs'], () => {
	return gulp.src(js)
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/js/'))
})

gulp.task('sass-minify', ['cleanCss'], () => {
	return gulp.src('./sass/**/*.sass')
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))	
	.pipe(stripCssComments({all: true}))
	.pipe(cleanCss())
	.pipe(cssmin())	
	.pipe(gulp.dest('./assets/css/'))
})

gulp.task('imagemin', ['cleanImg'], () => {
    return gulp.src('./img/**/*')    		
        .pipe(imagemin([
            imageminPngquant({speed: 1,quality: 98}),
            imageminZopfli({more: true}),
            imageminGiflossy({optimizationLevel: 3,optimize: 3,lossy: 2}),
            imagemin.svgo({plugins: [{removeViewBox: false}]}),
            imagemin.jpegtran({progressive: true}),
            imageminMozjpeg({quality: 90})
        ]))
        .pipe(gulp.dest('./assets/img/'))
})

gulp.task('imagemin-style', ['cleanImgStyle'], () => {
    return gulp.src('./img-style/**/*')    		
		.pipe(imagemin([
			imageminPngquant({speed: 1,quality: 98}),
			imageminZopfli({more: true}),
			imageminGiflossy({optimizationLevel: 3,optimize: 3,lossy: 2}),
			imagemin.svgo({plugins: [{removeViewBox: false}]}),
			imagemin.jpegtran({progressive: true}),
			imageminMozjpeg({quality: 90})
		]))
        .pipe(gulp.dest('./assets/css/images/'))
})

gulp.task('watch', () => {
	gulp.watch(js, ['hint'])
	gulp.watch(js, ['minify-js'])
	gulp.watch('./sass/**/*.sass', ['sass-minify'])	
	gulp.watch('./img/**/*', ['imagemin'])	
	gulp.watch('./img-style/**/*', ['imagemin-style'])	
})

gulp.task('default', ['cleanCache', 'mv-fonts', 'sass-minify', 'minify-js', 'hint', 'imagemin', 'imagemin-style', 'watch'])