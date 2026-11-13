<?php
/**
 * ==========================================================================
 *  content.php — THE SINGLE PLACE TO EDIT THIS WEBSITE
 * ==========================================================================
 *  Everything visible on the site (text, phone number, address, services,
 *  shipping partners) lives in this one file as plain PHP arrays.
 *
 *  To update the site: edit the values between the quotes below, save,
 *  and re-upload this file. You do NOT need to touch index.php, the CSS,
 *  or any other file to change text, add a service, or update contact info.
 *
 *  - 'site'  => values that are the same in Arabic and English (phone,
 *               email, map link, social links).
 *  - 'ar'    => every piece of Arabic text.
 *  - 'en'    => every piece of English text.
 *
 *  To ADD a service: copy one block inside 'services' (the part between
 *  matching [ and ],) and paste it as a new entry, then edit the text.
 *  Do this in BOTH the 'ar' and 'en' sections so the two languages match.
 *
 *  To remove a service: delete its whole block (between matching [ and ],).
 * ==========================================================================
 */

return [

    // ---------------------------------------------------------------------
    // SHARED — identical in both languages. Edit phone/email/address here.
    // ---------------------------------------------------------------------
    'site' => [
        'domain'        => 'https://alkhailexpress.com',
        'default_lang'  => 'ar',

        // Phone shown on the site and used for the "Call" button.
        'phone_display' => '+20 155 539 9567',
        'phone_raw'     => '+201555399567',

        // Used to build the WhatsApp chat link (digits only, no +).
        'whatsapp_raw'  => '201555399567',

        'email'         => 'Alkhail.eg@gmail.com',

        // Used for the embedded Google Map and the "Get Directions" button.
        'map_query'     => 'Al Faisal, Habayeb Entrance, El Sayeda, Giza, Egypt',

        // Add a URL to show that icon in the footer. Leave empty ('') to hide it.
        'social' => [
            'facebook'  => '',
            'instagram' => '',
            'linkedin'  => '',
        ],

        // Used for the JSON-LD structured data (helps Google understand the business).
        'founding_year' => '',   // e.g. '2022' — leave empty if you'd rather not show it
        'logo_path'     => 'assets/images/logo-mark.png',
    ],

    // ---------------------------------------------------------------------
    // ARABIC CONTENT
    // ---------------------------------------------------------------------
    'ar' => [

        'meta' => [
            'title'       => 'شركة الخيل للتجارة والتصدير | شحن جوي سريع DHL وFedEx وAramex - الجيزة، مصر',
            'description' => 'شركة الخيل للتجارة والتصدير (ذ.م.م) في الجيزة، مصر: شحن جوي سريع مع DHL وFedEx وAramex، خدمات تمثيل تجاري لرجال الأعمال، إدارة مشاريع، وتجارة عامة استيراد وتصدير.',
            'keywords'    => 'شحن جوي سريع مصر, DHL مصر, FedEx مصر, Aramex مصر, تجارة وتصدير, شركة الخيل, تمثيل تجاري الجيزة, إدارة مشاريع القاهرة',
        ],

        'site_name'  => 'شركة الخيل للتجارة والتصدير',
        'site_name_short' => 'الخيل للتجارة والتصدير',
        'company_suffix'  => '(ذ.م.م)',

        'nav' => [
            'home'     => 'الرئيسية',
            'services' => 'خدماتنا',
            'process'  => 'كيف نعمل',
            'partners' => 'شركاء الشحن',
            'about'    => 'من نحن',
            'contact'  => 'تواصل معنا',
            'call'     => 'اتصل الآن',
        ],

        'hero' => [
            'eyebrow'  => 'خدمات متكاملة راقية لنجاح أعمالك',
            'title'    => 'شريكك الموثوق في الشحن السريع والتجارة الدولية',
            'subtitle' => 'من الجيزة إلى العالم، نقدّم تمثيلاً تجارياً وإدارة مشاريع وشحناً جوياً سريعاً مع DHL وFedEx وAramex لرجال الأعمال والشركات.',
            'cta_primary'   => 'اتصل بنا الآن',
            'cta_secondary' => 'راسلنا على واتساب',
            'badge_route_from' => 'القاهرة',
            'badge_route_to'   => 'العالم',
            'trust_label'      => 'نشحن عبر',
            'float_title'      => 'شحن جوي سريع',
            'float_text'       => 'من الجيزة إلى أي مكان',
        ],

        // Numbers strip under the hero. Edit freely — keep them accurate.
        'stats' => [
            ['value' => '3',    'label' => 'شركاء شحن عالميين'],
            ['value' => '+200', 'label' => 'دولة عبر شبكات شركائنا'],
            ['value' => '4',    'label' => 'خدمات متكاملة'],
            ['value' => '1',    'label' => 'جهة واحدة لكل احتياجاتك'],
        ],

        'services' => [
            'eyebrow' => 'خدماتنا',
            'title'   => 'كل ما تحتاجه أعمالك في مكان واحد',
            'subtitle'=> 'باقة متكاملة من الخدمات لدعم رجال الأعمال والشركات، من التمثيل التجاري إلى الشحن الجوي السريع وإدارة المشاريع.',
            'list' => [
                [
                    'icon'  => 'briefcase',
                    'title' => 'خدمات رجال الأعمال',
                    'desc'  => 'نمثّلك تجارياً وندير مفاوضاتك ومتابعاتك مع الجهات والشركاء لضمان سير أعمالك بسلاسة.',
                    'items' => ['تمثيل تجاري', 'تفاوض', 'متابعة'],
                ],
                [
                    'icon'  => 'plane',
                    'title' => 'شحن جوي سريع',
                    'desc'  => 'نشحن طلباتك وبضائعك جواً عبر أكبر شركات الشحن العالمية بسرعة وأمان.',
                    'items' => ['DHL', 'FedEx', 'Aramex'],
                ],
                [
                    'icon'  => 'sitemap',
                    'title' => 'إدارة المشاريع',
                    'desc'  => 'نتولى تشغيل وصيانة وتشطيب مشاريعك، بالإضافة إلى التوريد والمشتريات اللازمة.',
                    'items' => ['حلول التشغيل والصيانة والتشطيب', 'التوريد والمشتريات'],
                ],
                [
                    'icon'  => 'exchange',
                    'title' => 'تجارة عامة واستيراد وتصدير',
                    'desc'  => 'نشتري ونبيع وننقل البضائع محلياً ودولياً، ونؤمّن لك أفضل قنوات التوريد.',
                    'items' => ['بيع', 'شراء'],
                ],
            ],
        ],

        // "How we work" steps. Icons: chat, clipboard, cog, box (see functions.php)
        'process' => [
            'eyebrow'  => 'كيف نعمل',
            'title'    => 'خطوات بسيطة من الطلب حتى التسليم',
            'subtitle' => 'نتولى كل التفاصيل نيابةً عنك، لتتفرغ لإدارة أعمالك.',
            'steps' => [
                ['icon' => 'chat',      'title' => 'تواصل معنا',        'desc' => 'اتصل بنا أو راسلنا على واتساب وأخبرنا باحتياجك.'],
                ['icon' => 'clipboard', 'title' => 'دراسة الطلب',       'desc' => 'نراجع تفاصيل طلبك ونقترح الحل والتكلفة الأنسب.'],
                ['icon' => 'cog',       'title' => 'التنفيذ',           'desc' => 'ننفّذ المهمة بدقة ونتابع كل خطوة نيابةً عنك.'],
                ['icon' => 'box',       'title' => 'التسليم والمتابعة', 'desc' => 'نسلّمك النتيجة ونبقى معك للمتابعة بعد التسليم.'],
            ],
        ],

        'partners' => [
            'eyebrow'  => 'شركاء الشحن',
            'title'    => 'نشحن معك إلى أي مكان في العالم',
            'subtitle' => 'نتعامل مع شركات الشحن العالمية الرائدة لضمان وصول شحناتك في الوقت المناسب وبأمان تام.',
            'list' => ['DHL', 'FedEx', 'Aramex'],
            'badge_meta' => 'شحن دولي سريع',
        ],

        'about' => [
            'eyebrow' => 'من نحن',
            'title'   => 'شريك تجاري من الجيزة... بامتداد عالمي',
            'body'    => 'شركة الخيل للتجارة والتصدير (ذ.م.م) شركة مصرية مقرها الجيزة، نعمل كحلقة وصل بين رجال الأعمال والأسواق العالمية. نوفر الشحن الجوي السريع، التمثيل التجاري، إدارة المشاريع، والتجارة العامة استيراداً وتصديراً بكفاءة وموثوقية تامة.',
            'points' => [
                'تمثيل تجاري ومتابعة مفاوضات لرجال الأعمال',
                'شحن جوي سريع مع DHL وFedEx وAramex',
                'إدارة مشاريع من التشغيل حتى التشطيب',
                'تجارة عامة بيعاً وشراءً محلياً ودولياً',
            ],
            'location_label' => 'مقرنا الرئيسي',
        ],

        'contact' => [
            'eyebrow'  => 'تواصل معنا',
            'title'    => 'جاهزون لبدء التعاون معك',
            'subtitle' => 'تواصل معنا عبر الهاتف أو واتساب أو البريد الإلكتروني، وسنرد عليك في أقرب وقت.',
            'label_address' => 'العنوان',
            'label_phone'   => 'الهاتف',
            'label_email'   => 'البريد الإلكتروني',
            'label_whatsapp'=> 'واتساب',
            'address'       => 'الفيصل، مدخل حبايب، السيدة، الجيزة، مصر',
            'cta_call'      => 'اتصل الآن',
            'cta_whatsapp'  => 'راسلنا على واتساب',
            'cta_email'     => 'أرسل بريداً إلكترونياً',
            'cta_directions'=> 'احصل على الاتجاهات',
            'whatsapp_message' => 'مرحباً، أرغب في الاستفسار عن خدماتكم.',
        ],

        // Call-to-action band above the contact section
        'cta' => [
            'title' => 'هل لديك شحنة أو مشروع؟',
            'text'  => 'تحدّث معنا اليوم ودعنا نجد لك الحل الأنسب بسرعة وموثوقية.',
        ],

        'footer' => [
            'tagline' => 'شريكك الموثوق في الشحن السريع والتجارة الدولية.',
            'services_title' => 'خدماتنا',
            'to_top' => 'إلى الأعلى',
            'nav_title' => 'روابط سريعة',
            'contact_title' => 'تواصل معنا',
            'rights' => 'جميع الحقوق محفوظة',
            'made_with' => 'الموقع',
        ],

        'lang_switch_label' => 'English',
        'skip_link' => 'تخطَّ إلى المحتوى',
    ],

    // ---------------------------------------------------------------------
    // ENGLISH CONTENT
    // ---------------------------------------------------------------------
    'en' => [

        'meta' => [
            'title'       => 'Al Khail Trading & Export (LLC) | Fast Air Shipping DHL, FedEx & Aramex - Giza, Egypt',
            'description' => 'Al Khail Trading & Export (LLC), Giza, Egypt: fast air shipping with DHL, FedEx & Aramex, business representation, project management, and general import-export trade.',
            'keywords'    => 'fast air shipping Egypt, DHL Egypt, FedEx Egypt, Aramex Egypt, trading and export, Al Khail company, business representation Giza, project management Cairo',
        ],

        'site_name'  => 'Al Khail Trading & Export',
        'site_name_short' => 'Al Khail Trading & Export',
        'company_suffix'  => '(LLC)',

        'nav' => [
            'home'     => 'Home',
            'services' => 'Services',
            'process'  => 'How We Work',
            'partners' => 'Partners',
            'about'    => 'About',
            'contact'  => 'Contact',
            'call'     => 'Call Now',
        ],

        'hero' => [
            'eyebrow'  => 'Premium Integrated Services for Your Business Success',
            'title'    => 'Your Trusted Partner in Fast Shipping & International Trade',
            'subtitle' => 'From Giza to the world — commercial representation, project management, and express air shipping with DHL, FedEx & Aramex for businessmen and companies.',
            'cta_primary'   => 'Call Us Now',
            'cta_secondary' => 'Message Us on WhatsApp',
            'badge_route_from' => 'Cairo',
            'badge_route_to'   => 'The World',
            'trust_label'      => 'We ship with',
            'float_title'      => 'Express Air Shipping',
            'float_text'       => 'From Giza to anywhere',
        ],

        // Numbers strip under the hero. Edit freely — keep them accurate.
        'stats' => [
            ['value' => '3',    'label' => 'Global shipping partners'],
            ['value' => '200+', 'label' => 'Countries via partner networks'],
            ['value' => '4',    'label' => 'Integrated services'],
            ['value' => '1',    'label' => 'Single point of contact'],
        ],

        'services' => [
            'eyebrow' => 'Our Services',
            'title'   => 'Everything Your Business Needs, In One Place',
            'subtitle'=> 'A complete service package for businessmen and companies — from commercial representation to fast air shipping and project management.',
            'list' => [
                [
                    'icon'  => 'briefcase',
                    'title' => 'Businessmen Services',
                    'desc'  => 'We represent you commercially and manage negotiations and follow-up with partners so your business runs smoothly.',
                    'items' => ['Commercial Representation', 'Negotiation', 'Follow-up'],
                ],
                [
                    'icon'  => 'plane',
                    'title' => 'Fast Air Shipping',
                    'desc'  => 'We ship your orders and goods by air through the world\'s leading couriers, quickly and safely.',
                    'items' => ['DHL', 'FedEx', 'Aramex'],
                ],
                [
                    'icon'  => 'sitemap',
                    'title' => 'Project Management',
                    'desc'  => 'We handle operation, maintenance and finishing for your projects, along with the supply and procurement they need.',
                    'items' => ['Operation, Maintenance & Finishing Solutions', 'Supply & Procurement'],
                ],
                [
                    'icon'  => 'exchange',
                    'title' => 'General Trading & Export',
                    'desc'  => 'We buy, sell, and move goods locally and internationally, securing the best supply channels for you.',
                    'items' => ['Sell', 'Buy'],
                ],
            ],
        ],

        // "How we work" steps. Icons: chat, clipboard, cog, box (see functions.php)
        'process' => [
            'eyebrow'  => 'How We Work',
            'title'    => 'Simple Steps, From Request to Delivery',
            'subtitle' => 'We take care of the details on your behalf, so you can focus on running your business.',
            'steps' => [
                ['icon' => 'chat',      'title' => 'Get in Touch',         'desc' => 'Call us or message us on WhatsApp and tell us what you need.'],
                ['icon' => 'clipboard', 'title' => 'We Review',            'desc' => 'We study your request and propose the best solution and cost.'],
                ['icon' => 'cog',       'title' => 'We Execute',           'desc' => 'We carry out the work precisely and follow up every step for you.'],
                ['icon' => 'box',       'title' => 'Delivery & Follow-up', 'desc' => 'We deliver the result and stay with you for after-delivery follow-up.'],
            ],
        ],

        'partners' => [
            'eyebrow'  => 'Shipping Partners',
            'title'    => 'We Ship With You, Anywhere in the World',
            'subtitle' => 'We work with the world\'s leading courier networks to make sure your shipments arrive safely and on time.',
            'list' => ['DHL', 'FedEx', 'Aramex'],
            'badge_meta' => 'International express',
        ],

        'about' => [
            'eyebrow' => 'About Us',
            'title'   => 'A Trade Partner Based in Giza, With Global Reach',
            'body'    => 'Al Khail Trading & Export (LLC) is an Egyptian company based in Giza, acting as a bridge between businessmen and global markets. We provide fast air shipping, commercial representation, project management, and general import-export trade with full efficiency and reliability.',
            'points' => [
                'Commercial representation and negotiation follow-up for businessmen',
                'Fast air shipping with DHL, FedEx & Aramex',
                'Project management from operations through finishing',
                'General trade — buying and selling, locally and internationally',
            ],
            'location_label' => 'Headquarters',
        ],

        'contact' => [
            'eyebrow'  => 'Contact Us',
            'title'    => 'Ready to Start Working With You',
            'subtitle' => 'Reach us by phone, WhatsApp, or email and we\'ll get back to you as soon as possible.',
            'label_address' => 'Address',
            'label_phone'   => 'Phone',
            'label_email'   => 'Email',
            'label_whatsapp'=> 'WhatsApp',
            'address'       => 'Al Faisal, Habayeb Entrance, El Sayeda, Giza, Egypt',
            'cta_call'      => 'Call Now',
            'cta_whatsapp'  => 'Message on WhatsApp',
            'cta_email'     => 'Send an Email',
            'cta_directions'=> 'Get Directions',
            'whatsapp_message' => 'Hello, I would like to ask about your services.',
        ],

        // Call-to-action band above the contact section
        'cta' => [
            'title' => 'Have a Shipment or a Project?',
            'text'  => 'Talk to us today and let us find the right solution for you — fast and reliably.',
        ],

        'footer' => [
            'tagline' => 'Your trusted partner in fast shipping and international trade.',
            'services_title' => 'Services',
            'to_top' => 'Back to top',
            'nav_title' => 'Quick Links',
            'contact_title' => 'Contact',
            'rights' => 'All rights reserved',
            'made_with' => 'Site',
        ],

        'lang_switch_label' => 'العربية',
        'skip_link' => 'Skip to content',
    ],
];
