var gulp = require( 'gulp' );
var $    = require( 'gulp-load-plugins' )();

// 共通タスク設定
var common = {
  src:  './src',
  dest: './dist'
};

/**
 * Stylus ファイルをコンパイル & 結合します。
 *
 * @return {Object} gulp ストリーム。
 */
gulp.task( 'css', function() {
  var dir = common.src + '/stylus/';
  var src = [
    dir + 'WordPress.styl',
    dir + 'Normalize.styl',
    dir + 'Icon.styl',
    dir + 'App.styl',
    dir + 'Header.styl',
    dir + 'Content.styl',
    dir + 'Sidebar.styl',
    dir + 'Footer.styl'
  ];

  return gulp.src( src )
    .pipe( $.plumber() )
    .pipe( $.sourcemaps.init() )
    .pipe( $.stylus() )
    .pipe( $.concat( 'style.css' ) )
    .pipe( $.sourcemaps.write( '.' ) )
    .pipe( gulp.dest( common.src ) );
} );

/**
 * リリース用イメージを削除します。
 *
 * @param {Function} done コールバック関数。
 */
gulp.task( 'clean', function( done ) {
  var del = require( 'del' );
  del( common.dest, done );
} );

/**
 * 指定されたファイルやフォルダを単一の ZIP ファイルに固めます。
 *
 * @return {Object} gulp ストリーム。
 */
gulp.task( 'copy', [ 'clean', 'css' ], function() {
  var src = [
    common.src + '/*.php',
    common.src + '/readme.txt',
    common.src + '/screenshot.png',
    common.src + '/style.css',
    common.src + '/fonts/**',
    common.src + '/languages/**'
  ];

  return gulp.src( src, { base: common.src } )
    .pipe( gulp.dest( common.dest ) );
} );

/**
 * リリース用イメージを ZIP ファイルに固めます。
 *
 * @return {Object} gulp ストリーム。
 */
gulp.task( 'zip', function() {
  var src  = common.dest + '/**/*';
  var file = require( './package.json' ).name + '.zip';

  return gulp.src( src, { base: common.dest } )
    .pipe( $.zip( file ) )
    .pipe( gulp.dest( './' ) );
} );

/**
 * リリース用イメージを生成します。
 *
 * @param {Function} done コールバック関数。
 */
gulp.task( 'release', [ 'copy' ], function( done ) {
  var sequence = require( 'run-sequence' );
  sequence( 'zip', done );
} );

/**
 * 開発用リソースの変更を監視して、必要ならビルドを実行します。
 */
gulp.task( 'watch', [ 'css' ], function() {
  gulp.watch( [ common.src + '/stylus/*.styl' ], [ 'css' ] );
} );

/**
 * 既定のタスクです。
 */
gulp.task( 'default', [ 'watch' ] );
