# concrete5.7 package with Foundation for Sites frontend

## What you get:
A concrete 5 package ready to install containing

### Blocks
    *   V-Card
    *   Clearing Lightbox with custom templates
    	- clearing featured image
    	- block grid with file description
    	- orbit slider
    	- orbit slider with description
### Custom templates
	*	Custom Templates for the autonav block (core)
		- breadcrumbs 
		- list without bullets
		- top bar
		- off canvas
		- top bar and off canvas (topbar on large, off canvas on medium and small)
		- side nav templates (one aligning left, the other right)
	*	Call to action for content block (core) 
	*	Flex video for YouTube block (core)
	*	Forms for form block (core)
	* 	Button postfix for search block (core)

### Page templates and page types
	* full
	* left sidebar
	* right sidebar
	
### Thumbnail types
	*	small
	*	medium 
	*	clearing lightbox and
	*	orbit slider

### Core stuff used

	*	File attribute 'Description' for showing captions
	*	Picture element and picturefill.js are used for responsive images (image block and redactor)


## Working with the package
- In packages/foundation_sites/themes/foundation_sites execute `bower install` 
- use `gulp`(this runs with browser-sync) or `gulp dev`to compile the /css/main.css stylesheet. You can compile your stylesheet with `compass compile` or `compass watch`, too.
- Check [Foundation docs](http://foundation.zurb.com/docs/sass.html)

### License
This concrete 5.7 package is licensed under the terms of the MIT license.

The [entypo](http://www.flaticon.com/packs/entypo) icons by [Daniel Bruce](http://www.flaticon.com/authors/daniel-bruce) are licensed under [CC BY 3.0](http://creativecommons.org/licenses/by/3.0/).

### Recommended tools

  * Ruby 1.9+
  * [Node.js](http://nodejs.org)
  * [Sass](http://www.sass-lang.org)
  * [compass](http://compass-style.org/): `gem install compass-sourcemaps --pre`
  * [bower](http://bower.io): `npm install -g bower grunt-cli`
  * [gulp.js](http://gulpjs.com/)
  * [bundler](http://bundler.io/)
