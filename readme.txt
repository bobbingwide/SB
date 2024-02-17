=== SB ===
Contributors: bobbingwide, vsgloik
Donate link: https://www.oik-plugins.com/oik/oik-donate/
Tags: blocks, FSE, Gutenberg
Requires at least: 5.7
Tested up to: 6.4.2
Version: 0.5.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Second Byte: Seriously Bonkers' experimental Full Site Editing theme.

== Description ==
SB is a Full Site Editing (FSE) theme with Gutenberg blocks.

The "Second Byte" theme is required to replace the "Specially Built" Genesis-SB theme that is used in [seriouslybonkers.com](https://seriouslybonkers.com).

Requirements:
1. Implement Full Site Editing.
2. Similar look and feel as the Genesis-SB theme.
3. Find out what bits are missing from and/or not working in Gutenberg FSE.
4. Implement on seriouslybonkers.com when stable.

Contents:

IMPLEMENTED: 

The `templates` developed so far are:

* 404.html - Not found page
* index.html - default template when no others found
* page-sb.html - Custom template for the react-SB page
* page-submit-bigram.html - Custom template for the Submit Bigram page
* singular-one-column.html - Custom template for one column main content, with sidebar
* singular.html - Single bigram page 

The `parts` are:

* 404-body.html - Not found main content
* 404.html - Not found main content and sidebar
* body-and-sidebar.html - main content and sidebar
* footer.html - Final full width footer
* header.html - Displays the header: site logo, site title and tagline and search box
* home-body.html - the main content - still under construction
* main-menu.html - the primary navigation menu
* metadates.html - post date and last update date
* one-column-and-sidebar.html - custom template part 
* one-column.html - one column featured image and content
* page-footer.html - 3 column footer widgets
* post-author.html - styled post author block for singular
* search-banter.html - search banter for the search template
* sequentially-biased.html - sidebar widget
* sidebar.html - sidebar widgets - under construction
* singular-and-sidebar.html - main content and sidebar
* singular.html - main content for singular
* site-building.html - sidebar widget
* social-links.html - at the bottom of the footer
* structured-breakdown.html - first widget in the sidebar
* summed-by.html - sidebar widget

home-body.html consists of three query blocks which are overriden in server side rendering
to deliver:

- Hero section - query block to display the first bigram for the page
- Thumbnail section - up to 4 groups of 4 featured images displayed in a grid
- Links section -query block to display links to other posts

followed by a pagination section.

NOT NECESSARY:

The following `templates` were planned but deemed to be unnecessary since index.html
satisfies the requirements except perhaps for a breadcrumbs block.

* archive.html - generic template used for archives: author, taxonomy, date, tag 
* category.html - used to display the Category archive
* date.html - date base archive
* home.html -  used for Blog Posts index page or Posts Shown on Front (when front-page not implemented)
* taxonomy.html - used to display taxonomy terms

See the template visualization: https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

== Installation ==

* Install and activate pre-requisite plugins.
* Either install Gutenberg 13.1.0 or higher or install and build the latest Gutenberg source.
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
= 0.5.0 = 
* Changed: Display up to 32 bigrams with thumbnails #38
* Changed: Move paragraph styling to css/paragraph-aiprompt.css #38
* Changed: Enqueue stylesheets for paragraph #38
* Changed: Make the background colour a little lighter #38
* Changed: Add is-style-revisedprompt #38
* Changed: Adjust home page hero layout #38

= 0.4.0 =
* Changed: Add AI prompt and response. Adjust featured image for singular.html #37
* Tested: With WordPress 6.4.2
* Tested: With Gutenberg 17.2.3
* Tested: With PHP 8.0, 8.1, 8.2 and 8.3 

= 0.3.2 = 
* Changed: Support PHP 8.1, PHP 8.2 and PHP 8.3 #36 
* Tested: With WordPress 6.4.1
* Tested: With Gutenberg 17.1.4
* Tested: With PHP 8.0, 8.1, 8.2 and 8.3 

= 0.3.1 = 
* Changed: Restructure metadates for better display on narrow devices #33
* Changed: Prevent Site building menu from switching to hamburger on mobile #33
* Changed: Add margin for narrow devices #33
* Tested: With Gutenberg 13.8.1

= 0.3.0 =
* Changed: Cater for Gutenberg not activated #34
* Changed: Wrap shortcodes in a block #35
* Changed: Fix drop down menu styling wrapping issues #33
* Tested: With WordPress 6.0.1
* Tested: With PHP 8.0 

= 0.2.1 =
* Changed: Remove unnecessary query-no-results block #32
* Changed: Reduce work done in genesis_sb_the_posts() #32
* Added: Override navigation-link block #30
* Tested: With WordPress 5.9.3
* Tested: With PHP 8.0
* Tested: With Gutenberg 13.1.0

= 0.2.0 = 
* Added: Add Published, Last Updated and (Edit) link to hero post #1
* Added: Add bigram/search-banter in search-banter template part for body-and-sidebar #24
* Added: Add custom template singular-one-column.html #27
* Added: Add page-sb template #25
* Added: Add page-submit-bigram #27
* Added: Implement 404.html template #22
* Changed: Add $content and $block params to sb_render_block_core_template_part
* Changed: Add menu to Info widget area
* Changed: Add spacer before post-author. Set avatarSize to 70 pixels #19
* Changed: Added query title and breadcrumbs blocks #1
* Changed: Cater for changes in Gutenberg 12.3.0 #13
* Changed: Docblock #19
* Changed: Eliminate comma separator between post terms #20
* Changed: Fix layout for second and third query blocks #13
* Changed: Implement full main-menu #21
* Changed: Improve menu styling #21
* Changed: Improve page-footer layout. #1
* Changed: Improve styling of vertical menus #23
* Changed: Improve the Hero post entry-footer layout #1
* Changed: Make menu behave a bit better
* Changed: Override the post-author block #19
* Changed: Put featured image and post title/content in 2 columns. Refactor pagination
* Changed: Refactor experimental-theme.json to theme.json #17
* Changed: Refactor home-body.html for Gutenberg 13.1.0
* Changed: Refactor query-loop to post-template #16
* Changed: Refactor query-loop to post-template #16. 
* Changed: Remove commented out code #13
* Changed: Rename block-templates and block-template-parts #26 
* Changed: Replace bw_field _seen_before with bigram/seen-before #10
* Changed: Replace hardcoded debug with sb-debug-block
* Changed: Restyle the home page. Lose the hovering stuff in the middle section. Adjust font weights
* Changed: Rework metadates as row with outer group #20
* Changed: Rework singular for better alignment #20
* Changed: Set shouldSyncIcon attribute for site-logo #1
* Changed: Set tagName to aside to enable styling
* Changed: Singular template with metadates and post-author template parts #20
* Changed: Style metadates using flex. Style tags to look like tags. #20
* Changed: Style the pagination for the main query #15
* Changed: Update navigation block attributes
* Changed: set theme.json version to 2. Set blockGap to 0 pixels
* Fixed: bigram issue #21

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

SB contains a number of overrides to Gutenberg server rendered blocks which don't behave the way I want. 

* core/post-template - overrides the query loop to implement multi part main query processing
* core/post-author - Changes the author name to a link to Self Bio and implements SB links
* core/template-part - handle recursion, don't call wpautop()
* core/navigation-link - replaces hardcoded links with site_url()
* core/tag-cloud - possibly unnecessarily overridden



== References ==
See my articles on herbmiller.me: 

- [Localization of Full Site Editing themes](https://herbmiller.me/localization-of-full-site-editing-themes/)
- [Fizzie - an experimental Full Site Editing theme](https://herbmiller.me/fizzie-an-experimental-full-site-editing-theme/)

For other articles see the [Fizzie theme's readme](https://github.com/bobbingwide/fizzie/blob/main/README.md)

For some other FSE themes see [WP-a2z FSE themes](https://blocks.wp-a2z.org/oik-themes)

== Brief development history ==

SB was my second attempt at creating a Full Site Editing theme using Gutenberg. Hence the subtitle Second Byte.

I started creating it in March 2021 for the third call for testing for the #fse-outreach-experiment
[FSE Program Testing Call #3: Create a fun & custom 404 page](https://make.wordpress.org/test/2021/03/09/fse-program-testing-call-3-create-a-fun-custom-404-page/)

It's now over a year since that call and I still haven't completed all the logic for the 404 page.

In some respects, even though it might have required fewer templates and templates parts than Fizzie, I reckoned SB would be harder to achieve
than other FSE themes. This was primarily due to the PHP logic for the home page, which I imagined would be more than tricky to implement.

There was also logic for the search results, the seen before count and integration with react-SB. 


BTW. The Seriously Bonkers site is a direct spin off from a fun distraction played by members of a development team on a project started 30 years ago called Silver Bullet.

It was my manager's idea to call the project Silver Bullet; he'd read [No Silver Bullet](https://en.wikipedia.org/wiki/No_Silver_Bullet)
and wanted to attempt to disprove the main premise. Our plan was to implement a complicated client-server solution using some advanced tools
in far less time than originally estimated.

The Silver Bullet project itself didn't fail. But it wasn't completed either; the plug was pulled on the parent product. 

We had a lot of fun on the project, and even more fun collecting the SB's that now make up the fascinating website.

Silver Bullet was being developed using bleeding edge technology. 31 years on Second Byte is "still bleeding".



== Copyright ==
(C) Copyright Herb Miller, Bobbing Wide 2021- 2024

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.