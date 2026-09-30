<?php

return [

    'production' => false,

    'siteName' => 'The Abbey at Pawleys Island',
    'siteDescription' => 'A community of believers passionate about sharing the greatness and grace of our Savior Jesus Christ.',

    // Update siteUrl to the real GitHub Pages URL (or custom domain) before deploying.
    // Used to build the sitemap and absolute URLs/meta tags.
    'siteUrl' => 'https://theabbeypawleysisland.github.io/site',
    'baseUrl' => '/',

    'service' => [
        'day' => 'Sundays',
        'time' => '10:30 AM',
    ],

    'contact' => [
        'address' => '46 Gathering Lane, Pawleys Island, SC 29585',
        'phone' => '843.314.0277',
        'phoneHref' => '+18433140277',
        'email' => 'info@theabbeypawleysisland.com',
    ],

    'links' => [
        // OnRealm handles giving and the member portal — these are genuinely
        // external, so the static site just needs to link out to them.
        'give' => 'https://onrealm.org/theabbey/give/now',
        'myAbbey' => 'https://onrealm.org/',
        'youtube' => 'https://www.youtube.com/channel/UCJHaxh7fG-EkC2W3a6LZacg',
        'facebook' => 'https://www.facebook.com/theabbeypawleys',
        'instagram' => 'https://www.instagram.com/theabbeypawleys/',
    ],

    'navigation' => [
        ['title' => 'Home', 'url' => '/'],
        ['title' => 'Who We Are', 'url' => '/who-we-are'],
        ['title' => 'Our Beliefs', 'url' => '/our-beliefs'],
        ['title' => 'Sermons', 'url' => '/sermons'],
        ['title' => 'Give', 'url' => '/give'],
        ['title' => 'My Abbey', 'url' => 'myAbbey', 'external' => true],
        ['title' => 'Weddings + Events', 'url' => '/weddings-events'],
        ['title' => 'Contact', 'url' => '/contact'],
    ],

    // Every file in source/_sermons/ becomes an entry in $page->sermons,
    // newest first. Add a new sermon by dropping in one more markdown file —
    // see source/_sermons/README.md for the front matter fields.
    'collections' => [
        'sermons' => [
            'sort' => '-date',
        ],
    ],

];
