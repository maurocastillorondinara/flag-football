import './Gallery.css';
import logoNereidas from '../assets/images/logo-nereidas.png';
import logoLiebre from '../assets/images/logo-liebre.png';
import logoKraken from '../assets/images/logo-kraken.png';
import logoAcorazados from '../assets/images/logo-acorazados.png';
import logoAtlantes from '../assets/images/logo-atlantes.png';
import logoTridentes from '../assets/images/logo-tridentes.png';

const Gallery = () => {
    // Team logos with their brand colors
    const teams = [
        {
            id: 1,
            name: 'Nereidas',
            logo: logoNereidas,
            color: 'linear-gradient(135deg, #FF1493 0%, #E91E8C 100%)'
        },
        {
            id: 2,
            name: 'Liebres',
            logo: logoLiebre,
            color: 'linear-gradient(135deg, #FFD700 0%, #FFC107 100%)'
        },
        {
            id: 3,
            name: 'Kraken',
            logo: logoKraken,
            color: 'linear-gradient(135deg, #8B00FF 0%, #6A0DAD 100%)'
        },
        {
            id: 4,
            name: 'Acorazados',
            logo: logoAcorazados,
            color: 'linear-gradient(135deg, #4A5568 0%, #718096 100%)'
        },
        {
            id: 5,
            name: 'Atlantes',
            logo: logoAtlantes,
            color: 'linear-gradient(135deg, #00CED1 0%, #20B2AA 100%)'
        },
        {
            id: 6,
            name: 'Tridentes',
            logo: logoTridentes,
            color: 'linear-gradient(135deg, #7c1406ff 0%, #961b1bff 100%)'
        },
    ];

    return (
        <section id="teams" className="gallery">
            <div className="container">
                <h2 className="section-title">Nuestros Equipos</h2>
                <div className="gallery-grid">
                    {teams.map((team) => (
                        <div key={team.id} className="gallery-item" style={{ background: team.color }}>
                            <img src={team.logo} alt={team.name} className="team-logo" />
                            <div className="gallery-overlay">
                                <span>{team.name}</span>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default Gallery;
