<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Validation Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4bb543;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
        }
        
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTIwMCA0MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0iIzAwMCIgZmlsbC1vcGFjaXR5PSIwLjEiPjxwb2x5Z29uIHBvaW50cz0iMTIwMCwwIDEyMDAsNDAwIDAsNDAwIj48L3BvbHlnb24+PC9nPjwvc3ZnPg==');
            background-size: cover;
        }
        
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            margin-bottom: 3rem;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary);
        }
        
        .feature-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
        }
        
        .registration .feature-icon {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .public-validation .feature-icon {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--accent);
        }
        
        .private-validation .feature-icon {
            background-color: rgba(63, 55, 201, 0.1);
            color: var(--secondary);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-2px);
        }
        
        .btn-outline-light {
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            transform: translateY(-2px);
        }
        
        .cta-section {
            background-color: var(--light);
            padding: 80px 0;
        }
        
        footer {
            background-color: var(--dark);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
        
        .login-btn {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .login-btn:hover {
            background-color: var(--primary);
            color: white;
        }
        
        @media (max-width: 768px) {
            .hero {
                padding: 60px 0;
            }
            
            .section {
                padding: 50px 0;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style> 
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand  fw-bold" href="#" style="color: var(--primary);display: flex;align-items: center;">
                <div style="height: 1.25rem; width: 1.25rem;">
  <img class="img-fluid rounded" src="{{asset('img/logo22.jpg')}}" alt="Contained image" />
</div>

               <!--flex items-center<div class="h-10 w-10">
  <img class="h-full w-full object-fit" src="{{asset('img/logo22.jpg')}}" />
</div>--><!--
               <i class="fas fa-shield-alt me-2"></i>-->Ministry of Education
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('signup.index')}}">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.validation.create') }}">Public School Validation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('private.validation.create') }}">Private School Validation</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn login-btn" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 pb-5">
                    <h1 class="display-4 fw-bold mb-4">Edo State<br/> Ministry of Education Schools Platform</h1>
                    <p class="lead mb-4">Streamline your validation processes with our secure, efficient platform. Register, validate publicly or privately, and manage all your documents in one place.</p>
                    <!--
                    <a href="{{route('signup.index')}}" class="btn btn-light btn-lg me-3">Get Started</a>
                    <a href="#features" class="btn btn-outline-light btn-lg">Learn More</a>-->
                </div>
                <div class="col-lg-6 flex justify-center items-center text-center">
                    <img src="{{asset('img/logo2.jpg')}}" alt="Validation Platform" class="img-fluid rounded shadow" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="section registration">
        <div class="container">
            <h2 class="text-center section-title">Registration</h2>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card feature-card p-4">
                        <div class="feature-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h4 class="text-center mb-3">Easy Sign Up</h4>
                        <p class="text-center">Create your account in minutes with our streamlined registration process. Provide basic information and get started immediately.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card feature-card p-4">
                        <div class="feature-icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <h4 class="text-center mb-3">School Validation</h4>
                        <p class="text-center">Our secure verification process ensures that only authorized users can access the platform and its validation features.</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card feature-card p-4">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h4 class="text-center mb-3">Profile Setup</h4>
                        <p class="text-center">Customize your profile, set preferences, and configure notification settings to match your workflow requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Public Validation Section -->
    <section id="public-validation" class="section public-validation bg-light">
        <div class="container">
            <h2 class="text-center section-title">Public School Validation</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="{{asset('img/public2.webp')}}" alt="Public Validation" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-3">Transparent Document Verification</h3>
                    <p class="mb-4">Our public validation system allows anyone to verify the authenticity of documents without accessing sensitive information.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Anyone can validate documents with a verification code</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> No account required for validation</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Secure and tamper-proof verification process</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Instant validation results</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Detailed validation history and audit trail</li>
                    </ul>
                    <a href="{{ route('public.validation.create') }}" class="btn btn-primary mt-3">Learn More About Public Validation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Private Validation Section -->
    <section id="private-validation" class="section private-validation">
        <div class="container">
            <h2 class="text-center section-title">Private School Validation</h2>
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4">
                    <img src="https://cdn.pixabay.com/photo/2018/03/27/21/43/startup-3267505_1280.jpg" alt="Private Validation" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6 order-lg-1">
                    <h3 class="mb-3">Secure Internal Document Verification</h3>
                    <p class="mb-4">Private validation is designed for organizations that need to verify documents internally while maintaining strict access controls.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Restricted to authorized users only</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Advanced permission controls</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Detailed audit logs for compliance</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Integration with existing systems</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Custom validation workflows</li>
                    </ul>
                    <a href="{{ route('private.validation.create') }}" class="btn btn-primary mt-3">Explore Private Validation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section text-center">
        <div class="container">
            <h2 class="mb-4">Ready to Get Started?</h2>
            <p class="lead mb-4">Join users who trust our platform for their document validation needs.</p>
            <a href="{{route('signup.index')}}" class="btn btn-primary btn-lg me-3">Create Account</a>
            <a href="/login" class="btn btn-outline-primary btn-lg">Login to Your Account</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3"><i class="fas fa-shield-alt me-2"></i>Ministry of Education</h5>
                    <p>This portal is managed by the department of planning, Research & Statistics (PRS), Edo state Ministry of Education. <br/>All Information provided is subject to verification.</p>
                    <!--<div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>-->
                </div>
                <div class="col-lg-2 mb-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <div class="footer-links">
                        <p><a href="#registration">School Registration</a></p>
                        <p><a href="/login">Login</a></p>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="mb-3">Validation</h5>
                    <div class="footer-links">
                        <p><a href="{{ route('public.validation.create') }}">Public School</a></p>
                        <p><a href="{{ route('private.validation.create') }}">Private School</a></p>
                        <!--<p><a href="#">Documentation</a></p>
                        <p><a href="#">API Reference</a></p>
                        <p><a href="#">Help Center</a></p>
                        <p><a href="#">Community</a></p>-->
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5 class="mb-3">Contact Us</h5>
                    <div class="footer-links">
                        <p><i class="fas fa-envelope me-2"></i> support@edostategov.com.ng</p>
                        <!--<p><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Tech Street, Digital City</p>-->
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025. All rights reserved. </p>
                </div>
                <!--<div class="col-md-6 text-md-end">
                    <p><a href="#" class="text-white me-3">Privacy Policy</a> <a href="#" class="text-white">Terms of Service</a></p>
                </div>-->
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 15px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>
</html>