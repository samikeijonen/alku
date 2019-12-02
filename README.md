# Alku

## WordPress Meetup presentation: A Beginner’s Guide to Developing a WordPress Theme.

In this presentation and repo, we’ll give examples how you can start building your own custom WordPress theme. We’ll take a look at the basic steps from scratch such as:

- Markup
- Stylesheet
- Template files
- Template hierarchy
- The loop

[Theme handbook](https://developer.wordpress.org/themes/getting-started/) is our reference site.

## Starting with folder structure

We'll be creating theme called `Alku`. In order to do that:

1. Open `wp-content/themes` folder inside your WP installation.
1. Create folder `alku` inside it.
1. Now we have `wp-content/themes/alku` folder.

## Add required template files.

[Template files](https://developer.wordpress.org/themes/basics/template-files/) handle how your site is displayed. There are only two required template files:

1. `index.php`
1. `style.css`

Add these files inside your theme.

### Add markup in index.php

[HTML5 boilerplate](https://github.com/h5bp/html5-boilerplate/blob/master/src/index.html) is a one place to check base markup for your site. Let's add
[basic, accessible structure](https://make.wordpress.org/accessibility/handbook/markup/aria-landmarks/) to our `index.php`:

1. `<header>` for site header.
1. `<nav>` for site navigation.
1. `<main>` for site main content.
1. `<footer>` for site footer.

We can even activate our `alku` theme under `Appearance >> Themes` after this!

### Update header information in style.css

WordPress uses [header comment section](https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/#basic-structure) to display information about your theme. Let's add at least 

1. Theme Name
1. Author
1. Version