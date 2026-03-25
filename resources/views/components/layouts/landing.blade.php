@props([
    'title' => 'Chronify — Time Tracking for Teams & Freelancers',
    'description' => 'Powerful cloud-based time tracking platform. Track hours, manage projects, and generate reports with precision and ease.',
    'canonicalUrl' => 'https://chronify.io',
    'ogImage' => 'https://chronify.io/images/og-cover.png',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Primary Meta Tags --}}
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Chronify">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonicalUrl }}">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    {{-- JSON-LD Structured Data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "https://chronify.io/#organization",
                "name": "Chronify",
                "url": "https://chronify.io",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://chronify.io/images/logo.png"
                },
                "sameAs": [],
                "contactPoint": {
                    "@type": "ContactPoint",
                    "email": "sales@chronify.io",
                    "contactType": "sales"
                }
            },
            {
                "@type": "SoftwareApplication",
                "@id": "https://chronify.io/#software",
                "name": "Chronify",
                "description": "{{ $description }}",
                "url": "https://chronify.io",
                "applicationCategory": "BusinessApplication",
                "operatingSystem": "Web, iOS, Android",
                "offers": [
                    {
                        "@type": "Offer",
                        "price": "0",
                        "priceCurrency": "USD",
                        "name": "Free",
                        "description": "For individuals getting started"
                    },
                    {
                        "@type": "Offer",
                        "price": "12",
                        "priceCurrency": "USD",
                        "name": "Pro",
                        "description": "For growing teams",
                        "unitText": "per user/month"
                    }
                ],
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "4.9",
                    "ratingCount": "5000",
                    "bestRating": "5"
                },
                "publisher": {
                    "@id": "https://chronify.io/#organization"
                }
            },
            {
                "@type": "WebSite",
                "@id": "https://chronify.io/#website",
                "url": "https://chronify.io",
                "name": "Chronify",
                "publisher": {
                    "@id": "https://chronify.io/#organization"
                }
            },
            {
                "@type": "WebPage",
                "@id": "{{ $canonicalUrl }}/#webpage",
                "url": "{{ $canonicalUrl }}",
                "name": "{{ $title }}",
                "description": "{{ $description }}",
                "isPartOf": {
                    "@id": "https://chronify.io/#website"
                },
                "about": {
                    "@id": "https://chronify.io/#software"
                }
            }
        ]
    }
    </script>

    {{-- Preconnect & Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.ico" sizes="any">

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-white text-surface-900 font-sans antialiased">
    {{ $slot }}
</body>
</html>
