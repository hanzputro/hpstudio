process.env.DISABLE_NOTIFIER = true;
// elixir.config.sourcemaps = false;

var bowerDir = 'assets/vendor/';
var gulp = require("gulp");
var php = require('gulp-connect-php');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minifier');
var wait = require('gulp-wait');   
var browserSync = require('browser-sync').create();


/*
 |--------------------------------------------------------------------------
 | SASS
 |--------------------------------------------------------------------------
*/
gulp.task('sass', function () { 
    gulp.src([
        'assets/sass/*.scss'
        ])
        .pipe(sass())
        .pipe(minify({
            minify: true,
            collapseWhitespace: true,
            conservativeCollapse: true,
            minifyJS: true,
            minifyCSS: true,
            getKeptComment: function (content, filePath) {
                var m = content.match(/\/\*![\s\S]*?\*\//img);
                return m && m.join('\n') + '\n' || '';
            }
        }))
        .pipe(gulp.dest(''))
        .pipe(browserSync.stream());
});


/*
 |--------------------------------------------------------------------------
 | JS
 |--------------------------------------------------------------------------
*/
gulp.task('js-plugin', function () {
    gulp.src([        
        'assets/vendor/bxslider-4/dist/jquery.bxslider.js',
        'assets/vendor/baguetteBox/dist/baguetteBox.js'
    ])
    .pipe(minify({
        minify: true,
        collapseWhitespace: true,
        conservativeCollapse: true,
        minifyJS: true,
        minifyCSS: true,
        getKeptComment: function (content, filePath) {
            var m = content.match(/\/\*![\s\S]*?\*\//img);
            return m && m.join('\n') + '\n' || '';
        }
    }))
    .pipe(concat('plugins.js'))
    .pipe(gulp.dest('dist/js'));
});
gulp.task('js-script', function () {
    gulp.src([        
        'assets/js/*.js'
    ])
    .pipe(minify({
        minify: true,
        collapseWhitespace: true,
        conservativeCollapse: true,
        minifyJS: true,
        minifyCSS: true,
        getKeptComment: function (content, filePath) {
            var m = content.match(/\/\*![\s\S]*?\*\//img);
            return m && m.join('\n') + '\n' || '';
        }
    }))
    .pipe(gulp.dest('dist/js'))
    .pipe(browserSync.stream());
});


/*
 |--------------------------------------------------------------------------
 | PHP
 |--------------------------------------------------------------------------
*/
gulp.task('php', function() {
    php.server({ base: '', port: 3000, keepalive: true});
});


/*
 |--------------------------------------------------------------------------
 | RUN 
 |--------------------------------------------------------------------------
*/
gulp.task('serve', ['sass', 'js-plugin', 'js-script'], function() {
    browserSync.init({
        // proxy: "http://localhost/wordpress/ccw2017"
        proxy: "lochp.com"
    });
    gulp.watch(['assets/sass/*/**.scss'], ['sass']);
    gulp.watch('assets/js/*.js', ['js-script']);
    gulp.watch('*.php', ['php']).on('change', browserSync.reload);
});

gulp.task('default', ['sass', 'js-plugin', 'js-script']);
