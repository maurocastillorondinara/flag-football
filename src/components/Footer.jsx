import './Footer.css';

const Footer = () => {
    return (
        <footer id="contact" className="footer">
            <div className="container footer-content">
                <div className="footer-brand">
                    <h3>LFF<span className="highlight">MDP</span></h3>
                    <p>Liga de Football Flag de Mar del Plata</p>
                </div>

                <div className="footer-links">
                    <h4>Enlaces</h4>
                    <a href="#inicio">Inicio</a>
                    <a href="#about">La Liga</a>
                    <a href="#teams">Equipos</a>
                </div>

                <div className="footer-social">
                    <h4>Seguinos</h4>
                    <div className="social-icons">
                        <a href="#" aria-label="Instagram">IG</a>
                        <a href="#" aria-label="Facebook">FB</a>
                        <a href="#" aria-label="Twitter">TW</a>
                    </div>
                </div>
            </div>
            <div className="footer-bottom">
                <p>&copy; {new Date().getFullYear()} LFFMDP. Todos los derechos reservados.</p>
            </div>
        </footer>
    );
};

export default Footer;
