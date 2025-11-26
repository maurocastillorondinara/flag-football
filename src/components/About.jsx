import './About.css';

const About = () => {
    const features = [
        {
            title: "Sin Contacto",
            description: "Toda la intensidad del football americano, sin los golpes. Velocidad pura y agilidad.",
            icon: "⚡"
        },
        {
            title: "Estrategia",
            description: "Cada jugada cuenta. Diseñá, ejecutá y superá a la defensa rival con inteligencia.",
            icon: "🧠"
        },
        {
            title: "Comunidad MDP",
            description: "Formá parte de la liga de mayor crecimiento en Mar del Plata. Hombres, mujeres y mixtos.",
            icon: "🌊"
        }
    ];

    return (
        <section id="about" className="about">
            <div className="container">
                <h2 className="section-title">La Liga</h2>
                <div className="features-grid">
                    {features.map((feature, index) => (
                        <div key={index} className="feature-card">
                            <div className="feature-icon">{feature.icon}</div>
                            <h3 className="feature-title">{feature.title}</h3>
                            <p className="feature-description">{feature.description}</p>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default About;
