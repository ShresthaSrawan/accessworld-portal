<?php

return [
    'site' => [
        'email' => 'sales@accessworld.net',
        'address' => '5F Bhatbhateni, Krishna Galli',
        'phone' => '(+977) 9801 000 575'
    ],
    'currency'    => 'Rs. ',
    'terms' => [
        'all' => [
            '1' => '1 Month',
            '3' => '3 Months',
            '6' => '6 Months',
            '10' => '12 Months'
        ],
    	'default' => '10'
    ],
    'domain' => [
        'live' => [
            'api_host' => 'rr-n1-tor.opensrs.net',
            'api_key' => 'c11bef9aa5b291de9ab560645ad16b2b92d675b30bce44fb63bec6326a4bbc4218a2a8c78b03aae3c152102c5fcf786a7a3bb521b543abc7',
            'reseller_username' => 'awt'
        ],
        'test' => [
            'api_host' => 'horizon.opensrs.net',
            'api_key' => '783584c84dc1e50651466d85caf59b0848b446c7aa1ab30d3b58d5ed94c6c6367a513e762d41f42b5fff397c3c75734b982aac2cf1b9221a',
            'reseller_username' => 'awt',
            'name_server_1' => 'ns1.systemdns.com',
            'name_server_2' => 'ns2.systemdns.com'
        ],
        'mode' => 'test',
        'tld' => [ '.co.uk', '.me', '.org', '.asia', '.org.uk', '.net', '.tel', '.com', '.mobi', '.biz', '.info', '.ca', '.online' ],
        'selectedTld' => [ 
            [ 'slug' => 'com', 'tld' => '.com', 'price' => 11 ],
            [ 'slug' => 'org', 'tld' => '.org', 'price' => 12.5 ],
            [ 'slug' => 'net', 'tld' => '.net', 'price' => 12.5 ],
            [ 'slug' => 'online', 'tld' => '.online', 'price' => 5 ]
        ]
    ],
    'asa' => [
        'host' => 'https://platform-uat.idomains.com/',
        'email-address' => 'api@accessworld.net',
        'password' => '4rBwWN6Qym',
        'reseller-id' => '202'
    ],
    'referral' => [
        'minimum' => 10,
        'points_per_referral' => 10,
        'value_per_referral' => 0.94, // in dollars
    ],
    'service_charge' => [
        'opensrs_charge' => 0.3, //For Domain and SSL certificate price
        'email' => 0.1
    ],
    'companies' => [ 
        'AWT' => [
            'name' => 'AccessWorld Tech Pvt. Ltd.',
            'url' => 'https://www.accessworld.net',
            'address' => 'Krishnagalli, Patandhoka, Lalitpur',
            'phone' => '+977 9801000575',
        ],
        'OMNI' => [
            'name' => 'Omni Business Corporate International Pvt. Ltd.',
            'url' => 'https://www.omni.com.np',
            'address' => 'Krishnagalli, Patandhoka, Lalitpur',
            'phone' => '+977-1-5011535',
        ]
    ]
];