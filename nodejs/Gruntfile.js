'use strict';

module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({   
    pkg: grunt.file.readJSON('package.json'),

     jshint: {
      // define the files to lint
      files: ['gruntfile.js', 'src/*.js','src/**/*.js'],     
      options: {
          // more options here if you want to override JSHint defaults
        globals: {
          jQuery: false,
          console: true,
          module: true
        }
      }
    },  
   
    nodemon: {
      all: {
        options: {
        //  file: 'build/<%= pkg.name %>.js',       
          file: 'src/app.js',       
          nodeArgs: ['--debug'],        
          watchedExtensions: ['js'],    
          watchedFolders: ['src'],    
          delayTime: 1,      
          env: {
            PORT: '8181'
          },  
        }
      },    
    },

    watch: {
      gruntfile: {
        files: '<%= jshint.files %>',
       // tasks: ['jshint','concat']
        tasks: ['jshint']
      },      
    },

    concurrent: {
      target: {
        tasks: ['nodemon', 'watch'],
        options: {
          logConcurrentOutput: true
        }
      }
    }
  });

  // These plugins provide necessary tasks.  
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-nodemon');
  grunt.loadNpmTasks('grunt-concurrent');

  // Default task.
  grunt.registerTask('default', ['concurrent']);

};
