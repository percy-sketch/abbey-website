<?php

return [

    'production' => false,

    'siteName' => 'The Abbey at Pawleys Island',
    'siteDescription' => 'A community committed to forming fully devoted followers of Jesus Christ.',

    // Where the site is served from: GitHub Pages for percy-sketch/abbey-website.
    // At launch on theabbeypawleysisland.com, set siteUrl to that domain and baseUrl back to '/'.
    'siteUrl' => 'https://percy-sketch.github.io/abbey-website',
    'baseUrl' => '/abbey-website/',

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
        // Opens whatever is live (or next scheduled) on the channel.
        'liveStream' => 'https://www.youtube.com/channel/UCJHaxh7fG-EkC2W3a6LZacg/live',
        'facebook' => 'https://www.facebook.com/theabbeypawleys',
        'instagram' => 'https://www.instagram.com/theabbeypawleys/',
    ],

    // Staff shown on /our-team. Bios are carried over from the original site.
    'staff' => [
        [
            'name' => 'Allen Hughes',
            'fullName' => 'The Rev. Dr. Allen Hughes',
            'title' => 'Senior Rector/Pastor',
            'photo' => 'staff-hughes.jpg',
            'bio' => [
                'Allen is married to Louise and they have four children: Chaplin, James, Josh, and Dargan. He is originally from Mt. Pleasant, SC. Allen attended the University of South Carolina, received his MDiv from The University of the South (Sewanee), and completed his Doctor of Ministry at Asbury Seminary.',
                'Allen is the Executive Director of The Anglican Mission in America (AMiA), the Three-Stream Anglican Society of which The Abbey is a part. He has planted churches in Texas and South Carolina. A pastor for 30 years, Allen has a deep commitment to coaching and training leaders and discipleship. Allen oversees The Abbey and mentors the clergy, staff, and ministry leaders.',
            ],
        ],
        [
            'name' => 'Percy Strickland',
            'fullName' => 'Rev. Percy Strickland',
            'title' => 'Assistant Rector/Pastor',
            'photo' => 'staff-strickland.jpg',
            'bio' => [
                'Percy is married to Dr. Angie Strickland (a local Emergency Room physician) and they have six children: Tamon, Essence, Ala, Huck, Jasper and E.D. Lu. He grew up on a hog farm in Spivey’s Corner, NC, but many of his country ways were smoothed out a little when he attended Duke University for his undergraduate studies. Percy received his MDiv from Union Presbyterian Seminary and is currently finishing up his PhD in Old Testament at Columbia International University.',
                'Before his time here, Percy was a campus minister with InterVarsity Christian Fellowship at the University of Richmond. He was also, for 17 years, the CEO of a ministry to at-risk youth in the East End of Richmond, VA. Percy loves to speak God’s truth (through teaching and preaching), seek God’s truth (through strategic investments in community) and leak God’s truth (through life-on-life discipleship and leadership development) and has been doing that full-time since 1999. Percy works alongside Allen and the entire staff and ministry team to ensure that folks are invested in, encouraged and activated to the ministry to which they are called.',
            ],
        ],
        [
            'name' => 'Capers Barr',
            'fullName' => 'Mr. Capers Barr',
            'title' => 'Executive Pastor',
            'photo' => 'staff-barr.jpg',
            'bio' => [
                'Capers and his wife Jodi grew up in Charleston and Mt. Pleasant and have been married for 33 years. They have two sons, Capers and Cannon, and a granddaughter, Lee. Capers and his wife, Mary, live with their daughter, Lee, in Mt. Pleasant, and they are expecting their second daughter, Lucy, to arrive in January of this year. Cannon is married to Marguerite, and they live in Georgetown.',
                'Capers is a graduate of the University of South Carolina and the University of South Carolina School of Law. After almost 30 years of practice, Capers left the law and began working full time for the church, most recently as Executive Pastor of an Anglican church in Mt. Pleasant.',
                'Capers grew up spending his summers in Pawleys Island, and he and Jodi are very excited to now call Pawleys Island home.',
                'They are passionate about sharing their story of God’s work in their lives and in their marriage, and they are also passionate about working with the LAMB Institute, which serves orphaned and otherwise underprivileged children in Honduras. They are honored and excited to get to know everyone at The Abbey and to join together to help expand God’s kingdom.',
            ],
        ],
        [
            'name' => 'Bob Grant',
            'fullName' => 'The Rev. Dr. Bob Grant',
            'title' => 'Associate Rector/Pastor',
            'photo' => 'staff-grant.jpg',
            'bio' => [
                'Robert (Bob) Grant is celebrating 58 years of covenant marriage with his wife Sue and they have two adult children, Kelley and Richard. Bob completed a B.A. in Religion, M.A. in Counseling Psychology, and Th.D. in Applied Christianity.',
                'Spanning 55 years of ordained ministry, “Dr Bob” has served as a church planter, pastor, family and marriage counselor, and a certified leader development coach. For 12 years, he hosted “The Dr Bob Grant Show,” a weekday 2-hour live talk radio program in Colorado addressing faith and culture. He currently serves as the U.S. Department of Defense Endorsing Agent for active duty military chaplains in The AMiA. Bob assists at The Abbey in worship, preaching, pastoral care, and discipleship.',
            ],
        ],
        [
            'name' => 'Graham Schuyler',
            'fullName' => 'The Rev. Graham Schuyler',
            'title' => 'Associate Rector/Pastor',
            'photo' => 'staff-schuyler.jpg',
            'bio' => [
                'Graham is married to Wendy, and they have two children: Hannah Grace and Graham Jr. He is originally from New Jersey but left after middle school to attend an all-boys boarding school in North Carolina and he has been in the South ever since. After a term serving in the United States Marine Corps and getting his combat action in Desert Shield and Desert Storm, he graduated from the College of Charleston, where he met his wife Wendy, who is a talented interior designer and furniture salesperson.',
                'Graham and Wendy attended seminary in Ambridge, Pennsylvania, at Trinity School for Ministry. After three years in Knoxville, Tennessee, they discovered the need to get out of the church and go out in the local communities and preach the Gospel to the unchurched. They realized that there are many people out there that are wide open for the Gospel, but do not find themselves going to a church. So together they formed G3 Ministries, which is now home based in Pawleys Island, SC. They are a mission outreach ministry that plants the seed of the Gospel through relationships and earning the right. Graham assists at The Abbey in worship, preaching, discipleship, and youth ministry.',
            ],
        ],
        [
            'name' => 'Paula Johnson',
            'fullName' => 'Paula Johnson',
            'title' => 'Children’s Discipleship Pastor',
            'photo' => 'staff-johnson.jpg',
            'bio' => [
                'Paula is married to Todd and they have four children: Scott, Noah, Sarah, and Hope. She is originally from Sumter, SC. Todd is from Michigan and their children are what locals refer to as “creek ratz” because they have been raised on the inlet.',
                'Paula attended Coastal Carolina College for her undergraduate degree and the University of South Carolina for her MEd. Paula has a passion and heart for children to know they are loved by Jesus. When Paula is not serving the local church she also serves local nonprofits as a board member and through assisting with planning events. She is also active with her children’s schools serving as chaperone, board member, and Team Mom. Paula serves as the Church Administrator and oversees Children’s Ministry at The Abbey.',
            ],
        ],
        [
            'name' => 'Peyton Andreucci',
            'fullName' => 'Peyton Andreucci',
            'title' => 'Student Discipleship Pastor',
            'photo' => 'staff-andreucci.jpg',
            // Bio to come: add paragraphs here and a "Read bio" button appears automatically.
            'bio' => [],
        ],
    ],

    // Intro video in the left-hand slot under the home page cards. (The right-hand slot
    // automatically shows the newest sermon in source/_sermons.)
    'introVideo' => [
        'id' => 'LtU_pfpwkDc',
        'title' => 'Welcome to The Abbey at Pawleys Island',
    ],

    // Homepage "latest live stream" video. This is YouTube's automatic "Live streams"
    // playlist for the channel (the channel ID with UC swapped for UULV), so it always
    // opens on the newest stream with no site update needed.
    'liveStreamPlaylist' => 'UULVJHaxh7fG-EkC2W3a6LZacg',

    // The three cards under the home carousel. Each image is a finished graphic from the
    // legacy site (photo + text baked in), so the alt text carries the full wording.
    'featureCards' => [
        [
            'image' => 'card-hospitality.jpg',
            'alt' => 'Radical Hospitality. Come and See. Come to The Abbey. We welcome you to our family. God has a place for you.',
        ],
        [
            'image' => 'card-culture.jpg',
            'alt' => 'Cultural Engagement. Come and Learn. Come and learn about God, Christianity, and think about cultural issues through the lens of Christ.',
        ],
        [
            'image' => 'card-renewal.jpg',
            'alt' => 'Spiritual Renewal. Come and Renew. Come and be renewed by the Holy Spirit and practice the Christian faith in discipleship.',
        ],
    ],

    // Home page carousel. Slides advance in this order; `panel` (optional) is the taupe
    // text box laid over the photo. Rebuilt as live text from the legacy site's slider graphics.
    'heroSlides' => [
        [
            'image' => 'slide-1.jpg',
            'alt' => 'Live oaks draped in Spanish moss over the brick drive and church campus at sunset',
            'panel' => [
                'heading' => 'You’re Invited…',
                'body' => 'We want to invite you to experience God our Father, through His Son Jesus Christ, by the power of the Holy Spirit in a new and vibrant way, where your heart becomes free through His Word, His presence, and authentic community.',
                'tagline' => ['COME + BELONG'],
            ],
        ],
        [
            'image' => 'slide-2.jpg',
            'alt' => 'A stylized, painterly rendering of The Abbey’s church building with its cross in the center gable',
        ],
        [
            'image' => 'slide-3.jpg',
            'alt' => 'The congregation gathered in worship, with a pianist and a cellist leading music',
        ],
        [
            'image' => 'slide-4.jpg',
            'alt' => 'A group of children laughing together on a sofa, with candy canes on the tables in front of them',
            'panel' => [
                'heading' => 'Mission',
                'body' => 'Like the Celtic abbeys of old, we desire to transform the world by proclaiming the Gospel of Jesus Christ through',
                'tagline' => ['RADICAL HOSPITALITY', 'CULTURAL ENGAGEMENT', '+ SPIRITUAL RENEWAL.'],
            ],
        ],
        [
            'image' => 'slide-5.jpg',
            // This graphic has its own text baked in, so show all of it (centered) rather than
            // cropping to fill; `bg` matches the image's edge color so there are no visible bars.
            'fit' => 'contain',
            'bg' => '#050713',
            'alt' => 'Sundays at The Abbey, 10:30 AM. “Lord, I love the house where you live, the place where your glory dwells.” Psalm 26. Sunlight through a stained-glass window lights the sanctuary.',
        ],
    ],

    'navigation' => [
        ['title' => 'Who We Are', 'url' => '/who-we-are', 'children' => [
            ['title' => 'Our Beliefs', 'url' => '/our-beliefs'],
            ['title' => 'Our Team', 'url' => '/our-team'],
            ['title' => 'Live Stream', 'url' => 'liveStream', 'external' => true],
        ]],
        ['title' => 'Weddings + Events', 'url' => '/weddings-events'],
        ['title' => 'Contact Us', 'url' => '/contact', 'children' => [
            ['title' => 'Give', 'url' => '/give'],
            ['title' => 'My Abbey', 'url' => 'myAbbey', 'external' => true],
        ]],
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
