<?php

$defaultTitle = env('APP_NAME', 'Laravel');
$defaultDescription = 'App description.'; // todo : set default app description
// todo : replace the default favicon by your app favicon

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => $defaultTitle, // set false to total remove
            'titleBefore' => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description' => $defaultDescription, // set false to total remove
            'separator'   => ' - ',
            'keywords'    => [],
            'canonical'   => null, // Set null for using Url::current(), set false to total remove
            'robots'      => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null, // https://support.google.com/webmasters/answer/79812
            'bing'      => null, // https://www.bing.com/webmaster/help/how-to-verify-ownership-of-your-site-afcfefc6
            'alexa'     => null, //
            'pinterest' => null, // https://help.pinterest.com/fr/articles/claim-your-website
            'yandex'    => null, // https://yandex.com/support/webmaster/adding-site/how-to-add-site.html
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => $defaultTitle, // set false to total remove
            'description' => $defaultDescription, // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'article', // all possible types available here : https://developers.facebook.com/docs/reference/opengraph#object-type
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter'   => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
             'card'    => 'summary', // other possible values : summary_large_image / app / player
             'site'    => '@ArthurLorent', // todo : update twitter site
        ],
    ],
    'json-ld'   => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => $defaultTitle, // set false to total remove
            'description' => $defaultDescription, // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
