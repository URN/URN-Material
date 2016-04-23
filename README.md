# URN-Material
The URN WordPress theme

![Theme preview](/screenshot.png?raw=true "Theme design")

## Quick Start
Note: The following presumes that you already have a mysql and apache server installed locally.

1. Install Node.js from https://nodejs.org/en/ then run <code>npm install</code> from the command line at the project root
2. Run <code>npm install -g grunt-cli</code> to install [grunt](https://github.com/gruntjs/grunt) and grunt plugins
3. Install Ruby for your OS and make sure to check the option to add it to your PATH variable if on Windows
4. Run <code>gem update --system</code>
5. Run <code>gem install scss_lint</code>
6. Run <code>npm install grunt-scss-lint</code>
7. Run <code>gem install compass</code>
8. Run <code>npm install grunt-contrib-compass</code>
9. Run <code>grunt</code> from the command line within the project directory to start watching the project
10. Grunt should now compile your CSS as you edit the SCSS files

## Grunt
### `grunt mirror`
[Get a complete mirror](https://github.com/URN/URN-Material/blob/94177fc0245dcfbde6c5d6365ef6b42ff3dca9e1/Gruntfile.js#L34-L37) of the live WordPress database locally.

##### Requirements:
- Have `urn` ssh alias set
- Set the `$URNLOCAL` environment variable to the local development url (e.g. `http://localhost` or `http://urn.local`)
- Local MySQL username: `root`
- Local MySQL password: `password`

### `grunt --force`
Keep tasks running even if the SCSS lint fails (useful for development when CSS is still in-progress but make sure the linter passes before committing any SASS)
