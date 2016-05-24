module.exports = function(grunt) {
	
	
	grunt.initConfig({
		
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			'wp-content/themes/cn1/js/build/main.js': ['wp-content/themes/cn1/js/src/plugins.js', 'wp-content/themes/cn1/js/src/main.js']
		},
		compass: {
			dist: {
				options: {
					config: 'config.rb'
				}
			}
		},
		watch: {
			js: {
				files: ['wp-content/themes/cn1/js/src/*.js'],
				tasks: ['uglify']
			},
			css: { 
				files: ['**/*.scss'],
				tasks: ['compass']
			}
		
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-uglify'); // load the given tasks
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	grunt.registerTask('default', ['uglify','compass','watch']);
}
