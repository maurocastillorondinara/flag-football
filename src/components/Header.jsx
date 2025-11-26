import { useState, useEffect } from 'react';
import './Header.css';
import logoLiga from '../assets/images/logo-liga.png';

const Header = () => {
    const [scrolled, setScrolled] = useState(false);
    const [menuOpen, setMenuOpen] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            setScrolled(window.scrollY > 50);
        };
        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    return (
        <header className={`header ${scrolled ? 'scrolled' : ''}`}>
            <div className="container header-container">
                <div className="logo">
                    <img src={logoLiga} alt="Liga de Flag Football MDP" className="logo-img" />
                </div>

                <button
                    className="mobile-toggle"
                    onClick={() => setMenuOpen(!menuOpen)}
                    aria-label="Toggle menu"
                >
                    <span className={`bar ${menuOpen ? 'open' : ''}`}></span>
                    <span className={`bar ${menuOpen ? 'open' : ''}`}></span>
                    <span className={`bar ${menuOpen ? 'open' : ''}`}></span>
                </button>

                <nav className={`nav ${menuOpen ? 'active' : ''}`}>
                    <a href="#inicio" onClick={() => setMenuOpen(false)}>Inicio</a>
                    <a href="#about" onClick={() => setMenuOpen(false)}>La Liga</a>
                    <a href="#teams" onClick={() => setMenuOpen(false)}>Equipos</a>
                    <a href="#contact" onClick={() => setMenuOpen(false)} className="nav-cta">Sumate</a>
                </nav>
            </div>
        </header>
    );
};

export default Header;
