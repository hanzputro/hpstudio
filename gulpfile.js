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
        'assets/sass/**/*.scss'
        ])
        .pipe(wait(2000))
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
        'assets/vendor/imagesloaded/imagesloaded.js',
        'assets/vendor/baguetteBox/baguetteBox.js',
        'assets/vendor/macy/dist/macy.js'
        // 'assets/js/component/classie.js',
        // 'assets/js/component/masonry.pkgd.min.js',
        // 'assets/js/component/AnimOnScroll.js',        
        // 'assets/js/component/imagesloaded.js'
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
        'assets/js/**/*.js'
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
 | WEBPACK for Vuejs 2
 |--------------------------------------------------------------------------
 */
// var webpack = require('webpack');
// var webpackConfig = require('./webpack.config.js');
// var webpackRun = webpack(webpackConfig);

// gulp.task('webpack', function(done) {
//     webpackRun.run(function(err, stats) {
//         if(err) {
//           console.log('Error', err);
//         }
//         else {
//           console.log(stats.toString());
//         }
//         done();
//     });
// });


/*
 |--------------------------------------------------------------------------
 | RUN 
 |--------------------------------------------------------------------------
*/
gulp.task('serve', ['sass', 'js-plugin', 'js-script'], function() {
    browserSync.init({
        proxy: "http://localhost/wordpress/hanifputra"
        // proxy: "lochp.com"
    });
    gulp.watch(['assets/sass/**/*.scss'], ['sass']);
    gulp.watch('assets/js/*.js', ['js-script']);
    gulp.watch('*.php', ['php']).on('change', browserSync.reload);
});

// gulp.task('default', ['webpack']);
