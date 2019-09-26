let gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer')

gulp.task('sass', function () {
    return gulp.src([
        'src/scss/style.scss'
    ])
        .pipe(sass({uotputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer([
                'last 15 version',
                'ie 10',
                'ie 9'],
            {cascade: true}))
        .pipe(gulp.dest('./'))
})

gulp.task('scripts', ['scripts_core'], function () {
    return gulp.src([
        'src/js/*.js'
    ])
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('assets/js'))
});

gulp.task('scripts_core', function () {
    return gulp.src([
        'src/js/core/jquery-3.4.1.min.js'
    ])
        .pipe(concat('core.js'))
        .pipe(gulp.dest('assets/js/core'))
});

gulp.task('watch', ['sass', 'scripts'], function () {
    gulp.watch('src/scss/**/*.scss',['sass'])
    gulp.watch('src/js/**/*.js', ['scripts'])
});

gulp.task('default', ['watch']);