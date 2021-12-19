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
        watch: {
            src: {
                options: {
                    livereload: true,
                },
                tasks: ['minify'],
                files: ['public/assets/.grunt/sass/**/*.scss', 'public/assets/.grunt/js/**/*.js'],
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('minify', ['sass', 'uglify']);
};