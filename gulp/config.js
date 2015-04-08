
var stylus = './src/stylus/';

/**
 * 汎用タスクから参照される設定です。
 *
 * @type {Object}
 */
module.exports = {
    /**
     * タスク 'css' 用の設定です。Stylus ファイルを CSS にコンパイル & 結合します。
     * 結合順を保証するため、src には明示的に対象ファイルを定義しています。
     * 以下の npm に依存しています。
     *
     * gulp gulp-load-plugins gulp-stylus gulp-concat gulp-plumber gulp-sourcemaps
     */
    css: {
        src:    [ stylus + 'App.styl',
                  stylus + 'Normalize.styl',
                  stylus + 'Icon.styl',
                  stylus + 'Content.styl',
                  stylus + 'Header.styl',
                  stylus + 'Footer.styl',
                  stylus + 'Sidebar.styl'
                ],
        dest :  './src',
        bundle: 'style.css'
    }
};