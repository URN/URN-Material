# URN-Material
The URN WordPress theme

## Quick Start
1. Run <code>npm install</code> from the command line at the project root to install [grunt](https://github.com/gruntjs/grunt) and grunt plugins
2. Run <code>grunt</code> from the command line within the project directory to start watching the project
3. Grunt should compile your CSS as you edit the SCSS files

## URLs
Production - [`prod.urn1350.net`](http://prod.urn1350.net)

Development - [`dev.urn1350.net`](http://dev.urn1350.net) (not in use until production version goes live)

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
