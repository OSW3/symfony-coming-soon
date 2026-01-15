# COMING SOON

## Install

### Step 1: Install the bundle via Composer

```shell
composer require osw3/symfony-coming-soon
```

### Step 2: Register the bundle

If Symfony Flex is not used, register the bundle manually in `config/bundles.php`:

```php
return [
    // ...
    OSW3\ComingSoon\ComingSoonBundle::class => ['all' => true],
];
```

### Step 3: Import the bundle routes

Add the following to your `config/routes.yaml` file:

```yaml
_coming_soon:
    resource: '@ComingSoonBundle/Resources/routes.yaml'
    # prefix: /coming-soon
```

## Update

To update the bundle to the latest version, run:

```shell
composer update osw3/symfony-coming-soon
```

To update to a specific version:

```shell
composer require osw3/symfony-coming-soon:^2.0
```

After updating, clear the Symfony cache:

```shell
php bin/console cache:clear
```

## Config

```yaml
coming_soon:

    ## Path to the Twig template to use for the coming soon page
    ##
    ## @default: "@ComingSoon/index.html.twig"
    ## @var string
    template: "@ComingSoon/index.html.twig"

    ## Language of the project or website
    ## Used in the <html> lang attribute
    ##
    ## @default: "en"
    ## @var string
    lang: "en"

    ## Character set for the coming soon page
    ##
    ## @default: "UTF-8"
    ## @var string
    charset: "UTF-8"

    ## Path to the favicon image to display on the coming soon page
    ##
    ## @var string
    favicon: "assets/images/favicon.ico"

    ## Path to the logo image to display on the coming soon page
    ##
    ## @var string
    banner: "assets/images/my-banner.jpg"

    ## Auto-focus the email input field when the page loads
    ##
    ## @default: false
    ## @var boolean
    autofocus: true


    ## Configuration parameters for storing form data
    ##
    ## @var array
    storage:

        ## Storage type for form data.
        ## Options: "csv", "database", "none"
        ##
        ## @default: "csv"
        ## @var string
        type: "csv"

        ## Path to the CSV file where emails will be stored if "csv" storage is selected
        ## /!\ Ensure that the web server has write permissions to this file
        ## /!\ If the file does not exist, it will be created automatically
        ## /!\ It's recommended to store this file outside the web root for security reasons
        ## /!\ Ensure that the file is added to .gitignore to prevent it from being committed to version control
        ##
        ## @default: "/var/coming-soon-emails.csv"
        ## @var string
        file: "/var/coming-soon-emails.csv"

    
    ## Labels and text content for the coming soon page
    ##
    ## @var array
    labels:

        ## Name of the project or website
        ## Used in the page title, header and copyright
        ##
        ## @var string
        name: "My Awesome Project"

        ## Description meta tag content for SEO
        ##
        ## @var string
        description: "A small description for the S.E.O."

        ## Text to display on the coming soon page (HTML allowed)
        ##
        ## @var string
        content: "We are working hard to launch our awesome project.<br>Stay tuned for updates!"

        ## Label for the email subscription field
        ##
        ## @var string
        email: "Your email address"

        ## Label for the submit button
        ##
        ## @var string
        submit: "Notify Me"

        ## Label displayed while the form is being submitted
        ##
        ## @var string
        sending: "Sending..."

        ## Message displayed when the user is already subscribed
        ##
        ## @var string
        already_subscribed: "You are already subscribed."

        ## Success message displayed after a successful subscription
        ##
        ## @var string
        success: "Thank you for subscribing!"

        ## Error message displayed if an error occurs during submission
        ##
        ## @var string
        error: "An error occurred. Please try again."


    ## Social media links to display on the coming soon page
    ##
    ## @var array
    links:
        - label: "Facebook"
          icon: "facebook"
          url: "https://www.facebook.com/xxxx"


    ## Analytics and metrics settings
    ##
    ## @var array
    metrics:

        ## Google Analytics tracking ID
        ##
        ## @var string
        google_analytics: "UA-XXXXXXXXX-X"
```


## Twig functions

### `coming_soon__template`

Returns the path of the Twig template used for the coming soon page.

```twig
coming_soon__template()
```

### `coming_soon__lang`

Returns the language configured for the project or website.

```twig
coming_soon__lang()
```

### `coming_soon__charset`

Returns the character set configured for the coming soon page.

```twig
coming_soon__charset()
```

### `coming_soon__favicon`

Returns the path of the favicon image configured for the coming soon page.

```twig
coming_soon__favicon()
```

### `coming_soon__has_favicon`

Checks if a favicon is configured for the coming soon page.

```twig
coming_soon__has_favicon()
```

### `coming_soon__banner`

Returns the path of the banner image configured for the coming soon page.

```twig
coming_soon__banner()
```

### `coming_soon__storage_type`

Returns the storage type configured for form data.

```twig
coming_soon__storage_type()
```

### `coming_soon__storage_file`

Returns the path of the storage file configured for form data.

```twig
coming_soon__storage_file()
```

### `coming_soon__autofocus`

Checks if the email input field should be autofocus when the page loads.

```twig
coming_soon__autofocus()
```

### `coming_soon__name`

Returns the name of the project or website configured.

```twig
coming_soon__name()
```

### `coming_soon__description`

Returns the description configured for the SEO meta tag.

```twig
coming_soon__description()
```

### `coming_soon__has_description`

Checks if a description is configured for the coming soon page.

```twig
coming_soon__has_description()
```

### `coming_soon__content`

Returns the content to be displayed on the coming soon page.

```twig
coming_soon__content()
```

### `coming_soon__email`

Returns the label configured for the email subscription field.

```twig
coming_soon__email()
```

### `coming_soon__already_subscribed`

Returns the message displayed when the user is already subscribed.

```twig
coming_soon__already_subscribed()
```

### `coming_soon__submit`

Returns the label configured for the submit button.

```twig
coming_soon__submit()
```

### `coming_soon__sending`

Returns the message displayed while the form is being submitted.

```twig
coming_soon__sending()
```

### `coming_soon__success`

Returns the success message displayed after a successful subscription.

```twig
coming_soon__success()
```

### `coming_soon__error`

Returns the error message displayed if an error occurs during submission.

```twig
coming_soon__error()
```

### `coming_soon__links`

Returns the social media links configured for the coming soon page.

```twig
coming_soon__links()
```

### `coming_soon__google_analytics`

Returns the configured Google Analytics tracking ID.

```twig
coming_soon__google_analytics()
```
