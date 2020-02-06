//The "wrapper" function
module.exports = function(grunt) {

  //Project and task configuration
  const sass = require('node-sass');

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
    * Grunt Sass
    * Compile Sass to CSS using node-sass
    *
    */
    sass: {

      options: {
        implementation: sass,
        sourceMap: false
      },
      dist: {
        files: {
          'assets/css/styles.css' : 'assets/scss/styles.scss'
        }
      }
    },
    /**
    *Grunt contrib watch
    *Monitor files and execute tasks
    *
    */
    watch: {
      sass: {
        files: [
          'scss/**/*.scss'
        ],
        tasks: [
          'sass'
        ]
      },
      scripts: {
        files: [
          'js/*.js'
        ],
        tasks: [
          'uglify'
        ]
      }
    },
    /**
    * Grunt Contrib Uglify
    * Minify Javascript files
    *
    */
    uglify: {
      my_target: {
        files: {
          'js/scripts.js' : ['node_modules/jquery/dist/jquery.js', 'assets/js/scripts.js']
        }
      }
    }

  });

  //Loading Grunt plugins and tasks
  require('load-grunt-tasks')(grunt);

  //Custom tasks
  grunt.registerTask('default', ['watch']);
};
