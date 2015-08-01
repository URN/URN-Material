module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json')
    });

    grunt.initConfig({
        scsslint: {
            all: [
                'sass/**/*.scss'
            ]
        }
    });

    grunt.loadNpmTasks('grunt-scss-lint');

    grunt.registerTask('default', ['scsslint']);

};
