module.exports = function(grunt) {

    grunt.initConfig({
        phpunit: {
            'default': {
                cmd: 'phpunit',
                args: []
            }
        }
    });

    grunt.registerMultiTask('phpunit', 'Runs all PHPUnit unit tests.', function() {
        grunt.util.spawn({
            cmd: this.data.cmd,
            args: this.data.args,
            opts: {stdio: 'inherit'}
        }, this.async());
    });

    grunt.registerTask('test', 'Runs all unit test tasks.', ['phpunit']);

    grunt.registerTask('default', ['test']);

};
