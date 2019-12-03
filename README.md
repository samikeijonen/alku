# Alku

## WordPress Meetup presentation: A Beginner’s Guide to Developing a WordPress Theme.

In this presentation and repo, we’ll give examples how you can start building your own custom WordPress theme. We’ll take a look at the basic steps from scratch such as:

- Markup
- Stylesheet
- Template files
- The loop
- Template hierarchy

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

## Replacing static content with the loop

We only have static content at the moment in our theme. We need [The Loop](https://developer.wordpress.org/themes/basics/the-loop/) to output content from our database.

Let's go back to our `index.php` file and update static content inside `<main>` with The Loop.

```php
<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        // Displays post content.
        the_content();
    endwhile; 
endif; 
?>
```

Cool, we have the content.

## Organizing our theme structure by adding `header.php` and `footer.php` files

It's a good practise to organize our theme structure and use smaller template files.

1. Create `header.php` file.
1. Create `footer.php` file.
1. Cut top of the `index.php` file, and paste into the `header.php` file.
1. Cut bottom of the `index.php` file, and paste into the `footer.php` file.
1. Leave only `<main>` content inside `index.php`.

Wait, we lost our static header and footer?!

### Call get_header() and get_footer()

- `get_header()` function includes `header.php` file.
- `get_footer()` function includes `footer.php` file.

### Add wp_head() and wp_footer() hooks

Lot's of the site functionality happens in hooks called `wp_head()` and `wp_footer()`. Let's add

- `wp_head()` just inside `</head>`.
- `wp_footer()` just inside `</body>`.

Refresh your page and we can see that most of the blocks are styled now. This is because WP Core block stylesheet is added via `wp_head()` hook.

## Add functions.php file for theme functionality

[WordPress loads `functions.php`](https://developer.wordpress.org/themes/basics/theme-functions/) file automatically which makes it good place
for adding theme related functionality.

Let's create `functions.php` file in to root of our theme.

## Load our `style.css` file

Remember that we needed `style.css` file where we can add our CSS? That's not actually used in the site yet.

We need to [enqueu our styles using `wp_enqueue_style()` function](https://developer.wordpress.org/themes/basics/including-css-javascript/).