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

I'll go with:

```
/**
 * Theme Name: Alku
 * Author: Sami Keijonen
 * Version: 1.0.0
 */
```

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

Let's do that in `functions.php` file:

```php
// enqueue our main `style.css`.
wp_enqueue_style( 'style', get_stylesheet_uri(), [], '1.0.0' );
```

## Register dynamic menu and display on the site

At the moment we have hard coded menu in the `header.php`. First, we need to [register new menu location using `register_nav_menus()` function](https://developer.wordpress.org/themes/functionality/navigation-menus/).

Remember where we added functionality, yep, in `functions.php`.

```php
function alku_register_my_menus() {
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Header Menu', 'alku' ),
            )
        );
 }
 add_action( 'init', 'alku_register_my_menus' );
 ```

Now we can see new menu location called `Header Menu` but it doesn't show up automatically in our site.

Let's replace our static navigation in `header.php` with `wp_nav_menu()` function.

```php
wp_nav_menu(
    array(
        'theme_location' => 'primary'
    )
);
```

Done, we now have dynamic menu.

## Template hierarchy

What if we need different output on pages and articles? What about archive pages?

This is where [Template hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) steps in. WordPress knows which template files to load based on the file name and "view" what we are looking.

At the moment we only have `index.php` file which sits at the bottom of the template hierarchy. If nothing else is found, `index.php` is used.

### Create template file `page.php`

You might guess that `page.php` is template file for Pages. Let's create that file by copying `index.php`.

### Create template file `single.php`

`single.php` is template file is used for Posts. Let's create that file by copying `index.php`.

### Add title

There are many [template tags](https://developer.wordpress.org/themes/basics/template-tags/) in WordPress which we use to retrieve content from our database.

Let's add `the_title()` template tag in `page.php` and `single.php` to display our page title.

### Add date in the posts

We can use [get_the_date](https://developer.wordpress.org/reference/functions/get_the_date/) for displaying post published date.

So we need to add this to posts, which template file is that?

Correct, let's add it in `single.php`:

```php
<time><?php echo get_the_date(); ?></time>
```

