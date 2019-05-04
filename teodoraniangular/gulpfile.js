/**
* Dir Structure
* \src\  # Source Files
* \dist\    # Dist or converted files.
*/

var gulp = require('gulp');
var del = require('del');

gulp.task('default',  gulp.series(clean, copyIndex));

function clean(done) {
    del(['dist']);
    done();  //# Async callback for completion.
        }

function copyIndex(done) {
    return gulp.src('./src/index.html').pipe(gulp.dest('./dist', {overwrite: true}));
}