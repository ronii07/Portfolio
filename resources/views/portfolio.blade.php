@extends('layouts.app')

@php
    $projects = [
        [
            'title' => 'Flutter GPA & Grade Tracker',
            'type' => 'mobile',
            'label' => 'Mobile App',
            'tech' => ['Flutter', 'Dart', 'Material 3'],
            'summary' => 'A mobile app for tracking subjects and grades. It computes a GPA on the 4.0 scale weighted by units and shows a per-subject percentage and letter grade.',
            'highlights' => ['Dashboard with GPA, subject and grade counts', 'Profile page with light, dark and system themes', 'A friendly mascot that cheers you on'],
            'images' => ['project-flutter-grade-1.jpg', 'project-flutter-grade-2.jpg', 'project-flutter-grade-3.jpg', 'project-flutter-grade-4.jpg'],
            'featured' => true,
        ],
        [
            'title' => 'Student Record System',
            'type' => 'desktop',
            'label' => 'Desktop App',
            'tech' => ['VB.NET', 'Windows Forms'],
            'summary' => 'A permanent student record form that captures personal, family and school-background details, with full record management.',
            'highlights' => ['Submit, update, display, delete and search records', 'Semester selection and a records display panel'],
            'images' => ['project-student-record-system.jpg'],
        ],
        [
            'title' => 'Grade Calculator',
            'type' => 'desktop',
            'label' => 'Desktop App',
            'tech' => ['VB.NET', 'Windows Forms'],
            'summary' => 'Computes a student\'s class standing from quizzes, recitation, assignments and attendance, turning raw scores into ratings.',
            'highlights' => ['Per-category raw score and rating', 'Compute and reset controls'],
            'images' => ['project-grade-calculator.jpg'],
        ],
        [
            'title' => 'Area Calculator',
            'type' => 'desktop',
            'label' => 'Desktop App',
            'tech' => ['VB.NET', 'Windows Forms'],
            'summary' => 'A small geometry tool that calculates the area of a rectangle (length × width) and a triangle (base × height).',
            'highlights' => ['Shape selection with check boxes', 'Reset and restart controls'],
            'images' => ['project-area-calculator.jpg'],
        ],
    ];

    $certificates = [
        [
            'title' => 'Online Safety Through Netiquette',
            'issuer' => 'DICT Region II',
            'issuerFull' => 'Department of Information and Communications Technology',
            'type' => 'Webinar',
            'date' => 'July 23, 2026',
            'platform' => 'Google Meet',
            'summary' => 'Recognized for actively participating in a webinar on responsible, ethical and secure use of technology.',
            'image' => 'certificate-online-safety.jpg',
        ],
        [
            'title' => 'Startup Now Cordillera',
            'issuer' => 'DOST iHub · CAR',
            'issuerFull' => 'Department of Science and Technology, Cordillera Administrative Region',
            'type' => 'Webinar',
            'date' => 'September 2, 2026',
            'platform' => 'Zoom',
            'summary' => 'Participated in a session on programs, funding and opportunities for aspiring startups.',
            'image' => 'certificate-startup-cordillera.jpg',
        ],
    ];

    $skills = [
        ['name' => 'Flutter & Dart', 'note' => 'Mobile apps'],
        ['name' => 'VB.NET', 'note' => 'Desktop apps'],
        ['name' => 'Laravel & PHP', 'note' => 'Web apps'],
        ['name' => 'Blade, HTML & CSS', 'note' => 'Responsive UI'],
        ['name' => 'Git & GitHub', 'note' => 'Version control'],
        ['name' => 'Problem solving', 'note' => 'Logic & algorithms'],
    ];
@endphp

