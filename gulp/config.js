/**
 * 汎用タスクから参照される設定です。
 *
 * @type {Object}
 */
module.exports = {
    /**
     * タスク 'css' 用の設定です。Stylus ファイルを CSS にコンパイルします。
     * 以下の npm に依存しています。
     *
     * gulp gulp-load-plugins gulp-stylus gulp-concat gulp-plumber gulp-sourcemaps
     *
     * @type {Object}
     */
    css: {
        // concat を考慮すると明示的に順番指定するほうが安全かも
        src:    [ './src/stylus/*.styl' ],
        dest :  './src',
        bundle: 'style.css'
    }
};