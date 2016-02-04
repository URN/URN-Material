module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        scsslint: {
            all: [
                'sass/_partials/*.scss'
            ]
        },

        compass: {
            dist: {
                options: {
                    config: 'config.rb'
                }
            }
        },

        watch: {
            options: {
                livereload: true,
            },
            css: {
                files: ['sass/**/*.scss'],
                tasks: ['compass'],
            },
        },

        shell: {
            mirror: {
                command: [
                    'ssh urn \'mysqldump -u readonlyuser wordpress > ~/wordpress-dump.sql\'',
                    'scp urn:~/wordpress-dump.sql /tmp/wordpress-dump.sql',
                    'mysql -u root -ppassword wordpress < /tmp/wordpress-dump.sql',
                    'mysql -u root -ppassword -e "UPDATE wordpress.wp_options SET option_value = \'${URNLOCAL}\' WHERE option_name = \'siteurl\' OR option_name= \'home\';"'
                ].join('&&')
            },
            options: {
                stdout: true
            }
        }
    });

    grunt.loadNpmTasks('grunt-scss-lint');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-shell');

    grunt.registerTask('default', ['scsslint', 'compass', 'watch']);
    grunt.registerTask('mirror', ['shell:mirror']);
};
