<footer class="footer">
    <div class="container footer-content">
        <div class="footer-brand">
            <h3>FA<span style="color: var(--color-primary);">MDQ</span></h3>
            <p>Fútbol Americano Mar del Plata</p>
        </div>
        <div class="footer-links">
            <h4>Enlaces</h4>
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('modalidades') }}">Modalidades</a>
            <a href="{{ route('equipos') }}">Equipos</a>
            <a href="{{ route('historia') }}">Historia</a>
        </div>
        <div class="footer-social">
            <h4>Seguinos</h4>
            <div class="social-icons">
                <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Instagram">IG</a>
                <a href="#" target="_blank" rel="noopener noreferrer" aria-label="TikTok">TK</a>
                <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Facebook">FB</a>
                <a href="https://wa.me/542236661385" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">WA</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} FAMDQ. Todos los derechos reservados.</p>
    </div>
</footer>
