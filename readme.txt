=== SB ===
Contributors: bobbingwide, vsgloik
Donate link: https://www.oik-plugins.com/oik/oik-donate/
Tags: blocks, FSE, Gutenberg
Requires at least: 5.7
Tested up to: 5.7
Version: 0.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Seriously Bonkers' experimental Full Site Editing theme.

== Description ==
SB is an experimental theme attempting to implement Full Site Editing (FSE) with Gutenberg blocks.

The theme is required to replace the "Specially Built" Genesis-SB theme that is used in [seriouslybonkers.com](https://seriouslybonkers.com).

Remember: There is [No Silver Bullet](https://en.wikipedia.org/wiki/No_Silver_Bullet).


Requirements:
1. Implement Full Site Editing.
2. Same look and feel as the Genesis-SB theme.
3. Find out what bits are missing from and/or not working in Gutenberg FSE.
4. Implement on seriouslybonkers.com when stable.


Contents:

IMPLEMENTED: 

The `block-templates` are:

* index.html
* singular.html
* 404.html - Not found page

The `block-template-parts` are:

* header.html


PLANNED:

* Several templates
* Quite a few template parts

The `block-templates` are:

TBC ... copied from Fizzie.


* archive - generic template used for archives: author, taxonomy, date, tag 
* category - used to display the Category archive
* front-page - used for Page Shown On Front
* home - used for Blog Posts index page or Posts Shown on Front (when front-page not implemented)
* index - used when no other template is found
* search - Display search results
* single - used for a single post / attachment / CPT
* single-oik-plugins - used for a single oik-plugin 
* single-oik-themes - used for a single oik-theme
* singular - used when single or page does not exist

See the template visualization: https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

The `block-template-parts` are:

* footer - Final full width footer
* header - Displays the header: site logo, site title and tagline, header menu.
* header-menu - Displays the header menu 
* home-part - A template part used in debugging. Classic block
* home-query - Displays the posts on the blog page
* metadates - Displays Date published, last updated and [Edit] link
* page-content - Primary content part for a page
* page-footer - Full width footer with 3 columns - representing widgets
* post-content - Primary content part for a post
* posts - An attempt to display the posts using query blocks - incomplete- not used
* search - Using the Search block
* social-links - Social link icons



== Installation ==

* Either install Gutenberg 10.2.1 or higher or install and build the latest Gutenberg source.
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
= 0.0.0 =
* Added: Created the basic theme using `new-empty-theme.php` from `WordPress/theme-experiments`.
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

SB is my second attempt at creating a Full Site Editing theme using Gutenberg.

I started creating it for the third call for testing for the #fse-outreach-experiment
[FSE Program Testing Call #3: Create a fun & custom 404 page](https://make.wordpress.org/test/2021/03/09/fse-program-testing-call-3-create-a-fun-custom-404-page/)

In some respects, even though it should consist of fewer templates and templates parts, SB will be harder to achieve
since there is some PHP logic for the home page which I imagine will be more than tricky to implement without 
overriding server side logic.

Now I think about it, I reckon I can implement a solution. 
I supposed I'd better design it first.

So I'm going to stop writing this and continue with the "programmming". 





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