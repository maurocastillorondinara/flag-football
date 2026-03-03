<footer id="contact" class="footer">
    <div class="container footer-content">
        <div class="footer-brand">
            <h3>LFF<span class="highlight">MDP</span></h3>
            <p>Liga de Football Flag de Mar del Plata</p>
        </div>

        <div class="footer-links">
            <h4>Enlaces</h4>
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('la-liga') }}">La Liga</a>
            <a href="{{ route('equipos') }}">Equipos</a>
        </div>

        <div class="footer-social">
            <h4>Seguinos</h4>
            <div class="social-icons">
                <a href="#" aria-label="Instagram">IG</a>
                <a href="#" aria-label="Facebook">FB</a>
                <a href="#" aria-label="Twitter">TW</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} LFFMDP. Todos los derechos reservados.</p>
    </div>
</footer>
