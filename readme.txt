=== SB ===
Contributors: bobbingwide, vsgloik
Donate link: https://www.oik-plugins.com/oik/oik-donate/
Tags: blocks, FSE, Gutenberg
Requires at least: 5.7
Tested up to: 5.7
Version: 0.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Second Byte: Seriously Bonkers' experimental Full Site Editing theme.

== Description ==
SB is an experimental theme attempting to implement Full Site Editing (FSE) with Gutenberg blocks.

The "Second Byte" theme is required to replace the "Specially Built" Genesis-SB theme that is used in [seriouslybonkers.com](https://seriouslybonkers.com).


Requirements:
1. Implement Full Site Editing.
2. Same look and feel as the Genesis-SB theme.
3. Find out what bits are missing from and/or not working in Gutenberg FSE.
4. Implement on seriouslybonkers.com when stable.


Contents:

IMPLEMENTED: 

The `block-templates` developed so far are:

* index.html - default template when no others found
* singular.html - Single bigram page - under construction
* 404.html - Not found page - under construction

The `block-template-parts` are:

* body-and-sidebar.html - main content and sidebar
* footer - Final full width footer
* header.html - Displays the header: site logo, site title and tagline and search box
* home-body.html - the main content - still under construction
* main-menu.html - the primary navigation menu
* page-footer.html - 3 column footer widgets
* sequentially-biased.html - sidebar widget
* sidebar.html - sidebar widgets - under construction
* site-building.html - sidebar widget
* social-links.html - at the bottom of the footer
* structured-breakdown.html - first widget in the sidebar
* summed-by.html - sidebar widget


home-body.html now consists of three query blocks which are overriden in server side rendering
to deliver:

- Hero section - query block to display the first bigram for the page
- Thumbnail section - up to 4 groups of 4 featured images displayed in a grid
- Links section -query block to display links to other posts

followed by a pagination section.



PLANNED:

* Several templates
* Quite a few template parts

The planned `block-templates` are:


* archive.html - generic template used for archives: author, taxonomy, date, tag 
* category.html - used to display the Category archive
* date.html - date base archive
* home.html -  used for Blog Posts index page or Posts Shown on Front (when front-page not implemented)
* page-sb.html - displays the reactSB page
* search.html - Display search results
* single-bigram.html - display for a single bigram CPT
* taxonomy.html - used to display taxonomy terms


See the template visualization: https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

The planned `block-template-parts` are:

* query block to display the groups of 4 featured images in a grid
* query block to display links to other posts
* pagination
* more widgets for the sidebar: Sequentially biased, Summed by, Site building
* Seen before metadata
* Tags 
* Published and last update date, with Edit link

== Installation ==

* Install and activate pre-requisite plugins.
* Either install Gutenberg 10.3.0-rc1 or higher or install and build the latest Gutenberg source.
* Activate Gutenberg.
* Install and activate the SB theme, as you would install any other theme. Full Site Editing will be enabled automatically.
* For some of the templates and template parts to work properly you will need to install and activate the pre-requisite plugins.
* For templates which include navigation blocks you will need to edit the supplied menus.

Pre-requisite plugins: see also Notes

* [oik](https://wordpress.org/plugins/oik/)
* [oik-fields](https://github.com/bobbingwide/oik-fields)
* [oik-a2z](https://github.com/bobbingwide/oik-a2z)
* [sb-breadcrumbs-block](https://github.com/bobbingwide/sb-breadcrumbs-block)
* [bigram](https://github.com/bobbingwide/bigram)
 

== Change Log ==
= 0.1.0 = 
* Added: Implement server overrides for the 3 queries used on the home page,[github bobbingwide SB issues 13]
* Added: Initial pagination block for the home page,[github bobbingwide SB issues 13]
* Changed: Minor improvements to the 404.html template
* Added: Improve sidebar and footer widget nav menus,[github bobbingwide SB issues 9]
* Changed: Reduce CSS for the main nav menu,[github bobbingwide SB issues 9]
* Added: Add the additional 3 widgets as separate template parts in the sidebar template part,[github bobbingwide SB issues 1]
* Changed: Improve styling,[github bobbingwide SB issues 1]
* Fixed: Override gutenberg rendering; don't run wpautop on template parts,[github bobbingwide SB issues 5]
* Fixed: Override gutenberg rendering; cater for unregistered taxonomies,[github bobbingwide SB issues 7]
* Fixed: Correct CSS for displaying the div.WP_DEBUG
* Tested: With Gutenberg source trunk 10.3.0-rc1
* Tested: With WordPress 5.7 and WordPress Multi Site
* Tested: With PHP 8.0

= 0.0.0 =
* Added: Created the basic theme using `new-empty-theme.php` from `WordPress/theme-experiments`.,[github bobbingwide SB issues 1]
* Changed: Updated index.php to tell the user to use Gutenberg
* Changed: Styled with a combination of experimental-theme.json and style.css
* Changed: Copied/cobbled styling for the navigation menu and footer from Genesis-SB
* Changed: Used the new method to define normal content and wide content width,[github bobbingwide SB issues 4]
* Changed: Used the new method to define the footer areas as full width
* Fixed: Enable oik shortcodes to be able to use [guts] in the footer area
* Changed: Use custom.css for styling DEBUG divs
* Changed: Created/updated block templates and template parts from the latest versions in the Site Editor for testing elsewhere
* Fixed: Workaround problem with link colour on headings by not setting it; it's not needed anyway.,[github bobbingwide SB issues 5]
* Tested: With Gutenberg source trunk somewhere between 10.2.1 and 10.3
* Tested: With WordPress 5.7 and WordPress Multi Site
* Tested: With PHP 8.0


== Notes ==
The theme is designed for use on seriouslybonkers.com.

The CSS is minimal; just enough to make it look OK on my laptop and external monitor.
Responsibility for responsive styling is left to Gutenberg / WordPress core functionality.

=== Block overrides ===

SB may contain a number of overrides to Gutenberg server rendered blocks which didn't behave the way I expected. 
These overrides should continue to work even when the PRs to fix the bugs have been implemented.

Implemented in SB:
* None yet.


For reference, improvement areas in Fizzie included:

* core/query-loop - uses main query when used outside of core/query
* core/query-pagination - uses the main query when used outside of core/query
* core/block - handle recursion
* core/post-hierarchical-terms - cater for invalid taxonomy
* core/navigation-link - set current-menu-item class for current request
* core/navigation - tbc
* core/template-part - handle recursion
* core/post-content - handle recursion
* core/post-excerpt - append missing `</div>`
 

== References ==
See my articles on herbmiller.me: 

- [Localization of Full Site Editing themes](https://herbmiller.me/localization-of-full-site-editing-themes/)
- [Fizzie - an experimental Full Site Editing theme](https://herbmiller.me/fizzie-an-experimental-full-site-editing-theme/)

For other articles see the [Fizzie theme's readme](https://github.com/bobbingwide/fizzie/blob/main/README.md)

For some other FSE themes see [WP-a2z FSE themes](https://blocks.wp-a2z.org/oik-themes)

== Brief development history ==

SB is my second attempt at creating a Full Site Editing theme using Gutenberg. Hence the subtitle Second Byte.

I started creating it for the third call for testing for the #fse-outreach-experiment
[FSE Program Testing Call #3: Create a fun & custom 404 page](https://make.wordpress.org/test/2021/03/09/fse-program-testing-call-3-create-a-fun-custom-404-page/)

In some respects, even though it should consist of fewer templates and templates parts, SB will be harder to achieve
since there is some PHP logic for the home page which I imagine will be more than tricky to implement.
I believe I will need to find a method to override server side logic for the query loop blocks.

Now I think about it, I reckon I can implement a solution. 
I supposed I'd better design it first.

So I'm going to stop writing this and continue with the "programmming". 

BTW. The Seriously Bonkers site is a direct spin off from a fun distraction played by members of a development team on a project started 30 years ago called Silver Bullet.

It was my manager's idea to call the project Silver Bullet; he'd read [No Silver Bullet](https://en.wikipedia.org/wiki/No_Silver_Bullet)
and wanted to attempt to disprove the main premise. Our plan was to implement a complicated client-server solution using some advanced tools
in far less time than originally estimated.

The Silver Bullet project itself didn't fail. But it wasn't completed either; the plug was pulled on the parent product. 

We had a lot of fun on the project, and even more fun collecting the SB's that now make up the fascinating website.

Silver Bullet was being developed using bleeding edge technology. 30 years on Second Byte is "still bleeding".



== Copyright ==
(C) Copyright Herb Miller, Bobbing Wide 2021

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.