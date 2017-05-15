var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var concatCss = require('gulp-concat-css');
var livereload = require('gulp-livereload');
var minify = require('gulp-minify');

// CONCAT AND MINIFY CSS
gulp.task('minify-concat-css', function() {
	return gulp
		.src('./css/style.css')
		.pipe(concatCss('style.min.css'))
		.pipe(cleanCSS({ compatibility: 'ie8' }))
		.pipe(gulp.dest('dist'));
});

// CONCAT AND MINIFY JS
gulp.task('concat-min-js', function() {
	return (gulp
			.src('./js/*.js')
			//return gulp.src(['./js/file3.js', './js/file1.js', './js/file2.js'])
			.pipe(concat('script.min.js'))
			.pipe(
				minify({
					ext: {
						min: '.js'
					},
					exclude: ['tasks'],
					ignoreFiles: ['.combo.js', '-min.js'],
					noSource: true
				})
			)
			.pipe(gulp.dest('dist')) );
});

// RELOAD PAGE
gulp.task('reload', function() {
	//source moi et met moi dans le meme flux tout les fichier et pour tout les fichier qui passe dans le pipe refresh
	gulp.src('./*.html').pipe(livereload());
});

// RELOAD AFTER MINIFY
gulp.task('reload-css', ['minify-concat-css'], function() {
	gulp.src('./*.html').pipe(livereload());
});

gulp.task('default', function() {
	livereload.listen();
	gulp.watch('./*.html', ['reload']);
	gulp.watch('./css/*.css', ['reload-css']);
	gulp.watch('./js/*.js', ['concat-min-js']);
});
