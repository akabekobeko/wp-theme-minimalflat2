// 汎用タスク定義
require( 'require-dir' )( './gulp/tasks', { recurse: true } );

var gulp = require( 'gulp' );

/**
 * 開発用リソースの変更を監視して、必要ならビルドを実行します。
 */
gulp.task( 'watch', [ 'css' ], function () {
    gulp.watch( [ './src/stylus/*.styl' ], [ 'css' ] );
} );

/**
 * 既定のタスクです。
 */
gulp.task( 'default', [ 'watch' ] );
