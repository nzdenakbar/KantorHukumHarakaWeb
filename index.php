<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantor Hukum Haraka</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700;900&family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gold: #D4A017;
            --primary-dark: #B58900;
            --primary-light: #FFD700;
            --secondary-dark: #0A0A0A;
            --secondary-light: #141414;
            --accent-gold: #F4D03F;
            --text-white: #FAFAFA;
            --text-muted: #CCCCCC;
            --text-subtle: #999999;
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.2);
            --gradient-gold: linear-gradient(135deg, #D4A017, #FFD700, #F4D03F);
            --gradient-dark: linear-gradient(135deg, #0A0A0A, #141414, #1A1A1A);
            --gradient-radial: radial-gradient(circle at center, rgba(212, 160, 23, 0.1) 0%, transparent 70%);
            --shadow: 0 25px 50px rgba(0, 0, 0, 0.7);
            --shadow-gold: 0 10px 30px rgba(212, 160, 23, 0.4);
            --shadow-inset: inset 0 1px 0 rgba(255, 255, 255, 0.1);
            --border-gradient: linear-gradient(45deg, transparent, rgba(212, 160, 23, 0.3), transparent);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--secondary-dark);
            color: var(--text-white);
            line-height: 1.7;
            overflow-x: hidden;
            scroll-behavior: smooth;
            font-size: clamp(16px, 2vw, 17px);
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-radial);
            pointer-events: none;
            z-index: -1;
        }

        /* Enhanced Scrollbar */
        ::-webkit-scrollbar { width: 12px; }
        ::-webkit-scrollbar-track { 
            background: var(--secondary-dark);
            border-radius: 6px;
        }
        ::-webkit-scrollbar-thumb { 
            background: var(--gradient-gold);
            border-radius: 6px;
            border: 2px solid var(--secondary-dark);
        }
        ::-webkit-scrollbar-thumb:hover { 
            background: var(--primary-light);
            transform: scale(1.1);
        }

        /* Premium Loader */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--secondary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            transition: all 0.8s ease-out;
        }

        .loader.hidden { 
            opacity: 0; 
            visibility: hidden;
            transform: scale(0.9);
        }

        .loader-content {
            text-align: center;
            animation: loaderPulse 2s ease-in-out infinite;
            position: relative;
        }

        .loader-content::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            transform: translate(-50%, -50%);
            border: 2px solid transparent;
            border-top: 2px solid var(--primary-gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .loader-logo {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3.5rem, 7vw, 4rem);
            font-weight: 900;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            transform: translateY(30px);
            opacity: 0;
            animation: slideInUp 1s ease-out 0.3s forwards;
            position: relative;
        }

        .loader-text {
            font-size: clamp(16px, 2.2vw, 18px);
            color: var(--text-muted);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 300;
            opacity: 0;
            animation: slideInUp 1s ease-out 0.6s forwards;
        }

        @keyframes loaderPulse { 
            0%, 100% { transform: scale(1); } 
            50% { transform: scale(1.05); } 
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        @keyframes slideInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Premium Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: clamp(20px, 2.5vw, 25px) 0;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .navbar.scrolled {
            padding: clamp(12px, 1.8vw, 15px) 0;
            box-shadow: var(--shadow);
            background: rgba(10, 10, 10, 0.98);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(22px, 3vw, 26px);
            font-weight: 700;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            transition: all 0.4s ease;
            position: relative;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-gold);
            transition: width 0.4s ease;
        }

        .logo:hover::after { width: 100%; }

        .logo:hover { transform: scale(1.05); }

        .logo-img {
            width: clamp(45px, 6vw, 55px);
            height: clamp(45px, 6vw, 55px);
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid var(--primary-gold);
            transition: all 0.4s ease;
            box-shadow: var(--shadow-gold);
        }

        .logo:hover .logo-img { 
            transform: rotate(5deg) scale(1.1);
            box-shadow: 0 15px 40px rgba(212, 160, 23, 0.6);
        }

        .nav-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: 12px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.05);
        }

        .nav-toggle span {
            width: 25px;
            height: 3px;
            background: var(--gradient-gold);
            border-radius: 3px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-toggle.active span:nth-child(1) { transform: rotate(45deg) translate(8px, 8px); }
        .nav-toggle.active span:nth-child(2) { opacity: 0; transform: translateX(20px); }
        .nav-toggle.active span:nth-child(3) { transform: rotate(-45deg) translate(8px, -8px); }

        .nav-links {
            display: flex;
            gap: clamp(20px, 3vw, 30px);
        }

        .nav-links a {
            color: var(--text-white);
            text-decoration: none;
            font-size: clamp(15px, 2vw, 17px);
            font-weight: 500;
            padding: 10px 0;
            position: relative;
            transition: all 0.4s ease;
            letter-spacing: 0.5px;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-gold);
            opacity: 0;
            border-radius: 8px;
            transform: scale(0);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 3px;
            background: var(--gradient-gold);
            transition: all 0.4s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .nav-links a:hover::after { width: 100%; }
        .nav-links a:hover { 
            color: var(--primary-light); 
            transform: translateY(-2px);
        }

        /* Enhanced Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100vh;
            background: var(--gradient-dark);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999;
            backdrop-filter: blur(20px);
        }

        .mobile-menu::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-radial);
            opacity: 0.5;
        }

        .mobile-menu.active { right: 0; }

        .mobile-menu a {
            color: var(--text-white);
            text-decoration: none;
            font-size: clamp(2rem, 5vw, 2.5rem);
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            margin: 20px 0;
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateX(50px);
            position: relative;
            z-index: 1;
        }

        .mobile-menu.active a {
            opacity: 1;
            transform: translateX(0);
        }

        .mobile-menu a:hover { 
            color: var(--primary-light); 
            transform: scale(1.1) translateX(10px);
            text-shadow: 0 10px 30px rgba(212, 160, 23, 0.5);
        }

        /* Hero Section Enhancement */
        .hero {
            min-height: 100vh;
            background: var(--secondary-dark);
            display: flex;
            align-items: center;
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
            background: 
                linear-gradient(135deg, rgba(212, 160, 23, 0.1) 0%, transparent 50%),
                url('https://images.unsplash.com/photo-1505664194779-8beaceb93744?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
            opacity: 0.15;
            transform: translateY(0) scale(1.1);
            transition: transform 0.1s ease-out;
        }

        .hero.parallax::before { 
            transform: translateY(calc(var(--scroll-y) * -0.2)) scale(1.1); 
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(212, 160, 23, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 215, 0, 0.15) 0%, transparent 50%);
            animation: heroGlow 8s ease-in-out infinite alternate;
        }

        @keyframes heroGlow {
            0% { opacity: 0.3; transform: scale(1); }
            100% { opacity: 0.6; transform: scale(1.05); }
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
            z-index: 2;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .hero-content {
            max-width: 900px;
            text-align: left;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 2px solid var(--glass-border);
            padding: clamp(35px, 5vw, 50px);
            border-radius: 20px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .hero-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--border-gradient);
            opacity: 0.5;
            border-radius: 20px;
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.7; }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gradient-gold);
            color: var(--secondary-dark);
            padding: clamp(10px, 2vw, 14px) clamp(20px, 3vw, 28px);
            border-radius: 25px;
            font-size: clamp(14px, 2vw, 16px);
            font-weight: 700;
            margin-bottom: 25px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
            box-shadow: var(--shadow-gold);
            position: relative;
            z-index: 1;
        }

        .hero-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s ease;
        }

        .hero-badge:hover::before { left: 100%; }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 7vw, 5rem);
            font-weight: 900;
            background: linear-gradient(135deg, var(--text-white), var(--primary-light));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
            margin-bottom: 25px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.1s;
            position: relative;
            z-index: 1;
        }

        .hero-description {
            font-size: clamp(16px, 2.2vw, 19px);
            color: var(--text-muted);
            margin-bottom: 35px;
            max-width: 85%;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.2s;
            font-weight: 300;
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.3s;
            position: relative;
            z-index: 1;
            justify-content: center;
        }

        .hero-content.visible .hero-badge,
        .hero-content.visible .hero-title,
        .hero-content.visible .hero-description,
        .hero-content.visible .hero-buttons {
            opacity: 1;
            transform: translateY(0);
        }

        /* Enhanced Buttons */
        .btn {
            padding: clamp(15px, 2.5vw, 18px) clamp(25px, 4vw, 35px);
            border: none;
            border-radius: 12px;
            font-size: clamp(15px, 2vw, 17px);
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gradient-gold);
            color: var(--secondary-dark);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-gold);
            letter-spacing: 0.5px;
            text-transform: uppercase;
            flex: 1;
            min-width: 200px;
            justify-content: center;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before { left: 100%; }
        .btn:hover { 
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(212, 160, 23, 0.6);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid var(--primary-gold);
            color: var(--text-white);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover { 
            background: var(--gradient-gold); 
            color: var(--secondary-dark);
            border-color: transparent;
        }

        /* Enhanced Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: clamp(60px, 8vw, 80px);
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
        }

        .section-subtitle {
            font-size: clamp(14px, 2vw, 16px);
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 15px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 3.5rem);
            font-weight: 900;
            color: var(--text-white);
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.1s;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            width: 100px;
            height: 4px;
            background: var(--gradient-gold);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-description {
            font-size: clamp(16px, 2vw, 18px);
            color: var(--text-muted);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.2s;
            font-weight: 300;
        }

        .section-header.visible .section-subtitle,
        .section-header.visible .section-title,
        .section-header.visible .section-description {
            opacity: 1;
            transform: translateY(0);
        }

        /* About Section */
        .about {
            padding: clamp(80px, 10vw, 120px) 0;
            background: var(--secondary-light);
            position: relative;
        }

        .about::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-radial);
            opacity: 0.3;
        }

        .about-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(40px, 5vw, 60px);
            align-items: center;
        }

        .about-content {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .about-content.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .about-image {
            width: 100%;
            height: 400px;
            background: var(--gradient-gold);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-gold);
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.6s ease;
        }

        .about-image.visible {
            opacity: 1;
            transform: scale(1);
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 3vw, 2.2rem);
            font-weight: 700;
            margin-bottom: 20px;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .about-content p {
            color: var(--text-muted);
            font-size: clamp(15px, 2vw, 17px);
            line-height: 1.8;
            margin-bottom: 20px;
            font-weight: 300;
            text-align: justify;
        }

        .about-features {
            list-style: none;
        }

        .about-features li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
            color: var(--text-muted);
            font-size: clamp(14px, 1.8vw, 16px);
        }

        .about-features li i {
            color: var(--primary-gold);
            font-size: 18px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Enhanced Team Section */
        .team {
            padding: clamp(80px, 10vw, 120px) 0;
            background: var(--secondary-light);
            position: relative;
        }

        .team::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-radial);
            opacity: 0.3;
        }

        .team-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
            z-index: 1;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(380px, 45vw, 450px), 1fr));
            gap: clamp(50px, 6vw, 70px);
        }

        .team-member {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 20px;
            padding: clamp(25px, 4vw, 35px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(30px);
            opacity: 0;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }

        .team-member::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--border-gradient);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .team-member:hover::before { opacity: 0.3; }

        .team-member.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .team-member:hover {
            border-color: var(--primary-gold);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 60px rgba(212, 160, 23, 0.4);
        }

        .team-header {
            display: flex;
            align-items: center;
            gap: clamp(20px, 3vw, 25px);
            margin-bottom: 20px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .team-photo {
            width: clamp(200px, 25vw, 250px);
            height: clamp(250px, 30vw, 300px);
            overflow: hidden;
            position: relative;
            border-radius: 15px;
            box-shadow: var(--shadow);
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.6s ease;
            border: 3px solid var(--primary-gold);
            flex-shrink: 0;
        }

        .team-photo.visible {
            opacity: 1;
            transform: scale(1);
        }

        .team-photo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-gold);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
            mix-blend-mode: overlay;
        }

        .team-member:hover .team-photo::before { opacity: 0.2; }

        .team-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .team-member:hover .team-photo img { transform: scale(1.1); }

        .team-info { 
            flex: 1; 
            position: relative;
            z-index: 2;
        }

        .team-name {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.6rem, 2.5vw, 1.9rem);
            font-weight: 700;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .team-position {
            color: var(--primary-light);
            font-size: clamp(14px, 2vw, 16px);
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .team-credentials {
            color: var(--text-muted);
            font-size: clamp(13px, 1.8vw, 14px);
            line-height: 1.7;
            margin-bottom: 15px;
            font-weight: 300;
        }

        .team-contact-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .contact-btn {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--glass-bg);
            border: 2px solid var(--glass-border);
            color: var(--primary-gold);
            position: relative;
            overflow: hidden;
        }

        .contact-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-gold);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .contact-btn:hover::before { opacity: 1; }

        .contact-btn:hover {
            transform: scale(1.15) rotate(5deg);
            color: var(--secondary-dark);
            box-shadow: var(--shadow-gold);
        }

        .contact-btn i {
            position: relative;
            z-index: 1;
        }

        .whatsapp-btn { 
            background: #25D366; 
            color: white; 
            border-color: #25D366; 
        }

        .whatsapp-btn:hover { 
            background: #20B355;
            transform: scale(1.15) rotate(5deg);
        }

        .email-btn { 
            background: var(--gradient-gold); 
            color: var(--secondary-dark); 
            border-color: var(--primary-gold); 
        }

        .email-btn:hover { 
            filter: brightness(1.2);
            transform: scale(1.15) rotate(5deg);
        }

        .instagram-btn { 
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); 
            color: white; 
            border-color: #f09433; 
        }

        .instagram-btn:hover { 
            filter: brightness(1.2);
            transform: scale(1.15) rotate(5deg);
        }

        .team-description {
            color: var(--text-muted);
            font-size: clamp(14px, 1.8vw, 16px);
            line-height: 1.7;
            margin-top: 15px;
            font-weight: 300;
            position: relative;
            z-index: 2;
            text-align: justify;
        }

        .team-specialization { 
            margin-top: 15px; 
            position: relative;
            z-index: 2;
        }

        .specialization-title { 
            color: var(--primary-gold); 
            font-weight: 700; 
            font-size: clamp(13px, 1.8vw, 15px); 
            margin-bottom: 8px; 
            text-transform: uppercase; 
            letter-spacing: 1px;
        }

        .specialization-list { 
            color: var(--text-muted); 
            font-size: clamp(13px, 1.8vw, 14px); 
            line-height: 1.7; 
            font-weight: 300;
        }

        /* Enhanced Gallery Section */
        .gallery {
            padding: clamp(80px, 10vw, 120px) 0;
            background: var(--secondary-dark);
            position: relative;
            overflow: hidden;
        }

        .gallery::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 30% 70%, rgba(212, 160, 23, 0.1) 0%, transparent 60%),
                url('https://images.unsplash.com/photo-1505664194779-8beaceb93744?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
            opacity: 0.1;
            transform: translateY(0) scale(1.05);
            transition: transform 0.1s ease-out;
        }

        .gallery.parallax::before { 
            transform: translateY(calc(var(--scroll-y) * -0.15)) scale(1.05); 
        }

        .gallery-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
            z-index: 1;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(300px, 35vw, 350px), 1fr));
            gap: clamp(20px, 3vw, 30px);
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            cursor: pointer;
            border: 2px solid var(--glass-border);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(30px);
            opacity: 0;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            box-shadow: var(--shadow);
        }

        .gallery-item.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-gold);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1;
            mix-blend-mode: overlay;
        }

        .gallery-item:hover::before { opacity: 0.3; }

        .gallery-item:hover {
            transform: translateY(-8px) scale(1.03);
            border-color: var(--primary-gold);
            box-shadow: 0 25px 60px rgba(212, 160, 23, 0.4);
        }

        .gallery-item img {
            width: 100%;
            height: clamp(200px, 25vw, 250px);
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover img { transform: scale(1.1); }

        .gallery-desc {
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(20px);
            color: var(--text-white);
            text-align: center;
            padding: 15px;
            font-size: clamp(13px, 1.8vw, 15px);
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-top: 2px solid var(--primary-gold);
            font-weight: 500;
            z-index: 2;
        }

        .gallery-item:hover .gallery-desc { transform: translateY(0); }

        /* Enhanced Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            justify-content: center;
            align-items: center;
            z-index: 2000;
            backdrop-filter: blur(20px);
        }

        .lightbox.active { display: flex; }

        .lightbox img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 16px;
            transform: scale(0.8);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.8);
            border: 3px solid var(--primary-gold);
        }

        .lightbox.active img {
            transform: scale(1);
            opacity: 1;
        }

        .lightbox .close {
            position: absolute;
            top: 30px;
            right: 30px;
            color: var(--primary-gold);
            font-size: clamp(2rem, 4vw, 2.5rem);
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(0, 0, 0, 0.8);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 2px solid var(--primary-gold);
        }

        .lightbox .close:hover { 
            color: var(--primary-light); 
            transform: scale(1.1) rotate(90deg);
            background: rgba(212, 160, 23, 0.2);
        }

        /* Enhanced Services Section */
        .services {
            padding: clamp(80px, 10vw, 120px) 0;
            background: var(--secondary-light);
            position: relative;
        }

        .services::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-radial);
            opacity: 0.4;
        }

        .services-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
            z-index: 1;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(320px, 38vw, 380px), 1fr));
            gap: clamp(25px, 4vw, 35px);
        }

        .service-card {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 20px;
            padding: clamp(25px, 4vw, 35px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(30px);
            opacity: 0;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--border-gradient);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .service-card:hover::before { opacity: 0.3; }

        .service-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .service-card:hover {
            border-color: var(--primary-gold);
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 60px rgba(212, 160, 23, 0.4);
        }

        .service-icon {
            width: clamp(60px, 10vw, 75px);
            height: clamp(60px, 10vw, 75px);
            background: var(--gradient-gold);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(26px, 4vw, 32px);
            color: var(--secondary-dark);
            margin-bottom: 25px;
            transition: all 0.4s ease;
            box-shadow: var(--shadow-gold);
            position: relative;
            z-index: 2;
        }

        .service-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 15px;
        }

        .service-card:hover .service-icon::before { opacity: 1; }

        .service-card:hover .service-icon { 
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 40px rgba(212, 160, 23, 0.6);
        }

        .service-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 2.2vw, 1.8rem);
            font-weight: 700;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 18px;
            position: relative;
            z-index: 2;
        }

        .service-description {
            color: var(--text-muted);
            font-size: clamp(14px, 1.8vw, 16px);
            line-height: 1.7;
            margin-bottom: 20px;
            font-weight: 300;
            position: relative;
            z-index: 2;
        }

        .service-features {
            list-style: none;
            position: relative;
            z-index: 2;
        }

        .service-features li {
            color: var(--text-muted);
            margin-bottom: 12px;
            padding-left: 30px;
            position: relative;
            font-size: clamp(13px, 1.8vw, 15px);
            transition: all 0.3s ease;
            font-weight: 300;
        }

        .service-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 0;
            color: var(--primary-gold);
            font-weight: bold;
            font-size: 16px;
            background: rgba(212, 160, 23, 0.2);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .service-card:hover .service-features li {
            transform: translateX(5px);
            color: var(--text-white);
        }

        .service-card:hover .service-features li::before {
            background: var(--gradient-gold);
            color: var(--secondary-dark);
            transform: scale(1.2);
        }

        /* How to Use Services */
        .services-howto {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 20px;
            padding: clamp(25px, 4vw, 35px);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-top: clamp(25px, 4vw, 35px);
            transform: translateY(30px);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .services-howto.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .services-howto::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--border-gradient);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .services-howto:hover::before { opacity: 0.3; }

        .services-howto:hover {
            border-color: var(--primary-gold);
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 60px rgba(212, 160, 23, 0.4);
        }

        .howto-steps {
            list-style: none;
            counter-reset: step-counter;
            padding: 0;
        }

        .howto-steps li {
            counter-increment: step-counter;
            position: relative;
            margin-bottom: 20px;
            padding-left: 40px;
            color: var(--text-muted);
            font-size: clamp(14px, 1.8vw, 16px);
            line-height: 1.7;
            font-weight: 300;
        }

        .howto-steps li::before {
            content: counter(step-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: var(--gradient-gold);
            color: var(--secondary-dark);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        .howto-steps li strong {
            color: var(--text-white);
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Enhanced Contact Section */
        .contact {
            padding: clamp(80px, 10vw, 120px) 0;
            background: var(--secondary-dark);
            position: relative;
        }

        .contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 70% 30%, rgba(212, 160, 23, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 30% 80%, rgba(255, 215, 0, 0.08) 0%, transparent 50%);
            animation: contactGlow 10s ease-in-out infinite alternate;
        }

        @keyframes contactGlow {
            0% { opacity: 0.5; }
            100% { opacity: 0.8; }
        }

        .contact-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            position: relative;
            z-index: 1;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(clamp(350px, 45vw, 450px), 1fr));
            gap: clamp(25px, 4vw, 40px);
        }

        .contact-info {
            padding: clamp(25px, 4vw, 35px);
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 20px;
            transform: translateY(30px);
            opacity: 0;
            transition: all 0.6s ease;
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .contact-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--border-gradient);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .contact-info:hover::before { opacity: 0.3; }

        .contact-info.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .contact-info:hover {
            transform: translateY(-5px);
            border-color: var(--primary-gold);
            box-shadow: 0 25px 60px rgba(212, 160, 23, 0.3);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            transition: all 0.4s ease;
            border: 1px solid var(--glass-border);
            position: relative;
            z-index: 2;
        }

        .contact-item:hover { 
            transform: translateX(8px);
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary-gold);
        }

        .contact-icon {
            width: clamp(50px, 8vw, 60px);
            height: clamp(50px, 8vw, 60px);
            background: var(--gradient-gold);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(20px, 3vw, 24px);
            color: var(--secondary-dark);
            transition: all 0.4s ease;
            box-shadow: var(--shadow-gold);
            flex-shrink: 0;
        }

        .contact-item:hover .contact-icon { 
            transform: rotate(10deg) scale(1.1);
            box-shadow: 0 15px 40px rgba(212, 160, 23, 0.6);
        }

        .contact-details h4 {
            color: var(--text-white);
            font-size: clamp(15px, 2vw, 17px);
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .contact-details p {
            color: var(--text-muted);
            font-size: clamp(13px, 1.8vw, 15px);
            line-height: 1.7;
            font-weight: 300;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 20px;
            padding: clamp(25px, 4vw, 35px);
            transform: translateY(30px);
            opacity: 0;
            transition: all 0.6s ease;
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .contact-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--border-gradient);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .contact-form:hover::before { opacity: 0.3; }

        .contact-form.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .contact-form:hover {
            border-color: var(--primary-gold);
            box-shadow: 0 25px 60px rgba(212, 160, 23, 0.3);
        }

        .contact-form h3 {
            color: var(--text-white);
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 3vw, 2.2rem);
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            z-index: 2;
        }

        .form-group {
            margin-bottom: 25px;
            opacity: 0;
            transform: translateX(-30px);
            transition: all 0.6s ease;
            position: relative;
            z-index: 2;
        }

        .form-group.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .form-group label {
            display: block;
            color: var(--text-white);
            font-size: clamp(14px, 1.8vw, 16px);
            font-weight: 700;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .form-group:hover label { 
            transform: translateY(-2px);
            color: var(--primary-light);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: clamp(12px, 2vw, 16px);
            background: rgba(255, 255, 255, 0.08);
            border: 2px solid var(--glass-border);
            border-radius: 12px;
            color: var(--text-white);
            font-size: clamp(14px, 1.8vw, 16px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            font-weight: 300;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--text-subtle);
            font-weight: 300;
        }

        .form-group input:hover,
        .form-group select:hover,
        .form-group textarea:hover {
            border-color: var(--primary-gold);
            transform: scale(1.02);
            background: rgba(255, 255, 255, 0.12);
        }

        .form-group select {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23D4A017' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
        }

        .form-group select option {
            background: var(--secondary-dark);
            color: var(--text-white);
            padding: 10px;
        }

        .form-group select:focus,
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary-gold);
            background: rgba(255, 255, 255, 0.15);
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(212, 160, 23, 0.3);
            outline: none;
        }

        .form-group textarea { 
            height: 120px; 
            resize: vertical; 
            font-family: inherit;
        }

        .form-submit-btn {
            width: 100%;
            font-size: clamp(15px, 2vw, 17px);
            padding: clamp(15px, 2.5vw, 18px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 2;
        }

        .form-submit-btn:hover { 
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 50px rgba(212, 160, 23, 0.6);
        }

        /* Enhanced Footer */
        .footer {
            background: var(--gradient-dark);
            padding: clamp(50px, 8vw, 70px) 0;
            border-top: 2px solid var(--glass-border);
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-radial);
            opacity: 0.2;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 clamp(25px, 4vw, 40px);
            text-align: center;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-logo {
            display: inline-flex;
            align-items: center;
            gap: 18px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 3vw, 2.5rem);
            font-weight: 900;
            background: var(--gradient-gold);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 25px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .footer-logo.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .footer-logo-icon {
            width: clamp(55px, 8vw, 65px);
            height: clamp(55px, 8vw, 65px);
            background: var(--gradient-gold);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(22px, 3vw, 26px);
            color: var(--secondary-dark);
            transition: all 0.4s ease;
            box-shadow: var(--shadow-gold);
        }

        .footer-logo:hover .footer-logo-icon { 
            transform: rotate(10deg) scale(1.1);
            box-shadow: 0 15px 40px rgba(212, 160, 23, 0.6);
        }

        .footer-text {
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: clamp(14px, 1.8vw, 16px);
            line-height: 1.8;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.1s;
            font-weight: 300;
        }

        .footer-text.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: clamp(18px, 3vw, 25px);
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .social-links a {
            width: clamp(50px, 8vw, 60px);
            height: clamp(50px, 8vw, 60px);
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-gold);
            font-size: clamp(20px, 3vw, 24px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: scale(0.8);
            backdrop-filter: blur(10px);
        }

        .social-links a.visible {
            opacity: 1;
            transform: scale(1);
        }

        .social-links a:hover {
            background: var(--gradient-gold);
            color: var(--secondary-dark);
            transform: scale(1.15) rotate(5deg);
            border-color: var(--primary-gold);
            box-shadow: 0 15px 40px rgba(212, 160, 23, 0.5);
        }

        .footer-bottom {
            border-top: 1px solid var(--glass-border);
            padding-top: 25px;
            color: var(--text-muted);
            font-size: clamp(13px, 1.8vw, 15px);
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.2s;
            font-weight: 300;
        }

        .footer-bottom.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Enhanced WhatsApp Float */
        .whatsapp-float {
            position: fixed;
            bottom: clamp(20px, 4vw, 30px);
            right: clamp(20px, 4vw, 30px);
            width: clamp(65px, 10vw, 75px);
            height: clamp(65px, 10vw, 75px);
            background: linear-gradient(135deg, #25D366, #20B355);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: clamp(26px, 4vw, 32px);
            box-shadow: 0 10px 30px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: pulse 2s infinite;
            border: 3px solid rgba(37, 211, 102, 0.3);
        }

        .whatsapp-float:hover { 
            transform: scale(1.15) rotate(10deg);
            box-shadow: 0 20px 50px rgba(37, 211, 102, 0.6);
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* Additional Premium Animations */
        .fade-in { 
            opacity: 0; 
            transform: translateY(30px); 
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1); 
        }

        .fade-in.visible { 
            opacity: 1; 
            transform: translateY(0); 
        }

        .form-group:nth-child(1) { transition-delay: 0.1s; }
        .form-group:nth-child(2) { transition-delay: 0.2s; }
        .form-group:nth-child(3) { transition-delay: 0.3s; }
        .form-group:nth-child(4) { transition-delay: 0.4s; }
        .form-group:nth-child(5) { transition-delay: 0.5s; }
        .form-group:nth-child(6) { transition-delay: 0.6s; }

        .social-links a:nth-child(1) { transition-delay: 0.1s; }
        .social-links a:nth-child(2) { transition-delay: 0.2s; }
        .social-links a:nth-child(3) { transition-delay: 0.3s; }
        .social-links a:nth-child(4) { transition-delay: 0.4s; }
        .social-links a:nth-child(5) { transition-delay: 0.5s; }

        /* Enhanced Accessibility */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        /* Enhanced Selection */
        ::selection { 
            background: var(--gradient-gold); 
            color: var(--secondary-dark); 
        }

        /* Focus States */
        *:focus {
            outline: 2px solid var(--primary-gold);
            outline-offset: 2px;
        }

        /* Reduced Motion Support */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Responsive Design Enhancements */
        @media (max-width: 1200px) {
            .team-grid { grid-template-columns: repeat(auto-fit, minmax(clamp(350px, 50vw, 400px), 1fr)); }
            .team-photo { width: clamp(180px, 20vw, 220px); height: clamp(225px, 25vw, 275px); }
            .services-grid { grid-template-columns: repeat(auto-fit, minmax(clamp(300px, 45vw, 350px), 1fr)); }
            .gallery-grid { grid-template-columns: repeat(auto-fit, minmax(clamp(280px, 40vw, 320px), 1fr)); }
            .contact-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .nav-toggle { display: flex; }
            .hero-title { font-size: clamp(2.2rem, 6vw, 3.8rem); text-align: center; }
            .hero-description { font-size: clamp(15px, 2vw, 17px); text-align: center; max-width: 100%; }
            .hero-buttons { flex-direction: column; align-items: stretch; }
            .team-header { flex-direction: column; text-align: center; align-items: center; }
            .team-photo { width: clamp(160px, 20vw, 200px); height: clamp(200px, 25vw, 250px); }
            .section-title { font-size: clamp(2rem, 5vw, 3rem); }
            .about-container { grid-template-columns: 1fr; text-align: center; gap: 30px; }
            .mobile-menu a:nth-child(1) { transition-delay: 0.1s; }
            .mobile-menu a:nth-child(2) { transition-delay: 0.2s; }
            .mobile-menu a:nth-child(3) { transition-delay: 0.3s; }
            .mobile-menu a:nth-child(4) { transition-delay: 0.4s; }
            .mobile-menu a:nth-child(5) { transition-delay: 0.5s; }
            .mobile-menu a:nth-child(6) { transition-delay: 0.6s; }
            .hero-content { text-align: center; padding: 20px; }
            .team-grid { grid-template-columns: 1fr; gap: 30px; }
            .services-grid { grid-template-columns: 1fr; gap: 20px; }
            .gallery-grid { grid-template-columns: 1fr; gap: 20px; }
            .contact-grid { grid-template-columns: 1fr; gap: 20px; }
            .about-image { height: 300px; order: -1; }
            .footer-container { gap: 20px; }
        }

        @media (max-width: 480px) {
            .team-member,
            .contact-info,
            .contact-form { padding: clamp(18px, 3vw, 25px); }
            .mobile-menu a { font-size: clamp(1.6rem, 5vw, 2rem); }
            .hero-title { font-size: clamp(1.9rem, 5vw, 2.8rem); }
            .form-group input,
            .form-group select,
            .form-group textarea { padding: clamp(10px, 2vw, 14px); }
            .team-photo { width: clamp(140px, 35vw, 180px); height: clamp(175px, 45vw, 225px); }
            .team-grid { grid-template-columns: 1fr; gap: 25px; }
            .nav-container { padding: 0 15px; }
            .hero-container { padding: 0 15px; }
            .btn { min-width: auto; padding: 15px 20px; }
            .social-links { gap: 15px; }
            .contact-item { flex-direction: column; text-align: center; gap: 10px; }
            .contact-icon { align-self: center; }
        }
    </style>
</head>
<body>
    <!-- Enhanced Loading Screen -->
    <div class="loader" id="loader">
        <div class="loader-content">
            <div class="loader-logo"><i class="fas fa-balance-scale"></i></div>
            <div class="loader-text">Kantor Hukum Haraka</div>
        </div>
    </div>

    <!-- Enhanced Navigation -->
    <nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation">
        <div class="nav-container">
            <a href="#home" class="logo" aria-label="Kantor Hukum Haraka">
                <img src="gmbar_haraka/logo.2.jpeg" 
                     alt="Kantor Hukum Haraka Logo" class="logo-img">
                KANTOR HUKUM HARAKA
            </a>
            <div class="nav-links">
                <a href="#home" aria-current="page">Beranda</a>
                <a href="#about">Tentang Kami</a>
                <a href="#team">Tim Lawyer</a>
                <a href="#services">Layanan</a>
                <a href="#gallery">Galeri</a>
                <a href="#contact">Kontak</a>
            </div>
            <div class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Enhanced Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Mobile navigation">
        <a href="#home">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="#team">Tim Lawyer</a>
        <a href="#services">Layanan</a>
        <a href="#gallery">Galeri</a>
        <a href="#contact">Kontak</a>
    </div>

    <!-- Enhanced Hero Section -->
    <section class="hero" id="home" role="banner">
        <div class="hero-container">
            <div class="hero-content fade-in">
                <div class="hero-badge"><i class="fas fa-award"></i> Premier Legal Solutions</div>
                <h1 class="hero-title">Unrivaled Legal Expertise</h1>
                <p class="hero-description">
                    Kantor Hukum Haraka provides world-class legal services, specializing in litigation, non-litigation, and investment licensing with an unwavering commitment to excellence and innovation.
                </p>
                <div class="hero-buttons">
                    <a href="booking.php" class="btn btn-primary"><i class="fas fa-calendar-check"></i> Booking Konsultasi</a>
                    <a href="tel:+6281234567890" class="btn btn-secondary"><i class="fas fa-phone"></i> Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced About Section -->
    <section class="about" id="about">
        <div class="about-container">
            <div class="about-content fade-in">
                <h3>Tentang Kantor Hukum Haraka</h3>
                <p>Kantor Hukum Haraka adalah firma hukum premium yang didirikan pada tahun 2006, dengan fokus pada penyediaan layanan hukum berkualitas tinggi di Indonesia. Kami menggabungkan pengalaman luas, inovasi teknologi, dan komitmen tak tergoyahkan terhadap keberhasilan klien untuk memberikan solusi hukum yang strategis dan efektif.</p>
                <p>Dengan tim lawyer berpengalaman dan jaringan luas, kami melayani klien dari berbagai sektor, termasuk korporasi multinasional, startup, dan individu berprestasi. Visi kami adalah menjadi mitra hukum terdepan yang tidak hanya menyelesaikan masalah, tetapi juga menciptakan peluang baru melalui pendekatan hukum yang proaktif.</p>
                <ul class="about-features">
                    <li><i class="fas fa-check-circle"></i> Lebih dari 18 tahun pengalaman di bidang hukum</li>
                    <li><i class="fas fa-check-circle"></i> Ribuan kasus sukses di litigasi dan non-litigasi</li>
                    <li><i class="fas fa-check-circle"></i> Sertifikasi internasional dan anggota asosiasi hukum global</li>
                    <li><i class="fas fa-check-circle"></i> Pendekatan berbasis teknologi untuk efisiensi maksimal</li>
                </ul>
            </div>
            <div class="about-image fade-in">
                <img src="gmbar_haraka/logo3.jpeg" alt="Kantor Hukum Haraka" loading="lazy">
            </div>
        </div>
    </section>

    <!-- Enhanced Team Section -->
    <section class="team" id="team">
        <div class="team-container">
            <div class="section-header fade-in">
                <div class="section-subtitle">Our Legal Experts</div>
                <h2 class="section-title">Tim Lawyer Profesional</h2>
                <p class="section-description">
                    Meet our exceptional team of highly skilled legal professionals, dedicated to providing personalized legal solutions with unmatched expertise and integrity.
                </p>
            </div>
            <div class="team-grid">
                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                        <img src="gmbar_haraka/Dr. Doni Azhari, M.H..png" alt="Dr. Doni Azhari, M.H." loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Dr. Doni Azhari, M.H.</h3>
                            <div class="team-position">Direktur Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567890" class="contact-btn whatsapp-btn" aria-label="Contact Dr. Doni via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:doni@harakalaw.id" class="contact-btn email-btn" aria-label="Email Dr. Doni"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/doniazhari" class="contact-btn instagram-btn" aria-label="Dr. Doni's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Dr. Doni Azhari adalah pendiri sekaligus Direktur Kantor Hukum Haraka, dengan pengalaman lebih dari 20 tahun di bidang hukum korporasi dan litigasi. Beliau memiliki keahlian mendalam dalam merger & akuisisi, restrukturisasi perusahaan, serta penyelesaian sengketa internasional.
                                                Dengan reputasi sebagai praktisi hukum yang berintegritas dan visioner, Dr. Doni Azhari telah mendampingi berbagai klien, mulai dari perusahaan nasional hingga multinasional, dalam menangani persoalan hukum yang kompleks.
                                                Di bawah kepemimpinannya, Kantor Hukum Haraka tumbuh menjadi firma hukum yang dikenal profesional, adaptif, dan terpercaya, berkat strategi yang tajam serta pemikiran analitis yang konsisten ia terapkan dalam setiap pendampingan hukum.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Febriyanti Nazdain Eka Dewi Putri, S.Pd., M.Sosio..png" alt="Febriyanti Nazdain Eka Diana Putri, S.Pd., M.Sosio." loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Febriyanti Nazdain Eka Diana Putri, S.Pd., M.Sosio.</h3>
                            <div class="team-position">Sekretaris Kantor Hukum Haraka </div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Febriyanti Nazdain Eka Diana Putri merupakan seorang profesional dengan latar belakang akademik di bidang Pendidikan (S.Pd.) dan Sosial (M.Sosio.). Saat ini beliau menjabat sebagai Sekretaris di Kantor Hukum Haraka, dengan peran strategis dalam mendukung kelancaran administrasi, komunikasi, dan manajemen internal kantor.Dengan kemampuan organisasi, ketelitian, serta pemahaman mendalam mengenai aspek sosial dan edukatif, Febriyanti menjadi penghubung yang efektif antara pimpinan, tim hukum, serta mitra kerja. Dedikasinya tidak hanya terletak pada pengelolaan administrasi, tetapi juga dalam membangun suasana kerja yang profesional, harmonis, dan produktif.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Marwan, S.H., M.A, CLA..png" alt="Marwan, S.H., M.A, CLA. " loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Marwan, S.H., M.A, CLA. </h3>
                            <div class="team-position">Advokat Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Marwan adalah Advokat berpengalaman di Kantor Hukum Haraka dengan latar belakang akademik di bidang Hukum (S.H.) dan Magister Administrasi (M.A.), serta memiliki sertifikasi Certified Legal Auditor (CLA). Keahlian utamanya mencakup litigasi perdata dan pidana, hukum bisnis, serta audit hukum yang mendalam terhadap kontrak dan kepatuhan perusahaan. Dengan kombinasi pengetahuan akademis, keterampilan analitis, dan pengalaman praktik, Marwan dikenal sebagai advokat yang tegas, teliti, dan berorientasi pada solusi. Dedikasinya dalam membela kepentingan klien menjadikan dirinya salah satu pilar penting dalam tim hukum Kantor Hukum Haraka.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Irwansyah, S.H..png" alt="Irwansyah, S.H. " loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Irwansyah, S.H.</h3>
                            <div class="team-position">Advokat Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Irwansyah adalah Advokat di Kantor Hukum Haraka dengan fokus pada litigasi perdata, pidana, dan hukum ketenagakerjaan. Latar belakang akademiknya di bidang hukum (S.H.) membekalinya dengan kemampuan analisis yang kuat serta pemahaman mendalam terhadap prosedur hukum di Indonesia. Dalam praktiknya, Irwansyah dikenal sebagai advokat yang cermat, berintegritas, dan berdedikasi tinggi dalam memperjuangkan kepentingan klien. Pendekatannya yang strategis dan profesional menjadikan dirinya salah satu bagian penting dari tim hukum Kantor Hukum Haraka.</p>
                </div>

                 <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/M. Fahmi Amrullah, S.H., M.Kn..png" alt=" M. Fahmi Amrullah, S.H., M.Kn" loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"> M. Fahmi Amrullah, S.H., M.Kn</h3>
                            <div class="team-position">Advokat Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">M. Fahmi Amrullah adalah Advokat di Kantor Hukum Haraka dengan latar belakang pendidikan Sarjana Hukum (S.H.) dan Magister Kenotariatan (M.Kn.). Keahliannya meliputi hukum perdata, kontrak bisnis, serta aspek kenotariatan yang berkaitan dengan pendirian dan pengelolaan badan usaha. Dengan pemahaman yang komprehensif mengenai aspek hukum perjanjian dan dokumen legal, Fahmi dikenal sebagai advokat yang teliti, komunikatif, dan berorientasi pada solusi. Dedikasinya dalam memberikan layanan hukum yang berkualitas turut memperkuat posisi Kantor Hukum Haraka sebagai firma hukum terpercaya bagi klien individu maupun korporasi.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/M. Ikhwanul Muslim, S.H..png" alt="M. Ikhwanul Muslim, S.H. " loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">M. Ikhwanul Muslim, S.H. </h3>
                            <div class="team-position">Advokat Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">M. Ikhwanul Muslim adalah Advokat di Kantor Hukum Haraka dengan keahlian dalam litigasi pidana, perdata, serta penyelesaian sengketa di luar pengadilan. Latar belakang pendidikannya di bidang hukum (S.H.) memberikan dasar yang kuat dalam memahami dan menangani berbagai persoalan hukum yang kompleks.Dikenal sebagai advokat yang tegas, berintegritas, dan berorientasi pada kepentingan klien, Ikhwanul selalu mengedepankan strategi hukum yang efektif dan profesional. Kehadirannya menambah kekuatan tim hukum Kantor Hukum Haraka dalam memberikan pelayanan yang komprehensif dan terpercaya.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Ilham Ibnul Farid, S.H..png" alt="Ilham Ibnul Farid, S.H." loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Ilham Ibnul Farid, S.H.</h3>
                            <div class="team-position">Advokat Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Ilham Ibnul Farid adalah Advokat di Kantor Hukum Haraka dengan fokus praktik pada hukum bisnis, litigasi perdata, dan hukum administrasi negara. Latar belakang pendidikannya sebagai Sarjana Hukum (S.H.) membekalinya dengan kemampuan analitis yang kuat serta pemahaman mendalam terhadap sistem hukum di Indonesia. Sebagai advokat, Ilham dikenal cermat, komunikatif, dan solutif dalam mendampingi klien menghadapi persoalan hukum. Profesionalisme dan dedikasinya menjadikan Ilham bagian penting dari tim hukum Kantor Hukum Haraka dalam memberikan layanan yang terpercaya dan efektif.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Sukardi, S.Pt..png" alt="Sukardi, S.Pt. " loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Sukardi, S.Pt. </h3>
                            <div class="team-position">Asisten Advokat Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Sukardi merupakan Asisten Advokat di Kantor Hukum Haraka dengan latar belakang pendidikan Sarjana Peternakan (S.Pt.). Meskipun berasal dari disiplin ilmu yang berbeda, beliau memiliki ketertarikan mendalam pada bidang hukum dan berperan penting dalam mendukung kinerja tim advokat. Dalam tugasnya, Sukardi membantu pengelolaan administrasi perkara, penelitian hukum, serta persiapan dokumen litigasi dan non-litigasi. Ketelitian, kedisiplinan, dan kemampuannya beradaptasi menjadikan Sukardi sebagai bagian yang tak terpisahkan dalam menunjang kelancaran kerja tim hukum Kantor Hukum Haraka.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Syifa Rahmaeida, S.Hub.Int.png" alt="Syifa Rahmaeida, S.Hub.Int" loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Syifa Rahmaeida, S.Hub.Int</h3>
                            <div class="team-position">Admin Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Syifa Rahmaeida adalah Admin di Kantor Hukum Haraka dengan latar belakang akademik di bidang Hubungan Internasional (S.Hub.Int). Ia berperan penting dalam memastikan kelancaran operasional harian kantor, mulai dari pengelolaan administrasi, komunikasi internal, hingga koordinasi dengan klien dan mitra kerja.Dengan kemampuan organisasi yang baik, kecermatan dalam mengelola dokumen, serta keterampilan komunikasi yang efektif, Syifa menjadi penghubung yang andal antara tim hukum dan klien. Profesionalisme dan dedikasinya turut mendukung citra Kantor Hukum Haraka sebagai firma hukum yang tertata dan terpercaya.</p>
                </div>

                <div class="team-member fade-in" role="article">
                    <div class="team-header">
                        <div class="team-photo fade-in">
                            <img src="gmbar_haraka/Erwin Mardinata Utama, S.Kom.png" alt="Erwin Mardinata Utama, S.Kom" loading="lazy">
                        </div>
                        <div class="team-info">
                            <h3 class="team-name">Erwin Mardinata Utama, S.Kom</h3>
                            <div class="team-position"> IT Support Kantor Hukum Haraka</div>
                            <div class="team-contact-buttons">
                                <a href="https://wa.me/6281234567891" class="contact-btn whatsapp-btn" aria-label="Contact Sarah via WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="mailto:sarah@harakalaw.id" class="contact-btn email-btn" aria-label="Email Sarah"><i class="fas fa-envelope"></i></a>
                                <a href="https://instagram.com/sarahwijaya" class="contact-btn instagram-btn" aria-label="Sarah's Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <p class="team-description">Erwin Mardinata Utama adalah IT Support di Kantor Hukum Haraka dengan latar belakang pendidikan Sarjana Komputer (S.Kom). Ia bertanggung jawab dalam mendukung infrastruktur teknologi informasi kantor, termasuk pengelolaan sistem, keamanan data, serta pemeliharaan perangkat keras dan lunak.Dengan keahlian di bidang teknologi, Erwin berperan penting dalam memastikan kelancaran operasional digital dan mendukung kebutuhan tim hukum melalui solusi IT yang efisien dan andal. Dedikasi dan profesionalismenya menjadikan Erwin bagian penting dalam memperkuat layanan modern Kantor Hukum Haraka.</p>
                </div>
                <!-- Tambahkan anggota tim lainnya sesuai kebutuhan -->
            </div>
        </div>
    </section>

    <!-- Enhanced Services Section -->
   <!-- Enhanced Services Section -->
<section class="services" id="services">
    <div class="services-container">
        <div class="section-header fade-in">
            <div class="section-subtitle">Our Expertise</div>
            <h2 class="section-title">Layanan Kantor Hukum Haraka</h2>
            <p class="section-description">
                Kami menawarkan berbagai layanan hukum yang dirancang untuk memenuhi kebutuhan klien korporasi dan individu dengan pendekatan yang inovatif dan strategis.
            </p>
        </div>
        <div class="services-grid">
            <div class="service-card fade-in">
                <div class="service-icon"><i class="fas fa-gavel"></i></div>
                <h3 class="service-title">Litigasi</h3>
                <p class="service-description">Kami memberikan layanan pendampingan hukum dalam berbagai kasus di Pengadilan, termasuk :</p>
                <ul class="service-features">
                    <li>Kasus Pidana : Korupsi, pencemaran nama baik, penggelapan, penipuan, narkotika, dan tindak pidana lainnya.</li>
                    <li>Kasus Perdata : Sengketa bisnis, wanprestasi, kepailitan, dan permasalahan perbankan.</li>
                    <li>Sengketa Hubungan Industrial : Penyelesaian perselisihan ketenagakerjaan.</li>
                    <li>Sengketa Properti : Penyelesaian konflik tanah dan bangunan.</li>
                </ul>
            </div>
            <div class="service-card fade-in">
                <div class="service-icon"><i class="fas fa-comments"></i></div>
                <h3 class="service-title">Konsultasi Hukum</h3>
                <p class="service-description">Kami menyediakan konsultasi hukum bagi Individu, Perusahaan, dan Institusi yang membutuhkan solusi hukum terbaik. Konsultasi dapat dilakukan secara langsung di kantor kami atau secara online melalui WhatsApp, Zoom, Google Meet, dan metode komunikasi lainnya.</p>
                <ul class="service-features">
                    <li>Konsultasi Langsung Di Kantor Hukum Haraka</li>
                    <li>Konsultasi Online : WhatsApp, Zoom, Google Meet, dan metode komunikasi lainnya.</li>
                </ul>
            </div>
            <div class="service-card fade-in">
                <div class="service-icon"><i class="fas fa-handshake"></i></div>
                <h3 class="service-title">Retainer/In-House Lawyer (Corporate Law)</h3>
                <p class="service-description">Layanan ini cocok bagi Perusahaan yang membutuhkan pendampingan hukum secara berkelanjutan. Manfaat jasa retainer meliputi :</p>
                <ul class="service-features">
                    <li>Penyusunan dan review kontrak bisnis.</li>
                    <li>Penyelesaian sengketa Perusahaan.</li>
                    <li>Pendampingan hukum dalam aktivitas operasional Perusahaan.</li>
                    <li>Perlindungan hukum terhadap risiko bisnis.</li>
                </ul>
            </div>
            <div class="service-card fade-in">
                <div class="service-icon"><i class="fas fa-file-alt"></i></div>
                <h3 class="service-title">Layanan Pengurusan Perizinan</h3>
                <p class="service-description">Kami membantu Klien dalam pengurusan berbagai izin usaha dan dokumen legal, seperti :</p>
                <ul class="service-features">
                    <li>Pendirian badan usaha (PT, CV, Yayasan, dll.)</li>
                    <li>Pengurusan izin usaha (NIB, SIUP, TDP, dll.)</li>
                    <li>Perizinan tenaga kerja dan kontrak kerja.</li>
                    <li>Legalitas usaha dan perjanjian bisnis.</li>
                </ul>
            </div>
            <div class="service-card fade-in">
                <div class="service-icon"><i class="fas fa-search"></i></div>
                <h3 class="service-title">Layanan Audit Hukum (Legal Audit)</h3>
                <p class="service-description">Audit hukum sangat penting untuk memastikan kepatuhan suatu Perusahaan terhadap regulasi yang berlaku. Kami menyediakan layanan audit hukum yang mencakup :</p>
                <ul class="service-features">
                    <li>Evaluasi kontrak bisnis dan kepatuhan regulasi.</li>
                    <li>Analisis aspek hukum dalam transaksi bisnis.</li>
                    <li>Identifikasi risiko hukum dalam operasional Perusahaan.</li>
                </ul>
            </div>
            <div class="service-card fade-in">
                <div class="service-icon"><i class="fas fa-file-signature"></i></div>
                <h3 class="service-title">Layanan Legal Drafting dan Legal Opinion</h3>
                <p class="service-description">Kami menyediakan jasa penyusunan dokumen hukum, termasuk :</p>
                <ul class="service-features">
                    <li>Pembuatan dan review kontrak bisnis.</li>
                    <li>Penyusunan perjanjian kerja dan perjanjian lainnya.</li>
                    <li>Pemberian legal opinion (pendapat hukum) terkait permasalahan hukum yang dihadapi Klien.</li>
                </ul>
            </div>
        </div>
        <div class="services-howto fade-in">
            <h3 class="service-title">Cara menggunakan layanan kami</h3>
            <ol class="howto-steps">
                <li>
                    <strong>Konsultasi sesuai dengan paket yang Anda pilih :</strong>
                    Anda masih bingung layanan hukum apa yang Anda butuhkan? Tenang saja, kami akan memandu Anda mendapatkan layanan hukum yang sesuai dengan kebutuhan Anda.
                </li>
                <li>
                    <strong>Pemilihan Metode Konsultasi Chat, video, audio :</strong>
                    Anda dapat menentukan serta memilih metode konsultasi apa yang Anda inginkan. Kami melayani konsultasi melalui live chat, WhatsApp, Zoom, Google Meet, dll.
                </li>
                <li>
                    <strong>Penawaran Layanan :</strong>
                    Setelah Anda melewati tahap konsultasi dan ternyata ingin mendapatkan layanan hukum lebih lanjut, maka kami akan mengirimkan dokumen penawaran beserta rincian biayanya.
                </li>
                <li>
                    <strong>Proses Pembayaran</strong>
                    Pembayaran dapat dilakukan melalui transfer bank via setoran tunai bank, transfer ATM, atau mobile banking ke rekening kantor kami. Apabila Anda telah melakukan pembayaran, silakan kirim bukti setoran/transfer ke nomor WhatsApp kami.
                </li>
                <li>
                    <strong>Pelaksanaan Layanan</strong>
                    Selesai!
                    <br><br>
                    Anda bisa tenang melakukan kesibukan Anda lainnya. Anda akan menerima informasi terkait perkembangan perkara, dokumen, atau penyelesaian sesuai dengan layanan hukum yang telah Anda bayar.
                </li>
            </ol>
        </div>
    </div>
</section>

    <!-- Enhanced Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="gallery-container">
            <div class="section-header fade-in">
                <div class="section-subtitle">Our Moments</div>
                <h2 class="section-title">Galeri Kantor Hukum Haraka</h2>
                <p class="section-description">
                    Lihatlah momen-momen penting dari perjalanan kami dalam memberikan layanan hukum terbaik untuk klien kami.
                </p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item fade-in">
                    <img src="gmbar_haraka/gambar1.jpeg" alt="Kantor Hukum Haraka Event" loading="lazy">
                    <div class="gallery-desc">Diskusi dengan penandatanganan MoU Kerja sama Hukum Haraka dengan Kelurahan Gerantung</div>
                </div>
                <div class="gallery-item fade-in">
                    <img src="gmbar_haraka/gambar2.jpeg" alt="Kantor Hukum Haraka Team" loading="lazy">
                    <div class="gallery-desc">Sambutan Pimpinan Hukum HAraka atas kunjungan & diskusi bersama Polsek Praya Tengah</div>
                </div>
                <div class="gallery-item fade-in">
                    <img src="gmbar_haraka/gambar3.jpeg" alt="Kantor Hukum Haraka Office" loading="lazy">
                    <div class="gallery-desc">Diskusi dengan penandatanganan MoU Kerja sama Hukum Haraka dengan KUA Praya Tengah</div>
                </div>
                <!-- Tambahkan item galeri lainnya sesuai kebutuhan -->
            </div>
        </div>
    </section>

    <!-- Enhanced Lightbox -->
    <div class="lightbox" id="lightbox" role="dialog" aria-label="Image Lightbox">
        <span class="close" id="closeLightbox" aria-label="Close lightbox">&times;</span>
        <img src="" alt="Lightbox Image">
    </div>

    <!-- Enhanced Contact Section -->
    <section class="contact" id="contact">
        <div class="contact-container">
            <div class="section-header fade-in">
                <div class="section-subtitle">Get in Touch</div>
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="section-description">
                    Kami siap membantu Anda dengan solusi hukum yang cepat, akurat, dan profesional. Hubungi kami untuk konsultasi atau informasi lebih lanjut.
                </p>
            </div>
            <div class="contact-grid">
                <div class="contact-info fade-in">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-details">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Praya - Keruak, Gerantung, Kec. Praya Tengah, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83513</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="contact-details">
                            <h4>Telepon</h4>
                            <p>+62 878-7355-5554</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>kantorhukumharaka@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-clock"></i></div>
                        <div class="contact-details">
                            <h4>Jam Kerja</h4>
                            <p>Senin - Jumat: 08.00 - 17.00 WIB</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form fade-in">
                    <h3>Formulir Konsultasi</h3>
                    <form id="contactForm" action="proses_konsultasi.php" method="POST">
                        <div class="form-group fade-in">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="nama" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group fade-in">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                        </div>
                        <div class="form-group fade-in">
                            <label for="service">Layanan yang Dibutuhkan</label>
                            <select id="service" name="layanan" required>
                                <option value="" disabled selected>Pilih layanan</option>
                                <option value="litigation">Litigasi</option>
                                <option value="Konsultasi-Hukum">Konsultasi Hukum</option>
                                <option value="Retainer/In-House-Lawyer-(Corporate Law)"> Jasa Retainer/In-House Lawyer (Corporate Law)</option>
                                <option value="Layanan-Pengurusan-Perizinan">Layanan Pengurusan Perizinan</option>
                                <option value="Layanan-Audit-Hukum-(Legal Audit)">Layanan Audit Hukum (Legal Audit)</option>
                                <option value="Layanan-Legal-Drafting-dan-Legal-Opinion">Layanan Legal Drafting dan Legal Opinion</option>
                            </select>
                        </div>
<div class="form-group fade-in">
                            <label for="wa">Nomor WhatsApp</label>
                            <input type="tel" id="wa" name="no_whatsapp" placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="form-group fade-in">
                            <label for="metode">Metode Konsultasi</label>
                            <select id="metode" name="metode">
                                <option value="Belum dipilih" selected>Pilih metode (opsional)</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Zoom">Zoom</option>
                                <option value="Google Meet">Google Meet</option>
                                <option value="Tatap Muka">Tatap Muka</option>
                            </select>
                        </div>
                                                <div class="form-group fade-in">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="pesan" placeholder="Tuliskan pesan Anda" required></textarea>
                        </div>
                        <button type="submit" class="btn form-submit-btn"><i class="fas fa-paper-plane"></i> Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Footer -->
    <footer class="footer" role="contentinfo">
        <div class="footer-container">
            <div class="footer-logo fade-in">
                Kantor Hukum Haraka
            </div>
            <p class="footer-text fade-in">
                Kantor Hukum Haraka adalah mitra hukum terpercaya Anda, menyediakan berbagai solusi layanan hukum dengan integritas dan profesionalisme sejak 2006.
            </p>
            <div class="social-links">
                <a href="https://facebook.com/kantorhukumharaka" class="fade-in" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://wa.me/+6287873555554" class="fade-in" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="https://instagram.com/kantorhukumharaka" class="fade-in" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://tiktok.com/@kantorhukumharaka" class="fade-in" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
            </div>
            <div class="footer-bottom fade-in">
                &copy; 2025 Kantor Hukum Haraka. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Enhanced WhatsApp Float -->
    <a href="https://wa.me/+62 878-7355-5554" class="whatsapp-float" aria-label="Contact us via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        // Enhanced Loader
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
                loader.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 1500);
        });

        // Enhanced Navigation
        const navbar = document.getElementById('navbar');
        const navToggle = document.getElementById('navToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        navToggle.addEventListener('click', () => {
            navToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : 'auto';
        });

        // Close Mobile Menu on Link Click and Scroll to Section
        const mobileLinks = document.querySelectorAll('.mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    // Close mobile menu
                    mobileMenu.classList.remove('active');
                    navToggle.classList.remove('active');
                    document.body.style.overflow = 'auto';

                    // Smooth scroll to target section
                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Desktop Navigation Smooth Scroll
        const navLinks = document.querySelectorAll('.nav-links a');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Parallax Effect
        window.addEventListener('scroll', () => {
            const hero = document.querySelector('.hero');
            const gallery = document.querySelector('.gallery');
            const scrollY = window.scrollY;
            hero.style.setProperty('--scroll-y', scrollY + 'px');
            gallery.style.setProperty('--scroll-y', scrollY + 'px');
        });

        // Intersection Observer for Fade-in Animations
        const fadeElements = document.querySelectorAll('.fade-in');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        fadeElements.forEach(element => observer.observe(element));

        // Enhanced Lightbox
        const galleryItems = document.querySelectorAll('.gallery-item');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = lightbox.querySelector('img');
        const closeLightbox = document.getElementById('closeLightbox');

        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const imgSrc = item.querySelector('img').src;
                lightboxImg.src = imgSrc;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        closeLightbox.addEventListener('click', () => {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('consultation') === 'success') {
            alert('Konsultasi berhasil dikirim. Tim Kantor Hukum Haraka akan segera menghubungi Anda.');
            window.history.replaceState({}, document.title, window.location.pathname + '#contact');
        }

        // Consultation form uses normal POST to proses_konsultasi.php.
        // Other existing Haraka interactions remain unchanged.
    </script>
</body>
</html>