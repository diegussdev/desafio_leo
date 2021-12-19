module.exports = grunt => {
    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'public/assets/css/main.min.css': ['public/assets/.grunt/sass/main.scss']
                }
            }
        },
        uglify: {
            options: {
                mangle: true
            },
            file_min_js: {
                files: {
                    'public/assets/js/main.min.js': 'public/assets/.grunt/js/main.js'
                }
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('minify', ['sass', 'uglify']);
};