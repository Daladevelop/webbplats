var gulp = require( 'gulp' ),
	plugins = require( 'gulp-load-plugins' )();

gulp.task( 'scripts', function() {
	return gulp.src( './daladevelop/assets/js/main.js' )
		.pipe( plugins.plumber() )
		.pipe( plugins.requirejsOptimize( {
			baseUrl: './daladevelop/assets/js',
			include: [ 'require.js', 'main' ],
			insertRequire: [ 'main' ],
			wrap: true
		} ) )
		.pipe( plugins.uglify() )
		.pipe( plugins.rename( { extname: '.min.js' } ) )
		.pipe( gulp.dest( './daladevelop/assets/js' ) );
} );

gulp.task( 'styles', function() {
	gulp.src( './daladevelop/assets/scss/*.scss' )
		.pipe( plugins.plumber() )
		.pipe( plugins.sourcemaps.init() )
		.pipe( plugins.sass( {
			errLogToConsole: true
		} ) )
		.pipe( plugins.autoprefixer( '> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1' ) )
		.pipe( plugins.sourcemaps.write( './' ) )
		.pipe( gulp.dest( './daladevelop/assets/css' ) );
} );

gulp.task( 'sprites', function() {
	return gulp.src( './daladevelop/assets/img/svg/*.svg' )
		.pipe( plugins.svgSprites( {
			mode: 'symbols',
			preview: false,
			svg: {
				symbols: 'icons.svg'
			}
		} ) )
		.pipe( gulp.dest( './daladevelop/assets/img' ) );
} );

gulp.task( 'watch', function() {
	plugins.livereload.listen();
	
	gulp.watch( [ './daladevelop/assets/js/**/*.js', '!./daladevelop/assets/js/main.min.js' ], [ 'scripts' ] );
	gulp.watch( './daladevelop/assets/scss/**/*.scss', [ 'styles' ] );
	gulp.watch( './daladevelop/assets/img/svg/*.svg', [ 'sprites' ] );
	
	gulp.watch( [ './daladevelop/**/*.html', './daladevelop/**/*.php' , './daladevelop/assets/css/*.css' ] ).on( 'change', function( file ) {
		plugins.livereload.changed( file.path );
	} );
} );