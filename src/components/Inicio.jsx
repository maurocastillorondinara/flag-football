import './Inicio.css';
import equipadoImg from '../assets/images/equipado.jpeg';

const Inicio = () => {
    return (
        <section id="inicio" className="inicio" style={{ backgroundImage: `url(${equipadoImg})` }}>
            <div className="inicio-overlay"></div>
            <div className="container inicio-content">
                <h2 className="inicio-subtitle">LIGA DE FOOTBALL FLAG DE MAR DEL PLATA</h2>
                <h1 className="inicio-title">
                    VELOCIDAD <br />
                    <span className="outline-text">ESTRATEGIA</span> <br />
                    PASIÓN
                </h1>
                <p className="inicio-description">
                    Unite a la revolución del deporte en la costa.
                    Sin contacto, máxima intensidad.
                </p>
                <div className="inicio-actions">
                    <a href="#contact" className="btn btn-primary">Inscribí a tu equipo</a>
                    <a href="#about" className="btn btn-outline">Conocé más</a>
                </div>
            </div>
        </section>
    );
};

export default Inicio;
