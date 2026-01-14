<?php

return static function($definition): void
{
    $definition->rootNode()->children()
    
        /**
         * Template to be used for the coming soon page.
         * 
         * @var string
         * @default '@ComingSoon/index.html.twig'
         */
        ->scalarNode('template')
            ->info('The Twig template to be used for the coming soon page.')
            ->defaultValue('@ComingSoon/index.html.twig')
        ->end()

        /**
         * Language of the project or website.
         * 
         * @var string
         * @default 'en'
         */
        ->scalarNode('lang')
            ->info('The language of the project or website.')
            ->defaultValue('en')
            ->treatNullLike('en')
        ->end()

        /**
         * Character set for the coming soon page.
         * 
         * @var string
         * @default 'UTF-8'
         */
        ->scalarNode('charset')
            ->info('The character set for the coming soon page.')
            ->defaultValue('UTF-8')
            ->treatNullLike('UTF-8')
        ->end()

        /**
         * Favicon image for the coming soon page.
         * 
         * @var string|null
         */
        ->scalarNode('favicon')
            ->info('The URL or path to the favicon image.')
            ->defaultNull()
        ->end()
    
        /**
         * Logo image for the coming soon page.
         * 
         * @var string|null
         */
        ->scalarNode('banner')
            ->info('The URL or path to the logo image.')
            ->defaultValue('./bundles/comingsoon/banner.png')
            ->treatNullLike('./bundles/comingsoon/banner.png')
        ->end()


        /**
         * Metrics and analytics configuration.
         */
        ->arrayNode('storage')
            ->info('Configuration parameters for storing form data.')
            ->addDefaultsIfNotSet()->children()

            /**
             * Storage type for form data.
             * 
             * @var string
             * @default 'csv'
             */
            ->enumNode('type')
                ->info('Define where the form data are stored. Options: "csv", "database", "none".')
                ->values(['csv', 'database', 'none'])
                ->defaultValue('csv')
            ->end()

            /**
             * Path to the CSV file where emails will be stored if "csv" storage is selected.
             * 
             * @var string
             * @default '/var/coming-soon-emails.csv'
             */
            ->scalarNode('file')
                ->info('Path to the CSV file where emails will be stored if "csv" storage is selected.')
                ->defaultValue('/var/coming-soon-emails.csv')
            ->end()

        ->end()->end()

        /**
         * Automatic focus for the email input field in the notification signup form.
         * 
         * @var bool
         * @default false
         */
        ->booleanNode('autofocus')
            ->info('Whether the email input field in the notification signup form should automatically receive focus when the page loads.')
            ->defaultFalse()
            ->treatNullLike(false)
        ->end()

        /**
         * Labels and texts for the notification signup form.
         */
        ->arrayNode('labels')
            ->info('Configuration parameters for the notification signup form.')
            ->addDefaultsIfNotSet()->children()

            /**
             * Name of the project or website.
             * 
             * @var string
             */
            ->scalarNode('name')
                ->info('The name of the project or website.')
                ->defaultNull()
            ->end()
    
            /**
             * Description of the project or website.
             * 
             * @var string|null
             */
            ->scalarNode('description')
                ->info('A brief description of the project or website.')
                ->defaultNull()
            ->end()
    
            /**
             * Main content text for the coming soon page.
             * 
             * @var string
             */
            ->scalarNode('content')
                ->info('The main text to display on the coming soon page.')
                ->defaultValue('We are working hard to launch our awesome project.<br>Stay tuned for updates!')
            ->end()

            /**
             * Placeholder text for the email input field in the notification signup form.
             * 
             * @var string
             * @default 'Enter your email address'
             */
            ->scalarNode('email')
                ->info('Placeholder text for the email input field in the notification signup form.')
                ->defaultValue('Enter your email address')
                ->treatNullLike('Enter your email address')
            ->end()

            ->scalarNode('already_subscribed')
                ->info('Message displayed when the email is already subscribed.')
                ->defaultValue('You are already subscribed.')
                ->treatNullLike('You are already subscribed.')
            ->end()

            /**
             * Label text for the submit button in the notification signup form.
             * 
             * @var string
             * @default 'Notify Me'
             */
            ->scalarNode('submit')
                ->info('Label text for the submit button in the notification signup form.')
                ->defaultValue('Notify Me')
                ->treatNullLike('Notify Me')
            ->end()

            /**
             * Label text displayed while the notification signup form is being submitted.
             * 
             * @var string
             * @default 'Sending...'
             */
            ->scalarNode('sending')
                ->info('Label text displayed while the notification signup form is being submitted.')
                ->defaultValue('Sending...')
                ->treatNullLike('Sending...')
            ->end()

            /**
             * Label text displayed when the notification signup form is successfully submitted.
             * 
             * @var string
             * @default 'Thank you for subscribing!'
             */
            ->scalarNode('success')
                ->info('Label text displayed when the notification signup form is successfully submitted.')
                ->defaultValue('Thank you for subscribing!')
                ->treatNullLike('Thank you for subscribing!')
            ->end()

            /**
             * Label text displayed when an error occurs during the submission of the notification signup form.
             * 
             * @var string
             * @default 'An error occurred. Please try again.'
             */
            ->scalarNode('error')
                ->info('Label text displayed when an error occurs during the submission of the notification signup form.')
                ->defaultValue('An error occurred. Please try again.')
                ->treatNullLike('An error occurred. Please try again.')
            ->end()

        ->end()->end()


        /**
         * Links to social media or other relevant pages.
         */
        ->arrayNode('links')
            ->info('Configuration parameters for entities to be included in the search query.')
            ->arrayPrototype()
            ->info('Specifies the namespace of the entity to be included in the search query (App\Entity\Pizza).')
            ->children()

            /**
             * Label for the link.
             * 
             * @var string
             */
            ->scalarNode('label')
                ->info('Label for the link.')
                ->isRequired()
            ->end()

            /**
             * FontAwesome Icon associated with the link.
             * 
             * @var string|null
             */
            ->scalarNode('icon')
                ->info('FontAwesome Icon associated with the link.')
                ->defaultNull()
            ->end()

            /**
             * URL for the link.
             * 
             * @var string
             */
            ->scalarNode('url')
                ->info('URL for the link.')
                ->isRequired()
            ->end()

        ->end()->end()->end()

        /**
         * Metrics and analytics configuration.
         */
        ->arrayNode('metrics')
            ->info('Configuration parameters for metrics and analytics.')
            ->addDefaultsIfNotSet()->children()

            /**
             * Google Analytics Tracking ID.
             * 
             * @var string|null
             */
            ->scalarNode('google_analytics')
                ->info('Set the Google Analytics Tracking ID to enable Google Analytics.')
                ->defaultNull()
            ->end()

        ->end()->end()

    ->end()->end();
};