@section('content')
<div class="container container-padding">

    <!-- About -->
    <section id="about" class="section-margin">
        <div class="card card-padding-large hero-card reveal">
            <div class="profile-section">
                <div class="profile-image">
                    <img src="{{ asset('image/me.jpg') }}" alt="Portrait of Baruela Ronhelyn G" width="224" height="224">
                </div>
                <div class="profile-content">
                    <span class="hero-badge"><span class="hero-badge-dot" aria-hidden="true"></span> Open to opportunities</span>
                    <h1 class="profile-name">Baruela Ronhelyn G</h1>
                    <p class="profile-title">BSIT Student | Web &amp; App Developer</p>
                    <p class="profile-bio">
                        A passionate Information Technology student at Data Center College of the Philippines,
                        dedicated to learning and building useful, good-looking software &mdash; from desktop tools
                        to mobile apps and responsive websites.
                    </p>

                    <div class="hero-actions">
                        <a href="#projects" class="btn btn-primary">View my projects</a>
                        <a href="#contact" class="btn btn-ghost">Get in touch</a>
                    </div>

                    <dl class="hero-stats">
                        <div><dt>Projects</dt><dd>{{ count($projects) }}</dd></div>
                        <div><dt>Certificates</dt><dd>{{ count($certificates) }}</dd></div>
                        <div><dt>Degree</dt><dd>BSIT</dd></div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills -->
    <section id="skills" class="section-margin">
        <div class="section-head reveal">
            <h2 class="section-title">Skills &amp; Tools</h2>
            <p class="section-subtitle">Technologies I have used in my coursework and projects.</p>
        </div>
        <ul class="skills-grid">
            @foreach ($skills as $skill)
                <li class="skill-chip reveal">
                    <span class="skill-name">{{ $skill['name'] }}</span>
                    <span class="skill-note">{{ $skill['note'] }}</span>
                </li>
            @endforeach
        </ul>
    </section>

    <!-- Projects -->
    <section id="projects" class="section-margin">
        <div class="section-head reveal">
            <h2 class="section-title">Projects</h2>
            <p class="section-subtitle">Click any project to browse its screenshots.</p>
        </div>

        <div class="filter-bar reveal" role="group" aria-label="Filter projects">
            <button type="button" class="filter-chip is-active" data-filter="all" aria-pressed="true">All <span>{{ count($projects) }}</span></button>
            <button type="button" class="filter-chip" data-filter="mobile" aria-pressed="false">Mobile <span>{{ collect($projects)->where('type', 'mobile')->count() }}</span></button>
            <button type="button" class="filter-chip" data-filter="desktop" aria-pressed="false">Desktop <span>{{ collect($projects)->where('type', 'desktop')->count() }}</span></button>
        </div>

        <div class="pf-grid" id="projectGrid">
            @foreach ($projects as $p)
                @php
                    $urls = array_map(fn ($f) => asset('image/' . $f), $p['images']);
                    $count = count($urls);
                @endphp
                <article class="pf-card card reveal {{ !empty($p['featured']) ? 'is-featured' : '' }}" data-type="{{ $p['type'] }}">
                    @if ($p['type'] === 'mobile' && $count > 1)
                        <div class="pf-media pf-media--strip" style="--pf-bg: url('{{ $urls[0] }}')">
                            @foreach ($urls as $i => $u)
                                <a href="{{ $u }}"
                                   class="lightbox-trigger pf-shot"
                                   data-images="{{ json_encode($urls) }}"
                                   data-index="{{ $i }}"
                                   data-title="{{ $p['title'] }}"
                                   data-caption="{{ $p['label'] }} &middot; {{ implode(', ', $p['tech']) }}"
                                   aria-label="View {{ $p['title'] }} screenshot {{ $i + 1 }} of {{ $count }}">
                                    <img src="{{ $u }}" alt="{{ $p['title'] }} screenshot {{ $i + 1 }}" loading="lazy" decoding="async">
                                </a>
                            @endforeach
                            <span class="pf-tag">{{ $p['label'] }}</span>
                        </div>
                    @else
                        <a href="{{ $urls[0] }}"
                           class="lightbox-trigger pf-media pf-media--{{ $p['type'] }}"
                           data-images="{{ json_encode($urls) }}"
                           data-title="{{ $p['title'] }}"
                           data-caption="{{ $p['label'] }} &middot; {{ implode(', ', $p['tech']) }}"
                           aria-label="View screenshot of {{ $p['title'] }}"
                           style="--pf-bg: url('{{ $urls[0] }}')">
                            <img src="{{ $urls[0] }}" alt="{{ $p['title'] }} screenshot" loading="lazy" decoding="async">
                            <span class="pf-tag">{{ $p['label'] }}</span>
                            <span class="pf-overlay" aria-hidden="true"><span>View screenshot</span></span>
                        </a>
                    @endif

                    <div class="pf-body">
                        <h3 class="pf-title">{{ $p['title'] }}</h3>
                        <p class="pf-summary">{{ $p['summary'] }}</p>
                        <ul class="pf-highlights">
                            @foreach ($p['highlights'] as $h)
                                <li>{{ $h }}</li>
                            @endforeach
                        </ul>
                        <ul class="pf-tech" aria-label="Technologies used">
                            @foreach ($p['tech'] as $t)
                                <li>{{ $t }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Certificates -->
    <section id="certificates" class="section-margin">
        <div class="section-head reveal">
            <h2 class="section-title">Certificates</h2>
            <p class="section-subtitle">Seminars and webinars I have completed.</p>
        </div>

        <div class="cert-grid">
            @foreach ($certificates as $c)
                @php $url = asset('image/' . $c['image']); @endphp
                <article class="cert-card card reveal">
                    <a href="{{ $url }}"
                       class="lightbox-trigger cert-media"
                       data-images="{{ json_encode([$url]) }}"
                       data-title="{{ $c['title'] }}"
                       data-caption="{{ $c['issuerFull'] }} &middot; {{ $c['date'] }}"
                       aria-label="View certificate: {{ $c['title'] }}">
                        <img src="{{ $url }}" alt="Certificate of Participation: {{ $c['title'] }}" loading="lazy" decoding="async">
                        <span class="pf-overlay" aria-hidden="true"><span>View certificate</span></span>
                    </a>
                    <div class="cert-body">
                        <div class="cert-pills">
                            <span class="pill pill-solid">{{ $c['type'] }}</span>
                            <span class="pill">{{ $c['date'] }}</span>
                            <span class="pill">{{ $c['platform'] }}</span>
                        </div>
                        <h3 class="cert-title">{{ $c['title'] }}</h3>
                        <p class="cert-issuer" title="{{ $c['issuerFull'] }}">{{ $c['issuer'] }}</p>
                        <p class="cert-summary">{{ $c['summary'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Education -->
    <section id="education" class="section-margin">
        <div class="section-head reveal">
            <h2 class="section-title">Educational Background</h2>
        </div>
        <div class="card card-padding-large reveal">
            <div class="timeline">
                <div class="timeline-item is-current">
                    <h3 class="timeline-school">Data Center College of the Philippines</h3>
                    <p class="timeline-degree">Bachelor of Science in Information Technology</p>
                    <p class="timeline-year"><span class="pill pill-solid">Present</span></p>
                </div>
                <div class="timeline-item">
                    <h3 class="timeline-school">Abra High School</h3>
                    <p class="timeline-degree">Senior High School &ndash; General Academic Strand</p>
                    <p class="timeline-year">2023 &ndash; 2024</p>
                </div>
                <div class="timeline-item">
                    <h3 class="timeline-school">Abra High School</h3>
                    <p class="timeline-degree">Junior High School</p>
                    <p class="timeline-year">2021 &ndash; 2022</p>
                </div>
                <div class="timeline-item">
                    <h3 class="timeline-school">Bangued North Elementary School</h3>
                    <p class="timeline-degree">Elementary Education</p>
                    <p class="timeline-year">2016 &ndash; 2017</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section-margin">
        <div class="card card-padding-large contact-card reveal">
            <h2 class="contact-heading">Let&rsquo;s work together</h2>
            <p class="contact-text">Have an opportunity, a project idea, or just want to say hi? My inbox is open.</p>
            <div class="hero-actions hero-actions--center">
                <a href="mailto:baruelaronhelyn07@gmail.com" class="btn btn-primary">baruelaronhelyn07@gmail.com</a>
                <a href="tel:09555383367" class="btn btn-ghost">09555383367</a>
            </div>
        </div>
    </section>
</div>
@endsection
